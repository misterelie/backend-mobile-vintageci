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
                                <h4 class="mb-sm-0 font-size-18">A propos de l'utilisateur</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Utilisateurs</a></li>
                                        <li class="breadcrumb-item active">Détails </li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->


                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card overflow-hidden">
                                <div class="bg-primary bg-soft">
                                    <div class="row">
                                        <div class="col-12 h-120 max-height-120" style="height: 125px; overflow:hidden">
                                            <img src="{{ asset('front/assets/images/banner.jpg') }}" alt=""
                                                class="img-fluid " loading="lazy">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="avatar-md profile-user-wid mb-4">
                                                @if(!is_null($user->avatar))
                                                <div class="avatar">
                                                    <img src="{{asset($user->avatar) }} " alt=" " class="img-fluid"
                                                        class="img-thumbnail rounded-circle">
                                                </div>
                                                @else
                                                <div class="avatar-xs">
                                                    <span class="avatar-title rounded-circle">
                                                        {{ Str::upper(Helpers::pseudo($user->user_firstname) . "".
                                                        Helpers::pseudo($user->user_lastname)) }}
                                                    </span>
                                                </div>
                                                @endif
                                            </div>
                                            <h5 class="font-size-15 text-truncate">{{
                                                Str::upper(($user->user_firstname) . "".
                                                ($user->user_lastname)) }}</h5>
                                            <p class="text-muted mb-0 text-truncate">{{ ($user->user_type === 0) ?
                                                "Annonceur" : "Administrateur" }}</p>
                                        </div>

                                        <div class="col-sm-12 text-center">
                                            <div class="pt-2">

                                                <a href="{{url('backend/users') }} " class="btn btn-primary waves-effect waves-light btn-sm"> <i class="mdi mdi-arrow-left ms-1"></i> Retour</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Informations Personnelles:</h4>


                                    <div class="table-responsive">
                                        <table class="table table-nowrap mb-0">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Téléphone:</th>
                                                    <td>{{ $user->user_phone}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Whatsapp :</th>
                                                    <td>{{ $user->user_whatsapp}}</td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">E-mail :</th>
                                                    <td>{{ $user->user_email}}</td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">Adresse :</th>
                                                    <td>{{ $user->user_city}} </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->


                        </div>

                        <div class="col-xl-8">

                            <div class="row">
                                {{-- Widget --}}
                                <div class="col-md-3">
                                    <div class="card mini-stats-wid">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="text-muted fw-medium mb-2">Annonces au total</p>
                                                    <h4 class="mb-0">{{ Stat::countAnnonce($user->id)}}</h4>
                                                </div>

                                                <div class="flex-shrink-0 align-self-center">
                                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-check-circle font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Widgets --}}
                                <div class="col-md-3">
                                    <div class="card mini-stats-wid">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="text-muted fw-medium mb-2">Annonces en ligne</p>
                                                    <h4 class="mb-0">{{ Stat::countOnlineAnnonce($user->id)}}</h4>
                                                </div>

                                                <div class="flex-shrink-0 align-self-center">
                                                    <div class="avatar-sm mini-stat-icon rounded-circle bg-primary">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-hourglass font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Widget --}}
                                <div class="col-md-3">
                                    <div class="card mini-stats-wid">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="text-muted fw-medium mb-2">Annonce en attente</p>
                                                    <h4 class="mb-0">{{ Stat::countPausedAnnonce($user->id)}}</h4>
                                                </div>

                                                <div class="flex-shrink-0 align-self-center">
                                                    <div class="avatar-sm mini-stat-icon rounded-circle bg-primary">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-package font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card mini-stats-wid">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="text-muted fw-medium mb-2">Annonces en rejetées</p>
                                                    <h4 class="mb-0">{{ Stat::countRejectedAnnonce($user->id)}}</h4>
                                                </div>

                                                <div class="flex-shrink-0 align-self-center">
                                                    <div class="avatar-sm mini-stat-icon rounded-circle bg-primary">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-package font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            {{-- Mes annonces --}}

                            <div class="row">


                                @if (!is_null($annonces))


                                @foreach ($annonces as $an)
                                <div class="col-sm-6">
                                    <div class="card p-1 border shadow-none">

                                        <div class="position-relative">
                                           <div class="width-60 w-60 m-auto">
                                            <img src="{{ asset($an->photo_1)  }}" alt="{{ $an->titre }}" class="img-thumbnail img-fluid">
                                           </div>
                                        </div>
                                        <div class="p-3">
                                            <h5><a href="{{ url('annonces/single', $an->pk)}}" class="text-dark">{{ $an->titre}}</a></h5>
                                            <p class="text-muted mb-0">{{ Dates::dateFr($an->created_at)}}</p>
                                        </div>

                                        <div class="p-3">
                                            <ul class="list-inline">
                                                <li class="list-inline-item me-3">
                                                    <a href="javascript: void(0);" class="text-muted">
                                                        <i
                                                            class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i>
                                                        {{ !is_null($an->category) ? $an->category->category : null }}
                                                    </a>
                                                </li>
                                                <li class="list-inline-item me-3">
                                                    <a href="javascript: void(0);" class="text-muted">
                                                        <span>
                                                            <i class="fa fa-eye align-middle text-muted me-1"></i>
                                                      <b>
                                                        {{ $an->vue}}
                                                      </b>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                            
                                            <div>
                                                <a href="{{ url('annonces/single', $an->pk)}}" class="text-primary">Détail de l'annonce <i
                                                        class="mdi mdi-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                @endif


                            </div>

                            <div class="row mb-4 mt-4 py-3 justify-content-end text-right">
                                @if (!is_null($annonces))
                                    {{ $annonces->links()}}
                                @endif
                            </div>


                        </div>
                    </div>



                    <!-- end row -->
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
</body>

</html>