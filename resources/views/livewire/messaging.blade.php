<body>
    @php
        if (session('us_mes')) {
            $sendname = Auth::user()->name;
            $sendimage = Auth::user()->image;
            $tital = $MYsendedmessage[0]->tital;
            $message = $MYsendedmessage[0]->message;
            $type = $MYsendedmessage[0]->type;
            $date = $MYsendedmessage[0]->created_at;
            $us = json_encode(session()->get('us_mes'));
        }

    @endphp
    @section('contain')
        @if (session('us_mes'))
            <script>
                SocketIO.emit("send_mesages", {
                    "sendname": '{{ $sendname }}',
                    "sendimage": '{{ $sendimage }}',
                    "tital": '{{ $tital }}',
                    "message": '{{ $message }}',
                    "type": '{{ $type }}',
                    "date": '{{ $date }}',
                    "us": {!! $us !!},
                });
            </script>
        @endif
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#save1"> اضافة
                        رسالة
                        جديد </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#save2"> اضافة
                        ملف
                        جديد </button>

                    <div class="card mb-4">

                        <div class="card-header pb-0">

                            <h6>البريد الوارد</h6>

                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="S_table">
                                    <thead>
                                        <tr>

                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                المرسل </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                العنوان </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                الرسالة </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                نوع الرسالة </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                تاريخ </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                عرض </th>

                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">
                                        @foreach ($MYmessage as $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="users_image/{{ $item->users_send->image }}"
                                                                class="avatar avatar-sm me-3" alt="user1">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $item->users_send->name }}</h6>
                                                        </div>

                                                    </div>
                                                </td>
                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->tital }}</span>
                                                </td>
                                                <td class="align-middle text-center ">
                                                    @if ($item->type == 1)
                                                        <span class="mb-0 text-sm fa fa-lock">ملف للعرض</span>
                                                    @else
                                                        <span class="mb-0 text-sm">{{ $item->message }}</span>
                                                    @endif
                                                </td>
                                                <td class="align-middle text-center ">
                                                    @if ($item->type == 1)
                                                        <span class="mb-0 text-sm">ملف</span>
                                                    @else
                                                        <span class="mb-0 text-sm">رسالة</span>
                                                    @endif
                                                </td>

                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->created_at }}</span>
                                                </td>

                                                <td class="align-middle text-center">
                                                    @if ($item->type == 0)
                                                        <button class="btn btn-primary"
                                                            onclick="show('{{ $item->tital }}','{{ $item->message }}')"
                                                            data-bs-toggle="modal" data-bs-target="#show">عرض</button>
                                                    @else
                                                        <a class="btn btn-primary"
                                                            href="system/files/{{ $item->message }}">عرض</a>
                                                    @endif
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

                            <h6>البريد المرسل</h6>

                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="S_table">
                                    <thead>
                                        <tr>

                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                المستلمين </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                العنوان </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                الرسالة </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                نوع الرسالة </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                تاريخ </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                عرض </th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($MYsendedmessage as $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="users_image/{{ $item->users_get->image }}"
                                                                class="avatar avatar-sm me-3" alt="user1">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $item->users_get->name }}</h6>
                                                        </div>

                                                    </div>
                                                </td>
                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->tital }}</span>
                                                </td>
                                                <td class="align-middle text-center ">
                                                    @if ($item->type == 1)
                                                        <span class="mb-0 text-sm fa fa-lock">ملف للعرض</span>
                                                    @else
                                                        <span class="mb-0 text-sm">{{ $item->message }}</span>
                                                    @endif
                                                </td>

                                                <td class="align-middle text-center ">
                                                    @if ($item->type == 1)
                                                        <span class="mb-0 text-sm">ملف</span>
                                                    @else
                                                        <span class="mb-0 text-sm">رسالة</span>
                                                    @endif
                                                </td>
                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->created_at }}</span>
                                                </td>

                                                <td class="align-middle text-center">
                                                    @if ($item->type == 0)
                                                        <button class="btn btn-primary"
                                                            onclick="show('{{ $item->tital }}','{{ $item->message }}')"
                                                            data-bs-toggle="modal" data-bs-target="#show">عرض</button>
                                                    @else
                                                        <a class="btn btn-primary"
                                                            href="system/files/{{ $item->message }}">عرض</a>
                                                    @endif
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
                            <form id ="addccollage" action="{{ route('SendMessage') }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="name" class="col-form-label1"> اختر المستلمين</label>
                                    <select id="userSelect" name="users[]" class="form-select" multiple required
                                        aria-label="Default select example">
                                        <option disabled value="0" selected>اختر المستلمين</option>
                                        @foreach ($users as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name1" class="col-form-label">العنوان</label>
                                    <input class="form-control" name="tital" id="name1" required>
                                </div>

                                <div class="form-group">
                                    <label for="name1" class="col-form-label">الرسالة</label>
                                    <textarea rows="10" class="form-control" name="message" id="name1" required></textarea>
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






            <div class="modal fade" id="save2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                            <form id ="addccollage" action="{{ route('SendFiles') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="name" class="col-form-label1"> اختر المستلمين</label>
                                    <select id="userSelect" name="users[]" class="form-select" multiple required
                                        aria-label="Default select example">
                                        <option disabled value="0" selected>اختر المستلمين</option>
                                        @foreach ($users as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name1" class="col-form-label">العنوان</label>
                                    <input class="form-control" name="tital" id="name1" required>
                                </div>

                                <div class="form-group">
                                    <label for="name1" class="col-form-label">الملف</label>
                                    <input type="file" class="form-control" name="message" id="">
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


            <div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tital"> </h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p id="message" style="text-align: center"></p>

                        </div>
                    </div>
                </div>
            </div>
            <script>
                function show(t, m) {
                    document.getElementById("tital").innerText = t;
                    document.getElementById("message").innerText = m;


                }
            </script>

            <script>
                SocketIO.on("get_mesages", function(data) {
                    var audio = document.getElementById("not_sound");
                 audio.play();
                    // alert(data.name);
                    const tbody = document.getElementById('tableBody');
                    var newRow = tbody.insertRow(0); // Inserts at the top, index 0 would be the header row
                    var cell1 = newRow.insertCell(0);
                    var cell2 = newRow.insertCell(1);
                    var cell3 = newRow.insertCell(2);
                    var cell4 = newRow.insertCell(3);
                    var cell5 = newRow.insertCell(4);
                    var cell6 = newRow.insertCell(5);

                    // Create and append cell (td) elements to the new row

                    cell1.innerHTML = `<td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="users_image/${data.sendimage}"
                                                                class="avatar avatar-sm me-3" alt="user1">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">${data.sendname}</h6>
                                                        </div>

                                                    </div>
                                                </td>`;



                    cell2.innerHTML = `<td class="align-middle text-center ">
                                        <span class="mb-0 text-sm">${data.tital}</span>
                                    </td>`;



                    if (data.type == 1) {
                        cell3.innerHTML = `<td class="align-middle text-center">
                            <span class="mb-0 text-sm fa fa-lock">ملف للعرض</span>
                                                </td>`;
                    } else {
                        cell3.innerHTML = `<td class="align-middle text-center">
                            <span class="mb-0 text-sm">${data.message}</span>
                                           </td>`;
                    }

                    if (data.type == 1) {
                        cell4.innerHTML = `<td class="align-middle text-center">
                            <span class="mb-0 text-sm">ملف</span>
                                                </td>`;
                    } else {
                        cell4.innerHTML = `<td class="align-middle text-center">
                            <span class="mb-0 text-sm">رسالة</span>
                                           </td>`;
                    }

                   




                    cell5.innerHTML = `  <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">${data.date}</span>
                                                </td>`;
                    if (data.type == 0) {
                        cell6.innerHTML = `<td class="align-middle text-center">
                                                   
                                                        <button class="btn btn-primary"
                                                            onclick="show('${data.tital}','${data.message}')"
                                                            data-bs-toggle="modal" data-bs-target="#show">عرض</button>
                                                </td>`;
                    } else {
                        cell6.innerHTML = `<td class="align-middle text-center">
                                                   
                            <a class="btn btn-primary"
                             href="system/files/${data.message}">عرض</a>
                                           </td>`;
                    }




                });
            </script>
        @endsection
</body>
