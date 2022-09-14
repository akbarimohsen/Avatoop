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
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                <div class="shadow-sm p-3 mb-5 bg-white rounded d-inline-block w-100">
                    <div class="col-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">ایمیل ها</h3>
                            </div>
                            <div class="card-body">

                                @if($emails->count() != 0)
                                    @foreach ($emails as $email)
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="{{ asset('assets/images/cmt-img.png') }}" alt="user image">
                                                <span class="username">
                                                    <a href="#">ادمین</a>
                                                    <a href="#" class="float-left btn-tool"><i class="fa fa-times"></i></a>
                                                </span>
                                                <span class="description">ارسال شده در

                                                        {{ Hekmatinasser\Verta\Facades\Verta::instance($email->created_at)->format('Y-n-j H:i')}}

                                                </span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>
                                                {{ $email->text }}
                                            </p>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="alert alert-secondary">
                                        چیزی یافت نشد !
                                    </div>
                                @endif

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


