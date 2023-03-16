@extends('layouts.base')
@section('content')
<section id="card w-100">
    <div class="container">
        <div class="row">
            <h5 class="title-annonce text-center">Toutes les annonces VIP</h5>
            {{-- Annonces VIPs --}}
            <div class="col-lg-12 col-12 col-md-12 m-auto">
                @foreach ($annonces as $annonce)
                <div class="card card-item mb-3">
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
                                       @if(!is_null($annonce->category)) <span class="item-category">{{$annonce->category}}</span>@endif
                                        <span class="vtg-badge badge-vip">VIP</span>
                                        <div class="item-name">
                                            <h3>{{$annonce->titre}}</h3>
                                        </div>
                                        <div class="item-infos">
                                            <div class="item-details">
                                        
                                            </div>
                                            <div class="item-meta">
                                                <span class="date">Il y a {{Dates::ago($annonce->created_at)}}
                                                </span>
                                                @if(!is_null($annonce->commune))
                                                <span class="city">{{$annonce->commune}}</span>
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
                {{-- fin de la carte vip --}}
            </div>
        </div>
    </div>
</section><br><br>
@endsection