@php
   $rol=session()->get('rol');
   if($rol == "administrador"){
        $plantilla="Plantillas.LayoutAdministrador";
   }else{
        $plantilla="Plantillas.LayoutEstudiante";
   }   
@endphp
@extends($plantilla)
@section('content')
<div class="contenedorP">
   <div class="mitad">
      <div class="card bg-secondary juegos">
         <div class="card-body">
            <h5 class="card-title">Serpientes y escaleras <button class="btn btn-light infor" id="btnSerpientes" data-toggle="tooltip" data-placement="right" title="Más información"><i class="fa fa-info" aria-hidden="true"></i></button></h5>
            <p class="card-text" >El juego tiene como objetivo aplicar los conocimientos adquiridos de cálculo integral por medio del juego "Serpientes y escaleras". Este juego está basado principalmente en lanzar un dado y ver cuántas casillas avanza, cuando tú llegues a cada uno de las casillas te encontrarás con un ejercicio a resolver, puede ser una integral básica o compleja. </p>
             <div class="imagenes">
              <img src="\img\serpientes.jpg" class="imagen" >
            </div>
            <input type="hidden" value="{{csrf_token()}}" name="_token" class="token">
            <div class="botones">
               <a class="btn btn-primary btn-lg btn_descarga" data-id="3"><i class="fa fa-download" aria-hidden="true"></i> Descargar el juego</a>
            </div>
         </div>
      </div>
   </div>
   <div class="mitad2">
      <div class="card  bg-info juegos" >
         <div class="card-body">
         	<h5 class="card-title">APP Integrales  <button class="btn btn-light infor" id="btnIntegrales" data-toggle="tooltip" data-placement="right" title="Más información"><i class="fa fa-info" aria-hidden="true"></i></button></h5>
            <p class="card-text" >El juego consiste en una ronda de ejercicios con límite de tiempo. Se deberá completar n cantidad de aciertos en cada ronda para acceder a temas cada vez más avanzados en los siguientes niveles. El contenido de los ejercicios serían sobre integrales, con dos temas a tratar en la aplicación; Integrales indeﬁnidas e Integrales deﬁnidas. </p>
            <div class="imagenes">
              <img src="\img\integrales.png" class="imagen" >
            </div>
            <div class="botones">
               <a class="btn btn-primary btn-lg btn_descarga" data-id="4"><i class="fa fa-download" aria-hidden="true"></i> Descargar el juego</a>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalInfoIntegrales" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">¿Cómo se juega?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div id="infoSerpientes" class="infoJuegos">
               La aplicación cuenta con un botón el cual determina el puntaje que tu vas a avanzar, una vez que tú llegues a cada uno de los recuadros te encontrarás con una pregunta basada en el cálculo integral es decir te puedes encontrar con una integral básica como con a una integral compleja. Si respondes bien la pregunta te arrojará un puntaje y dependiendo en la casilla que te encuentres eso es lo que te va a incrementar, si tu respuesta es errónea la misma aplicación te arrojará cuánto puntaje vas a bajar. En dado caso de que tú llegues a una serpiente de igual manera bajaras de puntaje.
            </div>
            <div id="infoIntegrales" class="infoJuegos">
                <p>Con una base de ejercicios, se espera arrojar problemas aleatorios cada que se inicie el nivel, se le permitirá al usuario acceder a un siguiente nivel si obtiene el 100% de los ejercicios correctos por nivel; Cada nivel tendrá 10 ejercicios a resolver en un tiempo considerable (siendo un tiempo mayor en los niveles iniciales a comparación de los niveles avanzados). Y al ﬁnal, se realizara un Quizz con aproximadamente 20 ejercicios, con varios ejercicios de cada nivel, el usuario pasara a un tema diferente si obtiene un mínimo de 80% de ejercicios correctos. </p>
                <p>Las interfaces de la aplicación son 4:  Interfaz de inicio (2 botones; Jugar y tips), Interfaz de temas (2 botones: Integrales Indeﬁnidas e Integrales deﬁnidas), Interfaz de niveles (Con botones para cada nivel) e Interfaz de juego (Donde aparecerá el problema a resolver, un reloj, un texﬁeld para introducir resultados y un boton para regresar al inicio en caso de abandonar el juego). Cada interfaz tiene un botón para regresar a la interfaz anterior.</p>
            </div>        
      </div>
      <div class="modal-footer">
        <div class="botones">
          <button type="button" class="btn btn-danger btn-block" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection