@extends('admin.layout.master')

@section('content')
  <div class="card-box mb-30">
    <div class="row pd-20">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <form action="{{ route('admin.pharmacy.update', $pharmacy->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          <div class="form-row">
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
              <label for="">Name:</label>
              <input type="text" class="form-control" name="name" data-validation="required" value="{{ $pharmacy->name }}">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
              <label for="">Phone:</label>
              <input type="text" class="form-control" name="phone" data-validation="number" value="{{ $pharmacy->phone }}">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
              <label for="">Email:</label>
              <input type="text" class="form-control" name="email" data-validation="email" value="{{ $pharmacy->email }}">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
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
