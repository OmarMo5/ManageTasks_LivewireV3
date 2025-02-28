<?php

namespace App\Livewire;

use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class TasksList extends Component
{
    use WithPagination;

    public function placeholder()
    {
        return view('skeleton');
    } 

    #[Computed()]
    public function showTask(){
        return Task::orderBy('id', 'desc')->paginate(5);
    }

    #[Computed(persist: true)]
    public function tasksByStatus()
    {
        return Task::select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->orderBy('status', 'desc')
            ->get();
    }

    public function delete(Task $task)
    {
        $task->delete();
        unset($this->tasksByStatus);
    } 

    public function changeStatus($id, $status)
    {
        $task = Task::find($id);
        $task->update([
            'status' => $status
        ]);
        unset($this->tasksByStatus);
    }

    #[On('task-created')]
    public function taskCreated()
    {
        unset($this->tasksByStatus);
    }

    public function render()
    {
        return view('livewire.tasks-list');
    }
}
