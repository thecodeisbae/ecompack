<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Models\Pack;
use App\Models\Article;
use App\Models\PackInfos;
use App\Models\Retrait;
use App\Models\Paiement;
use App\Models\Souscription;
use App\Models\Affiliation;
use App\Models\Personne;
use App\Models\PersonneTracking;

class BackController extends Controller
{
    public function index()
    {
        return view('back.login');
    }
    public function packs()
    {
        $packs = Pack::all();
        $articles = Article::all();
        return view('back.packs',compact('packs','articles'));
    }
    public function getPack()
    {
        $pack = Pack::where('pack_id',request('id'))->first();
        $packInfos = PackInfos::join('articles','packinfo_article_id','=','articles.article_id')->where('packinfo_pack_id',$pack->pack_id)->get();
        $articles = Article::all();

        echo json_encode(
            [
                'pack' => $pack,
                'packInfos' => $packInfos,
                'articles' => $articles
            ]
        );

    }
    public function getItem()
    {
        $article = Article::where('article_id',request('id'))->first();

        echo json_encode($article);

    }
    function deletePack($id)
    {
        \DB::delete('delete from packs where pack_id = ?',[$id]);
        return back();
    }
    function deleteItem($id)
    {
        \DB::delete('delete from articles where article_id = ?',[$id]);
        return back();
    }

    function deleteSouscription($id)
    {
        \DB::delete('delete from souscriptions where sous_id = ?',[$id]);
        return back();
    }

    function deleteUser($id)
    {
        \DB::delete('delete from personnes where per_id = ?',[$id]);
        \DB::delete('delete from connexions where conn_per_id = ?',[$id]);
        \DB::delete('delete from affiliations where aff_per_id = ? or aff_parrain_id = ?',[$id,$id]);
        return back();
    }
     public function users()
    {
        $users = Personne::all();
        return view('back.users',compact('users'));
    }

    public function paiements()
    {
        $paiements = Paiement::join('souscriptions','paiements.pay_sous_id','=','souscriptions.sous_id')
                                ->join('personnes','souscriptions.sous_per_id','=','personnes.per_id')
                                ->join('packs','souscriptions.sous_pack_id','=','packs.pack_id')
                                ->select('personnes.*','packs.*','paiements.created_at as pay_date')
                                ->orderBy('pay_date','desc')
                                ->get();
        return view('back.paiements',compact('paiements'));
    }
    public function trackings()
    {
        $trackings = PersonneTracking::join('personnes','personnes_trackings.pt_per_id','=','personnes.per_id')
                                ->select('personnes.*','personnes_trackings.*','personnes_trackings.created_at as pt_date')
                                ->orderBy('pt_date','desc')
                                ->get();
        return view('back.trackings',compact('trackings'));
    }

    public function souscriptions()
    {
        $souscriptions = Souscription::join('personnes','souscriptions.sous_per_id','=','personnes.per_id')
                                ->join('packs','souscriptions.sous_pack_id','=','packs.pack_id')
                                ->select('souscriptions.sous_id','souscriptions.sous_flag','personnes.*','packs.*','souscriptions.created_at as activate_date')
                                ->orderBy('activate_date','desc')
                                ->get();
        return view('back.souscriptions',compact('souscriptions'));
    }

    public function affiliations()
    {
        $affiliations = \DB::select("select distinct(aff_parrain_id)  from affiliations",[]);

        $tmp = [];

        foreach ($affiliations as $key => $value)
        {
            array_push($tmp,$value->aff_parrain_id);
        }

        $parrains = Personne::whereIn('per_id',$tmp)->get();
        
        $filleuls = [];
        foreach ($parrains as $key => $value)
        {
            $filleuls[$key] = Affiliation::join('personnes','affiliations.aff_per_id','=','personnes.per_id')
                                            ->where('affiliations.aff_parrain_id',$value->per_id)
                                            ->get();
        }
        return view('back.affiliations',compact('parrains','filleuls'));
    }

    function updateWithdrawStatus()
    {
        $withdraw = Retrait::find(request('id'));
        $withdraw->retrait_flag = request('status');
        if($withdraw->save())
        {
            echo 1;
            exit;
        }    
        echo 0;

    }

    public function retraits()
    {
        $retraits = Retrait::join('personnes','retraits.retrait_per_id','=','personnes.per_id')->get();
        return view('back.retraits',compact('retraits'));
    }

    function storeItem(Request $request)
    {
        $path = request()->file('file')->store('fichiers', 'public');
        $file = explode('/',$path)[sizeof(explode('/',$path))-1];
        if(Article::create([
            'article_nom' => request('nom'),
            'article_prix' => request('montant'),
            'article_file' => $file
        ]))
        {
            echo 1;
            return;
        }
        echo 0;
        return;
    }

    function updateItem(Request $request)
    {
        if(request()->file('file'))
        {   $path = request()->file('file')->store('fichiers', 'public');
            $file = explode('/',$path)[sizeof(explode('/',$path))-1];
            
            $article = Article::where('article_id',request('id'))->first();
            $article->article_nom = request('nom');
            $article->article_prix = request('montant');
            $article->article_file = $file;

            if($article->save())
            {
                echo 1;
                return;
            }
            echo 0;
            return;
        }else{
            $article = Article::where('article_id',request('id'))->first();
            $article->article_nom = request('nom');
            $article->article_prix = request('montant');
            
            if($article->save())
            {
                echo 1;
                return;
            }
            echo 0;
            return;
        }
    }

    function storePack(Request $request)
    {
        $pack = Pack::create([
            'pack_prix' => request('montant'),
            'pack_echeance' => request('nombre'),
            'pack_nom' => request('nom'),
            'pack_total' => request('total')
        ]);

        if($pack)
        {
            foreach (explode(',',request('articles')) as $key => $value)
            {
                if(!PackInfos::create([
                    'packinfo_pack_id' => $pack->pack_id,
                    'packinfo_article_id' => $value
                ]))
                {
                    echo 0;
                    return;
                }
            }
            
            echo 1;
            return;
        }
    
        echo 0;
        return;

    }
    function updatePack(Request $request)
    {
        $pack = Pack::where('pack_id',request('id'))->first();

        $pack->pack_prix = request('montant');
        $pack->pack_echeance = request('nombre');
        $pack->pack_nom = request('nom');
        $pack->pack_total = request('total');
        $pack->save();

        if($pack)
        {
            \DB::delete('delete from packs_infos where packinfo_pack_id = ?',[request('id')]);
            foreach (explode(',',request('articles')) as $key => $value)
            {
                if(!PackInfos::create([
                    'packinfo_pack_id' => request('id'),
                    'packinfo_article_id' => $value
                ]))
                {
                    echo 0;
                    return;
                }
            }
            
            echo 1;
            return;
        }
    
        echo 0;
        return;

    }
    public function articles()
    {
        $articles = Article::all();
        return view('back.articles',compact('articles'));
    }

    public function control(Request $request)
    {
        request()->validate(
            [
                'login'=>'required|string|max:255',
                'pwd'=>'required'
            ]
        );
        $login = request('login');
        $pwd = request('pwd');
        $model = Admin::where('admin_email', $login)->first();
        if ($model != null) {
            if (Hash::check($pwd, $model->admin_password, []))
            { 
                session()->put('user_id',$model->admin_id);
                session()->put('user_name',$login);
                return redirect('/admin/index')->with('info','Bon retour sur votre tableau de bord '.$login);
            }
        }

        return back()->with('warning','Vérifier vos paramètres de connexion');
    }

    public function dashboard()
    {
        return view('back.index');
    }

}
