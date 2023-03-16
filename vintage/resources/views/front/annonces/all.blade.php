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
    <div class="page-wrapper">
        <h1 class="d-none">Wolmart - Responsive Marketplace HTML Template</h1>
        {{-- Navbar --}}
        @include('layouts/front/includes/navbar')






        <!-- Start of Main -->
        <main class="main">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav mb-3 mt-2">
                <div class="container">
                    <ul class="breadcrumb bb-no">
                        <li><a href="{{ url('/')}}">Accueil</a></li>
                        <li><a href="{{ url('/annonces')}}">Toutes les annonces</a></li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Page Content -->
            <div class="page-content mb-10 mt-4">
              

                <div class="container">
                    <!-- Start of Shop Content -->
                    <div class="shop-content">
                        <!-- Start of Sidebar, Shop Sidebar -->
                        <aside class="sidebar shop-sidebar left-sidebar sticky-sidebar-wrapper">
                            <!-- Start of Sidebar Overlay -->
                            <div class="sidebar-overlay"></div>
                            <a class="sidebar-close" href="#"><i class="close-icon"></i></a>


                            <!-- Start of Sidebar Content -->
                            <div class="sidebar-content scrollable">
                                <div class="filter-actions">
                                    <label>Filter:</label>
                                    <a href="#" class="btn btn-dark btn-link filter-clean">Tout éffacer</a>
                                </div>
                                <!-- Start of Collapsible widget -->
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title"><span>Toutes les catégories</span></h3>
                                    <ul class="widget-body filter-items search-ul">
                                        <li><a href="#">Accessories</a></li>
                                        <li><a href="#">Babies</a></li>
                                        <li><a href="#">Beauty</a></li>
                                        <li><a href="#">Decoration</a></li>
                                        <li><a href="#">Electronics</a></li>
                                        <li><a href="#">Fashion</a></li>
                                    </ul>
                                </div>
                                <!-- End of Collapsible Widget -->

                                <!-- Start of Collapsible Widget -->
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title"><span>Prix</span></h3>
                                    <div class="widget-body">
                                        <ul class="filter-items search-ul">
                                            <li><a href="#">$0.00 - $100.00</a></li>
                                            <li><a href="#">$100.00 - $200.00</a></li>
                                            <li><a href="#">$200.00 - $300.00</a></li>
                                            <li><a href="#">$300.00 - $500.00</a></li>
                                            <li><a href="#">$500.00+</a></li>
                                        </ul>
                                        <form class="price-range">
                                            <input type="number" name="min_price" class="min_price text-center"
                                                placeholder="$min"><span class="delimiter">-</span><input type="number"
                                                name="max_price" class="max_price text-center" placeholder="$max"><a
                                                href="#" class="btn btn-primary btn-rounded btn-sm">Appliquer</a>
                                        </form>
                                    </div>
                                </div>
                                <!-- End of Collapsible Widget -->

                                
                                <!-- Start of Collapsible Widget -->
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title"><span>Marque:</span></h3>
                                    <ul class="widget-body filter-items item-check mt-1">
                                        <li><a href="#">Elegant Auto Group</a></li>
                                        <li><a href="#">Green Grass</a></li>
                                        <li><a href="#">Node Js</a></li>
                                        <li><a href="#">NS8</a></li>
                                        <li><a href="#">Red</a></li>
                                        <li><a href="#">Skysuite Tech</a></li>
                                        <li><a href="#">Sterling</a></li>
                                    </ul>
                                </div>
                                <!-- End of Collapsible Widget -->

                              
                            </div>
                            <!-- End of Sidebar Content -->
                        </aside>
                        <!-- End of Shop Sidebar -->

                        <!-- Start of Shop Main Content -->
                        <div class="main-content">

                            {{--  Filter --}}
                            <nav class="toolbox sticky-toolbox sticky-content fix-top">
                                <div class="toolbox-left">
                                    <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle 
                                        btn-icon-left"><i class="w-icon-category"></i><span>Filtrer </span></a>
                                    <div class="toolbox-item toolbox-sort select-box text-dark">
                                        <label>Trier par: :</label>
                                        <select name="orderby" class="form-control">
                                            <option value="default" selected="selected">Default sorting</option>
                                            <option value="popularity">Sort by popularity</option>
                                            <option value="rating">Sort by average rating</option>
                                            <option value="date">Sort by latest</option>
                                            <option value="price-low">Sort by pric: low to high</option>
                                            <option value="price-high">Sort by price: high to low</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="toolbox-right">
                                    <div class="toolbox-item toolbox-show select-box">
                                        <select name="count" class="form-control">
                                            <option value="9">Affichage de 9</option>
                                            <option value="12" selected="selected">Show 12</option>
                                            <option value="24">Show 24</option>
                                            <option value="36">Show 36</option>
                                        </select>
                                    </div>
                                    <div class="toolbox-item toolbox-layout">
                                        <a href="shop-banner-sidebar.html" class="icon-mode-grid btn-layout">
                                            <i class="w-icon-grid"></i>
                                        </a>
                                        <a href="shop-list.html" class="icon-mode-list btn-layout active">
                                            <i class="w-icon-list"></i>
                                        </a>
                                    </div>
                                </div>
                            </nav>


                            <div class="product-wrapper row cols-xl-2 cols-sm-1 cols-xs-2 cols-1 mt-4 pb-3">

                                {{-- Produit item --}}
                                <div class="product product-list ">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="front/assets/images/shop/1.jpg" alt="Product" width="330"
                                                height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quick View"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat">
                                            <a href="shop-banner-sidebar.html">Electronique</a>
                                        </div>
                                        <h4 class="product-name">
                                            <a href="product-default.html">Ecran Nasco 32" pouces </a>
                                        </h4>
                                        <div class="ratings-container">
                                        
                                            <a href="product-default.html" class="rating-reviews">Abidjan, Yopougon</a>
                                        </div>
                                        
                                        <div class="product-desc">
                                           Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga unde culpa sequi commodi exercitationem tempore dignissimos...
                                        </div>
                                        <div class="product-action">
                                            <div class="product-price">30 000 F</div>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            
                                        </div>
                                    </div>
                                </div>

                                {{-- Produit item --}}
                                <div class="product product-list ">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="front/assets/images/shop/1.jpg" alt="Product" width="330"
                                                height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quick View"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat">
                                            <a href="shop-banner-sidebar.html">Electronique</a>
                                        </div>
                                        <h4 class="product-name">
                                            <a href="product-default.html">Ecran Nasco 32" pouces </a>
                                        </h4>
                                        <div class="ratings-container">
                                        
                                            <a href="product-default.html" class="rating-reviews">Abidjan, Yopougon</a>
                                        </div>
                                        
                                        <div class="product-desc">
                                           Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga unde culpa sequi commodi exercitationem tempore dignissimos...
                                        </div>
                                        <div class="product-action">
                                            <div class="product-price">30 000 F</div>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            
                                        </div>
                                    </div>
                                </div>

                                {{-- Produit item --}}
                                <div class="product product-list ">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="front/assets/images/shop/1.jpg" alt="Product" width="330"
                                                height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quick View"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat">
                                            <a href="shop-banner-sidebar.html">Electronique</a>
                                        </div>
                                        <h4 class="product-name">
                                            <a href="product-default.html">Ecran Nasco 32" pouces </a>
                                        </h4>
                                        <div class="ratings-container">
                                        
                                            <a href="product-default.html" class="rating-reviews">Abidjan, Yopougon</a>
                                        </div>
                                        
                                        <div class="product-desc">
                                           Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga unde culpa sequi commodi exercitationem tempore dignissimos...
                                        </div>
                                        <div class="product-action">
                                            <div class="product-price">30 000 F</div>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            
                                        </div>
                                    </div>
                                </div>

                                {{-- Produit item --}}
                                <div class="product product-list ">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="front/assets/images/shop/1.jpg" alt="Product" width="330"
                                                height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quick View"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat">
                                            <a href="shop-banner-sidebar.html">Electronique</a>
                                        </div>
                                        <h4 class="product-name">
                                            <a href="product-default.html">Ecran Nasco 32" pouces </a>
                                        </h4>
                                        <div class="ratings-container">
                                        
                                            <a href="product-default.html" class="rating-reviews">Abidjan, Yopougon</a>
                                        </div>
                                        
                                        <div class="product-desc">
                                           Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga unde culpa sequi commodi exercitationem tempore dignissimos...
                                        </div>
                                        <div class="product-action">
                                            <div class="product-price">30 000 F</div>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            
                                        </div>
                                    </div>
                                </div>

                                {{-- Produit item --}}
                                <div class="product product-list ">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="front/assets/images/shop/1.jpg" alt="Product" width="330"
                                                height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quick View"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat">
                                            <a href="shop-banner-sidebar.html">Electronique</a>
                                        </div>
                                        <h4 class="product-name">
                                            <a href="product-default.html">Ecran Nasco 32" pouces </a>
                                        </h4>
                                        <div class="ratings-container">
                                        
                                            <a href="product-default.html" class="rating-reviews">Abidjan, Yopougon</a>
                                        </div>
                                        
                                        <div class="product-desc">
                                           Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga unde culpa sequi commodi exercitationem tempore dignissimos...
                                        </div>
                                        <div class="product-action">
                                            <div class="product-price">30 000 F</div>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            
                                        </div>
                                    </div>
                                </div>

                                {{-- Produit item --}}
                                <div class="product product-list ">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="front/assets/images/shop/1.jpg" alt="Product" width="330"
                                                height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quick View"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat">
                                            <a href="shop-banner-sidebar.html">Electronique</a>
                                        </div>
                                        <h4 class="product-name">
                                            <a href="product-default.html">Ecran Nasco 32" pouces </a>
                                        </h4>
                                        <div class="ratings-container">
                                        
                                            <a href="product-default.html" class="rating-reviews">Abidjan, Yopougon</a>
                                        </div>
                                        
                                        <div class="product-desc">
                                           Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga unde culpa sequi commodi exercitationem tempore dignissimos...
                                        </div>
                                        <div class="product-action">
                                            <div class="product-price">30 000 F</div>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            
                                        </div>
                                    </div>
                                </div>

                                {{-- Produit item --}}
                                <div class="product product-list ">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="front/assets/images/shop/1.jpg" alt="Product" width="330"
                                                height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quick View"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat">
                                            <a href="shop-banner-sidebar.html">Electronique</a>
                                        </div>
                                        <h4 class="product-name">
                                            <a href="product-default.html">Ecran Nasco 32" pouces </a>
                                        </h4>
                                        <div class="ratings-container">
                                        
                                            <a href="product-default.html" class="rating-reviews">Abidjan, Yopougon</a>
                                        </div>
                                        
                                        <div class="product-desc">
                                           Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga unde culpa sequi commodi exercitationem tempore dignissimos...
                                        </div>
                                        <div class="product-action">
                                            <div class="product-price">30 000 F</div>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            
                                        </div>
                                    </div>
                                </div>

                                {{-- Produit item --}}
                                <div class="product product-list ">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="front/assets/images/shop/1.jpg" alt="Product" width="330"
                                                height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quick View"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat">
                                            <a href="shop-banner-sidebar.html">Electronique</a>
                                        </div>
                                        <h4 class="product-name">
                                            <a href="product-default.html">Ecran Nasco 32" pouces </a>
                                        </h4>
                                        <div class="ratings-container">
                                        
                                            <a href="product-default.html" class="rating-reviews">Abidjan, Yopougon</a>
                                        </div>
                                        
                                        <div class="product-desc">
                                           Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga unde culpa sequi commodi exercitationem tempore dignissimos...
                                        </div>
                                        <div class="product-action">
                                            <div class="product-price">30 000 F</div>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            
                                        </div>
                                    </div>
                                </div>

                               
                               
                            </div>


                            <div class="toolbox toolbox-pagination justify-content-between">

                                <p class="showing-info mb-2 mb-sm-0">
                                    Liste de <span>1-12 sur 60</span> articles
                                </p>

                                <ul class="pagination">
                                    <li class="prev disabled">
                                        <a href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                            <i class="w-icon-long-arrow-left"></i>Préc.
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="next">
                                        <a href="#" aria-label="Next">
                                            Suiv.<i class="w-icon-long-arrow-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- End of Shop Main Content -->
                    </div>
                    <!-- End of Shop Content -->
                </div>
            </div>
            <!-- End of Page Content -->
        </main>





        <!-- Start of Footer -->
        @include('layouts/front/includes/footer')
        <!-- End of Footer -->
    </div>
    <!-- End of Page-wrapper-->


    {{-- CSS files --}}
    @include('layouts/front/assets/js')

</body>

</html>