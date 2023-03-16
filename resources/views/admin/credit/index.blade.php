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
                                <h4 class="mb-sm-0 font-size-18">Formules de Crédits</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Annonces</a></li>
                                        <li class="breadcrumb-item active">Gestion des Formules de crédits</li>
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


                                                <button type="button" class="btn btn-primary btn-rounded"
                                                    data-bs-toggle="modal" data-bs-target=".addModal">
                                                    <i class="mdi mdi-plus me-1"></i> Ajouter une formule
                                                </button>
                                            </div>
                                        </div><!-- end col-->
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap table-check">
                                            <thead class="table-light">
                                                <tr>
                                                   
                                                    <th class="align-middle text-uppercase">Formule</th>
                                                    <th class="align-middle text-uppercase">Montant</th>
                                                    <th class="align-middle text-uppercase">Bonus</th>
                                                    <th class="align-middle text-uppercase">Sélection</th>
                                                    <th class="align-middle text-uppercase">Date</th>
                                                    <th class="align-middle text-uppercase">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                @if(!is_null($credits))
                                                @foreach($credits as $cre)
                                                <tr style="background: {!! $cre->couleur !!}10">
                                                    <td>
                                                        <strong class="text-uppercase"> {{ $cre->title}} </strong>
                                                    </td>
                                                    <td><strong>{{ Helpers::moneyFormat($cre->montant)}} </strong> F CFA</td>

                                                    <td>
                                                        +
                                                        <strong>{{ Helpers::moneyFormat($cre->bonus)}} </strong> F CFA</td>
                                                    <td>
                                                        <strong>
                                                            {{ Helpers::moneyFormat($cre->purchases->count())}} 
                                                        </strong>&times;
                                                    </td>
                                                    <td>
                                                        {{ Dates::formatFr($cre->created_at)}}
                                                    </td>

                                                    <td>
                                                        <div class="d-flex gap-3">
                                                            <a href="javascript:void(0);" class="text-success"
                                                                data-bs-toggle="modal"
                                                                data-bs-target=".editModal{{$cre->id}}"><i
                                                                    class="mdi mdi-pencil font-size-18"></i></a>

                                                            @if($cre->purchases->count() < 1)
                                                            <a href="{{ url("/credit/destroy", $cre)}}"
                                                                class="text-danger"
                                                                onclick="return confirm('Êtes-vous sûrs de vouloir supprimer cet élément ?')"><i
                                                                    class="mdi mdi-delete font-size-18"></i>
                                                            </a>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>


                                    {{ $credits->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->




            <!-- Create Modal -->
            <div class="modal fade addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-di" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addModalLabel">Nouvelle Formule:</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="col m-auto p-3">

                                <form action="{{ url("credit/store")}} " method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group mb-3">
                                        <label for="title" class="form-copntrol-label">Intitulé de la formule: 
                                            <span class="text-danger">*</span> </label>
                                        <input type="text" name="title" id="title" class="form-control" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="montant" class="form-copntrol-label">Montant de la formule:
                                            <span class="text-danger">*</span>
                                        
                                        </label>
                                        <input type="number" name="montant" id="montant" class="form-control" required>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 mb-3">
                                            <label for="bonus" class="form-copntrol-label">Montant offert en bonus: <small class="text-info">(facultatif)</small> </label>
                                            <input type="number" name="bonus" id="bonus" class="form-control" value="0">
                                        </div>

                                        <div class="col-sm-6 mb-3">
                                            <div>
                                                <label for="couleur" class="form-copntrol-label"> Couleur de la formule: <small class="text-info">(facultatif)</small> </label>
                                            <input type="text" class="form-control" id="colorpicker-showinput-intial" value="#f46a6a" name="couleur">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group text-right text-end">
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Fermer</button>
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

            @if (!is_null($credits))
            @foreach ($credits as $cre)
            <!-- Create Modal -->
            <div class="modal fade editModal{{ $cre->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{ $cre->id}}">Mise à jour de la formule:</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="col m-auto p-3">

                                <form action="{{ url("credit/update", $cre)}} " method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group mb-3">
                                        <label for="title" class="form-copntrol-label">Intitulé de la formule: 
                                            <span class="text-danger">*</span> </label>
                                        <input type="text" name="title" id="title" class="form-control" value="{{ $cre->title}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="montant" class="form-copntrol-label">Montant de la formule:
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" name="montant" id="montant" class="form-control" value="{{ $cre->montant}}">
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 mb-3">
                                            <label for="bonus" class="form-copntrol-label">Montant offert en bonus: <small class="text-info">(facultatif)</small> </label>
                                            <input type="number" name="bonus" id="bonus" class="form-control" value="{{ $cre->bonus}}">
                                        </div>

                                        <div class="col-sm-6 mb-3">
                                            <div>
                                                <label for="couleur" class="form-copntrol-label"> Couleur de la formule: <small class="text-info">(facultatif)</small> </label>
                                            <input type="text" class="form-control colorpicker-showinput-intial" id="colorpicker-showinput-intial" value="#f46a6a" name="couleur" value="{{ $cre->couleur }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group text-right text-end">
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Fermer</button>
                                        <button class="btn btn-primary float-right">Sauvegader</button>
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