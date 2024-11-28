<?php

use App\Livewire\NotesWorkspace;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(NotesWorkspace::class)
        ->assertStatus(200);
});
