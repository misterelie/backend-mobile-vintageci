@extends('admin/layouts/theme')

@section('theme')



<div class="row align-ivideos-center">
    <div class="col-9">
        <div class="dashboard-header-title mb-30">
            <h4 class="mb-0">Vidéo Youtube</h4>
            <p class="mb-0">Editer la vidéo</p>
        </div>
    </div>
    <div class="col-3 text-right">
       
            <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target=".bd-example-modal-lg">Editer</button>
     
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
                <h5 class="card-title mb-3">Aperçu de la vidéo:</h5>

                <!-- Table -->
                <div class="table-responsive">
                    <div class="col-lg-12">
                        <iframe style="border: 1px solid #ffb400; border-radius: 2px;" width="100%" height="540" src="https://www.youtube.com/embed/{{!is_null($video) ? $video->code : 'UA4ha7xuFL0'}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                      </iframe>
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
                    <h5 class="modal-heading mt-2 mb-4">Enregistrer les videos:</h5>

                    <form action="{{ url("video/store") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-sm-12 mb-3">
                                <label for="code" class="form-label fw-bold font-weight-bold ">Identifiant de la vidéo: <span class="text-danger">*</span> :</label>
                                <input type="text" name="code" id="code" class="form-control" required>
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

    @if(isset($video) && !empty($video))
       
        <div class="modal fade editModal{{$video->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
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
                        <h5 class="modal-heading mt-2 mb-4">Modifier les informations:</h5>

                        <form action="{{ url("video/update",$video) }}" method="post" enctype="multipart/form-data">
                            @csrf

                           
                            <div class="row">
                                <div class="col-sm-12 mb-3">
                                    <label for="code" class="form-label fw-bold font-weight-bold ">Identifiant de la vidéo: <span class="text-danger">*</span> :</label>
                                    <input type="text" name="code" id="code" class="form-control" required>
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
        
    @endif

</section>


@endsection