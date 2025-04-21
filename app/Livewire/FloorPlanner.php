<?php

namespace App\Livewire;

use Livewire\Component;

class FloorPlanner extends Component
{
    public $floor;
    public $tables;
    public $current_table;

    public function mount()
    {
        $this->tables = [];
    }
    public function newtable()
    {
        $this->tables[rand(1,999)] = ['value' => rand(0, 99999999999)];
    }
    public function render()
    {
        return view('livewire.floor-planner');
    }
}
