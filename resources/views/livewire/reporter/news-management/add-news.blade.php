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
            <div class="col-10 mx-auto">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">ایجاد خبر</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            {!! Form::open(['route'=>'news.store','method'=>'post',"files"=>true]) !!}
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
                                    @error('header')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('NewsDate','تاریخ خبر',['class'=>'text-capitalize']) !!}
                                    {!! Form::text('NewsDate',old('NewsDate'),['class'=>'form-control','placeholder'=>'انتخاب تاریخ']) !!}
                                    @error('NewsDate')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="category">انتخاب دسته بندی</label>
                                    <select class="form-control select2" id="category" multiple="multiple"
                                            data-placeholder="یک استان انتخاب کنید" style="width: 100%;">
                                        @forelse($teams as $team)
                                            <option value="{{$team->id}}">{{$team->name}}</option>
                                        @empty
                                            داده ای موجود نیست
                                        @endforelse
                                            <span class="mt-2 text-primary" wire:targe="teams" wire:loading>loading...</span>

                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="category">انتخاب برچسب ها</label>
                                    <select class="form-control select2" id="category" multiple="multiple"
                                            data-placeholder="یک استان انتخاب کنید" style="width: 100%;">
                                        @forelse($tags as $tag)
                                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                                        @empty
                                            داده ای موجود نیست
                                        @endforelse
                                    </select>
                                    <span class="mt-2 text-primary" wire:targe="tags" wire:loading>loading...</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="category">انتخاب دسته بندی تیم خاص</label>
                                    <select class="form-control select2" id="category" multiple="multiple"
                                            data-placeholder="یک استان انتخاب کنید" style="width: 100%;">
                                        @forelse($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @empty
                                            داده ای موجود نیست
                                        @endforelse
                                        <span class="mt-2 text-primary" wire:targe="categories" wire:loading>loading...</span>

                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('image','تصویر اصلی خبر',['class'=>'text-capitalize']) !!}
                                    {!! Form::file('image',['class'=>'form-control','style'=>'border:2px inset lightgray',"wire:model='photo'"]) !!}
                                    @error('photo')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                @if($photo)
                                    <div class="col-md-6 text-center">
                                        <img src="{{$photo->temporaryUrl()}}" alt="" class="img img-thumbnail" width="200" height="200">
                                    </div>
                                @endif
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
                                                    <textarea id="editor1" name="editor1" style="width: 100%"
                                                              placeholder="متن خود را وارد کنید و از ابزار های بالا در جهت افزودن عکس و تغییر ظاهی متن استفاده کنید"></textarea>
                                            </div>
                                        </div>
                                    </div>
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

