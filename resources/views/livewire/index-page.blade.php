<div>
    <div class="row" >
        <h3 class="text-هىبخ.">شـــاشات النظام</h3>
        @if ($ro->Financial_exchange == 1)
            <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
                <a href="{{ route('NewCashMoney') }}">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">طلب صرف </p>
                                        <h5 class="font-weight-bolder mb-0" style="font-size: 12px">
                                            يسمح لك بطلب صرف وانتظار الوافقة
                                            <span class="text-success text-sm font-weight-bolder">متاح</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-start">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endif

        @if ($ro->Store_exchange == 1)
            <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
                <a href="{{ route('NewStoreMoney') }}">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">طلب صرف مخزني</p>
                                        <h5 class="font-weight-bolder mb-0" style="font-size: 12px">
                                            يسمح لك بطلب صرف مخزني وانتظار الوافقة
                                            <span class="text-success text-sm font-weight-bolder">متاح</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-start">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-box-2 text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endif

        @if ($ro->vacation_request == 1)
            <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
                <a href="{{ route('askoff') }}">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">طلب اجازة</p>
                                        <h5 class="font-weight-bolder mb-0" style="font-size: 12px">
                                            يسمح لك بطلب اجازة وانتظار الوافقة
                                            <span class="text-success text-sm font-weight-bolder">متاح</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-start">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-calendar-grid-58 text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endif

        @if ($ro->buy_request == 1)
            <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
                <a href="{{ route('AskBuy') }}">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">طلب شراء</p>
                                        <h5 class="font-weight-bolder mb-0" style="font-size: 12px">
                                            يسمح لك بطلب شراء وانتظار الوافقة
                                            <span class="text-success text-sm font-weight-bolder">متاح</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-start">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endif

        @if ($ro->ok_Financial_exchange == 1)
            <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4" style="margin-top: 30px">
                <a href="{{ route('OkCashMoney') }}">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">موافقه على الصرف
                                            المالي</p>
                                        <h5 class="font-weight-bolder mb-0" style="font-size: 12px">
                                            تعرض هذه الشاشات الطلبات الصرف المالي الجديدة ليتم الموافقة او الرفض او
                                            التعليق
                                            <span class="text-success text-sm font-weight-bolder" wire:poll.3s>متاح
                                                {{ $okmoney }}</span>

                                        </h5>

                                    </div>
                                </div>
                                <div class="col-4 text-start">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-check-bold text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endif
        @if ($ro->ok_Store_exchange == 1)
            <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4" style="margin-top: 30px">
                <a href="{{ route('okcashstore') }}">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">موافقه على الصرف
                                            مخزني</p>
                                        <h5 class="font-weight-bolder mb-0" style="font-size: 12px">
                                            تعرض هذه الشاشات الطلبات الصرف المخزني الجديدة ليتم الموافقة او الرفضض
                                            او التعليق
                                            <span class="text-success text-sm font-weight-bolder">متاح
                                                {{ $okstore }}</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-start">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-check-bold text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endif

        @if ($ro->ok_vacation_request == 1)
        <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4" style="margin-top: 30px">
            <a href="{{ route('Okaskoff') }}">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">موافقه على طلب
                                        اجازة </p>
                                    <h5 class="font-weight-bolder mb-0" style="font-size: 12px">
                                        تعرض هذه الشاشات الطلبات الاجازة الجديدة ليتم الموافقة او الرفضض او
                                        التعليق
                                        <span class="text-success text-sm font-weight-bolder">متاح
                                            {{ $okaskoff }}</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-start">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-check-bold text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endif


    @if ($ro->ok_buy_request == 1)
        <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4" style="margin-top: 30px">
            <a href="{{ route('OKAskBuy') }}">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">موافقه على طلب
                                        شراء </p>
                                    <h5 class="font-weight-bolder mb-0" style="font-size: 12px">
                                        تعرض هذه الشاشات الطلبات الشراء الجديدة ليتم الموافقة او الرفضض او
                                        التعليق
                                        <span class="text-success text-sm font-weight-bolder">متاح
                                            {{ $okaskbuy }}</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-start">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-check-bold text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endif

    @if ($ro->show_Financial_exchange == 1)
    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4" style="margin-top: 30px">
        <a href="{{ route('ShowMoneyCash') }}">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">عرض اوامر الصرف
                                    المالية</p>
                                <h5 class="font-weight-bolder mb-0" style="font-size: 12px">
                                    تعرض هذه الشاشة اوامر الصرف المالية
                                    <span class="text-success text-sm font-weight-bolder">متاح
                                        {{ $showmoney }}</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-start">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-archive-2 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
@endif


