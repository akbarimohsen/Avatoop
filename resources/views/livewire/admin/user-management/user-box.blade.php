<div class="table-responsive">
    <table class="table table-striped table-hover" style="margin-bottom: 15%">
        <thead class="bg-info">
        <div class="row mr-0 ml-0">
            <div class="col-md-7">
                <div class="">
        <span class="text-bold p-3 d-inline-block">کاربران نقش <i
                class="badge p-2 badge-pill badge-primary">{{$myRole->name}}</i></span>
                </div>
            </div>
            <div class="col-md-5">
                <form class="form-inline flex-row-reverse">
                    <div class="form-group mb-2">
                        <label for="staticEmail2" class="sr-only">Email</label>
                        <input type="text" class="form-control" id="staticEmail2"
                               placeholder="جستجو در بین کاربران {{$myRole->name}}"
                               wire:model.debounce.500="searchInput">
{{--                               <input type="hidden" wire:model="{{"user".$myRole->name}}">--}}
                    </div>
                </form>
            </div>
        </div>
        <tr>
            <th scope="col">#</th>
            <th scope="col">نام کاربر</th>
            <th scope="col">ایمیل</th>
            <th scope="col">شماره تلفن</th>
            <th scope="col">عملیات</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>

                <th scope="row">{{ $users->firstItem() + $loop->index }}</th>
                <th>{{$user->username}}</th>
                <td>{{$user->email}}</td>
                <td>{{$user->phone_number}}</td>
                <td>
                    <div class="d-flex flex-row">
                    @if(\Illuminate\Support\Facades\Auth::user()->email=="www.kiavash7666@gmail.com" or $user->email!=="www.kiavash7666@gmail.com")
                        <a href="{{route('user.edit',['id'=>$user->id])}}" class="btn bg-warning ml-1 p-0">ویرایش</a>
                    @else
                        خودش باید آپدیت کنه! :)
                    @endif
                    @if($user->email=="www.kiavash7666@gmail.com")
                        ادمین اصلی پاک نمیشه :))
                    @else
                        {!! Form::open(['route'=>['user.destroy','id'=>$user->id],'method'=>'delete','onclick'=>'conform(آیا مطمئنید میخواهید این خبر را پاک کنید)']) !!}
                        {!! Form::submit('حذف',['class'=>'btn bg-danger p-0','onclick'=>'return confirm("آیا مطمئنید؟")']) !!}
                        {!! Form::close() !!}
                    @endif
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">دیتا وجود ندارد</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{ $users->links() }}
</div>
