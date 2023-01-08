<div>
    <div class="row d-flex justify-content-center">
        <!-- left column -->
        <div class="col-12 col-md-10 col-xl-8 mx-auto">
          <!-- general form elements -->
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">اطلاعات بازیکن</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('admin.players.store') }}" enctype="multipart/form-data" >
              @csrf
              <div class="card-body">

                <div class="form-group">
                    <label for="first_name"> نام کامل</label>
                    <input type="text" class="form-control" id="first_name" name="full_name" placeholder="نام را وارد کنید.">
                    @if($errors->has('full_name'))
                        <ul class="mt-1 mr-4">
                            @foreach ($errors->get('full_name') as $error )
                                <li class="text-danger">
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div class="form-group">
                    <label for="age">تاریخ تولد به میلادی</label>
                    <input type="text" id="player_birthDate" class="form-control" name="birth_date" placeholder="تاریخ تولد را وارد کنید.">

                    @if($errors->has('birth_date'))
                        <ul class="mt-1 mr-4">
                            @foreach ($errors->get('birth_date') as $error )
                                <li class="text-danger">
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    @endif

                </div>

                <div class="form-group">
                    <label>توضیحات</label>
                    <textarea class="form-control" rows="10" name="description" placeholder="توضیحات بازیکن ..."></textarea>

                    @if($errors->has('description'))
                        <ul class="mt-1 mr-4">
                            @foreach ($errors->get('description') as $error )
                                <li class="text-danger">
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    @endif

                </div>

                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>تیم</label>
                        <select class="form-control select2" style="width: 100%;" name="team_id">
                            <option value="">انتخاب کنید</option>
                            @foreach ($teams as $team )
                                <option value="{{ $team->id }}">
                                    {{ $team->title }}
                                </option>
                            @endforeach
                        </select>

                        @if($errors->has('team_id'))
                            <ul class="mt-1 mr-4">
                                @foreach ($errors->get('team_id') as $error )
                                    <li class="text-danger">
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                      </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                        <label>ملیت</label>
                        <select class="form-control select2" style="width: 100%;" name="nationality_id">
                            <option value="">انتخاب کنید</option>
                        @foreach ($nationalities as $nationality )
                                <option value="{{ $nationality->id }}"> {{ $nationality->name }} </option>
                            @endforeach
                        </select>

                        @if($errors->has('nationality_id'))
                            <ul class="mt-1 mr-4">
                                @foreach ($errors->get('nationality_id') as $error )
                                    <li class="text-danger">
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                      </div>
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>پست های بازی</label>
                        <select class="form-control select2" data-placeholder="یک استان انتخاب کنید" name="position_ids[]"
                                style="width: 100%;text-align: right" multiple>
                            <option value="">انتخاب کنید</option>
                            @foreach ($positions as $position )
                                <option value="{{ $position->id }}"> {{ $position->name }} </option>
                            @endforeach
                        </select>

                        @if($errors->has('position_id'))
                            <ul class="mt-1 mr-4">
                                @foreach ($errors->get('position_id') as $error )
                                    <li class="text-danger">
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                      </div>
                      <!-- /.form-group -->

                    </div>
                    <!-- /.col -->
                  </div>

                  <div class="form-group">
                    <label>عکس </label>
                    <input type="file" name="img" >
                    <span class="mt-2 text-primary" wire:target="img" wire:loading>در حال بارگذاری...</span>
                    @if($errors->has('img'))
                        <ul class="mt-1 mr-4">
                            @foreach ($errors->get('img') as $error )
                                <li class="text-danger">
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
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
