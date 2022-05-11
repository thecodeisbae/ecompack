<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personne;
use App\Models\Connexion;
use App\Models\Affiliation;
use Illuminate\Support\Facades\Hash;
use App\Models\Pack;
use App\Models\PackInfos;
use App\Models\Souscription;
use App\Models\Paiement;
use App\Models\Retrait;
use App\Models\PersonneTracking;
use App\Models\PackPersos;
use App\Models\Article;
use App\Models\PackPersosInfos;

class HomeController extends Controller
{
    //
    function index()
    {
        return view('front.home');
    }

    function createPackPerso()
    {
        
        $packs = session()->get('articles') ?? [] ;
        $total = 0;

        foreach ($packs as $key => $value)
        {
            $total += $value->article_prix;
        }
        
        $prix = round($total/4);

        $pack = PackPersos::create([
            'packperso_prix' => $prix,
            'packperso_echeance' => 4,
            'packperso_nom' => request('nom'),
            'packperso_total' => $total
        ]);
        

        if($pack)
        {
            foreach ($packs as $key => $value)
            {
                if(!PackPersosInfos::create([
                    'packpersoinfo_pack_id' => $pack->packperso_id,
                    'packpersoinfo_article_id' => $value->article_id
                ]))
                {
                    echo 'false||Une erreur s\'est produite';
                    return;
                }
            }
            
            session()->forget('articles');
            echo 'true||Création du pack effectuée avec succès';
            return;
        }
    
        echo 'false||Une erreur s\'est produite';
        return;
    }

    function userpacks()
    {
        $packs = PackPersos::all();
        $articles = Article::paginate(8);
        return view('front.userpacks',compact('packs','articles'));
    }
    function checkWithdraw()
    {
        $packs = Souscription::where([['sous_per_id',session()->get('user_id')],['sous_flag',0]])->first();
        if($packs)
        {
            echo 'true||Etape suivante';
            exit;
        }
        echo 'false||Veuillez d\'abord souscrire à un pack';
        return;
    }

    function withdrawRequest()
    {
        $retrait = Retrait::create([
            'retrait_montant'=>request('amount'),
            'retrait_per_id'=>session()->get('user_id'),
            'retrait_flag'=>2
        ]);

        if($retrait)
        {
            echo 'true||Demande de retrait enregistré';
        }
        else
        {
            echo 'false||Une erreur s\'est produite';
        }
    }

    function addPaymentHistory(Souscription $souscription)
    {
        if(!$souscription->sous_custom_pack)
        {              
            $pack = Pack::where('pack_id',$souscription->sous_pack_id)->first();
            $pay = Paiement::create(['pay_sous_id' => $souscription->sous_id,'pay_montant'=>$pack->pack_prix]);
            $tmp = \DB::select('select count(*) as total from paiements where pay_sous_id = ?',[$souscription->sous_id]);
    
            if($tmp[0]->total == $pack->pack_echeance)
            {
                \DB::update('update souscriptions set sous_flag = ? where sous_id = ?',[1,$souscription->sous_id]);
            }
    
            $aff = Affiliation::where('aff_per_id',session()->get('user_id'))->first();
    
            if($aff)
                \DB::update('update affiliations set aff_gain = ? where aff_per_id = ?',[$aff->aff_gain+($pack->pack_prix*0.05),session()->get('user_id')]);
    
            if($pay)
            {
                return redirect('/dashboard')->with('success','Paiement effectué avec succès');
            }
        }
        else
        {
            $pack = PackPersos::where('packperso_id',$souscription->sous_pack_id)->first();
            $pay = Paiement::create(['pay_sous_id' => $souscription->sous_id,'pay_montant'=>$pack->packperso_prix]);
            $tmp = \DB::select('select count(*) as total from paiements where pay_sous_id = ?',[$souscription->sous_id]);
    
            if($tmp[0]->total == $pack->packperso_echeance)
            {
                \DB::update('update souscriptions set sous_flag = ? where sous_id = ?',[1,$souscription->sous_id]);
            }
    
            $aff = Affiliation::where('aff_per_id',session()->get('user_id'))->first();
    
            if($aff)
                \DB::update('update affiliations set aff_gain = ? where aff_per_id = ?',[$aff->aff_gain+($pack->packperso_prix*0.05),session()->get('user_id')]);
    
            if($pay)
            {
                return redirect('/dashboard')->with('success','Paiement effectué avec succès');
            }
        }

        return back()->with('error','Une erreur s\'est produite');
    }
    function activatePack()
    {
        if(request('perso'))
            $souscription = Souscription::create([
                'sous_per_id' => session()->get('user_id'),
                'sous_pack_id' => request('id'),
                'sous_custom_pack' => 1
            ]);
        else        
            $souscription = Souscription::create([
                'sous_per_id' => session()->get('user_id'),
                'sous_pack_id' => request('id')
            ]);

        if($souscription)
        {
            echo 'true||Le pack est activé avec succès';
            die;
        }

        echo 'false||Une erreur s\'est produite';
    }

