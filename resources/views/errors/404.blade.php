<!doctype html>
<html lang="fa" dir="rtl">
<head>

    <meta charset="UTF-8">

    <title>Error 404</title>

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
    <img src="{{asset('assets/images/error/404.png')}}" alt="error 404">
    <h3>ادمین / خبرنگار محترم صفحه شما یافت نشد.</h3>
</div>
</body>
</html>
