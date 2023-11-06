<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Roles;
use Auth;
class DashbordScreen extends Component
{
    public function render()
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->Dashbord==0)
        {
            return view('lock')->layout('layouts.s');
        }
        return view('livewire.dashbord-screen')->layout('layouts.master');
    }
}
