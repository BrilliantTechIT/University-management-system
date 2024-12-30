<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AskOffTable;
use Illuminate\Http\Request;
use Auth;
use App\Models\Roles;
use App\Models\User;
use App\Models\OffTypes;
use App\Models\AskOffFiles;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use App\Http\Controllers\HomeController;

class AskOff extends Component
{
    public $file;
    use WithFileUploads;
    public $fromDate,$toDate,$note,$type=0;
    public function render()
    {
        $types=OffTypes::get();
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->vacation_request==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $data=AskOffTable::Where('create_by',Auth::id())->get();
        $roles=Roles::Where('ok_vacation_request',1)->Select('id_user')->get();
        $us=User::Where('runstute',1)->Wherein('id',$roles)->get();
        return view('livewire.ask-off',['off'=>$data,'Users'=>$us,'types'=>$types])->layout('layouts.master');
    }

    public function StoreAskoffTable()
    {
        // dd($this->fromDate,$this->toDate,$this->note,$this->type);
        $this->validate([
            'fromDate'=>'required',
            'toDate'=>'required',
            'note'=>'required',
            'type'=>'required',
        ],[
            'fromDate.required'=>'يجب ادخال تاريخ البداية',
            'toDate.required'=>'يجب ادخال تاريخ النهاية',
            'note.required'=>'يجب ادخال الملاحظات',
            'type.required'=>'يجب اختيار النوع',    
        ]);
        $uid=Str::uuid();
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->vacation_request==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $type=OffTypes::find($this->type);
        $fromDate = \Carbon\Carbon::parse($this->fromDate);
        $toDate = \Carbon\Carbon::parse($this->toDate);
        $daysDifference = $toDate->diffInDays($fromDate) + 1;
        if($type->num??0>0)
        {
            if($type->num<$daysDifference)
        {
            session()->flash('error','لا يمكن ان يكون العدد اكبر من العدد المسموح به');
                return;
            }
        }
        $data =new AskOffTable();
        $data->uid=$uid;
        $data->fromDate=$this->fromDate;
        $data->toDate=$this->toDate;
        $data->note=$this->note;
        $data->type=$this->type;
        $data->create_by=Auth::id();
        $data->save();
        foreach($this->file??[] as $file)
        {
           $d=new AskOffFiles();
           $d->id_askoff=$uid;
           $d->file=$file->store('askoff','public');
           $d->save();
        }

        $sendto=Roles::Where('ok_vacation_request',1)->get();
        foreach ($sendto as $key => $value) {
            $n=new HomeController();
            $n->saveNotefcation('طلب اجازة جديد',$value->id_user,'Okaskoff');
        }

       session()->flash('success','تم اضافة الاجازة بنجاح');
       $this->reset();  
    }
    public function DeleteAskoffTable($id)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->vacation_request==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $data =AskOffTable::find($id);
        if($data->stute==0)
        {
            $data->delete();
        }
       
    }
}
