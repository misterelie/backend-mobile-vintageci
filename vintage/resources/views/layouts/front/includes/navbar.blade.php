<!-- Start of Header -->
<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <p class="welcome-msg"></p>
            </div>
            <div class="header-right">
               
                <!-- End of Dropdown Menu -->
                <a href="{{ url('/contactez-nous') }}" class="d-lg-show">Contactez-nous</a>
                <a href="{{ url('/mon-compte') }}" class="d-lg-show">Mon compte</a>
                <a href="{{ url('/connexion') }}" class=""><i
                        class="w-icon-account"></i>Se connecter</a>
                <span class="delimiter d-lg-show">/</span>
                <a href="{{ url('/inscription') }}" class="ml-0 ">S'inscrire</a>
            </div>
        </div>
    </div>
    <!-- End of Header Top -->

    <div class="header-middle">
        <div class="container">
            <div class="header-left mr-md-4">
                <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
                </a>
                <a href="{{ url('/') }}" class="logo ml-lg-0">
                    <img src="{{ asset('front/assets/images/logo.png')}} " alt="logo" width="144" height="45" />
                </a>
                <form method="get" action="#"
                    class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                    <div class="select-box">
                        <select id="category" name="category">
                            <option value="">Catégories</option>
                            <option value="4">Fashion</option>
                            <option value="5">Furniture</option>
                            <option value="6">Shoes</option>
                            <option value="7">Sports</option>
                            <option value="8">Games</option>
                            <option value="9">Computers</option>
                            <option value="10">Electronics</option>
                            <option value="11">Kitchen</option>
                            <option value="12">Clothing</option>
                        </select>
                    </div>
                    <input type="text" class="form-control" name="search" id="search" placeholder="Rechercher sur vintage..."
                        required />
                    <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
                    </button>
                </form>
            </div>
            <div class="header-right ml-4">
                <div class="header-call d-xs-show d-lg-flex align-items-center">
                    <a href="tel:#" class="w-icon-call"></a>
                    <div class="call-info d-lg-show">
                        <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                            <a href="mailto:#" class="text-capitalize">Aide & Assistance</a> ou :</h4>
                        <a href="tel:#" class="phone-number font-weight-bolder ls-50">(+225) 00 00 00 00 00</a>
                    </div>
                </div>
                <a class="wishlist label-down link d-xs-show" href="wishlist.html">
                    <i class="w-icon-heart"></i>
                    <span class="wishlist-label d-lg-show">Favoris</span>
                </a>
        
            </div>
        </div>
    </div>
    <!-- End of Header Middle -->

    <div class="header-bottom sticky-content fix-top sticky-header has-dropdown">
        <div class="container">
            <div class="inner-wrap">
                <div class="header-left">
                    
                    {{-- Navbar --}}
                    <nav class="main-nav">
                        <ul class="menu active-underline">

                            <li class="active">
                                <a href="{{ url('/annonces')}} ">Toutes les annonces</a>
                            </li>
                           
                            <li class="">
                                <a href="{{ url('/')}} ">Carégories</a>
                            </li>

                            <li class="">
                                <a href="{{ url('/')}} ">Devenir vendeur pro</a>
                            </li>

                            {{-- Blog --}}
                            {{-- <li>
                                <a href="blog.html">Blog</a>
                                <ul>
                                    <li><a href="blog.html">Classic</a></li>
                                    <li><a href="blog-listing.html">Listing</a></li>
                                    <li>
                                        <a href="blog-grid-3cols.html">Grid</a>
                                        <ul>
                                            <li><a href="blog-grid-2cols.html">Grid 2 columns</a></li>
                                            <li><a href="blog-grid-3cols.html">Grid 3 columns</a></li>
                                            <li><a href="blog-grid-4cols.html">Grid 4 columns</a></li>
                                            <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="blog-masonry-3cols.html">Masonry</a>
                                        <ul>
                                            <li><a href="blog-masonry-2cols.html">Masonry 2 columns</a></li>
                                            <li><a href="blog-masonry-3cols.html">Masonry 3 columns</a></li>
                                            <li><a href="blog-masonry-4cols.html">Masonry 4 columns</a></li>
                                            <li><a href="blog-masonry-sidebar.html">Masonry sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="blog-mask-grid.html">Mask</a>
                                        <ul>
                                            <li><a href="blog-mask-grid.html">Blog mask grid</a></li>
                                            <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="post-single.html">Single Post</a>
                                    </li>
                                </ul>
                            </li> --}}


                        </ul>
                    </nav>


                </div>
                <div class="header-right">
                    <a href="" class="d-none"></a>
                   <a href="{{ url('/') }} " class="btn btn-rounded btn-dark px-3 btn-sm">Déposer une annonce</a>
                    
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End of Header -->