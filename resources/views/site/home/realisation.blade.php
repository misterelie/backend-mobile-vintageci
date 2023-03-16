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

  @if(!is_null(Site::banner('realisation')))
  <section id="services" class="services" style="margin-top: 47px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <img src="{{ asset('storage/'.Site::banner('realisation'))}} " style="width:100%" />
        </div>
      </div>
    </div>
  </section>
  <!-- FIN BLOC SERVICE -->
  @endif

  <!-- ======= PRESENTATION DE LA PRESTATION ======= -->
  <section id="counts" class="counts">
    <div class="container">

      <div class="section-title">
        <h2>NOS REALISATIONS</h2>
      </div>
      <div class="row">
        @if (!is_null(Site::realisations()))
            @foreach(Site::realisations() as $r)

              <div class="col-lg-4 col-md-4">
                <div class="video-post card my-3 mx-1 p-3">
                  <a href="{{ asset('storage/'. $r->photo)}}" class="glightbox link-video">
                    
                    <img src="{{ asset('storage/'. $r->photo)}}" alt="{{ is_null($r->realisation) ? $r->realisation : null}} " class="img-fluid">

                    <h5 class="text-dark font-weight-bold mt-3">{{ !is_null($r->realisation) ? $r->realisation : null}} </h5>
                  </a>
                </div>
              </div>

            @endforeach
        @endif
      </div>

      <div class="row my-4 py-4">
        @if (!is_null(Site::realisations()))
          <div class="text-right">
              {{ Site::realisations()->links()}}
          </div>
        @endif
      </div>
    </div>
  </section>
  <!-- FIN DU BLOC -->


  <!-- ======= Footer ======= -->
  <!-- ======= Footer ======= -->
  @include('site/layouts/includes/footer')
  <!-- End Footer -->

  {{-- JS FILES --}}
  @include('site/layouts/assets/js')

</body>

</html>