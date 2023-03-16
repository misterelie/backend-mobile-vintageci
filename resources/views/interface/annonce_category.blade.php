@extends('layouts.base')
@section('content')
<section id="card w-100">
    <div class="container">
        <div class="row">
            <h5 class="title-annonce text-center title justify-content-center ls-normal mb-2 pt-1 appear-animate pb-4">{{ Str::ucfirst($category->category) }} </h5>
            <div class="col-lg-12 col-12 col-md-12 m-auto">

                @if(!is_null($annonces) && $annonces->count() > 0)
                @foreach ($annonces as $annonce)
                <div class="card card-item-novip mb-3">
                    <a href="{{ url('annonces/single', $annonce->pk) }}" class="lien-annonce"></a>
                    <table width="100%">
                        <tbody width="100%">
                            <tr width="100%">
                                <td class="media-col width-25">
                                    <div class="card-media">
                                            <img src="{{ Helpers::file_path($annonce->photo_1)}}"
                                            class="img-fluid rounded-start" alt="...">
                                    </div>
                                </td>
                                <td class="width-75">
                                    <div class="card-details position-relative">
                                        <span class="item-category">
                                            {{ !is_null($annonce->category) ? $annonce->category->category : null }}
                                        </span>
                                        <div class="item-name">
                                            <h3>
                                                {{$annonce->titre}}
                                            </h3>
                                        </div>
                                        <div class="item-infos">
                                            <div class="item-details">
                                            </div>
                                            <div class="item-meta">
                                                <span class="date">Il y a {{Dates::ago($annonce->created_at)}}</span>
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

                @else
                <div class="alert mb-4 alert-icon alert-error alert-bg alert-inline text-red ">
                    <h4 class="alert-title">
                        <i class="w-icon-times-circle"></i>Désolé !
                    </h4> il n’y a aucune annonce dans cette catégorie.
                </div>
                @endif

                <ul class="pagination justify-content-center">
                    {{$annonces->links() }}
                </ul>
                
            </div>
        </div>
    </div>
</section><br><br> <hr>
@endsection