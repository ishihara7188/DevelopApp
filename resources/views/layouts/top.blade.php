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
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
       <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
       <link href="{{ asset('css/app.css') }}" rel="stylesheet">
       <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
  </head>
  <body>
      @include('partials.header')
      <div class="container">
          @yield('content')
      </div>
  <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
  <script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
  <script>
    flatpickr(document.getElementById('shift_time'), {
      locale: 'ja',
      dateFormat: "Y/m/d",
      minDate: new Date()
    });
  </script>
  </body>
</html>
