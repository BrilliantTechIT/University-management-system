<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CashMoneyTable;
use Illuminate\Http\Request;
use Auth;
use App\Models\Roles;
use App\Models\User;
use Session;
class OkCashMoney extends Component
{
    public function render()
    {
        $wait=CashMoneyTable::Where('stute',0)->orderby('id','desc')->get();
        $ok=CashMoneyTable::Where('stute',1)->orderby('id','desc')->get();
        $no=CashMoneyTable::Where('stute',2)->orderby('id','desc')->get();
        $cash=CashMoneyTable::Where('stute',3)->orderby('id','desc')->get();
        $roles=Roles::Where('show_Financial_exchange',1)->Select('id_user')->get();
        $us=User::Wherein('id',$roles)->get();
        return view('livewire.ok-cash-money',['wait'=>$wait,'ok'=>$ok,'no'=>$no,'cash'=>$cash,'us'=>$us])->layout('layouts.master');
    }
    public function StoreOkCashMoney(Request $request)
    {
       $ask=CashMoneyTable::find($request->id);
       $ask->stute=1;
       $ask->accept_by=Auth::id();
       $ask->save();
       Session::flash('syute_ok_money',0);
       return back()->with('Okcashmoney',$ask); 
    }

    public function NoOkCashMoney(Request $request)
    {
       
       $ask=CashMoneyTable::find($request->id);
       if($ask->stute!=3)
       {
        $ask->stute=2;
        $ask->save();
        Session::flash('syute_ok_money',0);
        return back()->with('NoOkcashmoney',$ask);  
        
       }
       return back();
      

    }
}