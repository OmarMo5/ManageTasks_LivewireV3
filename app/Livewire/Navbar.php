<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Url;
use App\Models\Task;

class Navbar extends Component
{
    //#[Url]
    #[Url(as: 'q',keep: true)]
    public $search;

    public function render()
    {
        $result=[];
        if(strlen($this->search)>2){
            $result = Task::where('title','like','%'.$this->search.'%')->get();
        }
        return view('livewire.navbar',compact('result'));
    }
}
