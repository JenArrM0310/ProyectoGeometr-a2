<?php

use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*Middleware que redirecciona a la página principal en caso de que un usuario se encuentre haya iniciado sesión*/
Route::group(['middleware' => 'formularios'], function(){
	Route::get('/',function () {
        return view('Acceso.Login');
    });
    Route::get('Registro',function() {
	    return view('Acceso.Registro');
    })->name('Registro');
    Route::get('Login',function(){
	    return view('Acceso.Login');
    })->name('Login');
   
});
/*Middleware que impide el acceso a las vistas en caso de que el usuario no haya iniciado sesión*/
Route::group(['middleware' => 'sesion'], function(){
    Route::get('logout', 'funcionesBD@logout')->name('logout');
	Route::get('JuegosFunciones',function(){
	    return view('JuegosFunciones');
    })->name('JuegosFunciones');
    Route::get('JuegosIntegrales',function(){
	    return view('JuegosIntegrales');
    })->name('JuegosIntegrales');
    Route::get('JuegosDiferencial',function(){
    	return view('JuegosDiferencial');
	})->name('JuegosDiferencial');
    Route::get('vistaUsuario','funcionesBD@mostrarAvisos' ,function(){
	    return view('Usuario.VistaUsuario');
    })->name('vistaUsuario');
    Route::get('videosMaterias/{id}', 'funcionesBD@consultaVideos' ,function() {
        return view('VistaVideos');
    })->name('videosMaterias');
});
/*Middleware para mostrar las vistas solo a usuarios comúnes*/
Route::group(['middleware' => 'usuario'], function(){
	Route::get('VistaComentarios',function(){
	    return view('Usuario.VistaComentarios');
    })->name('VistaComentarios');
    Route::get('misComentarios', 'funcionesBD@misComentarios', function(){
	    return view('Usuario.VistaMisComentarios');
    })->name('misComentarios');
});
/*Middleware para mostrar las vistas solo a administradores*/
Route::group(['middleware' => 'administrador'], function(){
    Route::get('CargaAviso', function () {
	    return view('Administrador.VistaCargarAviso');
    })->name('CargaAviso');
    Route::get('Estadisticas', 'funcionesBD@consultaSeguimiento',function(){
	    return view('Administrador.VistaEstadisticas');
    })->name('Estadisticas');
    Route::get('avisosCargados', 'funcionesBD@misAvisos' ,function() {
        return view('Administrador.VistaMisAvisos');
    })->name('avisosCargados');
    Route::get('CargaVideo', function(){
	    return view('Administrador.VistaCargaVideos');
    })->name('CargaVideo');
    Route::get('videosCargados', 'funcionesBD@videosCargados', function(){
        return view('Administrador.VistaVideosCargados');
    })->name('videosCargados');
});

/*Rutas para insertar, consultar, eliminar y actualizar*/
Route::post('usuarios', 'funcionesBD@store')->name('usuarios.store');
Route::post('logusuario', 'funcionesBD@login')->name('logusuario.login');
Route::post('comentario', 'funcionesBD@insertarComentario')->name('comentario.insertarComentario');
Route::get('comentariosUsuarios', 'funcionesBD@consultaComentarios')->name('comentariosUsuarios');
Route::post('descargaJuegos', 'funcionesBD@descargaJuego')->name('descargaJuegos');
Route::post('registroContenido', 'funcionesBD@registroContenido')->name('registroContenido');
Route::post('cargarVideo', 'funcionesBD@cargarVideo')->name('cargarVideo');
Route::post('actualizarAviso', 'funcionesBD@actualizarAviso')->name('actualizarAviso');
Route::post('eliminarAviso', 'funcionesBD@eliminarAviso')->name('eliminarAviso');
Route::post('responderComentario', 'funcionesBD@responderComentario')->name('responderComentario');
Route::Post('eliminarComentario', 'funcionesBD@eliminarComentario')->name('eliminarComentario');
Route::post('eliminarVideo', 'funcionesBD@eliminarVideo')->name('eliminarVideo');
Route::post('actualizarVideo', 'funcionesBD@actualizarVideo')->name('actualizarVideo');
Route::get('usuariosRegistrados', 'funcionesBD@usuariosRegistrados')->name('usuariosRegistrados');


