@extends('layouts.master')

@section('content')
    <div class="ms-lg-250">
        <div class="row">
            <div class="col-12 px-3 px-lg-5">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <h1>آخرین اخبار ارسال شده</h1>
                            </div>
                            <div class="col-lg-6 d-flex justify-content-lg-start justify-content-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">خانه</a></li>
                                    <li class="breadcrumb-item">مدیریت خبرنگاران</li>
                                    <li class="breadcrumb-item">آخرین اخبار ارسالی</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{ route('news.create') }}" class="btn btn-success btn-block mb-3">ایجاد خبر جدید</a>

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">پوشه‌ها</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <ul class="nav nav-pills flex-column">
                                        <li class="nav-item @if($category == null) bg-primary @endif">
                                            <a href="{{ route('admin.reporters.showPostedNews', ['category' => null]) }}" class="nav-link">
                                                <i class="fa fa-inbox"></i> منتظر تایید
                                                <span class="badge bg-success float-left">
                        {{ App\Models\News::where('status', null)->count() }}
                    </span>
                                            </a>
                                        </li>
                                        <li class="nav-item @if($category == 'accepted') bg-primary @endif">
                                            <a href="{{ route('admin.reporters.showPostedNews', ['category' => 'accepted']) }}" class="nav-link">
                                                <i class="fa fa-check"></i> تایید شده ها
                                            </a>
                                        </li>
                                        <li class="nav-item @if($category == 'rejected') bg-primary @endif">
                                            <a href="{{ route('admin.reporters.showPostedNews', ['category' => 'rejected']) }}" class="nav-link">
                                                <i class="fa fa-close"></i> رد شده ها
                                            </a>
                                        </li>
                                        <li class="nav-item @if($category == 'deleted') bg-primary @endif">
                                            <a href="{{ route('admin.reporters.showPostedNews', ['category' => 'deleted']) }}" class="nav-link">
                                                <i class="fa fa-trash-o"></i> حذف شده ها
                                                <span class="badge bg-danger float-left">
                        {{ App\Models\News::where('status', 'deleted')->count() }}
                    </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /. box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            @if(Session::has('delete_message'))
                                <div class="alert alert-danger">
                                    {{ Session::get('delete_message') }}
                                </div>
                            @endif
                            @if(Session::has('accept_meesage'))
                                <div class="alert alert-success">
                                    {{ Session::get('accept_message') }}
                                </div>
                            @endif
                            @if(Session::has('reject_message'))
                                <div class="alert alert-warning">
                                    {{ Session::get('reject_message') }}
                                </div>
                            @endif
                            @livewire('admin.reporters-management.posted-news', ['news' => $news, 'category' => $category])
                            <!-- /. box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->
            </div>
        </div>
    </div>
@endsection
