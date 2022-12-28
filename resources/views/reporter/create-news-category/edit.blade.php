@extends('layouts.master')
@section('content')
    <div class="ms-lg-250">
        <div class="row">
            <div class="col-12 col-md-10 col-xl-8 mx-auto">
                <section class="container">
                    <div class="p-3 mb-5 bg-white w-100 d-inline-block rounded d-inline-block w-100 mt-5">
                        <div class="col-12 mx-auto">
                            <div class="card card-warning bg-white">
                                <div class="card-header">
                                    <div class="d-flex justify-content-around">
                                        <h3 class="card-title">بروز رسانی نام دسته بندی</h3>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        {!! Form::model($category,['route'=>['category.update','id'=>$category->id],'method'=>'put']) !!}
                                        {!! Form::label('name','نام دسته بندی',['class'=>'text-capitalize']) !!}
                                        <div class="input-group">
                                            {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'نام دسته بندی خبر را وارد نمایید']) !!}
                                        </div>
                                        @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                        <section class="form-group">
                                            {!! Form::submit('ذخیره',['class'=>'btn btn-outline-warning mt-3']) !!}
                                        </section>
                                        {!! Form::close() !!}
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
