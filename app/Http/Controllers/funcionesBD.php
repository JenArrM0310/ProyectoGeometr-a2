<?php

namespace App\Http\Controllers;
use App\Http\Requests\validacionesRegistro;
use App\Http\Requests\validacionesLogin;
use App\Http\Requests\validacionesComentarios;
use App\Http\Requests\validacionesContenido;
use App\Http\Requests\validacionesVideo;
use App\Http\Requests\validacionesEditarAviso;
use App\Http\Requests\validacionesResponderComentario;
use App\Http\Requests\validacionesEditarVideo;
use App\Http\Requests\validacionesRecuperacion;
use DB;
use Mail;
use App\Mail\EnvioEmail;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class funcionesBD extends Controller
{
    //Función para insertar nuevos usuarios
    public function store(validacionesRegistro $request)
    {
          DB::table('tusuarios')->insert([
          "nombre"=> $request->input('nombre'),
          "email"=> $request->input('email'),
          "password"=> Hash::make($request->input('password')),
          "id_rol"=>"2",
          "fecha_registro"=> Carbon::now(),
          "inicio_sesion"=>"0",
          "ultimo_acceso"=>Carbon::now(),
        ]);
        return redirect('Login')->with('registrado', 'Usuario registrado');
    }
    //Función para iniciar sesión
    public function login(validacionesLogin $request)
    {
        $datos = DB::table('tusuarios')
                            ->join('troles' , 'tusuarios.id_rol', '=' , 'troles.id_rol')
                            ->select('tusuarios.id_usuario','tusuarios.email','tusuarios.inicio_sesion','tusuarios.password', 'troles.nombre_rol')
                            ->where('tusuarios.email',$request->input('emaillog'))
                            ->first();
        if($datos && Hash::check($request->input('passlog'), $datos->password)){
            $hora = date("YmdHis");
            $letra= "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ=?!";
            $cadena=substr(str_shuffle($letra), 0, 12);
            $token=$hora.$cadena.$datos->id_usuario;
            session(['usuario' => $datos->email]);
            session(['rol' => $datos->nombre_rol]);
            session(['id' => $datos->id_usuario]);
            session(['token' => $token]);
            $sesion=$datos->inicio_sesion + 1;
            DB::table('tusuarios')
                 ->where('id_usuario', session()->get('id'))
                 ->where('id_rol', 2)
                 ->update([
                    "inicio_sesion" => $sesion,
                    "ultimo_acceso" => Carbon::now(),

                    
            ]);
            return redirect('vistaUsuario');
        }
        return redirect('Login')->withInput($request->except('password'))->with('denegado', 'Usuario no encontrado');
        
    }
    //Función para cerrar sesión
    public function logout(){
        session()->forget(['usuario', 'rol', 'id', 'token']);
        return view('Acceso.Login');
    }    
   
    //---------------FUNCIONES COMENTARIOS---------------
    //Función para guardar comentario
    public function insertarComentario(validacionesComentarios $request){
          $id=$request->input('id_user');
          if($id == session()->get('token')){
              DB::table('tcomentarios')->insert([
                "id_usuario" => session()->get('id'),
                "comentario" => $request->input('comentario'),
                "pregunta" => $request->input('respuesta'),
                "estado" => "No Respondido",
                "fecha_comentario" => Carbon::now(),
              ]);
              return redirect('misComentarios')->with('mensaje', 'mensaje');
          }
          else{
            return redirect('VistaComentarios')->with('error', 'mensaje');
          }
    }
    //Función para consultar los comentarios
    public function consultaComentarios(){
        $consulta=DB::table('tcomentarios')
                  ->join('tusuarios', 'tcomentarios.id_usuario' ,'=', 'tusuarios.id_usuario')
                  ->select('tusuarios.nombre', 'tusuarios.email', 'tcomentarios.id_comentario','tcomentarios.comentario', 'tcomentarios.pregunta', 'tcomentarios.estado', 'tcomentarios.fecha_comentario')
                  ->whereNotIn('tcomentarios.estado', ['Eliminado'])
                  ->get();
            return view('Administrador.VistaComentariosUsuarios', compact('consulta'));
    }
     //Función para mostrar los comentarios de cada usuario
    public function misComentarios(){
        $consulta=DB::table('tcomentarios')
                   ->select('comentario', 'respuesta', 'fecha_comentario', 'fecha_respuesta')
                   ->where('id_usuario', session()->get('id'))
                   ->get();
            return view('Usuario.VistaMisComentarios', compact('consulta'));
    }
    //Función para responder a los comentarios
    public function responderComentario(validacionesResponderComentario $request){
          DB::table('tcomentarios')->where('id_comentario', $request->input('id_user'))
              ->update([
                 "estado" => "Respondido",
                 "respuesta" => $request->input('respuesta'),
                 "fecha_respuesta" => Carbon::now(),
                ]);
          return redirect('comentariosUsuarios')->with('respondido', 'mensaje');
    }
    //Función para eliminar los comentarios de usuarios de la bandeja del administrador
    public function eliminarComentario(Request $request){
           DB::table('tcomentarios')->where('id_comentario', $request->input('id_comentario'))
              ->update([
                 "estado" => "Eliminado",
                ]);
          return redirect('comentariosUsuarios')->with('eliminado', 'mensaje');
    }
    //-----------------------------------------------------
    //Función para consultar el n.° de veces que ha ingresado cada usuario y cuantas veces se ha descargado un juego
    public function consultaSeguimiento(){
        $consulta=DB::table('tusuarios')
                  ->join('troles', 'tusuarios.id_rol','=','troles.id_rol')
                  ->select('tusuarios.nombre', 'tusuarios.email', 'tusuarios.inicio_sesion', 'tusuarios.ultimo_acceso')
                  ->where('troles.nombre_rol', 'usuario')
                  ->where('tusuarios.inicio_sesion', '>', 0)
                  ->get();
        $juegos=DB::table('tjuegos')->get();
            return view('Administrador.VistaEstadisticas', compact('consulta', 'juegos'));
    }
   
    //Función para saber cuantas veces se ha descargado un juego
    public function descargaJuego(Request $request){
       $consulta=DB::table('tjuegos')
                 ->where('id_juego', $request->id)
                 ->select('num_descargas')
                 ->first();
        $valor=$consulta->num_descargas+1;
       DB::table('tjuegos')
                 ->where('id_juego', $request->id)
                 ->update([
                    "num_descargas" => $valor, 
                    "ultima_descarga" => Carbon::now(),
            ]);

    }
    //---------------FUNCIONES AVISOS---------------
    //Función para registrar el contenido
    public function registroContenido(validacionesContenido $request){
        $imagen=$request->file('imagen');
        $nom_imagen=$imagen->getClientOriginalName();
        DB::table('tavisos')->insert([
            "id_usuario" => session()->get('id'),
            "titulo" => $request->input('titulo'),
            "descripcion" => $request->input('descripcion'),
            "imagen" => $nom_imagen,
          ]);
        \Storage::disk('local')->put($nom_imagen,  \File::get($imagen));
          return redirect('avisosCargados')->with('mensaje', 'mensaje');
    }
    //Función para mostrar los avisos en la página principal 
    public function mostrarAvisos(){
        $consulta=DB::table('tavisos')->get();
        return view('Usuario.VistaUsuario', compact('consulta'));
    }
    //Función para mostrar los avisos de cada administrador
    public function misAvisos(){
        $consulta=DB::table('tavisos')
                  ->select('id_aviso' ,'titulo', 'descripcion', 'imagen')
                  ->where('id_usuario', session()->get('id'))
                  ->get();
            return view('Administrador.VistaMisAvisos', compact('consulta'));
    }
    //Función para actualizar los avisos
    public function actualizarAviso(validacionesEditarAviso $request){
         if(empty($request->file('imagen'))){
              DB::table('tavisos')->where('id_aviso', $request->input('id_aviso'))->update([
              "titulo" => $request->input('titulo'),
              "descripcion" => $request->input('descripcion'),
              ]);
         }else{
              $registro=DB::table('tavisos')
                        ->select('imagen')
                        ->where('id_aviso', $request->input('id_aviso'))
                        ->first();
              \Storage::delete($registro->imagen);
              $imagen=$request->file('imagen');
              $nom_imagen=$imagen->getClientOriginalName();
              DB::table('tavisos')->where('id_aviso', $request->input('id_aviso'))->update([
              "titulo" => $request->input('titulo'),
              "descripcion" => $request->input('descripcion'),
              "imagen" => $nom_imagen,
              ]);
              \Storage::disk('local')->put($nom_imagen,  \File::get($imagen));
         }
         $id=$request->input('id_user');
         return redirect('avisosCargados')->with('actualizado', 'mensaje');
    }
    //Función para eliminar aviso
    public function eliminarAviso(Request $request){
           DB::table('tavisos')->where('id_aviso', $request->input('id_aviso'))->delete();
           return redirect('avisosCargados')->with('eliminado', 'mensaje');

    }
    //---------------FUNCIONES VIDEOS---------------
    //Función para insertar un video
    public function cargarVideo(validacionesVideo $request){
          $video=$request->file('archivo_video');
          $link=$request->input('link_video');
          if(isset($video)){
            $archivo=$video;
            $nom_video=$video->getClientOriginalName();
            $nombre=strtr($nom_video," ","_");
            \Storage::disk('local')->put($nombre,  \File::get($video));
          }else{
            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $link, $match);
            $id_video=$match[1];
            $nombre="https://youtube.com/embed/".$id_video;
            
          }
          DB::table('tvideos')->insert([
            "id_materia" => $request->input('materia'),
            "id_usuario" => session()->get('id'),
            "titulo" => $request->input('nombre_video'),
            "descripcion" => $request->input('descripcion'),
            "tipo" => $request->input('metodo'),
            "video" => $nombre,
            "fecha_carga" => Carbon::now(),
          ]);
          return redirect('videosCargados')->with('cargado', 'mensaje');
    }
    //Función para mostrar los videos de cada materia
    public function consultaVideos($id){
      $consulta=DB::table('tvideos')
                ->join('tmaterias', 'tvideos.id_materia', '=', 'tmaterias.id_materia')
                ->select('tvideos.id_video','tvideos.titulo', 'tvideos.descripcion', 'tvideos.video', 'tmaterias.nombre_materia', 'tvideos.tipo')
                ->where('tvideos.id_materia', $id)
                ->get();
      switch ($id) {
         case 1:
            $materia="Álgebra Lineal";
            break;
         case 2:
            $materia="Funciones Matemáticas";
            break;
         case 3:
            $materia="Cálculo Diferencial";
            break;
         case 4:
            $materia="Cálculo Integral";
            break;
         case 5:
            $materia="Cálculo Multivariable";
            break;
         case 6:
            $materia="Ecuaciones Diferenciales";
            break;
         case 7:
            $materia="Probabilidad y Estadística";
            break;
         case 8:
            $materia="Matemáticas Discretas";
            break;
         case 9:
            $materia="Métodos Numéricos";
            break;
     }
      return view('VistaVideos', compact('consulta' , 'materia'));
    }
    //Función para ver los videos cargados del administrador
    public function videosCargados(){
         $consulta=DB::table('tvideos')
                   ->join('tmaterias', 'tvideos.id_materia', '=', 'tmaterias.id_materia')
                   ->select('tvideos.id_video','tvideos.titulo', 'tvideos.descripcion', 'tmaterias.nombre_materia','tvideos.tipo', 'tvideos.video', 'tvideos.fecha_carga')
                   ->where('id_usuario', session()->get('id'))
                   ->get();
        return view('Administrador.VistaVideosCargados', compact('consulta'));
    }
    //Función para eliminar un video
    public function eliminarVideo(Request $request){
        $video=DB::table('tvideos')->select('video')->where('id_video', $request->input('id_video'))->first();
        if(!$video == null){
            \Storage::delete($video->video);
        }
        DB::table('tvideos')->where('id_video', $request->input('id_video'))->delete();
        return redirect('videosCargados')->with('eliminado', 'mensaje');
    }
    //Función para actualizar la información del video
    public function actualizarVideo(validacionesEditarVideo $request){
        if(empty($request->input('materia'))){
           DB::table('tvideos')->where('id_video', $request->input('id_video'))->update([
              "titulo" => $request->input('nombre_video'),
              "descripcion" => $request->input('descripcion'),
           ]);
        }
        else{
           DB::table('tvideos')->where('id_video', $request->input('id_video'))->update([
              "id_materia"=> $request->input('materia'),
              "titulo" => $request->input('nombre_video'),
              "descripcion" => $request->input('descripcion'),
           ]);
        }
        return redirect('videosCargados')->with('actualizado', 'mensaje');
    }


}
