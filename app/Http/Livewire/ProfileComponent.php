<?php

namespace App\Http\Livewire;

use App\Models\profile as UserProfile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileComponent extends Component
{
    public function render()
    {
        $userprofile = UserProfile::where('user_id',Auth::user()->id)->first();
        if(!$userprofile)
        {
            $userProfile = new UserProfile();
            $userProfile->user_id = Auth::user()->id;
            $userProfile->save();
        }
        $user = User::find(Auth::user()->id);
        return view('livewire.user.profile-component',['user'=>$user])->layout('layouts.base');
    }
}
