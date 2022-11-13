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
      @if ($appointment->prescription)
        <div class="col-lg-6 col-md-6 col-sm-12">
          <p><b>Dx:</b> <br> {!! nl2br($appointment->prescription->dx) !!}</p>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <p><b>Rx:</b> <br> {!! html_entity_decode($appointment->prescription->rx) !!}</p>
        </div>
      @endif
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
