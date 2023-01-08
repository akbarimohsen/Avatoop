<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت | داشبورد اول</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
{{--    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/font-awesome/css/font-awesome.min.css')}}">--}}
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome-6.2.1/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/adminlte.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/iCheck/flat/blue.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/morris/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datepicker/datepicker3.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/daterangepicker/daterangepicker-bs3.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/bootstrap-rtl.min.css')}}">
    <!-- template rtl version -->
    <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/custom-style.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/select2.min.css')}}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/adminlte.min.css')}}"> --}}
    <link rel="stylesheet" href="https://unpkg.com/persian-datepicker@latest/dist/css/persian-datepicker.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">


    <style>
        .ms-lg-250 {
            margin-right: 0;
        }
        @media (min-width: 992px) {
            .ms-lg-250 {
                margin-right: 250px;
            }
        }
        .d-none-after:after {
            display: none;
        }
        .card {
            cursor: pointer;
        }
        .card .card-header:hover {
            color: #0dcaf0;
        }
        .card .card-body a:hover {
            color: #0dcaf0;
        }
        .text-hover:hover {
            color: #0dcaf0;
        }
        .sidebar-collapse .text-me {
            display: none;
        }
        .sidebar-collapse .main-sidebar:hover .text-me {
            display: block;
        }
        /*.angle {*/
        /*    transform: rotate(0deg);*/
        /*    cursor: pointer;*/
        /*}*/
        /*.down .col-1 {*/
        /*    transform: rotate(-90deg);*/
        /*}*/
    </style>

    @livewireStyles()

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a class="nav-link brd-rd5" href="{{ route('logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();" title="">خروج</a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">تماس</a>
            </li>
{{----}}
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="fa fa-bell-o"></i>
                  <span class="badge badge-warning navbar-badge">{{ Auth::user()->unreadNotifications()->count() }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                  <span class="dropdown-item dropdown-header">{{ Auth::user()->unreadNotifications()->count() }} نوتیفیکیشن</span>
                  <div class="dropdown-divider"></div>
                  <a href="{{ route('user.adminEmails') }}" class="dropdown-item">
                    <i class="fa fa-envelope ml-2"></i>  مشاهده ایمیل های ادمین
                    <span class="float-left text-muted text-sm"></span>
                  </a>
                  <div class="dropdown-divider"></div>
{{----}}
                </div>
            </li>
{{----}}
        </ul>
{{----}}
         <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="جستجو" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
{{----}}
        <!-- Right navbar links -->
        <ul class="navbar-nav mr-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fa fa-comments-o"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 ml-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                    <span class="float-left text-sm text-danger"><i class="fa fa-star"></i></span>
                                </h3>
                                <p class="text-sm">با من تماس بگیر لطفا...</p>
                                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 ساعت قبل</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle ml-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    پیمان احمدی
                                    <span class="float-left text-sm text-muted"><i class="fa fa-star"></i></span>
                                </h3>
                                <p class="text-sm">من پیامتو دریافت کردم</p>
                                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 ساعت قبل</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle ml-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    سارا وکیلی
                                    <span class="float-left text-sm text-warning"><i class="fa fa-star"></i></span>
                                </h3>
                                <p class="text-sm">پروژه اتون عالی بود مرسی واقعا</p>
                                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i>4 ساعت قبل</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                </div>
            </li>
{{----}}
            <!-- Notifications Dropdown Menu -->
             <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell-o"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                    <span class="dropdown-item dropdown-header">15 نوتیفیکیشن</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fa fa-envelope ml-2"></i> 4 پیام جدید
                        <span class="float-left text-muted text-sm">3 دقیقه</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fa fa-users ml-2"></i> 8 درخواست دوستی
                        <span class="float-left text-muted text-sm">12 ساعت</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fa fa-file ml-2"></i> 3 گزارش جدید
                        <span class="float-left text-muted text-sm">2 روز</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">مشاهده همه نوتیفیکیشن</a>
                </div>
            </li>
             <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                        class="fa fa-th-large"></i></a>
            </li>
        </ul>
{{----}}
    </nav>
{{--    <!-- /.navbar -->--}}
{{----}}
{{--    <!-- Main Sidebar Container -->--}}
    <aside class="main-sidebar sidebar-white-primary elevation-4">
        <!-- Sidebar -->
        <div class="sidebar" style="direction: ltr; height: 100vh; background-color: #ffffff">
            <div style="direction: rtl">

                @role('admin')
                <div class="accordion" id="accordionAdmin">
                    {{-- USER Management --}}
                    <div class="card mt-3 shadow-none">
                        <div class="card-header p-0" id="headingOne">
                            <h5 class="mb-0">
                                <a class="nav-link collapsed text-black" style="font-size: smaller" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <div class="row angle">
                                        <div class="col-2 text-center">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <div class="col-10 text-me">مدریت کاربران</div>
                                    </div>
                                </a>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionAdmin">
                            <div class="card-body pr-5">
                                <a href="{{ route('user.index') }}" class="link-black">
                                    <div class="row">
                                        <div class="col-2 d-flex justify-content-center">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <div class="col-10 text-me">
                                            لیست کاربران
                                        </div>
                                    </div>
                                </a>
                                <a href="{{ route('user.create') }}" class="link-black">
                                    <div class="row">
                                        <div class="col-2 d-flex justify-content-center">
                                            <i class="fa fa-user-plus"></i>
                                        </div>
                                        <div class="col-10 text-me">
                                            ایجاد کاربر
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- NEWS Management --}}
                    <div class="card shadow-none">
                        <div class="card-header p-0" id="headingTwo">
                            <h5 class="mb-0">
                                <a class="nav-link collapsed text-black" style="font-size: smaller" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    <div class="row angle">
                                        <div class="col-2 text-center">
                                            <i class="fa-solid fa-rss"></i>
                                        </div>
                                        <div class="col-10 text-me">مدریت اخبار RSS</div>
                                    </div>
                                </a>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionAdmin">
                            <div class="card-body pr-5">
                                <a href="{{ route('rss.index') }}" class="link-black">
                                    <div class="row">
                                        <div class="col-2 d-flex justify-content-center">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <div class="col-10 text-me">
                                            لیست اخبار RSS
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- Role and Permission Management --}}
                    <div class="card shadow-none">
                        <div class="card-header p-0" id="headingThree">
                            <h5 class="mb-0">
                                <a class="nav-link collapsed text-black" style="font-size: smaller" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                    <div class="row angle">
                                        <div class="col-2 text-center">
                                            <i class="fa fa-shield"></i>
                                        </div>
                                        <div class="col-10 text-me">مدریت نقش ها</div>
                                    </div>
                                </a>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionAdmin">
                            <div class="card-body pr-5">
                                <a href="{{ route('role.create') }}" class="link-black">
                                    <div class="row">
                                        <div class="col-2 d-flex justify-content-center">
                                            <i class="fa-solid fa-person-circle-question"></i>
                                        </div>
                                        <div class="col-10 text-me">
                                            نقش ها
                                        </div>
                                    </div>
                                </a>
                                <a href="{{ route('permission.create') }}" class="link-black">
                                    <div class="row">
                                        <div class="col-2 d-flex justify-content-center">
                                            <i class="fa-solid fa-user-lock"></i>
                                        </div>
                                        <div class="col-10 text-me">
                                            مجوز ها
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- Tags Management --}}
                    <div class="card shadow-none">
                        <div class="card-header p-0" id="headingFour">
                            <h5 class="mb-0">
                                <a class="nav-link collapsed text-black" style="font-size: smaller" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                    <div class="row angle">
                                        <div class="col-2 text-center">
                                            <i class="fa fa-tag"></i>
                                        </div>
                                        <div class="col-10 text-me">مدریت برچسب ها</div>
                                    </div>
                                </a>
                            </h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionAdmin">
                            <div class="card-body pr-5">
                                <a href="{{ route('tag.index') }}" class="link-black">
                                    <div class="row">
                                        <div class="col-2 d-flex justify-content-center">
                                            <i class="fa fa-tags"></i>
                                        </div>
                                        <div class="col-10 text-me">
                                            لیست برچست ها
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- Team and Player Management --}}
                    <div class="card shadow-none">
                        <div class="card-header p-0" id="headingFive">
                            <h5 class="mb-0">
                                <a class="nav-link collapsed text-black" style="font-size: smaller" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                    <div class="row angle">
                                        <div class="col-2 text-center">
                                            <i class="fa-solid fa-people-group"></i>
                                        </div>
                                        <div class="col-10 text-me">مدریت تیم و بازیکنان</div>
                                    </div>
                                </a>
                            </h5>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionAdmin">
                            <div class="card-body pr-5">
                                <a href="{{ route('admin.players') }}" class="link-black">
                                    <div class="row">
                                        <div class="col-2 d-flex justify-content-center">
                                            <i class="fa-solid fa-address-book"></i>
                                        </div>
                                        <div class="col-10 text-me">
                                            لیست بازیکنان
                                        </div>
                                    </div>
                                </a>
                                <a href="{{ route('admin.teams') }}" class="link-black">
                                    <div class="row">
                                        <div class="col-2 d-flex justify-content-center">
                                            <i class="fa-solid fa-people-group"></i>
                                        </div>
                                        <div class="col-10 text-me">
                                            لیست تیم ها
                                        </div>
                                    </div>
                                </a>
                                <a href="{{ route('admin.positions') }}" class="link-black">
                                    <div class="row">
                                        <div class="col-2 d-flex justify-content-center">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        <div class="col-10 text-me">
                                            لیست پست های بازی
                                        </div>
                                    </div>
                                </a>
                                <a href="{{ route('leagues.index') }}" class="link-black">
                                    <div class="row">
                                        <div class="col-2 d-flex justify-content-center">
                                            <i class="fa-solid fa-flag-checkered"></i>
                                        </div>
                                        <div class="col-10 text-me">
                                            لیست لیگ ها
                                        </div>
                                    </div>
                                </a>
                                <a href="{{ route('nationalities.index') }}" class="link-black">
                                    <div class="row">
                                        <div class="col-2 d-flex justify-content-center">
                                            <i class="fa-solid fa-earth-asia"></i>
                                        </div>
                                        <div class="col-10 text-me">
                                            لیست ملیت ها
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- ADS Management--}}
                    <div class="card shadow-none">
                        <div class="card-header p-0" id="headingSix">
                            <h5 class="mb-0">
                                <a class="nav-link collapsed text-black" style="font-size: smaller" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                    <div class="row angle">
                                        <div class="col-2 text-center">
                                            <i class="fa-solid fa-rectangle-ad"></i>
                                        </div>
                                        <div class="col-10 text-me">مدريت تبليغات</div>
                                    </div>
                                </a>
                            </h5>
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionAdmin">
                            <div class="card-body pr-5">
                                <a href="{{ route('admin.ads') }}" class="link-black">
                                    <div class="row">
                                        <div class="col-2 d-flex justify-content-center">
                                            <i class="fa-solid fa-list-ol"></i>
                                        </div>
                                        <div class="col-10 text-me">
                                            لیست تبليغات
                                        </div>
                                    </div>
                                </a>
                                <a href="{{ route('admin.ads.add') }}" class="link-black">
                                    <div class="row">
                                        <div class="col-2 d-flex justify-content-center">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                        <div class="col-10 text-me">
                                            ايجاد تبليغات
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- Schematic Management --}}
                    <div class="card shadow-none">
                        <div class="card-header p-0" id="headingSeven">
                            <h5 class="mb-0">
                                <a class="nav-link collapsed text-black" style="font-size: smaller" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                                    <div class="row angle">
                                        <div class="col-2 text-center">
                                            <i class="fa-solid fa-map-location-dot"></i>
                                        </div>
                                        <div class="col-10 text-me">مدیريت شماتیک</div>
                                    </div>
                                </a>
                            </h5>
                        </div>
                        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionAdmin">
                            <div class="card-body pr-5">
                                <a href="{{ route('schematic.index') }}" class="link-black">
                                    <div class="row">
                                        <div class="col-2 d-flex justify-content-center">
                                            <i class="fa-solid fa-list-ol"></i>
                                        </div>
                                        <div class="col-10 text-me">
                                            لیست شماتیک ها
                                        </div>
                                    </div>
                                </a>
                                <a href="{{ route('schematic.create') }}" class="link-black">
                                    <div class="row">
                                        <div class="col-2 d-flex justify-content-center">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                        <div class="col-10 text-me">
                                            ايجاد شماتیک
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- Suggest Management --}}
                    <div class="card shadow-none">
                        <div class="card-header p-0" id="headingEaight">
                            <h5 class="mb-0">
                                <a class="nav-link collapsed text-black" style="font-size: smaller" type="button" data-toggle="collapse" data-target="#collapseEaight" aria-expanded="true" aria-controls="collapseEaight">
                                    <div class="row angle">
                                        <div class="col-2 text-center">
                                            <i class="fa-solid fa-comment"></i>
                                        </div>
                                        <div class="col-10 text-me">مدريت پیشنهادات</div>
                                    </div>
                                </a>
                            </h5>
                        </div>
                        <div id="collapseEaight" class="collapse" aria-labelledby="headingEaight" data-parent="#accordionAdmin">
                            <div class="card-body pr-5">
                                <a href="{{ route('admin.suggests') }}" class="link-black">
                                    <div class="row">
                                        <div class="col-2 d-flex justify-content-center">
                                            <i class="fa-solid fa-comments"></i>
                                        </div>
                                        <div class="col-10 text-me">
                                            لیست پیشنهادات
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- Rules Management --}}
                    <div class="card shadow-none">
                        <div class="card-header p-0" id="headingNine">
                            <h5 class="mb-0">
                                <a class="nav-link collapsed text-black" style="font-size: smaller" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
                                    <div class="row angle">
                                        <div class="col-2 text-center">
                                            <i class="fa-solid fa-gavel"></i>
                                        </div>
                                        <div class="col-10 text-me">مدریت قوانین</div>
                                    </div>
                                </a>
                            </h5>
                        </div>
                        <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionAdmin">
                            <div class="card-body pr-5">
                                <a href="{{ route('rules.index') }}" class="link-black">
                                    <div class="row">
                                        <div class="col-2 d-flex justify-content-center">
                                            <i class="fa-solid fa-scale-balanced"></i>
                                        </div>
                                        <div class="col-10 text-me">
                                            لیست قوانین
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- Emails Management --}}
                    <div class="card shadow-none">
                        <div class="card-header p-0" id="headingTen">
                            <h5 class="mb-0">
                                <a class="nav-link collapsed text-black" style="font-size: smaller" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
                                    <div class="row angle">
                                        <div class="col-2 text-center">
                                            <i class="fa-solid fa-envelope"></i>
                                        </div>
                                        <div class="col-10 text-me">مدریت ایمیل</div>
                                    </div>
                                </a>
                            </h5>
                        </div>
                        <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionAdmin">
                            <div class="card-body pr-5">
                                <a href="{{ route('admin.emails.showEmails') }}" class="link-black">
                                    <div class="row">
                                        <div class="col-2 d-flex justify-content-center">
                                            <i class="fa-solid fa-inbox"></i>
                                        </div>
                                        <div class="col-10 text-me">
                                            لیست ایمیل ها
                                        </div>
                                    </div>
                                </a>
                                <a href="{{ route('admin.emails.showUsers') }}" class="link-black">
                                    <div class="row">
                                        <div class="col-2 d-flex justify-content-center">
                                            <i class="fa-solid fa-paper-plane"></i>
                                        </div>
                                        <div class="col-10 text-me">
                                            ارسال ایمیل ها
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- News Management --}}
                    <div class="card shadow-none">
                        <div class="card-header p-0" id="headingEleven">
                            <h5 class="mb-0">
                                <a class="nav-link collapsed text-black" style="font-size: smaller" type="button" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="true" aria-controls="collapseEleven">
                                    <div class="row angle">
                                        <div class="col-2 text-center">
                                            <i class="fa-regular fa-newspaper"></i>
                                        </div>
                                        <div class="col-10 text-me">مدریت اخبار</div>
                                    </div>
                                </a>
                            </h5>
                        </div>
                        <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#accordionAdmin">
                            <div class="card-body pr-5">
                                <a href="{{ route('news.create') }}" class="link-black">
                                    <div class="row">
                                        <div class="col-2 d-flex justify-content-center">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                        <div class="col-10 text-me">
                                            افزودن خبر جديد
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="card-body pr-5">
                                <a href="{{ route('news.index') }}" class="link-black mt-1">
                                    <div class="row">
                                        <div class="col-2 d-flex justify-content-center">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                        <div class="col-10 text-me">
                                            لیست اخبار ارسالی شما
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- Category Management --}}
                    <div class="card shadow-none">
                        <div class="card-header p-0" id="headingTwelve">
                            <h5 class="mb-0">
                                <a class="nav-link collapsed text-black" style="font-size: smaller" type="button" data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="true" aria-controls="collapseTwelve">
                                    <div class="row angle">
                                        <div class="col-2 text-center">
                                            <i class="fa-solid fa-layer-group"></i>
                                        </div>
                                        <div class="col-10 text-me">مدریت دسته بندی ها</div>
                                    </div>
                                </a>
                            </h5>
                        </div>
                        <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve" data-parent="#accordionAdmin">
                            <div class="card-body pr-5">
                                <a href="{{ route('category.create') }}" class="link-black">
                                    <div class="row">
                                        <div class="col-2 d-flex justify-content-center">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                        <div class="col-10 text-me">
                                            افزودن دسته بندی جدید
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- Reporter Management --}}
                    <div class="card shadow-none">
                        <div class="card-header p-0" id="headingThirteen">
                            <h5 class="mb-0">
                                <a class="nav-link collapsed text-black" style="font-size: smaller" type="button" data-toggle="collapse" data-target="#collapseThirteen" aria-expanded="true" aria-controls="collapseThirteen">
                                    <div class="row angle">
                                        <div class="col-2 text-center">
                                            <i class="fa-solid fa-microphone"></i>
                                        </div>
                                        <div class="col-10 text-me">مدریت خبرنگاران</div>
                                    </div>
                                </a>
                            </h5>
                        </div>
                        <div id="collapseThirteen" class="collapse" aria-labelledby="headingThirteen" data-parent="#accordionAdmin">
                            <div class="card-body pr-5">
                                <a href="{{ route('admin.reporters') }}" class="link-black">
                                    <div class="row">
                                        <div class="col-2 d-flex justify-content-center">
                                            <i class="fa-solid fa-user-pen"></i>
                                        </div>
                                        <div class="col-10 text-me">
                                            لیست خبرنگاران
                                        </div>
                                    </div>
                                </a>
                                <a href="{{ route('admin.reporters.showPostedNews') }}" class="link-black">
                                    <div class="row">
                                        <div class="col-2 d-flex justify-content-center">
                                            <i class="fa-solid fa-paper-plane"></i>
                                        </div>
                                        <div class="col-10 text-me">
                                            لیست خبر های ارسالی
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- Comments Management --}}
                    <div class="card shadow-none">
                        <div class="card-header p-0" id="headingFourteen">
                            <h5 class="mb-0">
                                <a class="nav-link collapsed text-black" style="font-size: smaller" type="button" data-toggle="collapse" data-target="#collapseFourteen" aria-expanded="true" aria-controls="collapseFourteen">
                                    <div class="row angle">
                                        <div class="col-2 text-center">
                                            <i class="fa-regular fa-comment"></i>
                                        </div>
                                        <div class="col-10 text-me">مدریت نظرات</div>
                                    </div>
                                </a>
                            </h5>
                        </div>
                        <div id="collapseFourteen" class="collapse" aria-labelledby="headingFourteen" data-parent="#accordionAdmin">
                            <div class="card-body pr-5">
                                <a href="{{ route('admin.rsscomments') }}" class="link-black">
                                    <div class="row">
                                        <div class="col-2 d-flex justify-content-center">
                                            <i class="fa-solid fa-list-check"></i>
                                        </div>
                                        <div class="col-10 text-me">
                                            لیست نظرات rss
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                @endrole

                @role('reporter')
                {{-- Tags Management --}}
                <div class="card shadow-none">
                    <div class="card-header p-0" id="headingFour">
                        <h5 class="mb-0">
                            <a class="nav-link collapsed text-black" style="font-size: smaller" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                <div class="row angle">
                                    <div class="col-2 text-center">
                                        <i class="fa fa-tag"></i>
                                    </div>
                                    <div class="col-10 text-me">مدریت برچسب ها</div>
                                </div>
                            </a>
                        </h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionAdmin">
                        <div class="card-body pr-5">
                            <a href="{{ route('tag.index') }}" class="link-black">
                                <div class="row">
                                    <div class="col-2 d-flex justify-content-center">
                                        <i class="fa fa-tags"></i>
                                    </div>
                                    <div class="col-10 text-me">
                                        لیست برچست ها
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- News Management --}}
                <div class="card shadow-none">
                    <div class="card-header p-0" id="headingEleven">
                        <h5 class="mb-0">
                            <a class="nav-link collapsed text-black" style="font-size: smaller" type="button" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="true" aria-controls="collapseEleven">
                                <div class="row angle">
                                    <div class="col-2 text-center">
                                        <i class="fa-regular fa-newspaper"></i>
                                    </div>
                                    <div class="col-10 text-me">مدریت اخبار</div>
                                </div>
                            </a>
                        </h5>
                    </div>
                    <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#accordionAdmin">
                        <div class="card-body pr-5">
                            <a href="{{ route('news.create') }}" class="link-black">
                                <div class="row">
                                    <div class="col-2 d-flex justify-content-center">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                    <div class="col-10 text-me">
                                        افزودن خبر جديد
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card-body pr-5">
                            <a href="{{ route('news.index') }}" class="link-black mt-1">
                                <div class="row">
                                    <div class="col-2 d-flex justify-content-center">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                    <div class="col-10 text-me">
                                        لیست اخبار ارسالی شما
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- Category Management --}}
                <div class="card shadow-none">
                    <div class="card-header p-0" id="headingTwelve">
                        <h5 class="mb-0">
                            <a class="nav-link collapsed text-black" style="font-size: smaller" type="button" data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="true" aria-controls="collapseTwelve">
                                <div class="row angle">
                                    <div class="col-2 text-center">
                                        <i class="fa-solid fa-layer-group"></i>
                                    </div>
                                    <div class="col-10 text-me">مدریت دسته بندی ها</div>
                                </div>
                            </a>
                        </h5>
                    </div>
                    <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve" data-parent="#accordionAdmin">
                        <div class="card-body pr-5">
                            <a href="{{ route('category.create') }}" class="link-black">
                                <div class="row">
                                    <div class="col-2 d-flex justify-content-center">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                    <div class="col-10 text-me">
                                        افزودن دسته بندی جدید
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endrole

            </div>
        </div>
        <!-- /.sidebar -->
    </aside>


    @yield('content')

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('assets/admin/plugins/morris/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/admin/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{ asset('assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/admin/plugins/knob/jquery.knob.js')}}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ asset('assets/admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{ asset('assets/admin/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{ asset('assets/admin/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('assets/admin/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/admin/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/admin/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/admin/dist/js/demo.js')}}"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/admin/dist/js/demo.js') }}"></script>
<script src="https://unpkg.com/persian-date@latest/dist/persian-date.min.js"></script>
<script src="https://unpkg.com/persian-datepicker@latest/dist/js/persian-datepicker.min.js"></script>
<script src="{{asset('assets/admin/plugins/select2/select2.full.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" rel="script">
</script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
  $(document).ready(function(){
    $( function() {
        $( "#player_birthDate" ).datepicker({
            maxDate: "+0d",
            changeMonth: true,
            changeYear: true
        });
    });

  })
</script>

@livewireScripts()
@yield('Js')
</body>
</html>
