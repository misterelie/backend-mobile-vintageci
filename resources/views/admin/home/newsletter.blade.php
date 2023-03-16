@extends('admin/layouts/theme')

@section('theme')



<div class="row align-items-center">
    <div class="col-9">
        <div class="dashboard-header-title mb-30">
            <h4 class="mb-0">NewsLetter</h4>
            <p class="mb-0">Liste des souscriptions </p>
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
            <div class="card-body">
                <h5 class="card-title mb-3">Tous les abonnés:</h5>

                <!-- Table -->
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-uppercase">Email</th>
                                <th class="text-uppercase">Abonné dep. le</th>
                                <th class="text-uppercase">Statut</th>
                                <th class="text-uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @if (!is_null($newsletters))
                               @foreach ($newsletters as $tem)
                               <tr>
                                <td><h6>{{$tem->email}}</h6></td>
                                <td>{{ Dates::formatFr($tem->created_at) }}</td>
                                <td>
                                    @if ($tem->connected === 1)
                                    <span class="badge badge-success badge-sm">Abonné</span>
                                    @else
                                    <span class="badge badge-danger badge-sm">Désabonné</span>
                                    @endif
                                </td>
                               
                                <td>
                                    <div class="d-flex">
                                        <span>
                                            <form action="{{ url("newsletter/destroy",$tem) }} " method="post">
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





@endsection