<body>
    @php

        if (session('OkAskoff')) {
            $cashsend = session()->get('OkAskoff');
            $from = $cashsend->fromDate;
            $to = $cashsend->toDate;
            $note = $cashsend->note;
            $date = $cashsend->created_at;
            $createBy = $cashsend->users->name;
            $snderOfaskid = $cashsend->create_by;
            $snderOfaskname = $cashsend->users->name;
            $id = $cashsend->id;

            $userid = [];

            foreach ($us as $key => $value) {
                $userid[] = $value->id;
            }

            $juserid = json_encode($userid);
            $juserimage = Auth::user()->image;
            $sendname = Auth::user()->name;
            $sendid = Auth::id();
        }

    @endphp

    @section('contain')

        <div class="container-fluid py-4">
            <div class="row">
                <script>
                    function js_askoff(from, to, note, date, createBy, id, juserid, juserimage, sendname, sendid,
                        snderOfaskid) {

                        SocketIO.emit("send_askoff", {
                            "fromDate": from,
                            "toDate": to,
                            "note": note,
                            "date": date,
                            "createBy": createBy,
                            "id": id,
                            "users": juserid,
                            "images": juserimage,
                            "sendid": sendid,
                            "sendname": sendname,
                            "snderOfaskid": snderOfaskid

                        });


                    }

                    function return_for_asker(id, message, juserimage, date, sendname) {
                        SocketIO.emit("return_for_asker_money_cash", {
                            "id": id,
                            "message": message,
                            "image": juserimage,
                            "date": date,
                            "send": sendname,
                        });
                    }
                </script>
                @if (session('OkAskoff'))
                    <script>
                        js_askoff('{{ $from }}', '{{ $to }}', '{{ $note }}', '{{ $date }}',
                            '{{ $createBy }}', '{{ $id }}', {{ $juserid }}, '{{ $juserimage }}',
                            '{{ $sendname }}', '{{ $sendid }}', '{{ $snderOfaskname }}');
                    </script>
                @endif
{{session('stute_ok_off')}}
                @if (session('stute_ok_off'))
                    @if (session()->get('stute_ok_off') == 1)
                        <script>
                            return_for_asker({{ $snderOfaskid }}, 'تم قبول طلب اجازة لك', '{{ $juserimage }}', '{{ $date }}',
                                '{{ $sendname }}');
                        </script>
                    @else
                        <script>
                            alert('sss');
                            return_for_asker({{ $snderOfaskid }}, 'تم رفض طلب اجازة لك', '{{ $juserimage }}', '{{ $date }}',
                                '{{ $sendname }}');
                        </script>
                    @endif
                @endif


                <div class="col-12">


                    <div class="card mb-4">

                        <div class="card-header pb-0">

                            <h6> طلبات اجازة تحت الانتظار</h6>

                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="S_table">
                                    <thead>
                                        <tr>

                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                تاريخ البداية </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                تاريخ النهاية </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                ملاحظة </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                حالة الطلب </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                تم الانشاء بواسطة</th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                تاريخ</th>

                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                عمليات</th>

                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">
                                        @foreach ($wait as $item)
                                            <tr id="Aid{{ $item->id }}">

                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->fromDate }}</span>
                                                </td>
                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->toDate }}</span>
                                                </td>
                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->note }}</span>
                                                </td>

                                                @if ($item->stute == 0)
                                                    <td class="align-middle text-center ">
                                                        <span class="mb-0 text-sm text-info">انتظار</span>
                                                    </td>
                                                @elseif($item->stute == 1)
                                                    <td class="align-middle text-center text-success ">
                                                        <span class="mb-0 text-sm">مقبولة</span>
                                                    </td>
                                                @elseif($item->stute == 2)
                                                    <td class="align-middle text-center text-danger ">
                                                        <span class="mb-0 text-sm">مرفوضة</span>
                                                    </td>
                                                @elseif($item->stute == 3)
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


                                                    <form action="{{ route('StoreOkAskoff') }} " method="POST">

                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $item->id }}"
                                                            id="">
                                                        <button type="submit" name="delete"
                                                            class="mb-0 text-md fa fa-check fa-2x btn btn-success">موافق</button>
                                                    </form>
                                                    <br>

                                                    <form action="{{ route('NoOkAskoff') }} " method="POST">

                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $item->id }}"
                                                            id="">
                                                        <button type="submit" name="delete"
                                                            class="mb-0 text-md fa fa-times fa-2x btn btn-danger">رفض</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>











                    <div class="card mb-4">

                        <div class="card-header pb-0">

                            <h6> طلبات اجازة تحت موافقات</h6>

                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="S_table">
                                    <thead>
                                        <tr>

                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                تاريخ البداية </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                تاريخ النهاية </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                ملاحظة </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                حالة الطلب </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                تم الانشاء بواسطة</th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                تاريخ</th>

                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                عمليات</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ok as $item)
                                            <tr id="Aid{{ $item->id }}">

                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->fromDate }}</span>
                                                </td>
                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->toDate }}</span>
                                                </td>
                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->note }}</span>
                                                </td>

                                                @if ($item->stute == 0)
                                                    <td class="align-middle text-center ">
                                                        <span class="mb-0 text-sm text-info">انتظار</span>
                                                    </td>
                                                @elseif($item->stute == 1)
                                                    <td class="align-middle text-center text-success ">
                                                        <span class="mb-0 text-sm">مقبولة</span>
                                                    </td>
                                                @elseif($item->stute == 2)
                                                    <td class="align-middle text-center text-danger ">
                                                        <span class="mb-0 text-sm">مرفوضة</span>
                                                    </td>
                                                @elseif($item->stute == 3)
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



                                                    <form action="{{ route('NoOkAskoff') }} " method="POST">

                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $item->id }}"
                                                            id="">
                                                        <button type="submit" name="delete"
                                                            class="mb-0 text-md fa fa-times fa-2x btn btn-danger">رفض</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>





                    <div class="card mb-4">

                        <div class="card-header pb-0">

                            <h6> طلبات اجازة المرفوضات</h6>

                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="S_table">
                                    <thead>
                                        <tr>

                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                تاريخ البداية </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                تاريخ النهاية </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                ملاحظة </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                حالة الطلب </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                تم الانشاء بواسطة</th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                تاريخ</th>

                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                عمليات</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($no as $item)
                                            <tr id="Aid{{ $item->id }}">

                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->fromDate }}</span>
                                                </td>
                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->toDate }}</span>
                                                </td>
                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->note }}</span>
                                                </td>

                                                @if ($item->stute == 0)
                                                    <td class="align-middle text-center ">
                                                        <span class="mb-0 text-sm text-info">انتظار</span>
                                                    </td>
                                                @elseif($item->stute == 1)
                                                    <td class="align-middle text-center text-success ">
                                                        <span class="mb-0 text-sm">مقبولة</span>
                                                    </td>
                                                @elseif($item->stute == 2)
                                                    <td class="align-middle text-center text-danger ">
                                                        <span class="mb-0 text-sm">مرفوضة</span>
                                                    </td>
                                                @elseif($item->stute == 3)
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


                                                    <form action="{{ route('StoreOkAskoff') }} " method="POST">

                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $item->id }}"
                                                            id="">
                                                        <button type="submit" name="delete"
                                                            class="mb-0 text-md fa fa-check fa-2x btn btn-success">موافق</button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>





                    <div class="card mb-4">

                        <div class="card-header pb-0">

                            <h6> طلبات اجازة المصروفة</h6>

                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="S_table">
                                    <thead>
                                        <tr>

                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                تاريخ البداية </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                تاريخ النهاية </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                ملاحظة </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                حالة الطلب </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                تم الانشاء بواسطة</th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                تاريخ</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cash as $item)
                                            <tr id="Aid{{ $item->id }}">

                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->fromDate }}</span>
                                                </td>
                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->toDate }}</span>
                                                </td>
                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->note }}</span>
                                                </td>

                                                @if ($item->stute == 0)
                                                    <td class="align-middle text-center ">
                                                        <span class="mb-0 text-sm text-info">انتظار</span>
                                                    </td>
                                                @elseif($item->stute == 1)
                                                    <td class="align-middle text-center text-success ">
                                                        <span class="mb-0 text-sm">مقبولة</span>
                                                    </td>
                                                @elseif($item->stute == 2)
                                                    <td class="align-middle text-center text-danger ">
                                                        <span class="mb-0 text-sm">مرفوضة</span>
                                                    </td>
                                                @elseif($item->stute == 3)
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

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



                </div>
            </div>




            <!-- =================Edit modal======================= -->


            <script>
                SocketIO.on("get_askoff", function(data) {
                    // alert(data.from);
                    const tbody = document.getElementById('tableBody');
                    var newRow = tbody.insertRow(0); // Inserts at the top, index 0 would be the header row
                    var cell1 = newRow.insertCell(0);
                    var cell2 = newRow.insertCell(1);
                    var cell3 = newRow.insertCell(2);
                    var cell4 = newRow.insertCell(3);
                    var cell5 = newRow.insertCell(4);
                    var cell6 = newRow.insertCell(5);
                    var cell7 = newRow.insertCell(6);

                    // Create and append cell (td) elements to the new row

                    cell1.innerHTML = `<td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">${data.from}</span>
                                                </td>`;



                    cell2.innerHTML = `<td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">${data.to}</span>
                                                </td>`;




                    cell3.innerHTML = `<td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">${data.note}</span>
                                                </td>`;




                    cell4.innerHTML = ` <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm text-info">انتظار</span>
                                                </td>`;
                    cell5.innerHTML = `<td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">${data.sendname}</span>
                                                </td>`;

                    cell6.innerHTML = `<td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">${data.date}</span>
                                                </td>`;

                    cell7.innerHTML = `<td class="align-middle">


<form action="{{ route('StoreOkAskoff') }} " method="POST">
    
    @csrf
    <input type="hidden" name="id" value="${data.id}" id="">
    <button type="submit" name="delete"
        class="mb-0 text-md fa fa-check fa-2x btn btn-success">موافق</button>
</form>
<br>

<form action="{{ route('NoOkAskoff') }} " method="POST">
    
    @csrf
    <input type="hidden" name="id" value="${data.id}" id="">
    <button type="submit" name="delete"
        class="mb-0 text-md fa fa-times fa-2x btn btn-danger">رفض</button>
</form>
</td>`;

                    // Append the new row to the tbody

                });
            </script>
        @endsection
</body>
