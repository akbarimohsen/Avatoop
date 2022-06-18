@extends('layouts.admin-master')
@section('content')
    <section class="content-wrapper">
        <section class="container">
            <div class="shadow-sm p-3 mb-5 bg-white w-100 d-inline-block rounded d-inline-block w-100 mt-5">
                <div class="col-sm-8 col-12 mx-auto">
                    <div class="bg-white">
                        <div class="card-header">
                            <div class="d-flex justify-content-around">
                                <h3 class="card-title">بروز رسانی نام دسته بندی</h3>
                                <a class="btn btn-success" href="{{route('category.create')}}">صفحه اصلی</a>
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