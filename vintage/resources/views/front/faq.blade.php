<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>{{ $page_title}}</title>

    <meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
    <meta name="description"
        content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
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
                    <h1 class="page-title mb-0"> Question fréquentes </h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav mb-10 pb-1">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/')}}">Accueil</a></li>
                        <li>FAQ</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

             <!-- Start of PageContent -->
             <div class="page-content faq">
                <div class="container">
                    <section class="content-title-section">
                        <h3 class="title title-simple justify-content-center bb-no pb-0">Questions posées fréquemment
                        </h3>
                        <p class="description text-center">Trouvez la réponse à votre préoccupation sur des problèmes communs. </p>
                    </section>

                    <section class="mb-6">
                        <h4 class="title title-center mb-5">Comment publier une annonce</h4>
                        <div class="row">
                            <div class="col-md-6 mb-8">
                                <div class="accordion accordion-bg accordion-gutter-md accordion-border">
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#collapse1-1" class="collapsed">lorem ipsum dolor sum ? </a>
                                        </div>
                                        <div id="collapse1-1" class="card-body collapsed">
                                            <p class="mb-0">Fringilla urna porttitor rhoncus dolor purus. Luctus venenatis lectus  semper bibendum
                                                Diam maecenas ultricies mi eget mauris. Nibh tellus molestie nunc non isse faucibus 
                                                Ultrices eros in cursus turpis massa tincidunt. Ante in nibh mauri eger enim neque volu
                                                lectus. Etiam non quam lacus suspendisse faucibus.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#collapse1-2" class="expand">How Long Will it Take to Get My Package?</a>
                                        </div>
                                        <div id="collapse1-2" class="card-body collapsed">
                                            <p class="mb-0">Fringilla urna porttitor rhoncus dolor purus. Luctus venenatis lectus  semper bibendum
                                                Diam maecenas ultricies mi eget mauris. Nibh tellus molestie nunc non isse faucibus 
                                                Ultrices eros in cursus turpis massa tincidunt. Ante in nibh mauri eger enim neque volu
                                                lectus. Etiam non quam lacus suspendisse faucibus.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-8">
                                <div class="accordion accordion-bg accordion-gutter-md accordion-border">
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#collapse1-3" class="collapse">Do You Ship Internationally?</a>
                                        </div>
                                        <div id="collapse1-3" class="card-body collapsed">
                                            <p class="mb-0">Fringilla urna porttitor rhoncus dolor purus. Luctus venenatis lectus  semper bibendum
                                                Diam maecenas ultricies mi eget mauris. Nibh tellus molestie nunc non isse faucibus 
                                                Ultrices eros in cursus turpis massa tincidunt. Ante in nibh mauri eger enim neque volu
                                                lectus. Etiam non quam lacus suspendisse faucibus.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#collapse1-4" class="expand">What Shipping Methods are Available?</a>
                                        </div>
                                        <div id="collapse1-4" class="card-body collapsed">
                                            <p class="mb-0">Fringilla urna porttitor rhoncus dolor purus. Luctus venenatis lectus  semper bibendum
                                                Diam maecenas ultricies mi eget mauris. Nibh tellus molestie nunc non isse faucibus 
                                                Ultrices eros in cursus turpis massa tincidunt. Ante in nibh mauri eger enim neque volu
                                                lectus. Etiam non quam lacus suspendisse faucibus.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </section>

                    <section class="mb-10">
                        <h4 class="title title-center mb-5"> Mode de règlement </h4>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="accordion accordion-bg accordion-gutter-md accordion-border">
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#collapse2-1" class="collapse">What Payment Methods are Accepted?</a>
                                        </div>
                                        <div id="collapse2-1" class="card-body collapsed">
                                            <p class="mb-0">Fringilla urna porttitor rhoncus dolor purus. Luctus venenatis lectus  semper bibendum
                                                Diam maecenas ultricies mi eget mauris. Nibh tellus molestie nunc non isse faucibus 
                                                Ultrices eros in cursus turpis massa tincidunt. Ante in nibh mauri eger enim neque volu
                                                lectus. Etiam non quam lacus suspendisse faucibus.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="accordion accordion-bg accordion-gutter-md accordion-border">
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#collapse2-2" class="collapse">Is Buying On-Line Safe?</a>
                                        </div>
                                        <div id="collapse2-2" class="card-body collapsed">
                                            <p class="mb-0">Fringilla urna porttitor rhoncus dolor purus. Luctus venenatis lectus  semper bibendum
                                                Diam maecenas ultricies mi eget mauris. Nibh tellus molestie nunc non isse faucibus 
                                                Ultrices eros in cursus turpis massa tincidunt. Ante in nibh mauri eger enim neque volu
                                                lectus. Etiam non quam lacus suspendisse faucibus.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </section>

                    <section class="mb-10">
                        <h4 class="title title-center mb-5">Réclamations </h4>
                        <div class="row">
                            <div class="col-md-6 mb-8">
                                <div class="accordion accordion-bg accordion-gutter-md accordion-border">
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#collapse3-1" class="collapse">How do I Place an Order?</a>
                                        </div>
                                        <div id="collapse3-1" class="card-body collapsed">
                                            <p class="mb-0">Fringilla urna porttitor rhoncus dolor purus. Luctus venenatis lectus  semper bibendum
                                                Diam maecenas ultricies mi eget mauris. Nibh tellus molestie nunc non isse faucibus 
                                                Ultrices eros in cursus turpis massa tincidunt. Ante in nibh mauri eger enim neque volu
                                                lectus. Etiam non quam lacus suspendisse faucibus.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#collapse3-3" class="expand">Do I Need an Account to Place an Order?</a>
                                        </div>
                                        <div id="collapse3-3" class="card-body collapsed">
                                            <p class="mb-0">Fringilla urna porttitor rhoncus dolor purus. Luctus venenatis lectus  semper bibendum
                                                Diam maecenas ultricies mi eget mauris. Nibh tellus molestie nunc non isse faucibus 
                                                Ultrices eros in cursus turpis massa tincidunt. Ante in nibh mauri eger enim neque volu
                                                lectus. Etiam non quam lacus suspendisse faucibus.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#collapse3-5" class="expand">How Can I Return a Product?</a>
                                        </div>
                                        <div id="collapse3-5" class="card-body collapsed">
                                            <p class="mb-0">Fringilla urna porttitor rhoncus dolor purus. Luctus venenatis lectus  semper bibendum
                                                Diam maecenas ultricies mi eget mauris. Nibh tellus molestie nunc non isse faucibus 
                                                Ultrices eros in cursus turpis massa tincidunt. Ante in nibh mauri eger enim neque volu
                                                lectus. Etiam non quam lacus suspendisse faucibus.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-8">
                                <div class="accordion accordion-bg accordion-gutter-md accordion-border">
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#collapse3-2" class="collapse">How Can I or Change My Order?</a>
                                        </div>
                                        <div id="collapse3-2" class="card-body collapsed">
                                            <p class="mb-0">Fringilla urna porttitor rhoncus dolor purus. Luctus venenatis lectus  semper bibendum
                                                Diam maecenas ultricies mi eget mauris. Nibh tellus molestie nunc non isse faucibus 
                                                Ultrices eros in cursus turpis massa tincidunt. Ante in nibh mauri eger enim neque volu
                                                lectus. Etiam non quam lacus suspendisse faucibus.
                                            </p>
                                        </div>
                                    </div>
        
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#collapse3-4" class="expand">How do I Track Order?</a>
                                        </div>
                                        <div id="collapse3-4" class="card-body collapsed">
                                            <p class="mb-0">Fringilla urna porttitor rhoncus dolor purus. Luctus venenatis lectus  semper bibendum
                                                Diam maecenas ultricies mi eget mauris. Nibh tellus molestie nunc non isse faucibus 
                                                Ultrices eros in cursus turpis massa tincidunt. Ante in nibh mauri eger enim neque volu
                                                lectus. Etiam non quam lacus suspendisse faucibus.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- End of PageContent -->
            

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