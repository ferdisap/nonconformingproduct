{{-- NAVBAR --}}
@push('navbar')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3 rounded-2 mt-2">
  <div class="container-fluid" style="min-height:40px">
    <a class="navbar-brand bg-dark" href="/">Home</a>
    <span class="text-light h3">||</span>
    <button class="btn text-light" onclick="Dashboard.showContent('dpls-create')"><i class="bi bi-file-earmark-plus">&nbsp create log</i></button>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-primary" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
@endpush

<div id="dpls-index">
  @stack('navbar')
  <h1 class="my-3">Problem Log</h1>
  
  <div class="d-flex">
    
    {{-- CHART and TABLE  --}}
    <div class="col-sm-10 p-lg-3">
      <div>
        <x-components-user-dashboard-dpls-chart/>
      </div>
      <div>
        <x-components-user-dashboard-dpls-table/>
      </div>
    </div>
    {{-- end of CHART and TABLE  --}}

    {{-- RIGHT SIDE TABLE --}}
    <div class="col-sm-2 d-flex justify-content-center">
      <div class="accordion justify-content-center w-75" id="accordionFilter">

        <div class="accordion-item">
          <h2 class="accordion-header" id="panelsStayOpen-filterTable-headingFilter">
            <button class="accordion-button bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-filterTable-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-filterTable-collapseOne">
              Filter
            </button>
          </h2>

          <div id="panelsStayOpen-filterTable-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-filterTable-headingFilter">
            <div class="accordion-body">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Default
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                  Checked
                </label>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
    {{-- end of RIGHT SIDE TABLE --}}
  </div>
</div>
