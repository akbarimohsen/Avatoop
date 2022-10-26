@extends('layouts.master')
@section('content')
    <section class="content-wrapper">
        <section class="container">
            <div class="shadow-sm p-3 mb-5 bg-white w-100 d-inline-block rounded d-inline-block w-100 mt-5">
                <a class="btn btn-success" href="{{route('schematic.index')}}">صفحه اصلی</a>

                <div class="col-8 mx-auto">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">بروز رسانی نام سطح دسترسی</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                {!! Form::model($schematic,['route'=>['schematic.update',$schematic->id],'method'=>'put']) !!}
                                {!! Form::label('schematic','نام سطح دسترسی',['class'=>'text-capitalize']) !!}
                                <div class="input-group">
                                    {!! Form::text('schematic',$schematic->name,['class'=>'form-control','placeholder'=>'ترکی']) !!}
                                </div>
                                @error('schematic')
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
