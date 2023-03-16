@extends('admin/layouts/theme')

@section('theme')



<div class="row align-iadresses-center">
    <div class="col-9">
        <div class="dashboard-header-title mb-30">
            <h4 class="mb-0">Adresse</h4>
            <p class="mb-0">Editer les adresses</p>
        </div>
    </div>
    <div class="col-3 text-right">
        @if (is_null($adresse))
            <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target=".bd-example-modal-lg">Editer</button>
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
                <h5 class="card-title mb-3">Adresses:</h5>

                <!-- Table -->
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-uppercase">Adresse</th>
                                <th class="text-uppercase">Email</th>
                                {{-- <th class="text-uppercase">Email 2</th> --}}
                                <th class="text-uppercase">Contact 1</th>
                                <th class="text-uppercase">Contact 2</th>
                                <th class="text-uppercase">Réseaux</th>
                                <th class="text-uppercase">Edité le</th>
                                <th class="text-uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @if (!is_null($adresse))
                               
                               <tr>
                                <td><h6>{{$adresse->adresse}}</h6></td>
                                <td><span>{{$adresse->email_one}}</span></td>
                                {{-- <td><span>{{$adresse->email_two}}</span></td> --}}
                                <td><span>{{$adresse->phone_one}}</span></td>
                                <td><span>{{$adresse->phone_two}}</span></td>
                                <td>
                                    <div class="d-flex">
                                        @if (!is_null($adresse->facebook))
                                        <a href="{{ $adresse->facebook}} " target="_blank" class="text-white fa fa-facebook btn btn-sm btn-primary"></a>
                                    @endif
                                    @if (!is_null($adresse->instagram))
                                        <a href="{{ $adresse->instagram}} " target="_blank" class="text-white fa fa-instagram btn btn-sm bg-purple"></a>
                                    @endif
                                    @if (!is_null($adresse->linkedin))
                                        <a href="{{ $adresse->linkedin}}" target="_blank" class="text-white fa fa-linkedin btn btn-sm bg-info"></a>
                                    @endif

                                    @if (!is_null($adresse->youtube))
                                    <a href="{{ $adresse->youtube}}" target="_blank" class="text-white fa fa-youtube btn btn-sm bg-danger"></a>
                                    @endif

                                    @if (!is_null($adresse->twitter))
                                    <a href="{{ $adresse->twitter}}" target="_blank" class="text-white fa fa-twitter btn btn-sm bg-primary"></a>
                                @endif
                                    </div>
                                </td>
                                <td>{{ Dates::formatFr($adresse->created_at) }}</td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target=".editModal{{$adresse->id }}">Editer</button>
                                        <button class="btn btn-sm btn-dark" data-toggle="modal" data-target=".viewModal{{$adresse->id }}">Détails</button>
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
                    <h5 class="modal-heading mt-2 mb-4">Enregistrer les adresses:</h5>

                    <form action="{{ url("adresse/store") }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-4">
                            <div class="col-sm-12 mb-3">
                                <label for="adresse" class="form-label fw-bold font-weight-bold ">Adresse géographique: <span class="text-danger">*</span> :</label>
                                <input type="text" name="adresse" id="adresse" class="form-control" required>
                            </div>


                            <div class="col-sm-12 mb-3">
                                <label for="email_one" class="form-label fw-bold font-weight-bold ">Email: <span class="text-danger">*</span> :</label>
                                <input type="email" name="email_one" id="email_one" class="form-control" required>
                            </div>

                           

                            <div class="col-sm-6 mb-3">
                                <label for="phone_one" class="form-label fw-bold font-weight-bold ">Contact 1: <span class="text-danger">*</span> :</label>
                                <input type="tel" name="phone_one" id="phone_one" class="form-control" required>
                            </div>

                            <div class="col-sm-6 mb-3">
                                <label for="phone_two" class="form-label fw-bold font-weight-bold ">Contact 2: <small class="text-info">(facultatif)</small> :</label>
                                <input type="tel" name="phone_two" id="phone_two" class="form-control">
                            </div>

                           
                            
                            <div class="col-sm-12 mb-3">
                                <label for="facebook" class="form-label fw-bold font-weight-bold ">URL de la page Facebook: <small class="text-info">(facultatif)</small> :</label>
                                <input type="text" name="facebook" id="facebook" class="form-control">
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label for="instagram" class="form-label fw-bold font-weight-bold ">URL de la page Instagram: <small class="text-info">(facultatif)</small> :</label>
                                <input type="text" name="instagram" id="instagram" class="form-control">
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label for="linkedin" class="form-label fw-bold font-weight-bold ">URL de la page Linkedin: <small class="text-info">(facultatif)</small> :</label>
                                <input type="text" name="linkedin" id="linkedin" class="form-control">
                            </div>

                            <div class="col-sm-12 mb-3">
                                <label for="youtube" class="form-label fw-bold font-weight-bold ">URL de la chaine Youtube: <small class="text-info">(facultatif)</small> :</label>
                                <input type="text" name="youtube" id="youtube" class="form-control">
                            </div>

                            <div class="col-sm-12 mb-3">
                                <label for="skype" class="form-label fw-bold font-weight-bold ">ID Compte Skype: <small class="text-info">(facultatif)</small> :</label>
                                <input type="text" name="skype" id="skype" class="form-control">
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

    @if(isset($adresse) && !empty($adresse))
       
        <div class="modal fade editModal{{$adresse->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
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

                        <form action="{{ url("adresse/update",$adresse) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-4">
                            <div class="col-sm-12 mb-3">
                                <label for="adresse" class="form-label fw-bold font-weight-bold ">Adresse géographique: <span class="text-danger">*</span> :</label>
                                <input type="text" name="adresse" id="adresse" class="form-control" value="{{$adresse->adresse}}" required>
                            </div>


                            <div class="col-sm-12 mb-3">
                                <label for="email_one" class="form-label fw-bold font-weight-bold ">Email 1: <span class="text-danger">*</span> :</label>
                                <input type="email" name="email_one" id="email_one" class="form-control" value="{{$adresse->email_one}}" required>
                            </div>

                            <div class="col-sm-6 mb-3">
                                <label for="phone_one" class="form-label fw-bold font-weight-bold ">Contact 1: <span class="text-danger">*</span> :</label>
                                <input type="tel" name="phone_one" id="phone_one" class="form-control" required value="{{$adresse->phone_one}}">
                            </div>

                            <div class="col-sm-6 mb-3">
                                <label for="phone_two" class="form-label fw-bold font-weight-bold ">Contact 2: <small class="text-info">(facultatif)</small> :</label>
                                <input type="tel" name="phone_two" id="phone_two" class="form-control" value="{{$adresse->phone_two}}">
                            </div>

                           
                            <div class="col-sm-12 mb-3">
                                <label for="facebook" class="form-label fw-bold font-weight-bold ">URL de la page Facebook: <small class="text-info">(facultatif)</small> :</label>
                                <input type="text" name="facebook" id="facebook" class="form-control" value="{{$adresse->facebook}}">
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label for="instagram" class="form-label fw-bold font-weight-bold ">URL de la page Instagram: <small class="text-info">(facultatif)</small> :</label>
                                <input type="text" name="instagram" id="instagram" class="form-control" value="{{$adresse->instagram}}">
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label for="linkedin" class="form-label fw-bold font-weight-bold ">URL de la page Linkedin: <small class="text-info">(facultatif)</small> :</label>
                                <input type="text" name="linkedin" id="linkedin" class="form-control" value="{{$adresse->linkedin}}">
                            </div>

                            <div class="col-sm-12 mb-3">
                                <label for="youtube" class="form-label fw-bold font-weight-bold ">URL de la chaine Youtube: <small class="text-info">(facultatif)</small> :</label>
                                <input type="text" name="youtube" id="youtube" class="form-control" value="{{$adresse->youtube}}">
                            </div>
                            
                            <div class="col-sm-12 mb-3">
                                <label for="skype" class="form-label fw-bold font-weight-bold ">ID Compte Skype: <small class="text-info">(facultatif)</small> :</label>
                                <input type="text" name="skype" id="skype" class="form-control" value="{{$adresse->skype}}">
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



    @if(isset($adresse) && !empty($adresse))
   
    <div class="modal fade viewModal{{ $adresse->id}}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">Détails:  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered ">
                        <tbody>
                            <tr>
                                <th>Adresse:</th>
                                <td>{{ $adresse->adresse }}</td>
                            </tr>
                            <tr>
                                <th>Email 1:</th>
                                <td>{{ $adresse->email_one }}</td>
                            </tr>
                            <tr>
                                <th>Email 2:</th>
                                <td>{{ $adresse->email_two }}</td>
                            </tr>
                            <tr>
                                <th>Contact 1:</th>
                                <td>{{ $adresse->phone_one }}</td>
                            </tr>
                            <tr>
                                <th>Contact 2:</th>
                                <td>{{ $adresse->phone_two }}</td>
                            </tr>
                            <tr>
                                <th>Contact 3:</th>
                                <td>{{ $adresse->phone_three }}</td>
                            </tr>
                            <tr>
                                <th>URL facebook:</th>
                                <td>{{ $adresse->facebook }}</td>
                            </tr>
                            <tr>
                                <th>Instagram:</th>
                                <td>{{ $adresse->instagram }}</td>
                            </tr>
                            <tr>
                                <th>LinkedIn:</th>
                                <td>{{ $adresse->linkedin }}</td>
                            </tr>
                            <tr>
                                <th>Youtube:</th>
                                <td>{{ $adresse->youtube }}</td>
                            </tr>
                            <tr>
                                <th>Twitter:</th>
                                <td>{{ $adresse->twitter }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   
@endif

</section>


@endsection