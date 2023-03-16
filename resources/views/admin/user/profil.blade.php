@extends('admin/layouts/theme')

@section('theme')


<div class="content-body">
    <div class="container-fluid">


        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Tableau de bord</a>
                </li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Profil</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo rounded"></div>
                        </div>
                        <div class="profile-info">
                            <div class="profile-photo">
                                {{-- <img src="admin/images/profile/profile.png" class="img-fluid rounded-circle" alt="">  --}}

                                <a class="test-popup-link"
                                    href="{{ asset('storage/'. User::onlineAdmin()->photo) }}">
                                   @if (User::onlineAdmin()->photo)
                                   <img src="{{ asset('storage/'. User::onlineAdmin()->photo) }}"
                                   class="img-fluid rounded-circle" alt="Photo de profil">
                                   @else
                                   <img src="{{ asset('admin/images/profile/profile.png/') }}"
                                   class="img-fluid rounded-circle" alt="Photo de profil">
                                   @endif
                                </a>
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0">{{User::onlineAdmin()->nom }}</h4>
                                    <p>{{ User::onlineAdmin()->titre }}</p>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">{{User::onlineAdmin()->email}} </h4>
                                    <p>Email</p>
                                </div>
                                <div class="dropdown ms-auto">
                                    <a href="javascript:void(0);" class="btn btn-primary mb-1"
                                    data-bs-toggle="modal" data-bs-target="#sendMessageModal">
                                       <span class="fa fas fab fa-camera"></span>
                                    </a>
                                  
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li class="dropdown-item"><i
                                                class="fa fa-user-circle text-primary me-2"></i> View profile
                                        </li>
                                        <li class="dropdown-item"><i class="fa fa-users text-primary me-2"></i>
                                            Add to btn-close friends</li>
                                        <li class="dropdown-item"><i class="fa fa-plus text-primary me-2"></i>
                                            Add to group</li>
                                        <li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i>
                                            Block</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-statistics">
                                    <div class="text-center">
                                        <div class="row">
                                            <div class="col">
                                                <h3 class="m-b-0">150</h3><span>Vues de postes</span>
                                            </div>
                                            <div class="col">
                                                <h3 class="m-b-0">140</h3><span>Utilisateurs ajoutés</span>
                                            </div>
                                            <div class="col">
                                                <h3 class="m-b-0">45</h3><span>Avis postes</span>
                                            </div>
                                        </div>
                                        {{-- <div class="mt-4">
                                            <a href="javascript:void(0);"
                                                class="btn btn-primary mb-1 me-1">Follow</a>
                                            <a href="javascript:void(0);" class="btn btn-primary mb-1"
                                                data-bs-toggle="modal" data-bs-target="#sendMessageModal">Send
                                                Message</a>
                                        </div> --}}
                                    </div>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="sendMessageModal">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Changer ma photo  profil</h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="comment-form" enctype="multipart/form-data" method="POST" action="{{url("main/avatar",User::onlineAdmin()) }} ">
                                                        @csrf

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                               
                                                                <div class="input-group custom_file_input mb-3">
                                                                    <span class="input-group-text">Charger une photo:</span>
                                                                    <div class="form-file">
                                                                        <input type="file"
                                                                            class="form-file-input form-control" name="photo"  accept="image/png, image/jpg, image/jpeg">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group text-right">
                                                                <button type="submit" class="btn btn-primary"> Sauvegarder</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-blog">
                                    <h5 class="text-primary d-inline">Présentation</h5>
                                
                                    <div class="mb-0">
                                        {{User::onlineAdmin()->description }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>


            
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#my-posts" data-bs-toggle="tab"
                                            class="nav-link active show">Mes postes</a>
                                    </li>
                                    <li class="nav-item"><a href="#about-me" data-bs-toggle="tab"
                                            class="nav-link">Description:</a>
                                    </li>
                                    <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab"
                                            class="nav-link">Paramètres</a>
                                    </li>
                                </ul>


                                <div class="tab-content">

                                    {{-- Mes postes --}}
                                    <div id="my-posts" class="tab-pane fade active show">
                                        <div class="my-post-content pt-3">
                                            <div class="post-input">

                                                <div class="input-group custom_file_input mb-3">
                                                    <span class="input-group-text">Charger</span>
                                                    <div class="form-file">
                                                        <input type="file"
                                                            class="form-file-input form-control">
                                                    </div>
                                                </div>

                                                <textarea name="details" cols="30" rows="8" class="form-control " placeholder="Détails du poste....">
                                                </textarea>
                                            </div>
                                            <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                                <img src="../static/getskills/images/profile/8.jpg" alt=""
                                                    class="img-fluid w-100 rounded">
                                                <a class="post-title" href="../post-details/index.html">
                                                    <h3 class="text-black">Collection of textile samples lay
                                                        spread</h3>
                                                </a>
                                                <p>A wonderful serenity has take possession of my entire soul
                                                    like these sweet morning of spare which enjoy whole heart.A
                                                    wonderful serenity has take possession of my entire soul
                                                    like these sweet morning
                                                    of spare which enjoy whole heart.</p>
                                                <button class="btn btn-primary me-2"><span class="me-2"><i
                                                            class="fa fa-heart"></i></span>Like</button>
                                                <button class="btn btn-secondary" data-bs-toggle="modal"
                                                    data-bs-target="#replyModal"><span class="me-2"><i
                                                            class="fa fa-reply"></i></span>Reply</button>
                                            </div>
                                            <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                                <img src="../static/getskills/images/profile/9.jpg" alt=""
                                                    class="img-fluid w-100 rounded">
                                                <a class="post-title" href="../post-details/index.html">
                                                    <h3 class="text-black">Collection of textile samples lay
                                                        spread</h3>
                                                </a>
                                                <p>A wonderful serenity has take possession of my entire soul
                                                    like these sweet morning of spare which enjoy whole heart.A
                                                    wonderful serenity has take possession of my entire soul
                                                    like these sweet morning
                                                    of spare which enjoy whole heart.</p>
                                                <button class="btn btn-primary me-2"><span class="me-2"><i
                                                            class="fa fa-heart"></i></span>Like</button>
                                                <button class="btn btn-secondary" data-bs-toggle="modal"
                                                    data-bs-target="#replyModal"><span class="me-2"><i
                                                            class="fa fa-reply"></i></span>Reply</button>
                                            </div>
                                            <div class="profile-uoloaded-post pb-3">
                                                <img src="../static/getskills/images/profile/8.jpg" alt=""
                                                    class="img-fluid w-100 rounded">
                                                <a class="post-title" href="../post-details/index.html">
                                                    <h3 class="text-black">Collection of textile samples lay
                                                        spread</h3>
                                                </a>
                                                <p>A wonderful serenity has take possession of my entire soul
                                                    like these sweet morning of spare which enjoy whole heart.A
                                                    wonderful serenity has take possession of my entire soul
                                                    like these sweet morning
                                                    of spare which enjoy whole heart.</p>
                                                <button class="btn btn-primary me-2"><span class="me-2"><i
                                                            class="fa fa-heart"></i></span>Like</button>
                                                <button class="btn btn-secondary" data-bs-toggle="modal"
                                                    data-bs-target="#replyModal"><span class="me-2"><i
                                                            class="fa fa-reply"></i></span>Reply</button>
                                            </div>
                                        </div>
                                    </div>



                                    {{-- A propos --}}
                                    <div id="about-me" class="tab-pane fade">
                                        <div class="profile-about-me">
                                            <div class="pt-4 border-bottom-1 pb-3">
                                                <h4 class="text-primary">Description:</h4>
                                                <div class="mb-2">
                                                    {!! str_replace(["\n","\n\n"], "<br>",User::onlineAdmin()->description)  !!}
                                                </div>
                                            </div>
                                        </div>
                                     



                                        <div class="profile-lang  mb-5">
                                            <h4 class="text-primary mb-2">Langues</h4>
                                            <a href="javascript:void(0);" class="text-muted pe-3 f-s-16"><i
                                                    class="flag-icon flag-icon-us"></i> English</a>
                                            <a href="javascript:void(0);" class="text-muted pe-3 f-s-16"><i
                                                    class="flag-icon flag-icon-fr"></i> Francais</a>
                                            
                                        </div>



                                        <div class="profile-personal-info">
                                            <h4 class="text-primary mb-4">Informations personnelles:</h4>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Nom: <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span> {{User::onlineAdmin()->nom }} </span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Email <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span>{{User::onlineAdmin()->email }}</span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Connectivité <span
                                                            class="pull-end">:</span></h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span>{{(User::onlineAdmin()->online === 1) ? "En ligne" : "Hors ligne" }}  </span>
                                                </div>
                                            </div>
                                            
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Adresse: <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span>
                                                    {{User::onlineAdmin()->adresse}}
                                                </span>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>


                                    
                                    {{-- Paramètres --}}
                                    <div id="profile-settings" class="tab-pane fade">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <h4 class="text-primary">Modifier mes informations</h4>
                                                <form method="POST" action="{{url("main/save-infos",User::onlineAdmin()) }} ">

                                                    @csrf
                                                    <div class="row">
                                            
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Email:</label>
                                                            <input type="email"
                                                                class="form-control" name="email"  value="{{ User::onlineAdmin()->email }}"  placeholder="{{ User::onlineAdmin()->email }}">
                                                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                                        </div>
                                            
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Nom d'utilisateur:</label>
                                                            <input type="text" 
                                                                class="form-control" name="nom"  value="{{ User::onlineAdmin()->nom }}"  placeholder="{{ User::onlineAdmin()->nom }}">
                                                                @error('nom') <span class="text-danger">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Addresse:</label>
                                                        <input type="text" 
                                                            class="form-control" name="adresse" value="{{ User::onlineAdmin()->adresse }}">
                                                            @error('adresse') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                   
                                            
                                                    <div class="row">
                                                        <div class="mb-3 col-md-12">
                                                            <label class="form-label">Fonction/Titre:</label>
                                                            <input type="text" class="form-control" name="titre" value="{{ User::onlineAdmin()->titre }}">
                                                            @error('titre') <span class="text-danger">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                            
                                            
                                                    
                                                    <div class="form-group text-right">
                                                        <button class="btn btn-primary" type="submit" > Sauvegarder  </button>
                                                    </div>
                                                </form>
                                            </div>

                                            <hr>

                                            <div class="settings-form my-4 mb-4">
                                                <h4 class="text-primary mt-4 ">Ma description:</h4>

                                                <form method="POST" action="{{ url("main/save-about", User::onlineAdmin()) }}">
                                                    @csrf

                                                    <div class="row my-2">
                                                        <div class="col-12 mb-3">
                                                           <label class="form-label">Description:</label>
                                                            <textarea name="description" id="" cols="30" rows="4" class="form-control" required>
                                                                {!! str_replace("<bre>","\n", User::onlineAdmin()->description) !!}
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group text-right">
                                                        <button class="btn btn-primary" type="submit" > Sauvegarder  </button>
                                                    </div>
                                                </form>
                                            </div>

                                            <hr>

                                            <div class="settings-form my-4 mb-4">
                                                <h4 class="text-primary mt-4 ">Modifier mon mot de passe:</h4>

                                                <form method="POST" action="{{ url("main/save-password", User::onlineAdmin()) }}">
                                                    @csrf

                                                    <div class="row my-2">
                                                        <div class="col-12 mb-3">
                                                           <label class="form-label">Renseignez l'ancien mot de passe:</label>
                                                            <input name="password" type="password" class="form-control" required>
                                                               
                                                        </div>

                                                        <div class="col-6 mb-3">
                                                            <label class="form-label">Nouveau mot de passe: <span class="text-danger">(8 caractères) (*)</span> </label>
                                                             <input name="new_password" type="password" class="form-control" required>
                                                                
                                                         </div>

                                                         <div class="col-6 mb-3">
                                                            <label class="form-label">Confirmez : <span class="text-danger">(8 caractères) (*)</span> </label>
                                                             <input  type="password" name="password_confirmation" id="" class="form-control" required>
                                                         </div>
                                                    </div>
                                                    
                                                    <div class="form-group text-right">
                                                        <button class="btn btn-primary" type="submit" > Sauvegarder  </button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>



                            
                            <!-- Modal -->
                            <div class="modal fade" id="replyModal">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Post Reply</h5>
                                            <button type="button" class="btn-close"
                                                data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <textarea class="form-control" rows="4">Message</textarea>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">btn-close</button>
                                            <button type="button" class="btn btn-primary">Reply</button>
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
</div>


@endsection