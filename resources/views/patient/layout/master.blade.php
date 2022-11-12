@extends('template.template')

@section('sidebar')
  @include('patient.layout.sidebar')
@endsection

@section('content')
  @yield('content')
@endsection
