@extends('admin/layouts/theme')

@section('theme')



<div class="row align-items-center">
    <div class="col-9">
        <div class="dashboard-header-title mb-30">
            <h4 class="mb-0">Nos partenaires</h4>
            <p class="mb-0">Gérer les partenaires </p>
        </div>
    </div>
    <div class="col-3 text-right">
        <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target=".bd-example-modal-lg">Ajouter un partenaire</button>
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
                <h5 class="card-title mb-3">Les partenaires:</h5>

                <!-- Table -->
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-uppercase">Raison Sociale</th>
                                <th class="text-uppercase">URL</th>
                                <th class="text-uppercase">LOGO</th>
                                <th class="text-uppercase">Enregistré le</th>
                                <th class="text-uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @if (!is_null($partenaires))
                               @foreach ($partenaires as $partenaire)
                               <tr>
                                <td><h6>{{$partenaire->nom_partenaire}}</h6></td>
                                <td><h6>{{$partenaire->url}}</h6></td>
                                <td> <img src="{{ asset('storage/'.$partenaire->photo) }} " alt="" width="95"> </td>
                                <td>{{ Dates::formatFr($partenaire->created_at) }}</td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target=".editModal{{$partenaire->id }}">Editer</button>

                                        <span>
                                            <form action="{{ url("partenaire/destroy",$partenaire) }} " method="post">
                                                @csrf
                                                @method("POST")
                                                <button class="btn btn-sm btn-danger mr-3 fz-1rem" type="submit"
                                                    title="Remove"><i class="lni lni-trash"></i>
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
                    <h5 class="modal-heading mt-2 mb-4">Enregistrer un partenaire:</h5>

                    <form action="{{ url("partenaire/store") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-sm-12 mb-3">
                                <label for="nom_partenaire" class="form-label fw-bold font-weight-bold ">Raison Sociale: <span class="text-danger">*</span> :</label>
                                <input type="text" name="nom_partenaire" id="nom_partenaire" class="form-control" required>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label for="url" class="form-label fw-bold font-weight-bold ">URL (site web): <span class="text-danger">*</span> :</label>
                                <input type="text" name="url" id="url" class="form-control" required>
                            </div>
    
                            <div class="col-sm-12 ">
                                <label for="photo" class="form-label fw-bold font-weight-bold ">Logo du partenaire: <span class="text-danger">(facultatif)</span> </label>
                                <input type="file" name="photo" id="photo" class="form-control" accept="image/jpeg, image/png, image/gif, image/jpeg">
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

    @if(isset($partenaires) && !empty($partenaires))
        @foreach ($partenaires as $user)
        <div class="modal fade editModal{{ $user->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
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
                        <h5 class="modal-heading mt-2 mb-4">Modifier les informations du partenaire:</h5>

                        <form action="{{ url("partenaire/update",$user) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-4">
                                <div class="col-sm-12 mb-3">
                                    <label for="nom_partenaire" class="form-label fw-bold font-weight-bold ">Raison Sociale: <span class="text-danger">(facultatif)</span> :</label>
                                    <input type="text" name="nom_partenaire" id="nom_partenaire" class="form-control" value="{{ $user->nom_partenaire }} ">
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="url" class="form-label fw-bold font-weight-bold ">URL (site web): <span class="text-danger">(facultatif)</span> :</label>
                                    <input type="text" name="url" id="url" class="form-control" value="{{ $user->url }} "  >
                                </div>
        
                                <div class="col-sm-12 ">
                                    <label for="photo" class="form-label fw-bold font-weight-bold ">Logo du partenaire: <span class="text-danger">(facultatif)</span> </label>
                                    <input type="file" name="photo" id="photo" class="form-control" accept="image/jpeg, image/png, image/gif, image/jpeg" >
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