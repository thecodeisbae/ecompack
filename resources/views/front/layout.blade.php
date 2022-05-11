<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>e-Commerce</title>
      @yield('haut')
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> --}}
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
      <link rel="icon" href="images/favicon.png" type="image/gif" />
      <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <style>
        @font-face {
            font-family: Dosis;
            src: url("{{ asset('fonts/Dosis-VariableFont_wght.ttf') }}") format('truetype');
        }

        body {
            font-family: 'Dosis' !important;
            /* font-size:32px; */
        }
      </style>
      <script src="{{ asset('js/jquery.min.js')}}"></script>
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header class="full_bg">
         <!-- header inner -->
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="/"><img class="img-fluid" width="250px" height="300px" src="images/logoelberaka.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                                 <a class="nav-link" href="/">Accueil</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="/packs">Nos packs</a>
                              </li>
                              <li class="nav-item">
                                 @if(session()->get('user_id'))
                                     <a class="nav-link" href="/dashboard">Tableau de bord</a>
                                 @endif
                              </li>
                              <li class="nav-item">
                                @if(session()->get('user_id'))
                                    <a class="nav-link" href="/userpacks">Mes packs</a>
                                @endif
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="/about">A propos</a>
                              </li>
                              <li class="nav-item">
                                 @if(session()->get('user_id'))
                                     <a class="nav-link" href="/logout">Déconnexion</a>
                                 @else
                                     <a class="nav-link" href="/login">Connexion</a>
                                 @endif
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
         <!-- end header inner -->
         <!-- end header -->
         <!-- banner -->
         @yield('banner')
      </header>

      @yield('content')

      <!-- end contact -->
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-8 offset-md-2">
                     <div class="newslatter">
                        <h4>Subscribe Our Newsletter</h4>
                        <form class="bottom_form">
                           <input class="enter" placeholder="Enter your email" type="text" name="Enter your email">
                           <button class="sub_btn">subscribe</button>
                        </form>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class=" border_top1"></div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-4">
                     <h3>menu LINKS</h3>
                     <ul class="link_menu">
                        <li><a href="#">Home</a></li>
                        <li><a href="about.html"> About</a></li>
                        <li><a href="product.html">Our Product</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                     </ul>
                  </div>
                  <div class=" col-md-3">
                     <h3>TOP food</h3>
                     <p class="many">
                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected
                     </p>
                  </div>
                  <div class="col-lg-3 offset-mdlg-2     col-md-4 offset-md-1">
                     <h3>Contact </h3>
                     <ul class="conta">
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> Location</li>
                        <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="#"> demo@gmail.com</a></li>
                        <li><i class="fa fa-mobile" aria-hidden="true"></i> Call : +01 1234567890</li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-10 offset-md-1">
                        <p>© 2019 All Rights Reserved. Design by <a href="https://html.design/"> Free Html Templates</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      @yield('foot')
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{ asset('js/jquery-3.0.0.min.js')}}"></script>
      <!-- sidebar -->
      
      <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{ asset('js/custom.js')}}"></script>
        @if(Session::get('success'))
            <script>^
                $(function () {
                    toastr.success("{{ Session::get('success') }}")
                });
            </script>
        @elseif(Session::get('error'))
            <script>
                $(function () {
                    toastr.error("{{ Session::get('error') }}")
                });
            </script>  
        @elseif(Session::get('info'))
            <script>
                $(function () {
                    toastr.info("{{ Session::get('info') }}")
                });
            </script>  
        @endif
   </body>
</html>