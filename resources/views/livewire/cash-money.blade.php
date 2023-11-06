<body>
    @php
    if (session('done')) {
        $c=count($cash);
        $money=$cash[$c-1]->money;
        $omlh=$cash[$c-1]->omlh;
        $opposite=$cash[$c-1]->opposite;
        $date=$cash[$c-1]->created_at;
        $createBy=$cash[$c-1]->users->name;
        $id=$cash[$c-1]->id;
        
        $userid=[];
       

        foreach ($Users as $key => $value) {
            $userid[]=$value->id;
           
        }

       $juserid= json_encode($userid);
       $juserimage= Auth::user()->image;
       $sendname= Auth::user()->name;
       $sendid= Auth::id();

        # code...
    }
        
    @endphp
    @section('contain')
    
        <div class="container-fluid py-4">
            <div class="row">
                <script>
                     function js_cashmoney(money, omlh,opposite,date,createBy,id,juserid,juserimage,sendname,sendid) {
                    
                    SocketIO.emit("send_cashmoney", {
                        "money": money,
                        "omlh": omlh,
                        "opposite": opposite,
                        "date": date,
                        "createBy":createBy,
                        "id":id,
                        "users":juserid,
                        "images":juserimage,
                        "sendid":sendid,
                        "sendname":sendname,

                    });


                }
              

                </script>
                @if (session('done'))
                <script>
                      js_cashmoney('{{$money}}','{{$omlh}}','{{$opposite}}','{{$date}}','{{$createBy}}','{{$id}}',{{$juserid}},'{{$juserimage}}','{{$sendname}}','{{$sendid}}');
                </script>
                    
                @endif
                
                <div class="col-12">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#save1"> اضافة طلب صرف
                        مالي
                        جديد </button>

                    <div class="card mb-4">

                        <div class="card-header pb-0">

                            <h6>طلبات الصرف</h6>

                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="S_table">
                                    <thead>
                                        <tr>
                                           
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                المبلغ </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                العملة </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                المقابل </th>
                                                <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                    حالة الطلب </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                تم الانشاء بواسطة</th>
                                                
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                تاريخ</th>

                                                <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                    حذف</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cash as $item)
                                            <tr id="Aid{{ $item->id }}">
                                                
                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->money }}</span>
                                                </td>
                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->omlh }}</span>
                                                </td>
                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->opposite }}</span>
                                                </td>

                                                @if ($item->stute==0)
                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm text-info">انتظار</span>
                                                </td>
                                                @elseif($item->stute==1)
                                                <td class="align-middle text-center text-success ">
                                                    <span class="mb-0 text-sm">مقبولة</span>
                                                </td>
                                                @elseif($item->stute==2)
                                                <td class="align-middle text-center text-danger ">
                                                    <span class="mb-0 text-sm">مرفوضة</span>
                                                </td>
                                                @elseif($item->stute==3)
                                                <td class="align-middle text-center text-primary ">
                                                    <span class="mb-0 text-sm">مصروفة</span>
                                                </td>
                                                @endif
                                                
                                                
                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->users->name }}
                                                    </span>
                                                </td>


                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->created_at }}
                                                    </span>
                                                </td>
                                                <td class="align-middle">


                                                    <form action="{{ route('DeleteCashMoneyTable') }} " method="POST">
                                                        
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$item->id}}" id="">
                                                        <button type="submit" name="delete"
                                                            class="mb-0 text-md fa fa-times fa-2x btn btn-danger">حذف</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="save1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> جــــــديـــــد </h5>
                            <button type="button" class="close text-danger" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id ="addccollage" action="{{ route('StoreCashMoneyTable') }}" method="post">
                                @csrf
                               
                                <div class="form-group">
                                    <label for="name1" class="col-form-label">المبلغ</label>
                                    <input class="form-control" name="money" type="number" id="name1" required>
                                </div>
                                <div class="form-group">
                                    <label for="name1" class="col-form-label">العملة</label>
                                    <input class="form-control" name="omlh" id="name1" required>
                                </div>
                                <div class="form-group">
                                    <label for="name1" class="col-form-label">المقابل</label>
                                    <input class="form-control" name="opposite" id="name1" required>
                                </div>  



                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                            <input type="submit" class="btn btn-primary" value="حفظ">
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- =================Edit modal======================= -->


            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">الكليات </h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id ="Editcollage">
                                @csrf
                                <input type="hidden" id="id" name="id" />
                                
                                
                                
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                            <input type="submit" class="btn btn-primary" value="حفظ">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        @endsection
</body>
