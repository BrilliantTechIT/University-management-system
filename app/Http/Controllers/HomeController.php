<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\Roles;

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
        $id=User::find(Auth::id());
        if($id->runstute==1)
        {
            $data=Roles::Where('id_user',Auth::id())->first();
            // return $data;
            return view('index',['ro'=>$data]);

        }
        else{
            Auth::logout();
            return redirect('/');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
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
