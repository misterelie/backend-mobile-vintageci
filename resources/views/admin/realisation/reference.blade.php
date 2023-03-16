@extends('admin/layouts/theme')

@section('theme')



<div class="row align-items-center">
    <div class="col-9">
        <div class="dashboard-header-title mb-30">
            <h4 class="mb-0">NOS RÉFÉRENCES</h4>
            <p class="mb-0">Gérer les références</p>
        </div>
    </div>
    <div class="col-3 text-right">
        <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target=".bd-example-modal-lg">Ajouter une références</button>
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

<div class="row">
    <div class="col-lg-12 mb-30">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">Nos références</h5>

                <!-- Table -->
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-uppercase">Intitulé</th>
                                <th class="text-uppercase">Image</th>
                                <th class="text-uppercase">Enregistré le</th>
                                <th class="text-uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @if (!is_null($references))
                               @foreach ($references as $ref)
                               <tr>
                                <td><h6>{{!is_null($ref->reference) ? $ref->reference : null}}</h6></td>
                                <td> <img src="{{ asset('storage/'.$ref->photo) }} " alt="" width="95"> </td>
                                <td>{{ Dates::formatFr($ref->created_at) }}</td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target=".editModal{{$ref->id }}">Editer</button>

                                        <span>
                                            <form action="{{ url("reference/destroy",$ref) }} " method="post">
                                                @csrf
                                                @method("POST")
                                                <button class="btn btn-sm btn-danger mr-3 fz-1rem" type="submit"
                                                    title="Remove"  onclick="return confirm('Êtes-vous sûrs de vouloir supprimer cette information ?')"><i class="lni lni-trash"></i>
                                                </button>
                                            </form>
                                        </span>
                                    </div>
                                </td>
                                </tr>
                               @endforeach
                           @endif
                        </tbody>
                    </table>
                </div>
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
                <div class="modal-body">
                    <h5 class="modal-heading mt-2 mb-4">Enregistrer une références:</h5>

                    <form action="{{ url("reference/store") }}" method="post" enctype="multipart/form-data">

                        @csrf
                        
                        <div class="row mb-4">
                            <div class="col-sm-12 mb-3">
                                <label for="reference" class="form-label fw-bold font-weight-bold ">Intitulé de la références <small class="text-danger">(facultatif)</small> :</label>
                                <input type="text" name="reference" id="reference" class="form-control">
                            </div>
    
                            <div class="col-sm-12 ">
                                <label for="photo" class="form-label fw-bold font-weight-bold ">Image de la références: <span class="text-danger">*</span> </label>
                                <input type="file" name="photo" id="photo" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group text-right text-right">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Valider </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    {{-- Modification --}}

    @if(isset($references) && !empty($references))
        @foreach ($references as $reference)
        <div class="modal fade editModal{{ $reference->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edition:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="modal-heading mt-2 mb-4">Modifier la présentation:</h5>

                        <form action="{{ url("reference/update",$reference) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-4">
                                <div class="col-sm-12 ">
                                    <label for="reference" class="form-label fw-bold font-weight-bold ">Libellé de la références: <small>(Facultatif)</small> </label>
                                    <input type="text" name="reference" id="reference" class="form-control" value="{{ $reference->reference }} " >
                                </div>
        
                                <div class="col-sm-12 ">
                                    <label for="photo" class="form-label fw-bold font-weight-bold ">Image de la références: <small>(Facultatif)</small> </label>
                                    <input type="file" name="photo" id="photo" class="form-control">
                                </div>
                            </div>
                          
                            <div class="form-group text-right text-right">
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