<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;

class Login extends Component
{
    public $name;
    public $email;


    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email'
    ];

    public function submit()
    {
        $this->validate();

    }
    // protected $rules = [
    //     'email' => 'required|email',
    //     'password' => 'required'
    // ];

    // protected $message = [
    //     'email.required' => 'The Email Address cannot be empty.',
    //     'email.email' => 'The Email Address format is not valid.',
    // ];

    // public function submit()
    // {
    //     $this->validate();
    // }
    public function render()
    {
        return view('livewire.form.login');
    }
}
