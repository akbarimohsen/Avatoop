<div>
    <div class="row d-flex justify-content-center">
        <!-- left column -->
        <div class="col-md-10">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">اطلاعات تبلیغ</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" wire:submit.prevent="submit" method="POST">
            <!-- general form elements -->
            <div class="card card-primary">
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" wire:submit.prevent="submit" method="POST">
                        <div class="form-group">
                            <label for="link"> لینک تبلیغ </label>
                            <input type="text" class="form-control" id="link" wire:model="link"
                                   placeholder="لینک تبلیغ را وارد کنید.">
                            @if($errors->has('link'))
                                <ul class="mt-1 mr-4">
                                    @foreach ($errors->get('link') as $error )
                                        <li class="text-danger">
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="cost">هزینه</label>
                            <input type="text" class="form-control" wire:model="cost" placeholder="هزینه را وارد کنید.">
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mt-1">
                                    <label>عکس یا گیف :  </label>
                                    <input type="file" wire:model="img" >
                                    <span class="mt-2 text-primary" wire:target="img" wire:loading>در حال بارگذاری...</span>

                                    @if($errors->has('cost'))
                                        <ul class="mt-1 mr-4">
                                            @foreach ($errors->get('cost') as $error )
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
                                    <label>تصویر قبلی تبلیغ</label>
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url(config('app.ftpRoute'). $ad->img) }}" class="img-circle" width="100" height="100" alt="">
                                </div>
                            </div>
                        </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">ارسال</button>
                    </div>
                </form>
        </div>

        </div>
        <!--/.col (left) -->
    </div>
</div>
