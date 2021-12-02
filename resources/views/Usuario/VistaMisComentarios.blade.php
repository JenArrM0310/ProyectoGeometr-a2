@extends('Plantillas.LayoutEstudiante')
@section('content')
@if(session()->has('mensaje'))
   {!!"<script>Swal.fire('Listo', 'Se ha enviado tu comentario', 'success')</script>"!!}
@endif
@if(session()->has('error'))
   {!!"<script>Swal.fire('Error', 'No trate de acceder a los comentarios de otros usuarios', 'error')</script>"!!}
@endif
<div class="contenedorP">
	<div class="table-responsive contenedorTabla">
		<div class=" card bg-light tituloTabla"><h3 class="card-title">Mis comentarios</h5></div>
		<table class="table table-striped table-bordered tablas" id="tabla_miscomentarios" data-order='[[ 1, "desc" ]]' >
			<thead>
		      <tr>
				 <th>Comentario <i class="fa fa-comment" aria-hidden="true"></i></th>
				 <th>Fecha comentario 
				 	 <i class="fa fa-calendar" aria-hidden="true"></i> <i class="fa fa-clock-o" aria-hidden="true"></i>
				 </th>
				 <th>Respuesta <i class="fa fa-thumbs-up" aria-hidden="true"></i></th>
				 <th>Fecha respuesta <i class="fa fa-calendar" aria-hidden="true"></i> <i class="fa fa-clock-o" aria-hidden="true"></i></th>
			  </tr>	
		   </thead>
		   <tbody>
		   	@foreach($consulta as $comentario)
		      <tr>
				<td>{{$comentario->comentario}}</td>
				<td>{{$comentario->fecha_comentario}}</td>
				<td>{{$comentario->respuesta}}</td>
				<td>{{$comentario->fecha_respuesta}}</td>
			@endforeach
		   </tbody>
		</table>
		</table>
	</div>
</div>
@endsection