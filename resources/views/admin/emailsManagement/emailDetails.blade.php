@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
             <h1> ایمیل {{ $email->title }} </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">خانه</a></li>
              <li class="breadcrumb-item">مدیریت ایمیل های گروهی</li>
              <li class="breadcrumb-item">جزییات ایمیل</li>
              <li class="breadcrumb-item">{{ $email->title }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <div class="col-12">
                @if( Session::has("message") )
                    <div class="alert bg-info-gradient">
                        {{ Session::get('message') }}
                    </div>
                @endif

                <form action="{{ route("admin.emails.sendEmail") }}" method="POST">
                    @csrf
                    <div class="container mt-3 mx-1 p-4 bg-white shadow-lg rounded">
                            <div class="mb-3">
                                <h5>محتوای ایمیل</h5>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">عنوان ایمیل</label>
                                <input class="form-control" name="title" id="title" value="{{ $email->title }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="text" class="form-label">محتوای ایمیل</label>
                                <textarea class="form-control" name="text" id="text" rows="4" placeholder="{{ $email->text }}" disabled></textarea>
                            </div>
                    </div>

                    <div class="card mt-3 mx-1">
                        <div class="card-header">
                        <h3 class="card-title">جدول کاربران انتخابی</h3>
                        </div>
                        <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>نام و نام خانوادگی</th>
                                            <th>نام کاربری</th>
                                            <th>ایمیل</th>
                                        </tr>
                                    </thead>

                                    <?php $counter = 1 ?>

                                    <tbody>
                                        @foreach ($users as $user )
                                            <tr>
                                                <td>{{ $counter }}</td>
                                                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                                <td>{{ $user->user_name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <input type="hidden" id={{ "user" . $user->id }} name="selectedUsers[]" value="{{ $user->id }}">
                                                <?php $counter = $counter + 1 ?>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            @if( $users->count() == 0 )
                                <div class="alert alert-secondary mt-3 text-center" role="alert">
                                    هیچ موردی یافت نشد.
                                </div>
                            @endif
                            </div>
                        <!-- /.card-body -->
                    </div>
                </form>
              <!-- /.card -->
            </div>
          </div><!-- /.row -->
        <!-- /.row (main row) -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
