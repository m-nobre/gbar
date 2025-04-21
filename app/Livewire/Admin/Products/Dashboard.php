<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductOption;
use App\Models\CategoryType;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate; 
use Illuminate\Support\Str;
use Auth;

class Dashboard extends Component
{
    use WithFileUploads;
    
    #[Validate('image')]
    public $file;
    public $image;
    public $old_image;
    public $category;
    public $metaData;
    public $img_url;
    public $key;
    public $products;
    public $product;
    public $name;
    public $description;
    public $type;
    public $featured;
    public $editing;
    /* Categorias do tipo produto:  mains, drinks, etc */ 
    public $categories;
    public $filter;
    public $options_cat_type;
    public $options_cat;
    /*Categorias do tipo opção:  servings, allergies, etc*/
    public $option_edit;
    public $options;
    /* opcoes do produto -> preco, nome, descricao, produto e categoria da opcao */
    public $optprice;
    public $optname;
    public $optcat;
    public $optdesc;



    public function mount()
    {
        
        $this->options_cat_type = CategoryType::firstOrCreate(['name' => 'Options'])->id;        
        $this->type = CategoryType::firstOrCreate(['name' => 'Products'])->id;
        $this->categories = json_encode(Category::where('category_type_id', $this->type)->get()->toArray());
        $this->products = json_encode(Product::all()->toArray());

        
        $this->key = Str::random(32);
        $this->old_image = NULL;
        $this->image = NULL;

    }
    
    public function updatedFile($value){
        $this->file = $value;
        $this->savePhoto();
        // dd($value);
    }
    
    public function updatedOptprice($value){
        $this->optprice = $value;
    }
    
    public function updatedOptname($value){
        $this->optname = $value;
    }
    public function updatedOptcat($value){
        $this->optcat = $value;
    }
    public function updatedOptdesc($value){
        $this->optdesc = $value;
    }

    public function savePhoto()
    {
        $filename = str()->random().".".$this->file->extension();
        
        $photo = $this->file->storeAs(
            Auth::User()->id ?? \App\Models\User::first()->id,
            $filename,
            'uploads'
        );

        $this->old_image = NULL;
        $this->image = 'media/uploads/'.$photo;

    }
    
    public function updatedName($name)
    {
        $this->name = $name;        
    }

    public function updatedType($id)
    {
        $this->type = $id;        
    }
    public function updatedDescription($description)
    {
        $this->description = $description;        
    }

    public function updatedFeatured($value)
    {
        $this->featured = $value;        
    }
    public function updatedCategory($value)
    {
        $this->category = $value;        
    }

    public function save($id)
    {
        $product = Product::find($id);
        $product->name = $this->name;
        $product->description = $this->description;
        $product->category_id = $this->category;
        $product->image = $this->image ?? NULL;
        $product->featured = $this->featured ? True : False;
        $product->save();
        $this->products = json_encode(Product::get()->toArray());
        $this->clear();
    }

    public function new()
    {
        $new = new Product;
        $new->name = $this->name;
        $new->description = $this->description;
        $new->category_id = $this->category;
        $new->image = NULL;
        $new->featured = NULL;
        $new->save();
        $this->products = json_encode(Product::get()->toArray());
        $this->clear();
    }
    public function newOption()
    {
        $new = new ProductOption;
        $new->name = $this->optname;
        $new->description = $this->optdesc;
        $new->category_id = $this->optcat;
        $new->product_id = $this->product;
        $new->price = $this->optprice;
        $new->save();
        $this->options = json_encode(ProductOption::where('product_id',  $this->editing)->get()->toArray());
        $this->clear();
    }
    public function edit($id)
    {
        $this->editing = $id; 

        foreach (json_decode($this->products) as $product) {
            if ($product->id == $id) {
                $this->product = $id;
                $this->name = $product->name;
                $this->description = $product->description ?? "";
                $this->category = $product->category_id;
                $this->image = $product->image ?? "";
                $this->featured = $product->featured ?? "";
                $cats = Category::where('category_type_id', $this->options_cat_type)->get()->toArray();
                $this->options_cat = count($cats) > 0 ? json_encode($cats) : NULL;
                $this->optcat = count($cats) > 0 ? $cats[array_key_first($cats)]['id'] : NULL;
                $this->options = json_encode(ProductOption::where('product_id', $id)->get()->toArray());
            }
        }  
        // $this->options_category_type = CategoryType::firstOrCreate(['name' => 'Options'])->id;
        
    }
    public function updatedFilter($id)
    {
        $this->filter = $id;        
    }
    public function delete($id)
    {
        Product::where('id', $id)->delete();      
        $this->products = json_encode(Product::get()->toArray());

    }
    public function clear()
    {
        $this->editing = NULL;        
        $this->name = NULL;        
        $this->description = NULL;        
        $this->type = NULL;        
        $this->icon = NULL;        
        $this->color = NULL;        
        $this->file = NULL;        
        $this->image = NULL;        
        $this->featured = NULL;        
        $this->category = NULL;        
    }

    public function cancel()
    {
        $this->clear();
    }
    public function render()
    {
        return view('livewire.admin.products.dashboard');
    }
}
