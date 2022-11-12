@extends('patient.layout.master')

@push('css')
  <link rel="stylesheet" href="{{ asset('backend/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/src/plugins/datatables/css/responsive.dataTables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/vendors/styles/style.css') }}">
@endpush

@section('content')
  <div class="card-box mb-30">
    <div class="row pd-20">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <table class="data-table table stripe hover nowrap">
          <thead>
            <tr>
              <th>Image</th>
              <th>Name</th>
              <th>Gender</th>
              <th>Specialization</th>
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
                <td>{!! html_entity_decode($item->specializations) !!}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
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
