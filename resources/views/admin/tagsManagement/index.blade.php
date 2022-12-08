@extends('layouts.master')
@section('content')
    <div class="ms-lg-250">
        @if (session('success'))
            <section class="alert alert-success w-100 d-inline-block alert-dismissible fade show p-3 mt-5"
                     role="alert">
                {{ session('success') }}
                <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </section>
        @endif

        <div class="row p-3 mb-5 bg-white rounded d-inline-block w-100">
            <div class="col-12 col-md-10 col-xl-8 mx-auto">
                <div class="card card-success">
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
                                {!! Form::submit('ذخیره', ['class' => 'btn btn-outline-success mt-3']) !!}
                            </section>
                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>
            </div>

            <div class="row p-3 mb-5 bg-white rounded d-inline-block w-100">
                <div class="col-12 col-md-11 col-xl-10 mx-auto">
                    <form action="{{ route('admin.tag.search') }}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input name="name" type="text" placeholder="نام برچسب را وارد کنید"
                                   aria-label="Example text with button addon" aria-describedby="button-addon1">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-success" type="submit" id="button-addon1">جستجو</button>
                            </div>
                        </div>
                    </form>
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
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ Verta::createTimestamp($tag->created_at)->formatDifference() }}</td>
                                    @if ($tag->updated_at != null)
                                        <td>{{ Verta::createTimestamp($tag->updated_at)->formatDifference() }}</td>
                                    @else
                                        <td><p class="text-secondary">آپدیت نشده</p></td>
                                    @endif
                                    <td>
                                        <a href="{{ route('tag.edit', ['id' => $tag->id]) }}"
                                           class="btn btn-warning">ویرایش</a>
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['tag.destroy', 'id' => $tag->id], 'method' => 'delete']) !!}
                                        {!! Form::submit('حذف', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("از خذف این برچسب مطمئنید؟")']) !!}
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
                        <span class="d-flex justify-content-center">
                            {{ $tags->links() }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
