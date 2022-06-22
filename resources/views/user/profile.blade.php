@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>پروفایل</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">خانه</a></li>
              <li class="breadcrumb-item active">پروفایل کاربری</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('assets/images/cmt-img.png') }}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">
                    {{ $user->first_name }} {{ $user->last_name }}
                </h3>

                {{-- <p class="text-muted text-center">مهندس نرم افزار</p> --}}

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <strong><i class="fa fa-envelope mr-1"></i> ایمیل</strong>

                        <p class="text-muted">
                            {{ $user->email }}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <strong><i class="fa fa-phone mr-1"></i> شماره همراه</strong>

                        <p class="text-muted">
                            {{ $user->phone_number }}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <strong><i class="fa fa-phone mr-1"></i> نام کاربری</strong>

                        <p class="text-muted">
                            {{ $user->user_name }}
                        </p>
                    </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            {{-- <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">درباره من</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fa fa-book mr-1"></i> تحصیلات</strong>

                <p class="text-muted">
                  لیسانس نرم افزار کامپیوتر
                </p>

                <hr>

                <strong><i class="fa fa-map-marker mr-1"></i> موقعیت</strong>

                <p class="text-muted">ایران، مازندران</p>

                <hr>

                <strong><i class="fa fa-pencil mr-1"></i> مهارت‌ها</strong>

                <p class="text-muted">
                  <span class="badge badge-danger">UI Design</span>
                  <span class="badge badge-success">Coding</span>
                  <span class="badge badge-info">Javascript</span>
                  <span class="badge badge-warning">PHP</span>
                  <span class="badge badge-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="fa fa-file-text-o mr-1"></i> یادداشت</strong>

                <p class="text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
              </div>
              <!-- /.card-body -->
            </div> --}}
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                @if(session('message'))
                    <section class="alert d-inline-block w-100 alert-success alert-dismissible fade show p-3 mt-5"
                            role="alert">{{session('message')}}
                        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </section>
                @endif
                @if(session('unique_phone'))
                    <section class="alert d-inline-block w-100 alert-danger alert-dismissible fade show p-3 mt-5"
                            role="alert">{{session('unique_phone')}}
                        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </section>
                @endif
                <div class="shadow-sm p-3 mb-5 bg-white rounded d-inline-block w-100">
                    <div class="col-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">بروزرسانی اطلاعات کاربر</h3>
                            </div>
                            <div class="card-body">
                                @livewire('user.update-profile', ['id' => $user->id])
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection


