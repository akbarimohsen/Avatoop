@extends('layouts.master')
@section('content')
    <section class="content-wrapper">
        <section class="container">
            <div class="shadow-sm p-3 mb-5 bg-white rounded d-inline-block w-100 mt-5">
                <div class="col-10 mx-auto">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">ویرایش برچسب</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                {!! Form::model($tags,['route'=>['tag.update','id'=>$tags->id],'method'=>'put']) !!}
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        {!! Form::label('name','نام برچسب',['class'=>'text-capitalize']) !!}
                                        {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'نام برچسب را وارد کنید']) !!}
                                        @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <section class="form-group col-12">
                                        {!! Form::submit('ویرایش برچسب',['class'=>'btn btn-primary mt-3']) !!}
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
