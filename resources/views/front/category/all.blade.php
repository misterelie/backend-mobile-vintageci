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
                        <li><a href="{{ url('/annonces/categories')}}">Toutes les catégories</a></li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Page Content -->
            <div class="page-content mb-10 mt-4">

                
            {{-- Catégories section --}}
            <section class="category-section top-category bg-grey pt-10 pb-10 appear-animate">
                <div class="container pb-2">

                    <h2 class="title justify-content-center pt-1 ls-normal mb-5">Toutes les catégories </h2>

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