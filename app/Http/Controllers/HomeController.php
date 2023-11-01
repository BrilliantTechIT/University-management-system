<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\Roles;
use App\Models\tasking_users;

use App\Models\tasking;
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
            
            $t=tasking_users::Where('user_id',Auth::id())->Where('stute',0)->orderby('id','desc')->get();

            
            return view('index',['ro'=>$data,'task'=>$t]);

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
