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

</head>

<body>


<!-- header -->
  <div class="container_fluid container-width">
    <!-- upper-header -->
    <div class="container-fluid upper-header">
      <div class="container upper-header-ins">
          <ul class="upper-header-ful">
              <li class="upper-header-fli"><a href="#">پیش بینی</a></li>
              <li class="upper-header-fli"><a href="#">لنز</a></li>
              <li class="upper-header-fli"><a href="#">نظر</a></li>
          </ul>
          <ul class="upper-header-sul">
            <li class="upper-header-sli"><span class="upper-header-sspan"><a href="#">
              <i class="fa-regular fa-calendar"></i>چهارشنبه</a></span></li>
            <li class="upper-header-sli hide-sli"> <div class="box">
              <form name="search">
                  <input type="text" class="input-box">
              </form>

                  <span><i class="fas fa-search"></i>جستجو</span>
          </div></li>
          <li>
            @auth
                <a class="btn btn-sm btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" title="">خروج</a>
            @role('admin')
                <a class="btn btn-sm btn-success mx-4" href="{{ route('admin.dashboard') }}">داشبورد</a>
            @endrole
            @role('user')
                <a class="btn btn-sm btn-success mx-4" href="{{ route('user.profile') }}">پروفایل کاربری</a>
            @endrole
            @else
                <a class="thm-btn brd-rd5" href="{{ route('login') }}">ورود</a>
            @endauth
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
          </li>
        </ul>
      </div>
  </div>
<!-- upper-header -->

<!-- navbar -->
    <nav class="navbar navbar-expand-md">
      <!-- Brand -->
      <a class="navbar-brand" href="#"><img src="{{ asset('assets/main/images/eagle.png') }}" alt="logo" class="logo"></a>

            <button class="navbar-toggler toggler-example"  type="button" data-toggle="collapse"
    data-target="#navbarSupportedContent41" aria-controls="navbarSupportedContent41" aria-expanded="false"
    aria-label="Toggle navigation"><span class="white-text"><i class="fas fa-bars fa-1x"></i></span></button>

      <!-- Links -->
      <div class="nav-item-div">
      <ul class="navbar-nav d-md-flex mx-auto ">
        <li class="nav-item">
          <a class="nav-link" href="#">صفحه اصلی</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">اخبار</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">پخش زنده</a>
        </li>

       <!-- Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            لیگ ها
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Link 1</a>
            <a class="dropdown-item" href="#">Link 2</a>
            <a class="dropdown-item" href="#">Link 3</a>
          </div>
        </li>
        <!-- Dropdown -->

        <li class="nav-item">
          <a class="nav-link" href="#">نتایج زنده</a>
        </li>

        <!-- Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
           روزنامه
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Link 1</a>
            <a class="dropdown-item" href="#">Link 2</a>
            <a class="dropdown-item" href="#">Link 3</a>
          </div>
        </li>
        <!-- Dropdown -->

        <li class="nav-item">
          <a class="nav-link" href="#">نقل و انتقالات</a>
        </li>
      </ul>
    </div>
    </nav>
  </div>
  <!-- header -->
  <div class="container-main">
<div class="content-holder d-md-flex d-lg-flex d-xl-flex">

<div class="content-res-holder   col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7">
  <div class="slider-container-plus">


    <div class="slider-container">
      <div class="slide active fadein">
        <img src="{{ asset('assets/main/images/01g1n0xxq9x15mkrcamk.jpg')}}" alt="">
      </div>

      <div class="slide fadein">
        <img src="{{ asset('assets/main/images/cristiano_ronaldo_real_madrid_ (1).webp')}}" alt="">
      </div>
      <div class="slide fadein">
        <img src="{{ asset('assets/main/images/z_p20-Messi.jpg')}}" alt="">
      </div>
      <div class="slide fadein">
        <img src="{{ asset('assets/main/images/r0_0_800_600_w800_h600_fmax.jpg')}}" alt="">
      </div>
      <div class="control-container">
        <button class="prev">
          <i class="fa fa-chevron-right"></i>
        </button>
          <div class="slide-indicator">
            <span class="indicator active"></span>
            <span class="indicator"></span>
            <span class="indicator"></span>
            <span class="indicator"></span>
          </div>

        <button class="next">
          <i class="fa fa-chevron-left"></i>
        </button>
      </div>
    </div>
      <div class="slide-description-container">
        <div class="slide-description active fadeslide">
            <h1 class="slide-description-title">
                هتریک بنزما
            </h1>
            <p class="slide-description-body">
              21 دقیقه بعد از شروع بازی با چلسی موفق به هتریک مقابل این تیم شد. و توانست تعداد گل های خود را در لیگ قهرمانان به عدد 16 برساند

            </p>
        </div>
        <div class="slide-description fadeslide">
          <h1 class="slide-description-title">
              هتریک بنزما
          </h1>
          <p class="slide-description-body">
            21 دقیقه بعد از شروع بازی با چلسی موفق به هتریک مقابل این تیم شد. و توانست تعداد گل های خود را در لیگ قهرمانان به عدد 16 برساند
          </p>
      </div>
      <div class="slide-description fadeslide">
          <h1 class="slide-description-title">
              هتریک بنزما
          </h1>
          <p class="slide-description-body">
            21 دقیقه بعد از شروع بازی با چلسی موفق به هتریک مقابل این تیم شد. و توانست تعداد گل های خود را در لیگ قهرمانان به عدد 16 برساند
          </p>
      </div>
      <div class="slide-description fadeslide">
          <h1 class="slide-description-title">
