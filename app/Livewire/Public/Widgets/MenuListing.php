<?php

namespace App\Livewire\Public\Widgets;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\CategoryType;

class MenuListing extends Component
{
    public $products;
    public function mount()
    {
        $this->products = Product::ByCategory();
       
    }

    public function render()
    {
        return view('livewire.public.widgets.menu-listing');
    }
}
