@extends('layouts.master')
@section('content')
<div class="ms-lg-250">
    <section class="container">
        <div class="row mb-5 bg-white w-100 d-inline-block rounded d-inline-block mt-5">
            <div class="col-12 col-md-10 col-xl-8 mx-auto">
                <a class="btn btn-outline-info" href="{{route('schematic.index')}}">صفحه اصلی</a>

                <div class="col-12 mx-auto mt-3">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">بروز رسانی شماتیک</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                {!! Form::model($schematic,['route'=>['schematic.update',$schematic->id],'method'=>'put']) !!}
                                {!! Form::label('schematic','نام شماتیک',['class'=>'text-capitalize']) !!}
                                <div class="input-group">
                                    {!! Form::text('schematic',$schematic->name,['class'=>'form-control','placeholder'=>'شماره شماتیک']) !!}
                                </div>
                                @error('schematic')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                                <section class="form-group">
                                    {!! Form::submit('به روز رسانی',['class'=>'btn btn-outline-warning mt-3']) !!}
                                </section>
                                {!! Form::close() !!}
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection
