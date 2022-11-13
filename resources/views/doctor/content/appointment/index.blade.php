@extends('doctor.layout.master')

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
              <th>Schedule</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($appointments as $item)
              <tr>
                <td>{{ $item->schedule }}</td>
                <td class="{{ $item->status == Status::Active ? 'text-warning' : 'text-success' }}">{{ $item->status->value }}</td>
                <td>
                  @if ($item->status == Status::Active)
                    <a href="{{ route('doctor.appointment.attend', $item->id) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="attend this appointment"><i
                        class="icon-copy dw dw-clipboard1"></i></a>
                  @else
                    <a href="{{ route('doctor.appointment.view', $item->id) }}" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="view this appointment details"><i
                        class="icon-copy dw dw-view"></i></a>
                  @endif
                </td>
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
