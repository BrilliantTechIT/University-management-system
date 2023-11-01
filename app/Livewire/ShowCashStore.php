<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CashStore;
use Illuminate\Http\Request;
use Auth;
use App\Models\Roles;
use App\Models\User;
class ShowCashStore extends Component
{
    public function render()
    {
        $ok=CashStore::Where('stute',1)->orderby('id','desc')->get();
        $cash=CashStore::Where('stute',3)->orderby('id','desc')->get();
        return view('livewire.show-cash-store',['ok'=>$ok,'cash'=>$cash])->layout('layouts.master');
    }

    public function CashStore(Request $request)
    {
        $ask=CashStore::find($request->id);
        $ask->stute=3;
        $ask->cash_by=Auth::id();
        $ask->save();
        
 
        return back();  

    }

    public function BackCashStore(Request $request)
    {
        $ask=CashStore::find($request->id);
        $ask->stute=1;
        $ask->save();
        
 
        return back();  

    }
}
