@extends('layouts.admin-master')
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
                <div class="col-8 mx-auto">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">ایجاد دسته بندی خبر</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                {!! Form::open(['route'=>'category.store','method'=>'post']) !!}
                                {!! Form::label('name','نام دسته بندی',['class'=>'text-capitalize']) !!}
                                <div class="input-group">
                                    {!! Form::text('name',old('category'),['class'=>'form-control','placeholder'=>'نام دسته بندی خبر را وارد کنید']) !!}
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
                <div class="col-9 mx-auto mt-3">
                    {{--show roles--}}
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام دسته بندی</th>
                            <th scope="col">تاریخ ایجاد</th>
                            <th scope="col">تاریخ آپدیت</th>
                            <th scope="col">حذف</th>
                            <th scope="col">آپدیت</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td>{{$categories->firstItem()+$loop->index}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{\Carbon\Carbon::parse($category->created_at)->DiffForHumans()}}</td>
                                <td>{{\Carbon\Carbon::parse($category->updated_at)->DiffForHumans()}}</td>
                                <td>
                                    {!! Form::open(['route'=>['category.destroy','id'=>$category->id,],'method'=>'delete']) !!}
                                    {!! Form::submit('delete',['class'=>'btn btn-danger','onclick'=>'return confirm("با حذف این دسته بندی تمامی اخبار مربوطه پاک خواهد شد، آیا مطمئنید؟")']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    <a href="{{route('category.edit',['id'=>$category->id])}}"
                                       class="btn btn-warning">update</a>
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
                <span class="d-flex justify-content-center">{{$categories->links()}}</span>
            </div>
        </section>
    </section>
@endsection
