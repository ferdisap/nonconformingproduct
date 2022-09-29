@extends('layout.html')
@section('body')
    
<main>
  <div class="d-flex justify-content-center align-items-center flex-column" style="height: 95vh">
    
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ session('success') }}</strong> You should check in your email, soon.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="h4 pb-2 mb-4 text-danger border-bottom border-danger">
      Your email <strong>has not</strong> been verified.
    </div>
    <p> Click button below, if your email does not recieve notification.</p>
    <form action="/email/verification-notification" method="post">
      @csrf
      {{-- <input type="hidden" name="id" id="email" value="31"> --}}
      <input type="hidden" name="email" id="email" value="{{ $user->email }}">
      <button type="submit" class="btn btn-primary">resend</button>
    </form> 
  </div>
</main>

@include('layout.footer')

@endsection
