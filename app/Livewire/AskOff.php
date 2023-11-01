<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AskOffTable;
use Illuminate\Http\Request;
use Auth;
use App\Models\Roles;
use App\Models\User;
class AskOff extends Component
{
    public function render()
    {
        $data=AskOffTable::Where('create_by',Auth::id())->get();
        $roles=Roles::Where('ok_vacation_request',1)->Select('id_user')->get();
        $us=User::Wherein('id',$roles)->get();
        return view('livewire.ask-off',['off'=>$data,'Users'=>$us])->layout('layouts.master');
    }
}
