@extends('layouts.master')

@section('content')
<div class="ms-lg-250">
    <div class="row">
        <div class="col-12">

            <div class="row">
                <div class="col-12 col-md-10 col-xl-8 mx-auto">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">مدیریت پست های بازی</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-left bg-transparent">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">خانه</a></li>
                                    <li class="breadcrumb-item">مدیریت پست های بازی</li>
                                </ol>
                            </div><!-- /.col -->
                            @if( Session::has('message'))
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <div class="alert alert-success" role="alert">
                                            {{ Session::get('message') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
            </div>

            <!-- Main row -->
            @livewire('admin.positions-management.positions-table')
            <!-- /.row (main row) -->

        </div>
    </div>
</div>
@endsection
