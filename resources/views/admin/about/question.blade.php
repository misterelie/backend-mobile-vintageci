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
                                <h4 class="mb-sm-0 font-size-18">Questions fréquentes</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">FAQ</a></li>
                                        <li class="breadcrumb-item active">Gestion des Questions fréquentes</li>
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
                                                    <i class="mdi mdi-plus me-1"></i> Ajouter
                                                </button>

                                            </div>
                                        </div><!-- end col-->
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap table-check">
                                            <thead class="table-light">
                                                <tr>
                                                    <th  class="align-middle text-uppercase">
                                                        Préoccupation
                                                    </th>

                                                    <th class="align-middle text-uppercase">Date</th>
                                                    <th class="align-middle text-uppercase">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @if(!is_null($questions))
                                                @foreach($questions as $cat)
                                                <tr>
                                                    <td>
                                                        <h4>
                                                            {{ Str::ucfirst($cat->question)}}
                                                        </h4>
                                                    </td>
                                                    <td>
                                                        {{ Dates::formatFr($cat->created_at)}}
                                                    </td>
                                                    <td>
                                                        <div class="d-flex gap-3">
                                                            <a href="javascript:void(0);" class="text-success" data-bs-toggle="modal" data-bs-target=".viewModal{{$cat->id}}"><i
                                                                    class="mdi mdi-eye font-size-18"></i></a>

                                                                    <a href="javascript:void(0);" class="text-primary" data-bs-toggle="modal" data-bs-target=".editModal{{$cat->id}}"><i
                                                                        class="mdi mdi-pencil font-size-18"></i></a>

                                                            <a href="{{ url("/question/destroy", $cat)}}"
                                                                class="text-danger"
                                                                onclick="return confirm('Êtes-vous sûrs de vouloir supprimer ce message  ?')"><i
                                                                    class="mdi mdi-delete font-size-18"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>


                                    {{ $questions->links()}}
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
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addModalLabel">Ajouter une préoccupation:</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col m-auto p-3">
                                <form action="{{url('/question/store') }} " method="post">

                                    @csrf

                                    <div class="form-group mb-3">
                                        <label for="question"
                                            class="form-label font-weight-bold fw-bold">Problème:</label>
                                        <input type="text" name="question" id="question" class="form-control">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="reponse" class="form-label font-weight-bold fw-bold">Réponse:
                                            <small>Tapez <code>Entrée</code> pour effectuer un retour à la ligne.
                                            </small>
                                        </label>
                                        <textarea name="reponse" id="reponse" class="form-control" id="" cols="30"
                                            rows="10"></textarea>
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




            {{-- Edit Modal --}}

            @if (!is_null($questions))
            @foreach ($questions as $cat)
            <!-- Create Modal -->
            <div class="modal fade editModal{{ $cat->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                aria-hidden="true">
                <div class="modal-dialog  modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{ $cat->id}}">Contenu du message:</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col m-auto p-3">
                                <form action="{{url('/question/update', $cat) }} " method="post">

                                    @csrf

                                    <div class="form-group mb-3">
                                        <label for="question"
                                            class="form-label font-weight-bold fw-bold">Problème:</label>
                                        <input type="text" name="question" id="question" class="form-control" value="{{ $cat->question}} ">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="reponse" class="form-label font-weight-bold fw-bold">Réponse:
                                            <small>Tapez <code>Entrée</code> pour effectuer un retour à la ligne.
                                            </small>
                                        </label>
                                        <textarea name="reponse" id="reponse" class="form-control" id="" cols="30"
                                            rows="10">{{ str_replace("<br>", "\n",$cat->question)}}</textarea>
                                    </div>

                                    <div class="form-group text-right text-end">
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Fermer</button>
                                        <button class="btn btn-warning float-right">Mettre à jour</button>
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



            @if (!is_null($questions))
            @foreach ($questions as $quest)
            <!-- Create Modal -->
            <div class="modal fade viewModal{{ $quest->id}}" tabindex="-1" role="dialog"
                aria-labelledby="viewModalLabel" aria-hidden="true">
                <div class="modal-dialog  modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewModalLabel{{ $quest->id}}">Contenu du message:</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col m-auto p-3">
                                {!! Helpers::encodeText($quest->reponse) !!}
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