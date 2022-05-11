@extends('front.layout')
@section('content')

<div id="about" class="about">
    <div class="container">
       <div class="row">
          <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="panel">
                        <div class="panel-login" style="display:none;">
                            <h2 class="card-title font-weight-bolder"><strong>Connexion</strong></h2><hr>
                            <p class="card-text">
                                <form method="post" action="/login" class="m-3">
                                    @csrf
                                    <div class="form-group">
                                        <label for="login">Email</label>
                                        <input id="email" class="form-control" type="text" name="loginEmail">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Mot de passe</label>
                                        <input id="password" class="form-control" type="password" name="loginPassword">
                                    </div><br>
                                    <div class="d-flex flex-column">
                                        <button class="btn m-1" style="background-color: #013c8be3;color:white;" type="submit">Se connecter</button>
                                        <a href="#" class="btn mt-1">Mot de passe oublié</a>
                                        <a href="#" class="btn" onclick="goToPanel('signup')">S'inscrire</a>
                                    </div>
                                </form>
                            </p>
                        </div>
                        <div class="panel-signup" >
                            <h2 class="card-title font-weight-bolder"><strong>Inscription</strong></h2><hr>
                            <p class="card-text">
                                <form method="post" action="/register" class="m-3">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="login">Nom <span style="color:#013c8be3;">*</span></label>
                                            <input id="nom" class="form-control" type="text" name="nom">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="login">Prénoms <span style="color:#013c8be3;">*</span></label>
                                            <input id="prenoms" class="form-control" type="text" name="prenoms">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="login">Age <span style="color:#013c8be3;">*</span></label>
                                            <input id="age" class="form-control" type="number" name="age" min="0">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="login">Sexe <span style="color:#013c8be3;">*</span></label>
                                            <select id="sexe" class="form-control" name="sexe">
                                                <option value="Homme">Homme</option>
                                                <option value="Femme">Femme</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="login">Email <span style="color:#013c8be3;">*</span></label>
                                            <input id="email" class="form-control" type="email" name="email">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="login">Contact <span style="color:#013c8be3;">*</span></label>
                                            <input id="contact" class="form-control" type="tel" name="contact">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="login">Parrain</label>
                                        <input readonly id="parrain" value="{{ ($user ?? '') ? $user : '' }}" class="form-control" type="text" name="parrain">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Mot de passe <span style="color:#013c8be3;">*</span></label>
                                        <input id="password" class="form-control" type="password" name="password">
                                    </div><br>
                                    <div class="d-flex flex-column">
                                        <button class="btn m-1" style="background-color: #013c8be3;color:white;" type="submit">S'inscrire</button>
                                        <a href="#" class="btn" onclick="goToPanel('login')">Se connecter</a>
                                    </div>
                                </form>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          
       </div>
    </div>
 </div>
 <script>
    function goToPanel(panel)
    {
        switch (panel) {
            case 'login':
                $(".panel-signup").animate({
                    opacity: 0
                }, 1000).prependTo();
                setTimeout(() => {
                $('.panel-signup').css('display', 'none');
                
                $(".panel-login").animate({
                    opacity: 0
                }, 1).prependTo();
                $('.panel-login').removeAttr("style");
                $(".panel-login").animate({
                    opacity: 1
                }, 2000).prependTo();
                }, 1000);
            break;
                
            case 'signup':
                $(".panel-login").animate({
                    opacity: 0
                }, 1000).prependTo();
                setTimeout(() => {
                $('.panel-login').css('display', 'none');
                
                $(".panel-signup").animate({
                    opacity: 0
                }, 1).prependTo();
                $('.panel-signup').removeAttr("style");
                $(".panel-signup").animate({
                    opacity: 1
                }, 2000).prependTo();
                }, 1000);
                
            break;
        
            default:
                break;
        }   
    }
 </script>
@endsection