@extends('layouts.master')
@section('content')
    <section class="content-wrapper">
        <section class="container">
            @if (session('create'))
                <section class="alert d-inline-block w-100 alert-success alert-dismissible fade show p-3 mt-5" role="alert">
                    {{ session('create') }}
                    <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </section>
            @endif
            @if (session('exist'))
                <section class="alert alert-danger w-100 d-inline-block alert-dismissible fade show p-3 mt-5" role="alert">
                    {{ session('exist') }}
                    <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </section>
            @endif
            @if (session('delete'))
                <section class="alert alert-success w-100 d-inline-block alert-dismissible fade show p-3 mt-5"
                    role="alert">{{ session('delete') }}
                    <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </section>
            @endif
            @if (session('update'))
                <section class="alert alert-success w-100 d-inline-block alert-dismissible fade show p-3 mt-5"
                    role="alert">{{ session('update') }}
                    <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </section>
            @endif

            <div class="shadow-sm p-3 mb-5 bg-white rounded d-inline-block w-100 mt-5">
                <div class="col-8 mx-auto">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">ایجاد نقش</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                {!! Form::open(['route' => 'role.store', 'method' => 'post']) !!}
                                {!! Form::label('role', 'نام نقش', ['class' => 'text-capitalize']) !!}
                                <div class="input-group">
                                    {!! Form::text('role', old('role'), ['class' => 'form-control', 'placeholder' => 'نام نقش را وارد کنید(مانند ادمین یا خبر نگار)']) !!}
                                </div>
                                @error('role')
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
                    {{-- show roles --}}

                    <div class="table-responsive">
                        <table class="table table-hover" style="margin-bottom: 15%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">نام نقش</th>
                                    <th scope="col">تاریخ ایجاد</th>
                                    <th scope="col">تاریخ آپدیت</th>
                                    <th scope="col">حذف</th>
                                    <th scope="col">آپدیت</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($roles as $role)
                                    <tr>
                                        <th scope="row">{{ $roles->firstItem() + $loop->index }}</th>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ \Verta::createTimestamp($role->created_at)->formatDifference() }}</td>
                                        @if ($role->updated_at != $role->created_at)
                                            <td>{{ \Verta::createTimestamp($role->updated_at)->formatDifference() }}
                                            </td>
                                        @else
                                            <td>
                                                <p class="text-secondary">آپدیت نشده</p>
                                            </td>
                                        @endif
                                        <td>
                                            {!! Form::open(['route' => ['role.destroy', 'id' => $role->id], 'method' => 'delete']) !!}
                                            {!! Form::submit('delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                        <td>
                                            <a href="{{ route('role.edit', ['id' => $role->id]) }}"
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
                        <span class="d-flex justify-content-center">
                            {{ $roles->links() }}
                        </span>
                    </div>
                </div>

            </div>
        </section>
    </section>
@endsection
