<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\Roles;
use App\Models\tasking_users;
use App\Models\AskBuyTable;
use App\Models\AskOffTable;
use App\Models\CashMoneyTable;
use App\Models\CashStore;
use App\Models\MessagingTable;
use App\Models\gruops;

use App\Models\ConnectGruopUser;


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
            $data=gruops::get();
            $con=ConnectGruopUser::get();
            return view('Mian',['g'=>$data,'con'=>$con]);
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
    public function ind(Request $request)
    {
        // $con=ConnectGruopUser::Where('group_id',$request->sendidg)->Where('user_id',Auth::id())->get();
        // if(count($con)<=0)
        // {
        //     return view('lock')->layout('layouts.s');
        // }
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
            
            return view('index',['ro'=>$data,'task'=>$t,'okmoney'=>$okmoney,'okstore'=>$okstore,'okaskbuy'=>$okaskbuy,'okaskoff'=>$okaskoff,'showmoney'=>$showmoney,'showstore'=>$showstore,'showaskbuy'=>$showaskbuy,'showaskoff'=>$showaskoff]);

    }
}


/*

 */