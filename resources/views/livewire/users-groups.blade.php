<main>
    @section('contain')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#save1"> اضافة مجموعة
                        جديده </button>

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#connect"> اضافة
                        مجموعة
                        موظفي الهئية </button>

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
                                        @foreach ($groups2 as $groups)
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


                                                    <form action="{{ route('Delete_group') }}" method="POST">
                                                        {{-- {{ route('', $groups->id) }} --}}
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $groups->id }}">
                                                        <button type="submit" name="delete"
                                                            class="mb-0 text-md fa fa-times fa-2x text-danger"></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>


                            </div>

                            <div style="padding:20px">
                                @foreach ($groups2 as $item)
                                    <details>

                                        <summary class="fa fa-folder">{{ $item->name }}</summary>

                                        <ul>
                                            @foreach ($ConnectGruopUser->Where('group_id', $item->id) as $item2)
                                                <li>
                                                    {{ $item2->users->name }}
                                                    <form action="{{ route('Delete_connect') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $item2->id }}">
                                                        <button type="submit" class="btn btn-danger">حذف</button>
                                                    </form>
                                                </li>
                                            @endforeach

                                        </ul>


                                    </details>
                                @endforeach
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




            <div class="modal fade" id="connect" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                            <form action="{{ route('Store_connect') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="col-form-label1"> المجموعة</label>

                                    <select class="form-control" name="group">
                                        @foreach ($groups2 as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach

                                    </select>


                                </div>


                                <div class="form-group">
                                    <label for="name" class="col-form-label1">المستخدمين</label>

                                    <select style="width: 100%" class="js-multiple-select form-control" multiple
                                        name="usersID[]">
                                        @foreach ($user as $item)
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

            <script src="selection/jquery-3.3.1.min.js"></script>
            <script src="selection/popper.min.js"></script>
            <script src="selection/bootstrap.min.js"></script>
            <script src="selection/select2.min.js"></script>
            <script src="selection/main.js"></script>
        @endsection
</main>
