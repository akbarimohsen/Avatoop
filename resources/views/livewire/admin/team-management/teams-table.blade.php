<div>
    <div class="row">
        <div class="col-12">
            <div class="container mt-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-10">
                            <div class="card p-3  py-4">
                                <h5>جستجوی پیشرفته تیم ها</h5>
                                <form class="row g-3 mt-2" wire:submit.prevent="searchTeam">

                                    <div class="col-md-9 mb-1">

                                        <input type="text" class="form-control" wire:model.lazy="title" placeholder="نام تیم را وارد کنید.">

                                    </div>

                                    <div class="col-md-3">

                                        <button class="btn btn-primary btn-block" type="submit">جستجو</button>

                                    </div>

                                </form>
                                <hr>
                                <div class="row m-1 mt-3 d-flex justify-content-center">
                                    <div class="col-md-6">
                                        <h5>تیم جدید خود را اضافه کنید : </h5>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.teams.add') }}" class="btn btn-success w-100">افزودن تیم جدید</a>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
          <div class="card">
            <div class="card-header">
                <h3 class="card-title">جدول تیم ها</h3>

                <div class="card-tools">
                  <form wire:submit.prevent="sortTeams"  class="input-group input-group-sm" style="width: 200px;" >
                    <select class="form-control float-right" wire:model="sorting_type">
                        <option value="" selected>مرتب سازی بر اساس</option>
                        <option value="like">محبوبیت</option>
                        <option value="views">تعداد بازدید</option>
                    </select>
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fa fa-sort"></i></button>
                    </div>
                </form>
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
                    @php($i = 1)
                    @foreach ($teams as $team)
                        <tr>
                            <td>{{ $i ++ }}</td>
                            <td><img src="{{\Illuminate\Support\Facades\Storage::url(config('app.ftpRoute').$team->logo)}}" width="40px" height="40px"/></td>
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
