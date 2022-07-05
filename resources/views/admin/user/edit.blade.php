@extends('layouts.admin-master')
@section('content')
    <section class="content-wrapper">
        <section class="container">
            @if(session('create'))
                <section class="alert d-inline-block w-100 alert-success alert-dismissible fade show p-3 mt-5"
                         role="alert">{{session('create')}}
                    <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </section>
            @endif
            @if(session('exist'))
                <section class="alert alert-danger w-100 d-inline-block alert-dismissible fade show p-3 mt-5"
                         role="alert">{{session('exist')}}
                    <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </section>
            @endif
            @if(session('delete'))
                <section class="alert alert-success w-100 d-inline-block alert-dismissible fade show p-3 mt-5"
                         role="alert">{{session('delete')}}
                    <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </section>
            @endif
            @if(session('update'))
                <section class="alert alert-success w-100 d-inline-block alert-dismissible fade show p-3 mt-5"
                         role="alert">{{session('update')}}
                    <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </section>
            @endif

            <div class="shadow-sm p-3 mb-5 bg-white rounded d-inline-block w-100 mt-5">
                <div class="col-10 mx-auto">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">ایجاد کاربر</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                {!! Form::model($user,['route'=>['user.update','id'=>$user->id],'method'=>'put',"files"=>true]) !!}
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        {!! Form::label('first_name','نام کاربر',['class'=>'text-capitalize']) !!}
                                        {!! Form::text('first_name',old('first_name'),['class'=>'form-control','placeholder'=>'نام کاربر را وارد کنید']) !!}
                                        @error('first_name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        {!! Form::label('last_name','نام خانوادگی',['class'=>'text-capitalize']) !!}
                                        {!! Form::text('last_name',old('last_name'),['class'=>'form-control','placeholder'=>'نام خانوادگی کاربر را وارد کنید']) !!}
                                        @error('last_name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        {!! Form::label('user_name','نام کاربری',['class'=>'text-capitalize']) !!}
                                        {!! Form::text('user_name',old('user_name'),['class'=>'form-control','placeholder'=>'نام کاربری کاربر را وارد کنید']) !!}
                                        @error('user_name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        {!! Form::label('email','ایمیل کاربر',['class'=>'text-capitalize']) !!}
                                        {!! Form::text('email',old('email'),['class'=>'form-control','placeholder'=>'ایمیل کاربر را وارد کنید']) !!}
                                        @error('email')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        {!! Form::label('phone_number','تلفن کاربر',['class'=>'text-capitalize']) !!}
                                        {!! Form::text('phone_number',old('phone_number'),['class'=>'form-control','placeholder'=>'شماره تلفن کاربر را وارد کنید']) !!}
                                        @error('phone_number')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        {!! Form::label('image','image',['class'=>'text-capitalize']) !!}
                                        {!! Form::file('image',['class'=>'form-control','style'=>'border:2px inset lightgray']) !!}
                                        @error('image')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror

                                        <img src="{{\Illuminate\Support\Facades\Storage::disk('public')->url("images/user/profile/".$user->profile_photo_path)}}" class="img-circle" width="100" height="100" alt="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        {!! Form::label('select_role','نقش کاربر در صورت نیاز',['class'=>'text-capitalize']) !!}
                                        {!! Form::select('select_role', $roles,$user->roles,['class'=>'form-control']);!!}
                                    </div>
                                    <section class="form-group col-12">
                                        {!! Form::submit('ذخیره کاربر',['class'=>'btn btn-primary mt-3']) !!}
                                    </section>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </section>
@endsection

