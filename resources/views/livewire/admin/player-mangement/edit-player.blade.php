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
            <form role="form" method="POST" action="{{ route('admin.players.update', ['id' => $player->id]) }}" enctype="multipart/form-data" >
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="first_name"> نام کامل</label>
                        <input type="text" class="form-control" id="first_name" name="full_name" value="{{ $full_name }}" placeholder="نام را وارد کنید.">
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
                        {!! Form::label('birth_date','تاریخ تولد به میلادی',['class'=>' text-capitalize']) !!}
                        {!! Form::text('birth_date',old('birth_date'),['class'=>'form-control','placeholder'=>'انتخاب تاریخ',]) !!}
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
                        <textarea class="form-control" rows="3" name="description" placeholder="توضیحات بازیکن ...">{{ $description }}</textarea>

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
                                    <option value="{{ $team->id }}" @if($team->id == $player->team->id) selected @endif>
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
                                    <option value="{{ $nationality->id }}" @if($nationality->id == $player->nationality->id) selected @endif> {{ $nationality->name }} </option>
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
                            <select class="form-control select2" data-placeholder="یک استان انتخاب کنید" name="position_id"
                                    style="width: 100%;text-align: right">
                                <option value="">انتخاب کنید</option>
                                @foreach ($positions as $position )
                                    <option value="{{ $position->id }}" @if($player->position_id == $position->id) selected @endif> {{ $position->name }} </option>
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


                      <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>عکس </label>
                                <input type="file" name="img" >

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
                        <div class="col-6">
                            <div class="form-group">
                                <label>تصویر بازیکن</label>
                                <img src="{{ \Illuminate\Support\Facades\Storage::url(config('app.ftpRoute'). $player->img) }}" class="img-circle" width="100" height="100" alt="">
                            </div>
                        </div>
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
