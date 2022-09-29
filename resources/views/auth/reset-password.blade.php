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
    <div class="col-md-3 text-start">
      <img src="{{ url('image/reset1.png') }}" alt="forget1" srcset="" style="width:20vw" >
    </div>
    
    {{-- kotak biru kanan --}}
    <div class="col-md-4 d-block custom-rounded-bottom shadow-sm" style=" background-color:#D8E3F2;">

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
        <img src="{{ url('image/gear-1.png') }}" style="height: 7vh" alt="" srcset="">
      </div>

      <form action="/reset-password" method="POST">
      @csrf
      {{-- Forgot password dan input text --}}
      <p class="h2 text-center" style="flex: 0; padding-top: 3vh;">Reset Password?</p>
      <div class="d-flex justify-content-center w-100 px-4" style="padding-top: 3vh;">
            <div class="w-75">

              <input type="hidden" name="token" value="{{ $token }}">

              <label for="email" class="form-label fw-bold h5">Email</label>
              <input type="email" id="email" class="form-control mb-2 @error('email') is-invalid @enderror" value="{{ $email }}" disabled>
              <input type="hidden" name="email" value="{{ $email }}">
              <div class="form-text mb-3"></div>
              @error('email')
              <div class="invalid-feedback mb-3">{{ $message }}</div>
              @enderror
              
              <label for="password" class="form-label fw-bold h5">New Password</label>
              <input name="password" type="password" id="password" class="form-control mb-2 @error('password') is-invalid @enderror" aria-describedby="passwordHelpBlock">
              <div id="passwordHelpBlock" class="form-text mb-3">Enter your new password.</div>
              @error('password')
              <div class="invalid-feedback mb-3">{{ $message }}</div>
              @enderror

              <label for="confirm-password" class="form-label fw-bold h5">Confirm Password</label>
              <input name="password_confirmation" type="password" id="confirm-password" class="form-control" aria-describedby="confirmation-passwordHelpBlock">
              <div id="confirmation-passwordHelpBlock" class="form-text mb-3">Enter your password once again.</div>

              {{-- @dd($errors) --}}
            </div>
      </div>

      {{-- button biru --}}
      <div class="w-100 d-flex justify-content-center my-3">
        <button class="w-25 btn btn-primary">Send</button>
      </div>

      
      </form>

    </div>
    
    
    
  </div>
</main>

@include('layout.footer')

@endsection
