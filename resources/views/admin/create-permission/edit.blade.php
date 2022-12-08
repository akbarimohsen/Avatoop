@extends('layouts.master')
@section('content')
    <div class="ms-lg-250">
        <div class="row p-3 mb-5 bg-white w-100 d-inline-block rounded">
            <div class="col-12 col-md-10 col-xl-8 mx-auto">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">بروز رسانی نام سطح دسترسی</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            {!! Form::model($permission,['route'=>['permission.update',$permission->id],'method'=>'put']) !!}
                            {!! Form::label('permission','نام سطح دسترسی',['class'=>'text-capitalize']) !!}
                            <div class="input-group">
                                {!! Form::text('permission',$permission->name,['class'=>'form-control','placeholder'=>'نام سطح دسترسی را وارد کنید(مانند ایجاد کننده خبر یا آپدیت کننده خبر)']) !!}
                            </div>
                            @error('permission')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                            <section class="form-group">
                                {!! Form::submit('ذخیره',['class'=>'btn btn-outline-success mt-3']) !!}
                            </section>
                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
