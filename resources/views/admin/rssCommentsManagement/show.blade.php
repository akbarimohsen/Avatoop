@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>نظر شماره {{ $comment->id }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">خانه</a></li>
              <li class="breadcrumb-item">نظرات</li>
              <li class="breadcrumb-item active">{{ $comment->id }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">

                <h3 class="profile-username text-center">
                    {{ $comment->user->username }}
                </h3>

                {{-- <p class="text-muted text-center">مهندس نرم افزار</p> --}}

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <strong> تاریخ ارسال</strong>

                        <p class="text-muted mt-2">
                            {{ $comment->created_at }}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <strong>وضعیت</strong>

                        <p class="text-muted mt-2">
                            @if($comment->status == 0)
                                        <span class="badge bg-secondary p-1">منتظر تایید</span>
                                    @elseif($comment->status == 1)
                                        <span class="badge bg-success p-1">تایید شد</span>
                                    @elseif($comment->status == -1)
                                        <span class="badge bg-warning p-1">رد شد</span>
                                    @elseif($comment->status == -2)
                                        <span class="badge bg-danger p-1">حذف شد</span>
                            @endif
                        </p>
                    </li>

                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                @livewire('admin.rss-comments-management.comment-box', ['comment' => $comment])
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection


