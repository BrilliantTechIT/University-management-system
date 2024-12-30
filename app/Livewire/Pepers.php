<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Models\peper_gets;
use App\Models\peper_iamges;
use App\Models\PepersTable;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use App\Http\Controllers\HomeController;

// use Livewire\WithPagination;
class Pepers extends Component
{
    use WithPagination, WithoutUrlPagination; 

    use WithFileUploads;
    // public $text;
    // public $users;
    // public $image;
    public $search='';
    public $filter_user=0;
    public $go_or_come='go';
    public function render()
    {
        // dd($this->filter_user);
        $user=User::all();
        if($this->go_or_come=='go'){
           
            $pepers = PepersTable::where('id_sends',auth()->user()->id)->where(function($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('contain', 'like', '%' . $this->search . '%');
            })->orderBy('created_at', 'desc')->paginate(21);
        }
        else{
          if($this->filter_user==0){
            $get=peper_gets::Where('user_id',auth()->user()->id)->orderBy('created_at','desc')->paginate(21);
            $pepers=PepersTable::wherein('uid',$get->pluck('id_peper'))->where(function($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('contain', 'like', '%' . $this->search . '%');
            })
            ->paginate(21); 

          }
          else{
            $get=peper_gets::Where('user_id',$this->filter_user)->orderBy('created_at','desc')->paginate(21);
            $pepers=PepersTable::wherein('uid',$get->pluck('id_peper'))->where(function($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('contain', 'like', '%' . $this->search . '%');
            })
            ->paginate(21); 
          }
        }
        
       
        
        return view('livewire.pepers',['user'=>$user,'pepers'=>$pepers]);
    }

    public function Send(Request $request)
    {
        // dd($this->text);
        $request->validate([
            'text'=>'required',
            'users'=>'required',
            'name'=>'required',
            
        ],[
            'text.required'=>'يجب ادخال النص',
            'users.required'=>'يجب ادخال الاشخاص',
            'name.required'=>'يجب ادخال الاسم',
        ]);
        $uid=Str::uuid();
        $d=new PepersTable();
        $d->name=$request->name;
        $d->id_sends=auth()->user()->id;
        $d->contain=$request->text;
        $d->uid=$uid;
        $d->save();
        
        foreach($request->image??[] as $image){
            $d=new peper_iamges();
            $d->id_peper=$uid;
            $d->image=$this->uploadImage($image);
            $d->save();
        }
        foreach($request->users??[] as $user){
            $d=new peper_gets();
            $d->id_peper=$uid;
            $d->user_id=$user;
            $d->save();
        }
        $users=User::WhereIn('id',$request->users)->get();
        session()->flash('success','تم ارسال النص');
        $sendto=$request->users??[];

        foreach ($sendto as $key => $value) {
            $n=new HomeController();
            $n->saveNotefcation('ورقة رسمية جديدة',$value,'mainpeper/'. $uid);
        }
        return redirect()->back()->with([
            'get_user' =>$users,
            'success' => 'تم الحفظ بنجاح' // Arabic for "Saved successfully"
        ]);
        

    }

    public function uploadImage($file)
    {
        $path = $file->store('uploads', 'public');
        return Storage::url($path);
    }
}
