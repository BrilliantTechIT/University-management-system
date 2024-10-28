<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CashStore;
use Illuminate\Http\Request;
use Auth;
use App\Models\Roles;
use App\Models\User;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
class ShowCashStore extends Component
{
    public $se='';
    public $id_user_select=0;
    use WithPagination, WithoutUrlPagination;
    public function render()
    {
        
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->show_Store_exchange==0)
        {
            return view('lock')->layout('layouts.s');
        }

          
        $searchTerm=$this->se;
        $search_user=[];
        if ($this->id_user_select<=0) {
            $search_user=User::Select('id')->get();
            # code...
        } else {
            $search_user=User::Select('id')->Where('id',$this->id_user_select)->get();
            
            # code...
        }
        $ok=CashStore::Where('stute',1)->where(function($query) use ($searchTerm) {
            $query->where('item', 'like', '%' . $searchTerm . '%')
                  ->orWhere('num', 'like', '%' . $searchTerm . '%')
                  ->orWhere('unite', 'like', '%' . $searchTerm . '%')
                  ->orWhere('note', 'like', '%' . $searchTerm . '%');
        })
        ->whereIn('create_by', $search_user)
        ->orderby('id','desc')->paginate(5);
        $cash=CashStore::Where('stute',3)->where(function($query) use ($searchTerm) {
            $query->where('item', 'like', '%' . $searchTerm . '%')
                  ->orWhere('num', 'like', '%' . $searchTerm . '%')
                  ->orWhere('unite', 'like', '%' . $searchTerm . '%')
                  ->orWhere('note', 'like', '%' . $searchTerm . '%');
        })
        ->whereIn('create_by', $search_user)
        ->orderby('id','desc')->paginate(5);
        $usall=User::Where('runstute',1)->get();

        return view('livewire.show-cash-store',['ok'=>$ok,'cash'=>$cash,'usall'=>$usall])->layout('layouts.master');
    }

    public function CashStore($id)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->show_Store_exchange==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $ask=CashStore::find($id);
        $ask->stute=3;
        $ask->cash_by=Auth::id();
        $ask->save();
        
 
      

    }

    public function BackCashStore($id)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->show_Store_exchange==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $ask=CashStore::find($id);
        $ask->stute=1;
        $ask->save();
        
 
        return back();  

    }
}
