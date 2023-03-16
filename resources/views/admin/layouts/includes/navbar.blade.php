<header class="top-header-area d-flex align-items-center justify-content-between">

    <!-- Left Side Content -->
    <div class="left-side-content-area d-flex align-items-center">
        <!-- Mobile Logo -->
        <div class="mobile-logo mr-3 mr-sm-4">
            <a href="{{ url("/")}}">
                <img src="{{asset('storage/'. !is_null(Site::logo()) ? Site::logo() : '') }} " alt="Mobile Logo">
            </a>
        </div>

        <!-- Triggers -->
        <div class="ecaps-triggers mr-1 mr-sm-3">
            <div class="menu-collasped" id="menuCollasped">
                <i class='lni lni-grid-alt'></i>
            </div>
            <div class="mobile-menu-open" id="mobileMenuOpen">
                <i class='lni lni-grid-alt'></i>
            </div>
        </div>

        <!-- Left Side Nav -->
        <ul class="left-side-navbar d-flex align-items-center">
            
        </ul>
    </div>

    <!-- Right Side Navbar -->
    <div class="right-side-navbar d-flex align-items-center justify-content-end">
        <!-- Mobile Trigger -->
        <div class="right-side-trigger" id="rightSideTrigger">
            <i class='lni lni-grid-alt'></i>
        </div>

        <!-- Top Bar Nav -->
        <ul class="right-side-content d-flex align-items-center">
           
          

            <li class="nav-item dropdown">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('storage/'.User::onlineAdmin()->photo)}} " alt=" photo {{User::onlineAdmin()->nom}}" class="img-fluid">
                </button>

                <!-- Dropdown Menu -->
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- User Profile Area -->
                    <div class="user-profile-area">
                        <div class="user-profile-heading">
                            <!-- Thumb -->
                            <div class="profile-thumbnail">
                                @if (isset(User::onlineAdmin()->photo))
                                <img src="{{ asset('storage/'.User::onlineAdmin()->photo) }}" alt="">
                                @else
                              <span class="fa fa-user-circle"></span>
                                @endif
                            </div>
                            <!-- Profile Text -->
                            <div class="profile-text">
                                <h6>{{ User::onlineAdmin()->nom}}</h6>
                                <span>{{ User::onlineAdmin()->email}}</span>
                            </div>
                        </div>

                        <a href="{{ url("user/profil")}} " class="dropdown-item"><i class='lni lni-user'></i> Mon profil</a>
                        
                        <a href="{{url("admin/logout") }} " class="dropdown-item"><i class='lni lni-lock'></i>Déconnexion</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>