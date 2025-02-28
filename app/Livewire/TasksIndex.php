<?php

namespace App\Livewire;

use Livewire\Component;

class TasksIndex extends Component
{
    public function render()
    {
        return view('livewire.tasks-index')->title("Tasks");
    }
}
