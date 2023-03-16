<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link arrow-none" href="{{ url('/back-office')}} " id="topnav-dashboard">
                            <i class="bx bx bx-home me-2"></i><span key="t-dashboards">Tableau de bord</span>
                        </a>
                    </li>

                     {{-- A propos --}}
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
                        >
                            <i class="bx bx bx-user-pin me-2"></i><span key="t-dashboards">A propos</span> <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">

                            <a href="{{ url("/adresses")}}" class="dropdown-item" key="t-default">Adresses</a>

                            <a href="{{ url("/pages")}}" class="dropdown-item" key="t-default">Titres de pages </a>
                        

                            <a href="{{ url("/questions")}}" class="dropdown-item" key="t-default">FAQ</a>
                            <a href="{{ url("/cgus")}}" class="dropdown-item" key="t-default">Conditions Générales</a>
                            
                            <a href="{{ url("/pi")}}" class="dropdown-item" key="t-default">Propriété intellectuelle</a>

                            <a href="{{ url("/mentions")}}" class="dropdown-item" key="t-default">Mentions légales</a>

                            <a href="{{ url("/helps/manage")}}" class="dropdown-item" key="t-default">Aide</a>
                        </div>
                    </li>

                    {{-- Home --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
                        >
                            <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Catégories</span> <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">

                            <a href="{{ url("/backend/categories")}}" class="dropdown-item" key="t-default">Les catégories</a>

                            <a href="{{ url("/souscategories")}}" class="dropdown-item" key="t-default">Sous-catégories</a>

                            <a href="{{ url("/communes")}}" class="dropdown-item" key="t-default">Communes</a>
                            <a href="{{ url("/marques")}}" class="dropdown-item" key="t-default">Marques</a>
                        </div>
                    </li>

                    {{-- Annonces --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
                        >
                            <i class="bx bx bxs-hourglass-bottom  me-2"></i><span key="t-dashboards">Annonces</span> <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">

                            <a href="{{ url("backend/annonces")}}" class="dropdown-item" key="t-default">Annonces en attente</a>

                            <a href="{{ url("backend/online-annonces")}}" class="dropdown-item" key="t-default">Annonces en ligne</a>

                            <a href="{{ url("backend/rejected-annonces")}}" class="dropdown-item" key="t-default">Annonces refusées</a>

                            <a href="{{ url("backend/removeds")}}" class="dropdown-item" key="t-removed">Annonces retirées</a>

                        </div>
                    </li>

                  
                    {{-- Users --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
                        >
                            <i class="bx bx bx-user-pin me-2"></i><span key="t-dashboards">Utilisateurs</span> <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">

                            <a href="{{ url("backend/users")}}" class="dropdown-item" key="t-default">Les Annonceurs</a>

                            <a href="{{ url("backend/admins")}}" class="dropdown-item" key="t-default">Les Editeurs</a>

                        </div>
                    </li>

                    {{-- Crédits  --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
                        >
                            <i class="bx bx bx-money me-2"></i><span key="t-dashboards">Crédits</span> <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">

                            <a href="{{ url("credits/manage")}}" class="dropdown-item" key="t-default">Les offres</a>

                            <a href="{{ url("credits/purchases")}}" class="dropdown-item" key="t-default">Achats de crédits</a>

                            {{-- credits/purchases --}}

                        </div>
                    </li>

                    {{-- VIP  --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
                        >
                            <i class="bx bx bx-money me-2"></i><span key="t-dashboards">VIP</span> <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">

                            <a href="{{ url("vips/manage")}}" class="dropdown-item" key="t-default">Offres VIP</a>

                            <a href="{{ url("vips/purchases")}}" class="dropdown-item" key="t-default">Achats VIP</a>
                            
                            <a href="{{ url("boosted/annonces")}}" class="dropdown-item" key="t-default">Anonces VIP</a>


                            {{-- credits/purchases --}}

                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link arrow-none" href="{{ url('/contacts')}} " id="topnav-dashboard">
                            <i class="bx bx bx-envelope me-2"></i><span key="t-dashboards">Messages</span>
                        </a>
                    </li>
                   
                </ul>
            </div>
        </nav>
    </div>
</div>
