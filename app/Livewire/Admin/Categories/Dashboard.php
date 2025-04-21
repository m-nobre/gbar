<?php

namespace App\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\Category;
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
    public $key;
    public $metaData;
    public $img_url;
    public $standalone;
    public $priority;
    public $types;
    public $type;
    public $categories;
    public $editing;
    public $name;
    public $description;
    public $icon;
    public $color;
    public $filter;

    public function mount()
    {
        $types = CategoryType::get();
        
        if (count($types) < 1) {

            CategoryType::create(['name' => 'Products']);
            $types = CategoryType::get();

        }
        $types = $types->toArray();
        $this->types = json_encode($types);
        
        $categories = Category::get()->toArray();

        $this->categories = json_encode($categories);
        $this->filter = $types[array_key_first($types)]['id'];
        $this->key = Str::random(32);
        $this->old_image = NULL;
        $this->image = NULL;

    }
    
    public function updatedFile($value){
        $this->file = $value;
        $this->savePhoto();
        // dd($value);
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
    public function updatedFilter($id)
    {
        $this->filter = $id;        
    }
    public function updatedDescription($description)
    {
        $this->description = $description;        
    }
    public function updatedIcon($icon)
    {
        $this->icon = $icon;        
    }
    public function updatedColor($value)
    {
        $this->color = $value;        
    }
    public function updatedStandalone($value)
    {
        $this->standalone = $value;        
    }
    public function updatedPriority($value)
    {
        $this->priority = $value;        
    }
    public function save($id)
    {
        $category = Category::find($id);
        $category->name = $this->name;
        $category->description = $this->description;
        $category->icon = $this->icon ?? NULL;
        $category->color = $this->color ?? NULL;
        $category->image = $this->image ?? NULL;
        $category->standalone = $this->standalone ? 1 : 0;
        $category->priority = $this->priority  ? 1 : 0;
        $category->save();
        $this->categories = json_encode(Category::get()->toArray());
        $this->clear();
    }

    public function new()
    {
        $new = new Category;
        $new->name = $this->name;
        $new->description = $this->description;
        $new->category_type_id = $this->type;
        $new->icon = "bi-question-circle";
        $new->color = "#000";
        $new->image = NULL;
        $new->standalone = NULL;
        $new->priority = NULL;
        $new->save();
        $this->categories = json_encode(Category::get()->toArray());
        $this->clear();
    }
    public function edit($id)
    {
        $this->editing = $id;  
        foreach (json_decode($this->categories) as $cat) {
            if ($cat->id == $id) {
                $this->name = $cat->name;
                $this->description = $cat->description ?? "";
                $this->icon = $cat->icon ?? "";
                $this->color = $cat->color ?? "";
                $this->image = $cat->image ?? "";
                $this->standalone = $cat->standalone ?? "";
                $this->priority = $cat->priority ?? "";
            }
        }  
        
        
    }
    public function delete($id)
    {
        Category::where('id', $id)->delete();      
        $this->categories = json_encode(Category::get()->toArray());

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
        $this->standalone = NULL;        
        $this->priority = NULL;        
    }

    public function cancel()
    {
        $this->clear();
    }

    public function render()
    {
        return view('livewire.admin.categories.dashboard');
    }
}
