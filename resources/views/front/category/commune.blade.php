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
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav mb-3 mt-2">
                <div class="container">
                    <ul class="breadcrumb bb-no">
                        <li><a href="{{ url('/')}}">Accueil</a></li>
                        <li><a href="{{ url('/annonces/categories')}}">Toutes les communes</a></li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Page Content -->
            <div class="page-content mb-10 mt-4">

                
            {{-- Catégories section --}}
            <section class="category-section top-category bg-grey pt-10 pb-10 appear-animate">
                <div class="container pb-2">

                    <h2 class="title justify-content-center pt-1 ls-normal mb-5">Annonces par commune </h2>

                    <div class="product-wrapper row cols-xl-6 cols-sm-1 cols-xs-6 cols-1 mt-4 pb-3 w-100 position-relative">


                        @if(!is_null($communes))
                            @foreach($communes as $c)

                                <div class="w-90 " style="margin: 1.5px 0px; position: relative">
                                    <div class="more btn  btn-outline-black active-underline card-white"  style="margin: 5px 1px; width: 100%; position: relative">
                                       <a href="{{ url('/communes', [Helpers::filterstring($c->commune),$c->id])}}" class="link text-hover-white ">
                                        {{ $c->commune}} ({{$c->annonces->count()}}) &nbsp;
                                       </a>
                                        {{-- <i class="fa fa-arrow-right"></i> --}}
                                    </div>
                                    
                                </div>

                            @endforeach
                        @endif

                    </div>


                </div>
            </section>
            <!-- End of .category-section top-category -->
              
            </div>
            <!-- End of Page Content -->
        </main>


        <!-- Start of Footer -->
        @include('layouts/front/includes/footer')
        <!-- End of Footer -->
    </div>
    <!-- End of Page-wrapper-->


    {{-- CSS files --}}
    @include('layouts/front/assets/js')

</body>

</html>