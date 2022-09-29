<div class="accordion accordion-flush d-flex" id="accordionFlushExample">
  <div><a href="/logout" class="btn btn-primary text-white mx-4 mt-2">Logout</a></div>
  <div class="accordion-item w-100">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        Welcome, {{ Auth::user()->name }}
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body d-flex">

        <div class="card d-flex col-md-8" style="flex-direction:row">
          <img src="{{ url('image/user_photo/Ferdi-Arrahman.jpg') }}" class="card-img-top" alt="Ferdi Arrahman" style="width: 10rem">
          <div class="card-body">
            <h5 class="card-title">Ferdi Arrahman</h5>
            <p class="card-text">Technical Publication Enginer. Have 3 years experiences. Has just ever being an liaison engineer for N219 Type Certificate investigation program.</p>
            <a href="#" class="btn btn-primary text-white">detail</a>
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

