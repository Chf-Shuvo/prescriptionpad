@extends('template.template')

@section('sidebar')
  @include('pharmacy.layout.sidebar')
@endsection

@section('content')
  @yield('content')
@endsection
