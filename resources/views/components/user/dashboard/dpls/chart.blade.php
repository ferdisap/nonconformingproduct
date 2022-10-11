{{-- SUPPORT Component --}}
@php
function support($sectionName, $id = null, $data=[])
{
    return view('components.user.dashboard.dpls.support.' . $sectionName, [
      'id' => $id,
      'carousel_panel' => $data[0] ?? '',
      'dpls' => $data[1]['dpls_All'] ?? '',
      'dpls_PerMonth' => $data[1]['dpls_PerMonth'] ?? '',
      'dpls_PerQuarter' => $data[1]['dpls_PerQuarter'] ?? '',
    ])->render();
      // ])->renderSections()[$sectionName]; // tidak bisa renderSections karena parameter static (tidak berganti walau di ubah (id nya))
}
@endphp







<!-- Yang di SHOWING -->
{{-- <div>{{ $dpls }}</div> --}}
<div class="d-flex" style="flex-wrap: wrap">
  {{-- canvas --}}
  <div class="position-relative col-lg-5 bg-transparent d-flex justify-content-center">
    <div class="p-2 dropdown border rounded-3 shadow-lg bg-transparent w-100 vertical-center" style="z-index: 10">
      {{-- {!! support('tesID', '', 'toggle-setting-chart') !!} --}}
      {!! support('toggle') !!}
      
      <canvas chart="false" id="chart1" style="max-height: 215px; min-height:150px !important">
        <title>{{ $title }}</title>
        <label-x>{{ $labelX }}</label-x>
        <label-y>{{ $labelY }}</label-y>
      </canvas>
    </div>
  </div>

  {{-- <div class="col-lg-6 d-flex position-relative"> --}}
  {{-- <div class="grid text-center position-relative" style="--bs-columns: 1, --bs-rows: 2, --bs-gap: 2.5rem"> --}}
  <div class="grid text-center position-relative bg-transparent col-lg-7" style="--bs-rows:1;" style="height:max-content">

    <div class="px-3 bg-transparent position-relative">
      <div id="carousel-problem_log-qty" class="carousel slide bg-transparent vertical-center" data-bs-ride="carousel">
        {{-- <x-components-dashboard-user-dpls-support-carousel type=/> --}}
        {!! support('carousel', 'carousel-problem_log-qty', [1, $data]) !!}
      </div>
    </div>
    
    <div class="px-3 position-relative">
      <div class="grid text-center position-relative vertical-center" style="--bs-columns: 1, --bs-rows: 2; --bs-gap:1rem">

        <div id="carousel-problem_log-modus-monthly" class="carousel slide" data-bs-ride="carousel">
          {!! support('carousel', 'carousel-problem_log-modus-monthly', [2, $data]) !!}
        </div>
        <div id="carousel-problem_log-modus-quarterly" class="carousel slide" data-bs-ride="carousel">
          {!! support('carousel', 'carousel-problem_log-modus-quarterly', [3, $data]) !!}
        </div>

      </div>
    </div>

  </div>


</div>

{{-- <script src="{{ url('js/chart/chart.bundle.js') }}"></script> --}}
{{-- <script src="{{ url('/js/chart/setHeightCarousel.js') }}"></script> script untuk set height carousel disamping chart --}}
<script>
  window.onload = function() {
    try {
      // Dashboard.renderChart('user-dpls-index');
      Dashboard.renderChart();
    } catch (e) {}
  }
</script>



{{-- TIDAK DIPAKAI --}}
{{-- canvas --}}
{{-- <div class="dpl-chart-container col-lg-6 position-relative">
    @stack('toggle-setting-chart')
    <canvas chart="false" id="chart2">
      <label-x>Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Des</label-x>
      <label-y>30,10,6,80,150,70,30,20,60,130,40,90</label-y>
    </canvas>
  </div> --}}
