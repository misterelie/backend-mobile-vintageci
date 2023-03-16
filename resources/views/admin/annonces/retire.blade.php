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
                                    <h4 class="mb-sm-0 font-size-18">Annonces Rétirées:</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Annonces</a></li>
                                            <li class="breadcrumb-item active">Liste de retraits </li>
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
                                                    
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="text-sm-end">
                                                   
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
                                                       
                                                        <th class="align-middle text-uppercase">Prix</th>
                                                        <th class="align-middle text-uppercase">Date</th>
                                                      
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
                                                        
                                                       

                                                        <td>
                                                            {{ Helpers::moneyFormat($cat->prix) }} F
                                                        </td>

                                                        <td>
                                                            {{ Dates::formatFr($cat->created_at)}}
                                                        </td>
                                                        
                                                        <td>
                                                            <div class=" btn-group">
                                                                <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal{{$cat->id}}" class="btn btn-sm btn-primary text-white"><i class="bx bx-notepad "></i></a>
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


        @if (!is_null($annonces))
            
        @foreach ($annonces as $an)
            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{$an->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title text-uppercase" id="exampleModalLabel">Motif du retrait:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                           <h4 class="mb-4"> {{ $an->titre }} </h4>
                      
                        <p class="font-18 text-black fw-bold">
                            {{ $an->motif }}
                        </p>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    
                    </div>
                </div>
                </div>
            </div>
        @endforeach
        @endif



        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        @include('layouts/admin/assets/js')
    </body>
</html>
