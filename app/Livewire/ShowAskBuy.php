<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AskBuyTable;
use Illuminate\Http\Request;
use Auth;
use App\Models\Roles;
use App\Models\User;
class ShowAskBuy extends Component
{
    public function render()
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->show_buy_request==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $ok=AskBuyTable::Where('stute',1)->orderby('id','desc')->get();
        $cash=AskBuyTable::Where('stute',3)->orderby('id','desc')->get();
        return view('livewire.show-ask-buy',['ok'=>$ok,'cash'=>$cash])->layout('layouts.master');
    }

    public function AskBuyTable(Request $request)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->show_buy_request==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $ask=AskBuyTable::find($request->id);
        $ask->stute=3;
        $ask->cash_by=Auth::id();
        $ask->save();
        
 
        return back();  

    }

    public function BackAskBuyTable(Request $request)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->show_buy_request==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $ask=AskBuyTable::find($request->id);
        $ask->stute=1;
        $ask->save();
        
 
        return back();  

    }
}
