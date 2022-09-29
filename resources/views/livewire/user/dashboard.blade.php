<aside class="">
  <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark sticky" style="max-width: 280px; height:100vh">
    {{-- dashboard --}}
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi pe-none me-2" width="40" height="32">
        <use xlink:href="#home" />
      </svg>
      <span class="fs-4">Dashboard</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16">
            <use xlink:href="#worksheet" />
          </svg>
          Worksheet
        </a>
      </li>
      <li>
        <button onclick="dashboard.showContent('user-dpls-index')" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16">
            <use xlink:href="#dpl" />
          </svg>
          DPL
        </button>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16">
            <use xlink:href="#engjust" />
          </svg>
          Engjust
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16">
            <use xlink:href="#ctre" />
          </svg>
          CTRE
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16">
            <use xlink:href="#person-workspace" />
          </svg>
          User Delegated
        </a>
      </li>
    </ul>

    {{-- Performance --}}
    <div href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi pe-none me-2" width="40" height="32">
        <use xlink:href="#speedometer2" />
      </svg>
      <span class="fs-4">Performance</span>
    </div>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16">
            <use xlink:href="#non-conformance-product" />
          </svg>
          Non Conformance Product
        </a>
      </li>
    </ul>

    {{-- Setting --}}
    <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi pe-none me-2" width="40" height="32">
        <use xlink:href="#gear-fill" />
      </svg>
      <span class="fs-4">Setting</span>
    </div>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li>
        {{-- <button onclick="myContent('user-settings-profile')" class="nav-link text-white"> --}}
        <button onclick="dashboard.showContent('user-settings-profile')" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16">
            <use xlink:href="#people-circle" />
          </svg>
          Profile
        </button>
        <button onclick="dashboard.showContent('user-settings-usernameandpassword')" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16">
            <use xlink:href="#tools" />
          </svg>
          Username and Password
        </button>
      </li>
    </ul>
    <hr>

    {{-- User --}}
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
        data-bs-toggle="dropdown" aria-expanded="false">
        <img src="{{ url('image/user_photo/ferdi-arrahman.jpg') }}" alt="ferdi-arrahman" width="32" height="32"
          class="rounded-circle me-2">
        <strong>Admin</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        {{-- <li><hr class="dropdown-divider"></li> --}}
        <li><a class="dropdown-item" href="/logout">Sign out</a></li>
      </ul>
    </div>
  </div>
</aside>
{{-- <div id="content" class="b-example-divider b-example-vr"> </div> --}}
<main class="d-flex flex-row justify-content-center">
  <div id="content" class="px-2" style="height: 3000px; width: 100%" >
    <p>PROFILE View: Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, vitae magnam cumque incidunt vel
      ipsa
      velit
      doloribus enim ipsam omnis?</p>
    <div>tes</div>
    <canvas id="myChart1"></canvas>
    <canvas id="myChart2"></canvas>
    <div id="editor" class="myeditor mb-5"></div>
    <div id="editor" class="myeditor mb-5"></div>
  </div>

</main> 


<script src="{{ url('js/dashboardTest.js') }}"></script>

<script src="{{ url('js/chart/chart.bundle.js') }}"></script>
<script src="{{ url('js/editor/editor.bundle.js') }}"></script>

<script defer> dashboard.showContent('user-dpls-create','editor/editor.bundle') </script>