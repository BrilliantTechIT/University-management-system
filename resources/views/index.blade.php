@extends('layouts.master')
@section('contain')
    <div>

        <div>


            <div class="row">
                <h3 class="text-هىبخ.">شـــاشات النظام</h3>
                @if ($ro->Financial_exchange==1)
                <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
                    <a href="">
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

                @if ($ro->Store_exchange==1)            
                <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
                    <a href="">
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

                @if ($ro->vacation_request==1)

                <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
                    <a href="">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">طلب اجازة</p>
                                            <h5 class="font-weight-bolder mb-0" style="font-size: 12px">
                                               يسمح لك بطلب  اجازة  وانتظار الوافقة
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




                @if ($ro->buy_request==1)
                <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
                    <a href="">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">طلب شراء</p>
                                            <h5 class="font-weight-bolder mb-0" style="font-size: 12px">
                                               يسمح لك بطلب  شراء  وانتظار الوافقة
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


                @if ($ro->ok_Financial_exchange==1)
                <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4" style="margin-top: 30px">
                    <a href="">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">موافقه على الصرف المالي</p>
                                            <h5 class="font-weight-bolder mb-0" style="font-size: 12px">
                                               تعرض هذه الشاشات الطلبات الصرف المالي الجديدة ليتم الموافقة او الرفض او التعليق
                                                <span class="text-success text-sm font-weight-bolder">متاح</span>
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


                @if ($ro->ok_Store_exchange==1)
                <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4" style="margin-top: 30px">
                    <a href="">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">موافقه على الصرف مخزني</p>
                                            <h5 class="font-weight-bolder mb-0" style="font-size: 12px">
                                               تعرض هذه الشاشات الطلبات الصرف المخزني الجديدة ليتم الموافقة او الرفضض او التعليق
                                                <span class="text-success text-sm font-weight-bolder">متاح</span>
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

                @if ($ro->ok_vacation_request==1)
                <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4" style="margin-top: 30px">
                    <a href="">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">موافقه على طلب اجازة </p>
                                            <h5 class="font-weight-bolder mb-0" style="font-size: 12px">
                                               تعرض هذه الشاشات الطلبات الاجازة الجديدة ليتم الموافقة او الرفضض او التعليق
                                                <span class="text-success text-sm font-weight-bolder">متاح</span>
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


                @if ($ro->ok_buy_request==1)
                <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4" style="margin-top: 30px">
                    <a href="">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">موافقه على طلب شراء </p>
                                            <h5 class="font-weight-bolder mb-0" style="font-size: 12px">
                                               تعرض هذه الشاشات الطلبات الشراء الجديدة ليتم الموافقة او الرفضض او التعليق
                                                <span class="text-success text-sm font-weight-bolder">متاح</span>
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











                @if ($ro->show_Financial_exchange==1)
                <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4" style="margin-top: 30px">
                    <a href="">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">عرض اوامر الصرف المالية</p>
                                            <h5 class="font-weight-bolder mb-0" style="font-size: 12px">
                                                تعرض هذه الشاشة اوامر الصرف المالية 
                                                <span class="text-success text-sm font-weight-bolder">متاح</span>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-start">
                                        <div
                                            class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                            <i class="ni ni-archive-2 text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endif


                @if ($ro->show_Store_exchange==1)
                <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4" style="margin-top: 30px">
                    <a href="">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">عرض اوامر الصرف المخزنية</p>
                                            <h5 class="font-weight-bolder mb-0" style="font-size: 12px">
                                                تعرض هذه الشاشة اوامر الصرف المخزنية 
                                                <span class="text-success text-sm font-weight-bolder">متاح</span>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-start">
                                        <div
                                            class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                            <i class="ni ni-archive-2 text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endif

                @if ($ro->show_vacation_request==1)
                <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4" style="margin-top: 30px">
                    <a href="">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">عرض طلبات الاجازة الموافق عليها  </p>
                                            <h5 class="font-weight-bolder mb-0" style="font-size: 12px">
                                                تعرض هذه الشاشة طلبات الاجازة الموافق عليها 
                                                <span class="text-success text-sm font-weight-bolder">متاح</span>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-start">
                                        <div
                                            class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                            <i class="ni ni-archive-2 text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endif


                @if ($ro->show_buy_request==1)
                <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4" style="margin-top: 30px">
                    <a href="">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">عرض اوامر الشراء </p>
                                            <h5 class="font-weight-bolder mb-0" style="font-size: 12px">
                                                تعرض هذه الشاشة اوامر الشراء 
                                                <span class="text-success text-sm font-weight-bolder">متاح</span>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-start">
                                        <div
                                            class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                            <i class="ni ni-archive-2 text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endif














                @if ($ro->send_message==1)
                <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4" style="margin-top: 30px">
                    <a href="">
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


                @if ($ro->send_file==1)
                <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4" style="margin-top: 30px">
                    <a href="">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">راسال التقارير</p>
                                            <h5 class="font-weight-bolder mb-0" style="font-size: 12px">
                                               هذه الشاشة خاصة بأرسال التقارير
                                                <span class="text-success text-sm font-weight-bolder">متاح</span>
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

                @if ($ro->new_task==1)
                <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4" style="margin-top: 30px">
                    <a href="{{route('Tasking')}}">
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


               





                


                {{-- <script src="assets/js/testnodejs.js"></script> --}}

            </div>
        </div>



    </div>
@endsection
