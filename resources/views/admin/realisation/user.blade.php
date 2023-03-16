@extends('admin/layouts/theme')

@section('theme')



<div class="row align-items-center">
    <div class="col-9">
        <div class="dashboard-header-title mb-30">
            <h4 class="mb-0">Utilisateurs</h4>
            <p class="mb-0">Gérer  les Utilisateurs </p>
        </div>
    </div>
    <div class="col-3 text-right">
        <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target=".bd-example-modal-lg">Ajouter un utilisateur</button>
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
                <h5 class="card-title mb-3">Tous les utilisateurs:</h5>

                <!-- Table -->
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-uppercase">Nom / Login</th>
                                <th class="text-uppercase">Email</th>
                                <th class="text-uppercase">Rôle</th>
                                <th class="text-uppercase">Mot de passe</th>
                                <th class="text-uppercase">Photo</th>
                                <th class="text-uppercase">Enregistré le</th>
                                <th class="text-uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @if (!is_null($admins))
                               @foreach ($admins as $tem)
                               <tr>
                                <td><h6>{{$tem->nom}}</h6></td>
                                <td><span>{{$tem->email}}</span></td>
                                <td>
                                    @if ((int) $tem->role === 1)
                                    <span class="badge badge-danger">Admin</span>
                                        
                                    @else
                                    <span class="badge badge-primary">Editeur</span>
                                    @endif
                                </td>
                                <td>
                                    @if ( !isset($tem->updated_by) || $tem->updated_by === User::onlineAdmin()->id_admin)
                                        <h6>{{$tem->string_admin}}</h6>
                                    @else
                                    <h6> <i class="fa fa-lock"></i> *******</h6>
                                    @endif
                                </td>
                                <td> <img src="{{ asset('storage/'.$tem->photo) }} " alt="" width="95"> </td>
                                <td>{{ Dates::formatFr($tem->created_at) }}</td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target=".editModal{{$tem->id }}">Editer</button>
                                        <button class="btn btn-sm btn-dark" data-toggle="modal" data-target=".viewModal{{$tem->id }}">Détails</button>

                                        @if ( $tem->id_admin != User::onlineAdmin()->id_admin)

                                        <span title="{{(int) $tem->validated === 1 ? 'Désactiver le compte' : 'Activer le compte' }}">
                                            <form action="{{ url("admin/toggle",$tem) }} " method="post">
                                                @csrf
                                                @method("POST")
                                                <button class="btn btn-sm {{(int) $tem->validated === 1 ? 'btn-dark' : 'btn-success' }} mr-3 fz-1rem" type="submit" title="{{(int) $tem->validated === 1 ? 'Désactiver le compte' : 'Activer le compte' }}"
                                                    ><i class="fa fa-power-off"></i>
                                                </button>
                                            </form>
                                        </span>
                                        <span>
                                            <form action="{{ url("admin/destroy",$tem) }} " method="post">
                                                @csrf
                                                @method("POST")
                                                <button class="btn btn-sm btn-danger mr-3 fz-1rem" type="submit"
                                                    title="Remove" onclick="return confirm('Êtes-vous sûrs de vouloir supprimer cet utilisateur ? ?')"><i class="lni lni-trash"></i>
                                                </button>
                                            </form>
                                        </span>
                                       @endif
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
                    <h5 class="modal-heading mt-2 mb-4">Enregistrer un utilisateur:</h5>

                    <form action="{{ url("admin/store") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-sm-6 mb-3">
                                <label for="nom" class="form-label fw-bold font-weight-bold ">Nom / Login: <span class="text-danger">*</span> :</label>
                                <input type="text" name="nom" id="nom" class="form-control" maxlength="100" required>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="email" class="form-label fw-bold font-weight-bold ">email / Login: <span class="text-danger">*</span> :</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>

                            <div class="col-sm-6 mb-3">
                                <label for="role" class="form-label fw-bold font-weight-bold ">Rôle: <span class="text-danger">*</span> :</label>
                                <select name="role" id="role" class="form-control" required>
                                    <option value="1">Admin</option>
                                    <option value="0">Editeur</option>
                                </select>
                            </div>

                            <div class="col-sm-6 mb-3">
                                <label for="password" class="form-label fw-bold font-weight-bold ">Définissez un mot de passe: <span class="text-danger">*</span> :</label>
                                <input type="text" name="password" id="password" class="form-control" required>
                            </div>
                          

                            <div class="col-sm-12 ">
                                <label for="photo" class="form-label fw-bold font-weight-bold ">Photo de profil  <small class="text-info">(facultatif)</small> </label>
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

    @if(isset($admins) && !empty($admins))
        @foreach ($admins as $user)
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
                        <h5 class="modal-heading mt-2 mb-4">Modifier les informations :</h5>

                        <form action="{{ url("admin/update",$user) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-4">
                                <div class="col-sm-6 mb-3">
                                    <label for="nom" class="form-label fw-bold font-weight-bold ">Nom / Login: <span class="text-danger">*</span> :</label>
                                    <input type="text" name="nom" id="nom" class="form-control" value="{{ $user->nom }}"   maxlength="100" required>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="email" class="form-label fw-bold font-weight-bold ">email / Login: <small class="text-info">(facultatif)</small> :</label>
                                    <input type="email" name="email" id="email" class="form-control"  value="{{ $user->email }}"  >
                                </div>
    
                                <div class="col-sm-6 mb-3">
                                    <label for="role" class="form-label fw-bold font-weight-bold ">Rôle: <small class="text-info">(facultatif)</small> :</label>
                                    <select name="role" id="role" class="form-control" >
                                        <option value="">Sélectionnez...</option>
                                        <option value="1">Admin</option>
                                        <option value="0">Editeur</option>
                                    </select>
                                </div>
    
                                <div class="col-sm-6 mb-3">
                                    <label for="password" class="form-label fw-bold font-weight-bold ">Définissez un mot de passe: <small class="text-info">(facultatif)</small> :</label>
                                    <input type="text" name="password" id="password" class="form-control" value="{{ $user->string_admin }}"   >
                                </div>
                              
    
                                <div class="col-sm-12 ">
                                    <label for="photo" class="form-label fw-bold font-weight-bold ">Photo de profil  <small class="text-info">(facultatif)</small> </label>
                                    <input type="file" name="photo" id="photo" class="form-control" accept="image/jpeg, image/png, image/gif, image/jpeg">
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



    @if(isset($admins) && !empty($admins))
    @foreach ($admins as $offre)
    <div class="modal fade viewModal{{ $offre->id}}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">Aperçu du compte:  <span class="text-primary">{{$offre->titre }} </span> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body bg-secondary">
                    <div class="row">
                        <div class="col-md-6 col-xl-5 mb-30 m-auto">
                            <div class="card  full-height">
                                <div class="card-body">
                                    <div class="widget-content-area-3">
                                        <div class="widget-content-3 text-center">
                                            <div class="widget-content-thumb-3">
                                                @if (isset($offre->photo))
                                                <img src="{{ asset('storage/'.$offre->photo)}} " alt="">
                                                @else
                                                <img src="{{ asset('admin/img/member-img/team-1.jpg')}} " alt="">
                                                @endif
                                            </div>
                                            <h6 class="mt-15 mb-1">{{$offre->nom }}</h6>
                                            <span class="mb-15"><i class="lni lni-user"></i> {{(int) $offre->role === 1 ? "Admin ": "Editeur" }}</span>

                                            <span class="mb-15"><i class="lni lni-envelope"></i> {{ $offre->email  }}</span>

                                            @if ( (int) $offre->validated === 1 )
                                            <span class="badge badge-success text-white">Compte actif</span>
                                            @else
                                            <span class="badge badge-danger text-white">Compte inactif</span>
                                            @endif
                                            
                                           
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif

</section>


@endsection