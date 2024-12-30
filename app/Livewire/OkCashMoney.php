<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CashMoneyTable;
use Illuminate\Http\Request;
use Auth;
use App\Models\Roles;
use App\Models\User;
use Session;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use App\Http\Controllers\HomeController;

class OkCashMoney extends Component
{
    public $se='';
    public $id_user_select=0;
    use WithPagination, WithoutUrlPagination; 
    public function render()
    {
        // dd($this->id_user_select);
        $searchTerm=$this->se;
        $search_user=[];
        if ($this->id_user_select<=0) {
            $search_user=User::Select('id')->get();
            # code...
        } else {
            $search_user=User::Select('id')->Where('id',$this->id_user_select)->get();
            
            # code...
        }
        
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->ok_Financial_exchange==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $wait=CashMoneyTable::Where('stute',0)->orderby('id','desc')->get();
        
        $ok=CashMoneyTable::Where('stute',1)
        ->where(function($query) use ($searchTerm) {
            $query->where('money', 'like', '%' . $searchTerm . '%')
                  ->orWhere('omlh', 'like', '%' . $searchTerm . '%')
                  ->orWhere('uid', 'like', '%' . $searchTerm . '%')
                  ->orWhere('opposite', 'like', '%' . $searchTerm . '%');
        })
        ->whereIn('create_by', $search_user)
        ->orderby('id','desc')->paginate(5);
        $no=CashMoneyTable::Where('stute',2)->where('money', 'like', '%' . $searchTerm . '%')
        ->where(function($query) use ($searchTerm) {
            $query->where('money', 'like', '%' . $searchTerm . '%')
                  ->orWhere('omlh', 'like', '%' . $searchTerm . '%')
                  ->orWhere('uid', 'like', '%' . $searchTerm . '%')
                  ->orWhere('opposite', 'like', '%' . $searchTerm . '%');
        })
        ->whereIn('create_by', $search_user)
        ->orderby('id','desc')->paginate(5);
        $cash=CashMoneyTable::Where('stute',3)
        ->where(function($query) use ($searchTerm) {
            $query->where('money', 'like', '%' . $searchTerm . '%')
                  ->orWhere('omlh', 'like', '%' . $searchTerm . '%')
                  ->orWhere('uid', 'like', '%' . $searchTerm . '%')
                  ->orWhere('opposite', 'like', '%' . $searchTerm . '%');
        })
        ->whereIn('create_by', $search_user)
        ->orderby('id','desc')->paginate(5);
        // dd($no);
        $roles=Roles::Where('show_Financial_exchange',1)->Select('id_user')->get();
        $us=User::Where('runstute',1)->Wherein('id',$roles)->get();
        $usall=User::Where('runstute',1)->get();
        return view('livewire.ok-cash-money', [
            'wait' => $wait,
            'ok' => $ok,
            'no' => $no,
            'cash' => $cash,
            'us' => $us,
            'usall' => $usall // Corrected here
        ])->layout('layouts.master');
            }
    public function StoreOkCashMoney($id)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->ok_Financial_exchange==0)
        {
            return view('lock')->layout('layouts.s');
        }
       $ask=CashMoneyTable::find($id);
       $ask->stute=1;
       $ask->accept_by=Auth::id();
       $ask->save();


       
       $n=new HomeController();
       $n->saveNotefcation('تم قبول طلب مالي لك',$ask->create_by,'CashMoneyInformaion/'.$ask->uid);
       $sendto=Roles::Where('show_Financial_exchange',1)->get();
        foreach ($sendto as $key => $value) {
            $n=new HomeController();
            $n->saveNotefcation('طلب صرف مالي جديد',$value->id_user,'ShowMoneyCash');
        }
    $qq= $this->dispatch('SendResultMoney', $ask->create_by,Auth::user(),'تم قبول طلب صرف لك');
    }

    public function NoOkCashMoney($id)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->ok_Financial_exchange==0)
        {
            return view('lock')->layout('layouts.s');
        }
       
       $ask=CashMoneyTable::find($id);
       if($ask->stute!=3)
       {
        $ask->stute=2;
        $ask->save();
        Session::flash('syute_ok_money',0);
        // return back()->with('NoOkcashmoney',$ask);  
        
       }
    //    return back();
      
        $n=new HomeController();
        $n->saveNotefcation('تم رفض طلب مالي لك',$ask->create_by,'CashMoneyInformaion/'.$ask->uid);
   
    }
}
