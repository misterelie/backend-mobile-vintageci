<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>{{ $page_title}}</title>

    <meta name="keywords" content="" />
    <meta name="description" content="">
    <meta name="author" content="">

    {{-- CSS files --}}
    @include('layouts/front/assets/css')

</head>

<body class="home">
    <div class="page-wrapper">
        
        {{-- Navbar --}}
        @include('layouts/front/includes/navbar')



        <!-- Start of Main -->
        <main class="main">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0"> Notification </h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav mb-10 pb-1">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/')}}">Accueil</a></li>
                        <li>Compte client</li>
                        <li>Notification</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- End of Breadcrumb -->
            <div class="page-content">
                <div class="container mb-4">
                    <div class="row justify-content-center mb-4">
                        
                        {{-- Réussite de l'opération: --}}
                      
                        <div class="col-md-6 mb-4 m-auto">
                            <div class="alert alert-success alert-bg alert-button alert-block show-code-action">
                                <h4 class="alert-title">Félicitation, votre demande a été envoyée.</h4>
                                <p>
                                    Veuillez consulter votre boite mail. Vous avez reçu un lien pour la modification de votre mot de passe.
                                    <br>
                                    Si vous ne retrouvez pas le mail dans votre boite principale, veuillez consulter vos courriers indésirables (spams)
                                </p>
                                
                                <p>
                                    L'équipe <strong>
                                        {{ config('app.name')}}
                                    </strong>
                                </p>
                                <a href="{{ url("/annonces")}}" class="btn btn-success btn-rounded">Voir les annonces</a>
                                <a href="{{ url("/connexion")}}" class="btn btn-primary btn-rounded">Me connecter</a>
                            </div>
                        </div>
                    
                        {{-- End of steps --}}

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