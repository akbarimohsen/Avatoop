<!doctype html>
<html lang="fa" dir="rtl">
<head>

    <meta charset="UTF-8">

    <title>Error 400</title>

    <style rel="stylesheet">
        @font-face {
            font-family: Titr;
            src: url({{asset('assets/main/font/B_Titr.ttf')}});
        }
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            width: 100%;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Titr, Tahoma, sans-serif !important;
        }
        .d-block {
            display: block;
        }
        .text-center {
            text-align: center;
        }
    </style>

</head>
<body>
<div class="d-block text-center">
    <img src="{{asset('assets/images/error/400.png')}}" alt="error 400">
    <h3>درخواست شما قابل اجرا نمیباشد یا دسترسی شما غیر مجاز می باشد.</h3>
</div>
</body>
</html>
