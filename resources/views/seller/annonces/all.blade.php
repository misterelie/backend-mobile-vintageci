<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>{{ $page_title}}</title>

    <meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
    <meta name="description" content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
    <meta name="author" content="D-THEMES">

    {{-- CSS files --}}
    @include('layouts/front/assets/css')

</head>

<body class="home">
    @include("layouts.front.includes.messenger-widget")
    <div class="page-wrapper">
        <h1 class="d-none">Wolmart - Responsive Marketplace HTML Template</h1>
        {{-- Navbar --}}
        @include('layouts/front/includes/navbar')



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


                            {{-- Onglet des Annonces --}}
                            <div class="tab-pane active mb-4" id="account-orders">

                                {{-- Header --}}
                                @include('seller.partials.header')

                                <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-orders">
                                        <i class="w-icon-orders"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h2 class="icon-box-title text-uppercase ls-normal mb-0">Mes annonces</h2>
                                    </div>
                                </div>


                                {{-- tableaux des annonces --}}
                                <div class="table-responsive">
                                <table class="shop-table wishlist-table">
                                    <thead class="bg-dark text-light color-white" style="color: #fff !important">
                                        <tr>
                                            <th></th>
                                            <th class="product-name"><span>Titre Annonce </span></th>
                                           
                                            <th class="product-price mob-none"><span>Prix</span></th>
                                            <th class="mob-none"><span> Vues</span></th>
                                            <th class="mob-none"><span> Statut</span></th>

                                            <th class="mob-text-left">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if(!is_null($annonces))
                                        @foreach($annonces as $an)
                                        <tr class="flex-on-mobile" @if(!is_null($an->vip)) style="background-color: #fdf2dd !important" class="annonce-vip" @endif style="position: relative; @if((int) $an->statut === 2 ||(int) $an->statut === 3) opacity:
                                            .6; user-select: none;"  @endif>
                                            <div class="d-table " style="position: relative">
                                                <td class="product-thumbnail" class="mob-max-90">
                                                    <div class="p-relative">
                                                        {{-- badge --}}
                                                      

                                                        <a href="#!" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{$an->pk}}">

                                                            <figure>
                                                                <img src="{{ Helpers::file_path($an->photo_1)}}" alt="product"
                                                                    width="250" height="288">
                                                            </figure>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="product-name mob-max-120">

                                                    <div class="d-block">
                                                        <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal{{$an->pk}}" class="text-dark text-black">
                                                            {{ $an->titre}}
                                                        </a>
                                                        <small class="d-block">
                                                            {{(!is_null($an->category)) ? $an->category->category : null
                                                            }},
                                                        </small>
                                                        <small class="d-block">
                                                            {{(!is_null($an->sousCategory)) ?
                                                            $an->sousCategory->sous_category : null }}
                                                        </small>

                                                        <small class="d-block">
                                                            {{(!is_null($an->commune)) ? Str::ucfirst("à ")
                                                            .Str::ucfirst($an->commune->commune) : null }}
                                                        </small>
                                                        <div class="d-block text-left mob-block">
                                                            <span class="">{{ Helpers::moneyFormat($an->prix). " F
                                                                CFA"}}
                                                            </span>
                                                        </div>

                                                        {!! Helpers::statut($an->statut) !!}
                                                    </div>

                                                </td>
                                                <td class="product-price  mob-none">
                                                    <ins class="new-price">{{ Helpers::moneyFormat($an->prix). " F
                                                        CFA"}}
                                                    </ins>
                                                </td>
                                                <td width="4%" class="mob-none">
                                                    <span>
                                                        <i class="fa fa-eye" class="mob-none"></i>

                                                        <strong>{{ Helpers::moneyFormat($an->vue)}}</strong>
                                                    </span>
                                                </td>

                                                {{-- Statut --}}
                                                <td class="text-center statut-td mob-none">
                                                    {!! Helpers::statut($an->statut) !!}
                                                </td>

                                                <td class="text-left" style="text-align: left !important">
                                                    <div class="d-block btn-wrap text-left" style="text-align: left !important">


                                                        <a {{ Helpers::disabled($an->statut) }} href="#!"
                                                            class="btn d-block btn-sm btn-underline btn-link sm
                                                            btn-dark"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal{{$an->pk}}"> <small>
                                                                Détails</small> </a>

                                                                @if((int) $an->statut === 1)
                                                                <a href="{{url('/annonce/vip', $an->pk) }} "
                                                                    class="btn d-block btn-sm btn-underline  btn-link sm btn-dark">
                                                                    <small>
                                                                       Sponsoriser</small> </a>
                                                                @endif

                                                        @if((int) ($an->statut) != 2)
                                                        <a @if(!Helpers::disabled($an->statut))
                                                            href="{{url('/annonces/edit', $an->pk) }}" @endif
                                                            class="btn d-block btn-sm btn-underline btn-link sm
                                                            btn-primary ">
                                                            <small>Modifier </small> </a>

                                                            <a 
                                                           data-bs-toggle="modal" data-bs-target="#promoModal{{$an->pk}}" 
                                                            class="btn d-block btn-sm btn-underline btn-link sm
                                                            btn-danger ">
                                                            <small>En promo </small> </a>

                                                        @if((int) ($an->statut) === 1 || (int) ($an->statut) === 4)
                                                        <a @if(!Helpers::disabled($an->statut))
                                                            href="{{url('/annonces/toggle', $an) }}"
                                                            @endif class="btn d-block btn-sm btn-underline btn-link sm
                                                            btn-primary "> <small> 
                                                                {{Helpers::statutText($an->statut) }} </small>
                                                        </a>
                                                        @endif
                                                        @endif

                                                        <a @if(!Helpers::disabled($an->statut))
                                                            href="{{url('/annonces/delete',$an->pk) }} " @endif

                                                            @if((int) ($an->statut) != 2)
                                                            class="btn btn-sm d-block btn-underline text-blue
                                                            text-primary btn-link sm btn-danger btn-alert">
                                                            <small>  Retirer</small> </a>
                                                        @endif

                                                       

                                                    </div>
                                                </td>
                                                </a>

                                                {{-- @if(!is_null($an->vip))
                                                <div class="flotter-badge">Annonce VIP</div>
                                                @endif --}}
                                            </div>
                                        </tr>
                                        @endforeach
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="container no-border border-none  mb-4 mt-3">
                    <div class="row justify-content-end text-right py-4 ">
                        <div class="col-md-6 mb-4 text-right float-right">
                            {{$annonces->links() }}
                        </div>
                    </div>
                </div>

            </div>
            <!-- End of PageContent -->


            <!-- End of PageContent -->
        </main>
        <!-- End of Main -->

        <!-- Start of Footer -->
        @include('layouts/front/includes/footer')
        <!-- End of Footer -->
    </div>
    <!-- End of Page-wrapper-->


    <!-- Start of Quick View -->
    @if(!is_null($annonces))
    @foreach($annonces as $an)
    <div class="modal fade" id="exampleModal{{$an->pk}}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl ">
            <div class="modal-content">
                <div class="modal-header p-4">
                    <h5 class="modal-title text-29" id="exampleModalLabel">Détails de l'annonce</h5>
                    <button type="button" class="btn-dark text-white" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa fa-times"></i> </button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex flex-wrap-wrap px-4">

                        <div class="col-md-7 overflow-hidden ">

                            <div class="product-details scrollable pl-0">
                                <h2 class="product-title">{{ $an->titre }}</h2>
                                <div class="product-bm-wrapper">

                                    <div class="product-meta">
                                        <div class="product-categories">
                                            Catégorie:
                                            <strong><span class="product-category"><a href="#">{{
                                                        !is_null($an->category) ? Str::ucfirst($an->category->category)
                                                        : "" }}</a></span></strong>
                                        </div>

                                        @if(!is_null($an->sousCategory))
                                        <div class="product-categories">
                                            Sous Catégorie:
                                            <strong> <span class="product-category"><a href="#">{{
                                                        !is_null($an->sousCategory) ?
                                                        Str::ucfirst($an->sousCategory->sous_category) :
                                                        null}}</a></span></strong>
                                        </div>
                                        @endif

                                        <div class="product-sku">
                                            Commune: <strong><span>{{ !is_null($an->commune) ?
                                                    Str::ucfirst($an->commune->commune) : "" }}</span></strong>
                                        </div>
                                    </div>
                                </div>

                                <hr class="product-divider">

                                <div class="product-price">
                                    Prix: {{ Helpers::moneyFormat($an->prix) }} F CFA
                                </div>
                                <hr class="product-divider">

                                <h3 class="text-17 mb-3">Détails de l'annonce:</h3>
                                <div class="product-short-desc">
                                    {!! $an->details !!}
                                </div>

                            </div>
                        </div>


                        <div class="col-md-5 mb-4 ">
                            <div class="product-gallery  mb-0">
                                {{-- Ligne 1 4 cols --}}
                                <div class="row">
                                    <div class="col-lg-12 m-auto">
                                        <figure class=" cursor-pointer">
                                            <img src="{{ Helpers::file_path($an->photo_1)}}" alt="{{ $an->titre}}" width="800"
                                                height="900">
                                        </figure>
                                    </div>
                                </div>
                                <hr>

                                {{-- Ligne 1 --}}
                                <div class="row mt-2 mb-3">
                                    @if (!is_null($an->photo_2))
                                    <div class="col-lg-3">
                                        <figure class=" cursor-pointer">
                                            <img src="{{ Helpers::file_path($an->photo_2)}}" alt="{{ $an->titre}}"
                                                class="img-fluid img-responsive">
                                        </figure>
                                    </div>
                                    @endif
                                    @if (!is_null($an->photo_3))
                                    <div class="col-lg-3">
                                        <figure class=" cursor-pointer">
                                            <img src="{{ Helpers::file_path($an->photo_3)}}" alt="{{ $an->titre}}"
                                                class="img-fluid img-responsive">
                                        </figure>
                                    </div>
                                    @endif
                                    @if (!is_null($an->photo_4))
                                    <div class="col-lg-3">
                                        <figure class=" cursor-pointer">
                                            <img src="{{ Helpers::file_path($an->photo_4)}}" class="img-fluid img-responsive">
                                        </figure>
                                    </div>
                                    @endif
                                    @if (!is_null($an->photo_5))
                                    <div class="col-lg-3">
                                        <figure class=" cursor-pointer">
                                            <img src="{{ Helpers::file_path($an->photo_5)}}" alt="{{ $an->titre}}"
                                                class="img-fluid img-responsive">
                                        </figure>
                                    </div>
                                    @endif
                                </div>

                                @if (!is_null($an->photo_6))
                                <div class="row mt-2 mb-3">
                                    <div class="col-lg-3">
                                        <figure class=" cursor-pointer">
                                            <img src="{{ Helpers::file_path($an->photo_6)}}" alt="{{ $an->titre}}"
                                                class="img-fluid img-responsive">
                                        </figure>
                                    </div>
                                    @endif
                                    @if (!is_null($an->photo_7))
                                    <div class="col-lg-3">
                                        <figure class=" cursor-pointer">
                                            <img src="{{ Helpers::file_path($an->photo_7)}}" alt="{{ $an->titre}}"
                                                class="img-fluid img-responsive">
                                        </figure>
                                    </div>
                                    @endif
                                    @if (!is_null($an->photo_8))
                                    <div class="col-lg-3">
                                        <figure class=" cursor-pointer">
                                            <img src="{{ Helpers::file_path($an->photo_8)}}" class="img-fluid img-responsive">
                                        </figure>
                                    </div>
                                    @endif
                                    @if (!is_null($an->photo_9))
                                    <div class="col-lg-3">
                                        <figure class=" cursor-pointer">
                                            <img src="{{ Helpers::file_path($an->photo_9)}}" class="img-fluid img-responsive">
                                        </figure>
                                    </div>
                                    @endif

                                </div>


                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
    <!-- End of Quick view -->




    {{-- Promo Modal --}}
    @if(!is_null($annonces))
    @foreach($annonces as $an)
        <div class="modal fade" id="promoModal{{$an->pk}}" tabindex="-1" aria-labelledby="promoModalLabel{{$an->pk}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="promoModalLabel">Mettre l'annonce en promo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ url('/annonces/promo',$an) }}">
                @csrf
                <div class="modal-body">
                    <div class="px-4">
                        <div class="form-group mb-3">
                            <label for="prix" class="form-control-label">Prix actuel:</label>
                            <input type="number" name="prix" id="prix" class="form-control" value="{{ $an->prix}}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="prix_promo" class="form-control-label">Nouveau prix PROMO:</label>
                            <input type="number" name="prix_promo" id="prix_promo" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer px-4">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    @endforeach
    @endif


    {{-- CSS files --}}
    @include('layouts/front/assets/js')

</body>

</html>