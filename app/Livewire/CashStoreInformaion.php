<?php

namespace App\Livewire;

use Livewire\Component;
use Str;
use App\Models\CashStore;
use App\Models\ImageForCashMoney;
use App\Models\ChatingTable;
use Auth;
use Livewire\WithFileUploads;

class CashStoreInformaion extends Component
{
    use WithFileUploads;

    public $id;
    public $IsEdite=false;
    public $Message;
    public $Fi;
    

    public $item;
    public $unite;
    public $num;
    public $note;
    public function render()
    {
        $cash=CashStore::where('uid',$this->id)->first();
        $files=ImageForCashMoney::Where('id_Cash',$cash->id)->get();
        $files2 = ImageForCashMoney::select('file')->where('id_Cash', $cash->id)->get()->toArray();
        $images = array_filter($files2, function ($file) {
            if (isset($file['file'])) {
                // Use pathinfo to get the file extension
                $extension = pathinfo($file['file'], PATHINFO_EXTENSION);
                // Check if the extension is one of the allowed types
                return in_array(strtolower($extension), ['jpeg', 'png', 'jpg', 'gif', 'svg']);
            }
            return false;
        });
        $chats=ChatingTable::Where('id_order',$this->id)->Where('mtype','cstore')->get();
        return view('livewire.cash-store-informaion',['cash'=>$cash,'images'=>$images,'files'=>$files,'chats'=>$chats]);
    }
    public function EditeStute($v)
    {
        // dd('d');
        $this->IsEdite=$v;
        $cash=CashStore::where('uid',$this->id)->first();
        $this->item=$cash->item;
        $this->unite=$cash->unite;
        $this->note=$cash->note;
        $this->num=$cash->num;
    }

    public function SaveEdite()
    {
        $cash=CashStore::where('uid',$this->id)->first();
        if($cash->stute==0){
            $cash->item=$this->item;
            $cash->unite=$this->unite;
            $cash->note=$this->note;
            $cash->num=$this->num;
            $cash->save();
            $this->IsEdite=0;
        }
    }

    public function sm()
    {
         
        $c=new ChatingTable();
        $c->id_send=Auth::id();
        $c->message=$this->Message;
        $c->mtype="cstore";
        $c->id_order=$this->id;
        $c->save();
        $this->reset('Message');

    }
    public function AddFile()
    {
       if($this->Fi)
       {
       
        $f =time(). '.' . $this->Fi->extension();
        $this->Fi->storeAs(path: 'public/ImageForCash/', name:$f);
        $im=new ImageForCashMoney();
        $im->file=$f;
        $im->id_Cash=$this->id;
        $im->save();
       }
    }

}
