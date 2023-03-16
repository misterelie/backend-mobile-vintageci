<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $page_title}}</title>
    <meta content="" name="Imprimerie spécialisée dans l'impression numérique">
    <meta content="" name="Imprimerie, Design, Infographie">

    {{-- CSS FILES --}}
    @include('site/layouts/assets/css')

</head>

<body>

    <!-- ======= TOP BAR ======= -->
    @include('site/layouts/includes/topbar')

    <!-- ======= HEADER ======= -->
    @include('site/layouts/includes/navbar')
    <!-- FIN HEADER -->

    <!-- ======= BLOC SLIDER ======= -->
    <section id="services" class="services" style="margin-top: 47px;">
        <div class="container">

            <div class="row">
                @if(!is_null($category->banner))
                <div class="col-lg-12 col-md-12">
                    <img src="{{ asset('storage/'.$category->banner)}} " style="width:100%" />
                </div>
                @endif
            </div>

        </div>
    </section>
    <!-- FIN BLOC SERVICE -->

    <!-- ======= PRESENTATION DE LA PRESTATION ======= -->
    <section id="counts" class="counts">
        <div class="container">

            <div class="section-title">
                <h2 class="text-uppercase">{{ $category->category}}</h2>
            </div>

            <div class="row">
                <p style="font-size: 25px; font-weight: bold; color:#cb0000">
                    {{ !is_null($category->sous_titre) ? $category->sous_titre : null}}
                </p>
                
                
                <div class="text-justify" style="font-size: 25px;">
                   {!! !is_null($category->details) ? $category->details : null !!}
                </div>

            </div>

        </div>
    </section>


    @if (!is_null($category->produits))
            <section id="produits" class="produits">
        <div class="container">

            <div class="section-title">
                <h2>Nos produits</h2>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="swiper sliderProduits">
                        <div class="swiper-wrapper">

                            @foreach ($category->produits as $pr)
                                {{-- Slider item --}}
                            <div class="swiper-slide">
                                <div class="testimonial-wrap">
                                    <div class="testimonial-item">
                                        <img src=" {{ asset('storage/'.$pr->photo)}} " class="testimonial-img" alt="{{ $pr->titre}}">
                                        <h3>{{ $pr->titre}}</h3>
                                        
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div class="custom-swiper-button-next">
                            <span class="bi-chevron-right"></span>
                        </div>
                        <div class="custom-swiper-button-prev">
                            <span class="bi-chevron-left"></span>
                        </div>

                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    @endif


    <!-- FIN DU BLOC -->


    <!-- ======= Footer ======= -->
    <!-- ======= Footer ======= -->
    @include('site/layouts/includes/footer')
    <!-- End Footer -->

    {{-- JS FILES --}}
    @include('site/layouts/assets/js')

</body>

</html>