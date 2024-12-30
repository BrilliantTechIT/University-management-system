<?php

namespace App\Livewire;

use Livewire\Component;
use Str;
use App\Models\CashMoneyTable;
use App\Models\ImageForCashMoney;
use App\Models\ChatingTable;
use Auth;
use App\Models\Roles;
use App\Http\Controllers\HomeController;

use Livewire\WithFileUploads;
class CashMoneyInformaion extends Component
{
    use WithFileUploads;
    public $id;
    public $Message;
    public $Fi;
    public $IsEdite=false;

    public $money;
    public $omlh;
    public $note;

   
    public function EditeStute($v)
    {
        // dd('d');
        $this->IsEdite=$v;
        $cash=CashMoneyTable::where('uid',$this->id)->first();
        $this->money=$cash->money;
        $this->omlh=$cash->omlh;
        $this->note=$cash->opposite;
    }

    public function SaveEdite()
    {
        $cash=CashMoneyTable::where('uid',$this->id)->first();
        if($cash->stute==0){
            $cash->money=$this->money;
            $cash->omlh=$this->omlh;
            $cash->opposite=$this->note;
            $cash->save();
            $this->IsEdite=0;
        }
    }
    public function sm()
    {
         
        $c=new ChatingTable();
        $c->id_send=Auth::id();
        $c->message=$this->Message;
        $c->mtype="cmoney";
        $c->id_order=$this->id;
        $c->save();

        $cash=CashMoneyTable::where('uid',$this->id)->first();
        if($cash->create_by==Auth::id())
        {
            $sendto=Roles::Where('ok_Financial_exchange',1)->get();

            foreach ($sendto as $key => $value) {
                $n=new HomeController();
                $n->saveNotefcation('رسالة في دردشة مالية',$value->id_user,'CashMoneyInformaion/'.$this->id);
            }
        }
        else {
            $n=new HomeController();
                $n->saveNotefcation('رسالة في دردشة مالية',$cash->create_by,'CashMoneyInformaion/'.$this->id);
        }
        $this->reset('Message');
        

    }
    public function render()
    {
// dd('s');
        $cash=CashMoneyTable::where('uid',$this->id)->first();
        $files=ImageForCashMoney::Where('id_Cash',$this->id)->get();
        $files2 = ImageForCashMoney::select('file')->where('id_Cash', $this->id)->get()->toArray();
        
        $images = array_filter($files2, function ($file) {
            if (isset($file['file'])) {
                // Use pathinfo to get the file extension
                $extension = pathinfo($file['file'], PATHINFO_EXTENSION);
                // Check if the extension is one of the allowed types
                return in_array(strtolower($extension), ['jpeg', 'png', 'jpg', 'gif', 'svg']);
            }
            return false;
        });
        $chats=ChatingTable::Where('id_order',$this->id)->Where('mtype','cmoney')->get();
        // dd($this->id);
       
        return view('livewire.cash-money-informaion',['cash'=>$cash,'images'=>$images,'files'=>$files,'chats'=>$chats]);
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
