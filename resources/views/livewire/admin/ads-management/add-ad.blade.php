<div>
    <div class="row d-flex justify-content-center">
        <!-- left column -->
        <div class="col-12 col-md-10 col-xl-8 mx-auto">
          <!-- general form elements -->
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">اطلاعات تبلیغ</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" wire:submit.prevent="submit" method="POST">
              <div class="card-body">

                <div class="form-group">
                    <label for="link"> لینک تبلیغ </label>
                    <input type="text" class="form-control" id="link" wire:model="link" placeholder="لینک تبلیغ را وارد کنید.">
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
                    <input type="text" class="form-control" id="cost" wire:model="cost" placeholder="هزینه را وارد کنید.">

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

                <div class="form-group mt-1">
                    <label>عکس یا گیف :  </label>
                    <input type="file" wire:model="img" >
                    <span class="mt-2 text-primary" wire:target="img" wire:loading>در حال بارگذاری....</span>

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
              <div class="card-footer bg-transparent">
                <button type="submit" class="btn btn-outline-success">ارسال</button>
              </div>
              </div>
            </form>
          </div>
          <!-- /.card -->

        </div>
        <!--/.col (left) -->
    </div>
</div>
