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
        {{-- Navbar --}}
        @include('layouts/front/includes/navbar')






        <!-- Start of Main -->
        <main class="main">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav mb-3 mt-2">
                <div class="container">
                    <ul class="breadcrumb bb-no">
                        <li><a href="{{ url('/')}}">Accueil</a></li>
                        <li><a href="{{ url('/annonces')}}"> {{ $count }} Résultat{{(int) $count > 1 ? 's': '' }}
                                trouvé{{(int) $count > 1 ? 's': '' }}</a></li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Page Content -->
            <div class="page-content mb-10 mt-4">


                <div class="container">
                    <!-- Start of Shop Content -->
                    <div class="shop-content">

                        {{-- Filter here --}}



                        <!-- Start of Shop Main Content -->
                        <div class="main-content">

                            @if(!is_null($annonces) && count($annonces) > 0)
                            <div class="product-wrapper row cols-xl-2 cols-sm-1 cols-xs-2 cols-1 mt-4 pb-3">
                                {{-- OTHERS --}}
                                @foreach($annonces as $an)
                                {{-- Produit item --}}
                                <div class="product product-list ">
                                    <a href="{{ url('annonces/single', $an->pk) }}"
                                        style="position: absolute; z-index: 999 !important; left: 0; top: 0; width: 100%; height: 100%; ">
                                        <figure class="product-media">
                                            <a href="{{ url('annonces/single', $an->pk) }}">
                                                <img src="{{ Helpers::file_path($an->photo_1) }}" alt="{{ $an->titre}}" width="330"
                                                    height="338" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="{{ url('annonces/single', $an->pk) }} "
                                                    class="btn-product-icon  w-icon-search" title="Quick View"></a>
                                            </div>

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
                                                <a href="{{ url('annonces/single', $an->pk) }}" class="rating-reviews">
                                                    à {{
                                                    (!is_null($an->commune)) ? $an->commune->commune : null }}</a>
                                            </div>
                                            <div class="ratings-container d-block">
                                                <a href="{{ url('annonces/single', $an->pk) }} "
                                                    class="rating-reviews mt-3">Le: {{ Dates::formatFr($an->created_at)
                                                    }}</a>
                                            </div>


                                            <div class="product-action">
                                                <div class="product-price">{{ !is_null($an->prix) ?
                                                    Helpers::moneyFormat($an->prix) : null}} F</div>
                                                {{-- <a href="{{ url('annonces/single', $an->pk) }} "
                                                    class="btn-product-icon btn-wishlist w-icon-heart"
                                                    title="Add to wishlist"></a> --}}

                                            </div>
                                        </div>
                                </div>
                                @endforeach

                            </div>

                            @else

                            <div class="alert mb-4 alert-icon alert-error alert-bg alert-inline text-dark ">
                                <h4 class="alert-title">
                                    <i class="w-icon-times-circle"></i>Désolé !
                                </h4> Aucun élément ne correspond à votre recherche.
                            </div>

                            @endif


                        </div>
                        <!-- End of Shop Main Content -->
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