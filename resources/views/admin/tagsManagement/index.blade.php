@extends('layouts.master')
@section('content')
    <section class="content-wrapper">
        <section class="container">
{{--            @if (session('success'))--}}
{{--                <section class="alert alert-success w-100 d-inline-block alert-dismissible fade show p-3 mt-5" role="alert">--}}
{{--                    {{ session('success') }}--}}
{{--                    <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </section>--}}
{{--            @endif--}}
            <div class="shadow-sm p-3 mb-5 bg-white rounded d-inline-block w-100 mt-5">
                <div class="col-8 mx-auto">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">ایجاد برچسب</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                {!! Form::open(['route' => 'tag.store', 'method' => 'post']) !!}
                                {!! Form::label('name', 'نام برچسب', ['class' => 'text-capitalize']) !!}
                                <div class="input-group">
                                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'نام برچسب را وارد کنید']) !!}
                                </div>
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <section class="form-group">
                                    {!! Form::submit('ذخیره', ['class' => 'btn btn-primary mt-3']) !!}
                                </section>
                                {!! Form::close() !!}
                            </div>

                        </div>
                    </div>
                </div>
                <div class="shadow-sm p-3 mb-5 bg-white rounded d-inline-block w-100 mt-3">
                    <div class="table-responsive">
                        <table class="table table-hover" style="margin-bottom: 15%">
                            <thead class="bg-info">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">نام برچسب</th>
                                    <th scope="col">تاریخ ایجاد</th>
                                    <th scope="col">تاریخ آپدیت</th>
                                    <th scope="col">آپدیت</th>
                                    <th scope="col">حذف</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tags as $tag)
                                    <tr>
                                        <th scope="row">{{ $tags->firstItem() + $loop->index }}</th>
                                        @php
                                            $v = verta();
                                        @endphp
                                        <td>{{ $tag->name }}</td>
                                        <td>{{ Verta::createTimestamp($tag->created_at)->formatDifference() }}</td>
                                        @if ($tag->updated_at != null)
                                            <td>{{ Verta::createTimestamp($tag->updated_at)->formatDifference() }}</td>
                                        @else
                                            <td><p class="text-secondary">آپدیت نشده</p></td>
                                        @endif
                                        {{-- <td>
                                        {!! Form::open(['route'=>['user.destroy','id'=>$tag->id],'method'=>'delete']) !!}
                                        {!! Form::submit('delete',['class'=>'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td> --}}
                                        <td>
                                            <a href="{{ route('tag.edit', ['id' => $tag->id]) }}"
                                                class="btn btn-warning">ویرایش</a>
                                        </td>
                                        <td>
                                            {{-- <a href="{{ route('' , ['id' => $tag->id]) }}"
                                                onclick="return confirm('با حذف این برچسب موافقید؟')"
                                                class="btn btn-danger">Delete</a> --}}
                                            {!! Form::open(['route' => ['tag.destroy', 'id' => $tag->id], 'method' => 'delete']) !!}
                                            {!! Form::submit('حذف', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("از خذف این برچسب مطمئنید؟")']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">دیتا وجود ندارد</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <span class="d-flex justify-content-center">
                            {{ $tags->links() }}
                        </span>
                    </div>
                </div>
        </section>
    </section>
@endsection
