<div>
    <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">
              @if($category == null)
              نظرات منتظر تایید
              @elseif($category == "accepted")
              نظرات تایید شده
              @elseif($category == "rejected")
              نظرات رد شده
              @elseif($category == "deleted")
              نظرات حذف شده
              @endif
          </h3>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <form class="table-responsive mailbox-messages">
            <table class="table table-hover table-striped">
                <thead>
                    <th>#</th>
                    <th>عنوان نظر</th>
                    <th>نام فرستنده</th>
                    <th>وضعیت</th>
                    <th>تاریخ ارسال</th>
                    <th>عملیات</th>
                </thead>
              <tbody>
                {{-- 1 --}}
                    @if ($comments->count() != 0)
                        @foreach($comments as $comment )
                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td class="mailbox-name"><a href="#">{{ $comment->title }}</a></td>
                                <td class="mailbox-subject">
                                    {{ $comment->user->first_name }} {{ $comment->user->last_name }}
                                </td>
                                <td class="">
                                    @if($comment->status == 0)
                                        <span class="badge bg-secondary p-1">منتظر تایید</span>
                                    @elseif($comment->status == 1)
                                        <span class="badge bg-success p-1">تایید شد</span>
                                    @elseif($comment->status == -1)
                                        <span class="badge bg-warning p-1">رد شد</span>
                                    @elseif($comment->status == -2)
                                        <span class="badge bg-danger p-1">حذف شد</span>
                                    @endif
                                </td>
                                <td class="mailbox-date">
                                    {{ Verta::createTimestamp($comment->created_at)->formatDifference() }}
                                </td>
                                <td>
                                    <a href="{{ route('admin.comments.show', ['id' => $comment->id]) }}" class="btn btn-sm btn-primary">مشاهده</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
              </tbody>
            </table>
            @if($comments->count() == 0)
                <div class="alert alert-info mx-1 mt-1">
                    هیچ خبری وجود ندارد.
                </div>
            @endif
            <!-- /.table -->
        </form>
          <!-- /.mail-box-messages -->
        </div>
        <!-- /.card-body -->
      </div>


</div>
