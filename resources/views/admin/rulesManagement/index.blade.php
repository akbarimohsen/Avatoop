@extends('layouts.admin-master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">مدیریت قوانین</h1>
            </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">خانه</a></li>
              <li class="breadcrumb-item">مدیریت قوانین</li>
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
                  <h3 class="card-title">جدول قوانین</h3>
                  <div class="card-tools">
                    <a href="{{ route('rules.create') }}" class="btn btn-success btn-sm mx-4 float-right d-flex align-items-center">
                        <i class="fa fa-plus ml-2"></i>
                        <span>
                             افزودن قانون جدید
                        </span>
                    </a>

                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>شناسه</th>
                            <th>عنوان</th>
                            <th>
                                عملیات
                            </th>
                          </tr>
                    </thead>

                    <tbody>
                        @if( $rules->count() != 0 )
                            @foreach ($rules as $rule)
                                <tr>
                                    <td>{{ $rule->id }}</td>
                                    <td>{{ $rule->title }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('rules.show',['rule' => $rule->id]) }}" class="btn btn-success btn-sm mx-1">
                                                مشاهده
                                            </a>
                                            <a href="{{ route('rules.edit', ['rule' => $rule->id]) }}" class="btn btn-info btn-sm mx-1">
                                                تغییر
                                            </a>
                                            {!! Form::open(['route'=>['rules.destroy','rule'=>$rule->id],'method'=>'delete']) !!}
                                            {!! Form::submit('delete',['class'=>'btn btn-danger btn-sm']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                  </table>
                  @if( $rules->count() == 0 )
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