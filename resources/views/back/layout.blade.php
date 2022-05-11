<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>e-Commerce</title>
        <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/css/design.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/fonts/style.css') }}">
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
        @yield('haut')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/637d7774d7.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body class="sb-nav-fixed btn-sm" >
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="/index">
                <span class="text-light large">e-Commerce</span>
            </a>
            <button class="btn btn-lg btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
                <i class="fas fa-bars"></i>
            </button>
            <a href="/focus_session/{{ session()->get('session_id') }}" class="btn btn-lg btn-sm order-1 order-lg-0">
                <strong class="text-light large btn-sm">{{ session()->get('session_name') }}</strong>
            </a>
            <!-- Navbar Search-->
            <form action="/search" method="POST" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                @csrf
                <div class="input-group">
                    <input class="form-control btn-sm @error('search') is-invalid @enderror" type="text" placeholder="Mots clés..." aria-label="Rechercher" name="search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary btn-sm" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item btn-sm" href="/focus_user/{{ session()->get('user_id') }}"><img src="https://img.icons8.com/plasticine/16/000000/user-menu-female.png"/> Profil</a>
                        <a class="dropdown-item btn-sm" href="/disconnect"><img src="https://img.icons8.com/office/16/000000/shutdown.png"/> Déconnexion</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    @include('back.sidenav')
                </nav>
            </div>

            <div id="layoutSidenav_content">
                @yield('content')
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; e-Commerce 2022</div>
                            <div>
                                <a href="#">Politiques</a>
                                &middot;
                                <a href="#">Termes &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script src="{{ asset('admin/js/jquery.imgareaselect.js') }}"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('admin/js/scripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('admin/assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('admin/assets/demo/chart-bar-demo.js') }}"></script>
        <script src="{{ asset('admin/assets/demo/datatables-demo.js') }}"></script>
    </body>
</html>
