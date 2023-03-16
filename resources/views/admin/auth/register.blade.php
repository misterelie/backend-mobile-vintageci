<!doctype html>
<html lang="en">
<head>
        
        <meta charset="utf-8" />
        <title>{{ $page_title}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        @include('layouts/admin/assets/css')

    </head>

    <body>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Créez un compte</h5>
                                            <p>Inscrivez-vous pour continuer</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="{{ asset('back/assets/images/profile-img.png') }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 


                                <div class="auth-logo">
                                    <a href="{{ url('/')}}" class="auth-logo-light">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{ asset('back/assets/images/logo-light.svg')}} " alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>

                                    <a href="{{ url('/') }}" class="auth-logo-dark">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{ asset('back/assets/images/logo.svg')}} " alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>

                                <div class="p-2">
                                    <form class="form-horizontal" action="{{url('post/register') }}" method="POST">
        
                                        {{-- CSRF --}}
                                        @csrf

                                        <div class="row mb-3">
                                            <div class="col-sm-6 mb-2">
                                               <label for="user_firstname" class="form-label">Nom:</label>
                                                <input type="text" class="form-control" id="user_firstname" name="user_firstname" placeholder="Votre adresse nom de famille">
                                                @error('user_firstname')
                                                        <span class="text-danger">
                                                            {{$message }}
                                                        </span> 
                                                    @enderror
                                            </div>

                                            <div class="col-sm-6 mb-2">
                                                <label for="user_lastname" class="form-label">Prénom(s):</label>
                                                 <input type="text" class="form-control" id="user_lastname" name="user_lastname" placeholder="Votre adresse prénom(s)">
                                                    @error('user_lastname')
                                                        <span class="text-danger">
                                                            {{$message }}
                                                        </span> 
                                                    @enderror
                                             </div>
                                        </div>


                                        <div class="mb-3">
                                            <label for="email" class="form-label">Adresse Email:</label>
                                            <input type="text" class="form-control" id="email" name="user_email" placeholder="Votre adresse email">
                                            @error('user_email')
                                                <span class="text-danger">
                                                    {{$message }}
                                                </span> 
                                            @enderror
                                        </div>
                
                                        <div class="mb-3">
                                            <label class="form-label">Mo de passe:</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" placeholder="Votre mot de passe" aria-label="Password" aria-describedby="password-addon" name="user_password">
                                                <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                            @error('user_password')
                                                <span class="text-danger">
                                                    {{$message }}
                                                </span> 
                                            @enderror
                                        </div>

                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">S'inscrire</button>
                                        </div>
                                    </form>
                                </div>
            
                            </div>
                        </div>
                       

                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->

        <!-- JAVASCRIPT -->
        @include('layouts/admin/assets/js')
    </body>
</html>
