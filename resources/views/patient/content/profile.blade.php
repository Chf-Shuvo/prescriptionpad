@extends('patient.layout.master')

@section('content')
  <div class="card-box mb-30">
    <div class="row pd-20">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <form action="{{ route('patient.profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          <div class="form-row">
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
              <label for="">First Name:</label>
              <input type="text" class="form-control" name="first_name" data-validation="required" value="{{ $user->first_name }}">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
              <label for="">Last Name:</label>
              <input type="text" class="form-control" name="last_name" data-validation="required" value="{{ $user->last_name }}">
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
              <label for="">Phone:</label>
              <input type="text" class="form-control" name="phone" data-validation="number" value="{{ $user->phone }}">
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
              <label for="">Email:</label>
              <input type="text" class="form-control" name="email" data-validation="email" value="{{ $user->email }}">
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
              <label for="">Password:</label>
              <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12">
              <button type="submit" class="btn btn-success float-right">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
