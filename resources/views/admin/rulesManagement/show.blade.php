@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ $rule->title }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">خانه</a></li>
              <li class="breadcrumb-item"><a href="{{ route('rules.index') }}">مدیریت قوانین</a></li>
              <li class="breadcrumb-item active">{{ $rule->title }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
            <div class="card w-100 m-4">
                <div class="card-header font-weight-bold">
                    <h5>{{ $rule->title }}</h5>
                </div>
                <div class="card-body">
                  <p class="card-text">
                      {{ $rule->description }}
                  </p>
                  <br>
                  <div class="d-flex flex-row">
                    <a href="{{ route('rules.edit', ['rule' => $rule->id]) }}" class="btn btn-info btn-sm mx-1">تغییر</a>

                    {!! Form::open(['route'=>['rules.destroy','rule'=>$rule->id],'method'=>'delete']) !!}
                    {!! Form::submit('حذف',['class'=>'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
