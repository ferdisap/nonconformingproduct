<div class="row" style="flex-wrap: wrap">
  <div class="dpl-chart-container col-md-6">
    <canvas chart="false" id="chart1">
      <title>{{ $title }}</title>
      <label-x>{{ $labelX }}</label-x>
      <label-y>{{ $labelY }}</label-y>
    </canvas>
  </div>
  <div class="dpl-chart-container col-md-6">
    <canvas chart="false" id="chart2">
      <label-x>Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Des</label-x>
      <label-y>30,10,6,80,150,70,30,20,60,130,40,90</label-y>
    </canvas>
  </div>
</div>

{{-- <script src="{{ url('js/chart/chart.bundle.js') }}"></script> --}}
<script>
  window.onload = function() {    
    Dashboard.renderChart('user-dpls-index');
  }
</script>