<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@lang('auth.login-title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('../assets/css/custom.css') }}" rel="stylesheet">
      <link rel="shortcut icon" href="/img/fav-icon.png">
    <style>
      body {
        font-family: "Arial";
      }
    </style>
</head>
<body style="position:fixed;width:100%; height:100%;">
    <div id="background-div" style="position:absolute;top:0;left:0;width:100%;height:100%">
    </div>
    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
    </script>
</body>
</html>
