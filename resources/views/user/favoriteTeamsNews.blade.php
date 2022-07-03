@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>خبر های تیم های محبوب</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">خانه</a></li>
              <li class="breadcrumb-item active">خبرهای تیم های محبوب</li>
            </ol>
          </div>
        </div>
        @if( Session::has('message'))
            <div class="row mt-2">
                <div class="col-md-12 ">
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
                      </div>
                </div>
            </div>
          @endif
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          @livewire('user.teams.teams-news')
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
