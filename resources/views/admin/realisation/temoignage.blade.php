@extends('admin/layouts/theme')

@section('theme')



<div class="row align-items-center">
    <div class="col-9">
        <div class="dashboard-header-title mb-30">
            <h4 class="mb-0">Témoignages</h4>
            <p class="mb-0">Enregistrer les témoignages reçus des clients</p>
        </div>
    </div>
    <div class="col-3 text-right">
        <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target=".bd-example-modal-lg">Ajouter un témoignage</button>
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
                <h5 class="card-title mb-3">Tous les Témoignages:</h5>

                <!-- Table -->
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-uppercase">Client</th>
                                <th class="text-uppercase">Fonction</th>
                                <th class="text-uppercase">Photo</th>
                                <th class="text-uppercase">Message</th>
                                <th class="text-uppercase">Enregistré le</th>
                                <th class="text-uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @if (!is_null($temoignages))
                               @foreach ($temoignages as $tem)
                               <tr>
                                <td><h6>{{$tem->nom_complet}}</h6></td>
                                <td><h6>{{$tem->poste}}</h6></td>
                                <td> <img src="{{ asset('storage/'.$tem->photo) }} " alt="" width="95"> </td>
                               
                                <td>
                                    <div class="text-justify text-body">
                                        {!! $tem->message !!}
                                    </div>
                                </td>
                                <td>{{ Dates::formatFr($tem->created_at) }}</td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target=".editModal{{$tem->id }}">Editer</button>

                                        <span>
                                            <form action="{{ url("temoignage/destroy",$tem) }} " method="post">
                                                @csrf
                                                @method("POST")
                                                <button class="btn btn-sm btn-danger mr-3 fz-1rem" type="submit"
                                                    title="Remove" onclick="return confirm('Êtes-vous sûrs de vouloir supprimer cette information ?')"><i class="lni lni-trash"></i>
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
                    <h5 class="modal-heading mt-2 mb-4">Enregistrer un témoignage:</h5>

                    <form action="{{ url("temoignage/store") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-sm-12 mb-3">
                                <label for="nom_complet" class="form-label fw-bold font-weight-bold ">Nom complet  du client: <span class="text-danger">*</span> :</label>
                                <input type="text" name="nom_complet" id="nom_complet" class="form-control" maxlength="100" required>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label for="poste" class="form-label fw-bold font-weight-bold ">Fonction du client: <span class="text-danger">*</span> :</label>
                                <input type="text" name="poste" id="poste" class="form-control" maxlength="155" required>
                            </div>
    
                            <div class="col-sm-12 ">
                                <label for="photo" class="form-label fw-bold font-weight-bold ">Photo du client: <small class="text-danger">(facultatif)</small> </label>
                                <input type="file" name="photo" id="photo" class="form-control" accept="image/jpeg, image/png, image/gif, image/jpeg" >
                            </div>


                            <div class="col-sm-12 mb-3 mt-3">
                                <label for="message" class="form-label fw-bold font-weight-bold ">Contenu du Témoignage <small>(500 caractères maximum</small>: <span class="text-danger">*</span> :</label>
                                <textarea type="text" name="message" id="message" class="form-control" rows="5" cols="30" required maxlength="520">

                                </textarea>
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

    @if(isset($temoignages) && !empty($temoignages))
        @foreach ($temoignages as $user)
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
                        <h5 class="modal-heading mt-2 mb-4">Modifier les informations du membre:</h5>

                        <form action="{{ url("temoignage/update",$user) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-4">
                                <div class="col-sm-12 mb-3">
                                    <label for="nom_complet" class="form-label fw-bold font-weight-bold ">Nom complet du client: <span class="text-danger">(facultatif)</span> :</label>
                                    <input type="text" name="nom_complet" id="nom_complet" class="form-control" value="{{ $user->nom_complet }} ">
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="poste" class="form-label fw-bold font-weight-bold ">Fonction du client: <span class="text-danger">(facultatif)</span> :</label>
                                    <input type="text" name="poste" id="poste" class="form-control" value="{{ $user->poste }} "  >
                                </div>
        
                                <div class="col-sm-12 mb-1">
                                    <label for="photo" class="form-label fw-bold font-weight-bold ">Photo du client: <small class="text-danger">(facultatif)</small> </label>
                                    <input type="file" name="photo" id="photo" class="form-control" accept="image/jpeg, image/png, image/gif, image/jpeg" >
                                </div>

                                <div class="col-sm-12 mb-3 mt-3">
                                    <label for="message" class="form-label fw-bold font-weight-bold ">Contenu dun Témoignage <small>(500 caractères maximum</small>: <small class="text-danger">(facultatif)</small> :</label>
                                    <textarea type="text" name="message" id="message" class="form-control" rows="5" cols="30" required maxlength="520">
                                        {!! Helpers::encodeText($user->message) !!}
                                    </textarea>
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