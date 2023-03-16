@extends('admin/layouts/theme')

@section('theme')



<div class="row align-items-center">
    <div class="col-9">
        <div class="dashboard-header-title mb-30">
            <h4 class="mb-0">Mon profil</h4>
            <p class="mb-0">Mettez à jour vos informations </p>
        </div>
    </div>
    <div class="col-3 text-right">
        {{-- <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target=".bd-example-modal-lg">Ajouter un utilisateur</button> --}}
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
    <div class="col-12 col-xl-4">
        <div class="card mb-30">
            <div class="card-body">
                <div class="profile-thumb-contact text-center">
                    <div class="profile--tumb">
                        @if (isset($admin->photo))
                        <img src="{{ asset('storage/'.$admin->photo)}} " alt="">
                        @else
                        <img src="{{ asset('admin/img/member-img/team-1.jpg')}} " alt="">
                        @endif
                    </div>
                    <h5>{{$admin->nom }}</h5>
                    <h6>{{(int) $admin->role === 1 ? "Admin ": "Editeur" }}</h6>
                    
                    <div class="profile-btn">
                        <a href="#" class="btn btn-primary mb-4 mr-3" data-toggle="modal" data-target=".bd-example-modal-lg"> <i class="fa fa-camera"></i> Modifier ma photo</a>
                    </div>
                </div>
                <div class="personal-information mt-3">
                    <div class="name-text">
                        <h6><span>Email:</span> {{$admin->email }}</h6>
                        <h6><span>Connectivité:</span> <span class="text-success">En ligne</span> </h6>
                        <h6><span>Rôle:</span> {{(int) $admin->role === 1 ? "Admin ": "Editeur" }}</h6>
                    
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-xl-8">
        <div class="card mb-30">
            <div class="card-body">
                <form action="{{ url("admin/personnal",$admin) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h2 class="text card-title mb-4">Mettre à jour mes informations</h2>
                    <hr>
                    <div class="row mb-4">
                        <div class="col-sm-12 mb-3">
                            <label for="nom" class="form-label fw-bold font-weight-bold ">Nom / Login: <span class="text-danger">*</span> :</label>
                            <input type="text" name="nom" id="nom" class="form-control" value="{{ $admin->nom }}"   maxlength="100" required>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="email" class="form-label fw-bold font-weight-bold ">email / Login: <small class="text-info">(facultatif)</small> :</label>
                            <input type="email" name="email" id="email" class="form-control"  value="{{ $admin->email }}"  >
                        </div>
                    </div>
                  
                    <div class="form-group text-right text-right">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-warning">Sauvegarder </button>
                    </div>
                </form>



                <div class="mb-4 mt-4">
                    <form action="{{ url("admin/password", $admin)}} " method="post">
                    
                        @csrf
                        <h2 class="text card-title mb-4">Changer mon mot de passe:</h2>
                        <hr>

                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <label for="password" class="form-label fw-bold font-weight-bold ">Changer mon mot de passe: <small class="text-danger">(*)</small> :</label>
                                <input type="text" name="password" id="password" class="form-control" required>
                            </div>
    
                            <div class="col-sm-12 mb-3">
                                <label for="password_confirmation" class="form-label fw-bold font-weight-bold ">Confirmez le mot de passe: <small class="text-danger">(*)</small> :</label>
                                <input type="text" name="password_confirmation" id="password_confirmation" class="form-control" required>
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
</div>


<section>
    {{-- Création --}}
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="modal-heading mt-2 mb-4">Modifier ma photo de profil:</h5>

                    <form action="{{ url("admin/avatar",$admin) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-sm-12 ">
                                <label for="photo" class="form-label fw-bold font-weight-bold ">Photo de profil  <small class="text-info">(*)</small> </label>
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
</section>


@endsection