<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>{{ $page_title }}</title>

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
                        <li><a href="{{ url('/') }}">Accueil</a></li>
                        <li><a href="{{ url('/annonces') }}">Toutes les annonces</a></li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Page Content -->
            <div class="page-content mb-10 mt-4">

                <div class="container m-auto mx-auto">

                    <h2 class="title justify-content-center ls-normal mb-4 mt-10 pt-1 appear-animate pb-4">Toutes les
                        annonces VIP
                    </h2>
                    <div class="product-wrapper row cols-xl-2 cols-sm-1 cols-xs-2 cols-1 mt-4 pb-3">


                        @if (!is_null($annonces))
                            {{-- Produit item --}}
                            @foreach ($annonces as $an)
                                {{-- Produit item --}}
                                <div class="product product-list vip">
                                    <a href="{{ url('annonces/single', $an->pk) }}"
                                        style="position: absolute; z-index: 999 !important; left: 0; top: 0; width: 100%; height: 100%; ">

                                    </a>
                                    <figure class="product-media">
                                        <a href="{{ url('annonces/single', $an->pk) }}">
                                            <img src="{{ asset($an->photo_1) }}" alt="{{ $an->titre }}"
                                                width="330" height="338" />
                                        </a>
                                        {{-- Ici --}}
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat mt-3 ">
                                            <a href="#">{{ $an->category }}</a>
                                        </div>
                                        <h4 class="product-name">
                                            <a href="{{ url('annonces/single', $an->pk) }}">
                                                {{ Str::substr($an->titre, 0, 40) . '...' }}
                                            </a>
                                        </h4>
                                        <div class="ratings-container d-block">
                                            <a href="{{ url('annonces/single', $an->pk) }}" class="rating-reviews"> à
                                                {{ $an->commune }}</a>
                                        </div>
                                        <div class="ratings-container d-block">
                                            <a href="{{ url('annonces/single', $an->pk) }} "
                                                class="rating-reviews mt-3">Le:
                                                {{ Dates::formatFr($an->created_at) }}</a>
                                        </div>


                                        <div class="product-action">
                                            <div class="product-price">{{ Helpers::moneyFormat($an->prix) }} F</div>

                                            @if (!is_null($an->prix_promo))
                                                <div class="product-price del">
                                                    <del>{{ Helpers::moneyFormat($an->prix_promo) }} F</del> </div>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-discount">VIP</label>
                                    </div>
                                </div>
                            @endforeach
                    </div>
                @else
                    <div class="row">

                        <div class="col-lg-12 w-100 col-md-12 col-sm-12 m-auto">
                            <div
                                class="alert mb-4 text-center alert-icon alert-error alert-bg alert-inline text-dark w-100">
                                <h4 class="alert-title">
                                    <i class="w-icon-times-circle"></i>Désolé !
                                </h4> Aucune annonce VIP disponible pour le moment.Veuillez consulter cette page plus
                                tard.
                            </div>
                        </div>

                    </div>
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
