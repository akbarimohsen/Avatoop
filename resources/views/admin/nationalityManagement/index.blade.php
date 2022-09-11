@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">لیست ملیت ها</h1>
            </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">خانه</a></li>
              <li class="breadcrumb-item">لیست ملیت ها</li>
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
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">جدول ملیت ها</h3>
                  <div class="card-tools">
                    <a href="{{ route('nationalities.create') }}" class="btn btn-success btn-sm mx-4 float-right d-flex align-items-center">
                        <i class="fa fa-plus ml-2"></i>
                        <span>
                             افزودن ملیت جدید
                        </span>
                    </a>

                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>نام ملیت</th>
                            <th>
                                عملیات
                            </th>
                          </tr>
                    </thead>

                    <tbody>
                        @if($nationalities->count() != 0 )
                            @foreach ($nationalities as $nationality)
                                <tr>
                                    <td>{{ $nationality->name }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('nationalities.edit', ['nationality' => $nationality->id]) }}" class="btn btn-info btn-sm mx-1">
                                                تغییر
                                            </a>
                                            {!! Form::open(['route'=>['nationalities.destroy','nationality'=>$nationality->id],'method'=>'delete']) !!}
                                            {!! Form::submit(' حذف',['class'=>'btn btn-danger btn-sm']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                  </table>
                  @if( $nationalities->count() == 0 )
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
