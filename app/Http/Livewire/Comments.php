<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Livewire\Component;

class Comments extends Component
{
    public $comments;

    public $newComment;

    public function addComment()
    {
        $this->validate([
            'newComment' => 'required|min:10'
        ]);

        $createdComment = Comment::create([
            'body' => $this->newComment,
            'user_id' => 1,
        ]);

        // Prepend the the creted comment to the collection.
        $this->comments->prepend($createdComment);
        $this->newComment = '';
        session()->flash('message', 'Comment added successfully');
    }

    /**
     * Delete a comment.
     */
    public function remove($commentId)
    {
        $this->comments = $this->comments->except($commentId);
        $comment = Comment::find($commentId);
        $comment->delete();
        session()->flash('message', 'Comment deleted successfully');
    }

    public function mount($initialComments)
    {
        $this->comments = $initialComments;
    }

    /**
     * Check for validation real time
     */
    public function updated($field)
    {
        $this->validateOnly($field, [
            'newComment' => 'required|min:10'
            ]);
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
