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
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->show_Store_exchange==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $ok=CashStore::Where('stute',1)->orderby('id','desc')->get();
        $cash=CashStore::Where('stute',3)->orderby('id','desc')->get();
        return view('livewire.show-cash-store',['ok'=>$ok,'cash'=>$cash])->layout('layouts.master');
    }

    public function CashStore(Request $request)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->show_Store_exchange==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $ask=CashStore::find($request->id);
        $ask->stute=3;
        $ask->cash_by=Auth::id();
        $ask->save();
        
 
        return back();  

    }

    public function BackCashStore(Request $request)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->show_Store_exchange==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $ask=CashStore::find($request->id);
        $ask->stute=1;
        $ask->save();
        
 
        return back();  

    }
}
