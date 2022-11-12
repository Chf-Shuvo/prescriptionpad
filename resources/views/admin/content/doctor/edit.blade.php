@extends('admin.layout.master')

@section('content')
  <div class="card-box mb-30">
    <div class="row pd-20">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <form action="{{ route('admin.doctor.update', $doctor->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          <div class="form-row">
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
              <label for="">First Name:</label>
              <input type="text" class="form-control" name="first_name" data-validation="required" value="{{ $doctor->first_name }}">
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
              <label for="">Last Name:</label>
              <input type="text" class="form-control" name="last_name" data-validation="required" value="{{ $doctor->last_name }}">
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
              <label for="">Phone:</label>
              <input type="text" class="form-control" name="phone" data-validation="number" value="{{ $doctor->phone }}">
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
              <label for="">Email:</label>
              <input type="text" class="form-control" name="email" data-validation="email" value="{{ $doctor->email }}">
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
              <label for="">Password:</label>
              <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
              <label for="">Gender:</label>
              <select name="gender" class="form-control">
                <option value="{{ GenderType::Male->value }}" @if ($doctor->gender->value == GenderType::Male->value) selected @endif>{{ GenderType::Male->value }}</option>
                <option value="{{ GenderType::Female->value }}" @if ($doctor->gender->value == GenderType::Female->value) selected @endif>{{ GenderType::Female->value }}</option>
              </select>
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
              <label for="">Age:</label>
              <input type="text" class="form-control" name="age" data-validation="number" min="20" value="{{ $doctor->age }}">
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
              <label for="">Image:</label>
              <input type="file" class="form-control" name="image">
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-12 text-center">
              <img src="{{ Storage::url('images/doctor/' . $doctor->image) }}" alt="no-image" height="100" width="100" class="rounded-circle">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12">
              <label for="">Specializations:</label>
              <textarea name="specializations" class="textarea_editor form-control border-radius-0" required>{{ $doctor->specializations }}</textarea>
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12">
              <button type="submit" class="btn btn-success float-right">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