    function dashboard()
    {
        $packs = Souscription::join('packs','souscriptions.sous_pack_id','=','packs.pack_id')
                        ->where([['souscriptions.sous_flag','!=',1],['souscriptions.sous_custom_pack','!=',1],['souscriptions.sous_per_id',session()->get('user_id')]])
                        ->get();
                        
        $packspersos = Souscription::join('packs_persos','souscriptions.sous_pack_id','=','packs_persos.packperso_id')
                        ->where([['souscriptions.sous_flag','!=',1],['souscriptions.sous_custom_pack','=',1],['souscriptions.sous_per_id',session()->get('user_id')]])
                        ->get();

        $pays = [];
        $payspersos = [];
        
        $win = \DB::select('select sum(aff_gain) as win from affiliations where aff_parrain_id = ? ',[session()->get('user_id')]);
        $taken = \DB::select('select sum(retrait_montant) as total from retraits where retrait_per_id = ? and retrait_flag = 1 ',[session()->get('user_id')]);

        $gain = $win[0]->win - $taken[0]->total;

        $user = Personne::find(session()->get('user_id'));

        foreach($packs as $pack)
        {
            $tmp = \DB::select('select count(*) as total from paiements where pay_sous_id = ?',[$pack->sous_id]);
            array_push($pays,$tmp[0]->total);
        }

        foreach($packspersos as $pack)
        {
            $tmp = \DB::select('select count(*) as total from paiements where pay_sous_id = ?',[$pack->sous_id]);
            array_push($payspersos,$tmp[0]->total);
        }

        return view('front.dashboard',compact('packs','pays','packspersos','payspersos','gain','user'));
    }    
    public function packs()
    {
        $packs = Pack::all();
        return view('front.packs',compact('packs'));
    }
    public function loadPack()
    {
        $packs = PackInfos::join('articles','packs_infos.packinfo_article_id','=','articles.article_id')
                            ->join('packs','packs_infos.packinfo_pack_id','=','packs.pack_id')
                            ->where('packinfo_pack_id',request('id'))
                            ->get();

        $output = '<table align="center">';
        
        foreach ($packs as $key => $value)
        {
            $output .= '<tr>
                <td style="padding:10px"><img width="200px" height="200px" src="'.asset("storage/fichiers/$value->article_file").'" /></td>
                <td style="width:100px;padding:10px">'.$value->article_nom.'</td>
                <td style="width:100px";padding:10px>'.$value->article_prix.' XOF</td>
            </tr>
            ';
        }

        $output .= '</table><hr><span style="color:#013c8be3;"><strong>Montant par échéance</strong></span> : '.$packs[0]->pack_prix.' XOF <br><span style="color:#013c8be3;"><strong>Nombre d\'échéances</strong></span> : '.$packs[0]->pack_echeance.'<br><span style="color:#013c8be3;"><strong>TOTAL</strong></span> : '.$packs[0]->pack_total.' XOF';

        echo $output;
    }

