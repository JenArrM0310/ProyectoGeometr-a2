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
   <div class="mitad" >
      <div class="card bg-dark juegos">
        <div class="card-body">
          <h5 class="card-title">Math Shot JCV <button class="btn btn-light infor" id="btnMathshot" data-toggle="tooltip" data-placement="right" title="Más información"><i class="fa fa-info" aria-hidden="true"></i></button></h5>
            <p class="card-text" >Es un juego de tiro al arco diseñado para poner a prueba tus capacidades mentales, durante la partida se pondrá un problema matemático, tu objetivo es resolver el problema, ya que se te presentaran varias opciones del resultado, tu deberás encontrar la correcta, una vez hallada tendrás que apuntar y ser lo más certero posible.</p>
            <div class="imagenes">
                <img src="\img\mathshot2.jpg" class="imagenmath" >
            </div>
            <input type="hidden" value="{{csrf_token()}}" name="_token" class="token">
            <div class="botones">
               <a class="btn btn-primary btn-lg btn_descarga" data-id="5"><i class="fa fa-download" aria-hidden="true"></i> Descargar el juego</a>
            </div>
         </div>
      </div>
   </div>
   <div class="mitad2">
      <div class="card bg-danger juegos" >
         <div class="card-body">
          <h5 class="card-title">Juego de la ruleta <button class="btn btn-light infor" id="btnRuleta" data-toggle="tooltip" data-placement="right" title="Más información"><i class="fa fa-info" aria-hidden="true"></i></button></h5>
            <p class="card-text" >Es una aplicación móvil que te permitirá poner en práctica los conceptos que has adquirido sobre derivadas, mediante una ruleta que te dará diferentes problemas a resolver. Tu objetivo será resolver cada uno de esos problemas, eligiendo la opción correcta. Para obtener el ejercicio, tedrás que girar la ruleta.</p>
            <div class="imagenes">
              <img src="\img\ruletaprincipal.jpg" class="imagen" >
            </div>
            <div class="botones">
               <a href="https://www.dropbox.com/s/rlega2ogh0cavku/app-ruleta.apk?dl=1" class="btn btn-primary btn-lg btn_descarga" data-id="6"><i class="fa fa-download" aria-hidden="true"></i> Descargar el juego</a>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalInfoDiferencial" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">¿Cómo se juega?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div id="infoMathshot" class="infoJuegos">
            <p>El juego contiene diversos problemas a resolver, los cuales cuentan con varias opciones de resultado cada uno. Deberás de encontrar la respuesta correcta y ser lo más certero posible ya que se maneja un sistema de puntuación, y entre más cerca del punto central mayor será la puntuación, en caso de fallar el tiro o escoger una opción equivocada, se otorgará otro tiro pero no se obtendrán puntos con este, el juego contará con 50 niveles.</p>
            <div class="imagenes">
                <img src="\img\mathshot.jpg" class="imagenmath" >
            </div>
            <p>Se podra contar con un usuario y se irá subiendo de nivel con forme avance el juego, por lo cual los problemas también subirán de dificultad, se pretende poner un modo de juego que sea contra reloj.</p>
            <p>
              <h5>Sistema de puntuación</h5>
              El tablero está dividido en 7 partes las cuales te otorgarán los siguientes puntos:
              </p>
              <div id="puntaje">
                <div>1………….. 50 pts</div>
                <div>2………….. 40 pts</div>
                <div>3………….. 35 pts </div>
                <div>5………….. 15 pts </div>
                <div>6………….. 10 pts </div>
                <div>7…………..  5 pts </div>
            </div>
                <div class="imagenes" id="imgpuntaje">
                <img src="\img\mathshot3.jpg" >
                </div>
         </div>
         <div id="infoRuleta" class="infoJuegos">
            <p>La aplicación cuenta con dos interfaces principales. La primera interfaz contiene la ruleta, además de un botón, en el cual tendrás que dar click para que comienze a girar. Una vez que se detenga, te mostrará un número, el cual tendrás que seleccionar en la ruleta para obtener el problema a resolver.</p>
            <div class="imagenes">
              <img src="\img\ruleta2.jpg" class="imagen_centrada" >
            </div>
            <p>La siguiente interfaz contiene el problema a resolver, así como diferentes opciones, entre las cuales está el resultado correcto.</p>
            <div class="imagenes">
              <img src="\img\ruleta3.jpg" class="imagen_centrada" >
            </div>
            <p>Dependiendo de si tu respuesta fue correcta o incorrecta, la aplicación te mostrará un mensaje</p>
            <div class="imagenes">
              <img src="\img\ruleta4.jpg" class="imagen_horizontal" >
              <img src="\img\ruleta5.jpg" class="imagen_horizontal" >
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