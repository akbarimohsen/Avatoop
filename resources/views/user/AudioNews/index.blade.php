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
                <h3 class="profile-username text-center">
                    لیست تیم های محبوب
                </h3>

                {{-- <p class="text-muted text-center">مهندس نرم افزار</p> --}}

                <ul class="list-group mt-5">
                    @foreach ($userTeams as $team )
                        <a href="#" class="list-group-item list-group-item-action">{{ $team->title }}</a>
                    @endforeach
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
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
                <div class="shadow-sm p-3 mb-5 bg-white rounded d-inline-block w-100">
                    <div class="col-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">
                                    جدول خبرهای صوتی
                                </h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                  <tbody>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>عنوان</th>
                                        <th>تاریخ ایجاد</th>
                                    </tr>

                                    @foreach ($all_news as $news )
                                        <tr>
                                            <td>{{ $news->id }}</td>
                                            <td>{{ $news->title }}</td>
                                            <td>{{ $news->views_count }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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


