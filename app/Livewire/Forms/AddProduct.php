<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use App\Models\CategoryType;

class AddProduct extends Component
{
    public $parent;

    public function mount()
    {
        // Assert that all entities are added under Products category type without hardcoding ID 
        $this->parent = [
            'field'  => 'category_type_id',
            'id'     =>  CategoryType::firstOrCreate(['name' => 'Products'])->id
        ];
    }
    public function render()
    {
        return view('livewire.forms.add-product');
    }
}
