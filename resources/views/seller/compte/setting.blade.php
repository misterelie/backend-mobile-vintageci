@extends('seller.partials.page')

@section('page')
<!-- Start of Main -->
<main class="main">
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0"> Mon compte </h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav mb-10 pb-1">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ url('/')}}">Accueil</a></li>
                <li>Compte client</li>
                <li>Tableau de bord</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    {{-- Account  Alert --}}
    @include('seller.partials.alert')

    <!-- Start of PageContent -->
    <div class="page-content pt-2">
        <div class="container">
            <div class="tab tab-vertical row gutter-lg">

                {{-- SideBar --}}
                @include('seller.partials.sidebar')


                <div class="tab-content mb-6">

                    {{-- Header --}}
                    @include('seller.partials.header')

                    <div class="tab-pane active mb-4 " id="account-details">
                        <div class="icon-box icon-box-side icon-box-light">
                            <span class="icon-box-icon icon-account mr-2">
                                <i class="w-icon-user"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title mb-0 ls-normal">Paramètres</h4>
                            </div>
                        </div>
                        <form class="form account-details-form" action="{{ url('setting/save',User::user())}} "
                            method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user_firstname">Nom *</label>
                                        <input type="text" id="user_firstname" name="user_firstname"
                                            class="form-control form-control-md"
                                            value="{{ User::user()->user_firstname }} ">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user_lastname">Prénom(s) *</label>
                                        <input type="text" id="user_lastname" name="user_lastname"
                                            class="form-control form-control-md"
                                            value=" {{ User::user()->user_lastname }}">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <label for="user_city">Commune</label>
                                    <select type="text" id="user_city" name="user_city"
                                        class="form-control form-control-md mb-0">
                                        <option value="">--Sélectionnez une commune--</option>
                                        @if(!is_null($communes))
                                        @foreach ($communes as $com)
                                        <option value="{{ Str::ucfirst($com->commune) }}" {{ Str::lower($com->commune)
                                            === Str::lower(User::user()->user_city) ? 'selected' : '' }}>
                                            {{Str::ucfirst($com->commune)}}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <label for="user_phone">Téléphone</label>
                                    <input type="text" id="user_phone" name="user_phone"
                                        class="form-control form-control-md" value=" {{ User::user()->user_phone }}">
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <label for="user_whatsapp">Contact Whatsapp </label>
                                    <input type="text" id="user_whatsapp" name="user_whatsapp"
                                        class="form-control form-control-md" value=" {{ User::user()->user_whatsapp }}">
                                </div>
                            </div>

                            <div class="from-group text-right">
                                <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Sauvegarder</button>
                            </div>

                        </form>


                        <form class="form account-details-form" action="{{ url('/resetPassword',User::user())}} "
                            method="POST">
                            @csrf


                            <h4 class="title title-password ls-25 font-weight-bold">Changer mon Mot de passe</h4>

                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Nouveau Mot de passe:<span class="text-danger">* </span>
                                    </label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" class="form-control" placeholder="Votre mot de passe"
                                            aria-label="Password" aria-describedby="password-addon" name="password"
                                            id="password">
                                        <button class="btn btn-light " type="button" id="toggle"><i
                                                class="fa fa-eye"></i></button>
                                    </div>
                                    @error('password')
                                    <span class="text-danger">
                                        {{$message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Confirmez le mot de passe:<span class="text-danger">*
                                        </span> </label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" class="form-control" placeholder="Confirmez"
                                            aria-label="Password" aria-describedby="password-addon"
                                            name="password_confirmation" id="password_confirmation">
                                        <button class="btn btn-light " type="button" id="toggleConfirm">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </div>
                                    @error('password_confirmation')
                                    <span class="text-danger">
                                        {{$message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Sauvegarder</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of PageContent -->


    <!-- End of PageContent -->
</main>
@endsection