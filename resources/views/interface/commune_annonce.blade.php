@extends('layouts.base')
@section('content')
<section id="card w-100">
    <div class="container">
        <div class="row">
            <form action="" class="search-bar mb-3" method="">
                <div class="input-group box">
                    <div class="input-group-prepend">
                        <button id="button-addon8" type="submit"
                            class="btn btn-sm btn-primary bouton-search"><i
                                class="fa fa-search text-align:center !important"
                                style="color: #fff"></i></button>
                    </div>
                    <input type="search" placeholder="Recherhcer une annonce"
                        aria-describedby="button-addon8" id="form-search" class="form-control">
                </div>
            </form>
            <h5 class="title-annonce text-center"> à {{ $commune->commune}}</h5>

            {{-- Annonces autres --}}
            <div class="col-lg-12 col-12 col-md-12 m-auto">
                @foreach ($annonces as $annonce)
                <div class="card card-item-novip mb-3">
                    <a href="{{ url('annonces/single', $annonce->pk) }}" class="lien-annonce"></a>
                    <table width="100%">
                        <tbody width="100%">
                            <tr width="100%">
                                <td class="media-col width-25">
                                    <div class="card-media">
                                        <a href="{{ url('/')}}">
                                            <img src="{{ Helpers::file_path($annonce->photo_1)}}"
                                            class="img-fluid rounded-start" alt="...">
                                        </a>
                                    </div>
                                </td>
                                <td class="width-75">
                                    <div class="card-details position-relative">
                                       @if(!is_null($annonce->category)) <span class="item-category">{{$annonce->category->category}}</span>@endif
                                        <div class="item-name">
                                            <h3>{{$annonce->titre}}</h3>
                                        </div>
                                        <div class="item-infos">
                                            <div class="item-details">
                                        
                                            </div>
                                            <div class="item-meta">
                                                <span class="date">Il y a {{Dates::ago($annonce->created_at)}}
                                                </span>
                                                @if(!is_null($annonce->commune)) <span class="city">{{$annonce->commune->commune}}</span>
                                                @endif
                                            </div>
                                            <div class="item-price">
                                                <h2 class="price">{{ Helpers::moneyFormat($annonce->prix) }} <sup class="currency">FCFA</sup></h2>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach
                {{-- fin de la carte --}}
            </div>
            <ul class="pagination justify-content-center">
                {{$annonces->links() }}
            </ul>
            
        </div>
    </div>
</section><br><br> <hr>
@endsection