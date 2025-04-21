<?php

namespace App\Livewire\Admin\CategoryType\Partials;

use Livewire\Component;
use App\Livewire\Forms\Autocomplete;
use Livewire\Attributes\On; 
use App\Models\CategoryType;

class TypeAutocomplete extends Autocomplete
{
    public function query() {
        return CategoryType::where('name', 'like', '%'.$this->search.'%')->orderBy('name');
    
    }
    public function render()
    {
        return view('livewire.admin.category-type.partials.type-autocomplete');
    }
}
