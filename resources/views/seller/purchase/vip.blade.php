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
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0"> Booster mon annonce </h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav mb-10 pb-1">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/')}}">Accueil</a></li>
                        <li>Compte client</li>
                        <li>Tableau de bord</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            {{-- Account  Alert --}}
            @include('seller.partials.alert')

            <!-- Start of PageContent -->
            <div class="page-content">
                <div class="container">


                    {{-- Page content --}}

                   <fieldset class="checkout-page">
                    <legend>Mettez votre annonce en VIP</legend>
                    <form action="{{url('/payement/vip') }} " method="post">
                        @csrf
                        
                        <section class="premium-page">
                            <div
                                class="product-wrapper row cols-xl-10 cols-sm-10 cols-xs-10 cols-10 mt-4 pb-3 justify-content-center ">
                                {{-- Annonce --}}
                                <div class="product product-list mx-auto m-auto p-2">
                                    <figure class="product-media">
                                        <a href="{{ url('annonces/article') }}">
                                            <img src="{{ Helpers::file_path($annonce->photo_1)}}" alt="product" width="250" height="288">
                                        </a>
                                    </figure>
                                    <div class="product-details">

                                        <div class="product-cat mt-3 ">
                                            <a href="#">{{ (!is_null($annonce->category)) ? $annonce->category->category: null
                                                }}</a>
                                        </div>
                                        <h4 class="product-name">
                                            <a href="{{ url('annonces/single', $annonce->pk) }}">{{ $annonce->titre }} </a>
                                        </h4>
                                        <div class="ratings-container d-block">
                                            <a href="{{ url('annonces/single', $annonce->pk) }}" class="rating-reviews"> à {{
                                                (!is_null($annonce->commune)) ? $annonce->commune->commune : null }}</a>
                                        </div>
                                        <div class="ratings-container d-block">
                                            <a href="{{ url('annonces/single', $annonce->pk) }} " class="rating-reviews mt-3">Le: {{
                                                Dates::formatFr($annonce->created_at)
                                                }}</a>
                                        </div>
        
        
                                        <div class="product-action">
                                            <div class="product-price">{{ Helpers::moneyFormat($annonce->prix)}} F</div>
                                            {{-- <a href="{{ url('annonces/single', $annonce->pk) }} "
                                                class="btn-product-icon btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                                            --}}
        
                                        </div>
        
        
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-discount">VIP</label>
                                    </div>
                                </div>
                                                            {{-- End Annonce --}}
                            </div>
                            <p>
                                <i class="d-block text-center m-auto mt-4 mb-3">Votre annonce apparaîtra dans un emplacement privilégié, tout en haut des listes d'annonces.</i>
                            </p>

                            <input type="hidden" name="annonce_id" id="annonce_id" class="form-control" value="{{ $annonce->id}} ">

                        </section>

                        <section class="vip-offers">

                            <h2>Sélectionnez un offre:</h2>
                            <ul>
                            @if (!is_null($vips))
                                    {{-- Offers --}}
                            @foreach ($vips as $o)
                            <li>
                                <input type="radio" name="offre_id" id="{{$o->id}}" value="{{ $o->id}}" required>
                                <label for="{{$o->id}}">
                                    <div class="days">
                                        <span class="img  product-span text-uppercase label-discount" style="background: {{ $o->couleur }};color: #fff; padding: 3px 5px;">VIP</span>
                                        <span> <b>{{ $o->nbre_jour}}</b> jours  </span>
                                    </div>
                                    <div class="price">
                                        {{ Helpers::moneyFormat($o->montant) }} FCFA
                                    </div>
                                    <div class="best">
                                        @if($o->reduction != 0)    Économisez {{ $o->reduction}}% @endif
                                    </div>
                                    <div class="reduction">
                                        {{Helpers::moneyFormat($o->cout_par_jour)}} <small>FCFA</small> / Jour
                                    </div>
                                </label>
                            </li>
                            @endforeach
                            @endif
                                
                            </ul>
                        </section>

                        
                        <section>
                            <div class="container">
                                <div class="col-lg-4 col-md-4 m-auto justify-content-center text-center">
                                    <button type="submit" class="btn btn-annonce br-3">Sponsoriser</button>
                                </div>
                            </div>
                        </section>

                    </form>
                   </fieldset>


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