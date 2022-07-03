@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>تیم های محبوب</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">خانه</a></li>
              <li class="breadcrumb-item active">تیم های محبوب</li>
            </ol>
          </div>
        </div>
        @if( Session::has('message'))
            <div class="row mt-2">
                <div class="col-md-12 ">
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
                      </div>
                </div>
            </div>
          @endif
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                      تیم های محبوب
                  </h3>

                  <div class="card-tools">
                      <a href="{{ route('user.popularTeams.add') }}" class="btn btn-sm btn-success">
                        <i class="fa fa-heart"></i>

                        افزودن تیم محبوب
                      </a>
                    {{-- <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="جستجو">

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div> --}}
                  </div>
                </div>
                <!-- /.card-header -->

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                      <tr>
                        <th>لوگو تیم</th>
                        <th>نام تیم</th>
                        <th>لیگ</th>
                        <th>عملیات</th>
                      </tr>

                        @if ($popular_teams->count() != 0)
                            @foreach( $popular_teams as $team )
                                <tr>
                                    <td>
                                        <img src="{{ asset('assets/images/teams/' . $team->logo) }}" widtd="40px" height="40px" alt="">
                                    </td>
                                    <td>
                                        {{ $team->title }}
                                    </td>
                                    <td>
                                        {{ $team->league->title }}
                                    </td>
                                    <td>
                                        <a href="{{ route('user.popularTeams.delete', ['id' => $team->id]) }}" class="btn btn-sm btn-danger">حذف</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                    @if ($popular_teams->count() == 0)
                        <div class="alert alert-warning mx-1">
                            هیچ تیمی یافت نشد.
                        </div>
                    @endif
                  </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div><!-- /.row -->
        <!-- /.row (main row) -->

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection


