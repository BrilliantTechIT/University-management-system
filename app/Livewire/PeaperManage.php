<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PepersTable;
use App\Models\peper_gets;
use App\Models\peper_iamges;
use App\Models\User;
class PeaperManage extends Component
{
    public $reply;
    public $id_peper;
    public $user_id;
    public function render()
    {

        $peper=PepersTable::where('uid',$this->id_peper)->first();
        $r=peper_gets::where('id_peper',$this->id_peper)->get();
        $files=peper_iamges::where('id_peper',$this->id_peper)->get();
        $users=User::all();
        return view('livewire.peaper-manage',['peper'=>$peper,'replies'=>$r,'users'=>$users,'files'=>$files]);
      
       
    }
    public function forword(){
        $d=peper_gets::where('id_peper',$this->id_peper)->where('user_id',$this->user_id)->first();
        if(!$d){
            // dd($d);
            $r=new peper_gets();
            $r->id_peper=$this->id_peper;
            $r->user_id=$this->user_id;
            $r->save(); 
            
            
            $n=new HomeController();
            $n->saveNotefcation('ورقة رسمية جديدة',$this->user_id,'mainpeper/'. $this->id_peper);
        }else{
           session()->flash('error','السبب: موجود من قبل لا يمكنك اعادة التوجيه');
        }
    }

    public function submitReply(){
    //    dd($this->reply);
        $r=peper_gets::where('id_peper',$this->id_peper)->where('user_id',auth()->user()->id)->first();
        $r->response=$this->reply;
         
        $n=new HomeController();
        $n->saveNotefcation('صدر قرار بخصوص ورقة رسمية لك',$r->peper->id_sends,'mainpeper/'.$this->id_peper);
        $r->save(); 
      
    }
}
