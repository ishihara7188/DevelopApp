<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
      <script src="{{ asset('js/app.js') }}" defer></script>
       <!-- Fonts -->
       <link rel="dns-prefetch" href="https://fonts.gstatic.com">
       <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
       <!-- Styles -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
       <script src="https://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript" language="javascript"></script>
       <link href="{{ asset('css/app.css') }}" rel="stylesheet">
       <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
  </head>
  <body>
      @include('partials.header')
      <div class="container">
          @yield('content')
      </div>
  </body>
</html>
