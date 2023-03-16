<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\SousCategory;
class GetSousCategory extends Component
{
    public $categories;
    public $sousCategories;
    public $categoryId;
    public $category = null;
    public $sousCategory;
    public $search = false;


    public function mount(){
        $this->categories = Category::latest()->get();
    }



    public function updatedCategoryId($group){
        $this->categoryId = $group;
        $this->category = Category::where('id', $this->categoryId)->first();
        $this->sousCategories = !is_null($this->category)  ? $this->category->sousCategories()->latest()->get() : null;
        $this->search = true;
    }



    public function render()
    {
        return view('livewire.get-sous-category');
    }
}
