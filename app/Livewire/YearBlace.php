<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
class YearBlace extends Component
{
    public $max_balance;
    public $user_id;
    public $search;
    public function render()
    {
        $users=User::where('name','like','%'.$this->search.'%')->get();
        return view('livewire.year-blace',['users'=>$users]);
    }
    public function updateYearBalance(){
        $user=User::find($this->user_id);
        $user->max_balance=$this->max_balance;
        $user->save();
        $this->dispatch('closeModal');
    }
    public function editYearBalance($id){
        $this->user_id=$id;
        $user=User::find($id);
        $this->max_balance=$user->max_balance;
        $this->dispatch('editYearBalance');
    }   
    public function updateAllUsers(){
        $users=User::all();
        foreach($users as $user){
            $user->max_balance=$this->max_balance;
            $user->save();
        }
    }
}
