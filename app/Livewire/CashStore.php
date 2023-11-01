<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CashStore as CashStoreTable;
use Illuminate\Http\Request;
use Auth;
use App\Models\Roles;
use App\Models\User;
class CashStore extends Component
{
    public function render()
    {
        $data=CashStoreTable::Where('create_by',Auth::id())->get();
        $roles=Roles::Where('ok_Store_exchange',1)->Select('id_user')->get();
        $us=User::Wherein('id',$roles)->get();
        return view('livewire.cash-store',['cash'=>$data,'Users'=>$us])->layout('layouts.master');
    }

    public function StoreCashStoreTable(Request $request)
    {
        $data =new CashStoreTable();
        
        $data->item=$request->item;
        $data->num=$request->num;
        $data->unite=$request->unite;
        $data->note=$request->note;
        $data->create_by=Auth::id();
        $data->save();
        return back()->with('done','done');

    }

    public function DeleteCashStoreTable(Request $request)
    {
        $data =CashStoreTable::find($request->id);
        if($data->stute==0)
        {
            $data->delete();
        }
        return back();
    }
}
