@extends('layouts.master')
@section('content')
    <div class="ms-lg-250">
        <section class="container">
            <div class="p-3 mb-5 bg-white rounded d-inline-block w-100 mt-5 row">
                <div class="col-12 col-sm-11 col-xl-10 mx-auto">
                    <a class="btn btn-outline-success" href="{{route('schematic.create')}}">ایجاد شماتیک</a>
                    <div class="table-responsive col-12 mx-auto mt-3">
                        {{--show roles--}}
                        <table class="table table-striped table-hover">
                            <thead class="bg-info">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">شماتیک</th>
                                <th scope="col">تاریخ ایجاد</th>
                                <th scope="col">تاریخ آپدیت</th>
                                <th scope="col">آپدیت</th>
                                <th scope="col">حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @forelse($schematics as $schematic)
                                <tr>
                                    <td>{{ $i ++ }}</td>
                                    <td>{{$schematic->schematic}}</td>
                                    <td>{{ Verta::createTimestamp($schematic->updated_at)->formatDifference() }}</td>
                                    @if ($schematic->updated_at != $schematic->created_at)
                                        <td>{{ Verta::createTimestamp($schematic->updated_at)->formatDifference() }}</td>
                                    @else
                                        <td><p class="text-secondary">آپدیت نشده</p></td>
                                    @endif
                                    <td>
                                        <a href="{{route('schematic.edit',['id'=>$schematic->id])}}"
                                           class="btn btn-warning">ویرایش</a>
                                    </td>
                                    <td>
                                        {!! Form::open(['route'=>['schematic.destroy','id'=>$schematic->id],'method'=>'delete']) !!}
                                        {!! Form::submit('حذف',['class'=>'btn btn-danger']) !!}
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
                </div>
            </div>
        </section>
    </div>
@endsection
