<div>
    <form action="#" method="POST" wire:submit.prevent="registerAdmin">
        @csrf
        <div class="mb-3">
            {{-- Alerte --}}
            @if (session()->has("error"))
            <div class="alert alert-alt alert-danger alert-end-icon alert-dismissible fade show">
                <span><i class="icon icon-bell-53"></i></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                </button> {{session()->get('error')}}
            </div>
            @endif
        </div>

        <div class="mb-3">
            <label class="mb-1">
                <strong>Nom d'utilisateur:</strong>
            </label>
            <input type="text" class="form-control" placeholder="votre nom d'utilisateur" name="nom" wire:model.ignore="nom">
            @error('nom') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label class="mb-1">
                <strong>Email:</strong>
            </label>
            <input type="email" class="form-control" placeholder="Votre adresse email" name="email" wire:model.ignore="email">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label class="mb-1">
                <strong>Mot de passe:</strong>
            </label>
            <input type="password" class="form-control" name="password" wire:model.ignore="password">
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label class="mb-1">
                <strong>Confirmer le mot de passe:</strong>
            </label>
            <input type="password" class="form-control" name="password_confirmation" wire:model.ignore="password_confirmation">
            @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary btn-block" @if($btnState === "disabled") disabled @endif > @if($btnState === "disabled") Renseignez les champS @else S'inscrire  @endif </button>
        </div>
    </form>
    <div class="new-account mt-3">
        <p>Vous avez déjà un compte ? <a class="text-primary" href="{{url('admin/login') }}">Me connecter</a></p>
    </div>
</div>
