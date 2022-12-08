@extends('layouts.master')
@section('content')
    <div class="ms-lg-250">
        <div class="row p-3 mb-5 bg-white w-100 d-inline-block rounded">
            <div class="col-12 col-md-10 col-xl-8 mx-auto">
                <div class="card">
                    <div class="card-header bg-success d-flex justify-content-between align-items-center d-none-after">
                        <h3 class="card-title">بروز رسانی نام نقش</h3>
                        <a class="text-white btn btn-danger" href="{{route('role.create')}}">صفحه اصلی</a>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            {!! Form::model($role,['route'=>['role.update',$role->id],'method'=>'put']) !!}
                            {!! Form::label('role','نام نقش',['class'=>'text-capitalize']) !!}
                            <div class="input-group">
                                {!! Form::text('role',$role->name,['class'=>'form-control','placeholder'=>'نام نقش را وارد کنید(مانند ادمین یا خبر نگار)']) !!}
                            </div>
                            @error('role')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                            <section class="form-group">
                                {!! Form::submit('ذخیره',['class'=>'btn btn-outline-success mt-3']) !!}
                            </section>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="mt-4 p-2">
                    <span class="d-inline-block badge badge-info p-2 mb-2">مجوز های نقش</span>
                    @forelse($role->permissions as $role_permission)
                        <div class="d-flex justify-content-around mt-4">
                            <span>{{$role_permission->name}}</span>
                            <div>
                                {!! Form::open(['route'=>['role.permission.revoke',[$role->id,$role_permission->id]],'method'=>'delete']) !!}
                                {!! Form::submit('حذف',['class'=>'btn btn-danger','onclick'=>'return confirm("آیا مطمئنید؟")']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    @empty
                        <span class="d-block alert alert-warning">نقش مورد نظر دارای مجوز نیست</span>
                    @endforelse
                </div>
                <div class="mt-4 p-2">
                    <span class="d-inline-block badge badge-success p-2 mb-2">دادن مجوز</span>
                    {!! Form::open(['route'=>['role.permission',$role->id],'method'=>'POST']) !!}
                    <div class="form-group col-12">
                        {!! Form::label('permission','انتخاب مجوز',['class'=>'text-capitalize']) !!}
                        {!! Form::select('permission',$permissions,null,['class'=>'form-control']);!!}
                    </div>
                    {!! Form::submit('ذخیره',['class'=>'btn btn-outline-success mt-3']) !!}

                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
@endsection
