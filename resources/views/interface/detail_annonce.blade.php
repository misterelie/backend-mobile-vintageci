@extends('layouts.base')
@section('content')

<section id="section-detail">
    <div class="container-fluid">
        <div class="card detail-annonce">
            <div class="wrapper row">
                <div class="preview col-md-6">
                    <div class="tab-content" id="pills-tabContent">

                        @if(!is_null($annonce->photo_1))
                        <div class="tab-pane fade show active" style="text-decoration: none" id="pills-ongletUn"
                            role="tabpanel" aria-labelledby="pills-ongletUn-tab" tabindex="0">
                            <div class="image-box">
                                <img src="{{ Helpers::file_path($annonce->photo_1)}}" class="" alt="">
                            </div>
                        </div>
                        @endif

                        @if(!is_null($annonce->photo_2))
                        <div class="tab-pane fade" id="pills-ongletDeux" role="tabpanel"
                            aria-labelledby="pills-ongletDeux-tab" tabindex="0">
                            <div class="image-box">
                                <img src="{{ Helpers::file_path($annonce->photo_2)}}" class="" alt="">
                            </div>
                        </div>
                        @endif
                        @if(!is_null($annonce->photo_3))
                        <div class="tab-pane fade" id="pills-ongletTrois" role="tabpanel" tabindex="0">
                            <div class="image-box">
                                <img src="{{ Helpers::file_path($annonce->photo_3)}}" class=" img-fluid" alt="">
                            </div>
                        </div>
                        @endif

                        @if(!is_null($annonce->photo_4))
                        <div class="tab-pane fade" id="pills-ongletQuatre" role="tabpanel" tabindex="0">
                            <div class="image-box">
                                <img src="{{ Helpers::file_path($annonce->photo_4)}}" class=" img-fluid"
                                    alt="">
                            </div>
                        </div>

                        @endif
                        @if(!is_null($annonce->photo_5))
                        <div class="tab-pane fade" id="pills-ongletCinq" role="tabpanel" tabindex="0">
                            <div class="image-box">
                                <img src="{{ Helpers::file_path($annonce->photo_5)}}" class=" img-fluid"
                                    alt="">
                            </div>
                        </div>
                        @endif

                        @if(!is_null($annonce->photo_6))
                        <div class="tab-pane fade" id="pills-ongletSix" role="tabpanel" tabindex="0">
                            <div class="image-box">
                                <img src="{{ Helpers::file_path($annonce->photo_6)}}" class=" img-fluid"
                                    alt="">
                            </div>
                        </div>
                        @endif

                        @if(!is_null($annonce->photo_7))
                        <div class="tab-pane fade" id="pills-ongletSept" role="tabpanel" tabindex="0">
                            <div class="image-box">
                                <img src="{{ Helpers::file_path($annonce->photo_7)}}" class=" img-fluid" alt="">
                            </div>
                        </div>
                        @endif

                        @if(!is_null($annonce->photo_8))
                        <div class="tab-pane fade" id="pills-ongletHuit" role="tabpanel" tabindex="0">
                            <div class="image-box">
                                <img src="{{ Helpers::file_path($annonce->photo_8)}}" class=" img-fluid"
                                    alt="">
                            </div>
                        </div>
                        @endif

                        @if(!is_null($annonce->photo_9))
                        <div class="tab-pane fade" id="pills-ongletHuit" role="tabpanel"
                            aria-labelledby="pills-ongletQuat-tab" tabindex="0">
                            <div class="image-box">
                                <img src="{{ Helpers::file_path($annonce->photo_9)}}" class=" img-fluid" alt="">
                            </div>
                        </div>
                        @endif
                       


                    </div>
                    <ul class="nav nav-pills text-center details-pills mb-3" id="pills-tab" role="tablist">
                        @if(!is_null($annonce->photo_1))
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-ongletUn-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-ongletUn" type="button" role="tab" aria-controls="pills-ongletUn"
                                aria-selected="true">

                                @if(!is_null($annonce->photo_1))
                                <div class="gallery-small">
                                    <img src="{{ Helpers::file_path($annonce->photo_1)}}"
                                        class="img-fluid " alt="">
                                </div>
                                @endif
                            </button>
                        </li>
                        @endif

                        @if(!is_null($annonce->photo_2))
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-ongletDeux-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-ongletDeux" type="button" role="tab"
                                aria-controls="pills-ongletDeux" aria-selected="true">
                                @if(!is_null($annonce->photo_2))
                                <div class="gallery-small">
                                    <img src="{{ Helpers::file_path($annonce->photo_2)}}"
                                        class="img-fluid " alt="">
                                </div>
                                @endif
                            </button>
                        </li>
                        @endif

                        @if(!is_null($annonce->photo_3))
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-ongletTrois-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-ongletTrois" type="button" role="tab"
                                aria-controls="pills-ongletTrois" aria-selected="true">
                                @if(!is_null($annonce->photo_3))
                                <div class="gallery-small">
                                    <img src="{{ Helpers::file_path($annonce->photo_3)}}"
                                        class="img-fluid " alt="">
                                </div>
                                @endif
                            </button>
                        </li>
                        @endif

                        @if(!is_null($annonce->photo_4))
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-ongletQuatre-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-ongletQuatre" type="button" role="tab"
                                aria-controls="pills-ongletQuatre" aria-selected="true">
                                @if(!is_null($annonce->photo_4))
                                <div class="gallery-small">
                                    <img src="{{ Helpers::file_path($annonce->photo_4)}}"
                                        class="img-fluid " alt="">
                                </div>
                                @endif
                            </button>
                        </li>
                        @endif

                        @if(!is_null($annonce->photo_5))
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-ongletCinq-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-ongletCinq" type="button" role="tab"
                                aria-controls="pills-ongletCinq" aria-selected="true">
                                @if(!is_null($annonce->photo_5))
                                <div class="gallery-small">
                                    <img src="{{ Helpers::file_path($annonce->photo_5)}}"
                                        class="img-fluid " alt="">
                                </div>
                                @endif
                            </button>
                        </li>
                        @endif

                        @if(!is_null($annonce->photo_6))
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-ongletSix-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-ongletSix" type="button" role="tab"
                                aria-controls="pills-ongletSix" aria-selected="true">
                                @if(!is_null($annonce->photo_6))
                                <div class="gallery-small">
                                    <img src="{{ Helpers::file_path($annonce->photo_6)}}"
                                        class="img-fluid " alt="">
                                </div>
                                @endif
                            </button>
                        </li>
                        @endif

                        @if(!is_null($annonce->photo_7))
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-ongletSept-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-ongletSept" type="button" role="tab"
                                aria-controls="pills-ongletSept" aria-selected="true">
                                @if(!is_null($annonce->photo_7))
                                <div class="gallery-small">
                                    <img src="{{ Helpers::file_path($annonce->photo_7)}}"
                                        class="img-fluid " alt="">
                                </div>
                                @endif
                            </button>
                        </li>
                        @endif

                        @if(!is_null($annonce->photo_8))
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-ongletHuit-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-ongletHuit" type="button" role="tab"
                                aria-controls="pills-ongletHuit" aria-selected="true">
                                @if(!is_null($annonce->photo_8))
                                <div class="gallery-small">
                                    <img src="{{ Helpers::file_path($annonce->photo_8)}}"
                                        class="img-fluid " alt="">
                                </div>
                                @endif
                            </button>
                        </li>
                        @endif

                        @if(!is_null($annonce->photo_9))
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-ongletNeuf-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-ongletNeuf" type="button" role="tab"
                                aria-controls="pills-ongletNeuf" aria-selected="true">
                                @if(!is_null($annonce->photo_9))
                                <div class="gallery-small">
                                    <img src="{{ Helpers::file_path($annonce->photo_9)}}" class="" alt="">
                                </div>
                                @endif
                            </button>
                        </li>
                        @endif
                    </ul>
                </div>

                <div class="card-body details col-md-6">
                    <h3 class="product-title">{{$annonce->titre}}</h3>
                    <h4 class="price">{{$annonce->prix}} <span><sup>F</sup></span></h4>
                    <h4 class="price">categorie: @if(!is_null($annonce->category))
                        <span>{{$annonce->category->category}} </span>
                    </h4>
                    @endif

                    <h4 class="price">Lieu: @if(!is_null($annonce->commune))
                        <span>{{$annonce->commune->commune}} </span>
                    </h4>
                    @endif

                    <h4 class="price">Publiée : Il y a {{Dates::ago($annonce->created_at)}} </h4>
                    <div class="action">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary add-to-cart btn btn-default" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Contacter le vendeur
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content modal-dialog-centered modal-infos">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Infos vendeur
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @if(!is_null($annonce->user))
                                        <h5 class="vendeur-name"><span class="text-black">
                                                Nom: <br><br> </span>{{$annonce->user->user_firstname}}
                                        </h5>
                                        @endif

                                        <h5 class="vendeur-number">
                                            @if(!is_null($annonce->user))
                                            <span class="text-black mb-2">Numéro whatsapp:
                                                <br><br></span>{{$annonce->user->user_whatsapp}}
                                        </h5>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="rating">
                        <div class="stars">
                            <span class="checked"><a class="btn text-white btn-floating m-1"
                                    style="background-color: #4267B2;" href="#!" role="button">
                                    <i class="fa fa-facebook" aria-hidden="true"></i></a>
                            </span>
                            <span class="checked"><a class="btn text-white btn-floating m-1"
                                    style="background-color: #24a223;" href="#!" role="button">
                                    <i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                            </span>
                            <span class="checked">
                                <a class="btn text-white btn-floating m-1" style="background-color: #0082ca;" href="#!"
                                    role="button"><i class="fa fa-linkedin"></i>
                                </a>
                            </span>
                            <span>
                                <a class="btn text-white btn-floating m-1" style="background-color: #0082ca;" href="#!"
                                    role="button"><img alt="messenger sharing button"
                                        src="https://platform-cdn.sharethis.com/img/messenger.svg">
                                </a>
                            </span>
                        </div>
                    </div><br>
                    <h5 class="product-description"><span>Description:</span><br><br>
                        <p> {!!$annonce->details!!}
                        </p>
                    </h5>
                </div>
            </div>
        </div>

        {{-- <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="slick-wrapper">
                                    <div class="slider-for mb-3">
                                        <div class="slick-slide-item">
                                            <img src="{{ Helpers::file_path($annonce->photo_1)}}" class=""
                                                alt="image">
                                        </div>
                                        <div class="slick-slide-item">
                                            <img src="{{ Helpers::file_path($annonce->photo_2)}}" class=""
                                                alt="image">
                                        </div>
                                        <div class="slick-slide-item">
                                            <img src="{{ Helpers::file_path($annonce->photo_3)}}" class=""
                                                alt="image">
                                        </div>

                                    </div>
                                    <div class="slick-nav-wrapper">
                                        <div class="slider-nav">
                                            @if(!is_null($annonce->photo_1))
                                            <div class="slick-slide-item m-2">
                                                <img src="{{ Helpers::file_path($annonce->photo_1)}}"
                                                    class="" alt="image">
                                            </div>
                                            @endif

                                            @if(!is_null($annonce->photo_2))
                                            <div class="slick-slide-item m-2">
                                                <img src="{{ Helpers::file_path($annonce->photo_2)}}"
                                                    class="" alt="image">
                                            </div>
                                            @endif

                                            @if(!is_null($annonce->photo_3))
                                            <div class="slick-slide-item m-2">
                                                <img src="{{ Helpers::file_path($annonce->photo_3)}}"
                                                    class="" alt="image">
                                            </div>
                                            @endif

                                            @if(!is_null($annonce->photo_4))
                                            <div class="slick-slide-item m-2">
                                                <img src="{{ Helpers::file_path($annonce->photo_4)}}"
                                                    class="" alt="image">
                                            </div>
                                            @endif

                                            @if(!is_null($annonce->photo_5))
                                            <div class="slick-slide-item m-2">
                                                <img src="{{ Helpers::file_path($annonce->photo_5)}}"
                                                    class="" alt="image">
                                            </div>
                                            @endif

                                            @if(!is_null($annonce->photo_6))
                                            <div class="slick-slide-item m-2">
                                                <img src="{{ Helpers::file_path($annonce->photo_6)}}"
                                                    class="" alt="image">
                                            </div>
                                            @endif

                                            @if(!is_null($annonce->photo_7))
                                            <div class="slick-slide-item m-2">
                                                <img src="{{ Helpers::file_path($annonce->photo_7)}}"
                                                    class="" alt="image">
                                            </div>
                                            @endif

                                            @if(!is_null($annonce->photo_8))
                                            <div class="slick-slide-item m-2">
                                                <img src="{{ Helpers::file_path($annonce->photo_8)}}"
                                                    class="" alt="image">
                                            </div>
                                            @endif

                                            @if(!is_null($annonce->photo_9))
                                            <div class="slick-slide-item m-2">
                                                <img src="{{ Helpers::file_path($annonce->photo_9)}}"
                                                    class="" alt="image">
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="d-flex justify-content-between align-items-start mt-4 mt-md-0">
                                    <div>
                                        @if(!is_null($annonce->titre))
                                        <div class="small text-muted mb-2">Détails du produit</div>
                                        <h2>{{$annonce->titre}}</h2>
                                        @endif
                                        <p>
                                            <span class="badge bg-success"></span>
                                        </p>
                                        <p></p>
                                        <div class="d-flex gap-3 mb-3 align-items-center">
                                            <h4 class="text-muted mb-0">
                                                <del></del>
                                            </h4>
                                            @if(!is_null($annonce->prix))
                                            <h4 style="color:#24a223; font-weight:bold" class="mb-0">{{$annonce->prix}}
                                                <sup>FCFA</sup></h4>
                                            @endif
                                        </div>

                                        @if(!is_null($annonce->category))
                                        <p>Catégorie: <span>{{$annonce->category->category}}</span></p>
                                        @endif

                                        @if(!is_null($annonce->commune))
                                        <p>Lieu: <span> {{ $annonce->commune->commune}}</span> </p>
                                        @endif

                                        @if(!is_null($annonce->commune))
                                        <p>Publiée: <span> Il y a {{Dates::ago($annonce->created_at)}} </span> </p>
                                        @endif

                                        <div class="action">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary add-to-cart btn btn-default"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Contacter le vendeur
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content modal-dialog-centered modal-infos">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Infos
                                                                vendeur
                                                            </h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if(!is_null($annonce->user))
                                                            <h5 class="vendeur-name"><span class="text-black">
                                                                    Nom: <br><br>
                                                                </span>{{$annonce->user->user_firstname}}
                                                            </h5>
                                                            @endif

                                                            <h5 class="vendeur-number">
                                                                @if(!is_null($annonce->user))
                                                                <span class="text-black mb-2">Numéro whatsapp:
                                                                    <br><br></span>{{$annonce->user->user_whatsapp}}
                                                            </h5>
                                                            @endif
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Fermer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="rating">
                                            <div class="stars">
                                                <span class="checked"><a class="btn text-white btn-floating m-1"
                                                        style="background-color: #4267B2;" href="#!" role="button">
                                                        <i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                </span>
                                                <span class="checked"><a class="btn text-white btn-floating m-1"
                                                        style="background-color: #24a223;" href="#!" role="button">
                                                        <i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                                                </span>
                                                <span class="checked">
                                                    <a class="btn text-white btn-floating m-1"
                                                        style="background-color: #0082ca;" href="#!" role="button"><i
                                                            class="fa fa-linkedin"></i>
                                                    </a>
                                                </span>
                                                <span>
                                                    <a class="btn text-white btn-floating m-1"
                                                        style="background-color: #0082ca;" href="#!" role="button"><img
                                                            alt="messenger sharing button"
                                                            src="https://platform-cdn.sharethis.com/img/messenger.svg">
                                                    </a>
                                                </span>
                                            </div>
                                        </div><br>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-2">
                    <div class="card-header">
                        <ul class="nav nav-pills">
                            <h5 class="product-description"><span
                                    style="color:#24a223; font-weight:bold">Description:</span></h5>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="description" role="tabpanel"
                                aria-labelledby="description-tab">
                                <p class="product-description"><span style="font-size: 11px">
                                        {!!$annonce->details!!}</span></p>
                            </div>
                        </div>
                    </div><br><br>
                </div><br><br>
            </div>
        </div> --}}
    </div>
</section>
@endsection