<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithPagination;
use \Illuminate\Support\Str;

class Comments extends Component
{
    use WithPagination;

    public $newComment;

    public $image;

    public $ticketId;

    protected $listeners = [
        'fileUpload' => 'handleFileUpload',
        'ticketSelected' => 'ticketSelected'
    ];

    public function ticketSelected($ticketId)
    {
        $this->ticketId = $ticketId;
    }

    public function handleFileUpload($imageData)
    {
        $this->image = $imageData;
    }
    public function storeImage()
    {
        if (!$this->image) {
            return null;
        }

        $img = ImageManagerStatic::make($this->image)->encode('jpg');
        $name = Str::random() . '.jpg';

        Storage::disk('public')->put($name, $img);

        return $name;
    }

    public function addComment()
    {
        $this->validate([
            'newComment' => 'required|min:10'
        ]);

        $createdComment = Comment::create([
            'body' => $this->newComment,
            'user_id' => 1,
            'support_ticket_id' => $this->ticketId,
            'image' => $this->storeImage()
        ]);

        $this->newComment = '';
        $this->image = '';
        session()->flash('message', 'Comment added successfully');
    }

    /**
     * Delete a comment.
     */
    public function remove($commentId)
    {
        $comment = Comment::find($commentId);
        $comment->delete();
        Storage::disk('public')->delete($comment->image);
        session()->flash('message', 'Comment deleted successfully');
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
        $initialComments = Comment::where('support_ticket_id', $this->ticketId)->paginate(10);
        return view('livewire.comments', [
            'comments' => $initialComments
        ]);
    }
}
