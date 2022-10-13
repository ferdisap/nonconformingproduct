<div id="show_component">
  
  <div class="d-flex flex-nowrap">
    <div class="col-md-8 text-center">
      <div class="" id="pl">
        <h1>PL no.{{ $data->noDPL }}</h1>
        <p>created by: {{ $data->creator->name }} || published at: {{ date('D/d-M-Y', strtotime($data->published_at)) }}</p>
        <div id="discrepancy" class="text-start">
          <h3>Discrepancy</h3>
          <p>{{ $data->discrepancy }}</p>
        </div>
        <div id="disposition" class="text-start">
          <h3>Disposition</h3>
          <p>{{ $data->disposition }}</p>
        </div>    
      </div>  
    </div>

    <div class="col-md-4">
      <div id="comment" class="mt-4">
        <h2>Comments</h2>
        <div class="mt-4 border border-2 rounded-3 p-2 px-5 bg-light">
          <img src="https://i.imgur.com/DrKFA.gif" alt="" class="rounded-circle me-2 mb-2 shadow-sm border" width="40" height="40">
          <h4 class="d-inline">Jhon Doe</h4><span>- 20 October, 2018</span>
          <br>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
          <div class="input-group mb-2">
            <textarea class="form-control fw-light rounded-1" placeholder="Leave a comment here.." name="comment" style="height: 0"></textarea>
            <button type="submit" class="m-0 p-0 border-0 bottom-0" style="height: 0"><span class="input-group-text" id="basic-addon2">>></span></button>
          </div>
        </div>  
      </div>
    </div>  
  </div>

</div>    