<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

  <x-user.settings type="error" :pesan="$messagea" selected="true"/>
  
  
  {{-- @include('components.user.settings') --}}
  <br><br><br>
  @livewireStyles
  <livewire:counter/>
  @livewireScripts
</body>
</html>