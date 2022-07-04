<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت | داشبورد اول</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/font-awesome/css/font-awesome.min.css')}}">
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
                <a class="thm-btn brd-rd5" href="{{ route('logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();" title="">خروج</a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">تماس</a>
            </li>

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

                </div>
            </li>

        </ul>

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
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-white-primary elevation-4">

        <!-- Sidebar -->
        <div class="sidebar" style="direction: ltr">
            <div style="direction: rtl">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="https://www.gravatar.com/avatar/52f0fbcbedee04a121cba8dad1174462?s=200&d=mm&r=g"
                             class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">
                            {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                        </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                @role('admin')
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">

                            {{-- USER MANAGEMENT  --}}
                            <li class="nav-item has-treeview ">
                                <a href="#" class="nav-link">
                                    {{-- <img src="{{ asset('assets/admin/icons/ball.png') }}" width="20px" height="20px"/> --}}
                                    <i class="fa fa-user"></i>
                                    <p>
                                        مدیریت کاربران
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('user.create') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>ایجاد کاربر</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('user.index') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>لیست کاربران</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>



                            {{-- Role and Permission Management --}}
                            <li class="nav-item has-treeview ">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-shield"></i>
                                    <p>
                                        مدیریت نقش ها
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('role.create') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>نقش ها</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('permission.create') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>مجوز ها</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- Tags Management --}}
                            <li class="nav-item has-treeview ">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-tag"></i>
                                    <p>
                                        مدیریت برچسب ها
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('tag.index') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>لیست برچسب ها</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>


                            {{-- Team and Player Managemrnt --}}
                            <li class="nav-item has-treeview ">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-futbol-o"></i>
                                    <p>
                                        مدیریت تیم و بازیکن
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.players') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>لیست بازیکنان</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.teams') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>لیست تیم ها</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.positions') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>لیست پست های بازی</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('leagues.index') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>لیست لیگ ها</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- Ads Management --}}

                            <li class="nav-item has-treeview ">
                                <a href="#" class="nav-link">
                                    <img src="{{ asset('assets/admin/icons/ads.png') }}" alt="">
                                    <p>
                                        مدیریت تبلیغات
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="{{ route('admin.ads') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>لیست تبلیغات</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('admin.ads.add') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>ایجاد تبلیغ</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            {{-- Suggest Mangement --}}
                            <li class="nav-item has-treeview ">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-bullhorn" ></i>
                                    <p>
                                        مدیریت پیشنهادات
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.suggests') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>لیست پیشنهادات</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- Rules Management --}}
                            <li class="nav-item has-treeview ">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-handshake-o" ></i>
                                    <p>
                                        مدیریت قوانین
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('rules.index') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>لیست قوانین</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- emails management --}}
                            <li class="nav-item has-treeview ">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-envelope" ></i>
                                    <p>
                                        مدیریت ایمیل ها
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.emails.showEmails') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>لیست ایمیل ها</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.emails.showUsers') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>ارسال ایمیل</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>


                            {{-- News Management --}}
                            <li class="nav-item has-treeview ">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-newspaper-o" ></i>
                                    <p>
                                        مدیریت اخبار
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('news.create') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>افزودن خبر جدید</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- category controller --}}
                            <li class="nav-item has-treeview ">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-th-list" ></i>
                                    <p>
                                        مدیریت دسته بندی ها
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('category.create') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>افزودن دسته بندی جدید</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>


                        </ul>
                    </nav>
                @endrole

                @role('user')
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">


                            {{-- USER MANAGEMENT  --}}
                            <li class="nav-item ">
                                <a href="{{ route('user.profile') }}" class="nav-link">
                                    <i class="fa fa-user"></i>
                                    <p>
                                        پروفایل
                                    </p>
                                </a>
                            </li>

                            {{-- Popular team --}}
                            <li class="nav-item ">
                                <a href="{{ route('user.popularTeams') }}" class="nav-link">
                                    <i class="fa fa-heart"></i>
                                    <p>
                                        تیم های محبوب
                                    </p>
                                </a>
                            </li>

                            {{-- Audio news --}}
                            <li class="nav-item ">
                                <a href="{{ route('user.audioNews') }}" class="nav-link">
                                    <i class="fa fa-bullhorn"></i>
                                    <p>
                                        خبرهای صوتی
                                    </p>
                                </a>
                            </li>

                            {{-- my favorite teams news --}}
                            <li class="nav-item ">
                                <a href="{{ route('user.favoriteTeamsNews') }}" class="nav-link">
                                    <i class="fa fa-bullhorn"></i>
                                    <p>
                                        خبرهای تیم های محبوب
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                @endrole
                <!-- /.sidebar-menu -->
            </div>
        </div>
        <!-- /.sidebar -->
    </aside>


    @yield('content')

    <footer class="main-footer">
        <strong>CopyLeft &copy; 2018 <a href="http://github.com/hesammousavi/">حسام موسوی</a>.</strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
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
<script src="{{ asset('assets/admin/dist/js/demo.js')}}"></script>
<script src="https://unpkg.com/persian-date@latest/dist/persian-date.min.js"></script>
<script src="https://unpkg.com/persian-datepicker@latest/dist/js/persian-datepicker.min.js"></script>
<script src="{{asset('assets/admin/plugins/select2/select2.full.min.js')}}"></script>
<script type="text/javascript">
    class MyUploadAdapter {
        constructor( loader ) {
            // The file loader instance to use during the upload.
            this.loader = loader;
        }

        // Starts the upload process.
        upload() {
            return this.loader.file
                .then( file => new Promise( ( resolve, reject ) => {
                    this._initRequest();
                    this._initListeners( resolve, reject, file );
                    this._sendRequest( file );
                } ) );
        }

        // Aborts the upload process.
        abort() {
            if ( this.xhr ) {
                this.xhr.abort();
            }
        }
        // Initializes the XMLHttpRequest object using the URL passed to the constructor.
        _initRequest() {
            const xhr = this.xhr = new XMLHttpRequest();

            // Note that your request may look different. It is up to you and your editor
            // integration to choose the right communication channel. This example uses
            // a POST request with JSON as a data structure but your configuration
            // could be different.
            xhr.open( 'POST', '{{route('news.store')}}', true );
            xhr.setRequestHeader('x-csrf-token','{{csrf_token()}}')
            xhr.responseType = 'json';
        }
        // Initializes XMLHttpRequest listeners.
        _initListeners( resolve, reject, file ) {
            const xhr = this.xhr;
            const loader = this.loader;
            const genericErrorText = `Couldn't upload file: ${ file.name }.`;

            xhr.addEventListener( 'error', () => reject( genericErrorText ) );
            xhr.addEventListener( 'abort', () => reject() );
            xhr.addEventListener( 'load', () => {
                const response = xhr.response;

                // This example assumes the XHR server's "response" object will come with
                // an "error" which has its own "message" that can be passed to reject()
                // in the upload promise.
                //
                // Your integration may handle upload errors in a different way so make sure
                // it is done properly. The reject() function must be called when the upload fails.
                if ( !response || response.error ) {
                    return reject( response && response.error ? response.error.message : genericErrorText );
                }

                // If the upload is successful, resolve the upload promise with an object containing
                // at least the "default" URL, pointing to the image on the server.
                // This URL will be used to display the image in the content. Learn more in the
                // UploadAdapter#upload documentation.
                resolve( {
                    default: response.url
                } );
            } );

            // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
            // properties which are used e.g. to display the upload progress bar in the editor
            // user interface.
            if ( xhr.upload ) {
                xhr.upload.addEventListener( 'progress', evt => {
                    if ( evt.lengthComputable ) {
                        loader.uploadTotal = evt.total;
                        loader.uploaded = evt.loaded;
                    }
                } );
            }
        }

        // Prepares the data and sends the request.
        _sendRequest( file ) {
            // Prepare the form data.
            const data = new FormData();

            data.append( 'upload', file );

            // Important note: This is the right place to implement security mechanisms
            // like authentication and CSRF protection. For instance, you can use
            // XMLHttpRequest.setRequestHeader() to set the request headers containing
            // the CSRF token generated earlier by your application.

            // Send the request.
            this.xhr.send( data );
        }
    }
    function SimpleUploadAdapterPlugin( editor ) {
        editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
            // Configure the URL to the upload script in your back-end here!
            return new MyUploadAdapter( loader );
        };
    }
    ClassicEditor
        .create(document.querySelector('#editor1'), {
            extraPlugins: [ SimpleUploadAdapterPlugin ],

        })
        .then(function (editor) {
            // The editor instance
        })
        .catch(function (error) {
            console.error(error)
        })

    // bootstrap WYSIHTML5 - text editor

    $('.textarea').wysihtml5({
        toolbar: { fa: true }
    })
    $(document).ready(function () {
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        })
        $("#NewsDate").pDatepicker({
            altField: '#NewsDate',
            altFormat: "YYYY-MM-DD H:m:s",
            observer: true,
            format: 'YYYY-MM-DD H:m:s',
            initialValue: false,
            initialValueType: 'persian',
            autoClose: true,
            maxDate: 'today',
        });
    });
</script>
@livewireScripts()
<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('message.received', () => {
            ClassicEditor
                .create(document.querySelector('#editor1'), {
                    extraPlugins: [ SimpleUploadAdapterPlugin ],

                })
                .then(function (editor) {
                    // The editor instance
                })
                .catch(function (error) {
                    console.error(error)
                })
            $('.textarea').wysihtml5({
                toolbar: {fa: true}
            })
            $(function () {
                //Initialize Select2 Elements
                $('.select2').select2()

            })
            $("#NewsDate").pDatepicker({
                altField: '#NewsDate',
                altFormat: "YYYY-MM-DD H:m:s",
                observer: true,
                format: 'YYYY-MM-DD H:m:s',
                initialValue: false,
                initialValueType: 'persian',
                autoClose: true,
                maxDate: 'today',
            });
        })
        Livewire.hook('element.initialized', () => {

        })
    });
</script>
</body>
</html>
