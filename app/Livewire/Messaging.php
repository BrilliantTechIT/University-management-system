<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\MessagingTable;
use Auth;
use App\Models\Roles;
use App\Http\Controllers\HomeController;

class Messaging extends Component
{
    public function render()
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->send_message==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $MYmessage=MessagingTable::Where('id_user',Auth::id())->orderby('id','desc')->paginate(12);
        $MYsendedmessage=MessagingTable::Where('create_by',Auth::id())->orderby('id','desc')->paginate(12);
        
        $data=User::Where('runstute',1)->Where('runstute',1)->get();
        return view('livewire.messaging',['users'=>$data,'MYmessage'=>$MYmessage,'MYsendedmessage'=>$MYsendedmessage])->layout('layouts.master');
    }
    public function SendMessage(Request $request)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->send_message==0)
        {
            return view('lock')->layout('layouts.s');
        }
        foreach ($request->users as $key => $value) {
           $data=new MessagingTable();
           $data->id_user=$value;
           $data->tital=$request->tital;
           $data->message=$request->message;
           $data->type=0;
           $data->create_by=Auth::id();
          $data->Save();
          
          
        }

        $sendto=$request->users;

          foreach ($sendto as $key => $value) {
              $n=new HomeController();
              $n->saveNotefcation('بريد داخلي جديد',$value,'Messaging');
          }


        // return $d;
        return back()->with('us_mes',$request->users);
    }

    public function SendFiles(Request $request)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->send_message==0)
        {
            return view('lock')->layout('layouts.s');
        }
        foreach ($request->users as $key => $value) {
            if ($request->hasFile('message')) {
                $image = $request->file('message');
                $imageName =time() . '.' . $image->extension();
                $image->move(public_path('system/files'), $imageName);
                $data=new MessagingTable();
                $data->id_user=$value;
                $data->tital=$request->tital;
                $data->message=$imageName;
                $data->type=1;
                $data->create_by=Auth::id();
                $data->Save();
            }

        }
        return back()->with('us_mes',$request->users);
    }
}
