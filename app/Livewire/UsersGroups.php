<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\gruops;
use Illuminate\Http\Request;
use Auth;
class UsersGroups extends Component
{
    public function render()
    {
        $data=gruops::all();
        return view('livewire.users-groups',['groups'=>$data])->layout('layouts.master');
    }
    public function Store_gruops(Request $request)
    {
        $data=new gruops();
        $data->name=$request->name;
        $data->create_by=Auth::id();
        $data->save();
        return back();
    }
}

