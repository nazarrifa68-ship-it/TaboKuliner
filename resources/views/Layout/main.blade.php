<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('css/Main.css')}}">
  <title>@yield('title', 'Tabo Kuliner')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @yield('css')
</head>
<body>
    {{-- NAVBAR --}}
    @include('Component.navbar')

    {{-- CONTENT --}}
    @yield('content')

    @include('Component.footer')
</body>
<script src="{{asset('js/main.js')}}"></script>
@yield('js')
</html>