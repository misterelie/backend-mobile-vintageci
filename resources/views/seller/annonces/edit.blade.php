<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>{{ $page_title}}</title>

    <meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
    <meta name="description" content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
    <meta name="author" content="D-THEMES">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    {{-- CSS files --}}
    {{-- File Upload Plugin --}}
    <link href=" {{ asset('front/assets/upload/jquery.growl.css')}} " rel="stylesheet" type="text/css">

    <link href=" {{ asset('front/assets/upload/fileup.min.css')}} " rel="stylesheet" type="text/css">
    @include('layouts/front/assets/css')

</head>

<body class="home">
    <div class="page-wrapper">
     
        {{-- Navbar --}}
        @include('layouts/front/includes/navbar')



        <!-- Start of Main -->
        <main class="main">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0"> Modifier l'annonce </h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav mb-10 pb-1">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/')}}">Accueil</a></li>
                        <li>Annonce</li>
                        <li>Modifier une annonce</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- End of Breadcrumb -->
            <div class="page-content">
                <div class="container mb-4">
                    <div class="row justify-content-center my-4">
                        <div class="col-lg-8 col-md-8 m-auto">

                            <h3 class="text-center">Mettez les informations à jour</h3>

                            <form action="{{ url('/annonces/update', $annonce)}} " method="post" enctype="multipart/form-data" id="updateForm">
                                @csrf

                                <input type="hidden" name="anonce_id" value="{{$annonce->id}}">

                                <div class="form-group mt-2">
                                    <label for="" class="form-control-label ">Titre de l'annonce:</label>
                                    <input type="text" id="titre" name="titre" class="form-control mt-2" value="{{ $annonce->titre}} ">
                                    @error('titre')
                                    <span class="text-danger">
                                        {{$message }}
                                    </span>
                                    @enderror

                                </div>
                                
                                {{-- Component --}}
                                <livewire:set-sous-category :annonce="$annonce" />

                                <div class="form-group mt-2">
                                    <label for="" class="form-control-label ">Commune:</label>

                                    {{ (old('commune')) }}
                                    <select name="commune" id="commune" class="form-control mt-2">
                                        <option value="">--Commune--</option>
                                       @if(!is_null($communes))
                                        @foreach($communes as $cm)
                                        <option value="{{ $cm->id}}" {{ ((int) trim($annonce->commune_id) === (int) trim($cm->id)) ? 'selected' : ''}}>{{ $cm->commune}}</option>
                                        @endforeach
                                       @endif
                                    </select>
                                    @error('commune')
                                    <span class="text-danger">
                                        {{$message }}
                                    </span>
                                    @enderror
                                </div>
                               

                                <div class="form-group mt-2">
                                    <label for="" class="form-control-label ">Prix de l'annonce:</label>
                                    <input name="prix" type="number" id="prix" class="form-control mt-2" value="{{ $annonce->prix }}">
                                    @error('prix')
                                    <span class="text-danger">
                                        {{$message }}
                                    </span>
                                    @enderror

                                </div>

                                <div class="row">
                                    <div class="col-dm-12 mb-4 ">
                                        <label for="" class="form-control-label  mb-4 ">Photos:</label>
                                    </div>

                                </div>


                                {{-- Photos Existantes --}}
                                @include('seller/annonces/photos')
                            


                                <div class="col-md-12">
                                    <div class="drop-row">
                                        {{-- Box item --}}
                                        <div class="drop-box">
                                            <div class="drop-zone {{ Helpers::border($annonce->photo_2)}} drop-on">
                                                <label for="photo_1" class="drop_label_1 drop-on">
                                                    <i class="fa fa-camera"></i>
                                                    <span class="d-block">{{ Helpers::findText($annonce->photo_1)}}</span>
                                                </label>
                                                <input type="file" name="photo_1" placeholder="Choose photo"
                                                    id="photo_1" class="drop-file-input" accept="image/*">
                                                <div class="box box_1 drop-off">
                                                    <span class="drop-remove">
                                                        <i class="fa fa-trash"></i>
                                                    </span>
                                                    <img id="drop_preview_1" src="{{ asset($annonce->cover_1)}} " alt="preview image"
                                                        class="drop-preview-zone ">
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Box item --}}
                                        <div class="drop-box">
                                            <div class="drop-zone {{ Helpers::border($annonce->photo_2)}} drop-on">
                                                <label for="photo_2" class="drop_label_2 drop-on">
                                                    <i class="fa fa-camera"></i>
                                                    <span class="d-block">{{ Helpers::findText($annonce->photo_2)}}</span>
                                                </label>
                                                <input type="file" name="photo_2" placeholder="Choose photo"
                                                    id="photo_2" class="drop-file-input" accept="image/*">

                                                <div class="box box_2 drop-off">
                                                    <span class="drop-remove">
                                                        <i class="fa fa-trash"></i>
                                                    </span>
                                                    <img id="drop_preview_2" src="" alt="preview image"
                                                        class="drop-preview-zone ">
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Box item --}}
                                        <div class="drop-box">
                                            <div class="drop-zone {{ Helpers::border($annonce->photo_3)}} drop-on">
                                                <label for="photo_3" class="drop_label_3 drop-on">
                                                    <i class="fa fa-camera"></i>
                                                    <span class="d-block">{{ Helpers::findText($annonce->photo_3)}}</span>
                                                </label>
                                                <input type="file" name="photo_3" placeholder="Choose photo"
                                                    id="photo_3" class="drop-file-input" accept="image/*">

                                                <div class="box box_3 drop-off">
                                                    <span class="drop-remove">
                                                        <i class="fa fa-trash"></i>
                                                    </span>
                                                    <img id="drop_preview_3" src="" alt="preview image"
                                                        class="drop-preview-zone ">
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Box item --}}
                                        <div class="drop-box">
                                            <div class="drop-zone {{ Helpers::border($annonce->photo_4)}} drop-on">
                                                <label for="photo_4" class="drop_label_4 drop-on">
                                                    <i class="fa fa-camera"></i>
                                                    <span class="d-block">{{ Helpers::findText($annonce->photo_4)}}</span>
                                                </label>
                                                <input type="file" name="photo_4" placeholder="Choose photo"
                                                    id="photo_4" class="drop-file-input" accept="image/*">

                                                <div class="box box_4 drop-off">
                                                    <span class="drop-remove">
                                                        <i class="fa fa-trash"></i>
                                                    </span>
                                                    <img id="drop_preview_4" src="" alt="preview image"
                                                        class="drop-preview-zone ">
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Box item --}}
                                        <div class="drop-box">
                                            <div class="drop-zone {{ Helpers::border($annonce->photo_5)}} drop-on">
                                                <label for="photo_5" class="drop_label_5 drop-on">
                                                    <i class="fa fa-camera"></i>
                                                    <span class="d-block">{{ Helpers::findText($annonce->photo_5)}}</span>
                                                </label>
                                                <input type="file" name="photo_5" placeholder="Choose photo"
                                                    id="photo_5" class="drop-file-input" accept="image/*">

                                                <div class="box box_5 drop-off">
                                                    <span class="drop-remove">
                                                        <i class="fa fa-trash"></i>
                                                    </span>
                                                    <img id="drop_preview_5" src="" alt="preview image"
                                                        class="drop-preview-zone ">
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Box item --}}
                                        <div class="drop-box">
                                            <div class="drop-zone {{ Helpers::border($annonce->photo_6)}} drop-on">
                                                <label for="photo_6" class="drop_label_6 drop-on">
                                                    <i class="fa fa-camera"></i>
                                                    <span class="d-block">{{ Helpers::findText($annonce->photo_6)}}</span>
                                                </label>
                                                <input type="file" name="photo_6" placeholder="Choose photo"
                                                    id="photo_6" class="drop-file-input" accept="image/*">

                                                <div class="box box_6 drop-off">
                                                    <span class="drop-remove">
                                                        <i class="fa fa-trash"></i>
                                                    </span>
                                                    <img id="drop_preview_6" src="" alt="preview image"
                                                        class="drop-preview-zone ">
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Box item --}}
                                        <div class="drop-box">
                                            <div class="drop-zone {{ Helpers::border($annonce->photo_7)}} drop-on">
                                                <label for="photo_7" class="drop_label_7 drop-on">
                                                    <i class="fa fa-camera"></i>
                                                    <span class="d-block">{{ Helpers::findText($annonce->photo_7)}}</span>
                                                </label>
                                                <input type="file" name="photo_7" placeholder="Choose photo"
                                                    id="photo_7" class="drop-file-input" accept="image/*">

                                                <div class="box box_7 drop-off">
                                                    <span class="drop-remove">
                                                        <i class="fa fa-trash"></i>
                                                    </span>
                                                    <img id="drop_preview_7" src="" alt="preview image"
                                                        class="drop-preview-zone ">
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Box item --}}
                                        <div class="drop-box">
                                            <div class="drop-zone {{ Helpers::border($annonce->photo_8)}} drop-on">
                                                <label for="photo_8" class="drop_label_8 drop-on">
                                                    <i class="fa fa-camera"></i>
                                                    <span class="d-block">{{ Helpers::findText($annonce->photo_8)}}</span>
                                                </label>
                                                <input type="file" name="photo_8" placeholder="Choose photo"
                                                    id="photo_8" class="drop-file-input" accept="image/*">

                                                <div class="box box_8 drop-off">
                                                    <span class="drop-remove">
                                                        <i class="fa fa-trash"></i>
                                                    </span>
                                                    <img id="drop_preview_8" src="" alt="preview image"
                                                        class="drop-preview-zone ">
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Box item --}}
                                        <div class="drop-box">
                                            <div class="drop-zone {{ Helpers::border($annonce->photo_9)}} drop-on">
                                                <label for="photo_9" class="drop_label_9 drop-on">
                                                    <i class="fa fa-camera"></i>
                                                    <span class="d-block">{{ Helpers::findText($annonce->photo_9)}}</span>
                                                </label>
                                                <input type="file" name="photo_9" placeholder="Choose photo"
                                                    id="photo_9" class="drop-file-input" accept="image/*">

                                                <div class="box box_9 drop-off">
                                                    <span class="drop-remove">
                                                        <i class="fa fa-trash"></i>
                                                    </span>
                                                    <img id="drop_preview_9" src="" alt="preview image"
                                                        class="drop-preview-zone ">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                   <div class="my-3">
                                    @error('photo_1')
                                    <span class="text-danger">
                                        {{$message }}
                                    </span>
                                    @enderror
                                   </div>
                                    
                                </div>

                                <div class="form-group mt-2">
                                    <label for="details" class="form-control-label ">Détails de l'annonce:</label>
                                    <textarea name="details" id="details" class="form-control summernote" rows="4" cols="30">{!! Helpers::encodeText($annonce->details) !!}</textarea>
                                    <small>Tapez la touche : <code>Entrée</code> Pour effectuer un retour à la ligne. </small>
                                    @error('details')
                                    <span class="text-danger">
                                        {{$message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-row text-end  mb-3 text-right py-4">
                                    <a href="{{ url('/account/mes-annonces')}} " class="btn btn-danger bg-danger " type="submit"><i class="fa fa-arrow-left"></i> Retour </a>
                                    <button class="btn btn-annonce br-3 " type="submit">Modifier l'annonce</button>
                                </div>

                            </form>

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

    @include('front/annonces/ajax/update')


</body>

</html>