هتریک بنزما
</h1>
          <p class="slide-description-body">
            21 دقیقه بعد از شروع بازی با چلسی موفق به هتریک مقابل این تیم شد. و توانست تعداد گل های خود را در لیگ قهرمانان به عدد 16 برساند
          </p>
      </div>
    </div>

    </div>

    <!-- best news -->

    <div class="card-box-container row gx-2 gy-2">
      <div class="card-box-content  col-12 col-sm-6 col-md-12 col-lg-6 col-xl-6">

        <div class="card-box">
          <div class="card-img-box">
            <img src="{{ asset('assets/main/images/pep.jpg') }} alt="">
          </div>
          <div class="card-desc">
            <p class="card-p">
              منچستر سیتی با پیروزی سه بر دو مقابل استون ویلا، قهرمان لیگ برتر فوتبال انگلیس شد.           </p>
          </div>
        </div>

      </div>

      <div class="card-box-content  col-12 col-sm-6 col-md-12 col-lg-6 col-xl-6">

        <div class="card-box">
          <div class="card-img-box">
            <img src="{{ asset('assets/main/images/realmadrid.jpg')}}" alt="">
          </div>
          <div class="card-desc">
            <p class="card-p">
     پادشاهی رئال در اروپا ادامه دارد
            </p>
          </div>
        </div>

      </div>

      <div class="card-box-content  col-12 col-sm-6 col-md-12 col-lg-6 col-xl-6">

        <div class="card-box ">
          <div class="card-img-box">
            <img src="{{ asset('assets/main/images/milan.jpg')}}" alt="">
          </div>
          <div class="card-desc">
            <p class="card-p">
         میلان قهرمان جدید سری آ پایان خوش زلاتان با آتزوری
         پیولی: ما بهتر بودیم جام حق ما بود
            </p>
          </div>
        </div>

      </div>

      <div class="card-box-content  col-12 col-sm-6 col-md-12 col-lg-6 col-xl-6">

        <div class="card-box">
          <div class="card-img-box">
            <img src="{{ asset('assets/main/images/ss.jpg')}}" alt="">
          </div>
          <div class="card-desc">
            <p class="card-p">
             یک قدم تا جاودانگی
             استقلال قهرمان جدید لیگ برتر
             مجیدی: هفته ها انتظار امروز را میکشیدیم هنوز همه چیز تمام نشده
            </p>
          </div>
        </div>

      </div>
      <div class="card-box-content  col-12 col-sm-6 col-md-12 col-lg-6 col-xl-6">

        <div class="card-box">
          <div class="card-img-box">
            <img src="{{ asset('assets/main/images/pers.jpg')}}" alt="">
          </div>
          <div class="card-desc">
            <p class="card-p">
     ناکامی پرسپولیس در اصفهان
     هدیه سپاهان به آبی ها
            </p>
          </div>
        </div>

      </div>

      <div class="card-box-content  col-12 col-sm-6 col-md-12 col-lg-6 col-xl-6">

        <div class="card-box">
          <div class="card-img-box">
            <img src="{{ asset('assets/main/images/embape.jpg') }}" alt="">
          </div>
          <div class="card-desc">
            <p class="card-p">
     خیانت به کهکشانی ها امباپه تا 2025 رئیس پارسن ژرمن شد
            </p>
          </div>
        </div>

      </div>
    </div>

    <!-- best news -->


