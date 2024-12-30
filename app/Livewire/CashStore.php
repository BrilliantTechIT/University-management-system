<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CashStore as CashStoreTable;
use Illuminate\Http\Request;
use Auth;
use App\Models\Roles;
use App\Models\User;
use Str;
use App\Http\Controllers\HomeController;

class CashStore extends Component
{
    public $item;
    public $num;
    public $unite;
    public $note;
    public $roles=[];

    public function render()
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->Store_exchange==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $data=CashStoreTable::Where('create_by',Auth::id())->orderby('id','desc')->get();
        $roles=Roles::Where('ok_Store_exchange',1)->Select('id_user')->get();
        $us=User::Where('runstute',1)->Wherein('id',$roles)->Select('id','name','image')->get();
        $this->roles=$us;
         
        return view('livewire.cash-store',['cash'=>$data,'Users'=>$us])->layout('layouts.master');
    }

    public function StoreCashStoreTable()
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->Store_exchange==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $data =new CashStoreTable();      
        $data->item=$this->item;
        $data->num=$this->num;
        $data->unite=$this->unite;
        $data->note=$this->note;
        $data->uid=$uid=Str::uuid();
        $data->create_by=Auth::id();
        $data->save();
        // return back()->with('done','done');

        $sendto=Roles::Where('ok_Store_exchange',1)->get();

        foreach ($sendto as $key => $value) {
            $n=new HomeController();
            $n->saveNotefcation('طلب صرف مخزني جديد',$value->id_user,'okcashstore');
        }
        $this->dispatch('SendResult', $this->roles,Auth::user());

    }

    public function DeleteCashStoreTable($id)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->Store_exchange==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $data =CashStoreTable::find($id);
        if($data->stute==0 && $data->create_by==Auth::id())
        {
            $data->delete();
        }
        return back();
    }
}
