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
    @include("layouts.front.includes.messenger-widget")
    <div class="page-wrapper">
       
        {{-- Navbar --}}
        @include('layouts/front/includes/navbar')



        <!-- Start of Main -->
        <main class="main">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0"> Supprimer mon annonce </h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav mb-10 pb-1">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/')}}">Accueil</a></li>
                        <li>Compte client</li>
                        <li>Annonces</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            {{-- Account  Alert --}}
            @include('seller.partials.alert')

            <!-- Start of PageContent -->
            <div class="page-content pt-2">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8 m-auto">
                            <div class="card box-shadow p-4">
                                <div class="card-header p-4">
                                    <h5 class="card-title">Pourquoi souhaitez-vous supprimer votre annonce ?</h5>
                                </div>
                                <div class="card-body p-4">
                                    <form method="POST" action="{{ url('/annonces/destroy',$annonce)}} ">
                                        @csrf
                                        <div class="form-group form-check my-3">
                                            <input type="radio" class="form-check-input" id="raison" name="raison" required
                                                value="J'ai vendu  mon article sur Vinted.ci">
                                            <label class="form-check-label" for="raison">J'ai vendu mon article sur Vinted.ci</label>
                                        </div>

                                        <div class="form-group form-check my-3">
                                            <input type="radio" class="form-check-input" id="response_2" name="raison" required
                                                value="J'ai vendu  mon article sur sur un autre site">
                                            <label class="form-check-label" for="response_2">J'ai vendu mon article sur sur un autre site</label>
                                        </div>

                                        <div class="form-group form-check my-3">
                                            <input type="radio" class="form-check-input" id="response_3" name="raison" required
                                                value="Je veux supprimer pour publier une autre annonce">
                                            <label class="form-check-label" for="response_3">Je veux supprimer pour publier une autre annonce</label>
                                        </div>

                                        <div class="form-group form-check my-3">
                                            <input type="radio" class="form-check-input" id="response_4" name="raison" required
                                                value="Mon article n'est plus à vendre.">
                                            <label class="form-check-label" for="response_4">Mon article n'est plus à vendre.</label>
                                        </div>

                                        <div class="form-group form-check my-3">
                                            <input type="radio" class="form-check-input" id="response_6" name="raison" required
                                                value="Pour une autre raison.">
                                            <label class="form-check-label" for="response_6">Pour une autre raison.</label>
                                        </div>

                                        <div class="form-group">
                                            <button class="btn mr-2  btn-primary" type="submit"> 
                                                Supprimer mon annonce
                                            </button>
                                            <a href="{{ url('/account/mes-annonces') }} " class="btn btn-underline text-blue text-primary btn-link sm mx-3" type="submit"> 
                                                Je ne veux plus supprimer mon annonce
                                            </a>
                                        </div>
                                    </form>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of PageContent -->
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