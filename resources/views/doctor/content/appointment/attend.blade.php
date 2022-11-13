@extends('doctor.layout.master')


@section('content')
  <div class="card-box mb-30">
    <div class="row pd-20">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <table class="table table-striped">
          <tbody>
            <tr class="text-center">
              <td>{{ $appointment->patient->first_name . ' ' . $appointment->patient->last_name }}</td>
              <td>{{ $appointment->schedule }}</td>
              <td>
                @if ($appointment->file)
                  <span class="text-info" data-toggle="modal" data-target="#modelId" style="cursor: pointer">Click to view attached prescription</span>
                @else
                  <span class="text-secondary">No external files are attached</span>
                @endif
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <h4 class="text-center p-3">Previous Medical History</h4>
        <div class="list-group">
          @foreach ($previous_history as $item)
            <a href="{{ route('doctor.appointment.view', $item->id) }}" class="list-group-item list-group-item-action" target="_blank">{{ $item->doctor->first_name . ' on ' . $item->schedule }}</a>
          @endforeach
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
        <form action="{{ route('doctor.appointment.prescribe', $appointment->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="form-group col-lg-12 col-md-12 col-sm-12">
              <label for="">Dx:</label>
              <textarea name="dx" class="form-control border-radius-0"></textarea>
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12">
              <label for="">Rx:</label>
              <textarea name="rx" class="textarea_editor form-control border-radius-0"></textarea>
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12">
              <button type="submit" class="btn btn-success float-right">prescribe</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  {{-- modal to view content --}}
  <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <iframe src="{{ Storage::url('patient/files/' . $appointment->file) }}" frameborder="0" style="width: 100%; height:80vh"></iframe>
        </div>
      </div>
    </div>
  </div>
@endsection
