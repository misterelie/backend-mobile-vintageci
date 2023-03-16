<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

     {{-- Comments section --}}
     <div class="row mt-4 mb-4">
        
        @if (!is_null($comments) && $comments->count() > 0)
        <div class="col-sm-12 md-12 m-auto mb-4">

            <div class="row">
                <div class="col-auto mt-40 mb-30">
                    <h3 class="card-title font-weight-700 mb-25">{{$count}} Commentaire{{$count > 1 ? 's' : ""}}</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">

                    {{-- Comment list one --}}
                   @foreach ($comments as $c)
                   <div class="card w-100 mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-2 user-avatar">
                                <div
                                    class="d-flex justify-content-center align-items-center vertical-align-center ">
                                    <div class="round">
                                        <img src="{{ asset('front/img/w-8.png')}} " alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-8">
                                <h5 class="text-name card-title font-weight-bold">{{ $c->user_name}}
                                </h5>
                                <span class="text-date">Il y a: {{ Dates::ago($c->created_at)}}</span>
                                <p class="card-text user-comment text-justify">
                                    {{ $c->comment}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                   @endforeach

                   
                </div>


            </div>

        </div>
        @endif

    </div>

    <div class="row justify-content-end">
        {{ $comments->links()}}
    </div>

    @if (trim($alertMessage) != "")
    <div class="row">
        <div class="col-sm-12 my-2">
           <div class="card px-4 py-4">
            <div class="alert {{$alertType}} text-center">
                {{ $alertMessage}}
            </div>
           </div>
        </div>
    </div>
    @endif

    {{-- Post a comment section --}}
    <div class="row mt-4 mb-4">
        <div class="col-sm-12 md-12 m-auto ">

            <div class="card my-4">
                <div class="card-header">
                    <h2 class="card-title card-heading">Laissez un commentaire:</h2>
                    <p class="text">Laissez-nous un commentaire! Votre adresse email restera confidentielle.</p>
                </div>

                <div class="card-body">
                    <form action="" method="post" wire:submit.prevent="addComment">
                        @csrf

                        <div class="row">
                            <div class="col-sm-6">
                                <label for="" class="form-label">Votre pseudo</label>

                                <input type="text" name="user_name" id="user_name" class="form-control" wire:model.ignore="name" />
                                <span class="text-danger">{{ $nameError}} </span>
                            </div>

                            <div class="col-sm-6">
                                <label for="" class="form-label">Votre adresse email</label>

                                <input type="text" name="user_email" id="email" class="form-control" wire:model.ignore="email">
                                <span class="text-danger">{{ $emailError}} </span>
                            </div>

                            <div class="col-sm-12">
                                <label for="" class="form-label">Votre commentaire</label>
                                <textarea type="text" name="comment" id="comment" class="form-control" cols="30" rows="5" wire:model.ignore="comment" > </textarea>

                                <span class="text-danger">{{ $commentError}} </span>
                            </div>

                           
                            

                            <div class="col-sm-12 text-right">
                                <button class="btn btn-primary" type="submit" 
                                @if($disabled) disabled @endif>Commenter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
