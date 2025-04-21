<?php

namespace App\Livewire\Forms\Partials;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\Log;



class CreateEntity extends Component
{
    public string $name;
    public string $description;
    public $model;
    public $element;
    public $parent;
    public $fieldset;
    public $key;

    
    public function mount($model, $element, $parent = NULL)
    {
        $this->model = $model;
        $this->element = $element;
        $this->name = "";
        $this->description = "";
        $this->parent = $parent;
        $this->key = Str::random(6);


        $model_path = "App\Models\\".$this->model;

        try {
            $this->fieldset = $model_path::fields();        
        } catch (\Throwable $th) {
            $this->fieldset = NULL;        
        }

    }

    public function updatedName($value)
    {
        $this->name = $value;
    }

    public function updatedDescription($value)
    {
        $this->description = $value;
    }

    #[On('entity-created')] 
    public function entityCreated($data)
    {
        Log::info($data);

        dd($data);
    }

    public function save()
    {   
        $model_path = "App\Models\\".$this->model;

        $savedata = [
            "name" => $this->name,
        ];

        if ($this->parent) {
            $savedata[$this->parent['field']] = $this->parent['id'];
        }
        
        $entity = $model_path::firstOrCreate($savedata, array('description' => $this->description));


        $data = json_encode([
            'model' => $this->model,
            'id' => $entity->id,
            'name' => $entity->name,
            'element' => $this->element,
        ]);

        $this->dispatch('new-entity', data: $data);
        $this->dispatch('close-modal', type: $this->model);


    }
    public function render()
    {
        return view('livewire.forms.partials.create-entity');
    }
}
