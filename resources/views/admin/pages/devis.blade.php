@extends('admin/layouts/theme')

@section('theme')



<div class="row align-items-center">
    <div class="col-9">
        <div class="dashboard-header-title mb-30">
            <h4 class="mb-0">Demande de devis reçues</h4>
            <p class="mb-0">Liste des demandes </p>
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
                    <h5 class="card-title mb-3">Toutes les demandes reçus:</h5>
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
                                <th class="text-uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @if (!is_null($devis))
                               @foreach ($devis as $tem)
                               <tr>
                                <td><h6>{{$tem->nom}}</h6></td>
                                <td><h6>{{$tem->phone}}</h6></td>
                                <td>{{$tem->email}}</td>
                                <td><h6>{{$tem->objet}}</h6></td>
                                <td>
                                    <small>
                                        {{ Dates::formatFr($tem->created_at) }}
                                    </small>
                                </td>
                                
                               
                                <td>
                                    <div class="d-flex">
                                        <a href="#!" data-toggle="modal" data-target=".openModal{{$tem->id}}" class="btn btn-sm mr-3 fz-1rem btn-dark">
                                            <i class="lni lni-eye"></i>
                                        </a>

                                        <span>
                                            <form action="{{ url("devis/destroy",$tem) }} " method="post">
                                                @csrf
                                                @method("POST")
                                                <button class="btn btn-sm btn-danger mr-3 fz-1rem" type="submit"
                                                    title="Remove" onclick="return confirm('Êtes-vous sûrs de vouloir supprimer cette information ?')"><i class="lni lni-trash"></i>
                                                </button>
                                            </form>
                                        </span>

                                        @if (!is_null($tem->pj))
                                        <span>
                                            <a href="{{ asset('storage/'.$tem->pj)}} " target="_blank" rel="noopener noreferrer" class="btn btn-primary"> <i class="lni lni lni-download"></i> </a>
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


<div class="row my-4 justify-copntent-end text-end">
    <div class=" mb-4">
        {{ $devis->links()}}
    </div>
</div>




<section>
    
    @if(isset($devis) && !empty($devis))
        @foreach ($devis as $msg)
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
                                     <u>Message de:</u> <b>{{ Str::upper($msg->nom)}}</b>
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
                                    <u> Lieu de livraison :</u> {{ $msg->lieu }}
                                </span>
                            </div>
                            <div class="col-sm-6">
                                <span class="mb-1 d-block">
                                    <u> Dimensions  :</u> {{ $msg->taille }}
                                </span>
                                <span class="mb-1 d-block">
                                    <u> Quantité:</u> <strong>{{ $msg->quantite}}</strong>
                                </span>
                            </div>
                            @if (!is_null($msg->pj))
                            <div class="col-sm-6">
                                <span class="mb-2 d-block">
                                    <u>Pièce jointe:</u>
                                    &nbsp;&nbsp;
                                        <span class="badge badge-dark"> {{Helpers::filetype($msg->pj) }}&nbsp;
                                            <a href="{{ asset('storage/'.$msg->pj)}} " target="_blank" rel="noopener noreferrer" class="btn btn-sm  btn-warning"> <i class="lni lni lni-download"></i> </a>
                                        </span>
                                       
                                </span>
                            </div>
                            @endif
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-sm-12 text-justify">
                                <h6 class="text-body mb-3">Contenu du message:</h6>
                                {!! $msg->details !!}
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