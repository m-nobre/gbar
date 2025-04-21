<?php

namespace App\Livewire\Admin\Partials;

use Livewire\Component;
use App\Models\Category;
use App\Models\CategoryType;

class ProductCategoryDashboard extends Component
{
    public $category;
    public $type;
    public $categories;

    public function mount()
    {
        $this->type = CategoryType::firstOrCreate(['name' => 'products']);
        $this->categories = Category::where('category_type_id', $this->type->id)->get();

    }
    public function render()
    {
        return view('livewire.admin.partials.product-category-dashboard');
    }
}
