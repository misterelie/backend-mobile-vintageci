@extends('layouts.base')
@section('content')

<!--formulaire register-->
<main>
    <section class="register-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-auto col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 m-auto">
                            <div class="form-group ">

                                @if (Session::has('success'))
                                <div class="alert alert-icon alert-success mb-4 alert-bg alert-inline ">
                                    <h4 class="alert-title">
                                        <i class="fas fa-check"></i>Réussite !
                                    </h4> {{ Session::get('success')}}.
                                </div>
                                @endif

                                @if (Session::has('error'))
                                <div class="alert mb-4 alert-icon alert-error alert-bg alert-inline ">
                                    <h4 class="alert-title">
                                        <i class="w-icon-times-circle"></i>Alerte !
                                    </h4> {{ Session::get('error')}}.
                                </div>
                                @endif

                            </div>
                            <form action="{{ url("/save/user") }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <fieldset>
                                    <div class="card card-auth">
                                        <div class="card-header px-4 py-3 bg-bordeau">
                                            <i class="fa fa-user" id="user"></i>
                                            <h4 class="card-title text-white text-center">Inscrivez-vous</h4>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="row">
                                                <div class="col-sm-6 mb-2">
                                                    <label for="user_firstname" class="form-label">Nom : <span
                                                            class="text-red">*</span> </label>
                                                    <input type="text" name="user_firstname" id="user_firstname"
                                                        class="form-control"
                                                        value="{{ old('user_firstname') }} "
                                                        required="">
                                                    @error('user_firstname')
                                                        <span class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-6 mb-2">
                                                    <label for="user_lastname" class="form-label">Prénom(s) : <span
                                                            class="text-red">*</span> </label>
                                                    <input type="text" name="user_lastname" id="user_lastname"
                                                        class="form-control"
                                                        value="{{ old('user_lastname') }} "
                                                        required="">
                                                    @error('user_lastname')
                                                        <span class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group mb-2 mt-2">
                                                <label for="user_email" class="form-label">Adresse email : <span
                                                        class="text-red">*</span></label>
                                                <input type="email" name="user_email" id="user_email"
                                                    class="form-control"
                                                    value="{{ old('user_email') }}" required="">
                                                @error('user_email')
                                                    <span class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-sm-6 mb-2 ">
                                                    <label for="user_phone" class="form-label">Téléphone : <span
                                                            class="text-red">*</span>
                                                    </label>
                                                    <input type="text" name="user_phone" id="user_phone"
                                                        value="{{ old('user_phone') }}"
                                                        class="form-control" placeholder="Votre numéro de téléphone"
                                                        required="">
                                                    @error('user_phone')
                                                        <span class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-6 mb-2 ">
                                                    <label for="user_whatsapp" class="form-label">Contact
                                                        Whatsapp(facultatif):
                                                    </label>
                                                    <input type="text" name="user_whatsapp" id="user_whatsapp"
                                                        class="form-control"
                                                        value="{{ old('user_whatsapp') }}"
                                                        required="">
                                                    @error('user_whatsapp')
                                                        <span class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 mb-2">
                                                    <label for="password" class="form-label">Mot de passe : <span
                                                            class="text-red">*</span> </label>
                                                    <input type="password" name="password" id="password"
                                                        class="form-control" required="">
                                                    @error('password')
                                                        <span class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-6 mb-2">
                                                    <label for="password_confirmation" class="form-label">Confirmez
                                                        le mot de passe : <span class="text-red">*</span> </label>
                                                    <input type="password" name="password_confirmation"
                                                        id="password_confirmation" class="form-control" required="">
                                                    @error('password_confirmation')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="mb-4 lasfieldt-">
                                    <div class="card card-auth">
                                        <div class="card-header px-4 py-3 bg-bordeau">
                                            <h4 class="card-title text-white">conditions générales d'utilisation</h4>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="from-group mb-2">
                                                <label for="genre" class="form-label">
                                                    <span>
                                                        <small>
                                                            J'accepte les conditions générales d'utilisation de Allô
                                                            Service Vintage en cliquant sur: S'inscrire.
                                                        </small>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input" id="cgu" name="cgu"
                                                    name="adhesion" required>
                                                <label class="form-check-label" for="OUI">J'accepte <span
                                                        class="text-red">*</span>
                                                </label>
                                                @error('cgu')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group d-block text-right">
                                            <button type="submit" class="btn submit-btn">s'inscrire</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
