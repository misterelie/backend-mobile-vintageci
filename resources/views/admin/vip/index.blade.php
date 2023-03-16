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
                                <h4 class="mb-sm-0 font-size-18">Formules VIP</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Annonces</a></li>
                                        <li class="breadcrumb-item active">Gestion des Formules de VIP</li>
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
                                                    <i class="mdi mdi-plus me-1"></i> Ajouter une offre
                                                </button>
                                            </div>
                                        </div><!-- end col-->
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap table-check">
                                            <thead class="table-light">
                                                <tr>
                                                   
                                                    <th class="align-middle text-uppercase">Offre</th>
                                                    <th class="align-middle text-uppercase">Montant</th>
                                                    <th class="align-middle text-uppercase">Coût/Jr</th>
                                                    <th class="align-middle text-uppercase">Réduction</th>
                                                    <th class="align-middle text-uppercase">Nbre jour</th>
                                                    <th class="align-middle text-uppercase">Achats</th>
                                                    <th class="align-middle text-uppercase">Date</th>
                                                    <th class="align-middle text-uppercase">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                @if(!is_null($vips))
                                                @foreach($vips as $cre)
                                                <tr >
                                                    <td>
                                                        <strong class="text-uppercase"> {{ $cre->title}} </strong>
                                                    </td>

                                                    <td>
                                                        <strong>{{ Helpers::moneyFormat($cre->montant)}} 
                                                        </strong> F CFA
                                                    </td>

                                                    <td>
                                                        <strong>{{ Helpers::moneyFormat($cre->cout_par_jour)}} </strong> F CFA
                                                    </td>

                                                    <td>
                                                        -
                                                        <strong>{{ $cre->reduction}} </strong>%
                                                    </td>
                                                    <td>
                                                        <strong>{{ $cre->nbre_jour}} 
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        <strong>
                                                            {{ Helpers::moneyFormat(Vip::selections($cre) )}} 
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

                                                            @if($cre->annonces->count() < 1)
                                                            <a href="{{ url("/vip/destroy", $cre)}}"
                                                                class="text-danger"
                                                                onclick="return confirm('Êtes-vous sûrs de vouloir supprimer cet élément ?')">
                                                                <i class="mdi mdi-delete font-size-18"></i>
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


                                    {{ $vips->links()}}
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
                            <h5 class="modal-title" id="addModalLabel">Nouvelle Formule VIP:</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="col m-auto p-3">
                                <form action="{{ url("vip/store")}} " method="post" autocomplete="off">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="title" class="form-copntrol-label">Intitulé de la formule: 
                                            <span class="text-danger">*</span> </label>
                                        <input type="text" name="title" id="title" class="form-control" autocomplete="off" required >
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="cout_par_jour" class="form-copntrol-label">Cout par jour:
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" name="cout_par_jour" id="cout_par_jour" class="form-control" autocomplete="off" required>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 mb-3">
                                            <label for="nbre_jour" class="form-copntrol-label">Nombre dejour:
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="number" name="nbre_jour" id="nbre_jour" class="form-control" required>
                                        </div>

                                        <div class="col-sm-6 mb-3">
                                            <label for="reduction" class="form-copntrol-label">Taux de réduction:
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select  name="reduction" id="reduction" class="form-control" >
                                                <option value="0" selected>0%</option>
                                                @for($i = 1; $i < 100; $i++)
                                                <option value="{{ $i}} ">{{ $i ."%" }}</option>
                                                @endfor                                                
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 mb-3">
                                            <div>
                                                <label for="couleur" class="form-copntrol-label"> Couleur de la formule: <small class="text-info">(facultatif)</small> </label>
                                            <input type="text" class="form-control" id="colorpicker-showinput-intial" value="" name="couleur" autocomplete="off">
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

            @if (!is_null($vips))
            @foreach ($vips as $cre)
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

                                <form action="{{ url("vip/update", $cre)}} " method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group mb-3">
                                        <label for="title" class="form-copntrol-label">Intitulé de la formule: 
                                            <span class="text-danger">*</span> </label>
                                        <input type="text" name="title" id="title" class="form-control" value="{{$cre->title }}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="cout_par_jour" class="form-copntrol-label">Cout par jour:
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" name="cout_par_jour" id="cout_par_jour" class="form-control" value="{{$cre->cout_par_jour }}">
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 mb-3">
                                            <label for="nbre_jour" class="form-copntrol-label">Nombre dejour:
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="number" name="nbre_jour" id="nbre_jour" class="form-control" value="{{$cre->nbre_jour }}">
                                        </div>

                                        <div class="col-sm-6 mb-3">
                                            <label for="reduction" class="form-copntrol-label">Taux de réduction:
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select  name="reduction" id="reduction" class="form-control" >
                                                <option value="0" @if((int)($cre->reduction) === 0) selected @endif>0%</option>
                                                @for($i = 1; $i < 100; $i++)
                                                <option value="{{ $i}} " @if( (int) $i === (int) $cre->reduction) selected @endif >{{ $i ."%" }}</option>
                                                @endfor                                                
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 mb-3">
                                            <div>
                                                <label for="couleur" class="form-copntrol-label"> Couleur de la formule: <small class="text-info">(facultatif)</small> </label>
                                            <input type="text" class="form-control" id="colorpicker-showinput-intial" value="{{$cre->couleur }}" name="couleur" >
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