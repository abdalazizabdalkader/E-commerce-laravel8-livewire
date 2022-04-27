<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use App\Models\Setting;
use Livewire\Component;

class ContactusComponent extends Component
{
    public $name;
    public $email;
    public $mobile;
    public $comment;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'comment' => 'required',
        ]);
    }
    public function contactus()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'comment' => 'required',
        ]);
        $contact = new Contact();
        $contact->name = $this->name;
        $contact->email = $this->email;
        $contact->mobile= $this->mobile;
        $contact->comment = $this->comment;
        $contact->save();
        session()->flash('message','Your comment has been sended successfully!');
    }
    public function render()
    {
        $setting = Setting::find(1);
        return view('livewire.contactus-component',['setting'=>$setting])->layout('layouts.base');
    }
}
