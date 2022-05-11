@extends('front.layout')
@section('haut')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>

         .float{
            z-index: 1;
            position:fixed;
            width:60px;
            height:60px;
            bottom:40px;
            right:40px;
            background-color:#013c8be3;
            color:#FFF;
            border-radius:50%;
            text-align:center;
         }

         .float:hover{
            color:white;
         }

         .my-float{
            margin-top:22px;
         }
    </style>
@endsection

@section('banner')
   <section class="banner_main">
      <div class="container">
      <div class="banner_po">
         <div class="row">
               <div class="col-md-7">
                  <div class="text_box">
                  <span>Découvrez nos offres</span>
                  <h1> <strong>Packs alimentaires</strong> <br> </h1>
                  </div>
               </div>
         </div>
      </div>
      </div>
   </section>
@endsection

@section('content')

   <a href="#" data-toggle="modal" data-target="#showPackPerso" class="float" onclick="loadPackPerso()" title="Voir le pack">
      <i class="fa fa-cart-plus my-float"></i>
   </a>

 <div class="products">
    <div class="container">
       <div class="row">
          <div class="col-md-7">
             <div class="titlepage">
                <h2>Tous nos articles</h2>
                <span>La liste de nos articles
                </span>
             </div>
          </div>
       </div>
       <div class="row">
            @foreach($articles as $article)
               <div class="col-lg-3 col-md-6 col-sm-6">
                  <div id="ho_bo" class="our_products">
                     <div class="product">
                     <figure><img width="200px" style="height: 200px!important" src="{{ asset("storage/fichiers/$article->article_file") }}" alt="#"/></figure>
                     </div>
                     <h3>{{ $article->article_nom }}</h3><hr>
                     <span>{{ $article->article_prix }} XOF</span>
                     <p align="center" class="mt-3">
                        <a class="btn" title="Ajouter au pack" onclick="addToPack({{ $article->article_id }})" style="background-color:#013c8be3;color:white;"><i class="fa fa-cart-plus"></i></a>
                     </p>
                  </div>
               </div>
            @endforeach
       </div>
       {{ $articles->links() }}
    </div>
    <div class="container mt-5">
       <div class="row">
          <div class="col-md-7">
             <div class="titlepage">
                <h2>Tous vos packs</h2>
                <span>La liste de vos packs
                </span>
             </div>
          </div>
       </div>
       <div class="row">
            @foreach($packs as $pack)
               <div class="col-lg-3 col-md-6 col-sm-6">
                  <div id="ho_bo" class="our_products">
                     <div class="product">
                     <figure><img src="images/pro1.png" alt="#"/></figure>
                     </div>
                     <h3>{{ $pack->packperso_nom }}</h3><hr>
                     <span>{{ $pack->packperso_total.' XOF ( '.$pack->packperso_prix.' * '.$pack->packperso_echeance.' )' }}</span>
                     <p align="center" class="mt-3">
                        <a class="btn" data-toggle="modal" onclick="loadPackPersoSee({{ $pack->packperso_id }})" data-target="#showPackSee" title="Voir" style="background-color:#013c8be3;color:white;" href="#"><i class="fa fa-search"></i></a>
                        <a class="btn" title="Souscrire" onclick="suscribePack({{ $pack->packperso_id }})" style="background-color:#013c8be3;color:white;" href="#"><i class="fa fa-cart-plus"></i></a>
                     </p>
                  </div>
               </div>
            @endforeach
       </div>
       {{-- {{ $packs->links() }} --}}
    </div>
 </div>

   <div id="showPackPerso" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="my-modal-title"><strong>Voir le pack</strong></h5>
               <button class="close" id="endPerso" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <p id="modalPackPerso"></p>
               <div class="row justify-content-between m-0 mt-3">
                  <button type="button" class="btn btn-danger col-md-3 mt-2" onclick="emptyPackPerso()" >Vider le pack</button>
                 <button type="button" class="btn btn-primary col-md-3 mt-2" onclick="savePackPerso()" >Enregistrer le pack</button>
               </div>
            </div>
         </div>
      </div>
   </div>

 <div id="showPack" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="my-modal-title">Détails du pack</h5>
             <button class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
             </button>
          </div>
          <div class="modal-body">
             <p id="modalPack"></p>
          </div>
       </div>
    </div>
 </div>

 
 <div id="showPackSee" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="my-modal-title">Détails du pack</h5>
            <button class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <p id="modalPackPersoSee"></p>
         </div>
      </div>
   </div>
</div>

 <script>
    
      $.ajaxSetup({

         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }

      });

      function suscribePack(id)
      {
         if({{ (session()->get('user_id') ?? '') ? session()->get('user_id') : 0 }})
         {
            $.ajax({
               type: "post",
               url: "/activatePack",
               data: {id:id,perso:1},
               success: function (msg) {
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
         else
         {
            toastr.info('Veuillez d\'abord vous connectez.<br>Merci !!!');
         }
      }

      function savePackPerso()
      {
         if({{ (session()->get('user_id') ?? '') ? session()->get('user_id') : 0 }})
         {
            if($('#emptyPack').val() == 0)
            {
               toastr.error('Ajouter des articles au pack');
               return ;
            }

            var msg = '';

            if($('#packperso').val() == '')
            {
               msg += 'Entrer un nom pour le pack';
            }

            if(msg)
            {
               toastr.error(msg);
               return ;
            }

            $.ajax({
               type: "post",
               url: "/createPackPerso",
               data: {nom:$('#packperso').val()},
               success: function (msg) {
                  var val = msg.split("||");
                  if (val[0] == "true") {
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
         else
         {
            toastr.info('Veuillez d\'abord vous connectez.<br>Merci !!!');
         }
      }

      function loadPack(id)
      {
         $.ajax({
            type: "post",
            url: "/loadPack",
            data: {id:id},
            success: function (response) {
               $('#modalPack').html(response);
            }
         });
      }

      function loadPackPersoSee(id)
      {
         $.ajax({
            type: "post",
            url: "/loadPackPersoSee",
            data: {id:id},
            success: function (response) {
               $('#modalPackPersoSee').html(response);
            }
         });
      }

      function emptyPackPerso()
      {
         if($('#emptyPack').val() == 0)
         {
            toastr.error('Votre pack est déjà vide');
            return;
         }

         $.ajax({
            type: "post",
            url: "/emptyPackPerso",
            data: {},
            success: function (msg)
            {
               var val = msg.split("||");
               if (val[0] == "true") {
                     toastr.success(val[1]);
                     setTimeout(() => {
                        $('#endPerso').click();
                     }, 1000);
               } else if (val[0] == "false") {
                     toastr.error(val[1]);
               }
            }
         });
      }

      function addToPack(id)
      {
         $.ajax({
            type: "post",
            url: "/addToPack",
            data: {id:id},
            success: function (msg) {
                  var val = msg.split("||");
                  if (val[0] == "true") {
                        toastr.success(val[1]);
                  } else if (val[0] == "false") {
                        toastr.error(val[1]);
                  }
            }
         });
      }

      function loadPackPerso()
      {
         $.ajax({
            type: "post",
            url: "/loadPackPerso",
            data: {},
            success: function (response) {
               $('#modalPackPerso').html(response);
            }
         });
      }
 </script>
@endsection