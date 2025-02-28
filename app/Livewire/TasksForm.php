<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Forms\TaskForm;
use Livewire\Attributes\On;
use App\Models\Task;

class TasksForm extends Component
{
    public TaskForm $form;

    public function save()
    {
        $this->validate();
        $this->form->createTask();
        $this->dispatch('task-created');
    }

    #[On('edit-task')]
    public function editTask($id)
    {
        $task = Task::findOrFail($id);
        $this->form->updateTask($task);
    }

    public function refresh()
    {
        $this->form->reset();
    } 

    public function render()
    {
        return view('livewire.tasks-form');
    }
}
