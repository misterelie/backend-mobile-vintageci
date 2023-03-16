<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $page_title}}</title>
  <meta content="" name="Imprimerie spécialisée dans l'impression numérique">
  <meta content="" name="Imprimerie, Design, Infographie">

  <!-- CSS FILES -->
  @include('site/layouts/assets/css')

</head>

<body>

  <!-- ======= TOP BAR ======= -->
    @include('site/layouts/includes/topbar')

  <!-- ======= HEADER ======= -->
  @include('site/layouts/includes/navbar')

  <!-- FIN HEADER -->

    <!-- ======= BLOC SLIDER ======= -->
    @include('site/layouts/includes/slider')
    
    <!-- FIN BLOC SERVICE -->


    <!-- ======= STATISTIQUES ======= -->
      @if (!is_null(Site::chiffres()))
      <section id="counts" class="counts">
        <div class="container">
  
          <div class="section-title">
            <h2><span style="font-size:19px;">Quelques chiffres de </span><br/>
              notre entreprise</h2>
          </div>
  
          <div class="row">
            @foreach (Site::chiffres() as $c)
            <div class="col-lg-2 col-md-6 m-auto">
              <div class="count-box">
                <p style="color:#fff;">+ de</p>
                <span data-purecounter-start="0" data-purecounter-end="{{$c->value}}" data-purecounter-duration="1" class="purecounter" style="font-weight:bold; font-size:50px; color:#fff;"></span>
                <span class="d-block text-white" style="font-size: 14px; line-height: 22px">
                    {{ str_replace("+ de", "", trim($c->heading))}}
                </span>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>
      @endif
    <!-- FIN STATISTIQUES -->



    <!-- ======= BLOC VIDEO ======= -->
    <section id="appointment" class="appointment section-bg">
      <div class="container">

        <div class="section-title">
          <h2 style="color:#fff"><span style="font-size:19px;">Impression de qualité </span><br/>
            à moindre coût</h2>
        </div>
          <div class="row">
            <div class="col-lg-12">
              <iframe style="border: 1px solid #ffb400; border-radius: 2px;" width="100%" height="540" src="https://www.youtube.com/embed/{{!is_null(Site::video()) ? Site::video()->code : "x5a2Mrcd02A"}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
            </div>
          </div>
      </div>
    </section><!-- FIN BLOC VIDEO -->

    <!-- ======= TEMOIGNAGE ======= -->
    @if (!is_null(Site::temoignages()))
    <section id="testimonials" class="testimonials">
      <div class="container">

        <div class="section-title">
          <h2 style="color:#fff"><span style="font-size:19px;">Témoignages </span><br/>
            Ce qu'ils disent de nous</h2>
        </div>

        
        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
            @foreach (Site::temoignages() as $t)
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  @if (!is_null($t->photo))
                  <img src="{{ asset('storage/'.$t->photo) }}" class="testimonial-img" alt="{{ $t->nom_complet}}">
                  @endif
                  
                  <h3>{{ $t->nom_complet}}</h3>
                  <h4>{{ !is_null($t->poste) ? $t->poste : ""}}</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                   {{ $t->message}}
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div>
            @endforeach
            <!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>
       

      </div>
    </section>
    @endif
   
    <!-- FIN TEMOIGNAGE -->


  <!-- ======= Footer ======= -->
  @include('site/layouts/includes/footer')
  <!-- End Footer -->

  {{-- JS FILES --}}
  @include('site/layouts/assets/js')
</body>

</html>