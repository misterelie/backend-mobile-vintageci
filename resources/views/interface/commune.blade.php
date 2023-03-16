@extends('layouts.base')
@section('content')

<section class="category-section top-category bg-gray pt-10 pb-10 appear-animate fadeIn appear-animation-visible">
    <div class="container m-auto mx-auto">
        <div class="row mb-2">
            <h5 class="title justify-content-center pt-1 ls-normal mb-4">Annonces par Commune</h5>
            @if(!is_null($communes))
                @foreach($communes as $c)
                    <div class="col-6 commune-annonce">
                        <div class="card commune-card">
                            <div class="card-body">
                                <a href="{{ url('interface.commune_annonce', [Helpers::filterstring($c->commune), $c->id]) }} ">
                                    <h4 class="commune-name">
                                        {{ $c->commune }} ({{ $c->annonces->count() }}) &nbsp;
                                    </h4>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div><br>
</section><br><br>
@endsection