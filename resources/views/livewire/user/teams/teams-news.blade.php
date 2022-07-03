<div>
    <div class="row">
        <div class="col-12">
            {{-- <div class="container mt-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-10">
                        <div class="card p-3  py-4">
                            <h5>جستجوی پیشرفته بازیکنان</h5>
                            <form class="row g-3 mt-2" wire:submit.prevent="searchTeam">

                                <div class="col-md-9 mb-1">

                                    <input type="text" class="form-control" wire:model.lazy="title" placeholder="نام تیم را وارد کنید.">

                                </div>

                                <div class="col-md-3">

                                    <button class="btn btn-primary btn-block" type="submit">جستجو</button>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}
          <div class="card">
            <div class="card-header">
                <h3 class="card-title">جدول خبرها</h3>

                <div class="card-tools">
                    <form wire:submit.prevent="selectTeam" class="input-group input-group-sm" >
                        <select wire:model="team_id" style="width: 100px;">
                            @foreach ($teams as $team )
                                <option value="{{ $team->id }}">{{ $team->title }}</option>
                            @endforeach
                        </select>
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
                  <th>عنوان</th>
                  <th>تعداد بازدید</th>
                  <th>عملیات</th>
                </tr>
                @if($selectedTeam->news->count() != 0)
                    @foreach ($selectedTeam->news()->orderBy('created_at')->get() as $n)
                        <tr>
                            <td>{{ $n->id }}</td>
                            <td>{{ $n->title }}</td>
                            <td>{{ $n->views_count }}</td>
                            <td>
                                @if( Auth::user()->audioNews()->where('news_id', $n->id)->first() )
                                    <span class="badge bg-success p-1">به لیست پخش اضافه گردید.</span>
                                @else
                                    <button class="btn btn-primary btn-sm" wire:click="addToAudioList({{ $n->id }})">
                                        افزودن به لیست پخش
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div><!-- /.row -->
</div>
