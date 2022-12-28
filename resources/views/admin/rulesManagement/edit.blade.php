@extends('layouts.master')

@section('content')
<div class="ms-lg-250">
    <div class="row">
        <div class="col-12 col-md-10 col-xl-8 mx-auto">
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
                                <li class="breadcrumb-item">تغییر قانون </li>
                                <li class="breadcrumb-item"> {{ $rule->title }} </li>
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

                    <div class="row d-flex justify-content-center">
                        <!-- left column -->
                        <div class="col-12">
                            <!-- general form elements -->
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">اطلاعات قانون</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ route('rules.update', ['rule' => $rule->id]) }}" method="POST" >
                                    @method('PUT')
                                    @csrf
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="title"> عنوان قانون</label>
                                            <input type="text" class="form-control" id="title" name="title" value="{{ $rule->title }}" placeholder="عنوان قانون جدید را وارد کنید.">
                                            @if($errors->has('title'))
                                                <ul class="mt-1 mr-4">
                                                    @foreach ($errors->get('title') as $error )
                                                        <li class="text-danger">
                                                            {{ $error }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="description">توضیحات</label>
                                            <textarea class="form-control" name="description" id="description" rows="5">{{ $rule->description }}</textarea>
                                            @if($errors->has('description'))
                                                <ul class="mt-1 mr-4">
                                                    @foreach ($errors->get('description') as $error )
                                                        <li class="text-danger">
                                                            {{ $error }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                        <div class="card-footer bg-transparent">
                                            <button type="submit" class="btn btn-outline-warning">ارسال</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->

                        </div>
                        <!--/.col (left) -->
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>
</div>
@endsection
