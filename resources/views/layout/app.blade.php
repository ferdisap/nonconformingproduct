<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta content="{{ csrf_token() }}" name="csrf-token">

  <link rel="stylesheet" href="{{ url('sass/main.css') }}">
  <link rel="stylesheet" href="{{ url('css/icons/main.css') }}"> <!-- icon -->
  <link rel="stylesheet" href="{{ url('css/dump.css') }}">
  <link rel="stylesheet" href="{{ url('css/nonconformingproduct.css') }}">

  <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
  {{-- <script>
    const evn = new Event('charteditorStarted');
  </script> --}}

  <title>Document</title>
</head>
<body>

  @yield('body')
  
</body>
</html>