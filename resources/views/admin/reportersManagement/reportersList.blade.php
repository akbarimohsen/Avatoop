@extends('layouts.master')

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
            @if($reporters->count() != 0)
                <div class="table-responsive">
                    <table class="table table-hover" style="margin-bottom: 15%">
                        <thead class="bg-info">
                            <div class="row mr-0 ml-0">
                                <div class="col-md-7">
                                    <div class="">
                                        <span class="text-bold p-3 d-inline-block">لیست خبرنگاران
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    {{-- <form class="form-inline flex-row-reverse">
                                        <div class="form-group mb-2">
                                            <label for="staticEmail2" class="sr-only">Email</label>
                                            <input type="text" class="form-control" id="staticEmail2"
                                                placeholder="جستجو در بین کاربران {{$myRole->name}}"
                                                wire:model.debounce.500="searchInput">
                                        </div>
                                    </form> --}}
                                </div>
                            </div>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نام خبرنگار</th>
                                <th scope="col">نام خانوادگی</th>
                                <th scope="col">نام کاربری</th>
                                <th scope="col">ایمیل</th>
                                <th scope="col">شماره تلفن</th>
                                <th scope="col">آپدیت</th>
                                <th scope="col">حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @forelse($reporters as $reporter)
                            <tr>
                                <th scope="row">{{ $i ++ }}</th>
                                <th>{{$reporter->first_name}}</th>
                                <td>{{$reporter->last_name}}</td>
                                <td>{{$reporter->user_name}}</td>
                                <td>{{$reporter->email}}</td>
                                <td>{{$reporter->phone_number}}</td>
                                <td>
                                    {!! Form::open(['route'=>['user.destroy','id'=>$reporter->id],'method'=>'delete']) !!}
                                    {!! Form::submit('delete',['class'=>'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    <a href="{{route('user.edit',['id'=>$reporter->id])}}" class="btn btn-warning">update</a>
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
            @else
                <tr>
                    <td colspan="5">دیتا وجود ندارد</td>
                </tr>
            @endif
        </div>
    </section>
</section>

@endsection
