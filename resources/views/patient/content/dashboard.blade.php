@extends('patient.layout.master')

@section('content')
  <div class="card-box mb-30">
    <div class="row pd-20">
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card-box height-100-p widget-style3">
          <div class="d-flex flex-wrap">
            <div class="widget-data">
              <div class="weight-700 font-24 text-dark">{{ auth()->user()->appointments->where('status', Status::Attended)->count() }}</div>
              <div class="font-14 text-secondary weight-500">
                Appointment Prescribed
              </div>
            </div>
            <div class="widget-icon">
              <div class="icon" data-color="#00eccf">
                <i class="icon-copy dw dw-calendar1"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card-box height-100-p widget-style3">
          <div class="d-flex flex-wrap">
            <div class="widget-data">
              <div class="weight-700 font-24 text-dark">{{ auth()->user()->appointments->where('status', Status::Active)->count() }}</div>
              <div class="font-14 text-secondary weight-500">
                Appointment Pending
              </div>
            </div>
            <div class="widget-icon">
              <div class="icon" data-color="#00eccf">
                <i class="icon-copy dw dw-calendar1"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
