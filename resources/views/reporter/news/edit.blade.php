@extends('layouts.admin-master')
@section('content')
{{--    {{dd($news)}}--}}
    <livewire:reporter.news-management.edit-news :news="$news">
@endsection
