<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $page_title}}</title>
    <meta content="" name="Imprimerie spécialisée dans l'impression numérique">
    <meta content="" name="Imprimerie, Design, Infographie">

    {{-- CSS FILES --}}
    @include('site/layouts/assets/css')

</head>

<body>

    <!-- ======= TOP BAR ======= -->
    @include('site/layouts/includes/topbar')

    <!-- ======= HEADER ======= -->
    @include('site/layouts/includes/navbar')
    <!-- FIN HEADER -->

    <!-- ======= BLOC SLIDER ======= -->
    <section id="services" class="services" style="margin-top: 47px;">
        <div class="container">

            <div class="row">
                @if(!is_null($article->banner))
                <div class="col-lg-12 col-md-12">
                    <img src="{{ asset('storage/'.$article->banner)}} " style="width:100%" />
                </div>
                @endif
            </div>

        </div>
    </section>
    <!-- FIN BLOC SERVICE -->

    <!-- ======= PRESENTATION DE LA PRESTATION ======= -->
    <section id="counts" class="counts">
        <div class="container">

            <div class="section-title">
                <h2 class="text-uppercase">{{ $article->titre}}</h2>
            </div>

            <div class="row">
                <p style="font-size: 25px; font-weight: bold; color:#cb0000">
                    {{ !is_null($article->sous_titre) ? $article->sous_titre : null}}
                </p>

                <div class="text-justify" style="font-size: 25px;">
                    {!! !is_null($article->details) ? $article->details : null !!}
                </div>

            </div>

        </div>
    </section>

    @if (!is_null($article->offres))
    <section id="counts" class="counts">
        <div class="container">

            <div class="section-title">
                <h2>Nos offres {{$article->titre }}</h2>
            </div>

            <div class="row" style="background-color: #cb0000; padding:25px; text-align: center;">

                @foreach ($article->offres as $of)
                <div class="col-lg-6 col-md-6">
                    <div class="bloc-offres ">
                        <p class="text-center"> 
                            <span class="titre-offres">
                               {{ $of->titre}}
                            </span>
                        </p>
                        <center>
                            <hr style="width:70%; position: center;">
                            </hr>
                        </center>
                        <p class="text-left">
                            @if(!is_null($of->lib_1))
                            <strong>{{$of->lib_1 }}:</strong>&nbsp;&nbsp; {{$of->val_1 }} <br />
                            @endif
                            @if(!is_null($of->lib_2))
                            <strong>{{$of->lib_2 }}:</strong>&nbsp;&nbsp; {{$of->val_2 }} <br />
                            @endif
                            @if(!is_null($of->lib_3))
                            <strong>{{$of->lib_3 }}:</strong>&nbsp;&nbsp; {{$of->val_3 }} <br />
                            @endif
                            @if(!is_null($of->lib_4))
                            <strong>{{$of->lib_4 }}:</strong>&nbsp;&nbsp; {{$of->val_4 }} <br />
                            @endif
                            @if(!is_null($of->lib_5))
                            <strong>{{$of->lib_5 }}:</strong>&nbsp;&nbsp; {{$of->val_5 }} <br />
                            @endif
                            @if(!is_null($of->lib_6))
                            <strong>{{$of->lib_6 }}:</strong>&nbsp;&nbsp; {{$of->val_6 }} <br />
                            @endif
                        </p>
                        <p style="margin-bottom: 40px;">
                            <span class="prix-offres">
                                Prix: {{ Helpers::moneyFormat($of->prix)}} Fcfa
                            </span>
                        </p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    @endif


    <!-- FIN DU BLOC -->


    <!-- ======= Footer ======= -->
    <!-- ======= Footer ======= -->
    @include('site/layouts/includes/footer')
    <!-- End Footer -->

    {{-- JS FILES --}}
    @include('site/layouts/assets/js')

</body>

</html>