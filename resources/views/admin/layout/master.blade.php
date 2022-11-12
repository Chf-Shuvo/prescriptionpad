@extends('template.template')

@section('sidebar')
  @include('admin.layout.sidebar')
@endsection

@section('content')
  @yield('content')
@endsection
