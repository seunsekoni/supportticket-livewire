<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $form = [
        'email' => '',
        'password' => ''
    ];

    public function submit()
    {
        $this->validate([
            'form.email' => 'required',
            'form.password' => 'required',
        ]);

        Auth::attempt($this->form);
        session()->flash('message', 'Login successful');
        return redirect()->route('home');
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'form.email' => 'required|email',
            'form.password' => 'required'
        ]);
    }

    public function render()
    {
        return view('livewire.login');
    }
}
