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

    @if(!is_null(Site::banner('contact')))
    <section id="services" class="services" style="margin-top: 47px;">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <img src="{{ asset('storage/'.Site::banner('contact'))}} " style="width:100%" />
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
                <h2>NOUS CONTACTER</h2>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div style="text-align: left;">
                         @if(!is_null(Site::adresse()))
                        <p style="font-size: 25px; font-weight: bold; color:#cb0000">
                            Nos contacts directs<br />
                        </p>

                        @if(!is_null(Site::adresse()->phone_one))
                        <div style="margin-bottom: 10px;">
                            <i style="background-color: #cb0000; color:#fff; padding: 3px; border-radius: 1px; font-size: 25px; margin-right: 5px;"
                                class="bx bxl-cel bx-phone"></i></a>
                            <span style="font-size: 20px; color: black; font-family: Arial, Helvetica, sans-serif;">{{Site::adresse()->phone_one }}</span>
                        </div>
                        @endif

                         @if(!is_null(Site::adresse()->phone_two))
                        <div style="margin-bottom: 10px;">
                            <i style="background-color: #cb0000; color:#fff; padding: 3px; border-radius: 1px; font-size: 25px; margin-right: 5px;"
                                class="bx bxl-cel bx-phone"></i></a>
                            <span style="font-size: 20px; color: black; font-family: Arial, Helvetica, sans-serif;"> {{ Site::adresse()->phone_two}} </span>
                        </div>
                        @endif

                        @if(!is_null(Site::adresse()->email_one))
                        <div style="margin-bottom: 10px;">
                            <i style="background-color: #cb0000; color:#fff; padding: 3px; border-radius: 1px; font-size: 25px; margin-right: 5px;"
                                class="bx bxl-email bx-envelope"></i></a>
                            <span
                                style="font-size: 20px; color: black; font-family: Arial, Helvetica, sans-serif;">{{ Site::adresse()->email_one }}</span>
                        </div>

                        @endif
                        
                        @if(!is_null(Site::adresse()->adresse))
                        <div style="margin-bottom: 10px;">
                            <i style="background-color: #cb0000; color:#fff; padding: 3px; border-radius: 1px; font-size: 25px; margin-right: 5px;"
                                class="bx bxl-map bx-current-location"></i></a>
                            <span
                                style="font-size: 20px; color: black; font-family: Arial, Helvetica, sans-serif;">{{Site::adresse()->adresse }}</span>
                        </div>
                        @endif

                        <br />
                        <p style="font-size: 25px; font-weight: bold; color:#cb0000">
                            Nous localiser<br />
                        </p>

                        <div class="col-lg-12">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.3033058553906!2d-3.935936185809298!3d5.37063113698098!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1eba4590a9eb9%3A0xb8058b6258e99591!2sIMPRESSION%20KDO!5e0!3m2!1sfr!2sci!4v1662136497994!5m2!1sfr!2sci"
                                width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        @endif
                    </div>

                </div>
                <div class="col-lg-6 col-md-6" id="message">
                    <p style="text-align: left; font-size: 25px; font-weight: bold; color:#cb0000">
                        Envoyez-nous un message
                    </p>

                    <p>
                    <form action="{{ url('/message/store') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="mb-3" style="text-align: left;">
                            <input style="padding: 12px 10px;" type="text" class="form-control"
                                id="nom_complet" name="my_personnal" placeholder="Votre nom ou raison sociale" required>
                        </div>
                        <div class="mb-3">
                            <input style="padding: 12px 10px;" type="text" class="form-control"
                                id="telephone" name="my_phone_add" placeholder="Votre numéro de téléphone" required>
                        </div>
                        <div class="mb-3">
                            <input style="padding: 12px 10px;" type="email" class="form-control"
                                id="email" name="my_address" placeholder="Votre mail" required>
                        </div>
                        <div class="mb-3">
                            <input style="padding: 12px 10px;" type="text" class="form-control"
                                id="adresse" name="my_location" placeholder="Votre adresse" required>
                        </div>
                        <div class="mb-3">
                            <input style="padding: 12px 10px;" type="objet" class="form-control"
                                id="objet" name="my_subject" placeholder="Objet de votre message" required>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" id="msg" name="my_content" rows="7" required></textarea>
                        </div>

                        <div class="form-group form-check mb-3 justify-content-left text-left">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" required name="im_human" value="im_human">
                            <label class="form-check-label text-left float-left text-black font-weight-bold" for="exampleCheck1">Je ne suis pas un robot</label>
                        </div>

                        <div class="form-group mb-3 text-right">
                            <button style="background-color: #cb0000; border-color: #cb0000;" class="btn btn-primary"
                                type="submit">Envoyer le message</button>
                        </div>
                        </span>
                </div>


                </form>
                </p>
            </div>


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