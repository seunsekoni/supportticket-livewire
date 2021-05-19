<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Comments extends Component
{
    public $comments = [
        [
            'comment' => 'Hello there!!!',
            'created_at' => '3 mins ago',
            'user' => 'Seun'
        ]
    ];

    public $newComment;

    public function addComment()
    {
        array_unshift($this->comments, [
            'comment' => $this->newComment,
            'created_at' => Carbon::now()->diffForHumans(),
            'user' => 'Seun'
        ]);

        $this->newComment = '';
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
