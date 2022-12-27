@extends('layouts.master')
@section('content')
    <div class="ms-lg-250">
        <div class="row">
            <div class="col-12 col-md-11 col-xl-10 mx-auto">
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
                    <div class="p-3 mb-5 bg-white rounded d-inline-block w-100 mt-5">
                        <div class="col-12 mx-auto">
                            <div class="card card-success">
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
                                            {!! Form::submit('ذخیره',['class'=>'btn btn-outline-success mt-3']) !!}
                                        </section>
                                        {!! Form::close() !!}
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="table-responsive col-12 mx-auto mt-3">
                            {{--show roles--}}
                            <table class="table table-striped table-hover">
                                <thead class="bg-info">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">نام دسته بندی</th>
                                    <th scope="col">تاریخ ایجاد</th>
                                    <th scope="col">تاریخ آپدیت</th>
                                    <th scope="col">ویرایش</th>
                                    <th scope="col">حذف</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($categories as $category)
                                    <tr>
                                        <td>{{$categories->firstItem()+$loop->index}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{Verta::createTimestamp($category->created_at)->formatDifference()}}</td>
                                        @if ($category->updated_at != $category->created_at)
                                            <td>{{ Verta::createTimestamp($category->updated_at)->formatDifference() }}</td>
                                        @else
                                            <td><p class="text-secondary">آپدیت نشده</p></td>
                                        @endif
                                        <td>
                                            <a href="{{route('category.edit',['id'=>$category->id])}}"
                                               class="btn btn-warning">ویرایش</a>
                                        </td>
                                        <td>
                                            {!! Form::open(['route'=>['category.destroy','id'=>$category->id,],'method'=>'delete']) !!}
                                            {!! Form::submit('حذف',['class'=>'btn btn-danger','onclick'=>'return confirm("با حذف این دسته بندی تمامی اخبار مربوطه پاک خواهد شد، آیا مطمئنید؟")']) !!}
                                            {!! Form::close() !!}
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
                        <span class="d-flex justify-content-center">{{$categories->links()}}</span>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
