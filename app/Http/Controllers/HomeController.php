<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('index');
    }
    public function d()
    {
        $data = ['item1', 'item2', 'item3'];

        // Serialize the array into a JSON string
        $serializedData = json_encode($data);

        // Use exec to execute the Node.js script and pass serialized data as an argument
        $output = exec('assets/js/testnodejs.js ' . escapeshellarg($serializedData));
        // return $output;
        return back();
    }
}
