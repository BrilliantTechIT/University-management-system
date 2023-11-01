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
        $ok=CashMoneyTable::Where('stute',1)->orderby('id','desc')->get();
        $cash=CashMoneyTable::Where('stute',3)->orderby('id','desc')->get();
        return view('livewire.show-money-cash',['ok'=>$ok,'cash'=>$cash])->layout('layouts.master');
    }

    public function CashMoney(Request $request)
    {
        $ask=CashMoneyTable::find($request->id);
        $ask->stute=3;
        $ask->cash_by=Auth::id();
        $ask->save();
        
 
        return back();  

    }

    public function BackCashMoney(Request $request)
    {
        $ask=CashMoneyTable::find($request->id);
        $ask->stute=1;
        $ask->save();
        
 
        return back();  

    }
}
