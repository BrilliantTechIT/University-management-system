<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\gruops;
use Illuminate\Http\Request;
use Auth;
use App\Models\Roles;
use App\Models\User;
use App\Models\ConnectGruopUser;

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
        $user=User::all();
        $ConnectGruopUser=ConnectGruopUser::all();

        return view('livewire.users-groups',['groups2'=>$data,'user'=>$user,'ConnectGruopUser'=>$ConnectGruopUser])->layout('layouts.master');
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


    public function Store_connect(Request $request)
    {
        // return $request->usersID;
        foreach ($request->usersID as $key => $value) {
            $data =new ConnectGruopUser();
            $data->user_id=$value;
            $data->group_id=$request->group;
            $data->save();
            
        }
        return back();
    }
    public function Delete_connect(Request $request)
    {
        // return $request->id;
        $data=ConnectGruopUser::find($request->id);
        $data->delete(); 
        return back();
    }

    public function Delete_group(Request $request)
    {
        // return $request->id;
        $data=gruops::find($request->id);
        $data->delete(); 
        return back();
    }
}

