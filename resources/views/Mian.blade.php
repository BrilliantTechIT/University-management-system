@extends('layouts.master')
@section('contain')
<style>
    .main-div{
        
        
        background-color: #fff;
        box-shadow: 2px 2px 2px;
        margin: 20px;
    }
    .sub-div{
       
        
        text-align: center
    }
</style>
<div class="row" >
   @foreach ($g as $item)
   <div class="col-md-6 col-12 ">
    <div class="main-div">
        <div class="row">
            <div class="col-md-6 col-12 sub-div bg bg-info" >
                <center><img style="width: 52%;li"  src="assets/img/logo.png" alt="" srcset=""></center>
            </div>

            <div class="col-md-6 col-12 sub-div" >
                <center>
                    <h3>{{$item->name}}</h3>
                <small>
                    @foreach ($con->Where('group_id',$item->id) as $key=>$c)
                     
                     {{$c->users->name}}-
                        
                   
                    @endforeach
                </small>
                
                </center>
                {{-- {{$con->Where('group_id',$item->id)}} --}}
                @if ($con->where('group_id', $item->id)->filter(function($item) {
                    return $item->user_id === Auth::id();
                })->isNotEmpty())
                    
                <a href="{{route('oprations')}}" class="btn btn-info">فتح العمليات</a>
                @endif
            </div>
            
        </div>
    </div>
</div>
   @endforeach




</div>
@endsection