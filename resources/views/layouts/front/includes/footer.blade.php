<footer class="footer appear-animate" data-animation-options="{
    'name': 'fadeIn'
}">
    <div class="footer-newsletter bg-primary">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-5 col-lg-6">
                    <div class="icon-box icon-box-side text-white">
                        <div class="icon-box-icon d-inline-flex">
                            <i class="w-icon-envelop3"></i>
                        </div>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title text-white text-uppercase font-weight-bold">Souscrivez à notre newsletter </h4>
                            <p class="text-white">Soyez informés de toutes nos nouvelles sorties.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6 col-md-9 mt-4 mt-lg-0 ">
                    <form action="#" method="get"
                        class="input-wrapper input-wrapper-inline input-wrapper-rounded">
                        <input type="email" class="form-control mr-2 bg-white" name="email" id="email"
                            placeholder="Votre adresse Email" />
                        <button class="btn btn-white btn-rounded" type="submit">Souscrire<i
                                class="w-icon-long-arrow-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="footer-top">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="widget widget-about">
                        <a href="demo1.html" class="logo-footer">
                            <img src="{{ asset('front/assets/images/logo_footer.png')}}" alt="logo-footer" width="144"
                                height="45" />
                        </a>
                        <div class="widget-body">
                            <p class="widget-about-title">
                                Besoin d'aide ? Contactez-nous: 24H/7
                            </p>
                            <a href="tel:18005707777" class="widget-about-call">(+225) 27 22 26 88 43

                            </a>
                           

                            <div class="social-icons social-icons-colored">
                                <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                
                                <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h3 class="widget-title">A propos</h3>
                        <ul class="widget-body">
                            <li><a href="{{ url('/faq')}}">FAQ</a></li>
                            <li><a href="{{ url('/help')}}">Aide</a></li>
                            <li><a href="{{ url('/cgu')}}">Conditions Générales d'Utilisation</a></li>
                            <li><a href="{{ url('/propriete-intellectuelle')}}">Propriété intellectuelle
                             </a></li>
                            <li><a href="{{ url('/conditions') }} ">Mentions légales</a></li>
                            <li><a href="{{ url('/credits') }} ">Acheter du crédit </a></li>
                            {{-- <li><a href="{{ url('/back-office') }} " target="_blank">Administration</a></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">Espace client</h4>
                        <ul class="widget-body">
                            <li><a href="{{ url('/connexion')}}">Se connecter</a></li>
                            <li><a href="{{ url('/inscription')}}">S'inscrire</a></li>
                            <li><a href="{{ url('/annonces/new')}}">Déposer une annonce</a></li>
                            <li><a href="{{ url('/contactez-nous')}}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">Catégories</h4>
                        <ul class="widget-body">
                            

                        @if(!is_null(Site::categories()))
                            
                            @foreach(Site::footerCategories() as $c)
                            <li><a href="{{ url('/annonces',[Helpers::filterstring($c->category) , $c->id])}}">{{ Str::ucfirst($c->category)}}</a></li>
                            @endforeach
                        @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="footer-bottom">
            <div class="footer-left">
                <p class="copyright">Copyright © {{ date('Y')}} {{ config("app.name")}} Tout droit réservés.</p>
            </div>
            <div class="footer-right">
                <span class="payment-label mr-lg-8">By ALLÔ SERVICE</span>
            </div>
        </div>
    </div>
</footer>

    <!-- Start of Sticky Footer -->
    <div class="sticky-footer sticky-content fix-bottom">
        <a href="{{ url('/')}}" class="sticky-link active">
            <i class="w-icon-home"></i>
            <p>Accueil</p>
        </a>
        <a href="{{ url('/annonces/new')}}" class="sticky-link ">
            <i class="fa fa-plus-circle fw-bolder"></i>
            <p>Publier</p>
        </a>
       
        <a href="{{ url('/annonces')}}" class="sticky-link ">
            <i class="w-icon-category"></i>
            <p>Annonces</p>
        </a>
        <a href="{{ url('/mon-compte')}}" class="sticky-link">
            <i class="w-icon-account"></i>
            <p>Mon compte</p>
        </a>

    </div>
    <!-- End of Sticky Footer -->

    <!-- Start of Scroll Top -->
    <a id="scroll-top" class="scroll-top" href="#top" title="Top" role="button"> <i class="w-icon-angle-up"></i> <svg
            version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70">
            <circle id="progress-indicator" fill="transparent" stroke="#000000" stroke-miterlimit="10" cx="35" cy="35"
                r="34" style="stroke-dasharray: 16.4198, 400;"></circle>
        </svg> </a>
    <!-- End of Scroll Top -->


    {{-- Mobile Menu --}}


    <!-- Start of Mobile Menu -->
    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-overlay"></div>
        <!-- End of .mobile-menu-overlay -->

        <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
        <!-- End of .mobile-menu-close -->

        <div class="mobile-menu-container scrollable">
            <form action="{{ url('/search')}}" method="GET" class="input-wrapper">
                <input type="text" class="form-control" name="q" autocomplete="off" placeholder="Rechercher..." id="searchInput"
                    required />
                <button class="btn btn-search" type="submit" style="z-index: 900 !important">
                    <i class="w-icon-search"></i>
                </button>
            </form>
            <!-- End of Search Form -->
            <div class="tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#main-menu" class="nav-link active">Menu</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="#categories" class="nav-link">Catégories</a>
                    </li> --}}
                </ul>
            </div>


            <div class="tab-content">
                <div class="tab-pane active" id="main-menu">
                    <ul class="mobile-menu">
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

                            <li class="  ">
                                <a href="{{ url('/help') }}">Aide</a>
                            </li>
                    </ul>
                </div>
              
            </div>
        </div>
    </div>
    <!-- End of Mobile Menu -->