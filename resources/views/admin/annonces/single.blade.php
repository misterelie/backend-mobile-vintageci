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
                                    <h4 class="mb-sm-0 font-size-18">Petites annonces - <a href="{{ url('backend/annonces')}}"  class="badge bg-dark">Retour </a> </h4>

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
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="product-detai-imgs">
                                                    <div class="row">
                                                        <div class="col-md-2 col-sm-3 col-4">
                                                            <div class="nav flex-column nav-pills " id="v-pills-tab"
                                                                role="tablist" aria-orientation="vertical">
                                                                <a class="nav-link active" id="product-1-tab"
                                                                    data-bs-toggle="pill" href="#product-1" role="tab"
                                                                    aria-controls="product-1" aria-selected="true">


                                                                @if(!is_null($annonce->photo_1))
                                                                <img src="{{ asset($annonce->photo_1)}}" alt=""
                                                                class="img-fluid mx-auto d-block rounded">
                                                                @endif

                                                                </a>
                                                                <a class="nav-link" id="product-2-tab" data-bs-toggle="pill"
                                                                    href="#product-2" role="tab" aria-controls="product-2"
                                                                    aria-selected="false">
                                                                    @if(!is_null($annonce->photo_2))
                                                                <img src="{{ asset($annonce->photo_2)}}" alt=""
                                                                class="img-fluid mx-auto d-block rounded">
                                                                @endif
                                                                </a>

                                                                <a class="nav-link" id="product-3-tab" data-bs-toggle="pill"
                                                                    href="#product-3" role="tab" aria-controls="product-3"
                                                                    aria-selected="false">
                                                                     @if(!is_null($annonce->photo_3))
                                                                <img src="{{ asset($annonce->photo_3)}}" alt=""
                                                                class="img-fluid mx-auto d-block rounded">
                                                                @endif
                                                                </a>
                                                                <a class="nav-link" id="product-4-tab" data-bs-toggle="pill"
                                                                    href="#product-4" role="tab" aria-controls="product-4"
                                                                    aria-selected="false">
                                                                    @if(!is_null($annonce->photo_4))
                                                                    <img src="{{ asset($annonce->photo_4)}}" alt=""
                                                                    class="img-fluid mx-auto d-block rounded">
                                                                    @endif
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                                            <div class="tab-content" id="v-pills-tabContent">
                                                                <div class="tab-pane fade show active" id="product-1"
                                                                    role="tabpanel" aria-labelledby="product-1-tab">
                                                                    <div>
                                                                        @if(!is_null($annonce->photo_1))
                                                                        <img src="{{ asset($annonce->photo_1)}}" alt=""
                                                                            class="img-fluid mx-auto d-block">
                                                                             @endif
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="product-2" role="tabpanel"
                                                                    aria-labelledby="product-2-tab">
                                                                    <div>
                                                                        @if(!is_null($annonce->photo_2))
                                                                        <img src="{{ asset($annonce->photo_2)}}" alt=""
                                                                            class="img-fluid mx-auto d-block">
                                                                             @endif
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="product-3" role="tabpanel"
                                                                    aria-labelledby="product-3-tab">
                                                                    <div>
                                                                        @if(!is_null($annonce->photo_3))
                                                                        <img src="{{ asset($annonce->photo_3)}}" alt=""
                                                                            class="img-fluid mx-auto d-block">
                                                                             @endif
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="product-4" role="tabpanel"
                                                                    aria-labelledby="product-4-tab">
                                                                    <div>
                                                                        @if(!is_null($annonce->photo_4))
                                                                        <img src="{{ asset($annonce->photo_4)}}" alt=""
                                                                            class="img-fluid mx-auto d-block">
                                                                             @endif
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="text-center">
                                                                

                                                                <div class="row">

                                                                    @if($annonce->statut === 0)
                                                                    <div class="col-sm-6">
                                                                    <form method="POST" action="{{ url('backend/decision', $annonce)}} ">
                                                                        @csrf
    
                                                                    <input type="hidden" value="1" name="decision"/>
                                                                    <button type="submit"
                                                                    class="btn btn-success waves-effect waves-light mt-2 me-1">
                                                                    <i class="bx bx-check me-2"></i> Valider
                                                                </button>
                                                                    </form>
    
                                                                </div>
                                                                @endif
                                                                

                                                                @if($annonce->statut === 0)
                                                                <div class="col-sm-6">
                                                                    <form method="POST" action=" {{ url('backend/decision', $annonce)}}">
                                                                        @csrf
    
                                                                    <input type="hidden" value="2" name="decision"/>
                                                                    <button type="submit"
                                                                    class="btn btn-danger waves-effect  mt-2 waves-light">
                                                                    <i class="fa fa-times bx-times  me-2"></i>Refuser 
                                                                </button>
                                                                    </form>
                                                                </div>
                                                                @endif
                                                                
                                                            </div>
                                                            </div>


    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="col-xl-6">
                                                <div class="mt-4 mt-xl-3">
                                                    
                                                    <h4 class="mt-1 mb-3">
                                                        {{ $annonce->titre}}
                                                    </h4>
    
                                                   
                                                    
                                                    <h5 class="mb-4">Prix : 
                                                        <span class="text-muted me-2">
                                                            
                                                        </span> <b>{{ Helpers::moneyFormat($annonce->prix)}} F</b></h5>


                                                    <p class="text-muted mb-4">
                                                        {!! $annonce->details  !!}
                                                    </p>
                                                   


    
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->
    
                                        <div class="mt-5">
                                            <h5 class="mb-3">Informations :</h5>
    
                                            <div class="table-responsive">
                                                <table class="table mb-0 table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td> Annonceur: </td>
                                                            <td>
                                                                @if(!is_null($annonce->author))
                                                                {{ $annonce->author->user_firstname." ". $annonce->author->user_lastname }}

                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> Statut </td>
                                                            <td>
                                                                @if($annonce->statut === 1)
                                                                <span class="badge bg-success ">En ligne</span>
                                                                @endif
                
                                                                @if($annonce->statut === 0)
                                                                <span class="badge bg-warning ">En attente</span>
                                                                @endif
                
                                                                @if($annonce->statut === 2)
                                                                <span class="badge bg-danger ">Réfusé</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" style="width: 400px;">Categorie</th>
                                                            <td>{{!is_null($annonce->category) ? $annonce->category->category : "" }} </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Sous Catégorie</th>
                                                            <td>{{(!is_null($annonce->sousCategory)) ? $annonce->sousCategory->sous_category : null }} </td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="row">Mis en vente à:</th>
                                                            <td>
                                                                <span><i class="fa fa-map-marker"></i>
                                                                    {{( !is_null($annonce->commune) ? Str::ucfirst($annonce->commune->commune) : null) }} 
                                                                </span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="row">Vue d'annonce:</th>
                                                            <td>
                                                                <span>
                                                                    <i class="fa fa-eye"></i> <h3 class="d-inline">{{Helpers::moneyFormat ($annonce->vue)}}</h3> 
                                                                </span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="row">Date de publication:</th>
                                                            <td>{{(Dates::formatFr($annonce->created_at)) }} </td>
                                                        </tr>

                                                        
                                                        
                                                        {{-- <tr>
                                                            <th scope="row">Connectivity</th>
                                                            <td>Bluetooth</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Warranty Summary</th>
                                                            <td>1 Year</td>
                                                        </tr>
                                                    </tbody> --}}
                                                </table>
                                            </div>
                                        </div>
                                        <!-- end Specifications -->
    
                                   
                                    </div>
                                </div>
                                <!-- end card -->
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
