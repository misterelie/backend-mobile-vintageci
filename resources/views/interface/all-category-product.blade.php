@extends('layouts.base')
@section('content')

<section class="category-section top-category bg-gray pt-10 pb-10 appear-animate fadeIn appear-animation-visible">
    <div class="container m-auto mx-auto">
        <div class="row mb-2">
            <h5 class="title justify-content-center pt-1 ls-normal mb-4">Toutes les catégories</h5>
            @foreach($categories as $categorie)
            <div class="col-6 mb-3">
                <div class="card category-card">
                    <a href="{{ url('/interface.annonce_category', [Helpers::filterstring($categorie->category) , $categorie->id])}}">
                        <div class="category-image position-relative carre-card">
                            <img src="{{ Helpers::file_path($categorie->photo)}}" alt=""
                                class="card-img-top img-fluid rounded-start" alt="">
                        </div>
                        <div class="card-body">
                            <a href="">
                                <h4 class="category-name">
                                    {{ $categorie->category}}
                                </h4>
                            </a>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

    </div><br>
</section><br><br>
@endsection