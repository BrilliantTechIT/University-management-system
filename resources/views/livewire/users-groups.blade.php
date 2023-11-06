<body>
    @section('contain')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#save1"> اضافة مجموعة
                        جديده </button>

                    <div class="card mb-4">

                        <div class="card-header pb-0">

                            <h6>المجموعات</h6>

                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="S_table">
                                    <thead>
                                        <tr>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                اسم المجموعة</th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                تم الانشاء بواسطة</th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                تاريخ</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($groups as $groups)
                                            <tr id="Aid{{ $groups->id }}">
                                                <td class="align-middle text-center ">
                                                    <span class="badge badge-sm bg-gradient-info">{{ $groups->name }}</span>
                                                </td>
                                                <td class="align-middle text-center ">
                                                    <span class="badge badge-sm bg-gradient-info">{{ $groups->users->name }}
                                                    </span>
                                                </td>

                                                <td class="align-middle text-center ">
                                                    <span class="badge badge-sm bg-gradient-info">{{ $groups->created_at }}
                                                    </span>
                                                </td>
                                                <td class="align-middle">


                                                    <form action="" method="POST">
                                                        {{-- {{ route('', $groups->id) }} --}}
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
                            <h5 class="modal-title" id="exampleModalLabel"> جــــــديـــــد </h5>
                            <button type="button" class="close text-danger" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id ="addccollage" action="{{ route('Store_gruops') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="col-form-label1">اسم المجموعة</label>
                                    <input class="form-control " id="name" name="name" required>

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
        @endsection
</body>
