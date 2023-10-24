<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;

class UsersScreen extends Component
{
    public function render()
    {
        $data=User::Select('id','name','phone','email','image','runstute')->get();
        return view('livewire.users-screen',['user'=>$data])->layout('layouts.master');
    }

    public function Store_user(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('users_image'), $imageName);

        $data=new User();
        $data->name=$request->name;
        $data->phone=$request->Phone;
        $data->email=$request->email;
        $data->password=$request->password;
        $data->image=$imageName;

        $data->save();

        $id_user=User::max('id');
      
        $roles=new Roles();
        $roles->id_user=$id_user;
        $roles->Dashbord=0;
        $roles->Users=0;
        $roles->Group=0;
        $roles->Roles=0;
        $roles->Financial_exchange=0;
        $roles->Store_exchange=0;
        $roles->vacation_request=0;
        $roles->buy_request=0;
        $roles->ok_Financial_exchange=0;
        $roles->ok_Store_exchange=0;
        $roles->ok_vacation_request=0;
        $roles->ok_buy_request=0;
        $roles->show_Financial_exchange=0;
        $roles->show_Store_exchange=0;
        $roles->show_vacation_request=0;
        $roles->show_buy_request=0;
        $roles->send_message=0;
        $roles->send_file=0;
        $roles->new_task=0;
        $roles->save();
        

        }
        return back();


    }
    public function Stop_user(Request $request)
    {
        // return $request->id_user;
        $data=User::find($request->id_user);
        // return $data->runstute;
        if($data->runstute==1)
        {
            $data->runstute=0;
            
        }
        else
        {
            $data->runstute=1;

        }
        $data->save();
        return back();
    }
}
