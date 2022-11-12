@extends('patient.layout.master')

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
          <i class="icon-copy dw dw-add"></i> book new appontment
        </button>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <table class="data-table table stripe hover nowrap">
          <thead>
            <tr>
              <th>Doctor Name</th>
              <th>Schedule</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($appointments as $item)
              <tr>
                <td>{{ $item->doctor->first_name }}</td>
                <td>{{ $item->schedule }}</td>
                <td>{{ $item->status->value }}</td>
                <td>
                  view if attended
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
          <h5 class="modal-title">Book New Appointment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('patient.appointment.book') }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- Patient ID --}}
            <input type="hidden" name="patient_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="status" value="{{ Status::Active->value }}">
            {{-- Other Information --}}
            <div class="form-row">
              <div class="form-group col-lg-12 col-md-12 col-sm-12">
                <label for="">Choose Doctor:</label>
                <select name="doctor_id" class="custom-select2 form-control" style="width: 100%" data-validation="required">
                  <option value="" selected disabled>Please choose a doctor....</option>
                  @foreach ($doctors as $item)
                    <option value="{{ $item->id }}">{{ $item->first_name }}</option>
                  @endforeach
                </select>
                <small><a href="{{ route('patient.doctors') }}" class="text-info font-weight-bold" target="_blank">Not sure which doctor to choose? Please let us guide you, just click on this
                    link.</a></small>
              </div>
              <div class="form-group col-lg-12 col-md-12 col-sm-12">
                <label for="">Choose Schedule:</label>
                <input type="text" class="form-control datetimepicker" name="schedule" data-validation="required" readonly>
              </div>
              <div class="form-group col-lg-12 col-md-12 col-sm-12">
                <label for="">External Records:</label>
                <input type="file" class="form-control" name="file">
                <small class="font-weight-bold text-info">Upload if you have reports from external doctors/consultants and you have not uplaoded before. We recommend you create a pdf of the files and
                  then upload.</small>
              </div>
              <div class="form-group col-lg-12 col-md-12 col-sm-12">
                <button type="submit" class="btn btn-success float-right">Book Appointment</button>
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
