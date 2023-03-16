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
                                <h4 class="mb-sm-0 font-size-18">Titres de pages</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">A propos</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Titres de pages</a></li>
                                       
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
                                                <h2> Titres de pages:</h2>
                                            </div>


                                            <form action="{{url('/page/store') }} " method="post">

                                                @csrf

                                                <div class="row">
                                                    {{-- Contact page --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div class="mb-4">
                                                                <h3>Contact</h3>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                           
                                                            <input type="text" name="contact" id="contact" class="form-control font-weight-bold fw-600" required id="" value="{{ !is_null($page) ? $page->contact : null }} " placeholder=" Champ obligatoire *" required>
                                                        </div>
                                                    </div>

                                                    {{-- Contact page --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div class="mb-4">
                                                                <h3>FAQ</h3>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                           
                                                            <input type="text" name="faq" id="faq" class="form-control font-weight-bold fw-600" required id="" value="{{ !is_null($page) ? $page->faq : null }} " placeholder=" Champ obligatoire *" required>
                                                        </div>
                                                    </div>

                                                    {{-- Contact page --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div class="mb-4">
                                                                <h3>CGU</h3>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input type="text" name="cgu" id="cgu" class="form-control font-weight-bold fw-600" required id="" value="{{ !is_null($page) ? $page->cgu : null }} " placeholder=" Champ obligatoire *" required>
                                                        </div>
                                                    </div>

                                                    {{-- Contact page --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div class="mb-4">
                                                                <h3>Crédits</h3>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input type="text" name="pricing" id="pricing" class="form-control font-weight-bold fw-600" required id="" value="{{ !is_null($page) ? $page->pricing : null }} " placeholder=" Champ obligatoire *" required>
                                                        </div>
                                                    </div>

                                                    {{-- Contact page --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div class="mb-4">
                                                                <h3>Mentions légales</h3>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                           
                                                            <input type="text" name="mention" id="mention" class="form-control font-weight-bold fw-600"  id="" value="{{ !is_null($page) ? $page->mention : null }} " placeholder=" Champ obligatoire *" required>
                                                        </div>
                                                    </div>

                                                    {{-- Contact page --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div class="mb-4">
                                                                <h3>Propriété intellectuelle</h3>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                           
                                                            <input type="text" name="propriete" id="propriete" class="form-control font-weight-bold fw-600" required id="" value="{{ !is_null($page) ? $page->propriete : null }} " placeholder=" Champ obligatoire *" required>
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