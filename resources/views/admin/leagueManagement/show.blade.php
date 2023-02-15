@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>لیگ</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">خانه</a></li>
              <li class="breadcrumb-item"><a href="{{ route('leagues.index') }}">مدیریت لیگ‌ها</a></li>
              <li class="breadcrumb-item active">لیگ {{ $league->title }}</li>
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
                         src="{{ Storage::url(config('app.ftpRoute').$league->logo) }}"
                         alt="User profile picture" />
                </div>
                <h3 class="profile-username text-center">
                </h3>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <strong>نام لیگ : </strong>
                        <p class="text-muted">
                            {{ $league->title }}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <strong>حداکثر تعداد تیم : </strong>
                        <p class="text-muted">
                            {{ $league->teams->count() }}
                        </p>
                    </li>
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
                    <section class="alert d-inline-block w-100 alert-success alert-dismissible fade show p-3 mt-5" role="alert">
                        {{session('message')}}
                        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </section>
                @endif
                @if(session('unique_phone'))
                    <section class="alert d-inline-block w-100 alert-danger alert-dismissible fade show p-3 mt-5"
                            role="alert">{{ session('unique_phone') }}
                        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </section>
                @endif
                <div class="shadow-sm p-3 mb-5 bg-white rounded d-inline-block w-100">
                    <div class="col-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">تیم های موجود</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-hover">
                                    <tr>
                                        <th>شناسه</th>
                                        <th>نام</th>
                                        <th>تعداد بازی</th>
                                        <th>برد</th>
                                        <th>مساوی</th>
                                        <th>باخت</th>
                                        <th>گل زده</th>
                                        <th>امتیاز</th>
                                    </tr>
                                    @if(count($teams) != 0)
                                        @php($i = 1)
                                        @foreach($teams as $team)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $team->name }}</td>
                                                <td>{{ $team->match }}</td>
                                                <td>{{ $team->win }}</td>
                                                <td>{{ $team->draw }}</td>
                                                <td>{{ $team->loss }}</td>
                                                <td>{{ $team->goal }}</td>
                                                <td>{{ $team->point }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
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


