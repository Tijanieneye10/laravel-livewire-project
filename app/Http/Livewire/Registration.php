<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Registration extends Component
{
    public $name, $email, $password, $confirmPassword, $validatedData;

    // for Real time validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'name' => 'min:6|required',
            'email' => 'email|required',
            'password' => 'min:6|required|confirmed'
        ]);
    }

    public function addUser()
    {

        User::create(['name' => $this->name, 'email' => $this->email, 'password' => $this->password]);
        session()->flash('message', 'User successfully added.');
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->confirmPassword = '';
    }
    public function render()
    {
        return view('livewire.registration');
    }
}
