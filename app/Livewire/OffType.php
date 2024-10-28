<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\OffTypes;
use Auth;
class OffType extends Component
{
    public $name;
    public $num;
    public function render()
    {
        $ta=OffTypes::get();
        return view('livewire.off-type',['types'=>$ta]);
    }

    public function Save()
    {
        $row=new OffTypes();
        $row->name=$this->name;
        $row->num=$this->num;
        $row->created_by=Auth::id();
        $row->save();
        $this->reset();
    }
    public function editestute($id)
    {
      $row=OffTypes::find($id);
      $row->stute=!$row->stute;
      $row->save();  
    }
}
