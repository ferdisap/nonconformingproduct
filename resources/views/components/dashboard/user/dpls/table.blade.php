<div class="d-flex my-4" id="table">
  <div class="d-block col-md-10 mx-2">
    <table class="table-dpl-qty table table-sm">
      <thead class="table-dark">
        <tr>
          <th scope="col">No DPL</th>
          <th scope="col">Discrepancy</th>
          <th scope="col">Disposition</th>
          <th scope="col">Published</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        @foreach ($dpls as $dpl)
          <tr>
            <th scope="row">{{ $dpl->noDPL }}</th>
            <td>{{ Str::limit($dpl->discrepancy, 50) }}</td>
            <td>{{ Str::limit($dpl->disposition, 50) }}</td>
            <td>{{ substr($dpl->published_at, 0, 10) }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>

    {{-- PAGINATOR --}}
    <div>
      {{ $dpls->links() }}
    </div>
    {{-- end of PAGINATOR --}}

  </div>

  {{-- RIGHT SIDE TABLE --}}
  <div class="d-block col-md-2 mx-2">
    <div class="accordion" id="accordionFilter" style="margin-right: 2rem !important;">

      <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-filterTable-headingFilter">
          <button class="accordion-button bg-dark" type="button" data-bs-toggle="collapse"
            data-bs-target="#panelsStayOpen-filterTable-collapseOne" aria-expanded="true"
            aria-controls="panelsStayOpen-filterTable-collapseOne">
            Filter
          </button>
        </h2>
        <div id="panelsStayOpen-filterTable-collapseOne" class="accordion-collapse collapse show"
          aria-labelledby="panelsStayOpen-filterTable-headingFilter">
          <div class="accordion-body">

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Default checkbox
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
              <label class="form-check-label" for="flexCheckChecked">
                Checked checkbox
              </label>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- end of RIGHT SIDE TABLE --}}


  <script>
    function getPage(page){
      window.event.preventDefault();
      let table = document.querySelector('#table').parentNode;
      fetch('/dashboard/user-dpls-table?ajax=true&page=' + page)
        .then((response) => response.text()).then((result) => {
          // view=result;
          // console.log(result)
          table.innerHTML = result;
        })
      // console.log(view);
    }
  </script>

</div>
