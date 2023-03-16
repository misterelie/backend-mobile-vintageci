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
    <style>
        .dropzone {
            background-color: #ccc;
            border: 3px dashed #888;
            width: 350px;
            height: 150px;
            border-radius: 25px;
            font-size: 20px;
            color: #777;
            padding-top: 50px;
            text-align: center;
        }

        .dropzone.over {
            opacity: .7;
            border-style: solid;
        }

        #dropzone .dropzone {
            margin-top: 25px;
            padding-top: 60px;
        }
    </style>
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
                    <h1 class="page-title mb-0"> Publier une annonce </h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav mb-10 pb-1">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/')}}">Accueil</a></li>
                        <li>Annonce</li>
                        <li>Publier une annonce</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- End of Breadcrumb -->
            <div class="page-content">
                <div class="container mb-4">
                    <div class="row justify-content-center my-4">
                        <div class="col-lg-8 col-md-8 m-auto">

                            <h3 class="text-center">Publier votre annonce</h3>

                            <form action="{{ url('/annonces/store')}} " method="post" enctype="multipart/form-data" id="image_upload">
                              
                                <div class="form-group">
                                    <!-- Error -->
                                    <div class='alert alert-danger mt-2 d-none text-danger' id="error_file"></div>
                                </div>


                                {{-- Alert Message --}}
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

                                <div class="form-group mt-2">
                                    <label for="" class="form-control-label ">Titre de l'annonce:</label>
                                    <input type="text" id="titre" name="titre" class="form-control mt-2" value=" {{ old("titre")}} ">
                                    @error('titre')
                                    <span class="text-danger">
                                        {{$message }}
                                    </span>
                                    @enderror

                                </div>
                                
                                {{-- Component --}}
                                <livewire:get-sous-category/>

                                <div class="form-group mt-2">
                                    <label for="" class="form-control-label ">Commune:</label>

                                    {{ (old('commune')) }}
                                    <select name="commune" id="commune" class="form-control mt-2">
                                        <option value="">--Commune--</option>
                                       @if(!is_null($communes))
                                        @foreach($communes as $cm)
                                        <option value="{{ $cm->id}}" {{ !is_null(old("commune")) ? 'selected' : ''}}>{{ Str::ucfirst($cm->commune)}}</option>
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
                                    <input name="prix" type="number" id="prix" class="form-control mt-2" value="{{ old("prix") }}">
                                    @error('prix')
                                    <span class="text-danger">
                                        {{$message }}
                                    </span>
                                    @enderror

                                </div>

                                <div class="row">
                                    <div class="col-dm-12 mt-2">
                                        <label for="" class="form-control-label mt-4 mb-4 ">Photos:</label>
                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <div class="drop-row">
                                        {{-- Box item --}}
                                        <div class="drop-box">
                                            <div class="drop-zone drop-on">
                                                <label for="photo_1" class="drop_label_1 drop-on">
                                                    <i class="fa fa-camera"></i>
                                                    <span class="d-block">Ajouter</span>
                                                </label>
                                                <input type="file" name="photo_1" placeholder="Choose photo"
                                                    id="photo_1" class="drop-file-input" accept="image/*">
                                                <input type="hidden" name="hidden_photo_1" id="_photo_1" value="">

                                                <div class="box box_1 drop-off">
                                                    <span class="drop-remove">
                                                        <i class="fa fa-trash"></i>
                                                    </span>
                                                    <img id="drop_preview_1" src="" alt="preview image" class="drop-preview-zone ">
                                                    <span class="status">
                                                        <i class="icon fa "></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Box item --}}
                                        <div class="drop-box">
                                            <div class="drop-zone drop-on">
                                                <label for="photo_2" class="drop_label_2 drop-on">
                                                    <i class="fa fa-camera"></i>
                                                    <span class="d-block">Ajouter</span>
                                                </label>
                                                <input type="file" name="photo_2" placeholder="Choose photo"
                                                    id="photo_2" class="drop-file-input" accept="image/*">
                                                    <input type="hidden" name="hidden_photo_2" id="_photo_2" value="">

                                                <div class="box box_2 drop-off">
                                                    <span class="drop-remove">
                                                        <i class="fa fa-trash"></i>
                                                    </span>
                                                    <img id="drop_preview_2" src="" alt="preview image"
                                                        class="drop-preview-zone ">
                                                        <span class="status">
                                                            <i class="icon fa "></i>
                                                        </span>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Box item --}}
                                        <div class="drop-box">
                                            <div class="drop-zone drop-on">
                                                <label for="photo_3" class="drop_label_3 drop-on">
                                                    <i class="fa fa-camera"></i>
                                                    <span class="d-block">Ajouter</span>
                                                </label>
                                                <input type="file" name="photo_3" placeholder="Choose photo"
                                                    id="photo_3" class="drop-file-input" accept="image/*">
                                                    <input type="hidden" name="hidden_photo_4" id="_photo_3" value="">

                                                <div class="box box_3 drop-off">
                                                    <span class="drop-remove">
                                                        <i class="fa fa-trash"></i>
                                                    </span>
                                                    <img id="drop_preview_3" src="" alt="preview image"
                                                        class="drop-preview-zone ">
                                                        <span class="status">
                                                            <i class="icon fa "></i>
                                                        </span>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Box item --}}
                                        <div class="drop-box">
                                            <div class="drop-zone drop-on">
                                                <label for="photo_4" class="drop_label_4 drop-on">
                                                    <i class="fa fa-camera"></i>
                                                    <span class="d-block">Ajouter</span>
                                                </label>
                                                <input type="file" name="photo_4" placeholder="Choose photo"
                                                    id="photo_4" class="drop-file-input" accept="image/*">
                                                    <input type="hidden" name="hidden_photo_5" id="_photo_4" value="">

                                                <div class="box box_4 drop-off">
                                                    <span class="drop-remove">
                                                        <i class="fa fa-trash"></i>
                                                    </span>
                                                    <img id="drop_preview_4" src="" alt="preview image"
                                                        class="drop-preview-zone ">
                                                        <span class="status">
                                                            <i class="icon fa "></i>
                                                        </span>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Box item --}}
                                        <div class="drop-box">
                                            <div class="drop-zone drop-on">
                                                <label for="photo_5" class="drop_label_5 drop-on">
                                                    <i class="fa fa-camera"></i>
                                                    <span class="d-block">Ajouter</span>
                                                </label>
                                                <input type="file" name="photo_5" placeholder="Choose photo"
                                                    id="photo_5" class="drop-file-input" accept="image/*">
                                                    <input type="hidden" name="hidden_photo_5" id="_photo_5" value="">

                                                <div class="box box_5 drop-off">
                                                    <span class="drop-remove">
                                                        <i class="fa fa-trash"></i>
                                                    </span>
                                                    <img id="drop_preview_5" src="" alt="preview image"
                                                        class="drop-preview-zone ">
                                                        <span class="status">
                                                            <i class="icon fa "></i>
                                                        </span>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Box item --}}
                                        <div class="drop-box">
                                            <div class="drop-zone drop-on">
                                                <label for="photo_6" class="drop_label_6 drop-on">
                                                    <i class="fa fa-camera"></i>
                                                    <span class="d-block">Ajouter</span>
                                                </label>
                                                <input type="file" name="photo_6" placeholder="Choose photo"
                                                    id="photo_6" class="drop-file-input" accept="image/*">
                                                    <input type="hidden" name="hidden_photo_6" id="_photo_6" value="">

                                                <div class="box box_6 drop-off">
                                                    <span class="drop-remove">
                                                        <i class="fa fa-trash"></i>
                                                    </span>
                                                    <img id="drop_preview_6" src="" alt="preview image"
                                                        class="drop-preview-zone ">
                                                        <span class="status">
                                                            <i class="icon fa "></i>
                                                        </span>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Box item --}}
                                        <div class="drop-box">
                                            <div class="drop-zone drop-on">
                                                <label for="photo_7" class="drop_label_7 drop-on">
                                                    <i class="fa fa-camera"></i>
                                                    <span class="d-block">Ajouter</span>
                                                </label>
                                                <input type="file" name="photo_7" placeholder="Choose photo"
                                                    id="photo_7" class="drop-file-input" accept="image/*">
                                                    <input type="hidden" name="hidden_photo_7" id="_photo_7" value="">

                                                <div class="box box_7 drop-off">
                                                    <span class="drop-remove">
                                                        <i class="fa fa-trash"></i>
                                                    </span>
                                                    <img id="drop_preview_7" src="" alt="preview image"
                                                        class="drop-preview-zone ">
                                                        <span class="status">
                                                            <i class="icon fa "></i>
                                                        </span>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Box item --}}
                                        <div class="drop-box">
                                            <div class="drop-zone drop-on">
                                                <label for="photo_8" class="drop_label_8 drop-on">
                                                    <i class="fa fa-camera"></i>
                                                    <span class="d-block">Ajouter</span>
                                                </label>
                                                <input type="file" name="photo_8" placeholder="Choose photo"
                                                    id="photo_8" class="drop-file-input" accept="image/*">
                                                    <input type="hidden" name="hidden_photo_8" id="_photo_8" value="">

                                                <div class="box box_8 drop-off">
                                                    <span class="drop-remove">
                                                        <i class="fa fa-trash"></i>
                                                    </span>
                                                    <img id="drop_preview_8" src="" alt="preview image"
                                                        class="drop-preview-zone ">
                                                        <span class="status">
                                                            <i class="icon fa "></i>
                                                        </span>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Box item --}}
                                        <div class="drop-box">
                                            <div class="drop-zone drop-on">
                                                <label for="photo_9" class="drop_label_9 drop-on">
                                                    <i class="fa fa-camera"></i>
                                                    <span class="d-block">Ajouter</span>
                                                </label>
                                                <input type="file" name="photo_9" placeholder="Choose photo"
                                                    id="photo_9" class="drop-file-input" accept="image/*">
                                                    <input type="hidden" name="hidden_photo_9" id="_photo_9" value="">

                                                <div class="box box_9 drop-off">
                                                    <span class="drop-remove">
                                                        <i class="fa fa-trash"></i>
                                                    </span>
                                                    <img id="drop_preview_9" src="" alt="preview image"
                                                        class="drop-preview-zone ">
                                                        <span class="status">
                                                            <i class="icon fa "></i>
                                                        </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                   <div class="mb-3">
                                    @error('photo_1')
                                    <span class="text-danger">
                                        {{$message }}
                                    </span>
                                    @enderror
                                   </div>
                                    
                                </div>

                                <div class="form-group mt-2">
                                    <label for="details" class="form-control-label">Détails de l'annonce:</label>
                                    <textarea name="details" id="details" class="form-control mt-2 summernote" rows="3" cols="30" placeholder="Détails de l'annonce">
                                        {{ old("details")}}
                                    </textarea>
                                    <small>Tapez la touche : <code>Entrée</code> Pour effectuer un retour à la ligne. </small>
                                    @error('details')
                                    <span class="text-danger">
                                        {{$message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group text-end mt-2 mb-3 text-right py-4">
                                    <button class="btn btn-annonce br-3 mt-4" type="submit">Publier l'annonce</button>
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
    @include('front/annonces/ajax/store')


    

</body>

</html>