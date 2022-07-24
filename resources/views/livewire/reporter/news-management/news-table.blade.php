<section class="content-wrapper text-right">
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
            <div class="row mr-0 ml-0">
                <div class="col-md-8">
                    <form wire:submit.prevent="search" class="form-inline flex-row-reverse row mr-0 ml-0">
                        <div class="form-group mb-2 col-md-9">
                            <label for="staticEmail2" class="sr-only">Email</label>
                            <input type="text" class="form-control w-100" wire:model="searchTerm" id="staticEmail2"
                                   placeholder="جستجو در خبر ها">
                        </div>
                        <div class="form-group mb-2 col-md-3">
                            <input type="submit" class="btn btn-primary" value="جستجو">
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover" style="margin-bottom: 15%">
                    <thead class="bg-info">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">عنوان خبر</th>
                        <th scope="col">سرتیتر</th>
                        <th scope="col">توضیحات</th>
                        <th scope="col">تاریخ خبر</th>
                        <th scope="col">آپدیت</th>
                        <th scope="col">حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($news as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <th>{{$item->title}}</th>
                            <td>{{$item->header}}</td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->NewsDate}}</td>

                            <td>
                                {!! Form::open(['route'=>['news.destroy','id'=>$item->id],'method'=>'delete',]) !!}
                                {!! Form::submit('delete',['class'=>'btn btn-danger','onclick'=>'return confirm("آیا مطمئنید؟")']) !!}
                                {!! Form::close() !!}
                            </td>
                            <td>
                                <a href="{{route('news.edit',['id'=>$item->id])}}" class="btn btn-warning">update</a>
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
            <div class="w-100">
                <div class="d-flex mt-3 justify-content-sm-center">{{$news->links()}}</div>
            </div>
        </div>
    </section>
</section>
