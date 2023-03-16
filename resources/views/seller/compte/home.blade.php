@extends('seller.partials.page')

@section('page')


        <!-- Start of Main -->
        <main class="main">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0"> Mon compte </h1>
                </div>
            </div>
            <!-- End of Page Header -->



            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav mb-10 pb-1">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/')}}">Accueil</a></li>
                        <li>Compte client</li>
                        <li>Tableau de bord</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            {{-- Account  Alert --}}
            @include('seller.partials.alert')



            <!-- Start of PageContent -->
            <div class="page-content pt-2">
                <div class="container">
                    <div class="tab tab-vertical row gutter-lg">
                        
                        {{-- SideBar --}}
                        @include('seller.partials.sidebar')
                       

                        <div class="tab-content mb-6">


                            <div class="tab-pane active in mb-4" id="account-dashboard">

                                {{-- Header --}}
                                @include('seller.partials.header')

                                <p class="greeting mb-4">
                                    Bienvenue
                                    <span class="text-dark font-weight-bold">{{ User::user()->user_firstname. " ". User::user()->user_lastname }}</span>
                                </p>

                                

                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-3 col-xs-6 mb-4">
                                        <a href="{{ url('/account/mes-annonces') }}" class="link-to-tab">
                                            <div class="icon-box text-center">
                                                <h3>{{ Stat::countAnnonce()}}</h3>
                                                <div class="icon-box-content">
                                                    <p class="text-uppercase mb-0">Total annonces</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-lg-3 col-md-6 col-sm-3 col-xs-6 mb-4">
                                        <a href="{{ url('/account/mes-annonces') }}" class="link-to-tab">
                                            <div class="icon-box text-center">
                                                <h3>{{ Stat::countPausedAnnonce()}}</h3>
                                                <div class="icon-box-content">
                                                    <p class="text-uppercase mb-0">Annonces en attente</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-3 col-xs-6 mb-4">
                                        <a href="{{ url('/account/mes-annonces') }}" class="link-to-tab">
                                            <div class="icon-box text-center">
                                                <h3>{{ Stat::countOnlineAnnonce()}}</h3>
                                                <div class="icon-box-content">
                                                    <p class="text-uppercase mb-0">Annonces en ligne</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-3 col-xs-6 mb-4">
                                        <a href="{{ url('/account/mes-annonces') }}" class="link-to-tab">
                                            <div class="icon-box text-center">
                                                <h3>{{ Stat::countRejectedAnnonce()}}</h3>
                                                <div class="icon-box-content">
                                                    <p class="text-uppercase mb-0">Annonces en rejetées</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                          
                           


                            {{-- Onglets INFORMATIONS --}}
                            <div class="tab-pane" id="account-addresses">
                                <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-map-marker">
                                        <i class="w-icon-map-marker"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title mb-0 ls-normal">Mes informations</h4>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 mb-6">
                                        <div class="ecommerce-address billing-address pr-lg-8">
                                            <h4 class="title title-underline ls-25 font-weight-bold">Informations
                                                personnelles:</h4>
                                            <address class="mb-4">
                                                <table class="address-table">
                                                    <tbody>
                                                        <tr>
                                                            <th>Nom & Prénoms:</th>
                                                            <td>John Doe</td>
                                                        </tr>

                                                        <tr>
                                                            <th>Addresse:</th>
                                                            <td>Wall Street</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Commune:</th>
                                                            <td>California</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Pays:</th>
                                                            <td>United States (US)</td>
                                                        </tr>

                                                        <tr>
                                                            <th>Téléphone 1:</th>
                                                            <td>(+225) 00 00 00 00 00</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Téléphone 2:</th>
                                                            <td>(+225) 00 00 00 00 00</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </address>
                                            <a href="#"
                                                class="btn btn-link btn-underline btn-icon-right text-primary">Editer
                                                mes informations<i class="w-icon-long-arrow-right"></i></a>
                                        </div>
                                    </div>



                                </div>
                            </div>


                            {{-- Onglet des Paramètres: --}}
                            <div class="tab-pane" id="account-details">
                                <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-account mr-2">
                                        <i class="w-icon-user"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title mb-0 ls-normal">Modifier mes informations</h4>
                                    </div>
                                </div>
                                <form class="form account-details-form" action="#" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstname">Nom *</label>
                                                <input type="text" id="firstname" name="firstname" placeholder="John"
                                                    class="form-control form-control-md">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lastname">Prénoms *</label>
                                                <input type="text" id="lastname" name="lastname" placeholder="Doe"
                                                    class="form-control form-control-md">
                                            </div>
                                        </div>
                                    </div>


                                    <h4 class="title title-password ls-25 font-weight-bold">Mots de passe</h4>
                                    <div class="form-group">
                                        <label class="text-dark" for="cur-password">Mot de passe actuel</label>
                                        <input type="password" class="form-control form-control-md" id="cur-password"
                                            name="cur_password">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark" for="new-password">Nouveau mot de passe</label>
                                        <input type="password" class="form-control form-control-md" id="new-password"
                                            name="new_password">
                                    </div>
                                    <div class="form-group mb-10">
                                        <label class="text-dark" for="conf-password">Confirmer le mot de passe</label>
                                        <input type="password" class="form-control form-control-md" id="conf-password"
                                            name="conf_password">
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit"
                                            class="btn btn-dark btn-rounded btn-sm mb-4">Sauvegarder</button>
                                    </div>
                                </form>
                            </div>



                            {{-- Onglet des Annonces --}}
                            <div class="tab-pane mb-4" id="account-favoris">
                                <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-orders">
                                        <i class="w-icon-orders"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title text-capitalize ls-normal mb-0">Mes annonces favoris</h4>
                                    </div>
                                </div>


                                {{-- tableaux des annonces --}}
                                <table class="shop-table wishlist-table">
                                    <thead>
                                        <tr>
                                            <th class="product-name"><span>Titre </span></th>
                                            <th></th>
                                            <th class="product-price"><span>Prix</span></th>
                                            <th class="product-stock-status"><span> Statut</span></th>
                                            <th class="wishlist-action">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="product-thumbnail">
                                                <div class="p-relative">
                                                    <a href="product-default.html">
                                                        <figure>
                                                            <img src="front/assets/images/shop/7-1.jpg" alt="product"
                                                                width="300" height="338">
                                                        </figure>
                                                    </a>
                                                    <button type="submit" class="btn btn-close"><i
                                                            class="fas fa-times"></i></button>
                                                </div>
                                            </td>
                                            <td class="product-name">
                                                <a href="product-default.html">
                                                    Blue Sky Trunk
                                                </a>
                                            </td>
                                            <td class="product-price">
                                                <ins class="new-price">$85.00</ins>
                                            </td>
                                            <td class="product-stock-status">
                                                <span class="wishlist-in-stock">En cours</span>
                                            </td>
                                            <td class="wishlist-action">
                                                <div class="d-lg-flex">
                                                    <a href="#"
                                                        class="btn btn-quickview btn-outline btn-default btn-rounded btn-sm mb-2 mb-lg-0">Détails</a>
                                                    <a href="#"
                                                        class="btn btn-dark btn-rounded btn-sm ml-lg-2 btn-cart">Editer</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="product-thumbnail">
                                                <div class="p-relative">
                                                    <a href="product-default.html">
                                                        <figure>
                                                            <img src="front/assets/images/shop/19-1.jpg" alt="product"
                                                                width="300" height="338">
                                                        </figure>
                                                    </a>
                                                    <button type="submit" class="btn btn-close"><i
                                                            class="fas fa-times"></i></button>
                                                </div>
                                            </td>
                                            <td class="product-name">
                                                <a href="product-default.html">
                                                    Handmade Ring
                                                </a>
                                            </td>
                                            <td class="product-price"><ins class="new-price">$5.00</ins></td>
                                            <td class="product-stock-status">
                                                <span class="wishlist-in-stock">En cours</span>
                                            </td>
                                            <td class="wishlist-action">
                                                <div class="d-lg-flex">
                                                    <a href="#"
                                                        class="btn btn-quickview btn-outline btn-default btn-rounded btn-sm mb-2 mb-lg-0">Détails</a>
                                                    <a href="#"
                                                        class="btn btn-dark btn-rounded btn-sm ml-lg-2 btn-cart">Editer</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="product-thumbnail">
                                                <div class="p-relative">
                                                    <a href="product-default.html">
                                                        <figure>
                                                            <img src="front/assets/images/shop/20.jpg" alt="product"
                                                                width="300" height="338">
                                                        </figure>
                                                    </a>
                                                    <button type="submit" class="btn btn-close"><i
                                                            class="fas fa-times"></i></button>
                                                </div>
                                            </td>
                                            <td class="product-name">
                                                <a href="product-default.html">
                                                    Pencil Case
                                                </a>
                                            </td>
                                            <td class="product-price"><ins class="new-price">$54.00</ins></td>
                                            <td class="product-stock-status">
                                                <span class="wishlist-in-stock">En cours</span>
                                            </td>
                                            <td class="wishlist-action">
                                                <div class="d-lg-flex">
                                                    <a href="#"
                                                        class="btn btn-quickview btn-outline btn-default btn-rounded btn-sm mb-2 mb-lg-0">Détails</a>
                                                    <a href="#"
                                                        class="btn btn-dark btn-rounded btn-sm ml-lg-2 btn-cart">Editer</a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
            <!-- End of PageContent -->


            <!-- End of PageContent -->
        </main>
        <!-- End of Main -->

@endsection