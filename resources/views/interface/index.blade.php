<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vintage Ci</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>
    {{-- <header>
        <div class="container-fluid">
            <!-- Button trigger modal -->
            <div class="mobile-toggler d-lg-none">
                <a href="#" data-bs-toggle="modal" data-bs-target="#navbModal">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <div class="navb-logo">
                <a href="{{ route('interface.index') }}"><img
                        src="{{ asset('assets/img/icon-android.png') }}" alt="Logo"></a>
            </div>

            <div class="mobile-toggler d-lg-none">
                <a href="{{ route('interface.login') }}">
                    <i class="fa fa-user-plus"></i>
                </a>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="navbModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <a href="{{ route('interface.index') }}"><img
                                    src="{{ asset('assets/img/ICONES-04.png') }}" alt="Logo"></a>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </div>
                        <div class="modal-body">
                            <div class="modal-line">

                            </div>
                            <div class="modal-line mb-2">
                                <i class="fa fa-home" aria-hidden="true"></i><a
                                    href="{{ route('interface.index') }}">Accueil</a>
                            </div>
                            <div class="modal-line">
                                <i class="fa fa-list" aria-hidden="true"></i><a
                                    href="{{ route('all-category-product') }}">Toutes Les
                                    Catégories</a>
                            </div>
                            <div class="modal-line">
                                <i class="fa fa-bullhorn" aria-hidden="true"></i><a href="#">Poster Une Annonce<a>
                            </div>

                            <div class="modal-line">
                                <i class="fa fa-plus" aria-hidden="true"></i><a
                                    href="{{ route('annonce-product') }}">Toutes les annonces</a>
                            </div>

                            <div class="modal-line">
                                <i class="fa fa-plus" aria-hidden="true"></i><a
                                    href="{{ route('interface.annonce_vip', 'boost') }}">Les
                                    Annonces VIP</a>
                            </div>

                            <div class="modal-line">
                                <i class="fa fa-plus" aria-hidden="true"></i><a
                                    href="{{ route('interface.commune') }}">Annonces Par
                                    Commune</a>
                            </div>

                            <div class="modal-line">
                                <i class="fa fa-credit-card" aria-hidden="true"></i><a
                                    href="{{ route('interface.buy_credit') }}">Acheter Du Crédit</a>
                            </div>

                            <div class="modal-line">
                                <i class="fa fa-question" aria-hidden="true"></i><a
                                    href="{{ route('interface.mediatheque_aide') }}">Aide</a>
                            </div>

                            <div class="modal-line">
                                <i class="fa fa-phone" aria-hidden="true"></i><a
                                    href="{{ url('interface.contact') }}">Contactez-nous</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header> --}}
    <header>
        <div class="container-fluid">
            <!-- Button trigger modal -->
            <div class="mobile-toggler d-lg-none">
                <a href="#" data-bs-toggle="modal" data-bs-target="#navbModal">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <div class="navb-logo">
                <a href="{{ route('interface.index') }}">
                    <img src="{{ asset('assets/img/icon-android.png') }}" alt="Logo"></a>
            </div>

            <div class="mobile-toggler d-lg-none">
                <a href="{{ route('interface.login') }}">
                    <i class="fa fa-user-plus"></i>
                </a>
            </div>
           
        </div>
    </header>

    <section>
        <!-- Bottom Navbar -->
        <nav class="navbar py-15 navbar-dark  navbar-expand fixed-bottom">
            <ul class="navbar-nav nav-justified w-100">
                <li class="nav-item">
                    <a href="{{ route('interface.index') }}" class="nav-link text-center">
                        <i class="fa fa-home iconbottombar" aria-hidden="true"></i>
                        <span class="small d-block">Retour à l'Accueil</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('all-category-product') }}" class="nav-link text-center">
                        <i class="fa fa-list-alt iconbottombar" aria-hidden="true"></i>
                        <span class="small d-block">Toutes les catégories</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('interface.login') }}" class="nav-link text-center">
                        <i class="fa fa-bullhorn iconbottombar" aria-hidden="true"></i>
                        <span class="small d-block">Postez une annonce</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('interface.mediatheque_aide') }}" class="nav-link text-center">
                        <i class="fa fa-question iconbottombar" aria-hidden="true"></i>
                        <span class="small d-block">Comment ça marche?</span>
                    </a>
                </li>
            </ul>
        </nav>
    </section>

    <!-- As a link -->
    <section id="slide">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/img/BANNIERE.jpg') }}" class="d-block w-75"
                        alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/BANNIERE.jpg') }}" class="d-block w-75"
                        alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/BANNIERE.jpg') }}" class="d-block w-75"
                        alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section> <br>

    <section id="section-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 col-lg-10 col-sm-10 d-block text-center m-auto">
                    <form action="{{url('/search')}}" class="search-bar" method="GET">
                        <div class="input-group mb-3 form-search">
                            <input type="text" class="form-control" placeholder="Rechercher..." name="q" id="search">
                            <span class="input-group-text" id="basic-addon">
                                <button type="submit" class="btn btn-default btn-search"><i class="fas fa fa-search"></i> </button>
                            </span>
                        </div>
                    </form>

                    <a href="{{ route('interface.pub_annonce') }}"
                        class="btn btn-block btn-primary text-center w-100 my-1">
                        <h6 class="text-bottom">Postez Votre Annonce</h6>
                    </a>
                    
                </div>
            </div>
        </div>
    </section>

    <!--section product--->
    <section id="card w-100">
        <div class="container">
            <div class="row">
                <h5 class="title-annonce text-center">Les annonces en cours...</h5>
                <div class="col-lg-12 col-12 col-md-12 m-auto">
                    <div class="form-group ">
                        @if(Session::has('success'))
                            <div class="alert alert-icon alert-success mb-4 alert-bg alert-inline ">
                                <h4 class="alert-title">
                                    <i class="fas fa-check"></i>Réussite !
                                </h4> {{ Session::get('success') }}.
                            </div>
                        @endif

                        @if(Session::has('error'))
                            <div class="alert mb-4 alert-icon alert-error alert-bg alert-inline ">
                                <h4 class="alert-title">
                                    <i class="w-icon-times-circle"></i>Alerte !
                                </h4> {{ Session::get('error') }}.
                            </div>
                        @endif
                    </div>

                    @foreach($vips as $annonce)
                        <div class="card card-item mb-3">
                            <a href="{{ url('annonces/single', $annonce->pk) }}"
                                class="lien-annonce"></a>
                            <table width="100%">
                                <tbody width="100%">
                                    <tr width="100%">
                                        <td class="media-col width-25">
                                            <div class="card-media">
                                                <a href="{{ url('/') }}">
                                                    <img src="{{ Helpers::file_path($annonce->photo_1) }}"
                                                        class="img-fluid rounded-start" alt="...">
                                                </a>
                                            </div>
                                        </td>
                                        <td class="width-75">
                                            <div class="card-details position-relative">
                                                    <span class="vtg-badge badge-vip">VIP</span>
                                                    <div class="item-name">
                                                        <h3>{{ $annonce->titre }}</h3>
                                                    </div>
                                                    <div class="item-infos">
                                                        <div class="item-details">

                                                        </div>
                                                        <div class="item-meta">
                                                            <span class="date">Il y a
                                                                {{ Dates::ago($annonce->created_at) }}
                                                            </span>
                                                            @if(!is_null($annonce->commune))
                                                                <span class="city">{{ $annonce->commune }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="item-price">
                                                            <h2 class="price">
                                                                {{ Helpers::moneyFormat($annonce->prix) }} <sup
                                                                    class="currency">FCFA</sup></h2>
                                                        </div>
                                                    </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                    {{-- fin de la carte --}}

                    <!-- product no vip--->
                    <div class="col-lg-12 col-12 col-md-12 m-auto">
                        @foreach($annonces as $annonce)
                            <div class="card card-item-novip mb-3">
                                <a href="{{ url('annonces/single', $annonce->pk) }}"
                                    class="lien-annonce"></a>
                                <table width="100%">
                                    <tbody width="100%">
                                        <tr width="100%">
                                            <td class="media-col width-25">
                                                <div class="card-media">
                                                    <a href="{{ url('/') }}">
                                                        <img src="{{ Helpers::file_path($annonce->photo_1) }}"
                                                            class="img-fluid rounded-start" alt="...">
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="width-75">
                                                <div class="card-details position-relative">
                                                    <blade
                                                        if|(!is_null(annonce-%3Ecategory))%20%3Cspan%20class%3D%26%2334%3Bitem-category%26%2334%3B%3E%7B%7B%2524annonce-%253Ecategory-%253Ecategory%7D%7D%3C%2Fspan%3E%40endif%0D>
                                                        <div class="item-name">
                                                            <h3>{{ $annonce->titre }}</h3>
                                                        </div>
                                                        <div class="item-infos">
                                                            <div class="item-details">

                                                            </div>
                                                            <div class="item-meta">
                                                                <span class="date">Il y a
                                                                    {{ Dates::ago($annonce->created_at) }}
                                                                </span>
                                                                <blade
                                                                    if|(!is_null(%24annonce-%3Ecommune))%20%3Cspan%20class%3D%26%2334%3Bcity%26%2334%3B%3E%7B%7B%2524annonce-%253Ecommune-%253Ecommune%7D%7D%3C%2Fspan%3E%40endif%0D>
                                                            </div>
                                                            <div class="item-price">
                                                                <h2 class="price">
                                                                    {{ Helpers::moneyFormat($annonce->prix) }}
                                                                    <sup class="currency">FCFA</sup></h2>
                                                            </div>
                                                        </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                        {{-- fin annonce non vip --}}
                    </div>
                    <div class="view-plus">
                        <a class="btn btn-lg btn-success" href="{{ route('annonce-product') }}"
                            role="button">Voir toutes les annonces »</a>
                    </div>
                </div>
            </div>
        </div>
    </section><br><br>
    <hr>

    <!-- Bottom Navbar -->
    <section>
        <!-- Bottom Navbar -->
        <nav class="navbar py-15 navbar-dark navbar-expand fixed-bottom">
            <ul class="navbar-nav nav-justified w-100">
                <li class="nav-item">
                    <a href="{{ route('interface.buy_credit') }}" class="nav-link text-center">
                        <i class="fa fa-list-alt iconbottombar" aria-hidden="true"></i>
                        <span class="small d-block">Acheter Du Crédit</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('all-category-product') }}" class="nav-link text-center">
                        <i class="fa fa-list-alt iconbottombar" aria-hidden="true"></i>
                        <span class="small d-block">Toutes les catégories</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('interface.login') }}" class="nav-link text-center">
                        <i class="fa fa-bullhorn iconbottombar" aria-hidden="true"></i>
                        <span class="small d-block">Postez une annonce</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('interface.mediatheque_aide') }}" class="nav-link text-center">
                        <i class="fa fa-question iconbottombar" aria-hidden="true"></i>
                        <span class="small d-block">Comment ça marche?</span>
                    </a>
                </li>
            </ul>
        </nav>

    </section>
    <!-- end section product--->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>


</html>