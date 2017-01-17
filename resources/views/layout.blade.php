<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>SIPAB</title>


    <link href="{{ asset('/assets/css/bootstrap.css') }}" rel="stylesheet">
   <script src="{{ asset('/assets/js/bootstrap.js') }}"></script>
   <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
     
    <script src="/assets/js/npm.js"></script>

  </head>

  <body>


   <!-- Menu lateral -->
        @include('partes.menu')


        @yield('content')


    </body>


</html>