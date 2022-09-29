<div id="create" class="mt-3">
  {{-- <div><h1>Create</h1><h3>Development Problem Log</h3></div> --}}
  <div class="d-block">
    <div class="d-flex">
      <svg id="back" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
        <path fill-rule="evenodd"
          d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4z" />
      </svg>
      <a href="#" class="small text-decoration-none mx-2" onclick="dashboard.getPreviousContent()">back</a>
    </div>
    <p class="h1">Create</p>
    <p class="h3">Development Problem Log</p>
  </div>
  <form action="#" method="post">
    <div class="d-flex">
      <div class="col-md-8">

        <!-- DPL Header -->
        <div class="dpl-header d-flex flex-wrap">

          <!-- aircraft Model -->
          <div class="mb-2 mx-3" style="width: 100px">
            <label class="form-label" for="aircraft-model">Aircraft Model</label>
            <select class="form-select" id="aircraft-model">
              <option selected value="1">N219</option>
              <option value="2">NC212</option>
              <option value="3">CN235</option>
            </select>
          </div>

          <!--aircraft unit number -->
          <div class="mb-2 w-25 mx-3">
            <label for="aircraft-unit-number" class="form-label">A/C Unit Number</label>
            <input type="text" class="form-control" id="aircraft-unit-number" placeholder="eg. PD1 or N070">
          </div>

          <!-- aircraft part number -->
          <div class="mb-2 w-25 mx-3">
            <label for="aircraft-part-number" class="form-label">A/C Part Number</label>
            <div class="d-flex">
              <input type="text" class="form-control" id="aircraft-part-number" placeholder="eg. 112ND14101-003">
              <input type="text" class="form-control" id="revision-index" style="width: 30px">
            </div>
          </div>

          <!-- aircraft part name -->
          <div class="mb-2 w-25 mx-3">
            <label for="aircraft-part-name" class="form-label">A/C Part Name</label>
            <input type="text" class="form-control" id="aircraft-part-name">
          </div>

          <!-- work order -->
          <div class="mb-2 w-25 mx-3">
            <label for="work-order" class="form-label">Work Order</label>
            <input type="number" class="form-control" id="work-order">
          </div>

          <!-- orig shop -->
          <div class="mb-2 w-25 mx-3" style="max-width: 100px">
            <label class="form-label" for="orig-shop">Orig Shop</label>
            <select class="form-select" id="orig-shop">
              <option selected value="1">DM1000</option>
              <option value="2">DM2000</option>
              <option value="3">CA2000</option>
            </select>
          </div>

          <!-- report name -->
          <div class="mb-2 w-25 mx-3">
            <label for="reporter-name" class="form-label">Reporter Name</label>
            <input type="text" class="form-control" id="reporter-name">
          </div>

          <!-- inspector name -->
          <div class="mb-2 w-25 mx-3">
            <label for="inspector-name" class="form-label">inspector name</label>
            <input type="text" class="form-control" id="inspector-name" disabled>
          </div>

        </div>

        <!-- DPL Body -->
        <div editor id="editor1" class="mb-5 mx-3"></div>

        {{-- <div class="float-end"><button class="btn btn-warning">Save</button><button class="btn btn-primary m-2">Submit</button></div> --}}
      </div>

      <div class="col-md-4">
        <div class="accordion" id="accordionPanelsStayOpenExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                aria-controls="panelsStayOpen-collapseOne">
                Publish
              </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
              aria-labelledby="panelsStayOpen-headingOne">
              <div class="accordion-body">
                <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse
                plugin adds the appropriate classes that we use to style each element. These classes control the overall
                appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom
                CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the
                <code>.accordion-body</code>, though the transition does limit overflow.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
