@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">پاسخگویی به پیشنهاد</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">خانه</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.suggests') }}">مدیریت پیشنهادات</a></li>
              <li class="breadcrumb-item">{{ $suggest->id }}</li>
            </ol>
          </div><!-- /.col -->
          @if( Session::has('message'))
            <div class="row mt-2">
                <div class="col-md-12 ">
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
                      </div>
                </div>
            </div>
          @endif
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        @livewire('admin.suggest-management.response-suggest',['id' => $suggest->id])
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
