<div>

    <div class="container-fluid py-4">
        <div class="row">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="col-12">


                <div class="card mb-4">

                    <div class="card-header pb-0">

                        <h6> اوامر اجازة</h6>

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
                                            النوع </th>
                                        <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                            اجازة تحتسب من الرصيد السنوي </th>
                                        <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                            الرصيد السنوي </th>
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
                                <tbody wire:poll.2s id="tableBody">
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
                                            <td class="align-middle text-center ">
                                                <span class="mb-0 text-sm">{{ $item->type->name??"اجازة اخراء" }}</span>
                                            </td>
                                            <td class="align-middle text-center ">
                                                <span class="mb-0 text-sm">{{ $item->is_for_year==0?'اجازة':'اجازة تحتسب من الرصيد السنوي' }}</span>
                                            </td>
                                            <td class="align-middle text-center ">
                                                <span class="mb-0 text-sm">{{ $item->users->max_balance-$item->users->year_balance }}</span>
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

                                                <button wire:click='DoneAskOff({{ $item->id }})' type="button"
                                                    name="delete"
                                                    class="mb-0 text-md fa fa-check fa-2x btn btn-success">اجازة</button>
                                                    <button wire:click='DoneAskOffyear({{ $item->id }})' type="button"
                                                        name="delete"
                                                        class="mb-0 text-md fa fa-check fa-2x btn btn-success">اجازة تحتسب من الرصيد السنوي</button>

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

                        <h6> طلبات الاجازة تحت موافقات</h6>

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
                                                النوع </th>
                                        <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                            اجازة تحتسب من الرصيد السنوي </th>
                                        <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                            الرصيد السنوي </th>
                                        <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                            حالة الطلب </th>
                                        <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                            تم الانشاء بواسطة</th>
                                        <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                            تم الموافقة بواسطة</th>
                                        <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                            تم الاجازة بواسطة</th>

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
                                                <span class="mb-0 text-sm">{{ $item->fromDate }}</span>
                                            </td>
                                            <td class="align-middle text-center ">
                                                <span class="mb-0 text-sm">{{ $item->toDate }}</span>
                                            </td>
                                            <td class="align-middle text-center ">
                                                <span class="mb-0 text-sm">{{ $item->note }}</span>
                                            </td>
                                            <td class="align-middle text-center ">
                                                <span class="mb-0 text-sm">{{ $item->type->name??"اجازة اخراء" }}</span>
                                            </td>

                                            <td class="align-middle text-center ">
                                                <span class="mb-0 text-sm">{{ $item->is_for_year==0?'اجازة':'اجازة تحتسب من الرصيد السنوي' }}</span>
                                            </td>

                                            <td class="align-middle text-center ">
                                                <span class="mb-0 text-sm">{{ $item->users->max_balance-$item->users->year_balance }}</span>
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
                                                @if($item->is_for_year==0)
                                                <button wire:click='BackCashMoney({{ $item->id }})' type="button"
                                                    name="delete"
                                                    class="mb-0 text-md fa fa-times fa-2x btn btn-danger">رد
                                                    الاجازة</button>
                                                    @endif
                                                    @if($item->is_for_year==1)
                                                    <button wire:click='BackCashMoneyyear({{ $item->id }})' type="button"
                                                        name="delete"
                                                        class="mb-0 text-md fa fa-times fa-2x btn btn-danger">رد
                                                        الاجازة تحتسب من الرصيد السنوي</button>
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




        <!-- =================Edit modal======================= -->




    </div>
