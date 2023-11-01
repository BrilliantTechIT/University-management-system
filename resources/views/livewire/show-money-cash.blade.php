<body>
    @section('contain')
        <div class="container-fluid py-4">
            <div class="row">



                <div class="col-12">


                    <div class="card mb-4">

                        <div class="card-header pb-0">

                            <h6> اوامر صرف</h6>

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
                                                تم الموافقة بواسطة</th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                تاريخ</th>

                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                عمليات</th>

                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">
                                        @foreach ($ok as $item)
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
                                                    <span class="mb-0 text-sm">{{ $item->users_accept->name }}
                                                    </span>
                                                </td>


                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->created_at }}
                                                    </span>
                                                </td>
                                                <td class="align-middle">
                                                    <form action="{{ route('CashMoney') }} " method="POST">

                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $item->id }}"
                                                            id="">
                                                        <button type="submit" name="delete"
                                                            class="mb-0 text-md fa fa-check fa-2x btn btn-success">صرف</button>
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

                            <h6> طلبات الصرف تحت موافقات</h6>

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
                                                تم الموافقة بواسطة</th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                تم الصرف بواسطة</th>

                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                تاريخ</th>

                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                عمليات</th>

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
                                                    <span class="mb-0 text-sm">{{ $item->users_accept->name }}
                                                    </span>
                                                </td>

                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->users_cash->name }}
                                                    </span>
                                                </td>



                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->created_at }}
                                                    </span>
                                                </td>
                                                <td class="align-middle">
                                                    <form action="{{ route('BackCashMoney') }} " method="POST">

                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $item->id }}"
                                                            id="">
                                                        <button type="submit" name="delete"
                                                            class="mb-0 text-md fa fa-times fa-2x btn btn-danger">رد
                                                            الصرف</button>
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




            <!-- =================Edit modal======================= -->


            <script>
                SocketIO.on("get_CashMoney", function(data) {
                    // alert(data.name);
                    const tbody = document.getElementById('tableBody');
                    var newRow = tbody.insertRow(0); // Inserts at the top, index 0 would be the header row
                    var cell1 = newRow.insertCell(0);
                    var cell2 = newRow.insertCell(1);
                    var cell3 = newRow.insertCell(2);
                    var cell4 = newRow.insertCell(3);
                    var cell5 = newRow.insertCell(4);
                    var cell6 = newRow.insertCell(5);
                    var cell7 = newRow.insertCell(6);
                    var cell8 = newRow.insertCell(7);

                    // Create and append cell (td) elements to the new row

                    cell1.innerHTML = `<td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">${data.money}</span>
                                                </td>`;



                    cell2.innerHTML = `<td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">${data.omlh}</span>
                                                </td>`;




                    cell3.innerHTML = `<td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">${data.opposite}</span>
                                                </td>`;




                    cell4.innerHTML = ` <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm text-info">مقبولة</span>
                                                </td>`;
                    cell5.innerHTML = `<td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">${data.snderOfaskid}</span>
                                                </td>`;

                    cell6.innerHTML = `<td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">${data.sendname}</span>
                                                </td>`;
                    cell7.innerHTML = `<td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">${data.date}</span>
                                                </td>`;

                    cell8.innerHTML = `<td class="align-middle">
                                                    <form action="{{ route('CashMoney') }} " method="POST">
                                                        
                                                        @csrf
                                                        <input type="hidden" name="id" value="${data.id}" id="">
                                                        <button type="submit" name="delete"
                                                            class="mb-0 text-md fa fa-check fa-2x btn btn-success">صرف</button>
                                                    </form>
                                                   
                                                </td>`;

                    // Append the new row to the tbody

                });
            </script>
        @endsection
</body>
