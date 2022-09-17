<section class="content-wrapper">
    <section class="container">
        <div class="shadow-sm p-3 mb-5 bg-white rounded d-inline-block w-100 mt-5 text-right">
            <div class="col-10 mx-auto">
                <div class="card">
                    <div class="card-header row">
                        <h3 class="card-title mr-0 col-6">آپدیت خبر</h3>
                        <div class="w-50 text-left">
                            <a class="btn btn-success ml-0 col-6" href="{{route('rss.index')}}">صفحه اصلی</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            {!! Form::model($rss,['route'=>['rss.update','id'=>$rss->id],'method'=>'put',"files"=>true]) !!}
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    {!! Form::label('title','عنوان خبر',['class'=>'text-capitalize']) !!}
                                    {!! Form::text('title',old('title'),['class'=>'form-control','placeholder'=>'مثلا: جنجال بازیکن B']) !!}
                                    @error('title')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    {!! Form::label('description','توضیح خبر',['class'=>'text-capitalize']) !!}
                                    {!! Form::text('description',old('description'),['class'=>'form-control','placeholder'=>'یک توضیح حداقل 70 تا 320 کاراکتری از خبر']) !!}
                                    @error('description')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('teams','انتخاب تیم های مربوط به خبر',['class'=>'text-capitalize']) !!}
                                    {!! Form::select('teams[]', $teams,$rss->teams,['class'=>'form-control select2','id'=>'category','multiple','data-placeholder'=>'انتخاب تیم های خبر']);!!}
                                    @error('teams')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('tag','انتخاب برچسب های خبر',['class'=>'text-capitalize']) !!}
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
                                    {!! Form::label('rssAudio','فایل صوتی خبر',['class'=>'text-capitalize']) !!}
                                    {!! Form::file('rssAudio',['class'=>'form-control','style'=>'border:2px inset lightgray']) !!}
                                    @error('rssAudio')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>


                                <div class="form-group col-md-6">
                                    {!! Form::label('rssImage','تصویر اصلی خبر',['class'=>'text-capitalize']) !!}
                                    {!! Form::file('rssImage',['class'=>'form-control','style'=>'border:2px inset lightgray',"wire:model='avatar'"]) !!}
                                    @error('rssImage')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6 text-center">
                                    @if($rss->rss_audio==null)
                                        <span class="d-block w-100">صوت قبلی خبر:صوتی وجود ندارد</span>
                                    @else
                                        <div class="col-8 offset-md-2">
                                            <span class="d-block">صوت قبلی خبر:</span>
                                            <audio controls class="d-flex mx-auto">
                                                <source
                                                    src="{{\Illuminate\Support\Facades\Storage::disk('public')->url('audio/rss/'.$rss->created_at->year.'/'.$rss->created_at->month.'/'.$rss->rss_audio->audio)}}">
                                            </audio>
                                        </div>
                                    @endif
                                    @if($rss->img ==null)
                                        <span class="d-block w-100">تصویر قبلی خبر:تصویری وجود ندارد</span>
                                    @else
                                        <span class="d-block">تصویر قبلی خبر:</span>
                                        <img
                                            src="{{\Illuminate\Support\Facades\Storage::disk('public')->url('rss/'.$rss->created_at->year.'/'.$rss->created_at->month.'/'.$rss->img)}}"
                                            class="img img-thumbnail" width="200" height="200" alt="">
                                    @endif
                                </div>

                                @if($avatar)
                                    <div class="col-md-6 text-center">
                                        <img src="{{$avatar->temporaryUrl()}}" alt="" class="img img-thumbnail"
                                             width="200" height="200">
                                    </div>
                                @endif
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
                                                          placeholder="متن خود را وارد کنید و از ابزار های بالا در جهت افزودن عکس و تغییر ظاهی متن استفاده کنید">{{$rss->content}}</textarea>
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
                            </div>
                            {!! Form::close() !!}
                            <section class="form-group col-12">
                                {!! Form::open(['route'=>['rss.destroy','id'=>$rss->id],'method'=>'delete',]) !!}
                                {!! Form::submit('حذف خبر',['class'=>'btn btn-danger','onclick'=>'return confirm("آیا مطمئنید؟")']) !!}
                                {!! Form::close() !!}
                                {{--<a class="btn btn-danger" href="{{route('rss.destroy',['id'=>$rss->id])}}" onclick="return confirm(گ)">حدف خبر</a>--}}
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

