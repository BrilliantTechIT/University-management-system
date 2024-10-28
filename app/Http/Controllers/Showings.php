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

    public function Pepers()
    {
        return view('admins.pepers');
        
    }
}
