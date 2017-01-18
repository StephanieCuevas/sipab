<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../favicon.ico">

    <title>SIPAB</title>



    <link href="{{ asset('/assets/css/bootstrap.css') }}" rel="stylesheet">
   <script src="{{ asset('/assets/js/bootstrap.js') }}"></script>
   <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('/jquery.tablesorter/jquery-latest.js') }}"></script>
   <script src="{{ asset('/jquery.tablesorter/jquery.tablesorter.js') }}"></script>

<link rel="stylesheet" href="/jquery.tablesorter/docs/css/jq.css" type="text/css" media="print, projection, screen" />
<link rel="stylesheet" href="/jquery.tablesorter/themes/blue/style.css" type="text/css" id="" media="print, projection, screen" />



     
    <script src="/assets/js/npm.js"></script>


  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/') }}">SIPAB 2017</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">



            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reclutamiento Personal<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Captura de prospecto</a></li>
                <li><a href=" {{route('reclutamiento.prospecto.index')}}">Lista de prospectos</a></li>
   
              </ul>
            </li>


            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Consulta Elemento Policial<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Consulta por datos generales</a></li>
                <li><a href="#">Consulta por estatus y rango de fecha</a></li>
   
              </ul>
            </li>
            <li><a href="#contact">Seguro de vida</a></li>
            <li><a href="#contact">Credencialización</a></li>
            







          </ul>

        <ul class="nav navbar-nav navbar-right">
          @if (Auth::guest())
            
           
      <li><a href="{{route('login')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          @else

         
            <li><a href="{{route('logout')}}"><span class="glyphicon glyphicon-log-out"></span>Cerrar sesion de {{ Auth::user()->username }}</a></li>

          @endif
        </ul>



        </div><!--/.nav-collapse -->




      </div>
    </nav>

 @yield('content')



{!!Html::script('assets/js/jquery.js')!!}
{!!Html::script('assets/js/bootstrap.js')!!}
{!!Html::script('assets/js/sweetalert.min.js')!!}
    </body>
   

</html>