@extends('admin/layouts/theme')

@section('theme')



<div class="row align-items-center">
    <div class="col-9">
        <div class="dashboard-header-title mb-30">
            <h4 class="mb-0">Bannière de pages</h4>
            <p class="mb-0">Gérer les bannière en en-tête de pages:</p>
        </div>
    </div>
    <div class="col-3 text-right">
        <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target=".bd-example-modal-lg">Ajouter une bannière</button>
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
                <h5 class="card-title mb-3">Les bannières:</h5>

                <!-- Table -->
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-uppercase">Page</th>
                                <th class="text-uppercase">Photo</th>
                                <th class="text-uppercase">Enregistré le</th>
                                <th class="text-uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @if (!is_null($banners))
                               @foreach ($banners as $tem)
                               <tr>
                                <td><h6 class="text-uppercase">{{$tem->page}}</h6></td>
                                <td> <img src="{{ asset('storage/'.$tem->photo) }} " alt="" width="95"> </td>
                                <td>{{ Dates::formatFr($tem->created_at) }}</td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target=".editModal{{$tem->id }}">Editer</button>
                                        <button class="btn btn-sm btn-dark" data-toggle="modal" data-target=".viewModal{{$tem->id }}">Aperçu</button>

                                        <span>
                                            <form action="{{ url("banner/destroy",$tem) }} " method="post">
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
                    <h5 class="modal-heading mt-2 mb-4">Enregistrer une bannière:</h5>

                    <form action="{{ url("banner/store") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-sm-12 mb-3">
                                <label for="page" class="form-label fw-bold font-weight-bold ">Page cible: <span class="text-danger">*</span> :</label>
                                <select type="text" name="page" id="page" class="form-control"  required>
                                    <option value="">--- Sélectionnez une page ---</option>
                                   @if (count($banners) <= 0)
                                    <option value="all">Toutes les pages</option>
                                   @endif
                                   <option value="presentation">A propos</option>
                                    <option value="reference">Références</option>
                                    <option value="contact">Contact</option>
                                    <option value="devis">Demander un Devis</option>
                                    <option value="realisation">Nos Réalisations</option>
                                </select>
                            </div>
                          
                            <div class="col-sm-12 ">
                                <label for="photo" class="form-label fw-bold font-weight-bold ">Image: <span class="text-danger">*</span> </label>
                                <input type="file" name="photo" id="photo" class="form-control" accept="image/jpeg, image/png, image/gif, image/jpeg" required>
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

    @if(isset($banners) && !empty($banners))
        @foreach ($banners as $user)
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
                        <h5 class="modal-heading mt-2 mb-4">Modifier la bannière:</h5>

                        <form action="{{ url("banner/update",$user) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-4">
                                <div class="col-sm-12 mb-3">
                                    <label for="page" class="form-label fw-bold font-weight-bold ">Page cible: <span class="text-danger">*</span> :</label>
                                    <select type="text" name="page" id="page" class="form-control"  required>
                                        
                                    <option value="">--- Sélectionnez une page ---</option>
                                   @if (count($banners) <= 0)
                                    <option value="all" {{$user->page === "contact" ? "selected" : "" }}>Toutes les pages</option>
                                   @endif
                                    <option value="presentation" {{$user->page === "presentation" ? "selected" : "" }}>A propos</option>
                                    <option value="reference" {{$user->page === "reference" ? "selected" : "" }}>Références</option>
                                    <option value="contact" {{$user->page === "contact" ? "selected" : "" }}>Contact</option>
                                    <option value="devis" {{$user->page === "devis" ? "selected" : "" }}>Demander un Devis</option>
                                    <option value="realisation" {{$user->page === "realisation" ? "selected" : "" }}>Nos Réalisations</option>
                                  
                                    </select>
                                </div>

                                
        
                                <div class="col-sm-12 mb-1">
                                    <label for="photo" class="form-label fw-bold font-weight-bold ">Image: <small class="text-danger">(facultatif)</small> </label>
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



    @if(isset($banners) && !empty($banners))
    @foreach ($banners as $banner)
    <div class="modal fade viewModal{{ $banner->id}}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">Aperçu de la bannière:  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="card-img overflow-hidden m-auto border">
                        <img src="{{ asset('storage/'.$banner->photo) }}" alt="" width="250">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif

</section>


@endsection