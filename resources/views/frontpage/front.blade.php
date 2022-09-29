@extends('layout.html')
@section('body')

  <link rel="stylesheet" href="{{ url('css/frontPage.css') }}">

  {{-- <div class="dump_X login">
    @include('frontpage.login')
  </div> --}}

  {{-- accordion User --}}

  @auth
  <div class="d-flex justify-content-center">
    <div class="col-md-8 accordion_user">
      @include('frontpage.accordion_user')
    </div>
  </div>
  @else
  <div class="d-flex justify-content-center">
    <div class="col-md-8 accordion_user text-end d-flex align-items-center ">
      <small class="mt-2">You are not login yet</small>
      <a href="/login" class="btn btn-primary mx-4 mt-2 text-white">
        Login Here
      </a>
    </div>
  </div>
  @endauth
  {{-- end of accordion User --}}

  <div style="height:100vh">
    <div class="d-flex justify-content-center align-items-center" style="height: 95vh">
      <div class="dump_x col-md-8">
        <div class="p-3"><h1>PTDI Non-Conforming-Product</h1></div>

        <div class="d-flex">
          <div class="dump_x col-md-6 p-2">
            <a href="/dpl" class="text-decoration-none">
              <h5>DPL</h5>
              <hr class="hr">
              <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reiciendis eius, facere inventore exercitationem cumque quae minus doloribus quod? Necessitatibus odit inventore aliquam aut dolorem vitae commodi recusandae nihil, maxime explicabo atque optio aperiam quis, et rerum nesciunt mollitia ipsam repellendus aliquid totam quibusdam iste! Rem aperiam exercitationem excepturi fugit sapiente blanditiis nihil nulla, voluptate voluptatum voluptas voluptates earum doloribus hic minima aliquid non deserunt officia ea quod dolore, incidunt perspiciatis rerum a quam. At, aspernatur consequuntur illum voluptate deleniti harum optio culpa nam fugiat, laborum rerum? Alias nemo minus reiciendis earum voluptas consectetur commodi consequatur et, quod ex. Omnis, suscipit.</p>
            </a>
          </div>
          <div class="dump_x col-md-6 p-2">
            <h5>Proccess sheet</h5>
            <hr class="hr">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reiciendis eius, facere inventore exercitationem cumque quae minus doloribus quod? Necessitatibus odit inventore aliquam aut dolorem vitae commodi recusandae nihil, maxime explicabo atque optio aperiam quis, et rerum nesciunt mollitia ipsam repellendus aliquid totam quibusdam iste! Rem aperiam exercitationem excepturi fugit sapiente blanditiis nihil nulla, voluptate voluptatum voluptas voluptates earum doloribus hic minima aliquid non deserunt officia ea quod dolore, incidunt perspiciatis rerum a quam. At, aspernatur consequuntur illum voluptate deleniti harum optio culpa nam fugiat, laborum rerum? Alias nemo minus reiciendis earum voluptas consectetur commodi consequatur et, quod ex. Omnis, suscipit.</p>
          </div>
        </div>

        <div class="d-flex">
          <div class="dump_x col-md-6 p-2">
            <h5>Engineering Justification</h5>
            <hr class="hr">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reiciendis eius, facere inventore exercitationem cumque quae minus doloribus quod? Necessitatibus odit inventore aliquam aut dolorem vitae commodi recusandae nihil, maxime explicabo atque optio aperiam quis, et rerum nesciunt mollitia ipsam repellendus aliquid totam quibusdam iste! Rem aperiam exercitationem excepturi fugit sapiente blanditiis nihil nulla, voluptate voluptatum voluptas voluptates earum doloribus hic minima aliquid non deserunt officia ea quod dolore, incidunt perspiciatis rerum a quam. At, aspernatur consequuntur illum voluptate deleniti harum optio culpa nam fugiat, laborum rerum? Alias nemo minus reiciendis earum voluptas consectetur commodi consequatur et, quod ex. Omnis, suscipit.</p>
          </div>
          <div class="dump_x col-md-6 p-2">
            <h5>CTRE</h5>
            <hr class="hr">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reiciendis eius, facere inventore exercitationem cumque quae minus doloribus quod? Necessitatibus odit inventore aliquam aut dolorem vitae commodi recusandae nihil, maxime explicabo atque optio aperiam quis, et rerum nesciunt mollitia ipsam repellendus aliquid totam quibusdam iste! Rem aperiam exercitationem excepturi fugit sapiente blanditiis nihil nulla, voluptate voluptatum voluptas voluptates earum doloribus hic minima aliquid non deserunt officia ea quod dolore, incidunt perspiciatis rerum a quam. At, aspernatur consequuntur illum voluptate deleniti harum optio culpa nam fugiat, laborum rerum? Alias nemo minus reiciendis earum voluptas consectetur commodi consequatur et, quod ex. Omnis, suscipit.</p>
          </div>
        </div> 
      </div>
    </div>
      
    @include('layout.footer')
  </div>
@endsection