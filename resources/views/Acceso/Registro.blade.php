@extends('Plantillas.LayoutPrincipal')
@section('content')
   <div class="contenedor">
         <div class="card bg-light cuadro">
            <div class="card-title titulo">
            	<h3 class="text-center">Registro de Usuario</h3>
            </div>
            <div class="card-body">
            	<form method="post" action="{{route('usuarios.store')}}">
                   {!! csrf_field() !!}
            	   <div class="form-group">
            	      <label>Nombre:</label>
            	      <input type="text" placeholder="Ingrese su nombre" class="form-control" name="nombre" value="{{ old('nombre') }}">
                      @if ($errors->has('nombre'))
                         <div class="alert alert-danger" role="alert">
                            {{ $errors->first('nombre') }}
                         </div>
                      @endif
            	   </div>
            	   <div class="form-group">
            	      <label>Correo electrónico:</label>
            	      <input type="text" placeholder="Ingrese su email" class="form-control" name="email" value="{{ old('email') }}">
                      @if ($errors->has('email'))
                         <div class="alert alert-danger" role="alert">
                            {{ $errors->first('email') }}
                         </div>
                      @endif
            	   </div>
            	   <div class="form-group">
            	      <label>Contraseña:</label>
            	      <input type="password" placeholder="Ingrese una contraseña" class="form-control password"  name="password">
                      @if ($errors->has('password'))
                         <div class="alert alert-danger" role="alert">
                            {{ $errors->first('password') }}
                         </div>
                      @endif
                      <div><input type="checkbox" class="checkpass" title="Mostrar contraseña"> &nbsp;Mostrar Contraseña</div>
            	   </div>
            	   <div class="form-group">
            	      <label>Repetir contraseña:</label>
            	      <input type="password" placeholder="Ingrese de nuevo la contraseña" class="form-control passrepetir"  name="repetir">
                      @if ($errors->has('repetir'))
                         <div class="alert alert-danger" role="alert">
                            {{ $errors->first('repetir') }}
                         </div>
                      @endif
                      <div><input type="checkbox" class="checkrepetir" title="Mostrar contraseña"> &nbsp;Mostrar Contraseña</div>
            	   </div>
            	   <button class="btn btn-success btn-lg btn-block"><i class="fa fa-pencil" aria-hidden="true"></i> Registrarse</button>
            	</form>
                <a href="{{route('Login')}}">Si ya estas registrado, INICIA SESIÓN AQUÍ</a><br>
            </div>
         </div>
   </div>
@endsection