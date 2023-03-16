<!doctype html>
<html lang="en">
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
                                    <h4 class="mb-sm-0 font-size-18">Annonces en ligne  </h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Annonces</a></li>
                                            <li class="breadcrumb-item active">Liste </li>
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
                                                        <i class="mdi mdi-plus me-1"></i> Ajouter une catégorie
                                                    </button> --}}
                                                </div>
                                            </div><!-- end col-->
                                        </div>
                
                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap table-check">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th class="align-middle text-uppercase">Photo</th>
                                                        <th class="align-middle text-uppercase" width="9%">Titre</th>
                                                        
                                                        <th class="align-middle text-uppercase">Catégorie</th>
                                                        {{-- <th class="align-middle text-uppercase">Auteur</th> --}}
                                                        <th class="align-middle text-uppercase">Prix</th>
                                                        <th class="align-middle text-uppercase">Date</th>
                                                        <th class="align-middle text-uppercase">Statut</th>
                                                        <th class="align-middle text-uppercase">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    @if(!is_null($annonces))
                                                    @foreach($annonces as $cat)
                                                    <tr>
                                                        <td>
                                                             <a href="{{ url('backend/single', $cat->pk)}} ">
                                                            <div>
                                                                <img src="{{asset($cat->photo_1) }} "  alt=" " class="img-fluid" width="95">
                                                            </div>
                                                            </a>
                                                        </td>

                                                        <td>
                                                            <a href="{{ url('backend/single', $cat->pk)}} ">
                                                                <strong>{{ Str::substr(Str::ucfirst($cat->titre),0, 12)."..." }} </strong>
                                                            </a>
                                                        </td>
                                                        
                                                        <td><strong>{{ Str::ucfirst($cat->category->category)}} </strong></td>
                                                        
                                                        {{-- <td>
                                                           {{!is_null($cat->author)  ?$cat->author->user_firstname ." ". $cat->author->user_lastname   : null}}
                                                        </td> --}}

                                                        <td>
                                                            {{ Helpers::moneyFormat($cat->prix) }} F
                                                        </td>

                                                        <td>
                                                            {{ Dates::formatFr($cat->created_at)}}
                                                        </td>

                                                        <td>
                                                            {!! Helpers::statut($cat->statut) !!}
                                                        </td>
                                                        
                                                        <td>
                                                            <div class=" btn-group">
                                                                
                                                                <a href="{{ url('backend/single', $cat->pk)}}" class="btn btn-sm btn-dark text-white"><i class="fa fa-eye"></i></a>
                                                                
                                                                <a href="{{ url("/annonce/destroy", $cat)}}" class="btn btn-sm btn-danger text-white" onclick="return confirm('Êtes-vous sûrs de vouloir supprimer cette annonce ?')"><i class="mdi mdi-delete "></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>


                                       {{ $annonces->links()}}
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

                                    <form action="{{ url("category/store")}} " method="post">
                                    @csrf
                                
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

                @if (!is_null($annonces))
                @foreach ($annonces as $cat)
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

                                    <form action="{{ url("category/update", $cat)}} " method="post">
                                    @csrf
                                
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
