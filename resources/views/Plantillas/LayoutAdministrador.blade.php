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
<body id="vistausuario">

    <!--  navbar -->
<div class="contenedormenu">
   <div class="barra" id="barra">
     <nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="{{route('vistaUsuario')}}" data-toggle="tooltip" data-placement="right" title="Página principal">
    <img src="\img\logo.png" width="60" height="60" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2" id="navbarSupportedContent">
    <ul class="navbar-nav">
       <!--algebra lineal-->
       <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:azure">
          Álgebra Lineal
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
             <a class="dropdown-item" href="<?php echo route('videosMaterias', 1); ?>">Videos sistemas de ecuaciones</a>
          </div>
       </li>
       <!--Funciones Matemáticas-->
       <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:azure">
          Funciones Matemáticas
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
             <a class="dropdown-item" href="{{route('JuegosFunciones')}}">Juegos</a>
          </div>
       </li>
       <!--Cálculo-->
       <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" style="color:azure">Cálculo</a>
             <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="javascript:void(0)" >Cálculo Diferencial <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                   <ul class="submenu dropdown-menu">
                      <li><a class="dropdown-item" href="javascript:void(0)">Límites</a></li>
                      <li><a class="dropdown-item" href="{{route('JuegosDiferencial')}}">Juegos</a></li>
                   </ul>
                </li>
                <li><a class="dropdown-item" href="javascript:void(0)">Cálculo Integral <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                   <ul class="submenu dropdown-menu">
                      <li><a class="dropdown-item" href="{{route('JuegosIntegrales')}}">Juegos</a></li>
                   </ul>
                </li>
                <li><a class="dropdown-item" href="javascript:void(0)">Cálculo Multivariable</a></li>
              </ul>
        </li>
        <!--Ecuaciones Diferenciales-->
           <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:azure">
              Ecuaciones Diferenciales
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                 <a class="dropdown-item" href="javascript:void(0)">Opción 1</a>
                 <a class="dropdown-item" href="javascript:void(0)">Opción 2</a>
              </div>
           </li>
         <!--Probabilidad y estadística-->
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:azure">
               Probabilidad y Estadística
               </a>
               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="javascript:void(0)">Opción 1</a>
                  <a class="dropdown-item" href="javascript:void(0)">Opción 2</a>
               </div>
            </li>
            <!--Matemáticas Computacionales-->
           <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:azure">
              Matemáticas Computacionales
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                 <a class="dropdown-item" href="javascript:void(0)">Matemáticas Discretas</a>
                 <a class="dropdown-item" href="javascript:void(0)">Métodos Numéricos</a>
              </div>
           </li>
           <!--Administración-->
           <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:azure">
              Administración
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                 <a class="dropdown-item" href="{{route('comentariosUsuarios')}}">Comentarios</a>
                 <a class="dropdown-item" href="{{route('Estadisticas')}}">Estadísticas</a>
                 <a class="dropdown-item" href="{{route('CargaAviso')}}">Carga de avisos</a>
                 <a class="dropdown-item" href="{{route('CargaVideo')}}">Carga de videos</a>
                 <a class="dropdown-item" href="{{route('avisosCargados')}}">Avisos cargados</a>
                 <a class="dropdown-item" href="{{route('videosCargados')}}">Videos cargados</a>
              </div>
           </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle dropleft" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:azure">
               <i class="fa fa-user" aria-hidden="true"></i>
               </a>
               <div class="dropdown-menu dropdown-menu-right" id="cerrar" aria-labelledby="navbarDropdown">
                <a class="dropdown-item">Administrador</a>
                  <a class="dropdown-item"><?php
                     $valor_almacenado = session()->get('usuario');
                     echo $valor_almacenado; 
                   ?></a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{route('logout')}}">Cerrar Sesión <img src="../../img/cerrar.png" width="20px" height="20px"></a>
               </div>
            </li>
      </ul>
  </div>
  
</nav>
   </div>
</div>

  @yield('content')


</body>
</html>