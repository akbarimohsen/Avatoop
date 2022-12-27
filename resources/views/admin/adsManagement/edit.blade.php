@extends('layouts.master')

@section('content')
<div class="ms-lg-250">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12 col-md-10 col-xl-8 mx-auto">
                    <div class="row">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">تغییر تبلیغ</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-left">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">خانه</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.ads') }}">تبلیغات</a></li>
                                <li class="breadcrumb-item active">
                                    تغییر تبلیغ
                                </li>
                            </ol>
                        </div><!-- /.col -->
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->


            @livewire('admin.ads-management.edit-ad',['id' => $ad->id])

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
