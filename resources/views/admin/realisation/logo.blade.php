@extends('admin/layouts/theme')

@section('theme')



<div class="row align-ilogos-center">
    <div class="col-9">
        <div class="dashboard-header-title mb-30">
            <h4 class="mb-0">Logo du site</h4>
            <p class="mb-0">Editer le logo</p>
        </div>
    </div>
    <div class="col-3 text-right">
        @if (is_null($logo))
            <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target=".bd-example-modal-lg">Editer le logo</button>
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

<div class="row">
    <div class="col-lg-12 mb-30">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">Logo:</h5>

                <!-- Table -->
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-uppercase">Logo</th>
                                <th class="text-uppercase">Icône d'en-tête</th>
                                <th class="text-uppercase">Edité le</th>
                                <th class="text-uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @if (!is_null($logo))
                               
                               <tr>
                                <td> <img src="{{ asset('storage/'.$logo->photo) }} " alt="Logo du site" width="95"> </td>
                                <td> <img src="{{ asset('storage/'.$logo->favicon) }} " alt="Icône du site" width="60" style="max-width: 65px"> </td>
                                <td>{{ Dates::dateFr($logo->created_at) }}</td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target=".editModal{{$logo->id }}">Editer</button>
                                        <button class="btn btn-sm btn-dark" data-toggle="modal" data-target=".viewModal{{$logo->id }}">Aperçu</button>
                                    </div>
                                </td>
                                </tr>
                               
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
                    <h5 class="modal-heading mt-2 mb-4">Enregistrer le logo:</h5>

                    <form action="{{ url("logo/store") }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-4">
                            <div class="col-sm-12 mb-3">
                                <label for="photo" class="form-label fw-bold font-weight-bold ">Logo: (PNG/JPG): <span class="text-danger">*</span> :</label>
                                <input type="file" name="photo" id="photo" class="form-control" required>
                            </div>

                            <div class="col-sm-12 mb-3">
                                <label for="favicon" class="form-label fw-bold font-weight-bold ">Favicon: icône d'en-tête de page (PNG/JPG/ICO): <span class="text-danger">*</span> :</label>
                                <input type="file" name="favicon" id="favicon" class="form-control" required>
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

    @if(isset($logo) && !empty($logo))
       
        <div class="modal fade editModal{{$logo->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
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
                        <h5 class="modal-heading mt-2 mb-4">Modifier le logo:</h5>

                        <form action="{{ url("logo/update",$logo) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-4">
                                <div class="col-sm-12 mb-3">
                                    <label for="photo" class="form-label fw-bold font-weight-bold ">Logo: (PNG/JPG): <small class="text-danger">(facultatif)</small> :</label>
                                    <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
                                </div>

                                <div class="col-sm-12 mb-3">
                                    <label for="favicon" class="form-label fw-bold font-weight-bold ">Favicon: icône d'en-tête de page (PNG/JPG/ICO): <small class="text-danger">(facultatif)</small> :</label>
                                    <input type="file" name="favicon" id="favicon" class="form-control" accept="image/*" >
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



    @if(isset($logo) && !empty($logo))
   
    <div class="modal fade viewModal{{ $logo->id}}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">Aperçu:  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="card-img overflow-hidden m-auto border">
                        <img src="{{ asset('storage/'.$logo->photo) }}" alt="" width="250">
                    </div>
                </div>
            </div>
        </div>
    </div>
   
@endif

</section>


@endsection