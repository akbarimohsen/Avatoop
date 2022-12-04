<div>
    <div class="row d-flex justify-content-center">
        <!-- left column -->
        <div class="col-12 col-md-10 col-xl-8 mx-auto">
          <!-- general form elements -->
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">اطلاعات تیم</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" wire:submit.prevent="submit">
              <div class="card-body">

                <div class="form-group">
                    <label for="title">نام</label>
                    <input type="text" class="form-control" id="title" wire:model="title" placeholder="نام را وارد کنید.">
                </div>

                <div class="form-group">
                    <label>توضیحات</label>
                    <textarea class="form-control" rows="12" wire:model="description" placeholder="توضیحات تیم ..."></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>لیگ</label>
                        <select class="form-control" style="width: 100%;" wire:model="league_id">
                            @foreach ($leagues as $league )
                                <option @if($league_id == $league->id ) @endif value="{{ $league->id }}">
                                    {{ $league->title }}
                                </option>
                            @endforeach
                        </select>
                      </div>
                      <!-- /.form-group -->

                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>لوگو جدید</label>
                            <input type="file" wire:model="logo" >
                            <span class="mt-2 text-primary" wire:target="logo" wire:loading>در حال بارگذاری....</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="{{\Illuminate\Support\Facades\Storage::url(config('app.ftpRoute').$team->logo)}}" alt="" class="img img-thumbnail" width="200" height="200">
                    </div>
                </div>
              <!-- /.card-body -->

              <div class="card-footer bg-transparent">
                <button type="submit" class="btn btn-outline-success">ارسال</button>
              </div>
            </form>
          </div>
          <!-- /.card -->

        </div>
        <!--/.col (left) -->
    </div>

</div>
