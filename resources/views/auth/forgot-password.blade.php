@extends('layout.html')
@section('body')
    
<main>

  <style>
    .custom-rounded-bottom {
    border-bottom-right-radius: var(--bs-border-radius) !important;
    border-bottom-left-radius: 3rem !important;
    }
  </style>

  <div class="d-flex justify-content-center align-items-center" style="height: 95vh">

    {{-- gambar orang --}}
    <div class="col-md-3 text-center">
      <img src="{{ url('image/forget1.png') }}" alt="forget1" srcset="" style="height:50vh" >
    </div>
    
    
    {{-- kotak biru kanan --}}
    <div class="col-md-4" >

      {{-- flash massage status "send link" reset password --}}
      @if(session('status'))
      <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
        <strong>{{ session('status') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      <div class="custom-rounded-bottom shadow-sm d-block pb-2" style=" background-color:#D8E3F2;">

        {{-- topbar biru --}}
        <div class="rounded-top" style="height:7vh; background-color:#3C77BC; border-bottom: 0.5vh solid white">     
          <div class="float-end d-flex align-items-center" style="height: inherit">
            <img src="{{ url('image/circle-20pt.png') }}" class="float-end" alt="circle" srcset="" style="height: 2vh; margin-right:1.5vw">
            <img src="{{ url('image/circle-20pt.png') }}" class="float-end" alt="circle" srcset="" style="height: 2vh; margin-right:1.5vw">
            <img src="{{ url('image/circle-20pt.png') }}" class="float-end" alt="circle" srcset="" style="height: 2vh; margin-right:1.5vw">
          </div>
        </div>

        {{-- gambar gembok --}}
        <div class="d-flex justify-content-center w-100" style="padding-top:3vh">
          <img src="{{ url('image/padlock1.png') }}" style="height: 15vh" alt="" srcset="">
        </div>

        <form action="/forgot-password" method="POST">
        @csrf
        {{-- Forgot password dan input text --}}
        <div class="d-flex justify-content-center w-100 px-4" style="padding-top: 3vh;">
          <p class="h2 text-left" style="flex: 0">Forgot Your Password?</p>
          <div id="form1" style="flex: 1 0; padding-left: 3vw">
            <label for="email" class="form-label fw-bold h5">Email</label>
            <input name="email" type="email" id="email" class="form-control @error('email') is-invalid @enderror" aria-describedby="emailHelpBlock" value="{{ old('email') }}">
            <div id="emailHelpBlock" class="form-text">Enter your valid email to receive reseting password link.</div>
            @error('email')
            <div class="invalid-feedback mb-3">{{ $message }}</div>
            @enderror
          </div>
        </div>

        {{-- button biru --}}
        <div class="w-100 d-flex justify-content-center my-3">
          <button class="w-25 btn btn-primary">Send</button>
        </div>
        </form>

      </div>

    </div>
    
    
    
  </div>
</main>

@include('layout.footer')

@endsection
