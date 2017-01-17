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


    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/sweetalert.css" rel="stylesheet">



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
          <a class="navbar-brand" href="/">SIPAB 2017</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">


            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reclutamiento Personal<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Captura de prospecto</a></li>
                <li><a href="#">Lista de prospectos</a></li>
   
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