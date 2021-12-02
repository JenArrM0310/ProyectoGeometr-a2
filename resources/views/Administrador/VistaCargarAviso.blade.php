@extends('Plantillas.LayoutAdministrador')
@section('content')
<div class="contenedor">
	<div class="card bg-light cuadro">
		<div class="card-title titulo">
			<h3 class="text-center">Carga de aviso</h3>
		</div>
		<div class="card-body">
			<form method="post" action="{{route('registroContenido')}}" enctype="multipart/form-data">
           	{!! csrf_field() !!}
              <div class="form-group">
                 <label>Título:</label>
                 <input type="text" placeholder="No mayor a 80 caracteres" value="{{old('titulo')}}" name="titulo" class="form-control" data-toggle="tooltip" data-placement="top" title="No mayor a 80 caracteres">
                 @if($errors->has('titulo'))
                    <div class="alert alert-danger" role="alert">
                       {{ $errors->first('titulo') }}
                    </div>
                 @endif
              </div>
              <div class="form-group">
                 <label>Descripción:</label>
                 <textarea name="descripcion" rows="2" placeholder="No mayor a 150 caracteres" class="form-control" >{{old('descripcion')}}</textarea>
                 @if($errors->has('descripcion'))
                    <div class="alert alert-danger" role="alert">
                       {{ $errors->first('descripcion') }}
                    </div>
                 @endif
              </div>
              <div class="form-group">
                 <div class="form-row">
                    <div class="col-9">
                      <label>Imagen:</label>
                      <input type="file" class="form-control-file" name="imagen">
                      @if($errors->has('imagen'))
                      <div class="alert alert-danger" role="alert">
                           {{ $errors->first('imagen') }}
                      </div>
                      @endif
                    </div>
                    <div class="col">
                      <small class="form-text text-muted">Tamaño mínimo recomendado 1200x700</small>
                    </div> 
                 </div>
              </div>
              <button class="btn btn-primary btn-block"><i class="fa fa-upload" aria-hidden="true"></i>
 Cargar</button>
           </form>
		</div>
	</div>
</div>
@endsection