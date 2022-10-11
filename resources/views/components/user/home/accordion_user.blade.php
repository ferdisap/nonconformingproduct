<div class="accordion accordion-flush d-flex" id="accordion-user">
  
  {{-- <div><a href="/logout" class="btn btn-primary text-white mx-4 mt-2">Logout</a></div> --}}

  <div class="accordion-item w-100" style="z-index: 10">

    <h2 class="accordion-header" id="flush-headingOne">
      <div class="accordion-button collapsed" style="border-radius: 10px" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
          <div class="d-flex justify-content-between w-100 align-items-center">
            Welcome, {{ Auth::user()->name }}
            <button class="btn btn-warning mx-3 float-end"><a href="/logout" class="text-decoration-none fw-bold">Logout</a></button>
          </div>
      </div>
    </h2>

    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-user">
      <div class="accordion-body d-flex bg-light my-3" style="border-radius: 10px">

        <div class="card d-flex col-md-8" style="flex-direction:row">
          <div class="p-2">
            <img src="{{ url('image/user_photo/Ferdi-Arrahman.jpg') }}" class="card-img-top" alt="Ferdi Arrahman" style="width: 7rem">            
          </div>
          <div class="card-body">
            <h5 class="card-title">Ferdi Arrahman</h5>
            <p class="card-text">Technical Publication Enginer. Have 3 years experiences. Has just ever being an liaison engineer for N219 Type Certificate investigation program.</p>
            <a href="#" class="btn border-dark">Detail Profile</a>
            <a href="/dashboard/user-settings-profile" class="btn border-dark">Dashboard</a>
            {{-- <button wire:click="redirectTo('user-settings-profile')" class="btn border-dark">Dashboard</button> --}}
          </div>
        </div>
        
        <div class="card d-flex col-md-4" style="flex-direction:row">
          <div class="card-body">
            <h5 class="card-title">Authorization</h5>
            <a href="#" class="btn-primary">Disposition</a>
            <a href="#" class="btn-primary">Engjust</a>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

