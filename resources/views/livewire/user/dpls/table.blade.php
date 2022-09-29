<div class="d-block my-4 ">
  {{-- @dd($dpls) --}}
  {{-- <div>{{ $dpls }}</div> --}}
  <table class="table-dpl-qty table table-sm">
    <thead class="table-dark">
      <tr>
        <th scope="col" style="width:70px" >No DPL</th>
        <th scope="col">Discrepancy</th>
        <th scope="col">Disposition</th>
        <th scope="col" style="width: 120px">Published</th>
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
      {{-- <tr>
        <th scope="row">1</th>
        <td>none</td>
        <td>none</td>
        <td>none</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>none</td>
        <td>none</td>
        <td>none</td>
      </tr> --}}
    </tbody>
  </table>
</div>