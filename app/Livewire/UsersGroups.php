<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\gruops;
use Illuminate\Http\Request;
use Auth;
use App\Models\Roles;

class UsersGroups extends Component
{
    public function render()
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->Group==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $data=gruops::all();
        return view('livewire.users-groups',['groups'=>$data])->layout('layouts.master');
    }
    public function Store_gruops(Request $request)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->Group==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $data=new gruops();
        $data->name=$request->name;
        $data->create_by=Auth::id();
        $data->save();
        return back();
    }
}

