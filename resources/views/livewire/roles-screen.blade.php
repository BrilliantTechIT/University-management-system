<body>
    @section('contain')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">

                    <div class="card mb-4">

                        <div class="card-header pb-0">

                            <h6>الصــلاحيـــات</h6>

                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <form action="{{route('set_rols')}}" method="post">
                                @csrf
                            <div class="row" style="width: 30% ;margin: 30px;">
                                <select name="id_user" class="form-select" aria-label="Default select example">
                                    <option disabled value="0" selected>اختر مستخدم</option>
                                    @foreach ($users as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach

                                </select>
                                <div style="display: flex">
                                    <button id="checkAll" class="btn btn-primary" style="margin: 10px">تحديد الكل</button>
                                    <button id="uncheckAll" class="btn btn-primary" style="margin: 10px;">اللغاء تحديد الكل</button>

                                </div>
                            </div>
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="S_table">
                                    <thead>
                                        <tr>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                اسم الشاشة</th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                الحالة</th>


                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>

                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6  class="mb-0 text-sm" style="text-align: center">لوحة القيادة</h6>
                                                </div>

                                            </td>


                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input type="checkbox" name="Dashbord" class="checkbox" 
                                                        data-toggle="toggle">
                                                </div>

                                            </td>

                                        </tr>



                                        <tr>

                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"  style="text-align: center">ادارة المستخدمين
                                                    </h6>
                                                </div>

                                            </td>


                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input name="Users" type="checkbox" class="checkbox" 
                                                        data-toggle="toggle">
                                                </div>

                                            </td>

                                        </tr>

                                        <tr>

                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"  style="text-align: center">ادارة المجموعات
                                                    </h6>
                                                </div>

                                            </td>


                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input name="Group" type="checkbox" class="checkbox" 
                                                        data-toggle="toggle">
                                                </div>

                                            </td>

                                        </tr>



                                        <tr>

                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm" style="text-align: center">ادارة الصلاحيات</h6>
                                                </div>

                                            </td>


                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input type="checkbox" name="Roles" class="checkbox" 
                                                        data-toggle="toggle">
                                                </div>

                                            </td>

                                        </tr>



                                        <tr>

                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm" style="text-align: center">طلب صرف مالي</h6>
                                                </div>

                                            </td>


                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input type="checkbox" name="Financial_exchange" class="checkbox" 
                                                        data-toggle="toggle">
                                                </div>

                                            </td>

                                        </tr>



                                        <tr>

                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm" style="text-align: center">طلب صرف مخزني</h6>
                                                </div>

                                            </td>


                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input type="checkbox" name="Store_exchange" class="checkbox" 
                                                        data-toggle="toggle">
                                                </div>

                                            </td>

                                        </tr>


                                        <tr>

                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm" style="text-align: center">طلب اجازة</h6>
                                                </div>

                                            </td>


                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input type="checkbox" name="vacation_request" class="checkbox" 
                                                        data-toggle="toggle">
                                                </div>

                                            </td>

                                        </tr>


                                        <tr>

                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm" style="text-align: center">طلب شراء</h6>
                                                </div>

                                            </td>


                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input type="checkbox" name="buy_request" class="checkbox" 
                                                        data-toggle="toggle">
                                                </div>

                                            </td>

                                        </tr>


                                        <tr>

                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm" style="text-align: center">الموافقة على طلب صرف
                                                        مالي</h6>
                                                </div>

                                            </td>


                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input type="checkbox" name="ok_Financial_exchange" class="checkbox" 
                                                        data-toggle="toggle">
                                                </div>

                                            </td>

                                        </tr>
                                        <tr>

                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm" style="text-align: center">الموافقة على طلب صرف
                                                        مخزني</h6>
                                                </div>

                                            </td>


                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input type="checkbox" name="ok_Store_exchange" class="checkbox" 
                                                        data-toggle="toggle">
                                                </div>

                                            </td>

                                        </tr>
                                        <tr>

                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm" style="text-align: center">الموافقة على طلب
                                                        اجازة</h6>
                                                </div>

                                            </td>


                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input type="checkbox" name="ok_vacation_request" class="checkbox" 
                                                        data-toggle="toggle">
                                                </div>

                                            </td>

                                        </tr>
                                        <tr>

                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm" style="text-align: center">الموافقة على طلب
                                                        شراء</h6>
                                                </div>

                                            </td>


                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input type="checkbox" name="ok_buy_request" class="checkbox" 
                                                        data-toggle="toggle">
                                                </div>

                                            </td>

                                        </tr>
                                        <tr>

                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm" style="text-align: center">عرض اوامر الصرف
                                                        المالي</h6>
                                                </div>

                                            </td>


                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input type="checkbox" name="show_Financial_exchange" class="checkbox" 
                                                        data-toggle="toggle">
                                                </div>

                                            </td>

                                        </tr>
                                        <tr>

                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm" style="text-align: center">عرض اوامر الصرف
                                                        مخزني</h6>
                                                </div>

                                            </td>


                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input type="checkbox" name="show_Store_exchange" class="checkbox" 
                                                        data-toggle="toggle">
                                                </div>

                                            </td>

                                        </tr>
                                        <tr>

                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"  style="text-align: center">عرض اوامر طلب
                                                        اجازة</h6>
                                                </div>

                                            </td>


                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input type="checkbox" name="show_vacation_request" class="checkbox" 
                                                        data-toggle="toggle">
                                                </div>

                                            </td>

                                        </tr>
                                        <tr>

                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm" style="text-align: center">عرض اوامر طلبات
                                                        الشراء</h6>
                                                </div>

                                            </td>


                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input type="checkbox" name="show_buy_request" class="checkbox" 
                                                        data-toggle="toggle">
                                                </div>

                                            </td>

                                        </tr>
                                        <tr>

                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm" style="text-align: center">المهام</h6>
                                                </div>

                                            </td>


                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input type="checkbox" name="new_task" class="checkbox" 
                                                        data-toggle="toggle">
                                                </div>

                                            </td>

                                        </tr>
                                        <tr>

                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm" style="text-align: center">رسائل نصية</h6>
                                                </div>

                                            </td>


                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input type="checkbox" name="send_message" class="checkbox" 
                                                        data-toggle="toggle">
                                                </div>

                                            </td>

                                        </tr>
                                        <tr>

                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm" style="text-align: center"> ارسال تقارير +
                                                        ملف</h6>
                                                </div>

                                            </td>


                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input type="checkbox" name="send_file" class="checkbox" 
                                                        data-toggle="toggle">
                                                </div>

                                            </td>

                                        </tr>


                                    </tbody>
                                </table>
                                <center><button type="submit" class="btn btn-primary">حفظ</button></center>
                            </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                // Get a reference to the "Check All" checkbox and all checkboxes with the class "checkbox"
                const checkboxes = document.querySelectorAll(".checkbox");

                const button = document.getElementById("checkAll");
                // Add an event listener to the "Check All" checkbox
                button.addEventListener("click", function() {
                    // Iterate through all checkboxes and set their checked state to match the "Check All" checkbox
                    checkboxes.forEach(function(checkbox) {
                        checkbox.checked = true;
                    });
                });

                const button2 = document.getElementById("uncheckAll");
                // Add an event listener to the "Check All" checkbox
                button2.addEventListener("click", function() {
                    // Iterate through all checkboxes and set their checked state to match the "Check All" checkbox
                    checkboxes.forEach(function(checkbox) {
                        checkbox.checked = false;
                    });
                });
            </script>
        @endsection
</body>
