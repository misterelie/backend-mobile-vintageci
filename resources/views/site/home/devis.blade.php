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
    @if(!is_null(Site::banner('devis')))
    <section id="services" class="services" style="margin-top: 47px;">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <img src="{{ asset('storage/'.Site::banner('devis'))}} " style="width:100%" />
          </div>
        </div>
      </div>
    </section>
    <!-- FIN BLOC SERVICE -->
    @endif
    <!-- FIN BLOC SERVICE -->

    <!-- ======= PRESENTATION DE LA PRESTATION ======= -->
    <section style="background-color:#eeeeee; margin-top: -60px;">
        <div class="container">

            <div class="section-title">
                <h2>DEMANDEZ UN DEVIS</h2>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8 m-auto">
                    <p style="text-align: center; font-size: 15px; font-weight: bold; color:#cb0000">
                        NB: Veuillez renseigner les champs obligatoires (marqués par une étoile!).
                    </p>
                    <br />
                   
                    <form method="POST" action="{{ url
                    ('devis/store')}} " enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                            <label style="padding-left: 15px;" for="exampleInputEmail1" class="form-label">Nom et
                                Prénom(s) ou Raison sociale <span style="color:#cb0000">*</span></label>
                            <input style="padding: 10px 10px;" type="text" class="form-control" id="nom"
                                name="nom" required>
                        </div>

                        <div class="mb-3">
                            <label style="padding-left: 15px;" for="phone" class="form-label">Numéro de
                                téléphone <span style="color:#cb0000">*</span></label>
                            <input style="padding: 10px 10px;" type="number" class="form-control" id="phone"
                                name="phone" required>
                        </div>

                        <div class="mb-3">
                            <label style="padding-left: 15px;" for="email
                            " class="form-label">Adresse
                                email</label>
                            <input style="padding: 10px 10px;" type="email" class="form-control" id="exampleInputEmail1"
                                name="email">
                        </div>

                        <div class="mb-3">
                            <label style="padding-left: 15px;" for="o+bjet" class="form-label">Que
                                voulez-vous commander? <span style="color:#cb0000">*</span></label>
                            <select style="padding: 10px 10px;" class="form-select" name="objet" required>
                                <option value="Cartes de visite">Carte de visite</option>
                                <option value="Kakémono">Kakémono</option>
                                <option value="Pin's">Pin's</option>
                                <option value="Flyers">Flyers</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label style="padding-left: 15px;" for="tail
                            l
                            e" class="form-label">Précicez les
                                dimensions</label>
                            <input style="padding: 10px 10px;" type="text" class="form-control" id="taille" name="taille">
                        </div>

                        <div class="mb-3">
                            <label style="padding-left: 15px;" for="quantite" class="form-label">Précicez la
                                quantité <span style="color:#cb0000">*</span></label>
                            <input style="padding: 10px 10px;" type="number" class="form-control"
                                id="quantite" name="quantite" required>
                        </div>

                        <div class="mb-3">
                            <label style="padding-left: 15px;" for="lieu" class="form-label">Lieu de la
                                livraison <span style="color:#cb0000">*</span></label>
                            <input style="padding: 10px 10px;" type="text" class="form-control" id="lieu"
                                name="lieu" required>
                        </div>

                        <div class="mb-3">
                            <label style="padding-left: 15px;" for="pj" class="form-label">Charger un fichier
                                (pdf, docx, jpeg ou png)</label>
                            <input class="form-control" name="pj" id="pj"  type="file">
                        </div>


                        <div class="mb-3">
                            <label style="padding-left: 15px;" for="details"
                                class="form-label">Précisez si possible des détails pour votre commande</label>
                            <textarea class="form-control" id="details" rows="6" name="details">

                            </textarea>
                        </div>

                        <div class="fo+rm-group mb-3 text-right text-end">
                            <button style="background-color: #cb0000; border-color: #cb0000;" type="submit"
                                class="btn btn-primary">Envoyer votre devis</button>
                        </div>
                    </form>
                 
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