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
                        @if (Session::has('success'))
                        <div class="col-md-6 mb-4 m-auto">
                            <div class="alert alert-success alert-bg alert-button alert-block show-code-action">
                                <h2 class="alert-title mb-4 text-19">Annonce en ligne !</h2>
                                <p>
                                    Votre annonce annonce a été publié. 
                                </p>
                                <p>
                                    Elle sera soumise à une vérification par les Administrateurs en vue de sa validation.
                                </p>

                                <p>
                                    Vous pouvez à nouveau publier une annonce gratuitement.
                                    Merci de votre confiance.
                                </p>

                                <p>
                                    L'équipe <strong>Vintage.ci</strong>
                                </p>
                                <a href="{{ url("/")}}" class="btn btn-success btn-rounded">Aller à l'accueil </a>
                                <a href="{{ url("/annonces/new")}}" class="btn btn-success btn-rounded">Publier une annonce</a>
                            </div>
                        </div>
                        @endif

                        {{-- End of steps --}}

                        {{-- Echec de l'opération: --}}
                        @if (Session::has('error'))
                        <div class="col-md-6 mb-4 m-auto">
                            <div class="alert alert-error alert-bg alert-button alert-block show-code-action">
                                <h4 class="alert-title">Erreur de publication !</h4>
                                <p>
                                   Désolé ! Une erreur inconnue est survenue lors de la soumission de votre publication. L'opération n'a pas pu être terminée. 
                                </p>

                                <p>
                                    Vous pouvez toujours réssayer de publier une annonce.
                                    Merci de votre confiance.
                                </p>

                                <p>
                                    L'équipe <strong>Vintage.ci</strong>
                                </p>
                                <a href="{{ url("/")}}" class="btn btn-error btn-rounded">Aller à l'accueil </a>
                                <a href="{{ url("/annonces/new")}}" class="btn btn-error btn-rounded">Publier une annonce</a>
                                
                            </div>
                        </div>
                        @endif
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