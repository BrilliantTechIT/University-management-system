<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PepersTable;
use App\Models\peper_gets;
class ShowReports extends Controller
{
    public function mainpeper($id){
        $peper=PepersTable::where('uid',$id)->first();
        $r=peper_gets::where('id_peper',$id)->get();
              if($r->where('user_id',auth()->user()->id)->count()>0||$peper->id_sends==auth()->user()->id){
       return view('reports.mainpeper',['id_peper'=>$id,'peper'=>$peper]);

        }else{
            return redirect()->back();
        }

    }
}
