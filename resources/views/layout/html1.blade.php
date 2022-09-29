<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta content="{{ csrf_token() }}" name="csrf-token">

  {{-- <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}"> --}}
  <link rel="stylesheet" href="{{ url('sass/main.css') }}">
  <link rel="stylesheet" href="{{ url('css/dump.css') }}">
  <link rel="stylesheet" href="{{ url('css/nonconformingproduct.css') }}">
  @livewireStyles

  {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
  <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
  {{-- <script src="{{ url('sass/main.js') }}"></script> --}}
  {{-- <script async src="{{ url('js/chart.min.js') }}"></script> --}}


  <title>Document</title>
</head>
<body>

  @yield('body')
  
  {{-- @livewireScripts --}}
</body>
</html>