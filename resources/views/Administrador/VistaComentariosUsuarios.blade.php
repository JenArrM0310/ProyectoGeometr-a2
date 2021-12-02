@extends('Plantillas.LayoutAdministrador')
@section('content')
@if(session()->has('respondido'))
   {!!"<script>Swal.fire('Listo', 'Has respondido al comentario', 'success')</script>"!!}
@endif
@if(session()->has('eliminado'))
   {!!"<script>Swal.fire('Listo', 'Se ha eliminado el comentario', 'success')</script>"!!}
@endif
<div class="contenedorP">
   <div class="table-responsive contenedorTabla">
   	   <div class=" card bg-light tituloTabla"><h3 class="card-title">Comentarios de los usuarios</h3></div>
		<table class="table table-striped table-bordered tablas" id="tabla_comentarios" data-order='[[ 5, "desc" ]]' >
		   <thead>
		      <tr>
			   <th>Nombre <i class="fa fa-user" aria-hidden="true"></i></th>
				 <th>Email <i class="fa fa-envelope" aria-hidden="true"></i></th>
				 <th>Comentario <i class="fa fa-comment" aria-hidden="true"></i></th>
				 <th>Le fue de utilidad <i class="fa fa-thumbs-up" aria-hidden="true"></i></th>
				 <th>Estado <i class="fa fa-check" aria-hidden="true"></i></th>
				 <th>Fecha/hora <div style="text-align: center;"><i class="fa fa-calendar" aria-hidden="true"></i> <i class="fa fa-clock-o" aria-hidden="true"></i></div></th>
				 <th>Acciones <div style="text-align: center;"><i class="fa fa-tasks" aria-hidden="true"></i></div></th>
			  </tr>	
		   </thead>
		   <tbody>
		   	@foreach($consulta as $comentario)
		      <tr>
				<td>{{$comentario->nombre}}</td>
				<td>{{$comentario->email}}</td>
				<td>{{$comentario->comentario}}</td>
				<td>{{$comentario->pregunta}}</td>
				<td>{{$comentario->estado}}</td>
				<td>{{$comentario->fecha_comentario}}</td>
				<td>
					<button class="btn btn-primary btn_responder" data-id="{{$comentario->id_comentario}}" data-toggle="tooltip" data-placement="top" title="Responder comentario"><i class="fa fa-reply" aria-hidden="true"></i></button><a style="color:white;">.</a><button class="btn btn-danger btn_eliminar_comentario" data-id="{{$comentario->id_comentario}}" data-toggle="tooltip" data-placement="top" title="Eliminar comentario"><i class="fa fa-trash" aria-hidden="true"></i></button>
				</td>
				
			@endforeach
		   </tbody>
		</table>
   </div>
</div>
@if (count($errors) > 0)
    <script type="text/javascript">
        $( document ).ready(function() {
             $('#modalResComentario').modal('show');
        });
    </script>
  @endif
<!-- Modal Responder Comentario-->
<div class="modal fade" id="modalResComentario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Responder comentario</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('responderComentario')}}" >
           	{!! csrf_field() !!}
            <div class="form-group">
            	<input type="hidden" name="id_user" class="id_user" value="{{old('id_user')}}">
            	<label>Respuesta:</label>
            	<textarea class="form-control" rows="3" name="respuesta" placeholder="Escriba su respuesta" id="respuesta">{{old('respuesta')}}</textarea>
            	<small id="passwordHelpBlock" class="form-text text-muted">
                     La respuesta no debe de contener más de 350 caracteres
                 </small>
                 @if($errors->has('respuesta'))
                    <div class="alert alert-danger" role="alert">
                       {{ $errors->first('respuesta') }}
                    </div>
                 @endif
            </div>
            <div class="alert alert-success" role="alert" id="aviso_res"></div>
              <button class="btn btn-primary btn-block" id="btn_responder_comentario"><i class="fa fa-reply" aria-hidden="true"></i>
 Responder</button>
           </form>
      </div>
      <div class="modal-footer">
        <div class="botones">
            <button type="button" class="btn btn-danger btn-block" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal Eliminar Comentario-->
<div class="modal fade" id="modalEliminarComentario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Eliminar comentario</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>¿Desea eliminar el comentario?</h3>
        <h5 id="comentario_eliminar"></h5>
        <h4>Del usuario:</h4>
        <h5 id="nombre_usuario"></h5>
        <form method="post" action="{{route('eliminarComentario')}}" >
            {!! csrf_field() !!}
            <input type="hidden" id="id_comentario" name="id_comentario">
            <div class="alert alert-danger" role="alert" id="aviso"></div>
              <button class="btn btn-danger btn-block" id="btn_eliminar_comentario"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button>
        </form>
      </div>
      <div class="modal-footer">
        <div class="botones">
            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection