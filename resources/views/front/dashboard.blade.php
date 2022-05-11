@extends('front.layout')
@section('haut')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
<style>
    .bg-ecom {
        background-color: #013c8be3!important;
    }
</style>
<div id="about" class="about">
    <div class="container">
       <div class="row">
          <div class="col-md-6 offset-md-3">
             <div class="titlepage">
                <h2>Tableau de bord</h2>
             </div>
          </div>
       </div>
    </div>
 </div>
<div>
    <div class="container" style="margin-top:-100px;">
       <div class="row">
          <div class="col-md-4 m-2">
            <div class="card">
                <h3 class="card-title pt-3 pl-3 pr-3 pb-0 btn" data-target="#my-collapse" data-toggle="collapse" aria-expanded="false" aria-controls="my-collapse">Packs en cours</h3><hr>
                <div class="card-body collapse show" id="my-collapse" >
                    @foreach($packs as $key => $pack)    
                        <div class="card" style="border-style: none">
                            <div class="card-body">
                                <p class="card-text">
                                    {{ $pack->pack_nom }} ( {{ $pays[$key] }}/{{ $pack->pack_echeance }} ) : <br><hr>
                                    <small>{{ $pack->pack_total.' XOF ( '.$pack->pack_prix.' * '.$pack->pack_echeance.' )' }}</small><br>
                                    <div class="progress mt-2 mb-2">
                                        <div class="progress-bar progress-bar-colored bg-ecom" style="width: {{ number_format($pays[$key]*100 / $pack->pack_echeance,2)  }}%" role="progressbar" aria-valuenow="{{ number_format($pays[$key]*100 / $pack->pack_echeance,2)  }}" aria-valuemin="0" aria-valuemax="100">{{ number_format($pays[$key]*100 / $pack->pack_echeance,2)  }}%</div>
                                    </div>
                                    <kkiapay-widget amount="{{ $pack->pack_prix }}" 
                                                    key="e165a290a08d11eca5d0656c2d7c0a43"
                                                    url=""
                                                    position="center"
                                                    sandbox="true"
                                                    data=""
                                                    theme="#013c8be3"
                                                    callback="http://18.195.159.151/addPaymentHistory/{{ $pack->sous_id }}">
                                    </kkiapay-widget>
                                    {{-- <button onclick="updateTotal({{ $pack->pack_prix }},{{ $pack->sous_id }})" class="btn kkiapay-button mt-2" style="background-color:#013c8be3;color:white">Payer</button><br> --}}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card mt-4">
                <h3 class="card-title pt-3 pl-3 pr-3 pb-0 btn" data-target="#my-collapsep" data-toggle="collapse" aria-expanded="false" aria-controls="my-collapsep">Packs persos en cours</h3><hr>
                <div class="card-body collapse show" id="my-collapsep">
                    @foreach($packspersos as $key => $pack)    
                        <div class="card" style="border-style: none">
                            <div class="card-body">
                                <p class="card-text">
                                    {{ $pack->packperso_nom }} ( {{ $payspersos[$key] }}/{{ $pack->packperso_echeance }} ) : <br><hr>
                                    <small>{{ $pack->packperso_total.' XOF ( '.$pack->packperso_prix.' * '.$pack->packperso_echeance.' )' }}</small><br>
                                    <div class="progress mt-2 mb-2">
                                        <div class="progress-bar progress-bar-colored bg-ecom" style="width: {{ number_format($payspersos[$key]*100 / $pack->packperso_echeance,2)  }}%" role="progressbar" aria-valuenow="{{ number_format($payspersos[$key]*100 / $pack->packperso_echeance,2)  }}" aria-valuemin="0" aria-valuemax="100">{{ number_format($payspersos[$key]*100 / $pack->packperso_echeance,2)  }}%</div>
                                    </div>
                                    <kkiapay-widget amount="{{ $pack->packperso_prix }}" 
                                                    key="e165a290a08d11eca5d0656c2d7c0a43"
                                                    url=""
                                                    position="center"
                                                    sandbox="true"
                                                    data=""
                                                    theme="#013c8be3"
                                                    callback="https://google.com">
                                    </kkiapay-widget>
                                    {{-- <button onclick="updateTotal({{ $pack->pack_prix }},{{ $pack->sous_id }})" class="btn kkiapay-button mt-2" style="background-color:#013c8be3;color:white">Payer</button><br> --}}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
          </div>
          <div class="col-md-7 offset-md-1 m-2">
            <div class="card">
                <h3 class="card-title pt-3 pl-3 pr-3 pb-0">Infos de compte</h3><hr>
                <div class="card-body">
                    <label for="">Lien de parrainage</label>
                    <div class="input-group">
                        <input type="text" style="background-color:#013c8be3;color:white;" readonly class="form-control" value="{{ $_SERVER['SERVER_NAME'].(($_SERVER['SERVER_PORT'] != 80) ?  ":".$_SERVER["SERVER_PORT"] : "") }}/register/{{ session()->get('user_email') }}" id="myInput">
                        <div class="input-group-append">
                            <a onclick="copy()" class="btn input-group-text" id="my-addon"><i class="fa fa-copy"></i></a>
                        </div>
                    </div>
                    <br>
                    <label for="">Gain de parrainage</label>
                    <div class="input-group">
                        <input type="text" style="background-color:#013c8be3;color:white;" readonly class="form-control" value="{{ $gain }} XOF" id="myInput">
                        <div class="input-group-append">
                            <a onclick="withdraw()" class="btn input-group-text" id="my-addon">Retirer</a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nom</label>
                                <input type="text" style="/*background-color:#013c8be3;color:white;*/" readonly class="form-control" value="{{ $user->per_nom }}" id="myInput">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Prénoms</label>
                                <input type="text" style="/*background-color:#013c8be3;color:white;*/" readonly class="form-control" value="{{ $user->per_prenoms }}" id="myInput">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Age</label>
                                <input type="text" style="/*background-color:#013c8be3;color:white;*/" readonly class="form-control" value="{{ $user->per_age }}" id="myInput">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Sexe</label>
                                <input type="text" style="/*background-color:#013c8be3;color:white;*/" readonly class="form-control" value="{{ $user->per_sexe }}" id="myInput">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Contact</label>
                                <input type="text" style="/*background-color:#013c8be3;color:white;*/" readonly class="form-control" value="{{ $user->per_contact }}" id="myInput">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" style="/*background-color:#013c8be3;color:white;*/" readonly class="form-control" value="{{ $user->per_email }}" id="myInput">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <button class="btn" style="background-color:#013c8be3;color:white;">Modifier</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
          </div>
          
       </div>
    </div>
 </div>
 