    function loadPackPersoSee()
    {
        
        $packs = PackPersosInfos::join('articles','packspersos_infos.packpersoinfo_article_id','=','articles.article_id')
                            ->join('packs_persos','packspersos_infos.packpersoinfo_pack_id','=','packs_persos.packperso_id')
                            ->where('packpersoinfo_pack_id',request('id'))
                            ->get();

        $output = '<table align="center">';
        
        foreach ($packs as $key => $value)
        {
            $output .= '<tr>
                <td style="padding:10px"><img width="200px" height="200px" src="'.asset("storage/fichiers/$value->article_file").'" /></td>
                <td style="width:100px;padding:10px">'.$value->article_nom.'</td>
                <td style="width:100px";padding:10px>'.$value->article_prix.' XOF</td>
            </tr>
            ';
        }

        $output .= '</table><hr><span style="color:#013c8be3;"><strong>Montant par échéance</strong></span> : '.$packs[0]->packperso_prix.' XOF <br><span style="color:#013c8be3;"><strong>Nombre d\'échéances</strong></span> : '.$packs[0]->packperso_echeance.'<br><span style="color:#013c8be3;"><strong>TOTAL</strong></span> : '.$packs[0]->packperso_total.' XOF';

        echo $output;
    }

    function addToPack()
    {
        try
        {
            $article = Article::find(request('id'));
            $articles = session()->get('articles') ?? [];
            array_push($articles,$article);
            session()->put('articles',$articles);
            echo 'true||Article ajouté avec succès';
        } catch (\Throwable $th) {
            var_dump($th);
            echo 'false||Une erreur s\'est produite';
        }

    }
    
    function emptyPackPerso()
    {
        try
        {
            session()->forget('articles');
            echo 'true||Pack vidé avec succès';
        } catch (\Throwable $th) {
            var_dump($th);
            echo 'false||Une erreur s\'est produite';
        }

    }
    public function loadPackPerso()
    {
        $packs = session()->get('articles') ?? [] ;

        if($packs)
        {
            $output = '<input id="emptyPack" value="1" hidden />
            <table align="center">';
            $total = 0;

            foreach ($packs as $key => $value)
            {
                $total += $value->article_prix;
                $output .= '<tr>
                    <td style="padding:10px"><img width="200px" height="200px" src="'.asset("storage/fichiers/$value->article_file").'" /></td>
                    <td style="width:100px;padding:10px">'.$value->article_nom.'</td>
                    <td style="width:100px";padding:10px>'.$value->article_prix.' XOF</td>
                </tr>
                ';
            }
            
            $prix = $total/4;
            $output .= '</table><hr><span style="color:#013c8be3;"><strong>Montant par échéance</strong></span> : '.round($prix).' XOF <br><span style="color:#013c8be3;"><strong>Nombre d\'échéances</strong></span> : 4<br><span style="color:#013c8be3;"><strong>TOTAL</strong></span> : '.$total.' XOF';
            
            $output .= '<div class="form-group mt-3 mt-3">
                            <label for="">Nom du pack</label>
                            <input type="text" name="packperso" id="packperso" class="form-control">
                            </div>';

            echo $output;
            exit;
        }
        
       
        echo '<input id="emptyPack" value="0" hidden />Pack vide !!!';
        exit;
    }
    
    function login()
    {
        return view('front.login');
    }

    function register($user)
    {
        return view('front.login',compact('user'));
    }

