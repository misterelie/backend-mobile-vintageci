<div>
    <div>
        <div class="form-group my-3">
            <label for="" class="form-control-label mt-3">Catégorie:</label>
            <select name="category" id="category" class="form-control mt-2" wire:model.ignore="categoryId">
                <option value="">--Catégories--</option>
                @if (!is_null($categories))
                @foreach ($categories as $item)
                <option value="{{ $item->id}}" {{ ($categoryId === $item->id) ? 'selected' : ''}}> {{ Str::ucfirst($item->category) }} </option>
                @endforeach
                @endif
    
            </select>
    
            @error('category')
            <span class="text-danger">
                {{$message }}
            </span>
            @enderror
        </div>
    
        @if(!is_null($categoryId) && (!is_null($sousCategories)) && (count($sousCategories) > 0))

        <div class="form-group mt-3">
            <label for="" class="form-control-label mt-4">Sous-catégorie:</label>
            <select name="sous_category" wire:model.ignore="sousCategory" id="sousCategory" class="form-control mt-2">
                <option value="">--Sous-catégories--</option>
                @if (!is_null($sousCategories))
                @foreach ($sousCategories as $sc)
                <option value="{{ $sc->id}}" {{ ((int) trim($sousCategory) === (int) trim($sc->id)) ? 'selected' : ''}}> {{ $sc->sous_category }} </option>
                @endforeach
                @endif
            </select>
            @error('sousCategory')
            <span class="text-danger">
                {{$message }}
            </span>
            @enderror
        </div>
        @endif
    
    
    </div>
    
</div>
