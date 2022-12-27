@extends('layouts.master')
@section('content')
    <div class="ms-lg-250">
        <div class="row">
            <div class="col-12 col-md-11 col-xl-10 mx-auto">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1> مدیریت ایمیل های گروهی </h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-left">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">خانه</a></li>
                                    <li class="breadcrumb-item">مدیریت ایمیل های گروهی</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <!-- Main row -->
                        <div class="row">
                            <div class="col-12">
                                @if( Session::has("message") )
                                    <div class="alert bg-info-gradient">
                                        {{ Session::get('message') }}
                                    </div>
                                @endif
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">جدول ایمیل ها</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th>شناسه</th>
                                                <th>عنوان ایمیل</th>
                                                <th> تاریخ ارسال </th>
                                                <th>
                                                    عملیات
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($emails as $email )
                                                <tr>
                                                    <td>{{ $email->id }}</td>
                                                    <td>{{ $email->title }}</td>
                                                    <td>{{ Hekmatinasser\Verta\Facades\Verta::instance($email->created_at)->format('Y-n-j H:i')}}</td>
                                                    <td>
                                                        <a href="{{ route('admin.emails.showEmail', ['id' => $email->id]) }}" class="btn btn-primary btn-sm">مشاهده</a>
                                                        <a href="{{ route('admin.emails.deleteEmail', ['id' => $email->id]) }}" class="btn btn-danger btn-sm">حذف</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        @if( $emails->count() == 0 )
                                            <div class="alert alert-secondary m-0 text-center" role="alert">
                                                هیچ موردی یافت نشد.
                                            </div>
                                        @endif
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div><!-- /.row -->
                        <!-- /.row (main row) -->
                        <!-- /.row (main row) -->
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
        </div>
    </div>
@endsection
