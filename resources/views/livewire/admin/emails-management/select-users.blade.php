<div>
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
