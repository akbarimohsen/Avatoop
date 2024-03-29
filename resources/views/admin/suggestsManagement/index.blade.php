@extends('layouts.master')

@section('content')
<div class="ms-lg-250">
    <div class="row">
        <div class="col-12 col-md-11 col-xl-10 mx-auto">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">مدیریت پیشنهادات</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-left">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">خانه</a></li>
                                <li class="breadcrumb-item">مدیریت پیشنهادات</li>
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
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <h3 class="card-title">
                                        مدیریت پیشنهادات
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                @livewire('admin.suggest-management.suggest-table')
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
    </div>
</div>
@endsection
