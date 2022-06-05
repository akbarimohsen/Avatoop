<div>
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">جدول تیم ها</h3>
              <div class="card-tools">
                <a href="{{ route('admin.teams.add') }}" class="btn btn-success btn-sm mx-4 float-right d-flex align-items-center">
                    <i class="fa fa-plus ml-2"></i>
                    <span>
                         افزودن تیم جدید
                    </span>
                </a>
                <form class="input-group input-group-sm" style="width: 250px;" wire:submit.prevent="searchTeam">
                  <input type="text" wire:model="title" class="form-control float-right" placeholder="جستجوی تیم">
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </form>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <tr>
                  <th>شناسه</th>
                  <th>لوگو</th>
                  <th>نام</th>
                  <th>لیگ</th>
                  <th>عملیات</th>
                </tr>
                @if($teams->count() != 0)
                    @foreach ($teams as $team)
                        <tr>
                            <td>{{ $team->id }}</td>
                            <td><img src="{{ asset('assets/images/teams/'. $team->logo ) }}" width="40px" height="40px"/></td>
                            <td>{{ $team->title }}</td>
                            <td>{{ $team->league->title }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('admin.team.players',['id' => $team->id]) }}" class="btn btn-info btn-sm">
                                        بازیکنان
                                    </a>
                                    <a href="{{ route('admin.teams.edit', ['id' => $team->id]) }}" class="btn btn-primary btn-sm mx-1">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button class="btn btn-danger btn-sm mx-1" wire:click="delete({{ $team->id }})">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
              </table>
              @if($teams->count() == 0)
                <div class="alert alert-secondary mt-3 text-center fw-bold" role="alert">
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
