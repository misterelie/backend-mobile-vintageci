@extends('layouts.base')
@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-2">
                <div class="card card-mediathek-aide">
                    <div
                        class="swiper-wrapper row justify-content-center text-center cols-xl-4 cols-md-4 cols-sm-2 cols-1">
                        <div class="swiper-slide icon-box text-center icon-box-primary">
                            <span class="icon-box-icon icon-email">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">
                                    Adesse mail:
                                </h4>
                                <p>vintage@alloservice.ci </p>

                            </div>
                        </div>
                        <div class="swiper-slide icon-box text-center icon-box-primary">
                            <span class="icon-box-icon icon-headphone">
                                <i class="fa fa-headphones" aria-hidden="true"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">
                                    Téléphone:
                                    </h4>
                                <p>+(225) 27 22 26 88 43 </p>

                            </div>
                        </div>
                        <div class="swiper-slide icon-box text-center icon-box-primary">
                            <span class="icon-box-icon icon-map-marker">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title"> Nos bureaux: :</h4>
                                <p>Abidjan, Cocody Riviera Palmeraie. </p>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-5">
                <div class="col-lg-12 m-auto col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 m-auto">
                            <form action="" method="post" enctype="multipart/form-data">
                                <fieldset>
                                    <div class="card card-auth">
                                        <div class="card-header px-4 py-3 bg-bordeau">
                                            <h4 class="card-title text-white text-center">Laissez-nous un message</h4>
                                        </div>

                                        <div class="card-body p-4">
                                            <div class="form-group mb-2 mt-2">
                                                <label for="user_name" class="form-label">Votre nom : <span
                                                        class="text-red">*</span></label>
                                                <input type="text" name="user_name" id="user_name"
                                                    class="form-control ">
                                            </div>

                                            <div class="form-group mb-2 mt-2">
                                                <label for="email" class="form-label">Votre Adresse email : <span
                                                        class="text-red">*</span></label>
                                                <input type="email" name="user_email" id="user_email"
                                                    class="form-control ">
                                            </div>

                                            <div class="form-group mb-2 mt-2">
                                                <label for="objet" class="form-label">Objet du message : <span
                                                        class="text-red">*</span></label>
                                                <input type="text" name="objet_message" id="objet_message"
                                                    class="form-control ">
                                            </div>

                                            <div class="form-group mb-2 mt-2">
                                                <label for="details_annonce" class="form-label">Votre message :
                                                    <span class="text-red">*</span> </label>
                                                <textarea rows="3" name="details_annonce" id="details_annonce"
                                                    class="form-control" required></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group d-block text-right">
                                            <button type="submit" class="btn submit-btn">Envoyer le message</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection