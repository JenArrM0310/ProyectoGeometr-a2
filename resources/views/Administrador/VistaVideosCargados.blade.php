@extends('Plantillas.LayoutAdministrador')
@section('content')
@if(session()->has('eliminado'))
   {!!"<script>Swal.fire('Listo', 'Se ha eliminado tu video', 'success')</script>"!!}
@endif
@if(session()->has('cargado'))
   {!!"<script>Swal.fire('Listo', 'Se ha cargado tu video', 'success')</script>"!!}
@endif
@if(session()->has('actualizado'))
   {!!"<script>Swal.fire('Listo', 'Se ha actualizado tu video', 'success')</script>"!!}
@endif
<div class="contenedorP">
   <div class="table-responsive contenedorTabla">
      <div class="card bg-light tituloTabla"><h3 class="card-title">Videos cargados</h3></div>
   	  <table class="table table-striped table-bordered tablas" id="tabla_misvideos" data-order='[[ 4, "desc" ]]'>
   	     <thead>
		    <tr>
			   <th>Título <i class="fa fa-header" aria-hidden="true"></i></th>
			   <th>Descripción <i class="fa fa-file-text" aria-hidden="true"></i></th>
         <th>Materia </th>
			   <th>Tipo</th>
         <th>Fecha/Hora</th>
			   <th>Video</th>
			   <th>Acciones</th>
			</tr>	
		 </thead>
		 <body>
		 	@foreach($consulta as $video)
		    <tr>
		        <td>{{$video->titulo}}</td>
		        <td>{{$video->descripcion}}</td>
            <td>{{$video->nombre_materia}}</td>
		        <td>{{$video->tipo}}</td>
            <td>{{$video->fecha_carga}}</td>
		        <td><div style="text-align: center;"><button class="btn btn-success btn_reproducir" data-toggle="tooltip" data-placement="top" title="Reproducir video" data-video="{{$video->video}}" data-nombre="{{$video->titulo}}" data-tipo="{{$video->tipo}}" data-toggle="tooltip" data-placement="top" title="Reproducir el video"><i class="fa fa-play" aria-hidden="true"></i></button></div></td>
		        <td><div style="text-align: center;"><button class="btn btn-primary btn_actualizar_video" data-video="{{$video->id_video}}" data-toggle="tooltip" data-placement="top" title="Actualizar video" ><i class="fa fa-refresh" aria-hidden="true"></i></button><span style="color:white">.</span><button class="btn btn-danger btn_eliminar_video" data-toggle="tooltip" data-placement="top" title="Eliminar video"  data-id="{{$video->id_video}}"><i class="fa fa-trash" aria-hidden="true"></i></button></div></td>
		    </tr>
		    @endforeach
		 </body>
   	     </table>
    </div>
</div>
<!-- Modal Reproducir Video -->
<div class="modal fade" id="modalVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><div id="titulo_video"></div></h5>
        <button type="button" class="close cerrar_video" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="contenedorP">
        	<video class="dir_video" controls></video>
            <iframe class="src_link" height="315"  frameborder="0" allow="accelerometer;  clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
      <div class="modal-footer">
        <div class="botones">
          <button type="button" class="btn btn-danger btn-block cerrar_video" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal Actualizar Video-->
<div class="modal fade" id="modalActualizarVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Actualizar información del video</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form method="post" action="{{route('actualizarVideo')}}">
         	{!! csrf_field() !!}
				<div class="form-group">
					<label>Título:</label>
					<input type="text" class="form-control" name="nombre_video" placeholder="Ingrese el nombre del video" value="{{old('nombre_video')}}" id="nombre_video">
					<small id="passwordHelpBlock" class="form-text text-muted">
                        No mayor a 100 caracteres. Deje el texto como está si no desea actualizarlo
          </small>
					@if($errors->has('nombre_video'))
					   <div class="alert alert-danger" role="alert">
                          {{ $errors->first('nombre_video') }}
                       </div>
					@endif
				</div>
				<div class="form-group">
					<label>Descripción:</label>
					<textarea class="form-control" rows="2" name="descripcion" placeholder="Ingrese la descripción del contenido del video" id="descripcion">{{old('descripcion')}}</textarea>
					<small id="passwordHelpBlock" class="form-text text-muted">
                        No mayor a 250 caracteres. Deje el texto como está si no desea actualizarlo
                    </small>
					@if($errors->has('descripcion'))
					   <div class="alert alert-danger" role="alert">
                          {{ $errors->first('descripcion') }}
                       </div>
					@endif
				</div>
                <div class="form-group">
					<label>Eliga la materia:</label>
					<select name="materia" class="form-control">
                       <option disabled selected value>-- Materia -- </option>
                       <option value="1">Algebra Lineal</option>
                       <option value="2">Funciones Matemáticas</option>
                       <option value="3">Cálculo Diferencial</option>
                       <option value="4">Cálculo Integral</option>
                       <option value="5">Cálculo Multivariable</option>
                       <option value="6">Ecuaciones Diferenciales</option>
                       <option value="7">Probabilidad y Estadística</option>
                       <option value="8">Matemáticas Discretas</option>
                       <option value="9">Métodos Numéricos</option>
                    </select>
                    <small id="passwordHelpBlock" class="form-text text-muted">
                        Si no desea actualizar la materia, no seleccione ninguna opción.
                    </small>
				</div>
				<input type="hidden" name="id_video" id="id_video" value="{{old('id_video')}}">
				<button class="btn btn-primary btn-block"><i class="fa fa-refresh" aria-hidden="true"></i> Actualizar</button>
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
<!-- Modal Eliminar Video-->
<div class="modal fade" id="modalEliminarVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Eliminar video</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>¿Desea eliminar el video?</h3>
        <h5 id="titulo_eliminar"></h5>
        <form method="post" action="{{route('eliminarVideo')}}" >
           	{!! csrf_field() !!}
              <input type="hidden" name="id_video" class="id_video" >
              <button class="btn btn-danger btn-block"><i class="fa fa-trash" aria-hidden="true"></i>
 Eliminar</button>
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
@if (count($errors) > 0)
    <script type="text/javascript">
        $( document ).ready(function() {
             $('#modalActualizarVideo').modal('show');
        });
    </script>
  @endif
@endsection