    function loginCheck()
    {
        request()->validate(
            [
                'loginEmail'=>'required|string|max:255',
                'loginPassword'=>'required'
            ]
        );
        $login = request('loginEmail');
        $pwd = request('loginPassword');

        $model = Personne::join('connexions','connexions.conn_per_id','=','personnes.per_id')
                            ->where('personnes.per_email', $login)->first();
        // dd($model);
        if ($model != null) {
            if (Hash::check($pwd, $model->conn_password, []))
            {
                session()->put('user_id',$model->per_id);
                session()->put('user_email',$model->per_email);

                $query = @unserialize (file_get_contents('http://ip-api.com/php/'));
                if ($query && $query['status'] == 'success') {
                    PersonneTracking::create([
                       'pt_per_id' => session()->get('user_id'),
                       'pt_localisation' => $query['city'].' ( '.$query['country']. ' ) '
                    ]) ;
                }

                return redirect('/')->with('info','Bon retour sur votre tableau de bord '.$login);
            }
        }

        return back()->with('error','Vérifier vos paramètres de connexion');
    }

    function logout()
    {
        session()->forget('user_id');
        session()->forget('user_email');
        return redirect('/');
    }
    function storeUser()
    {
        /** Valider les champs */
        try
        {    
            $parrain = Personne::where('per_email',request('parrain'))->first();
            $person = Personne::create([
                'per_nom' => request('nom'),
                'per_prenoms' => request('prenoms'),
                'per_sexe' => request('sexe'),
                'per_age' => request('age'),
                'per_contact' => request('contact'),
                'per_email' => request('email'),
                'per_parrain' => (($parrain) ? $parrain->per_id : '')
            ]);
            if($person)
            {
                $conn = Connexion::create([
                    'conn_per_id' => $person->per_id,
                    'conn_password' => Hash::make(request('password'))
                ]);
                if($conn)
                {
                    if($parrain)
                    {
                        $aff = Affiliation::create([
                            'aff_per_id' => $person->per_id,
                            'aff_parrain_id' => $parrain->per_id,
                            'aff_gain' => 0.00
                        ]);
                        if($aff)
                        {
                            session()->put('user_id',$person->per_id);
                            session()->put('user_email',$person->per_email);

                            $packs = Souscription::join('packs','souscriptions.sous_pack_id','=','packs.pack_id')
                                    ->where([['souscriptions.sous_flag','!=',1],['souscriptions.sous_per_id',session()->get('user_id')]])
                                    ->get();
                            $pays = [];

                            $win = \DB::select('select sum(aff_gain) as win from affiliations where aff_parrain_id = ? ',[session()->get('user_id')]);
                            $taken = \DB::select('select sum(retrait_montant) as total from retraits where retrait_per_id = ? and retrait_flag = 1 ',[session()->get('user_id')]);

                            $gain = $win[0]->win - $taken[0]->total;

                            // dd($gain);

                            $user = Personne::find(session()->get('user_id'));

                            foreach($packs as $pack)
                            {
                                $tmp = \DB::select('select count(*) as total from paiements where pay_sous_id = ?',[$pack->sous_id]);
                                array_push($pays,$tmp[0]->total);
                            }


                            return view('front.dashboard',compact('packs','pays','gain','user'));
                        }
                    }
                    session()->put('user_id',$person->per_id);
                    session()->put('user_email',$person->per_email);

                    
                    $packs = Souscription::join('packs','souscriptions.sous_pack_id','=','packs.pack_id')
                        ->where([['souscriptions.sous_flag','!=',1],['souscriptions.sous_per_id',session()->get('user_id')]])
                        ->get();
                    $pays = [];

                    $win = \DB::select('select sum(aff_gain) as win from affiliations where aff_parrain_id = ? ',[session()->get('user_id')]);
                    $taken = \DB::select('select sum(retrait_montant) as total from retraits where retrait_per_id = ? and retrait_flag = 1 ',[session()->get('user_id')]);

                    $gain = $win[0]->win - $taken[0]->total;

                    // dd($gain);

                    $user = Personne::find(session()->get('user_id'));

                    foreach($packs as $pack)
                    {
                        $tmp = \DB::select('select count(*) as total from paiements where pay_sous_id = ?',[$pack->sous_id]);
                        array_push($pays,$tmp[0]->total);
                    }

                    return view('front.dashboard',compact('packs','pays','gain','user'));
                }
                return back();
            }
            return back();
        }
        catch (\Throwable $th)
        {
            throw $th;
        }
    }

}
