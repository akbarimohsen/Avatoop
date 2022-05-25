<div>
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">جدول بازیکنان</h3>
              <div class="card-tools">
                <a href="{{ route('admin.players.add') }}" class="btn btn-success btn-sm mx-4 float-right d-flex align-items-center">
                    <i class="fa fa-plus ml-2"></i>
                    <span>
                         افزودن بازیکن جدید
                    </span>
                </a>

                <form class="input-group input-group-sm" style="width: 250px;" wire:submit.prevent="searchPlayer">
                    <input type="text" class="form-control float-right" placeholder="جستجوی بازیکن" wire:model="name">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </form>

              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
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
                            <td>{{ $player->id }}</td>
                            <td><img src="{{ asset('assets/images/players/'. $player->img ) }}" width="40px" height="40px"/></td>
                            <td>{{ $player->full_name }}</td>
                            <td>{{ $player->age }}</td>
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
              @if( $players->count() == 0 )
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
