<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <title>{{$peper->name}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
    {{-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> --}}
    <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('assets/css/soft-ui-dashboard.css?v=1.0.3')}}" rel="stylesheet" />
    <style>
        /* إعدادات الصفحة الأساسية */
        body,
        html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            font-size: 14px;
            direction: rtl;
            box-sizing: border-box;
            background-color: #f8f9fa;
        }

        /* إضافة إطار أنيق */
        .container {
            width: 100%;
            max-width: 210mm;
            margin: auto;
            padding: 20px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            border: 2px solid #000; /* الإطار الخارجي */
            border-radius: 8px;
            position: relative;
            overflow: hidden;
        }

        /* العلامة المائية */
        .container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('{{asset('assets/img/logo.png')}}'); /* ضع مسار العلامة المائية هنا */
            background-size: 200px 200px; /* حجم العلامة المائية */
            background-repeat: no-repeat;
            background-position: center;
            opacity: 0.1; /* شفافية العلامة المائية */
            z-index: 0;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
            position: relative;
            z-index: 1; /* يظهر فوق العلامة المائية */
        }

        .header .left,
        .header .right,
        .header .center {
            width: 100%;
            text-align: center;
        }

        .header .left,
        .header .right {
            width: 30%;
        }

        .header .center {
            width: 40%;
        }

        .header img {
            height: 80px;
            width: auto;
        }

        .content {
            text-align: justify;
            margin-top: 20px;
            position: relative;
            z-index: 1; /* يظهر فوق العلامة المائية */
        }

        .form-card {
            border: 1px solid #ddd;
            padding: 15px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #f7f7f7;
            position: relative;
            z-index: 1; /* يظهر فوق العلامة المائية */
        }

        .form-card form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .form-card label {
            font-weight: bold;
        }

        .form-card input,
        .form-card textarea,
        .form-card button {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-card button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        /* إعدادات الطباعة */
        @media print {
            @page {
                size: A4;
                margin: 2cm;
            }

            .container {
                box-shadow: none;
                padding: 0;
                margin: 0;
                border: none; /* إزالة الإطار عند الطباعة */
            }

            .form-card {
                display: none;
            }
        }

        /* إعدادات التوافق مع الهواتف */
        @media (max-width: 768px) {
            .form-card {
                width: 100%;
            }
        }
    </style>
    
</head>

<body>

    @livewire('peaper-manage', ['id_peper' => $id_peper])

    <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>

    <script src="{{asset('assets/js/plugins/fullcalendar.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/chartjs.min.js')}}"></script>
    <script src="{{asset('assets/js/soft-ui-dashboard.min.js?v=1.0.3')}}"></script>

</body>

</html>
