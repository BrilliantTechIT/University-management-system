<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Showings extends Controller
{
    public function CashMoney()
    {
        return view('admins.cashmoney');
        
    }

    public function CashStore()
    {
        return view('admins.cashStore');
        
    }

    public function CashMoneyInformation($id)
    {
        // dd($id);
        return view('admins.CashMoneyInformaion',['id'=>$id]);
        
    }

    public function CashStoreInformation($id)
    {
        // dd($id);
        return view('admins.CasshStoreInformaion',['id'=>$id]);
        
    }

    public function OKCashmoney()
    {
        return view('admins.ok-cash-money');
        
    }

    public function ShowMoneyCash()
    {
        return view('admins.showCashMoney');
        
    }

    public function okcashstore()
    {
        return view('admins.okcashstore');
        
    }

    public function showcahstore()
    {
        return view('admins.showcahstore');
        
    }

    public function OffType()
    {
        return view('admins.OFFTYPE');
        
    }

    public function askOff()
    {
        return view('admins.askoff');
        
    }

    public function ShowOff($id)
    {
        return view('admins.showOff',['id'=>$id]);
        
    }
    public function Okaskoff()
    {
        return view('admins.okaskoff');
    }

    public function ShowAskOff()
    {
        return view('admins.showaskoffall');
        
    }

    public function YearBlance()
    {
        return view('admins.yearblance');
        
    }

    public function Pepers()
    {
        return view('admins.pepers');
        
    }
}
