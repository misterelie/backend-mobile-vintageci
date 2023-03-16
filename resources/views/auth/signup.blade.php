<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>{{ $page_title}}</title>

    <meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
    <meta name="description" content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
    <meta name="author" content="D-THEMES">

    {{-- CSS files --}}
    @include('layouts/front/assets/css')

</head>

<body class="home">
    <div class="page-wrapper">
        <h1 class="d-none">Wolmart - Responsive Marketplace HTML Template</h1>
        {{-- Navbar --}}
        @include('layouts/front/includes/navbar')



        <!-- Start of Main -->
        <main class="main">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0"> Créer un compte </h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav mb-10 pb-1">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/')}}">Accueil</a></li>
                        <li>Compte client</li>
                        <li>Inscription</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

           <!-- End of Breadcrumb -->
           <div class="page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-7 m-auto">
                       
                            <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                                <ul class="nav nav-tabs text-uppercase" role="tablist">
                                    <li class="nav-item">
                                        <h4  class="title heading    mb-4">Inscrivez-vous</h4>
                                    </li>
                                    
                                </ul>




                                <div class="tab-content">
                                    <div class="tab-pane active" id="sign-in">
                                        
                                        <div class="col m-auto mb-4 pb-4">
                                            @if (Session::has('success'))
                                            <div class="alert alert-icon alert-success alert-bg alert-inline ">
                                                <h4 class="alert-title">
                                                    <i class="fas fa-check"></i>Réussite !</h4> {{ Session::get('success')}}.
                                            </div>
                                            @endif

                                            @if (Session::has('error'))
                                            <div class="alert alert-icon alert-error alert-bg alert-inline ">
                                                <h4 class="alert-title">
                                                    <i class="w-icon-times-circle"></i>Alerte !</h4> {{ Session::get('error')}}.
                                            </div>
                                            @endif
                                        </div>


                                        <form class="form-horizontal" action="{{url('post/register') }}" method="POST">
        
                                            {{-- CSRF --}}
                                            @csrf

                                            {{ csrf_field() }}
    
                                            <div class="row mb-3">
                                                <div class="col-sm-6 mb-2">
                                                   <label for="user_firstname" class="form-label">Nom:</label>
                                                    <input type="text" class="form-control" id="user_firstname" name="user_firstname" placeholder="Votre adresse nom de famille" value="{{ old('user_firstname')}} ">
                                                    @error('user_firstname')
                                                            <span class="text-danger">
                                                                {{$message }}
                                                            </span> 
                                                        @enderror
                                                </div>
    
                                                <div class="col-sm-6 mb-2">
                                                    <label for="user_lastname" class="form-label">Prénom(s):</label>
                                                     <input type="text" class="form-control" id="user_lastname" name="user_lastname" placeholder="Votre adresse prénom(s)" value="{{ old('user_lastname')}} ">
                                                        @error('user_lastname')
                                                            <span class="text-danger">
                                                                {{$message }}
                                                            </span> 
                                                        @enderror
                                                 </div>
                                            </div>
    
    
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Adresse Email:</label>
                                                <input type="text" class="form-control" id="email" name="user_email" placeholder="Votre adresse email" value="{{ old('user_email')}} ">
                                                @error('user_email')
                                                    <span class="text-danger">
                                                        {{$message }}
                                                    </span> 
                                                @enderror
                                            </div>
                    
                                            <div class="row">
                                                <div class="col-sm-6 mb-3">
                                                    <label class="form-label">Mo de passe:</label>
                                                    <div class="input-group auth-pass-inputgroup">
                                                        <input type="password" class="form-control" placeholder="Votre mot de passe" aria-label="Password" aria-describedby="password-addon" name="password">
                                                        <button class="btn btn-light " type="button" id="password-addon"><i class="fa fa-eye"></i></button>
                                                    </div>
                                                    @error('password')
                                                        <span class="text-danger">
                                                            {{$message }}
                                                        </span> 
                                                    @enderror
                                                </div>
    
                                                <div class="col-sm-6 mb-3">
                                                    <label class="form-label">Confirmez le mot de passe:</label>
                                                    <div class="input-group auth-pass-inputgroup">
                                                        <input type="password" class="form-control" placeholder="Confirmez" aria-label="Password" aria-describedby="password-addon" name="password_confirmation">
                                                        <button class="btn btn-light " type="button" id="password-addon"><i class="fa fa-eye"></i></button>
                                                    </div>
                                                    @error('password_confirmation')
                                                        <span class="text-danger">
                                                            {{$message }}
                                                        </span> 
                                                    @enderror
                                                </div>
                                            </div>
    
                                            <div class="form-group text-right mt-3 d-grid">
                                                <button class="btn btn-annonce br-3 waves-effect waves-light" type="submit">S'inscrire</button>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                              
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>

            <!-- End of PageContent -->
        </main>
        <!-- End of Main -->

        <!-- Start of Footer -->
        @include('layouts/front/includes/footer')
        <!-- End of Footer -->
    </div>
    <!-- End of Page-wrapper-->




    {{-- CSS files --}}
    @include('layouts/front/assets/js')

</body>

</html>