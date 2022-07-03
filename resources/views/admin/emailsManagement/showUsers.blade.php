@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
             <h1> مدیریت ایمیل های گروهی </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">خانه</a></li>
              <li class="breadcrumb-item">مدیریت ایمیل های گروهی</li>
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
                @if($errors->any())
                    <ul class="mx-4">
                        @foreach ($errors->all() as $error)
                            <li class="text text-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
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
                @livewire('admin.emails-management.select-users')
              <!-- /.card -->
            </div>
          </div><!-- /.row -->
        <!-- /.row (main row) -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
