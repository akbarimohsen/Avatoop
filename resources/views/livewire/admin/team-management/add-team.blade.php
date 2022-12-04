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
                <form role="form" enctype="multipart/form-data" wire:submit.prevent="submit">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">نام</label>
                            <input type="text" class="form-control" id="title" wire:model="title"
                                   placeholder="نام را وارد کنید.">
                            @error('title')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>توضیحات</label>
                            <textarea class="form-control" rows="3" wire:model="description"
                                      placeholder="توضیحات تیم ..."></textarea>
                            @error('description')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>لیگ</label>
                                    <select class="form-control" style="width: 100%;" wire:model="league_id">
                                        <option value="">انتخاب کنید</option>
                                        @foreach ($leagues as $league )
                                            <option value="{{ $league->id }}">
                                                {{ $league->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('league_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <!-- /.form-group -->

                            </div>
                            <!-- /.col -->

                            <div class="form-group">
                                <label>لوگو </label>
                                <input type="file" wire:model="logo">
                                <span class="mt-2 text-primary" wire:target="logo"
                                      wire:loading>در حال بارگذاری....</span>
                                @error('logo')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" wire:target="logo" wire:loading.remove>ارسال
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.card -->

        </div>
        <!--/.col (left) -->
    </div>

</div>
