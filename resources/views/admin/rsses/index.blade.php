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
            <div class="shadow-sm p-3 mb-5 bg-white rounded w-100 mt-5">
                <div class="table-responsive">
                    <table class="table table-hover" style="margin-bottom: 15%">
                        <thead class="bg-info">
                        <div class="row mr-0 ml-0">
                            <div class="col-md-8 offset-md-2">
                                <form class="form-inline flex-row-reverse">
                                    <div class="row">
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-primary mb-2">جستجو</button>
                                        </div>
                                        <div class="col">
                                            <div class="form-group mb-2">
                                                <label for="search-rss" class="sr-only">Email</label>
                                                <input type="text" class="form-control" name="search-rss" id="search-rss"
                                                       placeholder="جستجو در بین خبر های rss">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">عنوان خبر</th>
                            <th scope="col">توضیحات خبر</th>
                            <th scope="col">تاریخ خبر</th>
                            <th scope="col">وضعیت خبر</th>
                            <th scope="col">حذف</th>
                            <th scope="col">بروزرسانی</th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse($Rsses as $Rss)
                            <tr>
                                <th scope="row">{{ $Rsses->firstItem() + $loop->index }}</th>
                                <th>{{$Rss->title}}</th>
                                <td>{{$Rss->description}}</td>
                                <td>{{$Rss->news_date}}</td>
                                @if($Rss->active==false)
                                    <td>
                                        <a href="{{route('rss.edit',['id'=>$Rss->id])}}"
                                           class="btn btn-outline-success">تایید نشده</a>
                                    </td>
                                @else
                                    <td>
                                        <button class="btn btn-success">تایید شده</button>
                                    </td>
                                @endif
                                    <td>
                                        {!! Form::open(['route'=>['rss.destroy','id'=>$Rss->id],'method'=>'delete']) !!}
                                        {!! Form::submit('delete',['class'=>'btn btn-danger','onclick'=>'return confirm("آیا مطمئنید؟")']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        <a href="{{route('rss.edit',['id'=>$Rss->id])}}"
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
                    {{ $Rsses->links() }}
                </div>
            </div>
        </section>
    </section>
@endsection
