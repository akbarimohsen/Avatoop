@extends('layouts.master')
@section('content')
    <div class="ms-lg-250">
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

        <div class="row p-3 mb-5 bg-white rounded d-inline-block w-100">
            <div class="col-12 col-md-10 col-xl-8 mx-auto">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">ایجاد سطح دسترسی</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            {!! Form::open(['#','method'=>'get']) !!}
                            {!! Form::label('permission','نام سطح دسترسی',['class'=>'text-capitalize']) !!}
                            <div class="input-group">
                                {!! Form::text('permission',old('permission'),['class'=>'form-control','placeholder'=>'نام سطح دسترسی را وارد کنید(مانند ایجاد کننده خبر یا آپدیت کننده خبر)']) !!}
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
            <div class="table-responsive col-12 col-md-11 col-xl-10 mx-auto mt-3">
                {{--show roles--}}
                <table class="table table-striped table-hover">
                    <thead class="bg-info">
                    <tr>
                        <th scope="cosl">#</th>
                        <th scope="col">نام سطح دسترسی</th>
                        <th scope="col">تاریخ ایجاد</th>
                        <th scope="col">تاریخ آپدیت</th>
                        <th scope="col">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i = 1)
                    @forelse($permissions as $permission)
                        <tr>
                            <td>{{ $i ++ }}</td>
                            <td>{{$permission->name}}</td>
                            <td>{{ Verta::createTimestamp($permission->updated_at)->formatDifference() }}</td>
                            @if ($permission->updated_at != $permission->created_at)
                                <td>{{ Verta::createTimestamp($permission->updated_at)->formatDifference() }}</td>
                            @else
                                <td><p class="text-secondary">آپدیت نشده</p></td>
                            @endif
                            <td>
{{--                                {!! Form::open(['route'=>['permission.destroy','id'=>$permission->id],'method'=>'delete']) !!}--}}
{{--                                {!! Form::submit('حذف',['class'=>'btn btn-danger']) !!}--}}
{{--                                {!! Form::close() !!}--}}
{{--                                <a href="{{route('permission.edit',['id'=>$permission->id])}}"--}}
{{--                                   class="btn btn-warning">ویرایش</a>--}}
                                <button class="btn btn-warning">بدون عملیات</button>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">دیتا وجود ندارد</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
