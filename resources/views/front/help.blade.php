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
        
        {{-- Navbar --}}
        @include('layouts/front/includes/navbar')

       

         <!-- Start of Main -->
         <main class="main">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title  mb-0"> Base de connaissances </h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav mb-10 pb-1">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/')}}">Accueil</a></li>
                        <li>Aide</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <div class="page-content">
                <div class="container">
                    <div class="col-auto text-center mb-4">
                        <h2 class="title">Demarrez sur de bonnes bases</h2>
                    </div>
                </div>

                @if (!is_null($helps) && $helps->count() > 0)
                    <div class="container mb-4">
                        <div class="row margin-bottom-40 py-4">  
                            @foreach ($helps as $row)
                                <div class="col-12  col-lg-6 col-md-6 col-xm-12" title="{{$row->legende }}">
                                    <div class=" box-shadow  mx-2">
                                        <iframe width="540" height="420" src="https://www.youtube.com/embed/{!!$row->filename!!}" title="YouTube video player" frameborder="0" class="d-block m-auto" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                            @endforeach
                        </div> 
                        
                        <div class="row my-4">
                            {{ $helps->links()}}
                        </div>
                    </div>      
                @endif 
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