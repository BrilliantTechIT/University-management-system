<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\User;
use Auth;
use Session;
class RolesScreen extends Component
{
    public function render()
    {
        $data=User::get();
        return view('livewire.roles-screen',['users'=>$data])->layout('layouts.master');
    }
    public function get_Rols(Request $request)
    {
        $data=Roles::Find($request->id);
        Session::put('roles',$data);
        return back();
    }
    public function set_rols(Request $request)
    {
        // return $request->id_user;
        $data2=Roles::Where('id_user',$request->id_user)->first();
        $data=Roles::find($data2->id);
        // return $request->Store_exchange;
        $data->Dashbord=$request->Dashbord==null?0:1;
        $data->Users=$request->Users==null?0:1;
        $data->Group=$request->Group==null?0:1;
        $data->Roles=$request->Roles==null?0:1;
        $data->Financial_exchange=$request->Financial_exchange==null?0:1;
        $data->Store_exchange=$request->Store_exchange==null?0:1;
        $data->vacation_request=$request->vacation_request==null?0:1;
        $data->buy_request=$request->buy_request==null?0:1;
        $data->ok_Financial_exchange=$request->ok_Financial_exchange==null?0:1;
        $data->ok_Store_exchange=$request->ok_Store_exchange==null?0:1;
        $data->ok_vacation_request=$request->ok_vacation_request==null?0:1;
        $data->ok_buy_request=$request->ok_buy_request==null?0:1;
        $data->show_Financial_exchange=$request->show_Financial_exchange==null?0:1;
        $data->show_Store_exchange=$request->show_Store_exchange==null?0:1;
        $data->show_vacation_request=$request->show_vacation_request==null?0:1;
        $data->show_buy_request=$request->show_buy_request==null?0:1;
        $data->send_message=$request->send_message==null?0:1;
        $data->send_file=$request->send_file==null?0:1;
        $data->new_task=$request->new_task==null?0:1;
        $data->save();
      return back();
      
    }
}
