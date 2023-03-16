@extends('admin/layouts/theme')

@section('theme')



<div class="row align-iadresses-center">
    <div class="col-9">
        <div class="dashboard-header-title mb-30">
            <h4 class="mb-0">Messages</h4>
            <p class="mb-0">Bpîte de réceptions</p>
        </div>
    </div>
    <div class="col-3 text-right">
       
    </div>
</div>


<div class="col-auto form-group mb-3">
    @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show text-center m-auto">
        {{ Session::get('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show text-center m-auto">
        {{ Session::get('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
</div>



<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="inbox-area">
            <div class="card mb-30">
                <div class="card-body">
                    <div class="row">
                      

                        <div class="col-12 col-xl-11 m-auto">
                            <!-- Mail Header -->
                            <div class="mail-box-header">
                                <div
                                    class="mail-title-search-area d-md-flex align-items-center justify-content-between">
                                    <!-- Title -->
                                    <div class="inbox-title mb-3">
                                        <h4 class="mb-0">Messages reçus:</h4>
                                    </div>
                                    <div class="search-wrapper mb-3">
                                        {{-- <form action="#" method="get">
                                            <input type="search" name="search"
                                                class="form-control mb-0 inbox-mail" placeholder="Search">
                                            <button type="submit" class="d-none"></button>
                                        </form> --}}
                                    </div>
                                </div>

                                <!-- Tools -->
                                <div
                                    class="mail-tools tooltip-demo d-flex align-items-center justify-content-between flex-wrap">
                                    <div class="mail-btn-group d-flex align-items-center mb-3">
                                        <a href="{{url("messages/toggle") }}"><i class="lni lni-checkmark-circle"></i></a>
                                        <a href="{{ url("/messages")}}"><i class="lni lni-reload"></i></a>
                                        <a href="{{url("messages/remove") }}" class="text-danger"><i class="fa fa-trash"></i></a>
                                    </div>
                                    <div
                                        class="mail-pager d-flex align-items-center justify-content-end mb-3">
                                        {{ $messages->links()}}
                                    </div>
                                </div>
                            </div>

                            <div class="border-top mb-4"></div>

                            <div class="mail-list">
                               

                                @if (!is_null($messages) && !empty($messages))
                                    @foreach ($messages as $me)
                                         <!-- Single Mail Item -->
                                         <div class="single-mail-item d-flex align-items-center justify-content-between p-3">
                                            <div class="mail-content d-flex align-items-center flex-wrap">
                                                <!-- checkbox -->
                                                <div class="mail-checkbox mr-2">
                                                    <label class="ckbox">
                                                      <div class="mail-btn-group d-flex">
                                                        <a href="{{url("message/destroy", $me) }} "> <i class="fa fa-trash"></i> </a>
                                                      </div>
                                                    </label>
                                                </div>
                                                <!-- Star -->
                                              
                                                <!-- Main Body -->
                                                <a href="#!" data-toggle="modal" data-target=".openModal{{$me->id}}" class="admin-mail-body mr-3">
                                                    <span class="mail-recipient">
                                                      {{ $me->nom_complet}}
                                                    </span>
                                                    <p class="mb-1 mail-subject">
                                                        {{ $me->objet}}
                                                        
                                                        </p>
                                                        <p>
                                                            <small>
                                                                {!! substr($me->message,0,60)."..." !!}
                                                            </small>
                                                        </p>
                                                   
                                                        @if ($me->vu === 0)
                                                        <span class="badge badge-danger">
                                                            Nouveau message
                                                        </span>
                                                        @else
                                                        <span class="badge badge-secondary">
                                                            Déjà lu
                                                        </span>
                                                        @endif
                                                </a>
                                            </div>
                                            <!-- Mail Date -->
                                            <span class="badge">Il a y: {{ Dates::ago($me->created_at) }}</span>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="alert alert-danger text-center font-17 text-17">
                                        Aucun Message reçsu pour l'instant
                                    </div>
                                @endif

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




{{-- Détails du mesage --}}


<section>
    
    @if(isset($messages) && !empty($messages))
        @foreach ($messages as $msg)
        <div class="modal fade openModal{{ $msg->id}}" tabindex="-1" role="dialog" aria-labelledby="openModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="openModalLabel">Détails:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                     
                        <div class="row">
                            <div class="col-sm-6">
                                <span class="mb-1 d-block">
                                     <u>Message de:</u> {{ $msg->nom_complet}}
                                </span>
                                <span class="mb-1 d-block">
                                    <u> Objet:</u> <strong>{{ $msg->objet}}</strong>
                                </span>
                            </div>
                            <div class="col-sm-6">
                                <span class="mb-1 d-block">
                                    <u> Envoyé le:</u> {{ Dates::dateFr($msg->created_at) }}
                                </span>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-sm-12 text-justify">
                                <h6 class="text-body mb-3">Contenu du message:</h6>
                                {!! $msg->message !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endif
</section>




@endsection