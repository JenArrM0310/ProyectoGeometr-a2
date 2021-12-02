@extends('Plantillas.LayoutAdministrador')
@section('content')
<div class="contenedor">
	<div class="card bg-light cuadro">
		<div class="card-title titulo">
			<h3 class="text-center">Carga de video</h3>
		</div>
		<div class="card-body">
			<form method="post"  action="{{route('cargarVideo')}}" enctype="multipart/form-data" onsubmit="btn_carga_video.disabled=true;">
				{!! csrf_field() !!}
				<div class="form-group">
					<label>Título:</label>
					<input type="text" class="form-control" name="nombre_video" placeholder="Ingrese el nombre del video" value="{{old('nombre_video')}}" id="titulo">
					<small id="passwordHelpBlock" class="form-text text-muted">
                        No mayor a 100 caracteres.
                    </small>
					@if($errors->has('nombre_video'))
					   <div class="alert alert-danger" role="alert">
                          {{ $errors->first('nombre_video') }}
                       </div>
					@endif
				</div>
				<div class="form-group">
					<label>Descripción:</label>
					<textarea class="form-control" rows="3" name="descripcion" placeholder="Ingrese la descripción del contenido del video" id="descripcion">{{old('descripcion')}}</textarea>
					<small id="passwordHelpBlock" class="form-text text-muted">
                        No mayor a 250 caracteres.
                    </small>
					@if($errors->has('descripcion'))
					   <div class="alert alert-danger" role="alert">
                          {{ $errors->first('descripcion') }}
                       </div>
					@endif
				</div>
                <div class="form-group">
					<label>Eliga la materia:</label>
					<select name="materia" class="form-control" id="materia" >
                       <option disabled selected value>-- Materia -- </option>
                       <option value="1" @if (old('materia') == "1") {{ 'selected' }} @endif>Álgebra Lineal</option>
                       <option value="2" @if (old('materia') == "2") {{ 'selected' }} @endif>Funciones Matemáticas</option>
                       <option value="3" @if (old('materia') == "3") {{ 'selected' }} @endif>Cálculo Diferencial</option>
                       <option value="4" @if (old('materia') == "4") {{ 'selected' }} @endif>Cálculo Integral</option>
                       <option value="5"@if (old('materia') == "5") {{ 'selected' }} @endif>Cálculo Multivariable</option>
                       <option value="6" @if (old('materia') == "6") {{ 'selected' }} @endif>Ecuaciones Diferenciales</option>
                       <option value="7" @if (old('materia') == "7") {{ 'selected' }} @endif>Probabilidad y Estadística</option>
                       <option value="8" @if (old('materia') == "8") {{ 'selected' }} @endif>Matemáticas Discretas</option>
                       <option value="9" @if (old('materia') == "9") {{ 'selected' }} @endif>Métodos Numéricos</option>
                    </select>
					@if($errors->has('materia'))
					   <div class="alert alert-danger" role="alert">
                          {{ $errors->first('materia') }}
                       </div>
					@endif
				</div>
				 <div class="form-group">
					<label>Eliga el método para subir el video:</label>
					<select name="metodo" class="form-control" id="metodo" value="{{old('metodo')}}">
                       <option disabled selected value>-- Metodo -- </option>
                       <option value="archivo">Carga del archivo</option>
                       <option value="link">Link del video</option>
                    </select>
					@if($errors->has('metodo'))
					   <div class="alert alert-danger" role="alert">
                          {{ $errors->first('metodo') }}
                       </div>
					@endif
				</div>
				<div class="form-group" id="subir_archivo">
                    <label>Carga del archivo:</label>
					<input type="file" class="form-control-file" name="archivo_video" id="archivo_video" disabled>
					<small id="passwordHelpBlock" class="form-text text-muted">
                        El tamaño máximo del archivo es de 100mb.
                    </small>
					@if($errors->has('archivo_video') && !$errors->has('link_video') )
					   <div class="alert alert-danger" role="alert">
                          {{ $errors->first('archivo_video') }}
                       </div>
					@endif
				</div>
				<div class="form-group" id="video_link">
                    <label>Link del video:</label>
					<input type="text" class="form-control" name="link_video" id="link_video" disabled>
					<small id="passwordHelpBlock" class="form-text text-muted">
                        El link debe ser de youtube.
                    </small>
					@if($errors->has('link_video') && !$errors->has('archivo_video') )
					   <div class="alert alert-danger" role="alert">
                          {{ $errors->first('link_video') }}
                       </div>
					@endif
				</div>
				    @if($errors->has('link_video') && $errors->has('archivo_video'))
					   <div class="alert alert-danger" role="alert">
                          {{ $errors->first('link_video') }}
                       </div>
					@endif
			    <div class="progress" style="display:none;" id="barra_progreso">
                   <div class="progress-bar progress-bar-striped active bg-success" id="progreso" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                      <span>Subiendo archivo<span class="movimiento"></span></span>
                   </div>
                </div>
				<button class="btn btn-primary btn-block" name="btn_carga_video" id="btn_carga_video"><i class="fa fa-upload" aria-hidden="true"></i> Subir</button>
			</form>
		</div>
	</div>
</div>	
@endsection
