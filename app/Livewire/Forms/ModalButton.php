<?php

namespace App\Livewire\Forms;
use Livewire\Component;
use Illuminate\Support\Str;


class ModalButton extends Component
{
    public $model = NULL;
    public $view = NULL;
    public $type = NULL;
    public $icon = NULL;
    public $colour = NULL;
    public $element = NULL;
    public $key;
    public $choices;
    public $choice_id;
    public $parent;
    public $label;

    public function mount($model, $element, $view, $type, $icon, $colour = "slate", $parent = NULL, $label = NULL)
    {
        $this->model = $model;
        $this->element = $element;
        $this->view = $view;
        $this->type = $type;
        $this->icon = $icon;
        $this->colour = $colour;
        $this->key = Str::random(6);
        $model_path = "App\Models\\".$this->model;
        $choices = $model_path::all()->pluck("name", "id")->toArray();
        $this->choices = $choices ?? [];
        $this->parent = $parent;
        $this->label = $label;
    }

    public function render()
    {
        return view('livewire.forms.modal-button');
    }
}
