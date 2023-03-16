<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>{{ $page_title}}</title>

    <meta name="keywords" content="Vintage, vente, annonces, vends le, ancien, vêtements, vaisselles, electroniques, accessoires, informatiques, automobiles, immobilier, cuisine, ménagers, meubles, mobiliers," />
    <meta name="description" content="Plateforme N°1 de petites annonces en ligne en côte d'ivoires. Sur VINTAGE ALLO SERVIVE, vends tout des accessoires que tu utilises plus.">
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
                    <h1 class="page-title mb-0"> {{ Helpers::pageTitle('mention') }} </h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav mb-10 pb-1">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/')}}">Accueil</a></li>
                        <li>Mentions légales</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

             <!-- Start of PageContent -->
             <div class="page-content faq">
                <div class="container">

                    @if (!is_null($mention))
                    <section class="mb-6">

                        <div class="row justify-content-center">
                            <div class="col-md-8 m-auto mb-8 text-justify">
                               
                                <p class="mb-3">
                                    {!! ($mention->content) ? str_replace("\n", "<br>", $mention->content) : null !!}
                                </p>
                            </div>
                        </div>
                    </section>
                    @endif

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