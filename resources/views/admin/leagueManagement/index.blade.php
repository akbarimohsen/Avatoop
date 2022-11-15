@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">مدیریت لیگ ها</h1>
            </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">خانه</a></li>
              <li class="breadcrumb-item">مدیریت لیگ ها</li>
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
                {{-- <div class="row m-4 d-flex justify-content-center">
                    <div class="col-6">
                        <form class="input-group input-group-sm" wire:submit.prevent="addPosition">
                            <input type="text" class="form-control float-right" placeholder="نام پست بازی" wire:model="name">
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-success">ایجاد</button>
                            </div>
                        </form>
                    </div>
                </div> --}}
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">جدول لیگ ها</h3>
                  <div class="card-tools">
                    <a href="{{ route('leagues.create') }}" class="btn btn-success btn-sm mx-4 float-right d-flex align-items-center">
                        <i class="fa fa-plus ml-2"></i>
                        <span>
                             افزودن لیگ  جدید
                        </span>
                    </a>

                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>نام لیگ</th>
                            <th>لوگو لیگ</th>
                            <th>تعداد تیم</th>
                            <th>
                                عملیات
                            </th>
                          </tr>
                    </thead>

                    <tbody>
                        @if($leagues->count() != 0 )
                            @foreach ($leagues as $league)
                                <tr>
                                    <td>{{ $league->title }}</td>
                                    <td><img src="{{ \Illuminate\Support\Facades\Storage::url('leagues/'. $league->logo) }}" width="40px" height="40px" alt=""></td>
                                    <td>{{ $league->teams_count }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('leagues.edit', ['league' => $league->id]) }}" class="btn btn-info btn-sm mx-1">
                                                تغییر
                                            </a>
                                            {!! Form::open(['route'=>['leagues.destroy','league'=>$league->id],'method'=>'delete']) !!}
                                            {!! Form::submit(' حذف',['class'=>'btn btn-danger btn-sm']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                  </table>
                  @if( $leagues->count() == 0 )
                    <div class="alert alert-secondary mt-3 text-center" role="alert">
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
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
