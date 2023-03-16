<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>{{ $page_title}}</title>

    <meta name="keywords" content="Vintage, vente, annonces, vends le, ancien, vêtements, vaisselles, electroniques, accessoires, informatiques, automobiles, immobilier, cuisine, ménagers, meubles, mobiliers," />
    <meta name="description" content="Plateforme N°1 de petites annonces en ligne en côte d'ivoires. Sur VINTAGE ALLO SERVIVE, vends tout des accessoires que tu utilises plus.">
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
                    <h1 class="page-title mb-0">{{ Helpers::pageTitle('contact')}}</h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav mb-10 pb-1">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/')}}">Accueil</a></li>
                        <li>Contactez-nous</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of PageContent -->
            <div class="page-content contact-us">
                <div class="container">
                  
                    <!-- End of Contact Title Section -->

                    <section class="contact-information-section mb-10">
                        <div class=" swiper-container swiper-theme " data-swiper-options="{
                            'spaceBetween': 20,
                            'slidesPerView': 1,
                            'breakpoints': {
                                '480': {
                                    'slidesPerView': 2
                                },
                                '768': {
                                    'slidesPerView': 3
                                },
                                '992': {
                                    'slidesPerView': 4
                                }
                            }
                        }">
                            <div class="swiper-wrapper row justify-content-center text-center cols-xl-4 cols-md-4 cols-sm-2 cols-1">
                                <div class="swiper-slide icon-box text-center icon-box-primary">
                                    <span class="icon-box-icon icon-email">
                                        <i class="w-icon-envelop-closed"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title">
                                            {{ !is_null($adresse) ? $adresse->email_label : null}}     
                                        </h4>
                                        <p>{{ !is_null($adresse) ? $adresse->email_one : null}} </p>
                                        {{-- <p>{{ !is_null($adresse) ? $adresse->email_two : null}} </p> --}}
                                    </div>
                                </div>
                                <div class="swiper-slide icon-box text-center icon-box-primary">
                                    <span class="icon-box-icon icon-headphone">
                                        <i class="w-icon-headphone"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title">
                                            {{ !is_null($adresse) ? $adresse->phone_label : null}}     
                                            :</h4>
                                        <p>{{ !is_null($adresse) ? $adresse->phone_one : null}} </p>
                                        {{-- <p>{{ !is_null($adresse) ? $adresse->phone_two : null}} </p> --}}
                                    </div>
                                </div>
                                <div class="swiper-slide icon-box text-center icon-box-primary">
                                    <span class="icon-box-icon icon-map-marker">
                                        <i class="w-icon-map-marker"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title"> {{ !is_null($adresse) ? $adresse->adresse_label : null}}     :</h4>
                                        <p>{{ !is_null($adresse) ? $adresse->adresse : null}} </p>
                                      
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </section>
                    <!-- End of Contact Information section -->

                    <hr class="divider mb-10 pb-1">

                    <section class="contact-section">
                        <div class="row gutter-lg pb-3 pb-4 my-4 justify-content-center">
                            
                            <div class="col-lg-8 m-auto mb-4">
                                <h4 class="title mb-3">Laissez-nous un message</h4>
                                <form class="form contact-us-form" action="{{ url('/contact/store') }}" method="post">

                                    @csrf

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

                                    <div class="form-group">
                                        <label for="nom">Votre nom:</label>
                                        <input type="text" id="nom" name="nom"
                                            class="form-control" value="{{old('nom') }}">
                                            @error('nom')<span class="text-danger">{{$message }}</span>@enderror
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-6 mb-3">
                                            <label for="email">Votre adresse Email</label>
                                            <input type="email" id="email" name="email"
                                                class="form-control" value="{{old('email') }}">
                                                @error('email')<span class="text-danger">{{$message }}</span>@enderror
                                        </div>
    
                                        <div class="col-sm-6 mb-3">
                                            <label for="objet">Objet du messsage:</label>
                                            <input type="text" id="objet" name="objet"
                                                class="form-control" value="{{old('objet') }}">
                                                @error('objet')<span class="text-danger">{{$message }}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="message">Votre message:</label>
                                        <textarea id="message" name="message" cols="30" rows="5" class="form-control">{{old('message') }} </textarea>
                                        @error('message')<span class="text-danger">{{$message }}</span>@enderror
                                    </div>

                                    <div class="form-group text-right mb-4">
                                        <button type="submit" class="btn btn-dark btn-rounded">Envoyer le message</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </section>
                    <!-- End of Contact Section -->
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