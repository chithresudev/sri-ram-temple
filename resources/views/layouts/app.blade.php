<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->

    <!-- Bootstrap CSS -->

    <link href="{{ asset('css/material-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:400,500|Monda&display=swap" rel="stylesheet"> -->

    @stack('styles')
</head>
<body>
    <!-- Header Section -->
    @php
      $route = Route::currentRouteName();
    @endphp

    @if ($route != 'login')
      <header>@include('shared.navbar')</header>
      <aside>@include('shared.sidebar')</aside>
    @endif

    <!-- Main Section -->
    <main>
        @yield('content')
    </main>

    <!-- Footer Section -->
    <footer></footer>

     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    {{-- <script src="{{ asset('js/popper.min.js') }}"></script> --}}
    <script src="{{  asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/feather.min.js') }}"></script>
    {{-- <script src="{{ asset('js/kovil.js') }}"></script> --}}
    @stack('script')
</body>
</html>
