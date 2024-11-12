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
use App\Models\ChatingTable;
use Hash;
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
        $tokens=session()->get('token');
        if($tokens!=""||$tokens!=null)
        {
            $id->token=$tokens;
            $id->save();
        }
        
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

    public function ChangePassword(Request $request)
    {
        if(Auth::id()==19)
        {
            $d=User::find($request->id);
            $d->password=Hash::make($request->newpassword);
            $d->save();
        }
       
        return back();
    }

    public function Puttoken(Request $request)
    {       
      session()->put("token",$request->t);
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
        // $data=Roles::Where('id_user',Auth::id())->first();
        //     // return $data;
            
        //     $t=tasking_users::Where('user_id',Auth::id())->Where('stute',0)->orderby('id','desc')->get();
            
        //     $okmoney=count(CashMoneyTable::Where('stute',0)->get());
        //     $okstore=count(CashStore::Where('stute',0)->get());
        //     $okaskbuy=count(AskBuyTable::Where('stute',0)->get());
        //     $okaskoff=count(AskOffTable::Where('stute',0)->get());

        //     $showmoney=count(CashMoneyTable::Where('stute',1)->get());
        //     $showstore=count(CashStore::Where('stute',1)->get());
        //     $showaskbuy=count(AskBuyTable::Where('stute',1)->get());
        //     $showaskoff=count(AskOffTable::Where('stute',1)->get());
            
            return view('index');

    }

    public function chatok(Request $request) {
        // $data;
        if($request->ad=='ad')
        {
            $r4=Roles::Where('id_user',Auth::id())->first();
            if($r4->ok_Financial_exchange==0)
            {
                // return 'ss';
                return view('lock')->layout('layouts.s');
            }
            // $data=ChatingTable::Where('id_order',$request->id)->get();
            
        }
        else
        {
            $d=CashMoneyTable::Where('id',$request->id)->first();
            if($d->create_by!=Auth::id())
            {
                // return 'ss';
                return back(); 
            }
           

        }
        // dd($request->mtype);
        $data=ChatingTable::Where('id_order',$request->id)->where('mtype',$request->mtype)->get();
        return view('chat',['m'=>$data,'orid'=>$request->id]);
    }


   
}


/*

 */