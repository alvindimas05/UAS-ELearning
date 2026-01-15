<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class Contact extends Component
{
    public $name = '';
    public $email = '';
    public $subject = '';
    public $message = '';

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'subject' => 'required|min:5',
        'message' => 'required|min:10',
    ];

    public function submit()
    {
        $this->validate();

        // Here you would typically send an email or save to database
        // For now we'll just flash a success message
        session()->flash('message', 'Thank you for contacting us! We will get back to you soon.');

        $this->reset(['name', 'email', 'subject', 'message']);
    }

    public function render()
    {
        return view('livewire.frontend.contact');
    }
}
