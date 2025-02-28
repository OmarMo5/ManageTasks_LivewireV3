<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\counter;
use App\Livewire\ManageTodos;
use App\Livewire\TasksIndex;
use App\Livewire\ImageIndex;

Route::get('/', function () {
    return view('welcome');
});

Route::group(["prefix"=>"wire"],function(){
    Route::get('/task', TasksIndex::class)->name("livewire.task");
    Route::get('/image', ImageIndex::class)->name("livewire.image");
});
