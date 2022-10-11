{{-- CAROUSEL ITEM  --}}
{{-- @section('carousel_item') --}}
{{-- <h1>idnya: {{ $id }}, carousel</h1> --}}
{{-- <h1>{{ today()->format('d M') }}</h1> --}} {{--  UNTUK Retrive hari dan bulan SAAT INI berupa string --}}
{{-- <div>{{ $dpls[0]->created_at }}</div> --}}
{{-- <h1>{{ today()->month }}</h1>  UNTUK Retrive bulan SAAT INI berupa integer --}}
{{-- <p>{{ $dpls_PerMonth[0]->category->code }}</p>  --}}
{{-- <p>{{ dd($dpls_PerQuarter) }}</p> --}}
{{-- <div>
  <p>{{ $dpls_PerMonth->count() }}</p>
  <p>{{ $dpls_PerQuarter->count() }}</p>
</div> --}}
<div class="carousel-inner rounded-5 shadow-lg" style="height: inherit"> {{-- bg-warning // misalny  --}}
  {{-- these is form carousel item --}}
  <div class="carousel-item bg-transparent active" style="height: inherit">
    <div class="text-center bg-transparent position-relative" style="height: inherit">
      <div class="px-3 pt-3" style="height: inherit">
        @if($carousel_panel == 1)
        <p class="mb-2 h5 text-start">Qty - Annualy</p>
        <br>
        {{-- edit here --}}
        <div class="">
          <p class="h1">{{ $dpls->where('category_id', '=', 1)->count() }}&nbsp<span class="h6">Log&nbsp</span><span><span class="h4">DsE</span></span></p>
          <p class="h1">{{ $dpls->where('category_id', '=', 2)->count() }}&nbsp<span class="h6">Log&nbsp</span><span><span class="h4">PdE</span></span></p>
          <p class="h1">{{ $dpls->where('category_id', '=', 3)->count() }}&nbsp<span class="h6">Log&nbsp</span><span><span class="h4">PcE</span></span></p>
        </div>
        @endif
        @if ($carousel_panel == 2)
        <p class="mb-2 h6 text-start">Modus - Monthly</p>
        <div>
          <p class="h2">{{ $dpls_PerMonth->where('category_id', '=', $dpls_PerMonth->mode('category_id')[0])->count() }}&nbsp
            <span class="h6">Log&nbsp</span>
            <span class="h4">
              {{ 
                $dpls_PerMonth
                ->first(function($value)use($dpls_PerMonth){return $value->category_id == $dpls_PerMonth->mode('category_id')[0]; }) // retrive first dpls_PerMonth[x] jika category_id nya sama dengan nilai modus
                ->category
                ->code 
                }}
              </span>
          </p>
        </div>
        @endif
        @if ($carousel_panel == 3)
        <p class="mb-2 h6 text-start">Modus - Quarterly</p>
        <div>
          <p class="h2">{{ $dpls_PerQuarter->where('category_id', '=', $dpls_PerQuarter->mode('category_id')[0])->count() }}&nbsp
            <span class="h6">Log&nbsp</span>
            <span class="h4">
              {{ 
                $dpls_PerQuarter
                ->first(function($value)use($dpls_PerQuarter){return $value->category_id == $dpls_PerQuarter->mode('category_id')[0]; }) // retrive first dpls_PerMonth[x] jika category_id nya sama dengan nilai modus
                ->category
                ->code 
                }}
              </span>
          </p>
        </div>
        @endif
        {{-- end of edit --}}
        <div>
          <hr class="mb-0">
          <p class="mb-2 me-3 text-end"><a href="#">see detail</a></p>
        </div>
      </div>
    </div>
  </div>
  {{-- <div class="carousel-item">
    <div class="text-center align-items-center d-flex justify-content-center">
      <h1>Item 2</h1>
    </div>
  </div>
  <div class="carousel-item">
    <div class="text-center align-items-center d-flex justify-content-center">
      <h1>Item 3</h1>
    </div>
  </div> --}}
</div>
<button class="carousel-control-prev" type="button" data-bs-target="#{{ $id }}" data-bs-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#{{ $id }}" data-bs-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="visually-hidden">Next</span>
</button>
{{-- @endsection --}}