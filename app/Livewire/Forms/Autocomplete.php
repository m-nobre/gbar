<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Livewire\Attributes\On; 


abstract class Autocomplete extends Component
{
    public $results;
    public $search;
    public $selected;
    public $showDropdown;

    abstract public function query();

    public function mount($selected = NULL)
    {
        $this->showDropdown = false;
        $this->results = collect();
        $this->selected = $selected;
    }

    public function updatedSelected()
    {
        $this->dispatch('valueSelected',  $this->selected); 
    }

    public function updatedSearch()
    {

        if (strlen($this->search) < 2) {
            $this->results = collect();
            $this->showDropdown = false;
            return;
        }

        if ($this->query()) {
            $this->results = $this->query()->get();
        } else {
            $this->results = collect();
        }

        $this->selected = '';
        $this->showDropdown = true;
    }
    public function render()
    {
        return view('livewire.forms.autocomplete');
    }
}
