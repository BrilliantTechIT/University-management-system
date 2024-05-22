<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\CashMoneyTable;
use Illuminate\Http\Request;
use Auth;
use App\Models\Roles;
use App\Models\User;
use App\Models\ImageForCashMoney;
use Livewire\WithFileUploads;

class CashMoney extends Component
{
    use WithFileUploads;

    public $money;
    public $omlh;
    public $note;
    public $file;
    public $roles=[];
   
    public function render()
    {
        // dd($this->maxID);
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->Financial_exchange==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $data=CashMoneyTable::Where('create_by',Auth::id())->get();
        $roles=Roles::Where('ok_Financial_exchange',1)->Select('id_user')->get();
        $us=User::Where('runstute',1)->Wherein('id',$roles)->Select('id','name','image')->get();
        
        $this->roles=$us;
        return view('livewire.cash-money',['cash'=>$data,'Users'=>$us])->layout('layouts.master');
    }
    public function StoreCashMoneyTable(Request $request)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->Financial_exchange==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $data =new CashMoneyTable();
        
        $data->money=$this->money;
        $data->omlh=$this->omlh;
        $data->opposite=$this->note;
        
        $data->create_by=Auth::id();
        $data->save();
        $maxCashID=CashMoneyTable::max('id');
        
        foreach ($this->file??[] as $key => $value) {
            
            $f =time().$key. '.' . $value->extension();
            $value->storeAs(path: 'public/ImageForCash/', name:$f);
            $im=new ImageForCashMoney();
            $im->file=$f;
            $im->id_Cash=$maxCashID;
            $im->save();

        }
      
        $this->dispatch('SendResultMoney', $this->roles,Auth::user());
       

    }

    public function DeleteCashMoneyTable(Request $request)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->Financial_exchange==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $data =CashMoneyTable::find($request->id);
        if($data->stute==0)
        {
            $data->delete();
        }
        return back();
    }
    // public  function ClearMaxid()
    // {
    //     $this->maxID=null;
    // }
}
