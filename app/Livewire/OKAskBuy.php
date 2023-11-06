<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AskBuyTable;
use Illuminate\Http\Request;
use Auth;
use App\Models\Roles;
use App\Models\User;
use Session;
class OKAskBuy extends Component
{
    public function render()
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->ok_buy_request==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $wait=AskBuyTable::Where('stute',0)->orderby('id','desc')->get();
        $ok=AskBuyTable::Where('stute',1)->orderby('id','desc')->get();
        $no=AskBuyTable::Where('stute',2)->orderby('id','desc')->get();
        $cash=AskBuyTable::Where('stute',3)->orderby('id','desc')->get();
        $roles=Roles::Where('show_Financial_exchange',1)->Select('id_user')->get();
        $us=User::Where('runstute',1)->Wherein('id',$roles)->get();
        return view('livewire.o-k-ask-buy',['wait'=>$wait,'ok'=>$ok,'no'=>$no,'cash'=>$cash,'us'=>$us])->layout('layouts.master');
    }

    public function StoreOKAskBuy(Request $request)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->ok_buy_request==0)
        {
            return view('lock')->layout('layouts.s');
        }
       $ask=AskBuyTable::find($request->id);
       $ask->stute=1;
       $ask->accept_by=Auth::id();
       $ask->save();
       Session::flash('stute_ok_buy',1);
       return back()->with('OKAskBuy',$ask); 
    }

    public function NoOKAskBuy(Request $request)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->ok_buy_request==0)
        {
            return view('lock')->layout('layouts.s');
        }
       $ask=AskBuyTable::find($request->id);
       if($ask->stute!=3)
       {
        $ask->stute=2;
        $ask->save();
        Session::flash('stute_ok_buy',0);
        return back()->with('NoOKAskBuy',$ask);  
        
       }
       return back();
      

    }
}
