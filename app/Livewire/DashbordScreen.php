<?php

namespace App\Livewire;

use Livewire\Component;

class DashbordScreen extends Component
{
    public function render()
    {
        return view('livewire.dashbord-screen')->layout('layouts.master');
    }
}
