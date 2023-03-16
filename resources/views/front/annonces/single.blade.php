<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>{{ $page_title }}</title>

    <meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
    <meta name="description" content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
    <meta name="author" content="D-THEMES">

    {{-- Meta --}}
    <script type='text/javascript'
        src='https://platform-api.sharethis.com/js/sharethis.js#property=633ad56fc2af2800193d4b82&product=inline-share-buttons'
        async='async'></script>
    <!-- balises servant à décrire le contenu partagé sur les réseaux sociaux -->
    <meta property="og:title" content="{{ $annonce->titre }}" />
    <meta property="og:type" content="Product" />
    <meta property="og:image" content="{{ asset($annonce->photo_1) }}" />
    <meta property="og:description" content="{{ str_replace('<br>', "\n", $annonce->details) }}" />
    <meta property="og:url" content="{{ url('annonces/single', $annonce->pk) }}">

    {{-- Lien de partage sur LinkedIn --}}
    <script src="https://platform.linkedin.com/in.js" type="text/javascript">
        lang: fr_FR
    </script>
    <script type="IN/Share" data-url="{{ url('annonces/single', $annonce->pk) }}"></script>
    {{-- CSS files --}}
    @include('layouts/front/assets/css')

</head>

<body class="home">
    <div class="page-wrapper">
        <h1 class="d-none">Wolmart - Responsive Marketplace HTML Template</h1>
        {{-- Navbar --}}
        @include('layouts/front/includes/navbar')


        <!-- Start of Main -->
        <main class="main mb-10 pb-1">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav container">
                <ul class="breadcrumb bb-no">
                    <li><a href="{{ url('/') }}">Accueil</a></li>
                    <li><a href="{{ url('/') }}"> Annonces</a></li>
                    <li>Détail de l'annonce</li>
                </ul>

            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Page Content -->
            <div class="page-content">
                <div class="container margin-y-60">
                    <div class="row gutter-lg">


                        <div class="main-content justify-content-center">
                            <div class="product product-single row justify-content-center">

                                <div class="col-md-7 mb-6   ">
                                    <div class="product-gallery product-gallery-sticky product-gallery-vertical">
                                        <div class="swiper-container product-single-swiper swiper-theme nav-inner"
                                            data-swiper-options="{
                                    'navigation': {
                                        'nextEl': '.swiper-button-next',
                                        'prevEl': '.swiper-button-prev'
                                    }
                                }">
                                            <div class="swiper-wrapper row cols-1 gutter-no">
                                                @if (!is_null($annonce->photo_1))
                                                    <div class="swiper-slide">
                                                        <figure class="product-image">
                                                            <img src="{{ asset($annonce->photo_1) }} "
                                                                data-zoom-image="{{ asset($annonce->photo_1) }} "
                                                                alt="Electronics Black Wrist Watch" width="800"
                                                                height="900">
                                                        </figure>
                                                    </div>
                                                @endif
                                                @if (!is_null($annonce->photo_2))
                                                    <div class="swiper-slide">
                                                        <figure class="product-image">
                                                            <img src="{{ asset($annonce->photo_2) }} "
                                                                data-zoom-image="{{ asset($annonce->photo_2) }} "
                                                                alt="Electronics Black Wrist Watch" width="488"
                                                                height="549">
                                                        </figure>
                                                    </div>
                                                @endif


                                                @if (!is_null($annonce->photo_3))
                                                    <div class="swiper-slide">
                                                        <figure class="product-image">
                                                            <img src="{{ asset($annonce->photo_3) }} "
                                                                data-zoom-image="{{ asset($annonce->photo_3) }} "
                                                                alt="Electronics Black Wrist Watch" width="800"
                                                                height="900">
                                                        </figure>
                                                    </div>
                                                @endif

                                                @if (!is_null($annonce->photo_4))
                                                    <div class="swiper-slide">
                                                        <figure class="product-image">
                                                            <img src="{{ asset($annonce->photo_4) }} "
                                                                data-zoom-image="{{ asset($annonce->photo_3) }} "
                                                                alt="Electronics Black Wrist Watch" width="800"
                                                                height="900">
                                                        </figure>
                                                    </div>
                                                @endif
                                                @if (!is_null($annonce->photo_5))
                                                    <div class="swiper-slide">
                                                        <figure class="product-image">
                                                            <img src="{{ asset($annonce->photo_5) }} "
                                                                data-zoom-image="{{ asset($annonce->photo_5) }} "
                                                                alt="Electronics Black Wrist Watch" width="800"
                                                                height="900">
                                                        </figure>
                                                    </div>
                                                @endif

                                                @if (!is_null($annonce->photo_6))
                                                    <div class="swiper-slide">
                                                        <figure class="product-image">
                                                            <img src="{{ asset($annonce->photo_6) }} "
                                                                data-zoom-image="{{ asset($annonce->photo_6) }} "
                                                                alt="Electronics Black Wrist Watch" width="800"
                                                                height="900">
                                                        </figure>
                                                    </div>
                                                @endif

                                                @if (!is_null($annonce->photo_7))
                                                    <div class="swiper-slide">
                                                        <figure class="product-image">
                                                            <img src="{{ asset($annonce->photo_7) }} "
                                                                data-zoom-image="{{ asset($annonce->photo_7) }} "
                                                                alt="Electronics Black Wrist Watch" width="800"
                                                                height="900">
                                                        </figure>
                                                    </div>
                                                @endif


                                                @if (!is_null($annonce->photo_8))
                                                    <div class="swiper-slide">
                                                        <figure class="product-image">
                                                            <img src="{{ asset($annonce->photo_8) }} "
                                                                data-zoom-image="{{ asset($annonce->photo_8) }} "
                                                                alt="Electronics Black Wrist Watch" width="800"
                                                                height="900">
                                                        </figure>
                                                    </div>
                                                @endif

                                                @if (!is_null($annonce->photo_9))
                                                    <div class="swiper-slide">
                                                        <figure class="product-image">
                                                            <img src="{{ asset($annonce->photo_9) }} "
                                                                data-zoom-image="{{ asset($annonce->photo_9) }} "
                                                                alt="Electronics Black Wrist Watch" width="800"
                                                                height="900">
                                                        </figure>
                                                    </div>
                                                @endif
                                            </div>
                                            <button class="swiper-button-next"></button>
                                            <button class="swiper-button-prev"></button>
                                        </div>


                                        <div class="product-thumbs-wrap swiper-container"
                                            data-swiper-options="{
                                    'navigation': {
                                        'nextEl': '.swiper-button-next',
                                        'prevEl': '.swiper-button-prev'
                                    },
                                    'breakpoints': {
                                        '992': {
                                            'direction': 'vertical',
                                            'slidesPerView': 'auto'
                                        }
                                    }
                                }">
                                            <div class="product-thumbs swiper-wrapper row cols-lg-1 cols-4 gutter-sm">
                                                @if (!is_null($annonce->photo_1))
                                                    <div class="product-thumb swiper-slide">
                                                        <img src="{{ asset($annonce->photo_1) }} "
                                                            alt="Product Thumb" width="800" height="900">
                                                    </div>
                                                @endif
                                                @if (!is_null($annonce->photo_2))
                                                    <div class="product-thumb swiper-slide">
                                                        <img src="{{ asset($annonce->photo_2) }} "
                                                            alt="Product Thumb" width="800" height="900">
                                                    </div>
                                                @endif
                                                @if (!is_null($annonce->photo_3))
                                                    <div class="product-thumb swiper-slide">
                                                        <img src="{{ asset($annonce->photo_3) }} "
                                                            alt="Product Thumb" width="800" height="900">
                                                    </div>
                                                @endif
                                                @if (!is_null($annonce->photo_4))
                                                    <div class="product-thumb swiper-slide">
                                                        <img src="{{ asset($annonce->photo_4) }} "
                                                            alt="Product Thumb" width="800" height="900">
                                                    </div>
                                                @endif

                                                @if (!is_null($annonce->photo_5))
                                                    <div class="product-thumb swiper-slide">
                                                        <img src="{{ asset($annonce->photo_5) }} "
                                                            alt="Product Thumb" width="800" height="900">
                                                    </div>
                                                @endif

                                                @if (!is_null($annonce->photo_6))
                                                    <div class="product-thumb swiper-slide">
                                                        <img src="{{ asset($annonce->photo_6) }} "
                                                            alt="Product Thumb" width="800" height="900">
                                                    </div>
                                                @endif

                                                @if (!is_null($annonce->photo_7))
                                                    <div class="product-thumb swiper-slide">
                                                        <img src="{{ asset($annonce->photo_7) }} "
                                                            alt="Product Thumb" width="800" height="900">
                                                    </div>
                                                @endif

                                                @if (!is_null($annonce->photo_8))
                                                    <div class="product-thumb swiper-slide">
                                                        <img src="{{ asset($annonce->photo_8) }} "
                                                            alt="Product Thumb" width="800" height="900">
                                                    </div>
                                                @endif

                                                @if (!is_null($annonce->photo_9))
                                                    <div class="product-thumb swiper-slide">
                                                        <img src="{{ asset($annonce->photo_9) }} "
                                                            alt="Product Thumb" width="800" height="900">
                                                    </div>
                                                @endif

                                            </div>
                                            <button class="swiper-button-prev"></button>
                                            <button class="swiper-button-next"></button>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-5  sticky-sidebar-wrapper mb-4 m md-5">
                                    <div class="product-details sticky-sidebar"
                                        data-sticky-options="{'minWidth': 767}">
                                        <h1 class="product-title">{{ $annonce->titre }}</h1>
                                        <div class="product-bm-wrapper">

                                            <div class="product-meta">
                                                @if (!is_null($annonce->author))
                                                    <div class="product-categories">
                                                        Vendeur:
                                                        <span class="product-category">
                                                            <a href="#">
                                                                <strong>{{ !is_null($annonce->author) ? $annonce->author->user_firstname . ' ' . $annonce->author->user_lastname : null }}
                                                                </strong>
                                                            </a>
                                                        </span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <hr class="product-divider">

                                        <div class="product-price"><ins
                                                class="new-price">{{ Helpers::moneyFormat($annonce->prix) }} F
                                                CFA</ins>  @if(!is_null($annonce->prix_promo)) <span class="promo-label">(Promo)</span>@endif</div>

                                        @if (!is_null($annonce->prix_promo))
                                            <div class="product-price min-text del">
                                                <del>{{ Helpers::moneyFormat($annonce->prix_promo) }} F</del> </div>
                                        @endif
                                        <hr class="product-divider">

                                        <div class="fix-bottom product-sticky-content sticky-content">
                                            <div class="product-form container">

                                                @if (!is_null($annonce->author) && !is_null($annonce->author->user_whatsapp))
                                                    <a href="https://api.whatsapp.com/send?phone={{ $annonce->author->user_whatsapp }}&text=Bonjour! j'ai vu votre annonce {{ $annonce->titre }} sur Vintage.ci Svp, envoyez-moi plus de détails à ce sujet"
                                                        class="btn btn-green mr-2 text-white mt-2 mb-2">
                                                        <i class="fa fa-whatsapp-o"></i>
                                                        <span>Discuter sur Whatsapp</span>
                                                    </a>
                                                @endif

                                                @if (!is_null($annonce->author) && !is_null($annonce->author->user_phone))
                                                    <a href="tel:{{ $annonce->author->user_phone }}"
                                                        class="btn btn-green text-white mb-3">
                                                        <i class="w-icon-phone"></i>
                                                        <span>{{ $annonce->author->user_phone }} </span>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="social-links-wrapper">
                                            <div class="social-links">
                                                <div class="social-icons social-no-color border-thin">
                                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('annonces/single', $annonce->pk)) }}"
                                                        target="_blank"
                                                        class="social-icon social-facebook w-icon-facebook"></a>

                                                    {{-- Autres réseaux sociaux --}}
                                                    <!-- ShareThis BEGIN -->
                                                    <div class="sharethis-inline-share-buttons"></div>
                                                    <!-- ShareThis END -->


                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 m-auto mt-4">
                                    <div class="header text-underline mb-3">
                                        <h3>Détails de l'annonce:</h3>
                                    </div>

                                    <div class="product-short-desc lh-2">
                                        {!! $annonce->details !!}
                                    </div>

                                </div>
                            </div>


                        </div>


                        <!-- End of Main Content -->
                        <aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">
                            <div class="sidebar-overlay"></div>
                            <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                            <a href="#" class="sidebar-toggle d-flex d-lg-none"><i
                                    class="fas fa-chevron-left"></i></a>
                            <div class="sidebar-content scrollable">
                                <div class="sticky-sidebar">
                                    <div class="widget widget-icon-box mb-6">
                                        {{-- Item  --}}
                                        <div class="icon-box icon-box-side">

                                            <div class="icon-box-content">
                                                <h4 class="icon-box-title mb-4 text-underline text-uppercase">Consignes
                                                    de sécurité : </h4>

                                                {{-- Ligne 1 --}}
                                                <div class="row mb-3 border-bottom">
                                                    <div class="col-sm-1">
                                                        <span class="icon-box-icon text-dark text-13 ">
                                                            <i class="w-icon-check" style="font-size: 13px"></i>
                                                        </span>
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <span class="ml-2">
                                                            Posez au vendeur toutes les questions possibles pour avoir
                                                            la certitude sur la véracité de son produit.
                                                        </span>
                                                    </div>
                                                </div>

                                                {{-- Ligne 1 --}}
                                                <div class="row mb-3 border-bottom">
                                                    <div class="col-sm-1">
                                                        <span class="icon-box-icon text-dark text-13 ">
                                                            <i class="w-icon-check" style="font-size: 13px"></i>
                                                        </span>
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <span class="ml-2">
                                                            Privilégiez toujours le contact direct. N'échangez pas avec
                                                            le vendeurs par sms ou par mail, Appelez-le.
                                                        </span>
                                                    </div>
                                                </div>

                                                {{-- Ligne 1 --}}
                                                <div class="row mb-3 border-bottom">
                                                    <div class="col-sm-1">
                                                        <span class="icon-box-icon text-dark text-13 ">
                                                            <i class="w-icon-check" style="font-size: 13px"></i>
                                                        </span>
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <span class="ml-2">
                                                            N'envoyez jamais de l'argent à un vendeur si vous n'avez pas
                                                            vu ou récupéré son produit. De préférence, payez toujours à
                                                            la réception.
                                                        </span>
                                                    </div>
                                                </div>

                                                {{-- Ligne 1 --}}
                                                <div class="row mb-3 border-bottom">
                                                    <div class="col-sm-1">
                                                        <span class="icon-box-icon text-dark text-13 ">
                                                            <i class="w-icon-check" style="font-size: 13px"></i>
                                                        </span>
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <span class="ml-2">
                                                            Veuillez à toujours rencontrer un vendeur dans un lieu
                                                            public, facilement accessible à tous.
                                                        </span>
                                                    </div>
                                                </div>





                                            </div>
                                        </div>


                                    </div>
                                    <!-- End of Widget Icon Box -->
                                </div>
                            </div>
                        </aside>
                        <!-- End of Sidebar -->



                    </div>
                </div>
            </div>
            <!-- End of Page Content -->
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
