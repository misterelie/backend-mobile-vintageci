@extends('admin/layouts/theme')

@section('theme')



<div class="row align-items-center">
    <div class="col-9">
        <div class="dashboard-header-title mb-30">
            <h4 class="mb-0">Présentation</h4>
            <p class="mb-0">Gérer la présentation</p>
        </div>
    </div>
    <div class="col-3 text-right">
        @if (!$about)
        <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target=".bd-example-modal-lg">Editer la présentation</button>
        @endif
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
                <h5 class="card-title mb-0">Les mentions légales:</h5>
            </div>
            <div class="dashboard-dropdown">
                <span class="text-primary">
                    @if (!is_null($about))
                    Dernière mise à jour le: {{ Dates::dateFr($about->created_at) . " à ". Dates::dateHeure($about->created_at)}}
                    @endif
                </span>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ url("mention/store") }}" method="post" enctype="multipart/form-data">

                @csrf
                
                <div class="row mb-4">
                    <div class="col-sm-6 ">
                        <label for="image_mention" class="form-label fw-bold font-weight-bold ">Image d'illustration: <span class="text-primary">(facultatif) </span> </label>
                        <input type="file" name="image_mention" id="image_mention" class="form-control">
                    </div>

                    <div class="col-sm-6 ">
                        @if(!is_null($about) && isset($about->image_mention))
                        <img src="{{ asset('storage/'.$about->image_mention)}} " alt="" class="img-fluid img-responsive" style="max-width: 45%; height: auto;">

                        <div class="d-block my-2">
                                <a href="{{ url('mention/remove', $about)}} "  class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i> Supprimer l'image</a>
                        </div>

                        @endif
                    </div>
                </div>

                <div class="row my-4">
                    <div class="col-12">
                        <div class="card mb-30">
                            <div class="card-body">
                                <label for="" class="form-label">Rédigez les mentions légales:</label>
                                <div class="summer-note-area">
                                   <textarea name="mention" id="summernote2" cols="30" rows="5" class="form-control">

                                    {!! (!is_null($about) && !is_null($about->mention) ) ?  $about->mention : ''  !!}
                                   </textarea>
                                </div>
                            </div>
                        </div>
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



@endsection