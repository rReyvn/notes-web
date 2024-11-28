<?php

use App\Livewire\NotesWorkspace;
use Illuminate\Support\Facades\Route;

Route::get('/', NotesWorkspace::class)->name('workspace');
