@extends('layouts.master')
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

                <div class="col-12 mx-auto">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">ایجاد شماتیک</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                {!! Form::open(['route'=>'schematic.store','method'=>'post']) !!}
                                {!! Form::label('schematic','چینش شماتیک',['class'=>'text-capitalize']) !!}
                                <div class="input-group">
                                    {!! Form::text('schematic',old('schematic'),['class'=>'form-control','placeholder'=>'ترتیب چینش رو وارد کنید(مثلا 3-3-4)']) !!}
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
