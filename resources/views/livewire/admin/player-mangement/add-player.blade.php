<div>
    <div class="row d-flex justify-content-center">
        <!-- left column -->
        <div class="col-md-10">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">اطلاعات بازیکن</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" wire:submit.prevent="submit" method="POST">
              <div class="card-body">

                <div class="form-group">
                    <label for="first_name"> نام کامل</label>
                    <input type="text" class="form-control" id="first_name" wire:model="full_name" placeholder="نام را وارد کنید.">
                </div>

                <div class="form-group">
                    <label for="age">سن</label>
                    <input type="text" class="form-control" id="age" wire:model="age" placeholder="سن را وارد کنید.">
                </div>

                <div class="form-group">
                    <label>توضیحات</label>
                    <textarea class="form-control" rows="3" wire:model="description" placeholder="توضیحات بازیکن ..."></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>تیم</label>
                        <select class="form-control select2" style="width: 100%;" wire:model="team_id">
                            @foreach ($teams as $team )
                                <option value="{{ $team->id }}">
                                    {{ $team->title }}
                                </option>
                            @endforeach
                        </select>
                      </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                        <label>ملیت</label>
                        <select class="form-control select2" style="width: 100%;" wire:model="nationality_id">
                            @foreach ($nationalities as $nationality )
                                <option value="{{ $nationality->id }}"> {{ $nationality->name }} </option>
                            @endforeach
                        </select>
                      </div>
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>پست های بازی</label>
                        <select class="form-control select2" data-placeholder="یک استان انتخاب کنید" wire:model="position_id"
                                style="width: 100%;text-align: right">

                            @foreach ($positions as $position )
                                <option value="{{ $position->id }}"> {{ $position->name }} </option>
                            @endforeach
                        </select>
                      </div>
                      <!-- /.form-group -->

                    </div>
                    <!-- /.col -->
                  </div>

                  <div class="form-group">
                    <label>عکس </label>
                    <input type="file" wire:model="img" >
                  </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">ارسال</button>
              </div>
            </form>
          </div>
          <!-- /.card -->

        </div>
        <!--/.col (left) -->
    </div>
</div>
