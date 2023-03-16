<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>{{ $page_title}}</title>

    <meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
    <meta name="description" content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
    <meta name="author" content="D-THEMES">

    {{-- CSS files --}}
    @include('layouts/front/assets/css')

</head>

<body class="home">
    <div class="page-wrapper">
        <h1 class="d-none">Wolmart - Responsive Marketplace HTML Template</h1>
        {{-- Navbar --}}
        @include('layouts/front/includes/navbar')



        <!-- Start of Main -->
        <main class="main">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0"> Réinitialisation de mot de passe </h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav mb-10 pb-1">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/')}}">Accueil</a></li>
                        <li>Compte client</li>
                        <li>Réinitialisation</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- End of Breadcrumb -->
            <div class="page-content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-6 m-auto">
                            <div class="login-popup">
                                <div class="tab-nav-boxed tab-nav-center tab-nav-underline">
                                    
                                    <ul class="nav nav-tabs text-uppercase text-center" role="tablist">
                                         <h4 class=" active">Réinitialiser</h4>
                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="sign-in">

                                            <div class="form-group ">

                                                @if (Session::has('success'))
                                                <div class="alert alert-icon alert-success mb-4 alert-bg alert-inline ">
                                                    <h4 class="alert-title">
                                                        <i class="fas fa-check"></i>Réussite !
                                                    </h4> {{ Session::get('success')}}.
                                                </div>
                                                @endif

                                                @if (Session::has('error'))
                                                <div class="alert mb-4 alert-icon alert-error alert-bg alert-inline ">
                                                    <h4 class="alert-title">
                                                        <i class="w-icon-times-circle"></i>Alerte !
                                                    </h4> {{ Session::get('error')}}.
                                                </div>
                                                @endif

                                            </div>

                                            <form action="{{ url('/reset', $user)}} " method="post">
                                                @csrf
                                                {{ csrf_field() }}

                                                <div class="row">
                                                    <div class="col-sm-12 mb-3">
                                                        <label class="form-label">Nouveau mot de passe:<span class="text-danger">* </span> </label>
                                                        <div class="input-group auth-pass-inputgroup">
                                                            <input type="password" class="form-control" placeholder="Votre mot de passe" aria-label="Password" aria-describedby="password-addon" name="password" id="password">
                                                            <button class="btn btn-light " type="button" id="toggle"><i class="fa fa-eye"></i></button>
                                                        </div>
                                                        @error('password')
                                                            <span class="text-danger">
                                                                {{$message }}
                                                            </span> 
                                                        @enderror
                                                    </div>
        
                                                    <div class="col-sm-12 mb-3">
                                                        <label class="form-label">Confirmez le mot de passe:<span class="text-danger">* </span> </label>
                                                        <div class="input-group auth-pass-inputgroup">
                                                            <input type="password" class="form-control" placeholder="Confirmez" aria-label="Password" aria-describedby="password-addon" name="password_confirmation" id="password_confirmation">
                                                            <button class="btn btn-light " type="button" id="toggleConfirm">
                                                                <i class="fa fa-eye"></i>
                                                            </button>
                                                        </div>
                                                        @error('password_confirmation')
                                                            <span class="text-danger">
                                                                {{$message }}
                                                            </span> 
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                               
                                                <div class="form-group text-right mt-3 d-block">
                                                    <button class="btn btn-annonce br-3 waves-effect d-grid waves-light" type="submit">Réinitialiser</button>
                                                </div>

                                                <div class="form-group mt-3 mb-2">
                                                    <span>Mot de passe retrouvé ? <a href="{{ url("/connexion")}}">Se connecter</a></span>
                                                    
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- End of PageContent -->
        </main>
        <!-- End of Main -->

        <!-- Start of Footer -->
        @include('layouts/front/includes/footer')
        <!-- End of Footer -->
    </div>
    <!-- End of Page-wrapper-->




    {{-- CSS files --}}
    @include('layouts/front/assets/js')
   
    <script>
        const toggle = document.querySelector("#toggle"),
                toggleConfirm = document.querySelector('#toggleConfirm'),
                i = document.querySelector('#toggle i');
                iConfirm = document.querySelector('#toggleConfirm i');
              input = document.querySelector("#password");
              inputConfirm = document.querySelector("#password_confirmation");
              toggle.addEventListener("click", () =>{
                  if(input.type ==="password"){
                    input.type = "text";
                    i.classList.replace("fa-eye", "fa-eye-slash");
                  }else{
                    input.type = "password";
                    i.classList.replace("fa-eye-slash", "fa-eye");
                  }
              });


              //* Confirmation:
              toggleConfirm.addEventListener("click", () =>{
                  if(inputConfirm.type ==="password"){
                    inputConfirm.type = "text";
                    iConfirm.classList.replace("fa-eye", "fa-eye-slash");
                  }else{
                    inputConfirm.type = "password";
                    iConfirm.classList.replace("fa-eye-slash", "fa-eye");
                  }
              })
    </script>
</body>

</html>