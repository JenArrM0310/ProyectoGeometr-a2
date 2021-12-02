@extends('Plantillas.LayoutAdministrador')
@section('content')
<div class="menuEstadisticas">
	<div class="boton1"><button class="btn btn-info boton"id="acceso_usuario"><i class="fa fa-bar-chart" aria-hidden="true"></i> N.° de veces que ha ingresado un usuario <i class="fa fa-user" aria-hidden="true"></i></button></div>
	<div class="boton2"><button class="btn btn-info boton"id="descarga_juego"><i class="fa fa-bar-chart" aria-hidden="true"></i> N.° de veces que se ha descargado un juego <i class="fa fa-download" aria-hidden="true"></i></button></div>
</div>
<div class="contenedorP" id="tacceso">
	<div class=" card bg-light tituloTabla"><h3 class="card-title">Estadística de cuántas veces ha ingresado un usuario </h5></div>
	<div class="table-responsive contenedorTabla">
		<table class="table table-striped table-bordered tablas" id="tabla_acceso" data-order='[[ 2, "asc" ]]'>
			<thead>
				<tr>
					<th>Nombre <i class="fa fa-user" aria-hidden="true"></i></th>
					<th>Email <i class="fa fa-envelope" aria-hidden="true"></i></th>
					<th>N.° de veces que ha ingresado <i class="fa fa-sign-in" aria-hidden="true"></i></th>
					<th>Último acceso <i class="fa fa-calendar" aria-hidden="true"></i> <i class="fa fa-clock-o" aria-hidden="true"></i></th>
				</tr>
			</thead>
			<tbody>
				@foreach($consulta as $acceso)
				<tr>
					<td>{{$acceso->nombre}}</td>
					<td>{{$acceso->email}}</td>
					<td>{{$acceso->inicio_sesion}}</td>
					<td>{{$acceso->ultimo_acceso}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<div class="contenedorP"  id="tjuegos">
	<div class="contenedorTabla">
		<div class=" card bg-light tituloTabla"><h3 class="card-title">Estadística de cuántas veces se ha descargado un juego</h5></div>
		<table class="table table-striped table-bordered tablas" id="tabla_juegos" data-order='[[ 1, "asc" ]]'>
			<thead>
				<tr>
					<th>Nombre juego <i class="fa fa-gamepad" aria-hidden="true"></i></th>
					<th>N.° de descargas <i class="fa fa-download" aria-hidden="true"></i></th>
					<th>Última descarga <i class="fa fa-calendar" aria-hidden="true"></i> <i class="fa fa-clock-o" aria-hidden="true"></i></th>
				</tr>
			</thead>
			<tbody>
				@foreach($juegos as $info)
				<tr>
					<td>{{$info->nombre_juego}}</td>
					<td>{{$info->num_descargas}}</td>
					<td>{{$info->ultima_descarga}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection