<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AskOffTable;
use Illuminate\Http\Request;
use Auth;
use App\Models\Roles;
use App\Models\User;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
class ShowAskOff extends Component
{
    public $from_date,$to_date,$user_id;
    use WithPagination, WithoutUrlPagination;
   
    public function render()
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->show_vacation_request==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $u=User::all();
        $okQuery = AskOffTable::where('stute', 1);
        $cashQuery = AskOffTable::where('stute', 3);
    
        // إضافة فلتر التاريخ إذا تم تحديده
        if ($this->from_date && $this->to_date) {
            $okQuery->whereBetween('fromDate', [$this->from_date, $this->to_date]);
            $cashQuery->whereBetween('fromDate', [$this->from_date, $this->to_date]);
        }
    
        // إضافة فلتر المستخدم إذا تم تحديده
        if ($this->user_id) {
            $okQuery->where('create_by', $this->user_id);
            $cashQuery->where('create_by', $this->user_id);
        }
    
        // تنفيذ الاستعلام مع الترتيب والتقسيم
        $ok = $okQuery->orderBy('id', 'desc')->paginate(21);
        $cash = $cashQuery->orderBy('id', 'desc')->paginate(21);
    
        return view('livewire.show-ask-off',['ok'=>$ok,'cash'=>$cash,'users'=>$u])->layout('layouts.master');
    }
  

    public function DoneAskOffyear($id)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->show_vacation_request==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $ask=AskOffTable::find($id);
        $fromDate = \Carbon\Carbon::parse($ask->fromDate);
        $toDate = \Carbon\Carbon::parse($ask->toDate);
        $daysDifference = $toDate->diffInDays($fromDate) + 1;
        // dd($daysDifference);
        $ask->stute=3;
        $ask->cash_by=Auth::id();
        $ask->is_for_year=1;
        $ask->save();
        // dd($ask->create_by);
        $u=User::find($ask->create_by);
        $u->year_balance=$u->year_balance+$daysDifference;
        $u->save();
 
       session()->flash('success','تم الموافقة على الطلب');

    }
    
    public function DoneAskOff($id)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->show_vacation_request==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $ask=AskOffTable::find($id);
        $ask->stute=3;
        $ask->cash_by=Auth::id();
        $ask->save();
        
 
       session()->flash('success','تم الموافقة على الطلب');

    }

    public function BackCashMoney($id)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->show_vacation_request==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $ask=AskOffTable::find($id);
        $ask->stute=1;
        $ask->save();
        
        session()->flash('success','تم الرجوع عن الطلب');
     

    }

    public function BackCashMoneyyear($id)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->show_vacation_request==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $ask=AskOffTable::find($id);
        $fromDate = \Carbon\Carbon::parse($ask->fromDate);
        $toDate = \Carbon\Carbon::parse($ask->toDate);
        $daysDifference = $toDate->diffInDays($fromDate) + 1;
        $u=User::find($ask->create_by);
        if($ask->is_for_year==1)
        {
            $u->year_balance=$u->year_balance-$daysDifference;
            $ask->is_for_year=0;
        }
        $u->save();
        $ask->stute=1;
        $ask->save();
        
        session()->flash('success','تم الرجوع عن الطلب');
     

    }
}
