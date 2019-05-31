<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    @include('teamplate.header')

    <style>
      @font-face {
        font-family: 'Myriad Pro';
        src: url('{{asset('/fonts/MyriadPro-Bold.eot')}}');
        src: url('{{asset('/fonts/MyriadPro-Bold.eot?#iefix')}}') format('embedded-opentype'),
            url( '{{asset('/fonts/MyriadPro-Bold.woff')}}') format('woff');
        font-weight: bold;
        font-style: normal;
      }

      @font-face {
        font-family: 'Myriad Pro';

        src: url('{{asset('/fonts/MyriadPro-Semibold.eot')}}');
        src: url('{asset('/fonts/MyriadPro-Semibold.eot?#iefix')}}') format('embedded-opentype'),
        url('{asset('/fonts/MyriadPro-Semibold.woff')}}')format('woff');
        font-weight: 600;
        font-style: normal;
      }

      @font-face {
        font-family: 'Myriad Pro';
        src: url('{{asset('/fonts/MyriadPro-Regular.eot')}}');
        src: url('{{asset('/fonts/MyriadPro-Regular.eot?#iefix')}}') format('embedded-opentype'),
            url('{{asset('/fonts/MyriadPro-Regular.woff')}}') format('woff');
        font-weight: normal;
        font-style: normal;
      }

      @font-face {
        font-family: 'Museo 900';
        src: url('{{asset('/fonts/Museo900-Regular.eot')}}');
        src: url('{{asset('/fonts/Museo900-Regular.eot?#iefix')}}') format('embedded-opentype'),
            url('{{asset('/fonts/Museo900-Regular.woff')}}') format('woff');
        font-weight: 900;
        font-style: normal;
      }

    </style>
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