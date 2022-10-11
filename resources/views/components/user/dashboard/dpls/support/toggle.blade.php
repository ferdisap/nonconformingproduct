{{-- TOGGLE SETTINGS Chart --}}
{{-- @section('toggle-setting-chart') --}}
{{-- <h1>idnya: {{ $id }}, toggle</h1> --}}
<button class="btn text-dark position-absolute end-0" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"><i class="bi bi-gear"></i></button>
<ul class="dropdown-menu">
  <li class="dropend">
    <button class="dropdown-item" role="button" data-bs-toggle="dropdown">Chart Type<span class="float-end dropdown-toggle"></span></button>
    <ul class="dropdown-menu">
      <li><button class="dropdown-item">Pie</button></li>
      <li><button class="dropdown-item">Line</button></li>
      <li><button class="dropdown-item">Bar Chart</button></li>
    </ul>
  </li>
  <li class="dropend">
    <button class="dropdown-item" role="button" data-bs-toggle="dropdown">Theme<span class="float-end dropdown-toggle"></span></button>
    <ul class="dropdown-menu">
      <li><button class="dropdown-item">Dark</button></li>
      <li><button class="dropdown-item">Light</button></li>
      <li><button class="dropdown-item">Auto</button></li>
    </ul>
  </li>
  <hr>
  <li class="dropend">
    <button class="dropdown-item" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside">Others<span class="float-end dropdown-toggle"></span></button>
    <ul class="dropdown-menu">
      <li><button class="dropdown-item">
        <input class="form-check-input" type="checkbox" value="" aria-label="Checkbox for following text input">
        <span>Apply to all</span>
      </button></li>
      <li><button class="dropdown-item">
        <input class="form-check-input" type="checkbox" value="" aria-label="Checkbox for following text input">
        <span>Default style</span>
      </button></li>
    </ul>
  </li>
</ul>
{{-- @endsection --}}