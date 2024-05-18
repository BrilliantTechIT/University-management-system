<body>
    @php

        if (session('OkCashstore')) {
            $cashsend = session()->get('OkCashstore');
            $item = $cashsend->item;
            $num = $cashsend->num;
            $unite = $cashsend->unite;
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

        <div class="container-fluid py-4">
            <div class="row">
                <script>
                    function js_cashmoney(item, num, unite, note, date, createBy, id, juserid, juserimage, sendname, sendid,
                        snderOfaskid) {

                        SocketIO.emit("send_cashstore", {
                            "item": item,
                            "num": num,
                            "unite": unite,
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
                @if (session('OkCashstore'))
                    <script>
                        js_cashmoney('{{ $item }}', '{{ $num }}', '{{ $unite }}', '{{ $note }}',
                            '{{ $date }}',
                            '{{ $createBy }}', '{{ $id }}', {{ $juserid }}, '{{ $juserimage }}',
                            '{{ $sendname }}', '{{ $sendid }}', '{{ $snderOfaskname }}');
                    </script>
                @endif

                @if (session('stute_ok_store'))
                    @if (session()->get('stute_ok_store') == 1)
                        <script>
                            return_for_asker({{ $snderOfaskid }}, 'تم قبول طلب مخزني لك', '{{ $juserimage }}', '{{ $date }}',
                                '{{ $sendname }}');
                        </script>
                    @else
                        <script>
                            return_for_asker({{ $snderOfaskid }}, 'تم رفض طلب مخزني لك', '{{ $juserimage }}', '{{ $date }}',
                                '{{ $sendname }}');
                        </script>
                    @endif
                @endif


                <div class="col-12">


                    <div class="card mb-4">

                        <div class="card-header pb-0">

                            <h6> طلبات الصرف تحت الانتظار</h6>

                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="row" id="targetRow">
                                @foreach ($wait as $item)
                                    <div class="col-md-6 col-12">
                                        <div class="card-container">

                                            <img class="hero-image" src="users_image/{{ $item->users->image }}"
                                                alt="Spinning glass cube" />

                                            <main class="main-content">
                                                <h1><a href="#">{{ $item->users->name }}</a></h1>

                                                <h2>
                                                    الكمية:{{ $item->num }} {{ $item->unite }}
                                                </h2>
                                                <h2>
                                                    ملاحظة:{{ $item->note }}
                                                </h2>


                                                <center>
                                                    <p dir="ltr">{{ $item->created_at }}</p>
                                                </center>
                                                <center>
                                                    <div class="row">
                                                        <div class="col-md-3 col-12" style="margin: 10px">
                                                            <form action="{{ route('StoreOkCashstore') }} " method="POST">

                                                                @csrf
                                                                <input type="hidden" name="id"
                                                                    value="{{ $item->id }}" id="">
                                                                <button type="submit" name="delete"
                                                                    class="mb-0 text-md fa fa-check fa-2x btn btn-success">موافق</button>
                                                            </form>



                                                        </div>
                                                        <div class="col-md-3 col-12" style="margin: 10px">
                                                            <form action="{{ route('NoOkCashstore') }} " method="POST">

                                                                @csrf
                                                                <input type="hidden" name="id"
                                                                    value="{{ $item->id }}" id="">
                                                                <button type="submit" name="delete"
                                                                    class="mb-0 text-md fa fa-times fa-2x btn btn-danger">رفض</button>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-3 col-12" style="margin: 10px">
                                                            <a class="btn btn-info"
                                                                href="{{ route('chatok', ['id' => $item->id, 'ad' => 'ad']) }}">محادثة</a>
                                                        </div>

                                                    </div>
                                                </center>

                                            </main>


                                        </div>


                                    </div>
                                @endforeach
                            </div>
                            {{-- <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="S_table">
                                    <thead>
                                        <tr>

                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                العنصر </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                الكمية </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                الوحدة </th>
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
                                                    <span class="mb-0 text-sm">{{ $item->item }}</span>
                                                </td>
                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->num }}</span>
                                                </td>
                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->unite }}</span>
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


                                                    <form action="{{ route('StoreOkCashstore') }} " method="POST">

                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $item->id }}"
                                                            id="">
                                                        <button type="submit" name="delete"
                                                            class="mb-0 text-md fa fa-check fa-2x btn btn-success">موافق</button>
                                                    </form>
                                                    <br>

                                                    <form action="{{ route('NoOkCashstore') }} " method="POST">

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
                            </div> --}}
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
                                                العنصر </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                الكمية </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                الوحدة </th>
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
                                                    <span class="mb-0 text-sm">{{ $item->item }}</span>
                                                </td>
                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->num }}</span>
                                                </td>
                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->unite }}</span>
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



                                                    <form action="{{ route('NoOkCashstore') }} " method="POST">

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

                            <h6> طلبات الصرف المرفوضات</h6>

                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="S_table">
                                    <thead>
                                        <tr>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                العنصر </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                الكمية </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                الوحدة </th>
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
                                                    <span class="mb-0 text-sm">{{ $item->item }}</span>
                                                </td>
                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->num }}</span>
                                                </td>
                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->unite }}</span>
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


                                                    <form action="{{ route('StoreOkCashstore') }} " method="POST">

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

                            <h6> طلبات الصرف المصروفة</h6>

                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="S_table">
                                    <thead>
                                        <tr>

                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                العنصر </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                الكمية </th>
                                            <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                                                الوحدة </th>
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
                                                    <span class="mb-0 text-sm">{{ $item->item }}</span>
                                                </td>
                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->num }}</span>
                                                </td>
                                                <td class="align-middle text-center ">
                                                    <span class="mb-0 text-sm">{{ $item->unite }}</span>
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
                SocketIO.on("get_cashstore", function(data) {
                    console.log(data);
                var targetRow = document.getElementById("targetRow");

                // Provided HTML content to be added
                var htmlContent = `
                    <div class="col-md-6 col-12">
                    <div class="card-container">
                        
                            <img class="hero-image" src="users_image/${data.images}"
                                alt="Spinning glass cube" />
                        
                        <main class="main-content">
                            <h1><a href="#">${data.sendname}</a></h1>

                            <h2>
                                العنصر:${data.num} ${data.unite}
                            </h2>

                            <p>ملاحظة:${data.note}</p>
                            <center>
                                <p dir="ltr">${data.date}</p>
                            </center>

                            <center>
                                <div class="row">
                                    <div class="col-md-3 col-12" style="margin: 10px">
                                        <form action="{{ route('StoreOkCashstore') }} " method="POST">

                                            @csrf
                                            <input type="hidden" name="id"
                                                value="${data.id}" id="">
                                            <button type="submit" name="delete"
                                                class="mb-0 text-md fa fa-check fa-2x btn btn-success">موافق</button>
                                        </form>



                                    </div>
                                    <div class="col-md-3 col-12" style="margin: 10px">
                                        <form action="{{ route('NoOkCashstore') }} " method="POST">

                                            @csrf
                                            <input type="hidden" name="id"
                                                value="${data.id}" id="">
                                            <button type="submit" name="delete"
                                                class="mb-0 text-md fa fa-times fa-2x btn btn-danger">رفض</button>
                                        </form>
                                    </div>
                                    <div class="col-md-3 col-12" style="margin: 10px">
                                        <form action="{{ route('chatok', ['ad' => 'ad']) }} " method="get">

                                        @csrf
                                        <input type="hidden" name="id"
                                                value="${data.id}" id="">
                                        <button type="submit" name="delete"
                                            class="mb-0 text-md fa fa-times fa-2x btn btn-info">محادثة</button>
                                        </form>
                                        
                                    </div>

                                </div>
                            </center>

                        </main>


                    </div>


                </div>
`;

                // Append the provided HTML content to the 'row' div
                targetRow.innerHTML += htmlContent;




                });
                // alert(data.name);

                // Append the new row to the tbody

              
            </script>
        @endsection
</body>
