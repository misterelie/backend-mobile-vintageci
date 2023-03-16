<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>{{ $page_title }}</title>

    <meta name="keywords"
        content="Vintage, vente, annonces, vends le, ancien, vêtements, vaisselles, electroniques, accessoires, informatiques, automobiles, immobilier, cuisine, ménagers, meubles, mobiliers," />
    <meta name="description"
        content="Plateforme N°1 de petites annonces en ligne en côte d'ivoires. Sur VINTAGE ALLO SERVIVE, vends tout des accessoires que tu utilises plus.">
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
                    <h1 class="page-title  mb-0"> {{ Helpers::pageTitle('faq') }} </h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav mb-10 pb-1">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">Accueil</a></li>
                        <li>FAQ</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->



            <div class="page-content">
                <div class="container">

                    <section class="customer-service mb-7">
                        <div class="row align-items-center justify-content-center">

                            <div class="col-md-10 col-lg-10 m-auto pr-lg-10 mb-8">
                                @if (!is_null($questions))
                                    @foreach ($questions as $row)
                                    <button class="accordion btn mb-3">{{Str::ucfirst($row->question)}}</button>
                                    <div class="panel mb-4">
                                        <p>{!! $row->reponse !!}</p>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </section>
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

    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;
        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                /* Toggle between hiding and showing the active panel */
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }
    </script>

</body>

</html>
