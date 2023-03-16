@extends('seller.partials.page')

@section('page')



        <!-- Start of Main -->
        <main class="main">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0"> Supprimer mon compte </h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav mb-10 pb-1">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/')}}">Accueil</a></li>
                        <li>Compte client</li>
                        <li>Supprimer</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            {{-- Account  Alert --}}
            @include('seller.partials.alert')

            <!-- Start of PageContent -->
            <div class="page-content pt-2">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8 m-auto">
                            <div class="card box-shadow p-4">
                                <div class="card-header p-4">
                                    <h5 class="card-title text-19">Confirmez la suppression</h5>
                                </div>
                                <div class="card-body p-4">
                                    <form method="POST" action="{{ url('/account/remove',User::user())}} ">
                                        @csrf
                                        

                                        <div class="text-body text-justify mb-4">
                                            Cher utilisateur, <br>

                                            La suppresssion de votre entrainera une perte définitive de vos données tels que:

                                            <ul>
                                                <li>Vos annonces</li>
                                                <li>Vos crédits</li>
                                                <li>Vos achats</li>
                                                <li>Vos boosts</li>
                                            </ul>

                                            Confirmez en cliquant sur le bouton si vous souhaitez tout de même vous désabonner de <strong>{{ config('app.name')}}.</strong>

                                            Merci de votre attention.

                                        </div>

                                        <div class="form-group">
                                            <button class="btn mr-2  btn-primary" type="submit"> 
                                                Supprimer mon compte
                                            </button>
                                            <a href="{{ url('/account/mes-comptes') }} " class="btn btn-underline text-blue text-primary btn-link sm mx-3" type="submit"> 
                                                Je ne veux plus supprimer mon compte
                                            </a>
                                        </div>
                                    </form>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of PageContent -->
            <!-- End of PageContent -->
        </main>
@endsection