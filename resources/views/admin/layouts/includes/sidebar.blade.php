<!-- Sidemenu Area -->
<div class="ecaps-sidemenu-area">
            
    <!-- Logo -->
    <div class="ecaps-logo" title="Retour au site" >
        <a href="{{ url("/") }}">
            <div class="" style="height: 35px !important; overflow: hidden !important;">
                <img class="desktop-logo" src="{{asset('storage/'.  Site::logo()) }}" alt="Desktop Logo">
                <img class="small-logo" src="{{asset('storage/'. Site::logo()) }}" alt="Mobile Logo">
            </div>
            
        </a>
    </div>

    <!-- Side Nav -->
    <div class="ecaps-sidenav" id="ecapsSideNav">
        <!-- Side Menu Area -->
        <div class="side-menu-area">
            <!-- Sidebar Menu -->


            <nav>
                <ul class="sidebar-menu mb-4 pb-2" data-widget="tree">

                    {{-- Tableau de Bord --}}
                    <li class="active">
                        <a href="{{ url("main/dashboard")}}"><i class='lni lni-home'></i><span>Tableau de bord</span></a>
                    </li>


                     {{-- Paramètres --}}
                     <li class="treeview">
                        <a href="javascript:void(0)"><i class='fa fa-cogs'></i><span>Paramètres</span> <i
                                class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{url("/logo")}}">
                                    Logo
                                </a>
                            </li>
                            <li class="">
                                <a href="{{ url("adresses")}}">Adresses</a>
                            </li>
                            
                            <li>
                                <a href="{{url("/sliders")}}">Sliders</a>
                            </li>

                            <li class="">
                                <a href="{{ url("/banners")}}">Bannières de pages</a>
                            </li>
                           
                            <li>
                                <a href="{{url("/users")}}">
                                    Utilisateurs
                                </a>
                            </li>
                         
                        </ul>
                    </li> 

                    {{-- Pages --}}
                      {{-- Pages --}}
                      <li class="treeview">
                        <a href="javascript:void(0)"><i class='fa fa-bars'></i><span>Pages</span> <i
                                class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{url("/about")}}">
                                    Présentations
                                </a>
                            </li>
                            <li>
                                <a href="{{url("/mentions")}}">
                                    Mentions légales
                                </a>
                            </li>

                            <li>
                                <a href="{{url("/realisations")}}">Réalisations</a>
                            </li>
        
                            <li>
                                <a href="{{url("/references")}}">Références</a>
                            </li>
                        </ul>
                    </li> 
                   

                    {{-- Chiffres --}}
                    <li>
                        <a href="{{url("/chiffres")}}"><i class='lni lni-bar-chart'></i><span>Nos chiffres</span></a>
                    </li>

                    <li>
                        <a href="{{url("/video")}}"><i class='lni lni-youtube'></i><span>Vidéo</span></a>
                    </li>

                  
                    


                   


                    {{-- Groupe --}}
                    <li class="treeview">
                        <a href="javascript:void(0)"><i class='fa fa fa-bars'></i><span>Services</span> <i
                                class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{url("/categories")}}">
                                    Catégories
                                </a>
                            </li>
                           
                            <li>
                                <a href="{{url("/articles")}}">
                                    Articles
                                </a>
                            </li>
                            <li>
                                <a href="{{url("/offres")}}">
                                    Offres
                                </a>
                            </li>
                            <li>
                                <a href="{{url("/produits")}}">
                                    Produits
                                </a>
                            </li>
                         
                        </ul>
                    </li> 
                    

                    {{-- Messages --}}
                    <li>
                        <a href="{{url("/messages")}}"><i class='fa fa-envelope'></i><span>Messages</span></a>
                    </li>

                    {{-- NewsLetter --}}
                    <li>
                        <a href="{{url("/newsletters")}}"><i class='fa fa-envelope'></i><span>Newsletter</span></a>
                    </li>

                    <li>
                        <a href="{{url("/temoignages")}}"><i class='fa fa-comments'></i><span>Témoignages</span></a>
                    </li>

                   

                    <li>
                        <a href="{{url("/devis")}}"><i class='fa fa-calculator'></i><span>Demandes de devis</span></a>
                    </li>
                    <li>
                        <a href="{{url("/users")}}"><i class='fa fa-users'></i><span>Utilisateurs</span></a>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</div>