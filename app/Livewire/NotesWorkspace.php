<?php

namespace App\Livewire;

use App\Models\Note;
use Livewire\Attributes\Layout;
use Livewire\Component;

class NotesWorkspace extends Component
{
    public $title;

    public $content;

    public $searchNote;

    public function save()
    {
        $note = new Note;

        $note->create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $this->reset(['title', 'content']);
    }

    public function delete($note_id)
    {
        $note = Note::find($note_id);

        $note->delete();
    }

    // Render from layout app
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.notes-workspace', [
            // Get notes data with title or content as parameter
            'notes' => Note::where('title', 'like', '%'.$this->searchNote.'%')
                ->orWhere('content', 'like', '%'.$this->searchNote.'%')
                ->latest()
                ->get(),
        ]);
    }
}
