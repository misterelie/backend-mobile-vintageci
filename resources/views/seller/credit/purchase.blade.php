@extends('seller.partials.page')

@section('page')


        <!-- Start of Main -->

        <main class="main">
            <!-- Sart of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0"> Achat de crédits </h1>
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

            <div class="page-content">

                <div class="container">

                    <div class="tab tab-vertical row gutter-lg">



                        {{-- SideBar --}}

                        @include('seller.partials.sidebar')
                        <div class="tab-content mb-6">
                            <div class="tab-pane active in mb-4" id="account-dashboard">
                                <div class="row justify-content-end text-right">
                                    <div class="col-auto justify-content-end text-right">
                                        <a href="{{ url('/account/my-purchases')}}" class="btn btn-outline-dark">&nbsp;
                                            <span class="   w-icon-wallet"></span>&nbsp;&nbsp;Mes achats &nbsp;</a>
                                    </div>
                                </div>

                                {{-- Header --}}
                                @include('seller.partials.header')
                                
                                <div class="heading pb-4 py-3 mb-3 mt(4">
                                    <h2 class="title-big">
                                        Achetez du crédit
                                    </h2>
                                    <p class="font-weight-normal fw-500 text-black">

                                        Facile, Rapide, Pratique ! Grâce à l'achat de crédits, vous pré-chargez votre
                                        Compte Personnel du montant de

                                        votre choix. Vous n'aurez ainsi plus besoin de payer à chaque achat d'option sur
                                        le site. Vous gagnez du temps

                                        et gérez ainsi mieux votre budget.

                                    </p>

                                </div>



                                <form action="{{ url('/purchase/store')}} " method="post">
                                    @csrf
                                    <section class="pricing-credit">
                                        <div class="form-section">
                                            <h4>Sélectionnez votre offre:</h4>
                                            <ul class="pb-4 py-4">
                                                @if(!is_null($credits))
                                                @foreach ($credits as $cre)
                                                <li>
                                                    <input type="radio" name="credit_id" id="{{ $cre->id}}"
                                                        class="form-control" value="{{ $cre->id }}"
                                                        @if(!is_null($credit) && trim($credit->slug) ===
                                                    trim($cre->slug) && !is_null($cre->slug)) checked @endif >

                                                    <label for="{{ $cre->id}}" @if(!is_null($credit) &&
                                                        !is_null($cre->slug)) class="{{ trim($credit->slug) ===
                                                        trim($cre->slug) ? 'active' : 'credit-item' }}" @endif>
                                                        <span class="credit-name text-uppercase font-weight  "
                                                            style=" color: {{ $cre->couleur }}">{{ $cre->title }}</span>
                                                        <span class="credit-price">{{
                                                            Helpers::moneyFormat($cre->montant)}} <sup>F</sup></span>
                                                    </label>
                                                    <div class="gift">+ {{$cre->bonus}} F OFFERT</div>
                                                </li>
                                                @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </section>

                                    <section class="providers-payment mt-4 py-3">
                                        <h4 class="py-3 mb-4 h3">Payez par transfert, via mobile money:</h4>
                                        <ul class="provider-list">
                                            @if (!empty(Site::providers()))
                                            @foreach (Site::providers() as $key => $row)
                                            <li class="provider-jumia-pay ">
                                                <input type="radio" name="provider" class="form-control provider-item"  id="{{$row['nom'] }}-money" value="{{$row['nom'] }}-{{ $key }}"
                                                     required style="opacity: 0; visibility:hidden">
                                                <label for="{{$row['nom'] }}-money">
                                                    <figure>
                                                        <img src="{{ asset($row['icon']) }}" alt="">
                                                        <span class="caption">
                                                            <h4>
                                                                {{ Str::ucfirst($row['nom'])  }}
                                                            </h4>

                                                            <h4>
                                                                {{$row['numero'] }}
                                                                <span class="secure">Paiement sécurisé &nbsp;&nbsp; 
                                                                    <i class="fa fa-lock"></i> 
                                                                </span>
                                                            </h4>
                                                        </span>
                                                    </figure>
                                                </label>
                                            </li>
                                            @endforeach
                                            @endif
                                        </ul>
                                    </section>

                                    <section class="d-block my-4">
                                        <div class="col m-auto text-center justify-content-center">
                                            <button
                                                class="btn btn-rounded btn-annonce text-uppercase px-3 text-center m-auto"
                                                type="submit"> Recharger mon solde</button>
                                        </div>
                                    </section>

                                </form>
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
                                                mes informations
                                                <i class="w-icon-long-arrow-right">
                                                </i>
                                            </a>
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

                                        <h4 class="icon-box-title text-capitalize ls-normal mb-0">Mes annonces favoris
                                        </h4>

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
