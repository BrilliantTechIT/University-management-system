<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ChatingTable;
use Auth;
use Livewire\WithFileUploads;
use App\Models\AskOffFiles;
use App\Models\AskOffTable;
use App\Models\OffTypes;
use App\Models\Roles;
use App\Http\Controllers\HomeController;

class ShowOneAskOff extends Component
{
    use WithFileUploads;
    public $id;
    public $Message;
    public $Fi;
    public $IsEdite=false;
    public $fromDate,$toDate,$note,$type=0;


    public function render()
    {
        $types=OffTypes::Where('stute',1)->get();
        $data=AskOffTable::where('uid',$this->id)->first();
        $files=AskOffFiles::Where('id_askoff',$this->id)->get();
        $files2 = AskOffFiles::select('file')->where('id_askoff', $this->id)->get()->toArray();
        
        $images = array_filter($files2, function ($file) {
            if (isset($file['file'])) {
                // Use pathinfo to get the file extension
                $extension = pathinfo($file['file'], PATHINFO_EXTENSION);
                // Check if the extension is one of the allowed types
                return in_array(strtolower($extension), ['jpeg', 'png', 'jpg', 'gif', 'svg']);
            }
            return false;
        });
        // dd($images);
        $chats=ChatingTable::Where('id_order',$this->id)->Where('mtype','askoff')->get();
        return view('livewire.show-one-ask-off',['data'=>$data,'files'=>$files,'images'=>$images,'chats'=>$chats,'types'=>$types]);
    }
    public function sm()
    {
         
        $c=new ChatingTable();
        $c->id_send=Auth::id();
        $c->message=$this->Message;
        $c->mtype="askoff";
        $c->id_order=$this->id;
        $c->save();
        $this->reset('Message');

        $cash=AskOffTable::where('uid',$this->id)->first();

        if($cash->create_by==Auth::id())
        {
            $sendto=Roles::Where('ok_vacation_request',1)->get();

            foreach ($sendto as $key => $value) {
                $n=new HomeController();
                $n->saveNotefcation('رسالة في دردشة مخزنية',$value->id_user,'ShowOff/'.$this->id);
            }
        }
        else {
            $n=new HomeController();
                $n->saveNotefcation('رسالة في دردشة مخزنية',$cash->create_by,'CashStoreInformaion/'.$this->id);
        }
    }
    public function EditeStute($v)
    {
        // dd('d');
        
        $this->IsEdite=$v;
        $data=AskOffTable::where('uid',$this->id)->first();
        $this->fromDate=$data->fromDate;
        $this->toDate=$data->toDate;
        $this->note=$data->note;
        $this->type=$data->type;
    }
    public function SaveEdite()
    {
        $data=AskOffTable::where('uid',$this->id)->first();
        if($data->stute!=0)
        {
            session()->flash('error','لا يمكنك تعديل طلبك');
            return;
        }
        $data->fromDate=$this->fromDate;
        $data->toDate=$this->toDate;
        $data->note=$this->note;
        $data->type=$this->type;
        $data->save();
        $this->IsEdite=0;
    }

    public function AddFile()
    {
       
           $d=new AskOffFiles();
           $d->id_askoff=$this->id;
           $d->file=$this->Fi->store('askoff','public');
           $d->save();
        
       
    }
}