</div>


<!-- last-news -->
<div class="last-news-container col-12 col-sm-6 col-md-5 px-2 ps-md-0 pe-md-2 px-lg-2 col-lg-3 col-xl-3">
  <section class="last-news-list ">
    <header class="last-news-header">
      <h5 class="last-news-title">
        پربازدید های امروز
      </h2>
    </header>
    <div class="last-news">
      <ul class="last-news-ul">
        <li class="last-news-li"><span><i class="fa-solid fa-square"></i><a href="#" class="last-news-link">باشگاه من و مادرم را به جشن استقلال دعوت نکرده است/ آشنا نداریم که بلیت بخریم/ آبادانی‌ها خیلی به پدرم لطف داشتند</a></span></li>
        <li class="last-news-li"><span><i class="fa-solid fa-square"></i><a href="#" class="last-news-link">واکنش تلخ همسر ناصر حجازی به ماجرای دعوت به جشن قهرمانی/ اصلاً نمی‌دانم جشن استقلال کجا هست؟!</a></span></li>
        <li class="last-news-li"><span><i class="fa-solid fa-square"></i><a href="#" class="last-news-link">پرسپولیس مهاجم ششدانگ می‌خواهد/ هواداران از یحیی گل‌محمدی حمایت کنند/ قهرمانی استقلال به دلیل حضور یک نفر بود</a></span></li>
        <li class="last-news-li"><span><i class="fa-solid fa-square"></i><a href="#" class="last-news-link">برخلاف میل باطنی‌ ام از استقلال جدا شدم/ پیشنهاد ۸ میلیاردی در کشور قطر برایم رسید</a></span></li>
        <li class="last-news-li"><span><i class="fa-solid fa-square"></i><a href="#" class="last-news-link">شایعه نگران کننده در مورد فرهاد مجیدی برای هواداران استقلال!</a></span></li>
        <li class="last-news-li"><span><i class="fa-solid fa-square"></i><a href="#" class="last-news-link">شایعه نگران کننده در مورد فرهاد مجیدی برای هواداران استقلال!</a></span></li>
        <li class="last-news-li"><span><i class="fa-solid fa-square"></i><a href="#" class="last-news-link">شایعه نگران کننده در مورد فرهاد مجیدی برای هواداران استقلال!</a></span></li>
        <li class="last-news-li"><span><i class="fa-solid fa-square"></i><a href="#" class="last-news-link">شایعه نگران کننده در مورد فرهاد مجیدی برای هواداران استقلال!</a></span></li>
        <li class="last-news-li"><span><i class="fa-solid fa-square"></i><a href="#" class="last-news-link">شایعه نگران کننده در مورد فرهاد مجیدی برای هواداران استقلال!</a></span></li>
        <li class="last-news-li"><span><i class="fa-solid fa-square"></i><a href="#" class="last-news-link">شایعه نگران کننده در مورد فرهاد مجیدی برای هواداران استقلال!</a></span></li>
        <li class="last-news-li"><span><i class="fa-solid fa-square"></i><a href="#" class="last-news-link">شایعه نگران کننده در مورد فرهاد مجیدی برای هواداران استقلال!</a></span></li>
        <li class="last-news-li"><span><i class="fa-solid fa-square"></i><a href="#" class="last-news-link">شایعه نگران کننده در مورد فرهاد مجیدی برای هواداران استقلال!</a></span></li>
        <li class="last-news-li"><span><i class="fa-solid fa-square"></i><a href="#" class="last-news-link">شایعه نگران کننده در مورد فرهاد مجیدی برای هواداران استقلال!</a></span></li>
        <li class="last-news-li"><span><i class="fa-solid fa-square"></i><a href="#" class="last-news-link">شایعه نگران کننده در مورد فرهاد مجیدی برای هواداران استقلال!</a></span></li>
        <li class="last-news-li"><span><i class="fa-solid fa-square"></i><a href="#" class="last-news-link">شایعه نگران کننده در مورد فرهاد مجیدی برای هواداران استقلال!</a></span></li>
        <li class="last-news-li"><span><i class="fa-solid fa-square"></i><a href="#" class="last-news-link">شایعه نگران کننده در مورد فرهاد مجیدی برای هواداران استقلال!</a></span></li>
        <li class="last-news-li"><span><i class="fa-solid fa-square"></i><a href="#" class="last-news-link">شایعه نگران کننده در مورد فرهاد مجیدی برای هواداران استقلال!</a></span></li>
        <li class="last-news-li"><span><i class="fa-solid fa-square"></i><a href="#" class="last-news-link">شایعه نگران کننده در مورد فرهاد مجیدی برای هواداران استقلال!</a></span></li>
        <li class="last-news-li"><span><i class="fa-solid fa-square"></i><a href="#" class="last-news-link">شایعه نگران کننده در مورد فرهاد مجیدی برای هواداران استقلال!</a></span></li>
        <li class="last-news-li"><span><i class="fa-solid fa-square"></i><a href="#" class="last-news-link">شایعه نگران کننده در مورد فرهاد مجیدی برای هواداران استقلال!</a></span></li>
        <li class="last-news-li"><span><i class="fa-solid fa-square"></i><a href="#" class="last-news-link">شایعه نگران کننده در مورد فرهاد مجیدی برای هواداران استقلال!</a></span></li>
      </ul>
    </div>
  </section>
