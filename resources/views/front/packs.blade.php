@extends('front.layout')
@section('haut')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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

 <div class="products">
    <div class="container">
       <div class="row">
          <div class="col-md-7">
             <div class="titlepage">
                <h2>Tous nos packs</h2>
                <span>La liste de tous nos packs
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
                        <h3>{{ $pack->pack_nom }}</h3><hr>
                        <span>{{ $pack->pack_total.' XOF ( '.$pack->pack_prix.' * '.$pack->pack_echeance.' )' }}</span>
                        <p align="center" class="mt-3">
                           <a class="btn" data-toggle="modal" onclick="loadPack({{ $pack->pack_id }})" data-target="#showPack" title="Voir" style="background-color:#013c8be3;color:white;" href="#"><i class="fa fa-search"></i></a>
                           <a class="btn" title="Souscrire" onclick="suscribePack({{ $pack->pack_id }})" style="background-color:#013c8be3;color:white;" href="#"><i class="fa fa-cart-plus"></i></a>
                        </p>
                    </div>
                </div>
            @endforeach
          {{-- <div class="col-lg-3 col-md-6 col-sm-6">
             <div id="ho_bo" class="our_products">
                <div class="product">
                   <figure><img src="images/pro2.png" alt="#"/></figure>
                </div>
                <h3>Apple For Juice</h3>
                <span>Nam libero tempore</span>
                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non </p>
             </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
             <div id="ho_bo" class="our_products">
                <div class="product">
                   <figure><img src="images/pro3.png" alt="#"/></figure>
                </div>
                <h3>Orange For Juice</h3>
                <span>Nam libero tempore</span>
                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non </p>
             </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
             <div id="ho_bo" class="our_products">
                <div class="product">
                   <figure><img src="images/pro4.png" alt="#"/></figure>
                </div>
                <h3>Pineapple For Juice</h3>
                <span>Nam libero tempore</span>
                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non </p>
             </div>
          </div> --}}
       </div>
       {{-- {{ $packs->links() }} --}}
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
 {{-- <div class="using">
    <div class="container-fluid">
       <div class="row d_flex">
          <div class="col-md-6">
             <div class="titlepage">
                <h2 >Lorem Ipsum using</h2>
                <p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise</p>
                <a class="read_more white_bg" href="Javascript:void(0)"> Read More</a>
             </div>
          </div>
          <div class="col-md-5 offset-md-1 padding_right0">
             <div class="frout_img">
                <figure><img src="images/frout.png" alt="#"/></figure>
             </div>
          </div>
       </div>
    </div>
 </div> --}}
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
               data: {id:id},
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
 </script>
@endsection