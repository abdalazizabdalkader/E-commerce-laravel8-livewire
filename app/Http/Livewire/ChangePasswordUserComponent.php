<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePasswordUserComponent extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;

    public function updated($fieleds)
    {
        $this->validateOnly($fieleds,[
            'current_password'=>'required',
            'password'=>'required|min:8|confirmed|different:current_password'
        ]);
    }

    public function changePassword()
    {
        $this->validate([
            'current_password'=>'required',
            'password'=>'required|min:8|confirmed|different:current_password'
        ]);

        if(Hash::check($this->current_password,Auth::user()->password))
        {
            $user = User::findOrFail(Auth::user()->id);
            $user->password = Hash::make($this->password);
            $user->save();
            session()->flash('pass_succes','Password has been changed successfully!');
            return redirect()->route('home');
        }else{
            session()->flash('pass_error','Password dos\'nt match!');
        }

    }

    public function render()
    {
        return view('livewire.change-password-user-component')->layout('layouts.base');
    }
}
