@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              @if( $team == null )
                 <h1 class="m-0 text-dark">مدیریت بازیکنان</h1>
              @else
                 <h1 class="m-0 text-dark">{{ $team->title }}</h1>
              @endif
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">خانه</a></li>
              <li class="breadcrumb-item">مدیریت بازیکنان</li>
              @if( $team != null )
                 <li class="breadcrumb-item">{{ $team->title }}</li>
              @endif
            </ol>
          </div><!-- /.col -->
          @if( Session::has('message'))
            <div class="row mt-2">
                <div class="col-md-12 ">
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
                      </div>
                </div>
            </div>
          @endif
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->

        @if($team == null)
            @livewire('admin.player-mangement.players-table',[
                'team_id' => 0
            ])
        @else
            @livewire('admin.player-mangement.players-table',[
                'team_id' => $team->id
            ])
        @endif
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
