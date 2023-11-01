<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CashStore;
use Illuminate\Http\Request;
use Auth;
use App\Models\Roles;
use App\Models\User;
use Session;
class OKCashStore extends Component
{
    public function render()
    {
        $wait=CashStore::Where('stute',0)->orderby('id','desc')->get();
        $ok=CashStore::Where('stute',1)->orderby('id','desc')->get();
        $no=CashStore::Where('stute',2)->orderby('id','desc')->get();
        $cash=CashStore::Where('stute',3)->orderby('id','desc')->get();
        $roles=Roles::Where('show_Financial_exchange',1)->Select('id_user')->get();
        $us=User::Wherein('id',$roles)->get();
        return view('livewire.o-k-cash-store',['wait'=>$wait,'ok'=>$ok,'no'=>$no,'cash'=>$cash,'us'=>$us])->layout('layouts.master');
    }

    public function StoreOkCashstore(Request $request)
    {
       $ask=CashStore::find($request->id);
       $ask->stute=1;
       $ask->accept_by=Auth::id();
       $ask->save();
       Session::flash('stute_ok_store',0);
       return back()->with('OkCashstore',$ask); 
    }

    public function NoOkCashstore(Request $request)
    {
       
       $ask=CashStore::find($request->id);
       if($ask->stute!=3)
       {
        $ask->stute=2;
        $ask->save();
        Session::flash('stute_ok_store',0);
        return back()->with('NoOkCashstore',$ask);  
        
       }
       return back();
      

    }
}
