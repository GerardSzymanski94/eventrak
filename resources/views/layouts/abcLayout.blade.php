<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    @include('teamplate.header')
  </head>

  <body class="abcLayout-register">
    <div class="main">
      <div class="logotype-page">
        <img src="{{ asset('images/logo-abc.jpg') }}" alt="abc">
      </div>

      @yield('content')
    </div>

    @include('teamplate.scripts')
  </body>
</html>