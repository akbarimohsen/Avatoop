<div>
    <div class="row d-flex justify-content-center">
        <!-- left column -->
        <div class="col-md-10">
          <!-- general form elements -->
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">اطلاعات تیم</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            @if($leagues->count() != 0)
                <form role="form" wire:submit.prevent="submit">
                    <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label> لیگ
                            </label>
                            <select class="form-control " style="width: 100%;" wire:model="league_id">
                                <option value="">
                                    لیگ مورد نظر خود را انتخاب کنید.
                                </option>
                                @foreach ($leagues as $league )
                                    <option value="{{ $league->id }}">
                                        {{ $league->title }}
                                    </option>
                                @endforeach
                            </select>
                            </div>
                            <!-- /.form-group -->

                        </div>
                        <!-- /.col -->

                        @if ($teams != null)
                            <div class="col-md-6">
                                <div class="form-group">
                                <label> تیم</label>
                                <select class="form-control " style="width: 100%;" wire:model="team_id">
                                    <option value="">
                                        تیم مورد نظر خود را انتخاب کنید.
                                    </option>
                                    @foreach ($teams as $team )
                                        <option  value="{{ $team->id }}">
                                            {{ $team->title }}
                                        </option>
                                    @endforeach
                                </select>
                                </div>
                                <!-- /.form-group -->

                            </div>
                        @endif
                            <!-- /.col -->
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">ثبت</button>
                        </div>
                    </div>
                    <!-- /.card-body -->

                </form>
            @else
                <div class="row mt-5 mx-4">
                    <div class="col-12">
                        <div class="alert alert-info d-flex justify-content-between">
                            <p>تمام لیگ ها پر شده اند.</p>
                            <a href="{{ route('user.popularTeams') }}" class="btn btn-primary btn-sm">بازگشت</a>
                        </div>
                    </div>
                    </div>
                </div>
            @endif
          </div>
          <!-- /.card -->

        </div>
        <!--/.col (left) -->
    </div>
</div>
