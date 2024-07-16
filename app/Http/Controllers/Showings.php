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
}
