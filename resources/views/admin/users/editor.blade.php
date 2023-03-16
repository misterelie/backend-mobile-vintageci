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
                                    <h4 class="mb-sm-0 font-size-18">Editeurs</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Utilisateurs</a></li>
                                            <li class="breadcrumb-item active">Gestion des Editeurs </li>
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
                                                    
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="text-sm-end">
                                                   
                                                    <button type="button" class="btn btn-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        <i class="mdi mdi-plus me-1"></i> Ajouter un utilisateur
                                                    </button>
                                                </div>
                                            </div><!-- end col-->
                                        </div>
                
                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap table-check">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th class="align-middle text-uppercase">Photo</th>
                                                        <th class="align-middle text-uppercase" width="9%">Nom & Prénoms</th>
                                                        <th class="align-middle text-uppercase">Email</th>
                                                        <th class="align-middle text-uppercase">Rôle</th>
                                                        <th class="align-middle text-uppercase">Statut</th>
                                                        <th class="align-middle text-uppercase">Date</th>

                                                        <th class="align-middle text-uppercase">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    @if(!is_null($users))
                                                    @foreach($users as $us)
                                                    <tr>
                                                        <td>
                                                             <a href="{{ url('/backend/user-single', $us->id)}} ">
                                                            @if (!is_null($us->avatar))
                                                            <div class="avatar-xs">
                                                                <img src="{{asset($us->avatar) }} "  alt=" " class="img-fluid" >
                                                            </div>
                                                            @else
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title icone rounded-circle">
                                                                    {{ Str::upper(Helpers::pseudo($us->user_firstname) . "". Helpers::pseudo($us->user_lastname)) }}
                                                                </span>
                                                            </div>
                                                            @endif
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <strong>{{ Str::ucfirst($us->user_firstname) ." ". Str::ucfirst($us->user_lastname)}} </strong>
                                                        </td>
                                                        
                                                        <td>
                                                            <a href="mailto:{{ Str::ucfirst($us->user_email)}} ">
                                                                {{ Str::ucfirst($us->user_email)}} </a>
                                                        </td>

                                                        <td>
                                                           @if ($us->user_role === 0)
                                                           <span class="badge bg-primary">Editeur</span>
                                                           @else
                                                           <span class="badge bg-danger text-white">Admin</span>
                                                           @endif
                                                        </td>
                                                        
                                                        <td>
                                                           @if ((bool) $us->user_validated === true)
                                                           <span class="badge badge-soft-success font-size-11 m-1">
                                                            Validé
                                                           </span>
                                                           @endif

                                                           @if ((bool) $us->user_validated === false)
                                                           <span class="badge badge-soft-danger font-size-11 m-1">
                                                            Inactif
                                                           </span>
                                                           @endif
                                                        </td>

                                                        <td>
                                                            {{ Dates::formatFr($us->created_at)}}
                                                        </td>
                                                        
                                                        <td >
                                                            <div class=" btn-group">

                                                                <a type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#dynamicModal{{$us->id}}">
                                                                    <i class="mdi mdi-square-edit-outline  me-1 font-size-15"></i> 
                                                                </a>
                                                                
                                                                <a href="{{ url('/backend/user-single', $us->id)}}" class="btn btn-sm btn-dark text-white font-size-15" title="Détail sur le compte"><i class="fa fa-eye"></i></a>
                                                                
                                                                @if (User::userId() != $us->id)
                                                                <a href="{{ url("/user/destroy", $us)}}" class="btn btn-sm btn-danger text-white font-size-15" onclick="return confirm('Êtes-vous sûrs de vouloir supprimer cette annonce ?')" title="Supprimer le compte"><i class="mdi mdi-delete "></i></a>
                                                                @endif
                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>


                                       {{ $users->links()}}
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


        <section>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-red ">
                            <h5 class="modal-title  text-uppercase" id="ModalLabel">Créer un compte:</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ url("user/store")}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-ld-12 m-auto mb-1">
                                        <label for="user_firstname" class="form-control-label mb-2">Nom: <small
                                                class="text-danger">*</small> </label>
                                        <input type="text" name="user_firstname" id="user_firstname" class="form-control" required>
                                    </div>
    
                                    <div class="col-ld-12 m-auto mb-1">
                                        <label for="user_lastname" class="form-control-label mb-2">Prénom: <small
                                                class="text-danger">*</small> </label>
                                        <input type="text" name="user_lastname" id="user_lastname" class="form-control" required>
                                    </div>
    
                                    <div class="col-ld-12 m-auto mb-1">
                                        <label for="user_email" class="form-control-label mb-2">Identifiant / Email: <small
                                                class="text-danger">*</small> </label>
                                        <input type="text" name="user_email" id="user_email" class="form-control" required>
                                    </div>
    
                                    <div class="col-ld-12 m-auto mb-1">
                                        <label for="user_role" class="form-control-label mb-2">Rôle: <small
                                                class="text-danger">*</small> </label>
                                        <select  name="user_role" id="user_role" class="form-control"  required>
                                            <option value="">--Sélectionnez un rôle--</option>
                                            <option value="1">Administrateur</option>
                                            <option value="0">Editeur</option>
                                        </select>
                                    </div>
    
        
                                    <div class="col-ld-12 m-auto mb-2">
                                        <label for="photo" class="form-control-label mb-2">Photo de profil: <small class="text-primary">(facultatif)</small> </label>
                                        <input type="file" accept="image/*" name="photo" id="photo" class="form-control">
                                    </div>
    
                                    <div class="col-ld-12 m-auto mb-1">
                                        <label for="password" class="form-control-label mb-2">Mot de passe par defaut: <small
                                                class="text-danger">*</small> </label>
                                        <input type="text" name="password" id="password" class="form-control" required>
                                    </div>
        
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary"> <i class="bx bx-save"></i>Créer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    
    
        <section>
            @if (!is_null($users))
            @foreach($users as $data)
            {{-- Modal Edit --}}
            <div class="modal fade" id="dynamicModal{{ $data->id }}" tabindex="-1" aria-labelledby="dynamicModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-orange ">
                            <h5 class="modal-title  text-uppercase font-weight-bold" id="dynamicModalLabel ">Edition du profil:</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                       
                        
                        {{-- FOrm --}}
    
                        <form action="{{ url("user/update", $data)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-ld-12 m-auto mb-1">
                                        <label for="user_firstname" class="form-control-label mb-2">Nom: <small
                                                class="text-danger">*</small> </label>
                                        <input type="text" name="user_firstname" id="user_firstname" class="form-control" value="{{ $data->user_firstname }}">
                                    </div>
    
                                    <div class="col-ld-12 m-auto mb-1">
                                        <label for="user_lastname" class="form-control-label mb-2">Prénom: <small
                                                class="text-danger">*</small> </label>
                                        <input type="text" name="user_lastname" id="user_lastname" class="form-control" value="{{ $data->user_lastname }}">
                                    </div>
    
                                    <div class="col-ld-12 m-auto mb-1">
                                        <label for="user_email" class="form-control-label mb-2">Identifiant / Email: <small
                                                class="text-danger">*</small> </label>
                                        <input type="text" name="user_email" id="user_email" class="form-control" value="{{ $data->user_email }}">
                                    </div>
    
                                    <div class="col-ld-12 m-auto mb-1">
                                        <label for="user_role" class="form-control-label mb-2">Rôle: <small
                                                class="text-danger">*</small> </label>
                                        <select  name="user_role" id="user_role" class="form-control"  required>
                                            <option value="">--Sélectionnez un rôle--</option>
                                            <option value="1" @if(Helpers::match(1, $data->user_role)) selected @endif >Administrateur</option>
                                            <option value="0" @if(Helpers::match(0, $data->user_role)) selected @endif >Editeur</option>
                                        </select>
                                    </div>
    
        
                                    <div class="col-ld-12 m-auto mb-1">
                                        <label for="photo" class="form-control-label mb-2">Photo de profil: <small class="text-primary">(facultatif)</small> </label>
                                        <input type="file" accept="image/*" name="photo" id="photo" class="form-control">
                                    </div>
    
                                    <div class="col-ld-12 m-auto mb-1">
                                        <label for="password" class="form-control-label mb-2">Mot de passe par defaut: <small
                                                class="text-danger">*</small> </label>
                                        <input type="text" name="password" id="password" class="form-control" value="{{ $data->user_credentials }}">
                                    </div>
        
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-warning">Sauvegarder</button>
                            </div>
                        </form>
    
                        
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </section>

        <!-- JAVASCRIPT -->
        @include('layouts/admin/assets/js')
    </body>
</html>
