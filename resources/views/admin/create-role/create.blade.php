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
                        <h3 class="card-title">ایجاد نقش</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            {!! Form::open(["#",'method'=>'get']) !!}
                            {!! Form::label('role','نام نقش',['class'=>'text-capitalize']) !!}
                            <div class="input-group">
                                {!! Form::text('role',old('role'),['class'=>'form-control','placeholder'=>'نام نقش را وارد کنید(مانند ادمین یا خبر نگار)']) !!}
                            </div>
                            @error('role')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                            <section class="form-group">
                                {!! Form::submit('ذخیره',['class'=>'btn disabled btn-outline-success mt-3']) !!}
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
                        <th scope="col">#</th>
                        <th scope="col">نام نقش</th>
                        <th scope="col">تاریخ ایجاد</th>
                        <th scope="col">تاریخ آپدیت</th>
                        <th scope="col">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i = 1)
                    @forelse($roles as $role)
                        <tr>
                            <td>{{ $i ++ }}</td>
                            <td>{{$role->name}}</td>
                            <td>{{ Verta::createTimestamp($role->created_at)->formatDifference() }}</td>
                            @if ($role->updated_at != $role->created_at)
                                <td>{{ Verta::createTimestamp($role->updated_at)->formatDifference() }}</td>
                            @else
                                <td><p class="text-secondary">آپدیت نشده</p></td>
                            @endif
                            <td>
                                <div class="d-flex flex-row">
{{--                                    <a href="{{route('role.edit',['id'=>$role->id])}}"--}}
{{--                                       class="btn btn-warning disabled p-0 ml-1">ویرایش</a>--}}
{{--                                    {!! Form::open(['route'=>['role.destroy','id'=>$role->id],'method'=>'delete']) !!}--}}
{{--                                    {!! Form::submit('حذف',['class'=>'btn disabled btn-danger p-0']) !!}--}}
{{--                                    {!! Form::close() !!}--}}
                                    <button class="btn btn-warning">بدون عملیات</button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">دیتا وجود ندارد</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>>
@endsection
