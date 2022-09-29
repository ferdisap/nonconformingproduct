{{-- banner profile --}}
<div class="text-center my-3">
  <h1 class="my-2">Profile</h1>
  <div class="photo-profile d-block text-center">
    <div class="profile-photo">
      <img src="{{ url('image/user_photo/ferdi-arrahman.jpg') }}" alt="{{ Auth::user()->name }}" class="rounded-circle mb-2" style="width: 150px; height: 200px">
      <div class="change-photo-profile rounded-circle d-flex justify-content-end">
        <svg id="icon-change-photo-profile" width="16px" height="16" viewBox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <!-- Generator: Sketch 50 (54983) - http://www.bohemiancoding.com/sketch -->
          <title>change photo</title>
          {{-- <desc>Created with Sketch.</desc> --}}
          {{-- <defs></defs>s --}}
          <g id="31.-Photo-camera" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
              <g transform="translate(2.000000, 10.000000)" stroke="#222F3E" stroke-width="4">
                  <path d="M24.8784375,14.4 L2.87308931,14.4 C1.28449202,14.4 0,15.6933791 0,17.2888432 L0,77.7511568 C0,79.3465319 1.2863259,80.64 2.87308931,80.64 L93.1269107,80.64 C94.715508,80.64 96,79.3466209 96,77.7511568 L96,17.2888432 C96,15.6934681 94.7136741,14.4 93.1269107,14.4 L71.164875,14.4 L64.1667696,2.47802639 C63.3634179,1.10943617 61.4237809,0 59.8344509,0 L36.2738304,0 C34.6935964,0 32.7398496,1.10945021 31.9303315,2.47802639 L24.8784375,14.4 L24.8784375,14.4 Z" id="Layer-2"></path>
                  <circle id="Layer-3" cx="48" cy="48" r="21.12"></circle>
                  
              </g>
          </g>
        </svg>
      </div>
    </div>
    <p class="h6">{{ Auth::user()->name }}</p>
    <p class="h5">{{ Auth::user()->nik }}</p>
  </div>   
  <hr>
</div>

{{-- Profile Data --}}
<div class="profile-data d-block text-center">
  <div class="px-3 col-md-6 my-2" style="display: inline-block">
    <label for="nik" class="form-label h6">Job Description</label>
    <input f-model="users" name="jobdesc" type="text" class="form-control" id="jobdesc" style="min-height: 100px">
  </div>
  <div class="px-3 col-md-6 my-2" style="display: inline-block">
    <label for="nik" class="form-label h6">Moto Hidup</label>
    <input f-model="users" name="moto" type="text" class="form-control" id="moto" style="min-height: 100px">
  </div>
</div>
  

  {{-- NIK --}}
  {{-- <div class="mb-3" id="profile-container-nik">
    <label for="nik" class="form-label">NIK</label>
    <input type="text" class="form-control" id="nik" placeholder="{{ Auth::user()->nik }}" disabled>
  </div> --}}



  {{-- contoh saja --}}
  {{-- NIK --}}
  {{-- <div class="mb-3" id="profile-container-nik">
    <input f-model="users" type="text" class="form-control" id="nik" name="nama">
    <input f-model="users" type="text" class="form-control" id="nik" name="nik">
    <input f-model="users" type="text" class="form-control" id="nik" name="email">
    <input f-model="dpl" type="text" class="form-control" id="nik" name="no">
    <input f-model="dpl" type="text" class="form-control" id="nik" name="desc">
    <input f-model="dpl" type="text" class="form-control" id="nik" name="disp">
    <select f-model="dpl" name="suplement" id=""></select>
  </div>
</div> --}}
{{-- <script>
  // Untuk mendapatkatkan value dari setiap form didalam template profile ini, memerlukan fetching lagi ke server.
  // 1. Ketika innerHTML #content berganti, jalankan script fetcing data untuk value form.
  // 2. script tersebut bisa di letakkan bersama saat template di render. running script setelah render template di window.document selesai. Pakai fungsi async await.
  // berikut gambaran scriptnya:

  // 1. var usersettingsprofile = document.querySelector('user-settings-profile')
  // 2. usersettingsprofile.shadowRoot.querySelector('input[name]') // untuk mendapatkan atribute name pada input
  // 3. if active content = profile, maka url(.... routing to server), elseif usernamepassword maka url (...routing to server)
  // 4. server akan mereturn sebuha json data.
  // 5. setelah response data didapatkan, jalankan fungsi untuk mengganti value sesuai input[name] nya.
</script> --}}