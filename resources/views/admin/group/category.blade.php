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
                                    <h4 class="mb-sm-0 font-size-18">Catégories</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Catégories</a></li>
                                            <li class="breadcrumb-item active">Gestion des catégories</li>
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
                                                   

                                                    <button type="button" class="btn btn-primary btn-rounded" data-bs-toggle="modal" data-bs-target=".addModal">
                                                        <i class="mdi mdi-plus me-1"></i> Ajouter une catégorie
                                                    </button>
                                                </div>
                                            </div><!-- end col-->
                                        </div>
                
                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap table-check">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th style="width: 20px;" class="align-middle">
                                                           Photo
                                                        </th>
                                                        <th class="align-middle text-uppercase">Catégorie</th>
                                                        <th class="align-middle text-uppercase">Auteur</th>
                                                        <th class="align-middle text-uppercase">Date</th>

                                                        <th class="align-middle text-uppercase">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    @if(!is_null($categories))
                                                    @foreach($categories as $cat)
                                                    <tr>
                                                        <td>
                                                            <div class="form-check border-radius-50 round rounded-circle circle w-50" >
                                                               <img src="{{ asset($cat->photo)}} " alt="" class="img-dfluid" width="50">
                                                            </div>
                                                        </td>
                                                        
                                                        <td><strong>{{ Str::ucfirst($cat->category)}} </strong></td>
                                                        
                                                        <td>
                                                            @if(!is_null($cat->author))
                                                           {{ $cat->author->user_firstname ." ". $cat->author->user_lastname}}
                                                           @endif
                                                        </td>
                                                        <td>
                                                            {{ Dates::formatFr($cat->created_at)}}
                                                        </td>
                                                        
                                                        <td>
                                                            <div class="d-flex gap-3">
                                                                <a href="javascript:void(0);" class="text-success" data-bs-toggle="modal" data-bs-target=".editModal{{$cat->id}}"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                                
                                                                <a href="{{ url("/category/destroy", $cat)}}" class="text-danger" onclick="return confirm('Êtes-vous sûrs de vouloir supprimer cet élément ?')"><i class="mdi mdi-delete font-size-18"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>


                                       {{ $categories->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->




                <!-- Create Modal -->
                <div class="modal fade addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addModalLabel">Nouvelle catégorie:</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               
                                <div class="col m-auto p-3">

                                    <form action="{{ url("category/store")}} " method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group mb-3">
                                        <label for="photo" class="form-copntrol-label">Photo d'illustration: <span class="text-danger">*</span> </label>
                                        <input type="file" name="photo" id="photo" class="form-control" required>
                                    
                                    </div>
                                
                                        <div class="form-group mb-3">
                                            <label for="category" class="form-copntrol-label">Intitulé de la catégorie: <span class="text-danger">*</span> </label>
                                            <input type="text" name="category" id="category" class="form-control" required>
                                        
                                        </div>

                                        <div class="form-group text-right text-end">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                                            <button class="btn btn-primary float-right">Valider</button>
                                        </div>
                                </form>
                                </div>
                           
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- end modal -->




                {{-- Edit Modal --}}

                @if (!is_null($categories))
                @foreach ($categories as $cat)
                    <!-- Create Modal -->
                <div class="modal fade editModal{{ $cat->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel{{ $cat->id}}">Mise à jour de la catégorie:</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               
                                <div class="col m-auto p-3">

                                    <form action="{{ url("category/update", $cat)}} " method="post" enctype="multipart/form-data">
                                    @csrf
                                

                                    <div class="form-group mb-3">
                                        <label for="photo" class="form-copntrol-label">Photo d'illustration: <span class="text-danger">*</span> </label>
                                        <input type="file" name="photo" id="photo" class="form-control" required>
                                    
                                    </div>
                                        <div class="form-group mb-3">
                                            <label for="category" class="form-copntrol-label">Intitulé de la catégorie: <span class="text-danger">*</span> </label>
                                            <input type="text" name="category" id="category" class="form-control" value="{{ $cat->category}} "  required>
                                        
                                        </div>

                                        <div class="form-group text-right text-end">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                                            <button class="btn btn-primary float-right">Valider</button>
                                        </div>
                                </form>
                                </div>
                           
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- end modal -->
                @endforeach
                    
                @endif




                
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
