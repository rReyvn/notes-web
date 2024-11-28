<?php

namespace App\Livewire;

use App\Models\Note;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class NotesWorkspace extends Component
{
    use WithoutUrlPagination, WithPagination;

    public $title;

    public $content;

    public $searchNote;

    public function updatingSearchNote()
    {
        $this->resetPage();
    }

    public function save()
    {
        if ($this->title == '' && $this->content == '') {
            return;
        }

        $note = new Note;

        $note->create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $this->reset(['title', 'content']);

        Session()->flash('success', [
            'title' => 'Create Note',
            'message' => 'Note saved successfully!',
        ]);
    }

    public function delete($note_id)
    {
        $note = Note::find($note_id);

        $note->delete();

        Session()->flash('success', [
            'title' => 'Delete Note',
            'message' => 'Note deleted successfully!',
        ]);
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
                ->simplePaginate(9),
        ]);
    }
}
