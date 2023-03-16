<div class="row">
    <div class="col-12">
        <div class="container">
            @if (Session::has('success'))
            <div class="alert alert-icon alert-success mb-4 alert-bg alert-inline ">
                <h4 class="alert-title">
                    <i class="fas fa-check"></i>Réussite !
                </h4> {!! Session::get('success') !!}.
            </div>
            @endif

            @if (Session::has('error'))
            <div class="alert mb-4 alert-icon alert-error alert-bg alert-inline ">
                <h4 class="alert-title">
                    <i class="w-icon-times-circle"></i>Alerte !
                </h4> {!! Session::get('error') !!}.
            </div>
            @endif
        </div>
    </div>


    
     @if(!is_null(User::user()) && User::user()->user_validated != 1)
    <div class="col-12 py-4 px-4 m-auto">
        <div class="container">
            <div class="alert alert-danger account-alert">
                <div class="d-md-flex justify-content-start">
                    <div class="icon-alert sm-auto">
                        <img class="max-60" src="{{asset('front/assets/images/alert.png')}}" encoding="lazy"
                            alt="Alerte d'erreur">
                    </div>
                    <div class="alert-body text-justify sm-pl">
                        Votre inscription n'est pas active.
                        Pour utiliser votre compte, nous devons d'abord vérifier votre adresse E-mail.
                        Cliquez sur le lien d'activation que vous avez reçu par mail. Ou cliquer sur : <a href="{{url("/resend-email", User::user())}}" style="text-decoration: underline;color: black">renvoyer le
                            mail </a> pour renvoyer.
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endif
</div>