<div>
    <div class="row">
        <div class="col-12">
            @if( Session::has("message") )
                <div class="alert bg-info-gradient">
                    {{ Session::get('message') }}
                </div>
            @endif
            {{-- <div class="row m-4 d-flex justify-content-center">
                <div class="col-6">
                    <form class="input-group input-group-sm" wire:submit.prevent="addPosition">
                        <input type="text" class="form-control float-right" placeholder="نام پست بازی" wire:model="name">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-success">ایجاد</button>
                        </div>
                    </form>
                </div>
            </div> --}}
          <div class="card">
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
              <table class="table table-hover">
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
                                <td>{{ $ad->id }}</td>
                                <td><img src="{{\Illuminate\Support\Facades\Storage::disk('public')->url('images/ads/'.$ad->img)}}" width="40px" height="40px"/></td>
                                <td>{{ $ad->link }}</td>
                                <td>{{ $ad->cost }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('admin.ads.edit', ['id' => $ad->id]) }}" class="btn btn-primary btn-sm mx-1">
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
