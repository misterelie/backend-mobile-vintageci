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
                    <div class="col-lg-6 col-md-6 m-auto">
                        <div class="login-popup">
                            <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                                <ul class="nav nav-tabs text-uppercase" role="tablist">
                                    <li class="nav-item">
                                        <a href="#sign-in" class="nav-link active">Se connecter</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#sign-up" class="nav-link">S'inscrire</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="sign-in">
                                        <div class="form-group">
                                            <label>Adresse Email *</label>
                                            <input type="text" class="form-control" name="username" id="username" required>
                                        </div>
                                        <div class="form-group mb-0">
                                            <label>Mot de passe *</label>
                                            <input type="text" class="form-control" name="password" id="password" required>
                                        </div>
                                        <div class="form-checkbox d-flex align-items-center justify-content-between">
                                            <input type="checkbox" class="custom-checkbox" id="remember1" name="remember1" required="">
                                            <label for="remember1">Garder ma session</label>
                                            <a href="#">Mot de passe oublié ?</a>
                                        </div>
                                        <a href="#" class="btn btn-primary">Se connecter</a>
                                    </div>



                                    <div class="tab-pane" id="sign-up">
                                        <div class="form-group">
                                            <label>Adresse Email *</label>
                                            <input type="text" class="form-control" name="email_1" id="email_1" required>
                                        </div>
                                       
                                        <div class="checkbox-content login-vendor">
                                            <div class="form-group mb-5">
                                                <label>Nom *</label>
                                                <input type="text" class="form-control" name="first-name" id="first-name" required>
                                            </div>
                                            <div class="form-group mb-5">
                                                <label>Prénom *</label>
                                                <input type="text" class="form-control" name="last-name" id="last-name" required>
                                            </div>
                                            <div class="form-group mb-5">
                                                <label>Mot de passe *</label>
                                                <input type="text" class="form-control" name="password_1" id="password_1" required>
                                            </div>
                                            
                                            <div class="form-group mb-5">
                                                <label>Numéro de téléphone *</label>
                                                <input type="text" class="form-control" name="phone-number" id="phone-number" required>
                                            </div>
                                        </div>
                                        {{-- <div class="form-checkbox user-checkbox mt-0">
                                            <input type="checkbox" class="custom-checkbox checkbox-round active" id="check-customer" name="check-customer" required="">
                                            <label for="check-customer" class="check-customer mb-1">I am a customer</label>
                                            <br>
                                             <input type="checkbox" class="custom-checkbox checkbox-round" id="check-seller" name="check-seller" required="">
                                            <label for="check-seller" class="check-seller">I am a vendor</label> 
                                        </div> --}}
                                        {{-- <p>Your personal data will be used to support your experience 
                                            throughout this website, to manage access to your account, 
                                            and for other purposes described in our <a href="#" class="text-primary">privacy policy</a>.</p> --}}
                                        {{-- <a href="#" class="d-block mb-5 text-primary">Signup as a vendor?</a> --}}
                                        <div class="form-checkbox d-flex align-items-center justify-content-between mb-5">
                                            <input type="checkbox" class="custom-checkbox" id="remember" name="remember" required="">
                                            <label for="remember" class="font-size-md">J'accepte les  <a  href="#" class="text-primary font-size-md">conditions d'uilisation </a></label>
                                        </div>
                                        <a href="#" class="btn btn-primary">S'incrire</a>
                                    </div>
                                </div>
                                <p class="text-center">S'inscrire avec:</p>
                                <div class="social-icons social-icon-border-color d-flex justify-content-center">
                                    <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                    
                                    <a href="#" class="social-icon social-google fab fa-google"></a>
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

</body>

</html>