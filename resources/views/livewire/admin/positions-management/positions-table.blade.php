<div>
    <div class="row">
        <div class="col-12">
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

                <form class="input-group input-group-sm" style="width: 250px;" wire:submit.prevent="searchPlayer">
                    <input type="text" class="form-control float-right" placeholder="جستجوی پست های بازی" wire:model="name">
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
                  <th>نام</th>
                </tr>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div><!-- /.row -->
</div>
