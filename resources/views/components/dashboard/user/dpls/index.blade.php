<div id="dpls-index">
  <h1 class="my-3">Problem Log</h1>
  {{-- <button class="btn text-dark" onclick="Dashboard.showContent('user-dpls-create','editor/editor.bundle')"><i --}}
  <button class="btn text-dark" onclick="Dashboard.showContent('user-dpls-create')"><i
    class="bi bi-file-earmark-plus"></i><u class="mx-2">create DPL</u></button>
  <div> 
    <x-components-dashboard-user-dpls-chart/>
  </div>
  <div>
    <x-components-dashboard-user-dpls-table/>
  </div>
</div>