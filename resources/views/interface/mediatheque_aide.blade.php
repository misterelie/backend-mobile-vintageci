@extends('layouts.base')
@section('content')

{{-- <section>
    @if(!is_null($helps) && $helps->count() > 0)
        <div class="container">
            <h5 style="font-size: 14px; color: #24a223;" class="title justify-content-center pt-1 ls-normal mb-4">Comment ça marche ?</h5>
            <div class="row">
                @foreach($helps as $row)
                <div class="col-lg-4 col-md-6 mb-2">
                        <div class="card card-mediathek-aide mb-2">
                            <iframe src="https://www.youtube.com/embed/{!!$row->filename!!}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                            <div class="card-body mediathek-video">
                                <p class="card-text">{{ $row->legende}}</p>
                            </div>
                        </div>
                </div>
            </div>
            @endforeach
            <div class="col-lg-4 col-md-6 mb-5">
                {{ $helps->links()}}
            </div>
        </div> 
    @endif
</section> --}}

<style>
    @media screen and (min-width: 1024px) {
    .mediatek{
        width: 50%;
        margin-right: auto;
    }

}
@media screen and (max-width: 820px) {
    .card-mediathek-aide {
        width: 100%;
        height: auto;
    }

}
</style>

<section>
    @if(!is_null($helps) && $helps->count() > 0)
    <div class="container">
        <h5 style="font-size: 18px; color: #24a223;" class="title justify-content-center pt-1 ls-normal mb-4 text-mediak">Comment ça marche ?</h5> <br>
        <div class="row mb-5">
            @foreach($helps as $row)
            <div class="col-lg-4 col-md-6 mb-2 mediatek">
                    <div class="card card-mediathek-aide mb-2">
                        <iframe src="https://www.youtube.com/embed/{!!$row->filename!!}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                        <div class="card-body mediathek-video">
                            <p class="card-text">{{ $row->legende}}</p>
                        </div>
                    </div>
            </div>
            @endforeach
            <div class="col-lg-4 col-md-6 mb-5">
                {{ $helps->links()}}
            </div>
        </div>
    </div>
    @endif
</section>

@endsection