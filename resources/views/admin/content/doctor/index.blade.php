@extends('admin.layout.master')

@push('css')
  <link rel="stylesheet" href="{{ asset('backend/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/src/plugins/datatables/css/responsive.dataTables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/vendors/styles/style.css') }}">
@endpush

@section('content')
  <div class="card-box mb-30">
    <div class="row pd-20">
      <div class="col-lg-12 col-md-12 col-sm-12 text-right">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-lg m-3" data-toggle="modal" data-target="#modelId">
          <i class="icon-copy dw dw-add"></i> add doctor
        </button>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <table class="data-table table stripe hover nowrap">
          <thead>
            <tr>
              <th>Image</th>
              <th>Name</th>
              <th>Gender</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($doctors as $item)
              <tr>
                <td>
                  <img src="{{ Storage::url('images/doctor/' . $item->image) }}" height="100" width="100" alt="no-image" class="rounded-circle">
                </td>
                <td>{{ $item->first_name }}</td>
                <td>{{ $item->gender->value }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->email }}</td>
                <td>
                  <a href="{{ route('admin.doctor.edit', $item->id) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="edit-doctor"><i
                      class="icon-copy dw dw-edit-1"></i></a>
                  <a href="{{ route('admin.doctor.destroy', $item->id) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="delete-doctor"
                    onclick="return confirm('Are you sure to delete this doctor?')"><i class="icon-copy dw dw-trash1"></i></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  {{-- Modal Content --}}
  <!-- Modal -->
  <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Doctor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.doctor.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <div class="form-group col-lg-4 col-md-4 col-sm-12">
                <label for="">First Name:</label>
                <input type="text" class="form-control" name="first_name" data-validation="required">
              </div>
              <div class="form-group col-lg-4 col-md-4 col-sm-12">
                <label for="">Last Name:</label>
                <input type="text" class="form-control" name="last_name" data-validation="required">
              </div>
              <div class="form-group col-lg-4 col-md-4 col-sm-12">
                <label for="">Phone:</label>
                <input type="text" class="form-control" name="phone" data-validation="number">
              </div>
              <div class="form-group col-lg-4 col-md-4 col-sm-12">
                <label for="">Email:</label>
                <input type="text" class="form-control" name="email" data-validation="email">
              </div>
              <div class="form-group col-lg-4 col-md-4 col-sm-12">
                <label for="">Password:</label>
                <input type="password" class="form-control" name="password" data-validation="length" data-validation-length="min6">
              </div>
              <div class="form-group col-lg-4 col-md-4 col-sm-12">
                <label for="">Gender:</label>
                <select name="gender" class="form-control">
                  <option value="{{ GenderType::Male->value }}">{{ GenderType::Male->value }}</option>
                  <option value="{{ GenderType::Female->value }}">{{ GenderType::Female->value }}</option>
                </select>
              </div>
              <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="">Age:</label>
                <input type="text" class="form-control" name="age" data-validation="number" min="20">
              </div>
              <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="">Image:</label>
                <input type="file" class="form-control" name="image" data-validation="required">
              </div>
              <div class="form-group col-lg-12 col-md-12 col-sm-12">
                <label for="">Specializations:</label>
                <textarea name="specializations" class="textarea_editor form-control border-radius-0" required></textarea>
              </div>
              <div class="form-group col-lg-12 col-md-12 col-sm-12">
                <button type="submit" class="btn btn-success float-right">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script src="{{ asset('backend/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('backend/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('backend/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('backend/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
  <!-- buttons for Export datatable -->
  <script src="{{ asset('backend/src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('backend/src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('backend/src/plugins/datatables/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('backend/src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('backend/src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
  <script src="{{ asset('backend/src/plugins/datatables/js/pdfmake.min.js') }}"></script>
  <script src="{{ asset('backend/src/plugins/datatables/js/vfs_fonts.js') }}"></script>
  <!-- Datatable Setting js -->
  <script src="{{ asset('backend/vendors/scripts/datatable-setting.js') }}"></script>
@endpush
