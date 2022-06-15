<div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
          <tr>
            <th>کاربر</th>
            <th>تاریخ</th>
            <th>وضعیت</th>
            <th>عملیات</th>
          </tr>

          @foreach( $suggests as $suggest )
              <tr>
                  <th>
                      {{ $suggest->first_name }} {{ $suggest->last_name }}
                  </th>
                  <th>
                      {{ Hekmatinasser\Verta\Facades\Verta::instance($suggest->created_at )->format('Y-n-j H:i')}}
                  </th>
                  <th>
                      @if($suggest->status == 0)
                          <span class="badge bg-warning">در حال بررسی</span>
                      @elseif( $suggest->status == -1 )
                          <span class="badge bg-danger">رد شده</span>
                      @elseif( $suggest->status == 1 )
                          <span class="badge bg-success">تایید شده</span>
                      @endif
                  </th>
                  <th>
                      <a href="{{ route('admin.suggests.show',['id' => $suggest->id]) }}" class="btn btn-sm btn-primary" >
                          مشاهده پیشنهاد
                      </a>
                      @if($suggest->status == 0)
                          <button class="btn btn-success btn-sm" wire:click="accept({{ $suggest->id }})">
                              تایید
                          </button>
                          <button class="btn btn-danger btn-sm" wire:click="reject({{ $suggest->id }})">
                              رد
                          </button>
                      @endif
                  </th>
              </tr>
          @endforeach

        </table>
      </div>
</div>
