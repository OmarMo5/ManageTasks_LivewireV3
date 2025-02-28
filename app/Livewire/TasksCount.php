<?php

namespace App\Livewire;

use Livewire\Component;

class TasksCount extends Component
{
    #[Reactive]
    public $tasksByStatus;
    public function render()
    {
        return view('livewire.tasks-count');
    }
}
