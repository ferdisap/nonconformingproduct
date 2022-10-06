{{-- copied from https://mdbootstrap.com/docs/standard/extended/login/ --}}
@extends('layout.app')
@section('body')


<style>
  .divider:after,
  .divider:before {
    content: "";
    flex: 1;
    height: 1px;
    background: #eee;
  }

  .h-custom {
    height: calc(100% - 5vh);
  }

  @media (max-width: 450px) {
    .h-custom {
      height: 100%;
    }
  }

</style>

<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100" style="background-color: aliceblue">
      <div class="col-md-9 col-lg-6 col-xl-5 text-center">
        {{-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image"> --}}
        <img src="{{ url('image/ptdi-logo.jpg') }}" alt="PTDI Logo" class="img-fluid rounded-5 shadow-lg">
      </div>
      <div id="form" class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

        <form action="/register" method="post">
          @csrf
          
          <!-- Name input -->
          <div class="form-outline mb-4">
            <label class="form-label h5" for="email">Complete Name</label>
            <input name="name" type="text" id="name" class="form-control form-control-lg @error('loginError') is-invalid @enderror" placeholder="Enter your complete name" @error('loginError') value="{{ old('name') }}" @enderror/>
            @error('loginError')
              <div class="invalid-feedback mb-3">{{ $message }}</div>
            @enderror
          </div>

          <!-- Username input -->
          <div class="form-outline mb-4">
            <label class="form-label h5" for="name">Username</label>
            <input name="username" type="text" id="name" class="form-control form-control-lg @error('loginError') is-invalid @enderror" placeholder="Enter your username by 6 - 8 char" @error('loginError') value="{{ old('username') }}" @enderror/>
            @error('loginError')
              <div class="invalid-feedback mb-3">{{ $message }}</div>
            @enderror
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <label class="form-label h5" for="email">Email address</label>
            <input name="email" type="email" id="email" class="form-control form-control-lg @error('loginError') is-invalid @enderror" placeholder="Enter a valid email address" @error('loginError') value="{{ old('email') }}" @enderror/>
            @error('loginError')
              <div class="invalid-feedback mb-3">{{ $message }}</div>
            @enderror
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <label class="form-label h5" for="password">Password</label>
            <input name="password" type="password" id="password" class="form-control form-control-lg @error('loginError') is-invalid @enderror" placeholder="Enter password" />
            @error('loginError')
              <div class="invalid-feedback mb-3">{{ $message }}</div>
            @enderror
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Already have Account? <a href="/login" class="link-danger">Login</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
  
  @include('layout.footer')
</section>

@endsection