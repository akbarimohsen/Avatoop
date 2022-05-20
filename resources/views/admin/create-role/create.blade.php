@extends('layouts.admin-master')
@section('content')
    <section class="content-wrapper">
        <section class="container">
            <div class="shadow-sm p-3 mb-5 bg-white rounded d-inline-block w-100 mt-5">
                <div class="col-8 mx-auto">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">ایجاد نقش</h3>
                        </div>
                        <div class="card-body">
                            <!-- Date range -->
                            <div class="form-group">
                                <form action="">
                                    <label>نام نقش</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        </div>
                                        <input type="text" class="form-control normal-example"
                                               placeholder="نام نقش را وارد کنید(مانند ادمین یا خبر نگار)"/>
                                    </div>

                                    <input type="submit" class="btn btn-primary mt-3" value="ذخیره">
                                    <!-- /.input group -->
                                </form>
                            </div>
                            <!-- /.form group -->

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-9 mx-auto mt-3">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام نقش</th>
                            <th scope="col">تاریخ ایجاد</th>
                            <th scope="col">تاریخ آپدیت</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($roles as $role)
                            <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td>{{$role->created_at}}</td>
                                <td>{{$role->updated_at}}</td>
                                <td>
                                    {!! Form::open(['route'=>['role.destroy','id'=>$role->id],'method'=>'delete']) !!}
                                    {!! Form::submit('delete',['class'=>'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    <a href="{{route('role.edit',['id'=>$role->id])}}" class="btn btn-warning">update</a>
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
        </section>
    </section>
@endsection
