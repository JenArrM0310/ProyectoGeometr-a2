@extends('Plantillas.LayoutPrincipal')
@section('content')
 @if (session()->has('registrado'))
    {!!"<script>Swal.fire('Listo', 'Se ha registrado con éxito', 'success')</script>"!!}
 @endif
 @if (session()->has('denegado'))
    {!!"<script>Swal.fire('Lo sentimos', 'El usuario y/o contraseña son incorrectos', 'error')</script>"!!}
 @endif
 
   <div class="contenedor">
         <div class="card bg-light cuadro">
            <div class="card-title titulo">
            	<h3 class="text-center">Inicio de Sesión</h3>
            </div>
            <div class="card-body">
               <form method="post" action="{{route('logusuario.login')}}">
                  {!! csrf_field() !!}
                  <div class="form-group">
                     <label>Email:</label>
                     <input type="text" name="emaillog" class="form-control" placeholder="Ingrese su email" value="{{ old('emaillog') }}">
                     @if ($errors->has('emaillog'))
                         <div class="alert alert-danger" role="alert">
                            {{ $errors->first('emaillog') }}
                         </div>
                      @endif
                  </div>
                  <div class="form-group">
                     <label>Contraseña:</label>
                     <input type="password" name="passlog" id="passlog" class="form-control" placeholder="Ingrese su contraseña">
                     <input type="checkbox" id="passlogin" title="Mostrar contraseña"> &nbsp;Mostrar Contraseña
                     @if ($errors->has('passlog'))
                         <div class="alert alert-danger" role="alert">
                            {{ $errors->first('passlog') }}
                         </div>
                      @endif
                  </div>
                  <button class="btn btn-success btn-lg btn-block"><i class="fa fa-sign-in" aria-hidden="true"></i>
 Ingresar</button>
               </form>
               <a href="{{route('Registro')}}">Si todavía no tienes una cuenta, REGISTRATE AQUÍ</a><br>
            </div>
         </div>
   </div>

@endsection