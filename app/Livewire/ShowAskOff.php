<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AskOffTable;
use Illuminate\Http\Request;
use Auth;
use App\Models\Roles;
use App\Models\User;
class ShowAskOff extends Component
{
    public function render()
    {
        $ok=AskOffTable::Where('stute',1)->orderby('id','desc')->get();
        $cash=AskOffTable::Where('stute',3)->orderby('id','desc')->get();
        return view('livewire.show-ask-off',['ok'=>$ok,'cash'=>$cash])->layout('layouts.master');
    }

    public function DoneAskOff(Request $request)
    {
        $ask=AskOffTable::find($request->id);
        $ask->stute=3;
        $ask->cash_by=Auth::id();
        $ask->save();
        
 
        return back();  

    }

    public function BackCashMoney(Request $request)
    {
        $ask=AskOffTable::find($request->id);
        $ask->stute=1;
        $ask->save();
        
 
        return back();  

    }
}
