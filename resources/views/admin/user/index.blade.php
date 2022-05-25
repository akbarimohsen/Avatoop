@extends('layouts.admin-master')
@section('content')
    <section class="content-wrapper">
        <section class="container">
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
                @forelse($RolesWithUsers as $RoleList)
                    <span class="text-bold p-3 d-inline-block">کاربران نقش <i
                            class="badge p-2 badge-pill badge-primary">{{$RoleList->name}}</i></span>
                    <div class="table-responsive">
                        <table class="table table-hover" style="margin-bottom: 15%">
                            <thead class="bg-info">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نام کاربر</th>
                                <th scope="col">نام خانوادگی</th>
                                <th scope="col">نام کاربری</th>
                                <th scope="col">ایمیل</th>
                                <th scope="col">شماره تلفن</th>
                                <th scope="col">آپدیت</th>
                                <th scope="col">حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($RoleList->users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <th>{{$user->first_name}}</th>
                                    <td>{{$user->last_name}}</td>
                                    <td>{{$user->user_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone_number}}</td>
                                    <td>
                                        {!! Form::open(['route'=>['user.destroy','id'=>$user->id],'method'=>'delete']) !!}
                                        {!! Form::submit('delete',['class'=>'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        <a href="{{route('user.edit',['id'=>$user->id])}}" class="btn btn-warning">update</a>
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
                @empty
                    <tr>
                        <td colspan="5">دیتا وجود ندارد</td>
                    </tr>
                @endforelse
            </div>
        </section>
    </section>
@endsection
