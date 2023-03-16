@extends('seller.partials.page')

@section('page')

        <!-- Start of Main -->
        <main class="main">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0"> Mon compte </h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav mb-10 pb-1">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/')}}">Accueil</a></li>
                        <li>Compte client</li>
                        <li>Tableau de bord</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            {{-- Account  Alert --}}
            @include('seller.partials.alert')

            <!-- Start of PageContent -->
            <div class="page-content pt-2">
                <div class="container">
                    <div class="tab tab-vertical row gutter-lg">

                        {{-- SideBar --}}
                        @include('seller.partials.sidebar')
                        <div class="tab-content mb-6">
                            {{-- Onglet des purchases --}}
                            <div class="tab-pane active mb-4" id="account-orders">

                                 {{-- Header --}}
                                 @include('seller.partials.header')

                                <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-orders">
                                        <i class="w-icon-orders"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h2 class="icon-box-title text-uppercase ls-normal mb-0">Mes Achats</h2>
                                    </div>
                                </div>

                                {{-- <table class="shop-table wishlist-table"> --}}

                                   
                                    <table class="table align-middle text-dark text-left table-nowrap shop-table wishlist-table">
                                        <thead class="table-dark">
                                            <tr>
                                                <th class="align-middle text-white px-2 text-left text-uppercase">Formule</th>
                                                <th class="align-middle text-white px-2 text-left text-uppercase">Montant</th>
                                                <th class="align-middle text-white px-2 text-left text-uppercase">Mode </th>
                                                <th class="align-middle text-white px-2 text-left text-uppercase">Statut </th>
                                                <th class="align-middle text-white px-2 text-left text-uppercase">Date</th>
                                                <th class="align-middle text-white px-2 text-left text-uppercase">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @if(!is_null($purchases))
                                            @foreach($purchases as $cre)
                                            <tr>
                                                <td>
                                                    <span class="badge  text-uppercase" style="background: {{ $cre->credit->couleur }}; color: #fff">{{ $cre->credit->title }} </span>
                                                </td>
                                                <td>
                                                    <strong>{{ Helpers::moneyFormat($cre->credit->montant)}} </strong> F CFA
                                                </td>

                                                <td>
                                                    <span> {{Str::ucfirst($cre->provider) }} </span>
                                                </td>
                                                <td>
                                                    {!! Helpers::etatAchat($cre->statut) !!}
                                                </td>
                                                <td>
                                                    {{ Dates::formatFr($cre->created_at)}}
                                                </td>

                                                <td>
                                                    <div class="d-flex gap-3">
                                                        
                                                        <a href="{{ url("/my-purchase/destroy", $cre)}}"
                                                                class="btn btn-sm btn-danger" title="Supprimer l'Achat"
                                                                onclick="return confirm('Êtes-vous sûrs de vouloir supprimer cet Achat ?')"><i class="w-icon-times-circle font-size-15"></i>
                                                            </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container no-border border-none  mb-4 mt-3">
                    <div class="row justify-content-end text-right py-4 ">
                        <div class="col-md-6 mb-4 text-right float-right">
                            {{$purchases->links() }}
                        </div>
                    </div>
                </div>

            </div>
            <!-- End of PageContent -->


            <!-- End of PageContent -->
        </main>
        <!-- End of Main -->
@endsection