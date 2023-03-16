<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/layouts-horizontal.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Aug 2022 17:23:49 GMT -->

<head>

    <meta charset="utf-8" />
    <title>{{ $page_title }}</title>
    <meta name="viewport" cgu="width=device-width, initial-scale=1.0">
    <meta cgu="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta cgu="Themesbrand" name="author" />


    {{-- CSS FILES --}}
    @include('layouts/admin/assets/css')
</head>

<body data-topbar="dark" data-layout="horizontal">
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('layouts/admin/includes/topbar')
        @include('layouts/admin/includes/navbar')

        <!-- ============================================================== -->
        <!-- Start right cgu here -->
        <!-- ============================================================== -->


        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                     <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Conditions Générales </h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">A propos</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Conditions Générales </a></li>
                                       
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

                                                <button type="button" class="btn btn-primary btn-rounded"
                                                    data-bs-toggle="modal" data-bs-target=".addModal">
                                                    <i class="mdi mdi-plus me-1"></i> Editer les CGU
                                                </button>

                                            </div>
                                        </div><!-- end col-->
                                    </div>

                                    <div class="table-responsive">
                                        <div class="col-auto px-4 py-4 m-auto text-justify text-align-justify">
                                            <div class="title">
                                                <h2>Nos Conditions Générales:</h2>
                                            </div>

                                            {!! ($mention->cgu) ? str_replace("\n", "<br>", $mention->cgu) : null !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-cgu -->




            <!-- Create Modal -->
            <div class="modal fade addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addModalLabel">Edition des Conditions Générales:</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col m-auto p-3">
                                <form action="{{url('/cgu/store') }} " method="post">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="cgu" class="form-label font-weight-bold fw-bold">Contenu:
                                            &nbsp;&nbsp;<small>Tapez <code>Entrée</code> pour effectuer un retour à la ligne.
                                            </small>
                                        </label>

                                        <textarea name="cgu" id="cgu" class="form-control" cols="30"
                                            rows="10">{!! !is_null($mention) ? str_replace("<br>", "\n", $mention->cgu) : null!!}</textarea>
                                    </div>

                                    <div class="form-group text-right text-end">
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Fermer</button>
                                        <button class="btn btn-primary float-right">Enregistrer</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal -->

            {{-- Footer --}}
            @include('layouts/admin/includes/footer')
        </div>


        <!-- end main cgu-->

    </div>
    <!-- END layout-wrapper -->

    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    @include('layouts/admin/assets/js')
</body>

</html>