@if ($ro->show_Store_exchange == 1)
    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4" style="margin-top: 30px">
        <a href="{{ route('showcahstore') }}">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">عرض اوامر الصرف
                                    المخزنية</p>
                                <h5 class="font-weight-bolder mb-0" style="font-size: 12px">
                                    تعرض هذه الشاشة اوامر الصرف المخزنية
                                    <span class="text-success text-sm font-weight-bolder">متاح
                                        {{ $showstore }}</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-start">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-archive-2 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
@endif

@if ($ro->show_vacation_request == 1)
    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4" style="margin-top: 30px">
        <a href="{{ route('ShowAskOff') }}">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">عرض طلبات الاجازة
                                    الموافق عليها </p>
                                <h5 class="font-weight-bolder mb-0" style="font-size: 12px">
                                    تعرض هذه الشاشة طلبات الاجازة الموافق عليها
                                    <span class="text-success text-sm font-weight-bolder">متاح
                                        {{ $showaskoff }}</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-start">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-archive-2 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
@endif


@if ($ro->show_buy_request == 1)
    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4" style="margin-top: 30px">
        <a href="{{ route('ShowAskBuy') }}">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">عرض اوامر الشراء
                                </p>
                                <h5 class="font-weight-bolder mb-0" style="font-size: 12px">
                                    تعرض هذه الشاشة اوامر الشراء
                                    <span class="text-success text-sm font-weight-bolder">متاح
                                        {{ $showaskoff }}</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-start">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-archive-2 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
@endif

@if ($ro->send_message == 1)
            <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4" style="margin-top: 30px">
                <a href="{{ route('Messaging') }}">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">الرسائل</p>
                                        <h5 class="font-weight-bolder mb-0" style="font-size: 12px">
                                            هذه الشاشة خاصة ب ب التواصل الموثق داحل النظام
                                            <span class="text-success text-sm font-weight-bolder">متاح</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-start">
                                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-check-bold text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endif
    
    
    
        @if ($ro->new_task == 1)
            <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4" style="margin-top: 30px">
                <a href="{{ route('Tasking') }}">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">تعييين المهام </p>
                                        <h5 class="font-weight-bolder mb-0" style="font-size: 12px">
                                            هذه الشاشة تسمح ب تكليف الموظفين ب مهام
                                            <span class="text-success text-sm font-weight-bolder">متاح</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-start">
                                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-check-bold text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endif
    
        <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4" style="margin-top: 30px">
            <a href="{{ route('Archef') }}">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">ارشيفي</p>
                                    <h5 class="font-weight-bolder mb-0" style="font-size: 12px">
                                        هذه الشاشة تعتبر ارشيف كل موظف يستطيع حفظ ملفاتة ووثائقة بأمان ولا احد يمكن الاطلع
                                        عليها الا من يملك كلمة السر
                                        <span class="text-success text-sm font-weight-bolder">متاح</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-start">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-check-bold text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    
        <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4" style="margin-top: 30px">
            <a href="{{ route('Pepers') }}">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">الورق الرسمية </p>
                                    <h5 class="font-weight-bolder mb-0" style="font-size: 12px">
                                        يمكن تقديم مذكرة او طلب او اي تقرير من هنا
                                        <span class="text-success text-sm font-weight-bolder">متاح</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-start">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-check-bold text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    
    
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4" style="margin-top: 50px">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row mb-3">
                        <div class="col-6">
                            <h6>المهام</h6>
                            <p class="text-sm">
                                <i class="fa fa-check text-info" aria-hidden="true"></i>
    
                            </p>
                        </div>
    
                    </div>
                </div>
                <div class="card-body p-0 pb-2">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        المهمة</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        المكلف</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        التاريخ</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        عمليات</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                @foreach ($task as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="../users_image/{{ $item->users->image }}"
                                                        class="avatar avatar-sm ms-3">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $item->task->name }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0 text-sm">{{ $item->task->users->name }}</h6>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <h6 class="mb-0 text-sm">{{ $item->created_at }}</h6>
                                        </td>
                                        <td class="align-middle">
                                            <form action="{{ route('DaneTask') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" id=""
                                                    value="{{ $item->id }}">
                                                <button type="submit" class="btn btn-info">تم التنفذ</button>
                                            </form>
    
                                            {{-- <form action="{{route('NoTask')}}" method="post">
                                                    @csrf
    
                                                    <input type="hidden" name="id" id="" value="{{$item->id}}">
                                                    <button type="submit" class="btn btn-danger">رفض التفيذ</button> 
                                                </form> --}}
    
    
    
                                        </td>
                                    </tr>
                                @endforeach
    
    
                        </table>
                    </div>
                </div>
            </div>
        </div>



    </div>
    

</div>

{{--  --}}
