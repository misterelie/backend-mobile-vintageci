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
                                <h4 class="mb-sm-0 font-size-18">Coordonnées</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">A propos</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Coordonnées</a></li>
                                       
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
                                   
                                    <div class="table-responsive">
                                        <div class="col-auto px-4 py-4 m-auto text-justify text-align-justify">
                                            <div class="title mb-4 pb-3">
                                                <h2>Nos coordonnées:</h2>
                                            </div>


                                            <form action="{{url('/adresse/store') }} " method="post">

                                                @csrf

                                                <div class="row">

                                                    {{-- Emails --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div class="mb-4">
                                                                <h3>Emails</h3>
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="content" class="form-label font-weight-bold fw-bold">Label:
                                                                &nbsp;&nbsp;
                                                            </label>
                    
                                                            <input type="text" name="email_label" id="email_label" class="form-control font-weight-bold fw-600"  id="" value="{{ !is_null($adresse) ? $adresse->email_label : null }} " placeholder="Champs obligatoire *" required>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="content" class="form-label font-weight-bold fw-bold">adresse email:
                                                                &nbsp;&nbsp;
                                                            </label>
                    
                                                            <input type="text" name="email_one" id="email_one" class="form-control font-weight-bold fw-600"  id="" value="{{ !is_null($adresse) ? $adresse->email_one : null }} " placeholder="Champs obligatoire *" required>
                                                        </div>
                                                    </div>

                                                    {{-- Telephones --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div class="mb-4">
                                                                <h3>Téléphones</h3>
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="content" class="form-label font-weight-bold fw-bold">Label:
                                                                &nbsp;&nbsp;
                                                            </label>
                    
                                                            <input type="text" name="phone_label" id="phone_label" class="form-control font-weight-bold fw-600"  id="" value="{{ !is_null($adresse) ? $adresse->phone_label : null }} " placeholder="Champs obligatoire *" required>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="content" class="form-label font-weight-bold fw-bold">Contact téléphonique:
                                                                &nbsp;&nbsp;
                                                            </label>
                    
                                                            <input type="text" name="phone_one" id="phone_one" class="form-control font-weight-bold fw-600" required id="" value="{{ !is_null($adresse) ? $adresse->phone_one : null }} " placeholder="Champs obligatoire *" required>
                                                        </div>

                                                    </div>


                                                    {{-- Adresses --}}
                                                    <div class="col-md-4">

                                                        <div class="form-group">
                                                            <div class="mb-4">
                                                                <h3>Adresse géographique</h3>
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="content" class="form-label font-weight-bold fw-bold">Label:
                                                                &nbsp;&nbsp;
                                                            </label>
                    
                                                            <input type="text" name="adresse_label" id="adresse_label" class="form-control font-weight-bold fw-600"  id="" value="{{ !is_null($adresse) ? $adresse->adresse_label : null }} " placeholder="Champs obligatoire *" required>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="content" class="form-label font-weight-bold fw-bold">Adresse:
                                                                &nbsp;&nbsp;
                                                            </label>
                    
                                                            <textarea cols="30" rows="3" name="adresse" id="adresse" class="form-control font-weight-bold fw-600" required id="" placeholder="Champs obligatoire *" required>{{ !is_null($adresse) ? $adresse->adresse : null }}</textarea>
                                                        </div>

                                                    </div>


                                                </div>
            
                                                <div class="form-group text-right text-end">
                                                    <button class="btn btn-primary float-right">Enregistrer</button>
                                                </div>
            
                                            </form>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->




            <!-- Create Modal -->
            {{-- <div class="modal fade addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addModalLabel">Mise à jour des adresses:</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col m-auto p-3">
                                <form action="{{url('/adresse/store') }} " method="post">

                                    @csrf

                                    <div class="form-group mb-3">
                                        <label for="content" class="form-label font-weight-bold fw-bold">Contenu:
                                            &nbsp;&nbsp;<small>Tapez <code>Entrée</code> pour effectuer un retour à la ligne.
                                            </small>
                                        </label>

                                        <textarea name="content" id="content" class="form-control font-weight-bold fw-600" required id="" cols="30"
                                            rows="10">{!! !is_null($adresse) ? str_replace("<br>", "\n", $adresse->email_one) : null!!}</textarea>
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
            </div> --}}
            <!-- end modal -->

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