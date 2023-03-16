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
                                <ul class="nav nav-tabs text-uppercase" role="tablist">
                                    <li class="nav-item">
                                        <a href="{{url('/connexion')}}" class="nav-link ">Se connecter</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/inscription')}}" class="nav-link active">S'inscrire</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="sign-in">
                                        
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-groupm margin-y-10 ">
                                                    <label>Nom *</label>
                                                    <input type="text" class="form-control" name="username" id="username" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-groupm margin-y-10 ">
                                                    <label>Prénom(s) *</label>
                                                    <input type="text" class="form-control" name="username" id="username" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-groupm margin-y-10 ">
                                                    <label>Adresse Email *</label>
                                                    <input type="text" class="form-control" name="username" id="username" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-groupm margin-y-10 ">
                                                    <label>Contact Whatsapp *</label>
                                                    <input type="text" class="form-control" name="username" id="username" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-groupm margin-y-10 ">
                                                    <label>Téléphone *</label>
                                                    <input type="text" class="form-control" name="username" id="username" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group  margin-y-10 mb-0">
                                            <label>Mot de passe *</label>
                                            <input type="text" class="form-control" name="password" id="password" required>
                                        </div>
                                        <div class="form-checkbox margin-y-15 d-flex align-items-center justify-content-between">
                                            <input type="checkbox" class="custom-checkbox" id="remember1" name="remember1" required="">
                                            <label for="remember1">J'accepte les conditions générales d'utilisations de <a href="#">Vintage.ci</a> en cliquant sur:  s'inscrire.</label>
                                            {{-- <a href="#">Mot de passe oublié ?</a> --}}
                                        </div>
                                        

                                        <div class="form-group text-right margin-y-25">
                                            <a href="#" class="btn btn-primary">S'inscrire</a>
                                        </div>
                                    </div>

                                </div>
                                <p class="text-center margin-y-25">S'inscrire avec:</p>
                                <div class="social-icons social-icon-border-color d-flex justify-content-center mb-4">
                                    <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                    
                                    <a href="#" class="social-icon social-google fab fa-google"></a>
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