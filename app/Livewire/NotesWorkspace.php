<?php

namespace App\Livewire;

use App\Models\Note;
use Livewire\Attributes\Layout;
use Livewire\Component;

class NotesWorkspace extends Component
{
    public $content;

    public function save()
    {
        $note = new Note;

        $note->content = $this->content;

        $note->save();
    }

    public function delete($note_id)
    {
        $note = Note::find($note_id);

        $note->delete();
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.notes-workspace', [
            'notes' => Note::all(),
        ]);
    }
}
