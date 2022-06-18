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
            <div class="container mt-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-10">
                        <div class="card p-3  py-4">
                            <h5>ایجاد پست جدید بازی</h5>
                            <form class="row g-3 mt-2" wire:submit.prevent="addPosition">

                                <div class="col-md-9 mb-1">

                                    <input type="text" class="form-control" wire:model.lazy="name" placeholder="عنوان پست بازی را وارد کنید">

                                </div>

                                <div class="col-md-3">

                                    <button class="btn btn-success btn-block" type="submit">ایجاد</button>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">جدول پست های بازی</h3>
              <div class="card-tools">
                {{-- <a href="{{ route('admin.players.add') }}" class="btn btn-success btn-sm mx-4 float-right d-flex align-items-center">
                    <i class="fa fa-plus ml-2"></i>
                    <span>
                         افزودن بازیکن جدید
                    </span>
                </a> --}}

                {{-- <form class="input-group input-group-sm" style="width: 250px;" wire:submit.prevent="searchPlayer">
                    <input type="text" class="form-control float-right" placeholder="جستجوی پست های بازی" wire:model="name">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </form> --}}

              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <tr>
                  <th>شناسه</th>
                  <th>نام</th>
                  <th>عملیات</th>
                </tr>

                @foreach ($positions as $position )
                    <tr>
                        <td>
                            {{ $position->id }}
                        </td>
                        <td>
                            {{ $position->name }}
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm mx-1" wire:click="delete({{ $position->id }})">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div><!-- /.row -->
</div>
