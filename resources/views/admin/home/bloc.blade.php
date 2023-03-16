@extends('admin/layouts/theme')

@section('theme')



<div class="row align-items-center">
    <div class="col-9">
        <div class="dashboard-header-title mb-30">
            <h4 class="mb-0">Bloc trio</h4>
            {{-- <p class="mb-0">Congratulations, You have sold 3 new items.</p> --}}
        </div>
    </div>
    <div class="col-3 text-right">
        {{-- <button type="button" class="btn btn-primary m-1" data-toggle="modal"
            data-target=".bd-example-modal-lg">Ajouter
            une slide</button> --}}
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


<div class="col-12 mb-30">
    <div class="card">
        <div class="card-header bg-transparent d-flex align-items-center justify-content-between">
            <div class="widgets-card-title">
                <h5 class="card-title mb-0">Trio bloc</h5>
            </div>
            <div class="dashboard-dropdown">
                <div class="dropdown">

                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="mt-4 mb-4">
                <form action="{{ url("bloc/store") }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="form-group">
                                <label for="expertise" class="form-label fw-bold font-weight-bold ">Expertise:</label>
                                <textarea type="text" name="expertise" id="expertise" class="form-control" rows="5">
                                    {{ isset($bloc->expertise) ? $bloc->expertise : "" }}
                                </textarea>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="form-group ">
                                <label for="qualite" class="form-label fw-bold font-weight-bold ">Qualité
                                    d'exécution:</label>
                                <textarea type="text" name="qualite" id="qualite" class="form-control" rows="5">
                                    {{ isset($bloc->qualite) ? $bloc->qualite :"" }}
                                </textarea>
                            </div>

                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="form-group ">
                                <label for="engagement"
                                    class="form-label fw-bold font-weight-bold ">Engagements:</label>
                                <textarea type="text" name="engagement" id="engagement" class="form-control" rows="5">
                                    {{ isset($bloc->engagement) ? $bloc->engagement : "" }}
                                </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col text-right">
                            <div class="form-group text-right text-right">
                                <button type="submit" class="btn btn-primary">Valider </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




@endsection