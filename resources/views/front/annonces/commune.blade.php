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
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav mb-3 mt-2">
                <div class="container">
                    <ul class="breadcrumb bb-no">
                        <li><a href="{{ url('/')}}">Accueil</a></li>
                        <li><a href="{{ url('/annonces')}}">Annonces à : {{ $commune->commune}} </a></li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Page Content -->
            <div class="page-content mb-10 mt-4">

                <div class="container m-auto mx-auto">
                    
                    <h2 class="title justify-content-center ls-normal mb-4 mt-10 pt-1 appear-animate pb-4">Annonces à {{ Str::ucfirst($commune->commune) }}
                    </h2>

                    <div class="product-wrapper row cols-xl-2 cols-sm-1 cols-xs-2 cols-1 mt-4 pb-3 w-100 position-relative">
                        {{-- OTHERS --}}

                        @if(!is_null($annonces))
                        {{-- Produit item --}}
                        @foreach($annonces as $an)
                        {{-- Produit item --}}
                        <div class="product product-list ">
                            <a href="{{ url('annonces/single', $an->pk) }}"
                                style="position: absolute; z-index: 999 !important; left: 0; top: 0; width: 100%; height: 100%; ">

                            </a>
                            <figure class="product-media">
                                <a href="{{ url('annonces/single', $an->pk) }}">
                                    <img src="{{ asset($an->photo_1)}}" alt="{{ $an->titre}}" width="330"
                                        height="338" />
                                </a>
                                {{-- Ici --}}
                            </figure>
                            <div class="product-details">

                                <div class="product-cat mt-3 ">
                                    <a href="#">{{ (!is_null($an->category)) ? $an->category->category: null
                                        }}</a>
                                </div>
                                <h4 class="product-name">
                                    <a href="{{ url('annonces/single', $an->pk) }}">{{ $an->titre }} </a>
                                </h4>
                                <div class="ratings-container d-block">
                                    <a href="{{ url('annonces/single', $an->pk) }}" class="rating-reviews"> à {{
                                        (!is_null($an->commune)) ? $an->commune->commune : null }}</a>
                                </div>
                                <div class="ratings-container d-block">
                                    <a href="{{ url('annonces/single', $an->pk) }} " class="rating-reviews mt-3">Le: {{
                                        Dates::formatFr($an->created_at)
                                        }}</a>
                                </div>


                                <div class="product-action">
                                    <div class="product-price">{{ Helpers::moneyFormat($an->prix)}} F</div>
                                    @if(!is_null($an->prix_promo))
                                            <div class="product-price del"> <del>{{ Helpers::moneyFormat($an->prix_promo)}} F</del> </div>
                                            @endif

                                </div>


                            </div>


                        </div>
                        @endforeach

                        @endif

                    </div>
                    <!-- End of Shop Content -->
                </div>
            </div>
            <!-- End of Page Content -->
        </main>





        <!-- Start of Footer -->
        @include('layouts/front/includes/footer')
        <!-- End of Footer -->
    </div>
    <!-- End of Page-wrapper-->


    {{-- CSS files --}}
    @include('layouts/front/assets/js')

</body>

</html>