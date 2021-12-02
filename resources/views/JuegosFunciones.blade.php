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
      <div class="card bg-success juegos">
         <div class="card-body">
         	<h5 class="card-title">APP Ahorcado <button class="btn btn-light infor" id="btnAhorcado" data-toggle="tooltip" data-placement="right" title="Más información"><i class="fa fa-info" aria-hidden="true"></i></button></h5>
            <p class="card-text" >Es una aplicación móvil que te permitirá poner en práctica el concepto de: suma, resta, Producto, división y composición de funciones polinomiales. Te divertirás retándote a ti mismos en tener la respuesta correcta en un número finito de pasos, de lo contrario será ahorcado. Si te acuerdas de los conceptos los podrás encontrar en el juego.  </p>
            <div class="imagenes">
            	<img src="\img\ahorcado1.jpg" class="imagen" >
            </div>
            <input type="hidden" value="{{csrf_token()}}" name="_token" class="token">
            <div class="botones">
               <a href="https://www.dropbox.com/s/h3jr0y5ergnmvvu/Ahorcado.apk?dl=1" class="btn btn-primary btn-lg btn_descarga"  data-id="1"><i class="fa fa-download" aria-hidden="true"></i> Descargar el juego</a>
            </div>
         </div>
      </div>
   </div>
   <div class="mitad2">
      <div class="card bg-danger juegos" >
         <div class="card-body">
         	<h5 class="card-title">APP f(x) <button class="btn btn-light infor" id="btnRango" data-toggle="tooltip" data-placement="right" title="Más información"><i class="fa fa-info" aria-hidden="true"></i></button></h5>
            <p class="card-text" >Cuando se trabaja con funciones lo primero que nos preguntamos es qué valores puede considerar mi función para poder hacer operaciones, el concepto relacionado con ésta pregunta es el Dominio. El juego que veras ahora te ayuda a identificar el dominio de una función de manera gráfica y algebraica.</p>
            <div class="imagenes">
            	<img src="\img\dominioyrango1.jpg" class="imagen" >
            </div>
            <div class="botones">
               <a href="https://www.dropbox.com/s/ioz1nyo907gt8cd/JuegoRangoyDominio.apk?dl=1" class="btn btn-primary btn-lg btn_descarga" data-id="2"><i class="fa fa-download" aria-hidden="true"></i> Descargar el juego</a>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalInfoFunciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">¿Cómo se juega?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div id="infoAhorcado" class="infoJuegos">
            <p>Se asignará un problema, el cual tendrás que resolver. Se mostrará una imagen de un muñeco y un teclado para que puedas escribir la respuesta correcta. En caso de fallar, irán apareciendo las partes del muñeco que representan el ahorcado.</p>
            <div class="imagenes">
              <img src="\img\ahorcado6.jpg" class="imagen_horizontal" >
              <img src="\img\ahorcado7.jpg" class="imagen_horizontal" >
            </div>
            <p>En caso de completar todo el muñeco, se mostrará un mensaje con la respuesta correcta.</p>
            <div class="imagenes">
              <img src="\img\ahorcado8.jpg" class="imagen_centrada" >
            </div>
         </div>
         <div id="infoRango" class="infoJuegos">
            <p>El juego ofrece 2 modalidades, de un solo jugador o de dos jugadores. Para ganar debes de contestar la mayor cantidad de preguntas. Gana el primer jugador que llegue a 10 puntos, o el que termine com mayor puntaje.</p>
            <div class="imagenes">
              <img src="\img\dominioyrango3.jpg" class="imagen_horizontal" >
              <img src="\img\dominioyrango7.jpg" class="imagen_horizontal" >
            </div>
            <p>Solo se puede seleccionar una pregunta para responder. Una respuesta correcta suma puntos, mientras que una respuesta incorrecta resta puntos.</p>
            <div class="imagenes">
              <img src="\img\dominioyrango4.jpg" class="imagen_horizontal" >
              <img src="\img\dominioyrango5.jpg" class="imagen_horizontal" >
            </div>
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