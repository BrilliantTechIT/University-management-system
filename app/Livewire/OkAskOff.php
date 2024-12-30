<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AskOffTable;
use Illuminate\Http\Request;
use Auth;
use App\Models\Roles;
use App\Models\User;
use Session;
class OkAskOff extends Component
{

    public function render()
    {
      $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->ok_vacation_request==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $wait=AskOffTable::Where('stute',0)->orderby('id','desc')->get();
        $ok=AskOffTable::Where('stute',1)->orderby('id','desc')->get();
        $no=AskOffTable::Where('stute',2)->orderby('id','desc')->get();
        $cash=AskOffTable::Where('stute',3)->orderby('id','desc')->get();
        $roles=Roles::Where('show_vacation_request',1)->Select('id_user')->get();
        $us=User::Where('runstute',1)->Wherein('id',$roles)->get();
        return view('livewire.ok-ask-off',['wait'=>$wait,'ok'=>$ok,'no'=>$no,'cash'=>$cash,'us'=>$us])->layout('layouts.master');
    }

    public function StoreOkAskoff($id)
    {
      $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->ok_vacation_request==0)
        {
            return view('lock')->layout('layouts.s');
        }
       $ask=AskOffTable::find($id);
       $ask->stute=1;
       $ask->accept_by=Auth::id();
       $ask->save();

       $n=new HomeController();
       $n->saveNotefcation('تم قبول طلب اجازة لك',$ask->create_by,'ShowOff/'.$ask->uid);
       $sendto=Roles::Where('show_vacation_request',1)->get();
        foreach ($sendto as $key => $value) {
            $n=new HomeController();
            $n->saveNotefcation('طلب صرف اجازة جديد',$value->id_user,'ShowAskOff');
        }
      session()->flash('success','تم الموافقة على الطلب');
    }

    public function NoOkAskoff($id)
    {
      $r4=Roles::Where('id_user',Auth::id())->first();
      if($r4->ok_vacation_request==0)
      {
          return view('lock')->layout('layouts.s');
      }
        $ask=AskOffTable::find($id);
        if($ask->create_by==Auth::id())
        {
             session()->flash('error','لا يمكنك رفض طلبك');
             return;
        }
       if($ask->stute!=3)
       {
        $ask->stute=2;
        $ask->save();
        
        
       }
       $n=new HomeController();
       $n->saveNotefcation('تم رفض طلب اجازة لك',$ask->create_by,'ShowOff/'.$ask->uid);
      session()->flash('success','تم رفض الطلب');
    }
}
