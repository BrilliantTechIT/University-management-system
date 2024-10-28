<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CashMoneyTable;
use Illuminate\Http\Request;
use Auth;
use App\Models\Roles;
use App\Models\User;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
class ShowMoneyCash extends Component
{
    public $se='';
    public $id_user_select=0;
    use WithPagination, WithoutUrlPagination;
    public function render()
    {
        // dd('dd');
        $r4=Roles::Where('id_user',Auth::id())->first();
        $searchTerm=$this->se;
        $search_user=[];
        if ($this->id_user_select<=0) {
            $search_user=User::Select('id')->get();
            # code...
        } else {
            $search_user=User::Select('id')->Where('id',$this->id_user_select)->get();
            
            # code...
        }
        if($r4->show_Financial_exchange==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $ok=CashMoneyTable::Where('stute',1)->where(function($query) use ($searchTerm) {
            $query->where('money', 'like', '%' . $searchTerm . '%')
                  ->orWhere('omlh', 'like', '%' . $searchTerm . '%')
                  ->orWhere('uid', 'like', '%' . $searchTerm . '%')
                  ->orWhere('opposite', 'like', '%' . $searchTerm . '%');
        })
        ->whereIn('create_by', $search_user)
        ->orderby('id','desc')->paginate(5);
;
        $cash=CashMoneyTable::Where('stute',3)->where(function($query) use ($searchTerm) {
            $query->where('money', 'like', '%' . $searchTerm . '%')
                  ->orWhere('omlh', 'like', '%' . $searchTerm . '%')
                  ->orWhere('uid', 'like', '%' . $searchTerm . '%')
                  ->orWhere('opposite', 'like', '%' . $searchTerm . '%');
        })
        ->whereIn('create_by', $search_user)
        ->orderby('id','desc')->paginate(5);
;
        $usall=User::Where('runstute',1)->get();
        return view('livewire.show-money-cash',['ok'=>$ok,'cash'=>$cash,'usall' => $usall ]);
    }

    public function CashMoney($id)
    {
        // dd($id);
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->show_Financial_exchange==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $ask=CashMoneyTable::find($id);
        $ask->stute=3;
        $ask->cash_by=Auth::id();
        $ask->save();
        
 
      

    }

    public function BackCashMoney($id)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->show_Financial_exchange==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $ask=CashMoneyTable::find($id);
        $ask->stute=1;
        $ask->save();
        
 
        

    }
}
