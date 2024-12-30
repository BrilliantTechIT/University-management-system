<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CashStore;
use Illuminate\Http\Request;
use Auth;
use App\Models\Roles;
use App\Models\User;
use Session;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use App\Http\Controllers\HomeController;

class OKCashStore extends Component
{
    public $se='';
    public $id_user_select=0;
    use WithPagination, WithoutUrlPagination; 
    public function render()
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->ok_Store_exchange==0)
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
        $wait=CashStore::Where('stute',0)->orderby('id','desc')->get();
        $ok=CashStore::Where('stute',1) ->where(function($query) use ($searchTerm) {
            $query->where('item', 'like', '%' . $searchTerm . '%')
                  ->orWhere('num', 'like', '%' . $searchTerm . '%')
                  ->orWhere('unite', 'like', '%' . $searchTerm . '%')
                  ->orWhere('note', 'like', '%' . $searchTerm . '%');
        })
        ->whereIn('create_by', $search_user)
        ->orderby('id','desc')->paginate(5);
        $no=CashStore::Where('stute',2)->where(function($query) use ($searchTerm) {
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
        $roles=Roles::Where('show_Financial_exchange',1)->Select('id_user')->get();
        $us=User::Where('runstute',1)->Wherein('id',$roles)->get();
        $usall=User::Where('runstute',1)->get();

        return view('livewire.o-k-cash-store',['wait'=>$wait,'ok'=>$ok,'no'=>$no,'cash'=>$cash,'us'=>$us,'usall'=>$usall])->layout('layouts.master');
    }

    public function StoreOkCashstore($id)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->ok_Store_exchange==0)
        {
            return view('lock')->layout('layouts.s');
        }
       $ask=CashStore::find($id);
       $ask->stute=1;
       $ask->accept_by=Auth::id();
       $ask->save();
       

       $n=new HomeController();
       $n->saveNotefcation('تم قبول طلب مخزني لك',$ask->create_by,'CashStoreInformaion/'.$ask->uid);
       $sendto=Roles::Where('show_Store_exchange',1)->get();
        foreach ($sendto as $key => $value) {
            $n=new HomeController();
            $n->saveNotefcation('طلب صرف مخزني جديد',$value->id_user,'showcahstore');
        }
    //    Session::flash('stute_ok_store',1);
    //    return back()->with('OkCashstore',$ask); 
    }

    public function NoOkCashstore($id)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->ok_Store_exchange==0)
        {
            return view('lock')->layout('layouts.s');
        }
       
       $ask=CashStore::find($id);
       if($ask->stute!=3)
       {
        $ask->stute=2;
        $ask->save();
        // Session::flash('stute_ok_store',0);
        // return back()->with('NoOkCashstore',$ask);  
        
       }

       $n=new HomeController();
       $n->saveNotefcation('تم رفض طلب مخزني لك',$ask->create_by,'CashStoreInformaion/'.$ask->uid);
    //    return back();
      

    }
}
