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
                                    <h4 class="mb-sm-0 font-size-18">Utilisateurs</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Utilisateurs</a></li>
                                            <li class="breadcrumb-item active">Gestion des Annonceurs </li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-sm-4">
                                                <div class="search-box me-2 mb-2 d-inline-block">
                                                    {{-- <div class="position-relative">
                                                        <input type="text" class="form-control" placeholder="Recherche...">
                                                        <i class="bx bx-search-alt search-icon"></i>
                                                    </div> --}}
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="text-sm-end">
                                                   

                                                    {{-- <button type="button" class="btn btn-primary btn-rounded" data-bs-toggle="modal" data-bs-target=".addModal">
                                                        <i class="mdi mdi-plus me-1"></i> Ajouter une uségorie
                                                    </button> --}}
                                                </div>
                                            </div><!-- end col-->
                                        </div>
                
                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap table-check">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th class="align-middle text-uppercase">Photo</th>
                                                        <th class="align-middle text-uppercase" width="9%">Nom & Prénoms</th>
                                                        <th class="align-middle text-uppercase">Email</th>
                                                        <th class="align-middle text-uppercase">Contact</th>
                                                        <th class="align-middle text-uppercase">Statut</th>
                                                        <th class="align-middle text-uppercase">Date</th>

                                                        <th class="align-middle text-uppercase">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    @if(!is_null($users))
                                                    @foreach($users as $us)
                                                    <tr>
                                                        <td>
                                                             <a href="{{ url('backend/user-single', $us->id)}} ">
                                                            @if (!is_null($us->avatar))
                                                            <div class="avatar-xs">
                                                                <img src="{{asset($us->avatar) }} "  alt=" " class="img-fluid" >
                                                            </div>
                                                            @else
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title icone rounded-circle">
                                                                    {{ Str::upper(Helpers::pseudo($us->user_firstname) . "". Helpers::pseudo($us->user_lastname)) }}
                                                                </span>
                                                            </div>
                                                            @endif
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <strong>{{ Str::ucfirst($us->user_firstname) ." ". Str::ucfirst($us->user_lastname)}} </strong>
                                                        </td>
                                                        
                                                        <td>
                                                            <a href="mailto:{{ Str::ucfirst($us->user_email)}} ">
                                                                {{ Str::ucfirst($us->user_email)}} </a>
                                                        </td>

                                                        <td>
                                                            <a href="tel:{{ $us->user_phone }} ">
                                                                <strong>
                                                                    {{ $us->user_phone }} 
                                                                </strong>
                                                            </a>
                                                        </td>
                                                        
                                                        <td>
                                                           @if ((bool) $us->user_validated === true)
                                                           <span class="badge badge-soft-success font-size-11 m-1">
                                                            Validé
                                                           </span>
                                                           @endif

                                                           @if ((bool) $us->user_validated === false)
                                                           <span class="badge badge-soft-danger font-size-11 m-1">
                                                            Inactif
                                                           </span>
                                                           @endif
                                                        </td>

                                                        <td>
                                                            {{ Dates::formatFr($us->created_at)}}
                                                        </td>
                                                        
                                                        <td >
                                                            <div class=" btn-group">
                                                                
                                                                <a href="{{ url('backend/user-single', $us->id)}}" class="btn btn-sm btn-dark text-white" title="Détail sur le compte"><i class="fa fa-eye"></i></a>
                                                                
                                                                <a href="{{ url("/user/destroy", $us)}}" class="btn btn-sm btn-danger text-white" onclick="return confirm('Êtes-vous sûrs de vouloir supprimer cette annonce ?')" title="Supprimer le compte"><i class="mdi mdi-delete "></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>


                                       {{ $users->links()}}
                                    </div>
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
