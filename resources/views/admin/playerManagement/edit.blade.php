@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">تغییر اطلاعات بازیکن</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">خانه</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.players') }}">مدیریت بازیکنان</a></li>
              <li class="breadcrumb-item">تغییر اطلاعات بازیکن</li>
              <li class="breadcrumb-item">{{ $player->full_name }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @livewire('admin.player-mangement.edit-player',['id' => $player->id])
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
    <!-- /.content -->
  </div>
@endsection
@section('Js')
    <script>
        // $('#birth_date').persianDatepicker();
        $(document).ready(function () {
            $("#birth_date").pDatepicker({
                altField: '#birth_date',
                altFormat: "YYYY-MM-DD",
                format: 'YYYY-MM-DD',
                autoClose: true,
                initialValue: false,
                calendar:{
                    persian: {
                        locale: 'en'
                    }
                }
            });
        });
    </script>

@endsection
