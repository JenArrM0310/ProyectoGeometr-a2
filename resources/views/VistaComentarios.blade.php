@extends('Plantillas.LayoutEstudiante')
@section('content')
<div class="contenedor">
	<div class="card bg-light cuadro">
		<div class="card-title titulo">
           <h3 class="text-center">Formulario de Comentarios</h3>
        </div>
        <div class="card-body">
           <form method="post" action="{{route('comentario.insertarComentario')}}">
           	{!! csrf_field() !!}
              <div class="form-group">
                 <label>Escribe tu comentario:</label>
                 <textarea name="comentario" rows="6" placeholder="El texto no debe ser mayor a 350 caracteres" class="form-control">{{old('comentario')}}</textarea>
                 @if ($errors->has('comentario'))
                         <div class="alert alert-danger" role="alert">
                            {{ $errors->first('comentario') }}
                         </div>
                      @endif
              </div>
              <div class="form-group">
                   <label>¿El sistema te ayudó a reforzar tus conocimientos?:</label>
                   <div class="form-row">
                      <div class="col">
                      	<label><input type="radio" name="respuesta" value="si" id="check1"> Si me ayudó </label>
                      </div>
                      <div class="col">
                      	<label><input type="radio" name="respuesta" value="no" id="check2" > No me ayudó</label>
                      </div>
                   </div>
                   @if ($errors->has('respuesta'))
                         <div class="alert alert-danger" role="alert">
                            {{ $errors->first('respuesta') }}
                         </div>
                   @endif

              </div>
              <input type="hidden" name="id_user" value="<?php echo session()->get('id'); ?>">
              <button class="btn btn-primary btn-block"><i class="fa fa-paper-plane" aria-hidden="true"></i>
 Enviar</button>
           </form>
        </div>
	</div>
</div>
@endsection