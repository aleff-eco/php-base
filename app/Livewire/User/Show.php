<?php

namespace App\Livewire\User;

use Livewire\Component;

class Show extends Component
{
    public $user;
    
    public function render()
    {
        return view('livewire.user.show');
    }
}
