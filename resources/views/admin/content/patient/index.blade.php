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
          <i class="icon-copy dw dw-add"></i> add patient
        </button>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <table class="data-table table stripe hover nowrap">
          <thead>
            <tr>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($patients as $item)
              <tr>
                <td>{{ $item->first_name }}</td>
                <td>{{ $item->last_name }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->email }}</td>
                <td>
                  <a href="{{ route('admin.patient.edit', $item->id) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="edit-admin"><i
                      class="icon-copy dw dw-edit-1"></i></a>
                  <a href="{{ route('admin.patient.destroy', $item->id) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="delete-admin"
                    onclick="return confirm('Are you sure to delete this admin?')"><i class="icon-copy dw dw-trash1"></i></a>
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
          <h5 class="modal-title">Add New Admin</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.patient.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="">First Name:</label>
                <input type="text" class="form-control" name="first_name" data-validation="required">
              </div>
              <div class="form-group col-lg-6 col-md-6 col-sm-12">
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
