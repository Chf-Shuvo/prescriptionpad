@extends('template.template')

@section('sidebar')
  @include('doctor.layout.sidebar')
@endsection

@section('content')
  @yield('content')
@endsection
