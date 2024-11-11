<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&display=swap');
        
        
        
                :root {
        
                    font-size: 15px;
        
                    /* Primary */
                    --var-soft-blue: hsl(215, 51%, 70%);
                    --var-cyan: hsl(178, 100%, 50%);
                    /* Neutral */
                    --var-main-darkest: hsl(217, 54%, 11%);
                    --var-card-dark: hsl(216, 50%, 16%);
                    --var-line-dark: hsl(215, 32%, 27%);
                    --var-lightest: white;
        
                    /* Fonts */
        
                    --var-heading: normal normal 600 1.5em/1.6em 'Outfit', sans-serif;
        
                    --var-small-heading: normal normal 400 1em/1em 'Outfit', sans-serif;
        
                    --var-para: normal normal 300 1em/1.55em 'Outfit', sans-serif;
                }
        
        
        
        
        
        
        
        
                .card-container img {
                    width: 100%;
                    border-radius: 15px;
                    display: block;
                }
        
                .card-container a {
                    color: inherit;
                }
        
        
        
                .card-container h1 {
                    font: var(--var-heading);
                    /* color: var(--var-lightest); */
                    color: #000;
                    padding: 1.2em 0;
                }
        
                .card-container h2 {
                    font: var(--var-small-heading);
                    /* color: var(--var-lightest); */
                    color: rgb(0, 157, 255)
                        /* padding on .coin-base */
                }
        
                .card-container p {
                    font: var(--var-para);
                    /* color: var(--var-soft-blue); */
                    color: #4229bd;
                }
        
                .card-container span {
                    color: white;
                }
        
                /*
                    =====================
                    Classes
                    =====================
                    */
        
                /* LAYOUT */
        
                .card-container {
                    width: 100%;
                    max-width: 400px;
                    margin: 2em auto;
                    /* background-color: var(--var-card-dark); */
                    background-color: bisque;
                    border-radius: 15px;
                    margin-bottom: 1rem;
                    padding: 2rem;
                }
        
                div.flex-row {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                }
        
                div.coin-base,
                .time-left,
                .card-attribute {
                    display: flex;
                    align-items: center;
                    padding: 1em 0;
                }
        
                .card-attribute {
                    padding-bottom: 1.5em;
                    border-top: 2px solid var(--var-line-dark);
                }
        
                a.hero-image-container {
                    position: relative;
                    display: block;
                }
        
        
        
                /* Details */
        
                img.eye {
                    position: absolute;
                    width: 100%;
                    max-width: 2em;
                    top: 44%;
                    left: 43%;
                }
        
                @media (min-width:400px) {
                    img.eye {
                        max-width: 3em;
                    }
                }
        
                .hero-image-container::after {
                    content: '';
                    background-image: url("https://i.postimg.cc/9MtT4GZY/view.png");
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: 5rem;
                    background-color: hsla(178, 100%, 50%, 0.3);
                    width: 100%;
                    height: 100%;
                    border-radius: 1rem;
                    position: absolute;
                    top: 0;
                    left: 0;
                    display: block;
                    z-index: 2;
                    opacity: 0;
                    transition: opacity 0.3s ease-out;
                }
        
                .hero-image-container:hover::after {
                    opacity: 1;
                }
        
                .small-image {
                    width: 1.2em;
                    margin-right: .5em;
                }
        
                .small-avatar {
                    width: 2em;
                    border-radius: 200px;
                    outline: 2px solid white;
                    margin-right: 1.4em;
                }
        
                div.attribution {
                    margin: 0 auto;
                    width: 100%;
                    font: var(--var-para);
                    text-align: center;
                    padding: 1.5em 0 4em 0;
                    color: var(--var-line-dark);
                }
        
                .attribution a {
                    color: var(--var-soft-blue);
                }
            </style>

            <div class="card mb-4">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="card-header pb-0">

                    <h6> طلبات اجازة تحت الانتظار</h6>

                </div>
                <div wire:poll.2s class="card-body px-0 pt-0 pb-2">

                    @foreach ($wait as $item)
                    <div class="col-md-6 col-12">
                        <div class="card-container">

                            <img class="hero-image" src="users_image/{{ $item->users->image }}"
                                alt="Spinning glass cube" />

                            <main class="main-content">
                                <h1><a href="#">{{ $item->users->name }}</a></h1>

                                <h2>
                                    تاريخ البداية:{{ $item->fromDate }}
                                </h2>
                                <h2>
                                    تاريخ النهاية:{{ $item->toDate }}
                                </h2>
                                <h2>
                                    النوع:{{ $item->type??"اجازة اخرء" }}
                                </h2>
                                <h2>
                                    الملاحظة:{{ $item->note }}
                                </h2>
                                <h2>
                                    المتبقي من رصيدي السنوي:({{ $item->users->max_balance-$item->users->year_balance }})
                                </h2>


                                <center>
                                    <p dir="ltr">{{ $item->created_at }}</p>
                                </center>
                                <center>
                                    <div class="row">
                                        <div class="col-md-3 col-12" style="margin: 10px">
                                            <button wire:click='StoreOkAskoff({{$item->id}})' type="button" name="delete"
                                                class="mb-0 text-md fa fa-check fa-2x btn btn-success">موافق</button>
                                        </div>
                                        <div class="col-md-3 col-12" style="margin: 10px">

                                            <button wire:click='NoOkAskoff({{$item->id}})' type="button" name="delete"
                                                class="mb-0 text-md fa fa-times fa-2x btn btn-danger">رفض</button>

                                        </div>
                                        <div class="col-md-3 col-12" style="margin: 10px">
                                            <a class="btn btn-info" href="{{route('ShowOff',['id'=>$item->uid])}}">فتح الطلب</a>
                                        </div>

                                    </div>
                                </center>

                            </main>


                        </div>


                    </div>
                    @endforeach
                    {{-- <div class="table-responsive p-0">
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


                                                <button type="button" wire:click="StoreOkAskoff({{$item->id}})"
                                                    class="mb-0 text-md fa fa-check fa-2x btn btn-success">موافق</button>
                                           
                                            <br>

                                            
                                                <button type="button" wire:click="NoOkAskoff({{$item->id}})" name="delete"
                                                    class="mb-0 text-md fa fa-times fa-2x btn btn-danger">رفض</button>
                                           
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> --}}
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



                                                <button type="button" wire:click="NoOkAskoff({{$item->id}})" name="delete"
                                                    class="mb-0 text-md fa fa-times fa-2x btn btn-danger">رفض</button>
                                           
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


                                            <button type="button" wire:click="StoreOkAskoff({{$item->id}})"
                                                    class="mb-0 text-md fa fa-check fa-2x btn btn-success">موافق</button>

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
</div>
{{-- <body>
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
                {{ session('stute_ok_off') }}
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
</body> --}}
