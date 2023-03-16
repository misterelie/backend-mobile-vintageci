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
     <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/demo1.min.css')}} ">
    @include('layouts/front/assets/css')
</head>

<body class="home">
    <div class="page-wrapper">
        <h1 class="d-none">Wolmart - Responsive Marketplace HTML Template</h1>
        {{-- Navbar --}}
        @include('layouts/front/includes/navbar')

        <!-- Start of Main-->
        <main class="main">

            <section class="intro-section">
                <div class="swiper-container swiper-theme nav-inner pg-inner swiper-nav-lg animation-slider pg-xxl-hide nav-xxl-show nav-hide"
                    data-swiper-options="{
                    'slidesPerView': 1,
                    'autoplay': {
                        'delay': 8000,
                        'disableOnInteraction': false
                    }
                }">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide banner banner-fixed intro-slide intro-slide1"
                            style="background-image: url({{ asset('front/assets/images/demos/demo1/sliders/slide-1.jpg')}} ); background-color: #ebeef2;">
                           
                        </div>
                        <!-- End of .intro-slide1 -->

                        <div class="swiper-slide banner banner-fixed intro-slide intro-slide2"
                            style="background-image: url({{ asset('front/assets/images/demos/demo1/sliders/slide-1.jpg')}} ); background-color: #ebeef2;">
                           
                        </div>
                        <!-- End of .intro-slide2 -->

                        <div class="swiper-slide banner banner-fixed intro-slide intro-slide3"
                            style="background-image: url({{ asset('front/assets/images/demos/demo1/sliders/slide-1.jpg')}} ); background-color: #f0f1f2;">
                           
                        </div>
                        <!-- End of .intro-slide3 -->
                    </div>
                    <div class="swiper-pagination"></div>
                    <button class="swiper-button-next"></button>
                    <button class="swiper-button-prev"></button>
                </div>
                <!-- End of .swiper-container -->
            </section>


            {{-- Catégories section --}}
            <section class="category-section top-category bg-grey pt-10 pb-10 appear-animate">
                <div class="container pb-2">

                    <h2 class="title justify-content-center pt-1 ls-normal mb-5">
                        Catégories les plus consultées</h2>

                    <div class="swiperr">


                        <div class="swiperr-container swiperr-theme pg-show" data-swiper-options="{
                            'spaceBetween': 20,
                            'slidesPerView': 2,
                            'breakpoints': {
                                '576': {
                                    'slidesPerView': 3
                                },
                                '768': {
                                    'slidesPerView': 5
                                },
                                '992': {
                                    'slidesPerView': 6
                                }
                            }
                        }">


                            <div class="swiper-wrapper row cols-lg-6 cols-md-6 cols-sm-3 cols-2  justify-content-center">

                               @if(!is_null($categories))
                                @foreach($categories as $c)
                                <div class="swiper-slide category category-classic  overlay-zoom br-xs mb-1 mx-2 mb-3 bg-white">
                                    <a href="{{ url('/annonces',[Helpers::filterstring($c->category) , $c->id])}} " class="category-media">
                                        <div class="position-relative mb-3 carre-card">
                                            <img src="{{ asset($c->photo)}}" alt="{{{ $c->category}}}"
                                             style="max-width: 63%;">
                                        </div>
                                    </a>
                                    <div class="category-content ">
                                        <a href="{{ url('/annonces',[Helpers::filterstring($c->category) , $c->id])}} " class="btn-link btn-underline">
                                            <h4 class="category-name">
                                                {{ Str::upper($c->category)}}
                                            </h4>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                               @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End of .category-section top-category -->


            {{-- Publicité Barre --}}
            <div class="banner pub banner-fashion appear-animate mb-9" style="background-image: url(front/assets/images/demos/demo1/banners/4.jpg);
                        background-color: #383839;">

            </div>


            {{-- Annonces VIP --}}
            {{-- <section class="margin-y-45">
                <div class="container">
                    <h2 class="title justify-content-center ls-normal mb-4 mt-10 pt-1 appear-animate pb-4">Annonces
                        sponsorisées
                    </h2>
                
                    <div class="product-wrapper row cols-xl-2 cols-sm-1 cols-xs-2 cols-1 mt-4 pb-3">
                        
                        <div class="product product-list ">
                            <figure class="product-media">
                                <a href="{{ url('annonces/single', $an->pk) }}">
                                    <img src="front/assets/images/shop/1.jpg" alt="Product" width="330"
                                        height="338" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="{{ url('annonces/single', $an->pk) }} " class="btn-product-icon  w-icon-search"
                                        title="Quick View"></a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="product-cat">
                                    <a href="#">{{ (!is_null($an->category)) ? $an->category->category: null }}</a>
                                </div>
                               
                                <h4 class="product-name">
                                    <a href="{{ url('annonces/single', $an->pk) }}">Ecran Nasco 32" pouces </a>
                                </h4>
                                <div class="ratings-container d-block">
                                    <a href="{{ url('annonces/single', $an->pk) }}" class="rating-reviews">Abidjan, Yopougon</a>
                                </div>
                                <div class="ratings-container d-block">
                                    <a href="{{ url('annonces/single', $an->pk) }} " class="rating-reviews mt-3">12/08/2022</a>
                                </div>
                                
                                
                                <div class="product-action">
                                    <div class="product-price">30 000 F</div>
                                    <a href="{{ url('annonces/single', $an->pk) }} " class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                </div>
                                
                            </div>
                            <div class="product-label-group">
                                <label class="product-label label-discount">VIP</label>
                            </div>
                        </div>

                       
                    </div>
                </div>
            </section> --}}



            {{-- Les Autres Annonces --}}
            

            @if(!is_null($annonces))
            <section class="margin-y-40">
                <div class="container">
                    <h2 class="title justify-content-center ls-normal mb-4 mt-10 pt-1 appear-animate pb-4">Les annonces en cours
                    </h2>
                   {{-- News --}}
                   <div class="product-wrapper row cols-xl-2 cols-sm-1 cols-xs-2 cols-1 mt-4 pb-3">

                   @foreach($annonces as $an)
                         {{-- Produit item --}}
                    <div class="product product-list ">
                        <a href="{{ url('annonces/single', $an->pk) }}" style="position: absolute; z-index: 999 !important; left: 0; top: 0; width: 100%; height: 100%; ">
                        <a href="{{ url('annonces/single', $an->pk) }}">
                            <figure class="product-media">
                                <a href="{{ url('annonces/single', $an->pk) }}">
                                    <img src="{{  $an->photo_1}}" alt="{{ $an->titre}}" width="330"
                                        height="338" />
                                </a>
                               
    
                                {{-- Ici  --}}
                            </figure>
                            <div class="product-details">
                                <div class="product-cat mt-3 ">
                                    <a href="#">{{ (!is_null($an->category)) ? $an->category->category: null }}</a>
                                </div>
                                <h4 class="product-name">
                                    <a href="{{ url('annonces/single', $an->pk) }}">{{ $an->titre }} </a>
                                </h4>
                                <div class="ratings-container d-block">
                                    <a href="{{ url('annonces/single', $an->pk) }}" class="rating-reviews"> à {{ (!is_null($an->commune)) ? $an->commune->commune : null }}</a>
                                </div>
                                <div class="ratings-container d-block">
                                    <a href="{{ url('annonces/single', $an->pk) }} " class="rating-reviews mt-3">Le: {{ Dates::formatFr($an->created_at) }}</a>
                                </div>
                                
                                
                                <div class="product-action">
                                    <div class="product-price">{{ Helpers::moneyFormat($an->prix)}} F</div>
                                    {{-- <a href="{{ url('annonces/single', $an->pk) }} " class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a> --}}
                                    
                                </div>
                            </div>
                        </a>
                    </div>
                   @endforeach

                </div>

                <div class="container m-auto mb-4">
                    <div class="row justify-content-center text-center">
                        <nav aria-label="page navigation example justify-content-center text-center py-2 pb-4">
                           <div class="row justif-content-center text-center">
                            @if(!is_null($annonces))
                            {{-- {{ $annonces->links() }} --}}
                            <ul class="menu justify-content-end text-right">
                                <li class="hover-underline active-underline text-underline">
                                    <a href="{{ url('/annonces')}} " class="hover-underline active-underline">Voir toutes les annonces <i class="fa fa-arrow-right"></i> </a>
                                </li>
                            </ul>
                            @endif
                           </div>
                        </nav>
                       
                    </div>
                </div>
            </section>  
            @endif





            {{-- Marques --}}
            <section class="brand-section" >

                
                <div class="container m-auto">

                    <h2 class="title title-underline mb-4 ls-normal appear-animate">Nos marques: </h2>
                <div class="swiper-container swiper-theme brands-wrapper mb-9 appear-animate   animation-slider "   data-swiper-options="{
                    'slidesPerView': 1,
                    'autoplay': {
                        'delay': 8000,
                        'disableOnInteraction': false
                    },
                    'slidesPerView': 2,
                    'breakpoints': {
                        '576': {
                            'slidesPerView': 3
                        },
                        '768': {
                            'slidesPerView': 4
                        },
                        '992': {
                            'slidesPerView': 5
                        },
                        '1200': {
                            'slidesPerView': 6
                        }
                    }
                } ">

                    <div class="swiper-wrapper row gutter-no cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2">

                       @if(!is_null(Site::marques()))

                        @foreach(Site::marques() as $m)
                        <div class="swiper-slide brand-col" title="{{ $m->marque}} ">
                            <figure class="brand-wrapper">
                                <img src="{{asset($m->photo) }}" alt="Brand" style="max-width: 120px; margin: auto"
                                    />
                            </figure>
                        </div>
                        @endforeach

                       @endif
                        
                    </div>
                </div>
                <!-- End of Brands Wrapper -->

                </div>

            </section>


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