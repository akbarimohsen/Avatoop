<div>
    <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">
              @if($category == null)
                خبر های منتظر تایید
              @elseif($category == "accepted")
                خبرهای تایید شده
              @elseif($category == "rejected")
                خبر های رد شده
              @elseif($category == "deleted")
                خبر های حذف شده
              @endif
          </h3>

          <div class="card-tools">
            <form wire:submit.prevent="searchNews" class="input-group input-group-sm">
              <input type="text" class="form-control" wire:model="searchInput" placeholder="جستجو خبر">
              <div class="input-group-append">
                  <button type="submit" class="btn btn-primary">
                      <i class="fa fa-search"></i>
                  </button>
              </div>
            </form>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <div class="mailbox-controls">
                <!-- Check all button -->
                <div class="btn-group">
                    <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                    <button type="button" class="btn btn-success"><i class="fa fa-check"></i></button>
                    <button type="button" class="btn btn-warning"><i class="fa fa-close"></i></button>
                </div>
                <!-- /.btn-group -->
                <!-- /.float-right -->
          </div>
          <form class="table-responsive mailbox-messages">
            <table class="table table-hover table-striped">
                <thead>
                    <th><input type="checkbox" wire:model="selectAll"></th>
                    <th>عنوان خبر</th>
                    <th>توضیحات  مختصر</th>
                    <th>وضعیت</th>
                    <th>تاریخ ارسال</th>
                </thead>
              <tbody>
                {{-- 1 --}}
                    @if ($all_news->count() != 0 )
                        @foreach ($all_news as $news )
                            <tr>
                                <td><input type="checkbox"></td>
                                <td class="mailbox-name"><a href="#">{{ $news->title }}</a></td>
                                <td class="mailbox-subject">
                                    {{ $news->header }}
                                </td>
                                <td class="">
                                    @if($news->status == null)
                                        <span class="badge bg-secondary p-1">منتظر تایید</span>
                                    @elseif($news->status == "accepted")
                                        <span class="badge bg-success p-1">تایید شد</span>
                                    @elseif($news->status == "rejected")
                                        <span class="badge bg-warning p-1">رد شد</span>
                                    @elseif($news->status == "deleted")
                                        <span class="badge bg-danger p-1">حذف شد</span>
                                    @endif
                                </td>
                                <td class="mailbox-date">5 دقیقه قبل</td>
                            </tr>
                        @endforeach
                    @endif
              </tbody>
            </table>
            @if($all_news->count() == 0)
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
