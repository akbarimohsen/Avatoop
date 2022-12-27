<div>
    <div class="row">
        <div class="col-12 col-md-11 col-xl-10 mx-auto">
            @if( Session::has("message") )
                <div class="alert bg-info-gradient">
                    {{ Session::get('message') }}
                </div>
            @endif

          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">جدول تبلیغات</h3>
              <div class="card-tools">
                <a href="{{ route('admin.ads.add') }}" class="btn btn-success btn-sm mx-4 float-right d-flex align-items-center">
                    <i class="fa fa-plus ml-2"></i>
                    <span>
                         افزودن تبلیغ جدید
                    </span>
                </a>

              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>شناسه</th>
                        <th>تصویر</th>
                        <th>لینک</th>
                        <th>هزینه</th>
                        <th>
                            عملیات
                        </th>
                      </tr>
                </thead>
                <tbody>
                    @if( $ads->count() != 0 )
                        @foreach ($ads as $ad)
                            <tr>
                                <td>{{ $ads->firstItem() + $loop->index }}</td>
                                <td><img src="{{\Illuminate\Support\Facades\Storage::url(config('app.ftpRoute').$ad->img)}}" width="40px" height="40px"/></td>
                                <td>{{ $ad->link }}</td>
                                <td>{{ $ad->cost }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('admin.ads.edit', ['id' => $ad->id]) }}" class="btn btn-warning btn-sm mx-1">
                                            تغییر
                                        </a>
                                        <button class="btn btn-danger btn-sm mx-1" wire:click="delete({{ $ad->id }})" >
                                            حذف
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
              </table>
              @if($ads->count() != 0)
                <div class="d-flex justify-content-center">
                    {{ $ads->links('pagination::bootstrap-4') }}
                </div>
              @endif
              @if( $ads->count() == 0 )
                <div class="alert alert-secondary mt-3 text-center" role="alert">
                    هیچ موردی یافت نشد.
                </div>
              @endif
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div><!-- /.row -->
</div>
