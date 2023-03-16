<div>
    <div class="mt-3">
        <form action="#" method="POST" wire:submit.prevent="auth">
            @csrf
            <div class="mb-3 text-left text-start">
                {{-- Alerte --}}
                @if (session()->has("error"))
                <div class="alert alert-alt alert-danger alert-end-icon alert-dismissible fade show">
                    <span><i class="icon icon-bell-53"></i></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                    </button> {{session()->get('error')}}
                </div>
                @endif

                @if (session()->has("success"))
                <div class="alert alert-alt alert-success alert-end-icon alert-dismissible fade show">
                    <span><i class="icon icon-bell-53"></i></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                    </button> {{session()->get('success')}}
                </div>
                @endif
            </div>
    
            <div class="mb-3 text-left text-start">
                <label class="mb-1 text-left text-start">
                    <strong>Identifiant ou E-mail:</strong>
                </label>
                <input type="text" class="form-control" placeholder="Votre identifiant" name="email" wire:model.ignore="email">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3 text-left text-start">
                <label class="mb-1 text-left text-start">
                    <strong>Mot de passe:</strong>
                </label>
                <input type="password" class="form-control" name="password" wire:model.ignore="password">
                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary btn-block" @if($btnState === "disabled") disabled @endif > @if($btnState === "disabled") Renseignez les champs @else Se connecter @endif </button>
            </div>
        </form>
        
    </div>
    
</div>
