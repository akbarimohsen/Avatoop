@extends('layouts.master')
@section('content')
    <section class="content-wrapper">
        <section class="container">
            <div class="shadow-sm p-3 mb-5 bg-white rounded d-inline-block w-100 mt-5">

                <div class="table-responsive col-12 mx-auto mt-3">
                    {{--show roles--}}
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="cosl">#</th>
                            <th scope="col">شماتیک</th>
                            <th scope="col">تاریخ ایجاد</th>
                            <th scope="col">تاریخ آپدیت</th>
                            <th scope="col">حذف</th>
                            <th scope="col">آپدیت</th>
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
                                    {!! Form::open(['route'=>['schematic.destroy','id'=>$schematic->id],'method'=>'delete']) !!}
                                    {!! Form::submit('delete',['class'=>'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    <a href="{{route('schematic.edit',['id'=>$schematic->id])}}"
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
            </div>
        </section>
    </section>
@endsection
