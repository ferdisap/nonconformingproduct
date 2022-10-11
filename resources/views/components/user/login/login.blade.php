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

  @if (session('success'))
  <div class="alert alert-success alert-dismissible fade show fixed-top" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100" style="background-color: aliceblue">
      <div class="col-md-9 col-lg-6 col-xl-5 text-center">
        {{-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image"> --}}
        <img src="{{ url('image/ptdi-logo.jpg') }}" alt="PTDI Logo" class="img-fluid rounded-5 shadow-lg" style="max-width: 400px">
      </div>
      <div id="form" class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

        <form action="/login" method="post">
          @csrf
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3">Sign in with</p>
            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-facebook-f"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-twitter"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-linkedin-in"></i>
            </button>
          </div>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0">Or</p>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input name="email" type="email" id="email" class="form-control form-control-lg @error('loginError') is-invalid @enderror" placeholder="Enter a valid email address" @error('loginError') value="{{ old('email') }}" @enderror/>
            <label class="form-label" for="email">Email address</label>
            @error('loginError')
              <div class="invalid-feedback mb-3">{{ $message }}</div>
            @enderror
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input name="password" type="password" id="password" class="form-control form-control-lg @error('loginError') is-invalid @enderror"" placeholder="Enter password" />
            <label class="form-label" for="password">Password</label>
            @error('loginError')
              <div class="invalid-feedback mb-3">{{ $message }}</div>
            @enderror
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input name="rememberMe" class="form-check-input me-2" type="checkbox" value="" id="rememberMe" />
              <label class="form-check-label" for="rememberMe"> Remember me</label>
            </div>
            <a href="/forgot-password" class="text-body">Forgot password?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="/register" class="link-danger">Register</a></p>
            {{-- <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <span class="link-danger">Register</a></p> --}}
          </div>

        </form>
      </div>
    </div>
  </div>
  
  @include('layout.footer')
</section>

@endsection