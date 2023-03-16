<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\SousCategory;
class SetSousCategory extends Component
{

    public $categories;
    public $sousCategories;
    public $categoryId;
    public $annonce;
    public $category = null;
    public $sousCategory;
    public $search = false;


    public function mount(){
       
        $this->categoryId = $this->annonce->category_id;
        $this->sousCategory = $this->annonce->sous_category_id;
        $this->category = Category::where('id', $this->categoryId)->first();
        $this->categories = Category::latest()->get();
        $this->sousCategories = !is_null($this->category)  ? $this->category->sousCategories()->latest()->get() : null;
    }



    public function updatedCategoryId($group){
        $this->categoryId = $group;
        $this->category = Category::where('id', $this->categoryId)->first();
        $this->sousCategories = !is_null($this->category)  ? $this->category->sousCategories()->latest()->get() : null;
        $this->search = true;
    }

    public function render()
    {
        return view('livewire.set-sous-category');
    }
}
