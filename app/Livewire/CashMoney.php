<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CashMoneyTable;
use Illuminate\Http\Request;
use Auth;
use App\Models\Roles;
use App\Models\User;

class CashMoney extends Component
{
    public function render()
    {
        $data=CashMoneyTable::Where('create_by',Auth::id())->get();
        $roles=Roles::Where('ok_Financial_exchange',1)->Select('id_user')->get();
        $us=User::Wherein('id',$roles)->get();
        return view('livewire.cash-money',['cash'=>$data,'Users'=>$us])->layout('layouts.master');
    }
    public function StoreCashMoneyTable(Request $request)
    {
        $data =new CashMoneyTable();
        
        $data->money=$request->money;
        $data->omlh=$request->omlh;
        $data->opposite=$request->opposite;
        $data->create_by=Auth::id();
        $data->save();
        return back()->with('done','done');

    }

    public function DeleteCashMoneyTable(Request $request)
    {
        $data =CashMoneyTable::find($request->id);
        if($data->stute==0)
        {
            $data->delete();
        }
        return back();
    }
}
