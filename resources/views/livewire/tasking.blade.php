<body>

    @section('contain')
        @php
            $name = '';
            $id_task=[];
            $ids = [];
            if (session('success')) {
                foreach ($task->Where('task_id', session()->get('success')) as $value) {
                    $ids[] = $value->user_id;
                    $name = $value->task->name;
                    $id_task[] = $value->id;

                }
            }
            $jids = json_encode($ids);
            $jid_task = json_encode($id_task);

        @endphp
        <div class="container-fluid py-4">
            <div class="row">


                

                <div class="col-12">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#save1"> اضافة مهمة
                        جديده </button>

                    <div class="card mb-4">

                        <div class="card-header pb-0">

                            <h6>المهام</h6>

                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="S_table">
                                    <thead>
                                        <tr>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                اسم المهمة</th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                المكلف</th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                تاريخ</th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                الحالة</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($task as $item)
                                            <tr id="Aid{{ $item->id }}">
                                                <td class="align-middle text-center ">
                                                    <h6 class="mb-0 text-sm">{{ $item->task->name }}<h6>
                                                </td>
                                                <td class="align-middle text-center ">
                                                    <h6 class="mb-0 text-sm">{{ $item->users->name }}<h6>

                                                </td>

                                                <td class="align-middle text-center ">
                                                    <h6 class="mb-0 text-sm">{{ $item->created_at }}<h6>

                                                </td>

                                                <td class="align-middle text-center ">
                                                    @if ($item->stute == 0)
                                                        <h6 class="mb-0 text-sm">لم تنفذ<h6>
                                                            @elseif($item->stute == 1)
                                                                <h6 class="mb-0 text-sm">منفذة<h6>
                                                                    @else
                                                                        <h6 class="mb-0 text-sm">مرفوضة<h6>
                                                    @endif
                                                </td>
                                                <td class="align-middle">


                                                    <form action="" method="POST">

                                                        @csrf
                                                        <button type="submit" name="delete"
                                                            class="mb-0 text-md fa fa-times fa-2x text-danger"></button>
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
                            <h5 class="modal-title" id="exampleModalLabel"> المهــام </h5>
                            <button type="button" class="close text-danger" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id ="add_task" action="{{ route('Store_task') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="col-form-label1">اسم المهمة</label>
                                    <input class="form-control " id="name" name="name" required>

                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-form-label1"> اختر مكلفين</label>
                                    <select id="userSelect" name="users[]" class="form-select" multiple required
                                        aria-label="Default select example">
                                        <option disabled value="0" selected>اختر مكلفين</option>
                                        @foreach ($users as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach

                                    </select>
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
                                <div class="form-group">
                                    <label for="name1" class="col-form-label">اسم الكلية</label>
                                    <input class="form-control" id="name1" required>
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

            <script>
                const form = document.getElementById("add_task");
                const userSelect = document.getElementById("userSelect");
                // alert('{{ Auth::user()->image }}');
                // Add a "submit" event listener to the form
                function js_task(name, list_id,list_task_id) {
                    // Your custom code to handle the form submission goes here
                    // For example, you can access form fields and their values like this:
                    SocketIO.emit("send_tesk", {
                        "name": name,
                        "send": '{{ Auth::user()->name }}',
                        "users": list_id,
                        "image": '{{ Auth::user()->image }}',
                        "list_task_id":list_task_id,
                    });



                }
                // Prevent the default form submission, which would cause the page to reload


                // You can then use the form data to make an AJAX request, perform validation, etc.

                // If you want to submit the form after processing the data, you can use:
                // form.submit();
            </script>

            @if (session('success'))
                <script>
                    js_task('{{ $name }}', {!! $jids !!} ,{!! $jid_task !!});
                </script>
            @endif
        @endsection


</body>
