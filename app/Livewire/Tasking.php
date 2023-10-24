<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Http\Request;

class Tasking extends Component
{
    public function render()
    {
        $data=User::get();
        return view('livewire.tasking',['users'=>$data])->layout('layouts.master');
    }
    public function Store_task(Request $request)
    {
        return $request->users;
    }
    
}
