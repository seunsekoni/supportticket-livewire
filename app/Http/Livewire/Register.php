<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $form = [
        'name' => '',
        'email' => '',
        'password' => '',
        'password_confirmation' => ''
    ];

    /**
     * Register a new user
     * @return array
     */
    public function submit()
    {
        $this->validate([
            'form.name' => 'required',
            'form.email' => 'required',
            'form.password' => 'required|confirmed',
        ]);

        User::create($this->form);
        session()->flash('message', 'Registration was successful, please login');
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
