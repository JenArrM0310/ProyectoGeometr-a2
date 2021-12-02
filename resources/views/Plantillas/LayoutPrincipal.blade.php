<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Sistema Web de Geometría</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{ asset('js/Complementos.js') }}"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('css/Estilos.css') }}">      
   
</head>

<!--imagen de fondo-->
<body id="vistalogin">
<nav class="navbar navbar-expand-sm navbar-light bg-light barra_principal">
  <a class="navbar-brand">
    <img src="\img\logo.png" width="60" height="60" alt="">
    </a> 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('Login')}}" style="color:azure"><i class="fa fa-sign-in" aria-hidden="true"></i>
 Iniciar Sesión </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('Registro')}}" style="color:azure"><i class="fa fa-user-plus" aria-hidden="true"></i>
 Registro</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#modalRecomendaciones" style="color:azure" data-toggle="modal" data-target="#modalRecomendaciones"><i class="fa fa-info" aria-hidden="true"></i>
 Recomendaciones</a>
      </li>
    </ul>
  </div>
</nav>

<!-- contenido de la pagina -->
@yield('content')

<!--pie de pagina-->
<footer class="text-white text-center text-lg-start"style="background-color: #191970 ;">
  <div class="container p-4 ">
    <div class="row">
      <div class="container">
      <div class="row justify-content-md-center">
        <p>
        La Universidad Politécnica de Querétaro es una institución incluyente, 
        no hace distinción alguna en los servicios que brinda.
        </p>
      </div>
    </div>
  </div>
  <div class="text-center p-4" style="background-color:  #C70039 ;">
  © 2021 Universidad Politécnica de Querétaro
    <a class="text-white" href="https://www.upq.mx//">upq.mx</a>
  </div>
</footer>



</body>
</html>
<!-- Modal Recomendaciones -->
<div class="modal fade" id="modalRecomendaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Recomendaciones para una mejor experiencia</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <ul>
            <li class="recomendaciones">Tenga habilitado javascript para poder experimentar un correcto funcionamiento del sistema. Si desea conocer como habilitar dicha opción, puede visitar las siguiente páginas dependiendo del navegador que esté utilizando.
                <ul>
                  <li class="navegadores"><a href="https://support.google.com/adsense/answer/12654?hl=es" target="_blank">Para el navegador Google Chrome</a></li>
                  <li class="navegadores"><a href="https://support.mozilla.org/es/kb/JavaScript-es" target="_blank">Para el navegador Mozilla Firefox</a></li>
                  <li class="navegadores"><a href="https://www.mundocuentas.com/activar-javascript/#En_Opera" target="_blank">Para el navegador Opera</a></li>
                </ul>
            <li class="recomendaciones">Se recomienda utilizar alguno de los siguiente navegadores: Google Chrome, Mozilla Firefox u Opera.</li>
            <li class="recomendaciones">Se recomienda una resolución de por lo menos 1024x700.</li>
         </ul>
      </div>
      <div class="modal-footer">
        <div class="botones">
            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>