</div>

  <!-- sidecontainer -->
  <div class="side-container col-12 col-sm-12 col-md-6 px-2 px-md-0 col-lg-2 col-xl-2">
     <!-- newspaper -->
    {{-- <div class="sliderSlider-container-plus">
        <div class="sliderSlider-container">
        <div class="slideSlider active fadein">
            <img src="{{ asset('assets/main/images/EsteghlalJavan.jpg')}}" alt="">
        </div>

        <div class="slideSlider fadein">
            <img src="{{ asset('assets/main/images/piroozi.jpg')}}" alt="">
        </div>
        <div class="slideSlider fadein">
            <img src="{{ asset('assets/main/images/goal.jpeg')}}" alt="">
        </div>
        <div class="slideSlider fadein">
            <img src="{{ asset('assets/main/images/khabarvarzeshi.jpg')}}" alt="">
        </div>

        </div>
    </div> --}}
     <!-- newspaper -->

     <div class="advertise-container">
       @foreach ($ads as $ad )
        <a href="{{ $ad->link }}">
            <img src="{{ asset( 'assets/main/images/' . $ad->img ) }}" alt="" />
        </a>
       @endforeach

        <!-- HTML !-->
        @can('create ad')
            <a href="{{ route('admin.ads.add') }}" class="button-58 mt-2" role="button">افزودن تبلیغ</a>
        @endcan

     </div>
  </div>
  <!-- <div class="row my-5 mx-auto row-card container-width">
    <div class="card py-3 col-8 col-md-6 col-lg-3 style="width: 18rem;">
      <div class="box-card-shadow">
        <img class="card-img-top" src="./images/karim.jpg" alt="Card image cap">
      </div>
      <div class="card-body">
        <h5 class="card-title">هتریک کریم بنزما</h5>
        <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi rem unde nostrum et doloremque quaerat facere odit veritatis iure optio.</p>
        <a href="#" class="btn btn-outline-primary d-flex justify-content-center btn-color">ادامه مطلب</a>
      </div>
    </div>
    <div class="card py-3 col-8 col-md-6 col-lg-3 style="width: 18rem;">
      <div class="box-card-shadow">
        <img class="card-img-top" src="./images/karim.jpg" alt="Card image cap">
      </div>
      <div class="card-body">
        <h5 class="card-title">هتریک کریم بنزما</h5>
        <p class="card-text">21 دقیقه بعد از شروع بازی با چلسی موفق به هتریک مقابل این تیم شد. و توانست تعداد گل های خود را در لیگ قهرمانان به عدد 16 برساند</p>
        <a href="#" class="btn btn-outline-primary d-flex justify-content-center btn-color">ادامه مطلب</a>
      </div>
    </div>
    <div class="card py-3 col-8 col-md-6 col-lg-3 style="width: 18rem;">
      <div class="box-card-shadow">
        <img class="card-img-top" src="./images/karim.jpg" alt="Card image cap">
      </div>
      <div class="card-body">
        <h5 class="card-title">هتریک کریم بنزما</h5>
        <p class="card-text">21 دقیقه بعد از شروع بازی با چلسی موفق به هتریک مقابل این تیم شد. و توانست تعداد گل های خود را در لیگ قهرمانان به عدد 16 برساند</p>
        <a href="#" class="btn btn-outline-primary d-flex justify-content-center btn-color">ادامه مطلب</a>
      </div>
    </div>

  </div> -->

</div>
</div>

</body>
<script src="{{ asset('assets/main/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/main/js/script.js') }}"></script>

</html>
