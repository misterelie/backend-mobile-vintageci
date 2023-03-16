@extends('layouts.base')

@section('content')
<main>
    <!--formulaire register-->
    <section class="services-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-6 m-auto col-sm-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 m-auto">
                            <fieldset class="mb-4">
                                <div class="card card-auth">
                                    <div class="card-header px-4 py-4 bg-bordeau">
                                        <i class="fa fa-user" id="user"></i>
                                        <h4 class="card-title text-white text-center">RÉCUPÉRER MON COMPTE</h4>
                                    </div>
                                    <div class="card-body-login p-4">
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

                                        <form class="form-horizontal cash-form"
                                            action="{{ url('/forgot/check')}}" method="POST" autocomplete="off">
                                            @csrf
                                            {{ csrf_field() }}

                                            <div class="mb-3">
                                                <label for="user_email" class="form-label">Email de récupération
                                                    : <span class="text-red">*</span></label>
                                                <input type="text"  class="form-control" name="user_email"
                                                    id="user_email" placeholder="Votre email de récupération" 
                                                    required="" >
                                                @error('password')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="mt-3 d-block text-center">
                                                <button class="btn primary-btn fw-bold waves-effect waves-light"
                                                    type="submit">Soumettre</button>
                                            </div>

                                            <div class="mt-2 text-center">
                                                <a href="{{ route('interface.register') }}"
                                                    class="text-muted"><span>Pas encore inscrit?</span>
                                                    <h5 class="create_count">Créer un compte</h5>
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
