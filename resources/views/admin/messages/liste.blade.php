@extends('admin/layouts/theme')

@section('theme')



<div class="row align-items-center">
    <div class="col-9">
        <div class="dashboard-header-title mb-30">
            <h4 class="mb-0">Messages de contact</h4>
            <p class="mb-0">Liste des messages </p>
        </div>
    </div>
    <div class="col-3 text-right">
        {{-- <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target=".bd-example-modal-lg">Ajouter une opportunités</button> --}}
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

            <div class="card-header row ">
                <div class="col-sm-6">
                    <h5 class="card-title mb-3">Tous les messages reçus:</h5>
                </div>
                <div class="col-sm-6 text-right">
                    @if (count($new) > 0)
                    <form action="{{ url("/messages/toggle") }} " method="post">
                        @csrf
                        @method("POST")
                        <button class="btn btn-sm btn-warning mr-3 fz-1rem" type="submit"
                           ><i class="fa fa-check"> </i> Tous marquer comme lu
                        </button>
                    </form>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-uppercase">Expéditeur</th>
                                <th class="text-uppercase">Téléphone</th>
                                <th class="text-uppercase">Email</th>
                                <th class="text-uppercase">Objet</th>
                                <th class="text-uppercase">Envoyé le</th>
                                <th class="text-uppercase">Statut</th>
                                <th class="text-uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @if (!is_null($messages))
                               @foreach ($messages as $tem)
                               <tr>
                                <td><h6>{{$tem->nom_complet}}</h6></td>
                                <td><h6>{{$tem->telephone}}</h6></td>
                                <td>{{$tem->email}}</td>
                                <td><h6>{{$tem->objet}}</h6></td>
                                <td>{{ Dates::formatFr($tem->created_at) }}</td>
                                <td>
                                    @if ($tem->vu === 0)
                                    <span class="badge badge-success badge-sm">Nouveau</span>
                                    @else
                                    <span class="badge badge-warning badge-sm">Déjà Lu</span>
                                    @endif
                                </td>
                               
                                <td>
                                    <div class="d-flex">
                                        <a href="#!" data-toggle="modal" data-target=".openModal{{$tem->id}}" class="btn btn-sm mr-3 fz-1rem btn-dark">
                                            <i class="lni lni-eye"></i>
                                        </a>

                                        @if($tem->vu === 0)
                                        <span title="{{$tem->vu === 0 ? 'Marquer comme lu' : 'btn-success' }}">
                                            <form action="{{ url("/messages/togglesingle",$tem) }} " method="post">
                                                @csrf
                                                @method("POST")
                                                <button class="btn btn-sm {{$tem->vu === 1 ? 'btn-warning' : 'btn-success' }} mr-3 fz-1rem" type="submit"
                                                   ><i class="fa fa-check"></i>
                                                </button>
                                            </form>
                                        </span>
                                        @endif
                                        <span>
                                            <form action="{{ url("message/destroy",$tem) }} " method="post">
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


<div class="row my-4 justify-copntent-end text-end">
    <div class=" mb-4">
        {{ $messages->links()}}
    </div>
</div>




<section>
    
    @if(isset($messages) && !empty($messages))
        @foreach ($messages as $msg)
        <div class="modal fade openModal{{ $msg->id}}" tabindex="-1" role="dialog" aria-labelledby="openModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="openModalLabel">Détails:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                     
                        <div class="row">
                            <div class="col-sm-6">
                                <span class="mb-1 d-block">
                                     <u>Message de:</u> <b>{{ Str::upper($msg->nom_complet)}}</b>
                                </span>
                                <span class="mb-1 d-block">
                                    <u> Objet:</u> <strong>{{ $msg->objet}}</strong>
                                </span>
                            </div>
                            <div class="col-sm-6">
                                <span class="mb-1 d-block">
                                    <u> Envoyé le:</u> {{ Dates::dateFr($msg->created_at) }}
                                </span>
                            </div>
                            <div class="col-sm-6">
                                <span class="mb-1 d-block">
                                    <u> Adresse :</u> {{ ($msg->adresse) }}
                                </span>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-sm-12 text-justify">
                                <h6 class="text-body mb-3">Contenu du message:</h6>
                                {!! $msg->message !!}
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