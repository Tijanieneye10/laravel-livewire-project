<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $form = ['email' => '', 'password' => ''];

    // login user
    public function loginUser()
    {
        if(! Auth::attempt($this->form)) return session()->flash('message', 'Invalid Login details.');
        return redirect(route('home'));
    }
    public function render()
    {
        return view('livewire.login');
    }
}
