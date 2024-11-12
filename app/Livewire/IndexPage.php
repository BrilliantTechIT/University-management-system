<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Roles;
use App\Models\tasking_users;
use App\Models\CashMoneyTable;
use App\Models\CashStore;
use App\Models\AskBuyTable;
use App\Models\AskOffTable;
use Auth;
class IndexPage extends Component
{
    public function render()
    {
        $data=Roles::Where('id_user',Auth::id())->first();
        // return $data;
        
        $t=tasking_users::Where('user_id',Auth::id())->Where('stute',0)->orderby('id','desc')->get();
        
        $okmoney=count(CashMoneyTable::Where('stute',0)->get());
        $okstore=count(CashStore::Where('stute',0)->get());
        $okaskbuy=count(AskBuyTable::Where('stute',0)->get());
        $okaskoff=count(AskOffTable::Where('stute',0)->get());

        $showmoney=count(CashMoneyTable::Where('stute',1)->get());
        $showstore=count(CashStore::Where('stute',1)->get());
        $showaskbuy=count(AskBuyTable::Where('stute',1)->get());
        $showaskoff=count(AskOffTable::Where('stute',1)->get());
        
        return view('livewire.index-page',['ro'=>$data,'task'=>$t,'okmoney'=>$okmoney,'okstore'=>$okstore,'okaskbuy'=>$okaskbuy,'okaskoff'=>$okaskoff,'showmoney'=>$showmoney,'showstore'=>$showstore,'showaskbuy'=>$showaskbuy,'showaskoff'=>$showaskoff]);
    }
}
