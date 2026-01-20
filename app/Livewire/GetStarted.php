<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class GetStarted extends Component
{
    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.get-started');
    }
}
