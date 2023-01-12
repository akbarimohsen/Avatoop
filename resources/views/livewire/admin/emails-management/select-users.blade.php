<div>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-10 col-xl-8 mx-auto">
                <div class="card p-3  py-4">
                    <h5>جستجوی کاربران</h5>
                    <form class="row g-3 mt-2" wire:submit.prevent="searchUser">

                        <div class="col-md-9 mb-1">
                            <input type="text" class="form-control" wire:model.lazy="name" placeholder="نام کاربر را وارد کنید.">
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-info btn-block" type="submit">جستجو</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">جدول ایمیل ها</h3>
        </div>
        <!-- /.card-header -->
        <form action="{{ route('admin.emails.writeEmail') }}" method="GET">
            <div class="card-body table-responsive p-0">
                @csrf
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th><input type="checkbox" wire:model="SelectAll" id="selectAll"></th>
                            <th>نام کاربری</th>
                            <th>ایمیل</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user )
                            <tr>
                                <td><input type="checkbox" value="{{ $user->id }}" wire:model="selectedUsers" name="selectedUsers[]" id={{ "selectUsers" . $user->id }}></td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @if( $users->count() == 0 )
                <div class="alert alert-secondary m-0 text-center" role="alert">
                    هیچ موردی یافت نشد.
                </div>
            @else
                <button type="submit" class="btn btn-primary m-3">
                    ارسال ایمیل
                </button>
            @endif
            </div>
        </form>
        <!-- /.card-body -->
      </div>
</div>