<div id="amount" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Informations du retrait</h5>
                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body m-2">
                    <div class="form-group">
                        <label for="nom">Montant du retrait</label>
                        <input id="montant" class="form-control" type="number" name="montant" min="0" step="0.01">
                    </div>
                    <div class="row justify-content-between m-0">
                        <button type="button" class="btn btn-danger col-md-3" data-dismiss="modal" aria-label="Close">Fermer</button>
                        <button type="button" class="btn btn-primary col-md-3" onclick="sendWithdraw()" >Confirmer</button>
                    </div>
                </div>
        </div>
    </div>
</div>
<button hidden class="btn btn-primary mb-3" data-toggle="modal" id="stepTwo" data-target="#amount">Confirmer</button>
@endsection

@section('foot')
    <script src="https://cdn.kkiapay.me/k.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var total = 0;
        var sous_id = 0;


        function sendWithdraw()
        {
            var solde = $('#montant').val();
            if(!solde)
            {
                toastr.error('Veuillez saisir un montant');
                return;
            }
            if(solde < 0 || solde > {{ $gain }})
            {
                toastr.error('Montant saisi incorrect');
                return;
            }
            $.ajax({
                type: "post",
                url: "/withdrawRequest",
                data: {amount:solde},
                success: function (msg) {
                    var val = msg.split("||");
                    if (val[0] == "true"){
                        toastr.success(val[1]);
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    } else if (val[0] == "false") {
                            toastr.error(val[1]);
                    }
                }
            });
        }

        function withdraw()
        {
            $.ajax({
                type: "post",
                url: "/checkWithdraw",
                data: {},
                success: function (msg) {
                    var val = msg.split("||");
                    if (val[0] == "true"){
                        $('#stepTwo').click();
                    } else if (val[0] == "false") {
                            toastr.error(val[1]);
                    }
                }
            });
        }

        function updateTotal(prix,sous)
        {
            sous_id = sous;
            $('#pay').attr('amount',prix);
            $('#pay').attr('callback',"127.0.0.1:8000/addPaymentHistory/"+sous_id);

            openKkiapayWidget({amount:prix,position:"right",callback:"",sandbox:"true",
                data:"",
                theme:"#013c8be3",
                key:"e165a290a08d11eca5d0656c2d7c0a43"});
            
            addSuccessListener(response => {
                console.clear();
                console.log(response);
            });

        }

        function addPaymentHistory()
        {
            $.ajax({
                type: "post",
                url: "/addPaymentHistory",
                data: {sous:sous_id},
                success: function (response) {
                    var val = msg.split("||");
                    if (val[0] == "true") {
                            toastr.success(val[1]);
                            setTimeout(() => {
                            location.href = '/dashboard';
                            }, 600);

                    } else if (val[0] == "false") {
                            toastr.error(val[1]);
                    }
                }
            });
        }

        function copy() {
            /* Get the text field */
            var copyText = document.getElementById("myInput");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText.value);

            /* Alert the copied text */
            toastr.success('Lien copié')
            // alert("Copied the text: " + copyText.value);
        }
    </script>
{{-- 
    <script id="pay" amount="0" 
        callback="https://google.com"
        data=""
        url=""
        position="right" 
        theme="#013c8be3"
        key="25762e36dcff75a2486a83695867007972574733"
        src="https://cdn.kkiapay.me/k.js"></script> --}}
    
@endsection