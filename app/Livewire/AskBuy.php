<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AskBuyTable;
use Illuminate\Http\Request;
use Auth;
use App\Models\Roles;
use App\Models\User;
class AskBuy extends Component
{
    public function render()
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->buy_request==0)
        {
            return view('lock')->layout('layouts.s');
        }

        $data=AskBuyTable::Where('create_by',Auth::id())->get();
        $roles=Roles::Where('ok_buy_request',1)->Select('id_user')->get();
        $us=User::Where('runstute',1)->Wherein('id',$roles)->get();
        return view('livewire.ask-buy',['cash'=>$data,'Users'=>$us])->layout('layouts.master');
    }
    public function StoreAskBuyTable(Request $request)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->buy_request==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $data =new AskBuyTable();      
        $data->item=$request->item;
        $data->num=$request->num;
        $data->unite=$request->unite;
        $data->note=$request->note;
        $data->create_by=Auth::id();
        $data->save();
        return back()->with('done','done');

    }

    public function DeleteAskBuyTable(Request $request)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->buy_request==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $data=AskBuyTable::find($request->id);
        if($data->stute==0)
        {
            $data->delete();
        }
        return back();
    }
}
