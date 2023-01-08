<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('assets/main/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/main/css/style.css') }}">
    <script src="https://kit.fontawesome.com/cf67a48d05.js" crossorigin="anonymous"></script>

    <title>Avatoop</title>

    <style>
        body {
        {{--background-image: url( {{url('assets/images/main/lg.jpg')}} );--}}
 /*background-size: cover;*/
        }

        .left-0 {
            left: 0 !important;
        }

        h1 {
            text-align: right;
            text-decoration: none;
        }

        .login {
            border-radius: 0 0 100px 0;
            height: 40px;
            width: 70px;
            background-color: #721c24;
            color: #ffffff !important;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .dashboardBtn {
            border-radius: 0 0 0 100px;
            height: 40px;
            width: 80px;
            background-color: #721c24;
            color: #ffffff !important;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .login a {
            padding-right: 15px;
        }

        #box_2 {
            display: none;
        }

        @media (max-width: 1114px) {
            #box {
                display: none;
            }

            #box_2 {
                display: block !important;
            }
        }
    </style>
</head>

<body>
<div class="conteiner-fluid m-0 p-0">
    <div class="row m-0 p-0">
        <div class="col-12 p-0 m-0">

            <div class="position-relative" id="box">

                <div class="position-absolute top-0 start-0">
                    <img src="{{ asset('assets/images/main/wall.jpg') }}" id="image-box" class="img-fluid" alt="">
                </div>
                <div class="position-absolute top-0 start-0 w-100 h-100">
                    @role(['admin','reporter'])
                    <div class="position-absolute top-0 right-0 position-fixed dashboardBtn" >
                        <a class="text-white d-inline-block" href="{{ route('admin.dashboard') }}">داشبورد</a>
                    </div>
                    @endrole
                    <div class="row w-100 h-100">
                        <div class="col-6 d-flex p-5 justify-content-center align-items-center">
                            <div class="d-block p-5">
                                <h1>آواتوپ</h1>
                                <br>
                                <h2>طراحی شده توسط شرکت بهینه سازان سرزمین هوشمند</h2>
                                <br>
                                <h3>تیم طراحی :</h3>
                                <h4>آقای دکتر کیاوش نوری</h4>
                                <h4>آقای مهندس سجاد خلفی</h4>
                                <h4>آقای مهندس محسن اکبری</h4>
                                <h4>آقای مهندس علیرضا دارینظر</h4>
                                <h4>آقای مهندس عرشیا بنائی</h4>
                                <h4>خانم مهندس فهیمه دست باز</h4>
                                <h4>خانم مهندس فاطمه قاسمی</h4>
                                <h4>آقای مهندس محمد رضا رفائی</h4>
                                <h4>آقای مهندس امیرحسین بازیار</h4>
                                <h4>آقای مهندس محمد منتظری</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="box_2">
                <div class="col-12 px-5 pt-5">
                    <img src="{{ asset('assets/images/main/girl.png') }}" class="img-fluid" alt="">
                </div>
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <div class="d-block p-5">
                        <h1>آواتوپ</h1>
                        <br>
                        <h2>طراحی شده توسط شرکت بهینه سازان سرزمین هوشمند</h2>
                        <br>
                        <h3>تیم طراحی :</h3>
                        <h4>آقای دکتر کیاوش نوری</h4>
                        <h4>آقای مهندس سجاد خلفی</h4>
                        <h4>آقای مهندس محسن اکبری</h4>
                        <h4>آقای مهندس علیرضا دارینظر</h4>
                        <h4>آقای مهندس عرشیا بنائی</h4>
                        <h4>خانم مهندس فهیمه دست باز</h4>
                        <h4>خانم مهندس فاطمه قاسمی</h4>
                        <h4>آقای مهندس محمد رضا رفائی</h4>
                        <h4>آقای مهندس امیرحسین بازیار</h4>
                        <h4>آقای مهندس محمد منتظری</h4>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@role(['admin','reporter'])
<div class="position-absolute top-0 right-0 position-fixed dashboardBtn" >
    <a class="text-white d-inline-block" href="{{ route('admin.dashboard') }}">داشبورد</a>
</div>
@endrole
<div class="position-fixed top-0 left-0 login">
    @auth
        <a class="text-white" href="{{ route('logout') }}"
           onclick="event.preventDefault();document.getElementById('logout-form').submit();" title="">خروج</a>
    @else
        <a class="text-white" href="{{ route('login') }}">ورود</a>
    @endauth
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
    </form>

</div>

<script src="{{ asset("assets/admin/plugins/jquery/jquery.slim.js") }}"></script>
<script>
    $(document).ready(function () {
        setInterval(function () {
            $("#box").height($("#image-box").height())
        })
    })
</script>


</body>
<script src="{{ asset('assets/main/js/bootstrap.bundle.min.js') }}"></script>

</html>
