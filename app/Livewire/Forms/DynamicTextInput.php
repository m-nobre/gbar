<?php

namespace App\Livewire\Forms;

use Livewire\Component;

class DynamicTextInput extends Component
{
    public string $field = '';
    public string $model = '';
    public array $searchResults = [];
    public $new = NULL;
    public $path = "App\\Models\\";
    public $list;
    public $field_id;
    public $update;



    
    public function mount($name, $model, $field)
    {
        $permitted = ['category'];
        
        $this->model = $model;
        $this->path = trim($this->path .= ucFirst($model));
        
        if (!in_array($model, $permitted)) {
            return __("Model not permitted");
        } 

        $this->field = $field;
        
        $this->searchResults = $this->path::all()->pluck($name, "id")->toArray();
        
    }
    public function updatedField($field)
    {

        if(!empty($this->field)) {
            // An array of SearchResults

            $temp_results = $this->path::where($this->name, 'LIKE' , '%'.$this->field.'%')->pluck($this->name, 'id')->toArray();
            
            if ($temp_results) {
                
                $this->new = NULL;
                $this->searchResults = $temp_results;

            } else {

                $this->model = new $this->path;
                $this->new = TRUE;

                
            }


        } else {
            $this->new = NULL;
            $this->searchResults = [];
        }
    }

    public function save()
    {
    }
    public function render()
    {
        return view('livewire.forms.dynamic-text-input');
    }
}
