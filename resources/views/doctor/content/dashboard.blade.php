@extends('doctor.layout.master')


@section('content')
  <div class="card-box mb-30" data-bgcolor="#455a64">
    <div class="row pd-20">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="d-flex justify-content-between align-items-end">
          <div class="text-white">
            <div class="font-14">Total Appointments</div>
            <div class="font-24 weight-500">{{ auth()->user()->appointments->count() }}</div>
          </div>
          <div class="max-width-150">
            <div id="appointment-chart"></div>
          </div>
        </div>
      </div>
    </div>
  @endsection

  @push('js')
    <script src="{{ asset('backend/src/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script>
      var options2 = {
        series: [{
          name: 'Week',
          data: [{
            x: 'Monday',
            y: 21
          }, {
            x: 'Tuesday',
            y: 22
          }, {
            x: 'Wednesday',
            y: 10
          }, {
            x: 'Thursday',
            y: 28
          }, {
            x: 'Friday',
            y: 16
          }, {
            x: 'Saturday',
            y: 21
          }, {
            x: 'Sunday',
            y: 13
          }],
        }],
        chart: {
          height: 70,
          type: 'bar',
          toolbar: {
            show: false,
          },
          sparkline: {
            enabled: true
          },
        },
        plotOptions: {
          bar: {
            columnWidth: '25px',
            distributed: true,
            endingShape: 'rounded',
          }
        },
        dataLabels: {
          enabled: false
        },
        legend: {
          show: false
        },
        xaxis: {
          type: 'category',
          lines: {
            show: false,
          },
          axisBorder: {
            show: false,
          },
          labels: {
            show: false,
          },
        },
        yaxis: [{
          y: 0,
          offsetX: 0,
          offsetY: 0,
          labels: {
            show: false,
          },
          padding: {
            left: 0,
            right: 0
          },
        }],
      };
      var chart2 = new ApexCharts(document.querySelector("#appointment-chart"), options2);
      chart2.render();
    </script>
  @endpush
