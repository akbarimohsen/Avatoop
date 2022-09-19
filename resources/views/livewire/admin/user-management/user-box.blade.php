<div class="table-responsive">
    <table class="table table-hover" style="margin-bottom: 15%">
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
            <th scope="col">آپدیت</th>
            <th scope="col">حذف</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>

                <th scope="row">{{$user->id}}</th>
                <th>{{$user->username}}</th>
                <td>{{$user->email}}</td>
                <td>{{$user->phone_number}}</td>
                <td>
                    {!! Form::open(['route'=>['user.destroy','id'=>$user->id],'method'=>'delete','onclick'=>'conform(آیا مطمئنید میخواهید این خبر را پاک کنید)']) !!}
                    {!! Form::submit('delete',['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
                <td>
                    <a href="{{route('user.edit',['id'=>$user->id])}}" class="btn btn-warning">update</a>
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
