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
                    <h1 class="page-title mb-0"> Créer un compte </h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav mb-10 pb-1">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/')}}">Accueil</a></li>
                        <li>Compte client</li>
                        <li>Inscription</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

           <!-- End of Breadcrumb -->
           <div class="page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-7 m-auto">
                       
                            <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                                <ul class="nav nav-tabs text-uppercase text-center" role="tablist">
                                    <h4 class=" active">Inscrivez-vous </h4>
                               </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="sign-in">
                                        
                                        <form action="{{ url("/save/user")}} " method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-groupm margin-y-10 ">
                                                    <label>Nom <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="user_firstname" id="user_firstname" value="{{ old('user_firstname')}} ">
                                                    @error('user_firstname')
                                                            <span class="text-danger">
                                                                {{$message }}
                                                            </span> 
                                                        @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-groupm margin-y-10 ">
                                                    <label>Prénom(s) <span class="text-danger">* </span></label>
                                                    <input type="text" class="form-control" name="user_lastname" id="user_lastname" value="{{ old('user_lastname')}} ">
                                                    @error('user_lastname')
                                                            <span class="text-danger">
                                                                {{$message }}
                                                            </span> 
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-groupm margin-y-10 ">
                                                    <label>Adresse Email <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="user_email" id="user_email" value="{{ old('user_email')}}">
                                                    @error('user_email')
                                                            <span class="text-danger">
                                                                {{$message }}
                                                            </span> 
                                                        @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-groupm margin-y-10 ">
                                                    <label>Téléphone <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="user_phone" id="user_phone" value="{{ old('user_phone')}}">
                                                    @error('user_phone')
                                                            <span class="text-danger">
                                                                {{$message }}
                                                            </span> 
                                                    @enderror
                                                </div>
                                            </div>

                                            
                                            <div class="col-sm-6">
                                                <div class="form-groupm margin-y-10 ">
                                                    <label>Contact Whatsapp <small class="text-danger">(facultatif) </small></label>
                                                    <input type="text" class="form-control" name="user_whatsapp" id="user_whatsapp" value="{{ old('user_whatsapp')}} ">
                                                    @error('user_whatsapp')
                                                            <span class="text-danger">
                                                                {{$message }}
                                                            </span> 
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 mb-3">
                                                <label class="form-label">Mot de passe:<span class="text-danger">* </span> </label>
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

                                            <div class="col-sm-6 mb-3">
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


                                        <div class="form-checkbox margin-y-15 d-flex align-items-center justify-content-between">
                                            <input type="checkbox" class="custom-checkbox" id="cgu" name="cgu" >
                                            <label for="cgu">J'accepte les <a href="{{ url('/cgu')}} ">conditions générales d'utilisation </a> de Allô Service Vintage en cliquant sur:  S'inscrire.</label>
                                            @error('cgu')
                                            <span class="text-danger">
                                                {{$message }}
                                            </span> 
                                        @enderror
                                        </div>

                                        <div class="form-group text-right margin-y-25">
                                            <button type="submit" class="btn btn-annonce br-3">S'inscrire</button>
                                        </div>
                                        
                                        </form>

                                    </div>

                                </div>
                                {{-- <p class="text-center margin-y-25">S'inscrire avec:</p>
                                <div class="social-icons social-icon-border-color d-flex justify-content-center mb-4">
                                    <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                    
                                    <a href="#" class="social-icon social-google fab fa-google"></a>
                                </div> --}}
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