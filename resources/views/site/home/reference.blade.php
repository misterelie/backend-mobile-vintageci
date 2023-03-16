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

    @if(!is_null(Site::banner('reference')))
    <section id="services" class="services" style="margin-top: 47px;">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <img src="{{ asset('storage/'.Site::banner('reference'))}} " style="width:100%" />
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
        <h2>NOS references</h2>
      </div>
      <div class="row">
        @if (!is_null(Site::references()))
            @foreach(Site::references() as $r)

              <div class="col-lg-2 col-md-2">
                <div class="video-post card my-3 mx-1 p-3">
                  <a href="{{ asset('storage/'. $r->photo)}}" class="glightbox link-video">
                    
                    <img src="{{ asset('storage/'. $r->photo)}}" alt="{{ is_null($r->reference) ? $r->reference : null}} " class="img-fluid">

                    <span class="text-dark d-block font-weight-bold mt-3">{{ !is_null($r->reference) ? $r->reference : null}} </span>
                  </a>
                </div>
              </div>

            @endforeach
        @endif
      </div>

      <div class="row my-4 py-4">
        @if (!is_null(Site::references()))
          <div class="text-right">
              {{ Site::references()->links()}}
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