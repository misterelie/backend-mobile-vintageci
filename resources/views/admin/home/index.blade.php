<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/skote/layouts/layouts-horizontal.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Aug 2022 17:23:49 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>{{ $page_title }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        

        {{-- CSS FILES --}}
        @include('layouts/admin/assets/css')
    </head>

    <body data-topbar="dark" data-layout="horizontal">

        <!-- Begin page -->
        <div id="layout-wrapper">

            @include('layouts/admin/includes/topbar')
            @include('layouts/admin/includes/navbar')
            
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Tableau de bord</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item">
                                                <a href="javascript: void(0);">Tableau de bord</a></li>
                                            {{-- <li class="breadcrumb-item active">Horizontal Layout</li> --}}
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                           
                            <div class="col-xl-12">
                                <div class="row">

                                    {{-- Annonces totales --}}
                                    <div class="col-md-3">
                                        <a href="{{ url('backend/annonces') }} ">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Total des annonces</p>
                                                        <h4 class="mb-0">{{ Stat::getrows("annonces", "deleted", 0) }}</h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-list-ol font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    </div>

                                    {{-- Annonces en attente --}}
                                    <div class="col-md-3">
                                        <a href="{{ url('backend/annonces') }} ">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Annonces en attente</p>
                                                        <h4 class="mb-0">
                                                            {{ Stat::getrows("annonces", "statut", 0) }}    
                                                        </h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-warning">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-sync font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                    </div>

                                    {{-- Annonce validées --}}
                                    <div class="col-md-3">
                                        <a href="{{ url('backend/online-annonces') }} ">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Annonces en ligne</p>
                                                        <h4 class="mb-0">{{ Stat::getrows("annonces", "statut", 1) }}</h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm rounded-circle bg-success mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-success">
                                                                <i class="bx bx-check-shield  font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                    </div>

                                    {{-- Annonces rejetées --}}
                                    <div class="col-md-3">
                                        <a href="{{ url('backend/rejected-annonces') }} ">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Annonces rejetées</p>
                                                        <h4 class="mb-0">{{ Stat::getrows("annonces", "statut", 2) }}</h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm rounded-circle bg-red mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-danger">
                                                                <i class="bx bx-x-circle  font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                    </div>

                                    {{-- Annonces supprimées --}}
                                    <div class="col-md-3">
                                        <a href="{{ url('backend/rejected-annonces') }} ">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Annonces supprimées</p>
                                                        <h4 class="mb-0">{{ Stat::getrows("annonces", "statut", 3) }}</h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-danger">
                                                                <i class="bx bxs-trash  font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                    </div>

                                    {{-- Utilisateurs --}}
                                    <div class="col-md-3">
                                        <a href="{{ url('backend/users') }} ">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Utilisateurs</p>
                                                        <h4 class="mb-0">{{ Stat::getrows("users", "user_type", 0) }}</h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="bx bxs-user-rectangle  font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                    </div>

                                    {{-- Messages --}}
                                    <div class="col-md-3">
                                        <a href="{{ url('/contacts') }} ">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Messages reçus</p>
                                                        <h4 class="mb-0">{{ Stat::getrows("contacts") }}</h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm rounded-circle bg-dark mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-dark">
                                                                <i class="bx bx bx-message-alt-dots  font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                    </div>

                                    {{-- Messages --}}
                                    <div class="col-md-3">
                                        <a href="{{ url('backend/categories') }} ">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Catégories</p>
                                                        <h4 class="mb-0">{{ Stat::getrows("categories") }}</h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm rounded-circle bg-secondary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-secondary">
                                                                <i class="bx bx bx-grid-alt   font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                    </div>


                                </div>
                                <!-- end row -->

                              
                            </div>
                        </div>
                        <!-- end row -->


                        {{-- Repartitions --}}
                        <div class="row my-4">
                                @if (!is_null($annnoncesAttente) && $annnoncesAttente->count() > 0)
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title text-uppercase mb-4">Annonces par STATUT :</h4>

                                            <div>
                                                <div id="donut-chart" class="apex-charts"></div>
                                            </div>

                                            <div class="text-center text-muted">
                                                <div class="row">
                                                    @foreach ($annnoncesAttente as $key => $row)
                                                        <div class="col-4">
                                                            <div class="mt-4">
                                                                <p class="mb-2 text-truncate relative position-relative">
                                                                <div class=""
                                                                    style="background-color: {{ Helpers::legend($row->statut)['color'] }}; height:18px; width:18px; border-radius: 50%; padding: 1px; position: absolute; top: 35px">
                                                                </div>
                                                                <span>{{ Helpers::legend($row->statut)['text'] }}</span></p>
                                                                <h5>{{ $row->count }}</h5>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- Area chart --}}

                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="row">
                                    

                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-wrap align-items-start">
                                            <h5 class="card-title me-2">Evolution des Annonces :</h5>
                                            
                                        </div>

                                        <div class="row text-center">
                                            <div class="col-lg-4">
                                                <div class="mt-4">
                                                    <p class="text-muted mb-1">Cette Semaine :</p>
                                                    <h5>{{Stat::itemOfWeek()}} </h5>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-4">
                                                <div class="mt-4">
                                                    <p class="text-muted mb-1">Ce Mois :</p>
                                                    <h5>{{Stat::itemOfMonth()}} </h5>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="mt-4">
                                                    <p class="text-muted mb-1">Cette Année :</p>
                                                    <h5>{{Stat::itemOfYear()}} </span></h5>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="mb-4">
                                        
                                        <div class="apex-charts" id="area-chart" dir="ltr"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Visites du site</h4>

                                    <div class="page-title-right">
                                        <span class="badge badge-lg font-weight-bold fw-bolder px-4  bg-primary">
                                            <h4 class="mt-1 text-white">Total de visites : <b>{{Stat::visites() }}</b></h4>
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                           
                            <div class="col-xl-12">
                                <div class="row">

                                    {{-- Annonces supprimées --}}
                                    <div class="col-md-3">
                                        <a href="{{ url('backend/rejected-annonces') }} ">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Ordinateurs</p>
                                                        <h4 class="mb-0">{{ Stat::visitesByDevice("Ordinateur") }}</h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-danger">
                                                                <i class="bx bx-desktop  font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                    </div>

                                    {{-- Annonces supprimées --}}
                                    <div class="col-md-3">
                                        <a href="{{ url('backend/rejected-annonces') }} ">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Tablettes</p>
                                                        <h4 class="mb-0">{{ Stat::visitesByDevice("Tablette") }}</h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-dark">
                                                                <i class="fas fa-tablet  font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                    </div>

                                    {{-- Annonces supprimées --}}
                                    <div class="col-md-3">
                                        <a href="{{ url('backend/rejected-annonces') }} ">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Mobile</p>
                                                        <h4 class="mb-0">{{ Stat::visitesByDevice("Mobile") }}</h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="fas fa-mobile  font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                    </div>

                                    {{-- Annonces supprimées --}}
                                    <div class="col-md-3">
                                        <a href="{{ url('backend/rejected-annonces') }} ">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Robot</p>
                                                        <h4 class="mb-0">{{ Stat::visitesByDevice("Robot") }}</h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm rounded-circle bg-orange mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-warning text-dark">
                                                                <i class="fas fa-robot  font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                    </div>

                                </div>
                                <!-- end row -->

                              
                            </div>
                        </div>

                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->



                {{-- Footer --}}
                @include('layouts/admin/includes/footer')
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        @include('layouts/admin/assets/js')
        @include('layouts/script/dashboard-init')
    </body>
</html>
