<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashbordScreenController extends Controller
{
    public function show()
    {
       return view('DashbordScreen'); 
    }
}
