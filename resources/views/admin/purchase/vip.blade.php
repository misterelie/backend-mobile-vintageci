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
                                <h4 class="mb-sm-0 font-size-18">Boosts d'annonces</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Annonces VIP</a></li>
                                        <li class="breadcrumb-item active">Liste des boosts</li>
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
                                                
                                            </div>
                                        </div><!-- end col-->
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap table-check">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="align-middle text-uppercase">Client</th>
                                                    <th class="align-middle text-uppercase">Formule</th>
                                                    <th class="align-middle text-uppercase">Montant</th>
                                                    {{-- <th class="align-middle text-uppercase">Statut </th> --}}
                                                    <th class="align-middle text-uppercase">Date</th>
                                                    <th class="align-middle text-uppercase">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                @if(!is_null($purchases))
                                                @foreach($purchases as $cre)
                                                <tr >
                                                    <td>
                                                        @if(!is_null($cre->user))
                                                        <strong class="text-uppercase"> {{ $cre->user->user_firstname. " ". $cre->user->user_lastname}} </strong>
                                                        @endif
                                                    </td>
                                                    
                                                    <td>
                                                         @if(!is_null($cre->offre))
                                                        <span class="badge" style="background: {{ $cre->offre->couleur }}">{{ $cre->offre->title }} </span>
                                                         @endif
                                                    </td>
                                                    <td>
                                                         @if(!is_null($cre->offre))
                                                        <strong>{{ Helpers::moneyFormat($cre->offre->montant)}} </strong> F CFA
                                                         @endif
                                                    </td>

                                                   
                                                    <td>
                                                        {{ Dates::formatFr($cre->created_at)}}
                                                    </td>

                                                    <td>
                                                        <div class="d-flex gap-3">

                                                            <a href="{{ url("/viplist/remove", $cre)}}"
                                                                    class="btn btn-sm btn-danger" title="Supprimer l'Achat"
                                                                    onclick="return confirm('Êtes-vous sûrs de vouloir supprimer cet Achat ?')"><i
                                                                        class="mdi mdi-delete font-size-15"></i>
                                                                </a>

                                                            
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>


                                    {{ $purchases->links()}}
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