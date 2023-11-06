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

    public function StoreOkAskoff(Request $request)
    {
      $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->ok_vacation_request==0)
        {
            return view('lock')->layout('layouts.s');
        }
       $ask=AskOffTable::find($request->id);
    //    return $ask;
       $ask->stute=1;
       $ask->accept_by=Auth::id();
       $ask->save();
       Session::flash('stute_ok_off',1);
       return back()->with('OkAskoff',$ask); 
    }

    public function NoOkAskoff(Request $request)
    {
      $r4=Roles::Where('id_user',Auth::id())->first();
      if($r4->ok_vacation_request==0)
      {
          return view('lock')->layout('layouts.s');
      }
       $ask=AskOffTable::find($request->id);
       if($ask->stute!=3)
       {
        $ask->stute=2;
        $ask->save();
        Session::flash('stute_ok_off',0);
        return back()->with('NoOkAskoff',$ask);  
        
       }
       return back();
      

    }
}
