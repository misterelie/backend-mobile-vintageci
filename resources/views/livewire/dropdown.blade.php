<div>
    <div class="row">
        <div class="col-sm-12 mb-3">
            <label for="category_id" class="form-label fw-bold font-weight-bold ">Catégorie de l'article: <span class="text-danger">*</span>
                :</label>
            @if (!empty($categories))
            <select type="category_id" id="category_id" class="form-control" wire:model.ignore="categoryId" name="category_id">
                <option value="">---Sélectionnez---</option>
                @foreach ($categories as $tp)
                <option value="{{$tp->id}}">{{ $tp->category }}</option>
                @endforeach
            </select>
            @else
            <div class="alert alert-danger text-center">
                Aucune catégories n'est enregistrée.
            </div>
            @endif
        </div>

        @if (!empty($rubriques))
        <div class="col-sm-12 mb-3">
            <label for="rubrique_id" class="form-label fw-bold font-weight-bold ">Rubrique de l'article: <span class="text-danger">*</span>
                :</label>
           
            <select type="rubrique_id" name="rubrique_id" id="rubrique_id" class="form-control" wire:model.ignore="rubriqueId"  name="rubrique_id">
                <option value="">---Sélectionnez---</option>
                @foreach ($rubriques as $r)
                <option value="{{$r->id}}">{{ $r->rubrique }}</option>
                @endforeach
            </select>
            @else
           
            @if (($search === true) && is_null($rubriques))
                <div class="col">
                    <div class="alert alert-danger text-center">
                        Aucune rubrique trouvée. Veuillez enregistrer des rubrique dans cette catégorie.
                    </div>
                </div>
            @endif
           
        </div>
        @endif
    </div>
</div>
