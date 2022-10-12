<div class="d-flex my-4" id="table">

  <div class="d-block mx-2 w-100">

    <div class="mb-2 bg-light p-3 rounded-2 ">
      <table class="table-dpl-qty table table-md table table-bordered">
        <thead class="table-dark">
          <tr class="table-light">
            <th scope="col">No DPL</th>
            <th scope="col">Discrepancy</th>
            <th scope="col">Disposition</th>
            <th scope="col">Category</th>
            <th scope="col">Published</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          @foreach ($dpls as $dpl)
            <tr>
              <th scope="row"><a href="dpls-index/{{ $dpl->noDPL }}" class="text-decoration-none" onclick="showDetailModel({{ $dpl->noDPL }})">{{ $dpl->noDPL }}</a></th>
              <td>{{ Str::limit($dpl->discrepancy, 50) }}</td>
              <td>{{ Str::limit($dpl->disposition, 50) }}</td>
              <td>{{ $dpl->category->code}}</td>
              <td>{{ substr($dpl->published_at, 0, 10) }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    {{-- PAGINATOR --}}
    <div>
      {{ $dpls->links() }}
    </div>
    {{-- end of PAGINATOR --}}

  </div>


  <script src="{{ url('/js/table/getPage.js') }}"></script>
  <script src="{{ url('/js/dashboard/showDetailModel.js') }}"></script>

</div>
