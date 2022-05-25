@extends('layouts.admin-master')
@section('content')
    <section class="content-wrapper">
        <section class="container">
            <div class="shadow-sm p-3 mb-5 bg-white w-100 d-inline-block rounded d-inline-block w-100 mt-5">
                <div class="col-8 mx-auto">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">بروز رسانی نام نقش</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                {!! Form::model($role,['route'=>['role.update',$role->id],'method'=>'put']) !!}
                                {!! Form::label('role','نام نقش',['class'=>'text-capitalize']) !!}
                                <div class="input-group">
                                    {!! Form::text('role',$role->name,['class'=>'form-control','placeholder'=>'نام نقش را وارد کنید(مانند ادمین یا خبر نگار)']) !!}
                                </div>
                                @error('role')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                                <section class="form-group">
                                    {!! Form::submit('ذخیره',['class'=>'btn btn-primary mt-3']) !!}
                                </section>
                                {!! Form::close() !!}
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </section>
@endsection
