<div>
    
    
    <style>
        .chat-list {
    padding: 0;
    font-size: .8rem;
}

.chat-list li {
    margin-bottom: 10px;
    overflow: auto;
    color: #ffffff;
}

.chat-list .chat-img {
    float: left;
    width: 48px;
}

.chat-list .chat-img img {
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    border-radius: 50px;
    width: 100%;
}

.chat-list .chat-message {
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    border-radius: 50px;
    background: #5a99ee;
    display: inline-block;
    padding: 10px 20px;
    position: relative;
}

.chat-list .chat-message:before {
    content: "";
    position: absolute;
    top: 15px;
    width: 0;
    height: 0;
}

.chat-list .chat-message h5 {
    margin: 0 0 5px 0;
    font-weight: 600;
    line-height: 100%;
    font-size: .9rem;
}

.chat-list .chat-message p {
    line-height: 18px;
    margin: 0;
    padding: 0;
}

.chat-list .chat-body {
    margin-left: 20px;
    float: left;
    width: 70%;
}

.chat-list .in .chat-message:before {
    left: -12px;
    border-bottom: 20px solid transparent;
    border-right: 20px solid #5a99ee;
}

.chat-list .out .chat-img {
    float: right;
}

.chat-list .out .chat-body {
    float: right;
    margin-right: 20px;
    text-align: right;
}

.chat-list .out .chat-message {
    background: #fc6d4c;
}

.chat-list .out .chat-message:before {
    right: -12px;
    border-bottom: 20px solid transparent;
    border-left: 20px solid #fc6d4c;
}

.card .card-header:first-child {
    -webkit-border-radius: 0.3rem 0.3rem 0 0;
    -moz-border-radius: 0.3rem 0.3rem 0 0;
    border-radius: 0.3rem 0.3rem 0 0;
}
.card .card-header {
    background: #17202b;
    border: 0;
    font-size: 1rem;
    padding: .65rem 1rem;
    position: relative;
    font-weight: 600;
    color: #ffffff;
}

.content{
    margin-top:40px;    
}
    </style>
        <div class="card p-2">
            <div class="row">
                <div class="col-md-6 col-12" >
                    {{-- {{$id}} --}}
                    <img src="{{ asset('users_image/' . $cash->users->image) }}"
                        style="width: 250px; height: 200px; border: 50%;" alt="" srcset="">

                    <h3 class="m-3">
                        اسم صاحب الطلب: {{ $cash->users->name }}
                    </h3>
                    <p>المبلغ المطلوب: <span class="text-success">{{ $cash->money }} </span><span class="text-danger">
                            {{ $cash->omlh }}</span></p>
                    <p>المقابل: {{ $cash->opposite }}</p>
                    <p>حالة الطلب:
                        @if ($cash->stute == 0)
                            <span class="mb-0 text-sm text-info">انتظار</span>
                        @elseif($cash->stute == 1)
                            <span class="mb-0 text-sm">مقبولة</span>
                        @elseif($cash->stute == 2)
                            <span class="mb-0 text-sm">مرفوضة</span>
                        @elseif($cash->stute == 3)
                            <span class="mb-0 text-sm">مصروفة</span>
                        @endif
                    </p>
                    @if ($IsEdite)
                    <form wire:submit='SaveEdite' method="post" wire:ignore.self>
                        <label class="form-lable" for="">المبلغ</label>
                        <input wire:model='money' type="number" class="form-control" name="" id="">

                        <label class="form-lable" for="">العملة</label>
                        <input wire:model='omlh' type="text" class="form-control" name="" id="">

                        <label class="form-lable" for="">المقابل</label>
                       <textarea wire:model='note' name="" class="form-control" id="" cols="30" rows="10"></textarea>
                       <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                    </form>
                    <button wire:click='EditeStute(0)' class="btn btn-warning m-2"> الغاء تعديل البيانات</button>
                        
                    @endif
                    @if (!$IsEdite)
                        
                    <button wire:click='EditeStute(1)' class="btn btn-info">تعديل البيانات</button>
                    @endif

                </div>

                <div class="col-md-6 col-12">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($images as $key => $item)
                                {{-- {{dd($item['file']);}} --}}
                                @if ($key == 0)
                                    <div class="carousel-item active">
                                        <img style="height: 500px"
                                            src="{{ asset('storage/ImageForCash/' . $item['file']) }}" class="d-block w-100"
                                            alt="...">
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <img style="height: 500px"
                                            src="{{ asset('storage/ImageForCash/' . $item['file']) }}" class="d-block w-100"
                                            alt="...">
                                    </div>
                                @endif
                            @endforeach
                            {{-- <img src="" class="d-block w-100" alt="..."> --}}
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>


                <div class="col-12">
                    <center style="margin-top: 30px">
                        <h3>جدول عرض كل الملفات الملحقة</h3>
                    </center>
                </div>

                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">النوع</th>
                                    <th scope="col">انقر للفتح</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($files as $key=>$item)
                                <tr>
                                    <th scope="row">{{$key}}</th>
                                    <td>ملف</td>
                                    <td><a href="{{ asset('storage/ImageForCash/' . $item->file) }}"  class="btn btn-primary">عرض الملف</a></td>
                                   
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                        <form wire:submit='AddFile' method="post" x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                        x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false"
                        x-on:livewire-upload-error="uploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress">
                            <input type="file" class="form-control" wire:model.live='Fi'>
                            <div x-show="uploading">
                                <progress max="100" x-bind:value="progress"></progress>
                            </div>
                            <button type="submit" class="btn btn-primary">رفع الملف</button>
                        </form>
                    </div>

                   
                </div>

                <div class="col-12">
                    <center style="margin-top: 30px">
                        <h3>المحادثات</h3>
                        
                    </center>
                        <div class="container content">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">Chat</div>
                                        <div class="card-body height3">
                                            <ul class="chat-list" wire:poll>
                                                @foreach ($chats as $item)
                                                    @if ($item->id_send==Auth::id())
                                                    <li class="out">
                                                        <div class="chat-img">
                                                            <img alt="Avtar" src="../users_image/{{ Auth::user()->image }}">
                                                        </div>
                                                        <div class="chat-body">
                                                            <div class="chat-message">
                                                                <h5>{{Auth::user()->name}}</h5>
                                                                <p>{{$item->message}}</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @else
                                                    <li class="in">
                                                        <div class="chat-img">
                                                            <img alt="Avtar" src="../users_image/{{ $item->send->image }}">
                                                        </div>
                                                        <div class="chat-body">
                                                            <div class="chat-message">
                                                                <h5>{{$item->send->name}}</h5>
                                                                <p>{{$item->message}}</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endif
                                                @endforeach
                                               
                                             
                                            </ul>
                                            
                                        </div>
                                       <center>
                                        
                                        <form  wire:submit='sm' method="post">
                                            <textarea wire:model='Message' name="" class="form-control" id="" cols="30" rows="10"></textarea>
                                            <button type="submit" class="m-2 btn btn-primary fa fa-send"> ارسال</button>
                                        </form>
                                       </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                </div>
            </div>
        </div>
 
</div>
