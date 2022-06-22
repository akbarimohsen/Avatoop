<div>
    <div class="row">

        <div class="col-md-12">
            <div class="card">
            {{-- <div class="card-header p-2">
                <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">پیشنهاد</a></li>
                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">مشخصات فرستنده</a></li>
                </ul>
            </div><!-- /.card-header --> --}}
            <div class="card-body">
                <div class="tab-content">
                <div class="active tab-pane" id="activity">


                    <!-- Post -->
                    <div class="post clearfix">
                    <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ asset('assets/admin/dist/img/avatar5.png') }}">
                            <span class="username">
                                <a href="#">{{ $suggest->first_name }} {{ $suggest->last_name }}</a>
                                {{-- <a href="#" class="float-left btn-tool"><i class="fa fa-times"></i></a> --}}
                            </span>
                        <span class="description">{{ $suggest->created_at }}</span>
                    </div>
                    <!-- /.user-block -->
                        <p>
                            {{ $suggest->description }}
                        </p>
                        <hr>
                        @if($suggest->response)
                            <p style="font-weight: bold;">
                                آخرین پاسخ ارسالی شما :
                            </p>
                            <div class="alert alert-info">
                                {{ $suggest->response }}
                            </div>
                        @else
                            <form class="form-horizontal" wire:submit.prevent="sendResponse">
                                <div class="input-group input-group-sm ">
                                <textarea class="form-control form-control-sm" wire:model="response" placeholder="پاسخ خود را تایپ کنید" rows="5"></textarea>
                                </div>
                                <div class="input-group input-group-sm mt-3">
                                    <button type="submit" class="btn btn-success btn-sm">
                                        ارسال
                                    </button>
                                </div>
                            </form>
                        @endif
                    </div>
                    <!-- /.post -->
                </div>
                <!-- /.tab-pane -->


                <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->

    </div>
</div>
