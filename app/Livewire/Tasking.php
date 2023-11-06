<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\tasking_users;
use App\Models\tasking as tasking_table;
use Auth;
use App\Models\Roles;
use Illuminate\Http\Request;

class Tasking extends Component
{
    public function render()
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->new_task==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $data=User::Where('runstute',1)->get();
        $tasking=tasking_table::Select('id')->Where('create_by',Auth::id())->get();
        $task_u=tasking_users::Wherein('task_id',$tasking)->get();
        
        return view('livewire.tasking',['users'=>$data,'task'=>$task_u])->layout('layouts.master');
    }
    public function Store_task(Request $request)
    {
        // return ;
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->new_task==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $tasking_table=new tasking_table();
        $tasking_table->name=$request->name;
        $tasking_table->create_by=Auth::id();
        $tasking_table->save();
        $id=tasking_table::max('id');
        foreach ($request->users as $key => $value) {
            $tasking_users=new tasking_users();
            $tasking_users->user_id=$value;
            $tasking_users->task_id=$id;
            $tasking_users->stute=0;
            $tasking_users->save();
        }
       
        return back()->with('success', $id);
        
    }
    public function DaneTask(Request $request)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        // if($r4->new_task==0)
        // {
        //     return view('lock')->layout('layouts.s');
        // }
        $tasking_users= tasking_users::find($request->id);   
        $tasking_users->stute=1;
        $tasking_users->save();
        return back();
    }

    public function NoTask(Request $request)
    {
        $tasking_users= tasking_users::find($request->id);   
        $tasking_users->stute=2;
        $tasking_users->save();
        return back();

    }

   
    
}
