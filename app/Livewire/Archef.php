<?php

namespace App\Livewire;

use Livewire\Component;
use Auth;
use App\Models\Roles;
use App\Models\ArchafTable;
use App\Models\User;
use Illuminate\Http\Request;

class Archef extends Component
{
    public function render()
    {
        $data=ArchafTable::Where('create_by',Auth::id())->orderby('id','desc')->get();
        return view('livewire.archef',['data'=>$data])->layout('layouts.master');
    }

    public function SaveFiles(Request $request)
    {
        
        if ($request->hasFile('message')) {
            $image = $request->file('message');
            $imageName =time() . '.' . $image->extension();
            $image->move(public_path('system/files'), $imageName);
            $data=new ArchafTable();
            $data->title=$request->title;   

            $data->FileName=$imageName;   
            $data->create_by=Auth::id();
            $data->Save();
        }
        return back();
    }
}
