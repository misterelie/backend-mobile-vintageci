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
        {{-- Navbar --}}
        @include('layouts/front/includes/navbar')



        <!-- Start of Main -->
        <main class="main">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0">{{ Helpers::pageTitle('pricing')}}</h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav mb-10 pb-1">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/')}}">Accueil</a></li>
                        <li>Crédits</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of PageContent -->
            <div class="page-content3">


                <div class="container">

                    <h2 class="title justify-content-center ls-normal mb-4 mt-10 pt-15 ">
                        Choisissez votre formule
                    </h2>
                    <!-- End of Contact Section -->

                    <div class="pricing-plan">

                        {{-- Start --}}

                        @if(!is_null($credits))
                        <div id="pricing">
                            @php $ord = 0; @endphp

                            @foreach($credits as $cre)

                            @php $ord ++ ; @endphp
                            {{-- Item --}}
                            <div class="price_card {{ $ord === 2 ? 'featured' : null }}">
                               
                                <div class="header" style="background: {!! $cre->couleur !!} ">
                                    <span class="price">{{ Helpers::moneyFormat($cre->montant) }} <sup>F CFA</sup></span>
                                    <span class="name">{{ $cre->title }}</span>
                                </div>

                                <div class="pricing-body text-center">
                                    @if($cre->bonus != 0)
                                    <span class="sign">+</span> 
                                    <span class="bonus">{{ Helpers::moneyFormat($cre->bonus) }} </span>
                                    <span class="indicator"><sup>F CFA</sup>&nbsp; en bonus </span>
                                    @endif
                                </div>
                                
                                <a href="{{ url('/purchase/credit?buy_credit='.$cre->slug)}} " class="pricing-btn btn " style="background: {!! $cre->couleur !!} ">Sélectionner</a>
                            </div>
                            {{-- End pricing card --}}
                            @endforeach

                        </div>

                        @endif




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