@extends('dashboard.layout.master')
@section('menuDashboard', 'active')
@section('content')
    @if (Auth()->user()->level == 'Admin')
        @include('admin.index')
    @endif
@endsection

