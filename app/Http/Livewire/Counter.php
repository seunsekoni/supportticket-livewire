<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 1;
    /**
     * Increment number
     * @return int
     */
    public function increment()
    {
        $this->count++;
    }


    /**
     * Decrement number
     * @return int
     */
    public function decrement()
    {
        $this->count--;
    }

    /**
     * Render a view
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.counter');
    }
}
