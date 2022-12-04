@extends('layouts.master')
@section('content')
    <div class="ms-lg-250">
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
        <div class="row p-3 mb-5 bg-white rounded w-100">
            <div class="col-12 col-md-11 col-xl-10 mx-auto">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" style="margin-bottom: 15%">
                        <thead class="bg-info">
                        <div class="row mr-0 ml-0">
                            <div class="col-md-8 offset-md-2">
                                <form class="form-inline flex-row-reverse">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group mb-2">
                                                <label for="search-rss" class="sr-only">Email</label>
                                                <input type="text" class="form-control" name="search-rss" id="search-rss"
                                                       placeholder="جستجو در بین خبر های rss">
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-outline-primary mb-2">جستجو</button>
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
                            <th scope="col">بروزرسانی</th>
                            <th scope="col">حذف</th>

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
                                    <a href="{{route('rss.edit',['id'=>$Rss->id])}}"
                                       class="btn btn-warning">ویرایش</a>
                                </td>
                                <td>
                                    {!! Form::open(['route'=>['rss.destroy','id'=>$Rss->id],'method'=>'delete']) !!}
                                    {!! Form::submit('حذف',['class'=>'btn btn-danger','onclick'=>'return confirm("آیا مطمئنید؟")']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">دیتا وجود ندارد</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $Rsses->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
