@extends('admin/layouts/theme')

@section('theme')



<div class="row align-items-center">
    <div class="col-9">
        <div class="dashboard-header-title mb-30">
            <h4 class="mb-0">Slides</h4>
            <p class="mb-0">Gérer les slides défilantes à l'accueil</p>
        </div>
    </div>
    <div class="col-3 text-right">
        <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target=".bd-example-modal-lg">Ajouter
            une slide</button>
    </div>
</div>


<div class="col-auto form-group mb-3">
    @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show text-center m-auto">
        {{ Session::get('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show text-center m-auto">
        {{ Session::get('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
</div>


<div class="col-12 mb-30">
    <div class="card">
        <div class="card-header bg-transparent d-flex align-items-center justify-content-between">
            <div class="widgets-card-title">
                <h5 class="card-title mb-0">Listes des slides</h5>
            </div>
            <div class="dashboard-dropdown">
                <div class="dropdown">

                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table mb-0 table-borderless project-table">
                    <thead class="thead-light">
                        <tr>
                            <th>Ordre</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>


                        @if (($sliders))
                        @foreach ($sliders as $ky => $slide)
                        <tr>
                            <td class="">
                                {{$ky+1 }}
                            </td>
                            <td>
                                <img src="{{ asset('storage/'.$slide->image)}}" alt="image" class=" mr-3"
                                    style="width: 110px; height: 35px;">
                            </td>

                            <td>
                                <div class="btn-group">
                                    <a href="#" class="mr-3 fz-1rem" data-toggle="modal"
                                        data-target=".editModal{{ $slide->id_slide}}" title="Editer"><i
                                            class="lni lni-pencil"></i>
                                    </a>

                                    <span>
                                        <form action="{{ url("slider/destroy",$slide) }} " method="post">
                                            @csrf
                                            @method("POST")
                                            <button class="btn btn-sm text-danger mr-3 fz-1rem" type="submit"
                                                title="Remove"><i class="lni lni-trash"></i>
                                            </button>
                                        </form>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <div class="alert alert-danger text-center .alert-dismissible .fade .show">
                            Désolé! Aucune slide ajoutée pour le moment.
                        </div>
                        @endif


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<section>

    {{-- Création --}}
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Enregistrement:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="modal-heading mt-2 mb-4">Créer une slide défilante:</h5>

                    <form action="{{ url("slider/store") }}" method="post" enctype="multipart/form-data">

                        @csrf
                      

                        <input type="hidden" name="sur_titre" id="sur_titre" class="form-control">

                        <div class="form-group ">
                            <label for="image" class="form-label fw-bold font-weight-bold ">Image:</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>

                        <div class="form-group text-right
                text-right">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Valider </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    {{-- Modification --}}

    @if(isset($sliders) && count($sliders) > 0)
    @foreach($sliders as $slider)
        <div class="modal fade editModal{{ $slider->id_slide}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Eidition:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="modal-heading mt-2 mb-4">Modifier le slide:</h5>

                        <form action="{{ url("slider/update", $slider) }}" method="post" enctype="multipart/form-data">

                            @csrf
                           
                            <div class="form-group ">
                                <label for="image" class="form-label fw-bold font-weight-bold ">Image:</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>

                            <div class="form-group text-right
                    text-right">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-warning">Sauvegarder </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @endif

</section>


@endsection