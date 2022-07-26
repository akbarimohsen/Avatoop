<section class="content-wrapper">
    <section class="container">
        <div class="shadow-sm p-3 mb-5 bg-white rounded d-inline-block w-100 mt-5 text-right">
            <div class="col-10 mx-auto">
                <div class="card">
                    <div class="card-header row">
                        <h3 class="card-title mr-0 col-6">آپدیت خبر</h3>
                        <div class="w-50 text-left">
                            <button class="btn btn-success ml-0 col-6">صفحه اصلی</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            {!! Form::model($rss,['route'=>['news.update','id'=>$rss->id],'method'=>'put',"files"=>true]) !!}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    {!! Form::label('title','عنوان خبر',['class'=>'text-capitalize']) !!}
                                    {!! Form::text('title',old('first_name'),['class'=>'form-control','placeholder'=>'مثلا: جنجال بازیکن B']) !!}
                                    @error('title')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('header','سر تیتر خبر',['class'=>'text-capitalize']) !!}
                                    {!! Form::text('header',old('header'),['class'=>'form-control','placeholder'=>'مثلا:بازیکن تیم B با نام A جنجال بزرگی آفرید']) !!}
                                    @error('newsHeader')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    {!! Form::label('description','توضیح خبر',['class'=>'text-capitalize']) !!}
                                    {!! Form::text('description',old('header'),['class'=>'form-control','placeholder'=>'یک توضیح حداقل 70 تا 320 کاراکتری از خبر']) !!}
                                    @error('description')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('teams','انتخاب دسته بندی',['class'=>'text-capitalize']) !!}
                                    {!! Form::select('teams[]', $teams,$news->teams,['class'=>'form-control select2','id'=>'category','multiple','data-placeholder'=>'انتخاب تیم های خبر']);!!}
                                    @error('teams')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('tag','انتخاب دسته بندی',['class'=>'text-capitalize']) !!}
                                    {!! Form::select('tag[]', $tags,$rss->tags,['class'=>'form-control select2','id'=>'category','multiple','data-placeholder'=>'انتخاب تگ های خبر']);!!}
                                    @error('tag')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('category','انتخاب دسته بندی',['class'=>'text-capitalize']) !!}
                                    {!! Form::select('category[]', $categories,$rss->categories,['class'=>'form-control select2','id'=>'category','multiple','data-placeholder'=>'دسته بندی را وارد کنید']);!!}
                                    @error('category')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('newsImage','تصویر اصلی خبر',['class'=>'text-capitalize']) !!}
                                    {!! Form::file('newsImage',['class'=>'form-control','style'=>'border:2px inset lightgray',"wire:model='avatar'"]) !!}
                                    @error('newsImage')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6 text-center">
                                    <span>تصویر قبلی خبر:</span>
                                    <img
                                        src="{{\Illuminate\Support\Facades\Storage::disk('public')->url('news/'.$news->created_at->year.'/'.$news->created_at->month.'/'.$news->img)}}"
                                        class="img img-thumbnail" width="200" height="200" alt="">
                                </div>

                                @if($avatar)
                                    <div class="col-md-6 text-center">
                                        <img src="{{$avatar->temporaryUrl()}}" alt="" class="img img-thumbnail"
                                             width="200" height="200">
                                    </div>
                                @endif
                                <div class="form-group col-md-6">
                                    {!! Form::label('NewsDate','تاریخ خبر',['class'=>'text-capitalize']) !!}
                                    {!! Form::text('NewsDate',old('NewsDate'),['class'=>'form-control','placeholder'=>'انتخاب تاریخ',]) !!}
                                    @error('NewsDate')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-12 mt-4" wire:loading.remove>
                                    <div class="card card-info card-outline">
                                        <div class="card-header bg-white border-bottom">
                                            <h3 class="card-title">
                                                CKEditor5
                                                <small>پیشرفته به همراه همه امکانات</small>
                                            </h3>
                                            <!-- tools box -->
                                            <div class="card-tools text-left">
                                                <button type="button" class="btn btn-tool btn-sm"
                                                        data-widget="collapse"
                                                        data-toggle="tooltip"
                                                        title="Collapse">
                                                    <i class="fa fa-minus text-secondary"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool btn-sm"
                                                        data-widget="remove"
                                                        data-toggle="tooltip"
                                                        title="Remove">
                                                    <i class="fa fa-times text-secondary"></i>
                                                </button>
                                            </div>
                                            <!-- /. tools -->
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <textarea id="editor1" name="editor1"
                                                          placeholder="متن خود را وارد کنید و از ابزار های بالا در جهت افزودن عکس و تغییر ظاهی متن استفاده کنید">{{$news->body}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    @error('editor1')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <section class="form-group col-12">
                                    {!! Form::submit('ذخیره خبر',['class'=>'btn btn-primary mt-3']) !!}
                                </section>
                                <section class="form-group col-12">
                                    {!! Form::open(['route'=>['news.destroy','id'=>$news->id],'method'=>'delete',]) !!}
                                    {!! Form::submit('حذف خبر',['class'=>'btn btn-danger','onclick'=>'return confirm("آیا مطمئنید؟")']) !!}
                                    {!! Form::close() !!}
                                </section>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</section>

