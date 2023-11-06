<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CashMoneyTable;
use Illuminate\Http\Request;
use Auth;
use App\Models\Roles;
use App\Models\User;
class ShowMoneyCash extends Component
{
    public function render()
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->show_Financial_exchange==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $ok=CashMoneyTable::Where('stute',1)->orderby('id','desc')->get();
        $cash=CashMoneyTable::Where('stute',3)->orderby('id','desc')->get();
        return view('livewire.show-money-cash',['ok'=>$ok,'cash'=>$cash])->layout('layouts.master');
    }

    public function CashMoney(Request $request)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->show_Financial_exchange==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $ask=CashMoneyTable::find($request->id);
        $ask->stute=3;
        $ask->cash_by=Auth::id();
        $ask->save();
        
 
        return back();  

    }

    public function BackCashMoney(Request $request)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->show_Financial_exchange==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $ask=CashMoneyTable::find($request->id);
        $ask->stute=1;
        $ask->save();
        
 
        return back();  

    }
}
