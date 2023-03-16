<!-- Start of Header -->
<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <p class="welcome-msg"> Aide & Assistance au: (+225) 27 22 26 88 43 </p>
            </div>
            <div class="header-right">
               
                <!-- End of Dropdown Menu -->
                <a href="{{ url('/contactez-nous') }}" class="d-lg-showed">Contactez-nous</a>
                
                @if(User::activeSession())
                <a href="{{ url('/mon-compte') }}" class="d-lg-showed"> <i class="w-icon-account"></i> Mon compte</a>
                
                <a href="{{ url('/deconnexion') }}" class="d-lg-showed"> <i class="w-icon-logout"></i> Déconnexion </a>
                
                @endif

                @if(!User::activeSession())
                    <a href="{{ url('/connexion') }}" class="m-mob-6-right"><i class="w-icon-account"></i>Se connecter</a>
                    <span class="delimiter d-lg-showed">/</span>
                    <a href="{{ url('/inscription') }}" class="ml-0 m-mob-6-left">S'inscrire</a>
                @endif
                

            </div>
        </div>
    </div>
    <!-- End of Header Top -->

    <div class="header-middle">
        <div class="container">
            <div class="header-left mr-md-4">
                <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
                </a>
                <a href="{{ url('/') }}" class="logo d-block w-100 ml-lg-0">
                    <img src="{{ asset('assets/img/icon-android.png')}} " alt="logo" width="35" class="img-fluid m-auto" />
                </a>
                <form method="GET" action="{{ url('/search')}}"
                    class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                    <div class="select-box">
                        <select name="cat" id="cat" class="form-control">
                            <option value="">--Catégories--</option>
                            @if (!is_null(Site::cats()))
                            @foreach (Site::cats() as $item)
                            <option value="{{$item->id}}" {{ (isset($cat) && (int)($cat) === (int) ($item->id)) ? 'selected' : ''  }}    > {{ Str::ucfirst($item->category) }} </option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <input type="text" class="form-control" name="q" id="search" placeholder="Rechercher..."  value="{{ isset($query) ? $query : null}}"/>
                    <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
                    </button>
                </form>
            </div>
            <div class="header-right ml-4">
                <div class="header-call d-xs-show d-lg-flex align-items-center">
                    {{-- <a href="tel:#" class="w-icon-call"></a> --}}
                    <div class="call-info d-lg-show">
                        <a href="{{ url('/annonces/new') }} " class="small-screen btn text-sm btn-rounded btn-annonce text-capitalise px-3 btn-sm"> <i class="d-xm-show fas fa fa-plus text-10"> </i> Publier</a>
                        <a href="{{ url('/annonces/new') }} " class="large-screen btn btn-rounded btn-annonce text-capitalise px-3 btn-sm"> <i class="d-xm-show fas fa fa-plus text-10"> </i> Poster une annonce </a>
                    </div>
                </div>


                @if(User::activeSession())
                
                    @if(!is_null(User::notifications()))
                    {{-- Notifications de l'utilisateur --}}
                    <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2" style="display: none !important">
                        <div class="cart-overlay"></div>
                        <a href="#" class="cart-toggle label-down link">
                            <i class=" w-icon-envelop2">
                                @if(User::countNotifiy() > 0)
                                <span class="cart-count">{{ (User::countNotifiy())}} </span>
                                @endif
                            </i>
                            <span class="cart-label">Notification</span>
                        </a>
                        <div class="dropdown-box">

                            <div class="cart-header">
                                <span>Notifications</span>
                                <a href="#" class="btn-close">Fermer<i class="w-icon-long-arrow-right"></i></a>
                            </div>

                            <div class="products">
                                @foreach(User::notifications() as $nt)
                                <div class="product product-cart">
                                    <div class="product-detail">
                                        <span class="notify-details @if((int) $nt->open === 0) new @endif ">
                                            {{ $nt->details}}
                                        </span>
                                        <div class="price-box">
                                            <span class="product-quantity">
                                                <small> Il y a: {{ Dates::ago($nt->created_at)}} </small>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="cart-total">
                            </div>

                             @if(!is_null(User::notifications()))
                            <div class="cart-action">
                                 @if(User::countNotifiy() > 0)
                                <a href="{{ url('/toggle-notification') }}" class="btn btn-dark btn-sm  btn btn-rounded">Tous vus</a>
                                 @endif

                                @if(User::hasNotifications() > 0)
                                <a href="{{ url('/remove-notification') }}" class="btn btn-dark btn-sm  btn-outline btn-rounded"> Tout Supprimer</a>
                                 @endif
                            </div>
                             @endif
                        </div>
                        <!-- End of Dropdown Box -->
                    </div>
                    @endif
                @endif
                
            </div>
        </div>
    </div>
    <!-- End of Header Middle -->

    <div class="header-bottom sticky-content fix-top sticky-header has-dropdown">
        <div class="container">
            <div class="inner-wrap">
                <div class="header-left">
                
                </div>
                <div class="header-right centered">
                    <nav class="main-nav">
                        <ul class="menu active-underline">

                            <li class="{{ Helpers::page_active('/')}}">
                                <a href="{{ url('/')}} ">Accueil</a>
                            </li>

                            <li class=" {{ Helpers::page_active('annonces/categories')}}">
                                <a href="{{ url('/annonces/categories')}}">Toutes les catégories</a>
                            </li>


                            <li class="{{ Helpers::page_active('/annonces/new')}}">
                                <a href="{{ url('/annonces/new')}} ">Poster une annonce</a>
                            </li>

                            <li class=" {{ Helpers::page_active('annonces')}}">
                                <a href="{{ url('/annonces')}} ">Toutes les annonces</a>
                            </li>

                            <li class=" ">
                                <a href="{{ url('/annonces/pro/1')}}">Les annonces VIP</a>
                            </li>

                            <li class=" ">
                                <a href="{{ url('/annonces/communes')}}">Annonces par communes </a>
                            </li>

                            
                            <li class="  ">
                                <a href="{{ url('/credits') }}">Acheter du crédit</a>
                            </li>

                            <li class="{{ Helpers::page_contains('help')}}">
                                <a href="{{ url('/help')}}">Aide</a>
                            </li>
                           
                           
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class=" mobile-header-search text-dark color-black">
        <form method="GET" action="{{ url('/search')}}"
                    class="header-search hs-expanded hs-round px-4 py-2 d-flex d-md-flex input-wrapper">
                    {{-- <div class="select-box">
                        <select name="cat" id="cat" class="form-control">
                            <option value="">--Catégories--</option>
                            @if (!is_null(Site::cats()))
                            @foreach (Site::cats() as $item)
                            <option value="{{$item->id}}" {{ (isset($cat) && (int)($cat) === (int) ($item->id)) ? 'selected' : ''  }}    > {{ Str::ucfirst($item->category) }} </option>
                            @endforeach
                            @endif
                        </select>
                    </div> --}}
                    <input type="text" class="form-control ml-2" name="q" id="search" placeholder="Rechercher..."
                     value="{{ isset($query) ? $query : null}}"   required />
                    <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
                    </button>
                </form>
    </div>
</header>
<!-- End of Header -->