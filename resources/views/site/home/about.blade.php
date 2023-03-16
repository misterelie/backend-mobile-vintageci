<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $page_title}}</title>
  <meta content="" name="Imprimerie spécialisée dans l'impression numérique">
  <meta content="" name="Imprimerie, Design, Infographie">
  @include('site/layouts/assets/css')

</head>

<body>

  <!-- ======= TOP BAR ======= -->
  @include('site/layouts/includes/topbar')

  <!-- ======= HEADER ======= -->
  @include('site/layouts/includes/navbar')
  <!-- FIN HEADER -->

  <!-- ======= BLOC SLIDER ======= -->
  @if(!is_null(Site::banner('presentation')))
  <section id="services" class="services" style="margin-top: 47px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <img src="{{ asset('storage/'.Site::banner('presentation'))}} " style="width:100%" />
        </div>
      </div>
    </div>
  </section>
  <!-- FIN BLOC SERVICE -->
  @endif

  <!-- ======= PRESENTATION DE LA PRESTATION ======= -->
  @if (!is_null(Site::about()))
  <section id="counts" class="counts">
    <div class="container">

      <div class="section-title">
        <h2>PRÉSENTATION</h2>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <img src="{{asset('storage/'.Site::about()->image_about) }} " style="margin-bottom: 25px;" class="img-responsive"
            width="100%" />
        </div>

        <div class="col-lg-6 col-md-6">
          <div style="text-align: left;">
            <p style="font-size: 25px; font-weight: bold; color:#cb0000">
              {{ !is_null(Site::about()->heading) ? Site::about()->heading  : "A propos" }}
            </p>
            <div style="text-justify font-size: 25px;">
              {!! !is_null(Site::about()->presentation) ? Site::about()->presentation : null  !!}
            </div>
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