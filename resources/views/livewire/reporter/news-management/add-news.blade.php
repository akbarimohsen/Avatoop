<section class="content-wrapper">
    <section class="container">
        @if(session('create'))
            <section class="alert d-inline-block w-100 alert-success alert-dismissible fade show p-3 mt-5"
                     role="alert">{{session('create')}}
                <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </section>
        @endif
        @if(session('exist'))
            <section class="alert alert-danger w-100 d-inline-block alert-dismissible fade show p-3 mt-5"
                     role="alert">{{session('exist')}}
                <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </section>
        @endif
        @if(session('delete'))
            <section class="alert alert-success w-100 d-inline-block alert-dismissible fade show p-3 mt-5"
                     role="alert">{{session('delete')}}
                <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </section>
        @endif
        @if(session('update'))
            <section class="alert alert-success w-100 d-inline-block alert-dismissible fade show p-3 mt-5"
                     role="alert">{{session('update')}}
                <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </section>
        @endif

        <div class="shadow-sm p-3 mb-5 bg-white rounded d-inline-block w-100 mt-5 text-right">
            <div class="col-12 mx-auto">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">ایجاد خبر</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            {!! Form::open(['route'=>'news.store','method'=>'post',"files"=>true]) !!}
                            @csrf
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
                                    {!! Form::text('header',old('newsHeader'),['class'=>'form-control','placeholder'=>'مثلا:بازیکن تیم B با نام A جنجال بزرگی آفرید']) !!}
                                    @error('header')
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
                                    <label for="team">انتخاب تیم های مربوط به خبر</label>
                                    <select class="form-control select2" id="team" name="team[]" multiple="multiple"
                                            data-placeholder="خبر مربوط به کدام تیمم است؟" style="width: 100%;">
                                        @forelse($teams as $team)
                                            <option value="{{$team->id}}">{{$team->title}}</option>
                                        @empty
                                            داده ای موجود نیست
                                        @endforelse
                                            <span class="mt-2 text-primary"  wire:loading>loading...</span>

                                    </select>
                                    @error('team')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tag">انتخاب برچسب ها</label>
                                    <select class="form-control select2"  id="tag" name="tag[]" multiple="multiple"
                                            data-placeholder="تگ های خبر را انتخاب کنید" style="width: 100%;">
                                        @forelse($tags as $tag)
                                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                                        @empty
                                            داده ای موجود نیست
                                        @endforelse
                                    </select>
                                    @error('tag')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    <span class="mt-2 text-primary" wire:targe="tags" wire:loading>loading...</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="category">انتخاب دسته بندی</label>
                                    <select class="form-control select2" id="category" name="category[]" multiple
                                            data-placeholder="دسته بندی را وارد کنید">
                                        @forelse($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @empty
                                            داده ای موجود نیست
                                        @endforelse
                                        <span class="mt-2 text-primary" wire:targe="categories" wire:loading>loading...</span>
                                    </select>
                                    @error('category')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('newsImage','تصویر اصلی خبر',['class'=>'text-capitalize']) !!}
                                    {!! Form::file('newsImage',['class'=>'form-control','style'=>'border:2px inset lightgray',"wire:model.debounce='avatar'"]) !!}
                                    @error('newsImage')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                @if($avatar)
                                    <div class="col-md-6 text-center">
                                        <img src="{{$avatar->temporaryUrl()}}" alt="" class="img img-thumbnail" width="200" height="200">
                                    </div>
                                @endif
                                <div class="form-group col-md-6">
                                    {!! Form::label('NewsDate','تاریخ خبر',['class'=>'text-capitalize']) !!}
                                    {!! Form::text('NewsDate',old('NewsDate'),['class'=>'form-control','placeholder'=>'انتخاب تاریخ',]) !!}
                                    @error('NewsDate')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-12" wire:loading.remove>
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
                                                              placeholder="متن خود را وارد کنید و از ابزار های بالا در جهت افزودن عکس و تغییر ظاهی متن استفاده کنید"></textarea>
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
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</section>

