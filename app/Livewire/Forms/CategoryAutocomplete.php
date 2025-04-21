<?php

namespace App\Livewire\Forms;

use App\Livewire\Forms\Autocomplete;
use App\Models\CategoryType;
use Livewire\Attributes\On; 
use App\Models\Category;

class CategoryAutocomplete extends Autocomplete
{

    public function query() {
        return Category::where('name', 'like', '%'.$this->search.'%')->orderBy('name');
    
    }
    public function render()
    {
        return view('livewire.forms.category-autocomplete');
    }
}
