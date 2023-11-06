<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AskOffTable;
use Illuminate\Http\Request;
use Auth;
use App\Models\Roles;
use App\Models\User;
class AskOff extends Component
{
    public function render()
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->vacation_request==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $data=AskOffTable::Where('create_by',Auth::id())->get();
        $roles=Roles::Where('ok_vacation_request',1)->Select('id_user')->get();
        $us=User::Where('runstute',1)->Wherein('id',$roles)->get();
        return view('livewire.ask-off',['off'=>$data,'Users'=>$us])->layout('layouts.master');
    }

    public function StoreAskoffTable(Request $request)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->vacation_request==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $data =new AskOffTable();
        
        $data->fromDate=$request->fromDate;
        $data->toDate=$request->toDate;
        $data->note=$request->note;
        $data->create_by=Auth::id();
        $data->save();
        return back()->with('done','done');

    }
    public function DeleteAskoffTable(Request $request)
    {
        $r4=Roles::Where('id_user',Auth::id())->first();
        if($r4->vacation_request==0)
        {
            return view('lock')->layout('layouts.s');
        }
        $data =AskOffTable::find($request->id);
        if($data->stute==0)
        {
            $data->delete();
        }
        return back();
    }
}
