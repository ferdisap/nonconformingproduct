<h1 class="my-2">Username and Password</h1> 

<div>
<!-- Username -->
  <h3>Username</h3>
  <form action="/dashboard/users-unmpwd/1" method="POST">
    @csrf
    @method('PUT')
  <div class="my-3 col-md-6">
    <input f-model="users" name="username" type="text" class="form-control" id="username" value="{{ Auth::user()->username }}1">
  </div>
  <button type="submit" class="btn btn-primary">save</button>
</form>
  
  <div class="my-5"></div>

  <!-- password -->
  <h3>Password</h3>
  <div class="my-3 col-md-6">
    <label for="old-password" class="form-label h6">Old</label>
    <input f-model="users" name="old-password" type="text" class="form-control" id="old-password">
    <label for="new-password" class="form-label h6">New</label>
    <input f-model="users" name="new-password" type="text" class="form-control" id="new-password" >
  </div>
  <button class="btn btn-primary">save</button>
</div>



 {{-- <div> this view come from livewire: usernameandpassword</div> --}}