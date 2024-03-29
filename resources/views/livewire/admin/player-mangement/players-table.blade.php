<div>
    <div class="row">
        <div class="col-12 col-md-11 col-xl-10 mx-auto">
            <div class="container mt-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-10 col-xl-8 mx-auto">
                        <div class="card p-3  py-4">
                            <h5>جستجوی پیشرفته بازیکنان</h5>
                            <form class="row g-3 mt-2" wire:submit.prevent="searchPlayer">

                                <div class="col-md-9 mb-1">

                                    <input type="text" class="form-control" wire:model.lazy="name" placeholder="نام بازیکن را وارد کنید.">

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
                        <h3 class="card-title">جدول بازیکنان</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.players.add') }}" class="btn btn-success btn-sm mx-4 float-right d-flex align-items-center">
                            <i class="fa fa-plus ml-2"></i>
                            <span>
                                افزودن بازیکن جدید
                            </span>
                        </a>
                    </div>
                </div>
            <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                <table class="table table-striped table-hover">
                    <tr>
                    <th>شناسه</th>
                    <th>عکس</th>
                    <th>نام بازیکن</th>
                    <th>سن</th>
                    <th>ملیت</th>
                    <th>تیم</th>
                    <th>عملیات</th>
                    </tr>
                    @if( $players->count() != 0 )
                        @foreach ($players as $player)
                            <tr>
                                <td>{{ $players->firstItem() + $loop->index }}</td>
                                <td><img src="{{\Illuminate\Support\Facades\Storage::url(config('app.ftpRoute').$player->img)}}" width="40px" height="40px"/></td>
                                <td>{{ $player->full_name }}</td>
                                <td>
                                    {{
                                        \Carbon\Carbon::parse($player->birth_date)->age
                                    }}
                                </td>
                                <td>{{ $player->nationality->name }}</td>
                                <td>{{ $player->team->title }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('admin.players.edit' , ['id' => $player->id]) }}" class="btn btn-primary btn-sm mx-1">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button class="btn btn-danger btn-sm mx-1" wire:click="delete({{ $player->id }})">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </table>
                @if($players->count() != 0)
                    <div class="d-flex justify-content-center">
                        {{ $players->links('pagination::bootstrap-4') }}
                    </div>
                @endif
                @if( $players->count() == 0 )
                    <div class="alert alert-secondary mt-3 text-center w-100" role="alert">
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
