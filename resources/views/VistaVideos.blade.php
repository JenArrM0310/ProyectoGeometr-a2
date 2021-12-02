@php
   $rol=session()->get('rol');
   if($rol == "administrador"){
        $plantilla="Plantillas.LayoutAdministrador";
   }else{
        $plantilla="Plantillas.LayoutEstudiante";
   }   
@endphp
@extends($plantilla)
@section('content')
<div class="contenedorP">
	<div class="table-responsive contenedorTabla">
		<div class=" card bg-light tituloTabla"><h3 class="card-title">Videos de {{$materia}}</h3></div>
		<table class="table table-striped table-bordered tabla_videos" id="tabla_videos">
			<thead>
		      <tr>
				 <th>Título <i class="fa fa-header" aria-hidden="true"></i></th>
				 <th>Descripción <i class="fa fa-file-text" aria-hidden="true"></i></th>
				 <th>Video <i class="fa fa-video-camera" aria-hidden="true"></i></th>
			  </tr>	
		   </thead>
		   <tbody>
		   	   @foreach($consulta as $video)
		         <tr>
		         	<td>{{$video->titulo}}</td>
		         	<td>{{$video->descripcion}}</td>
		         	<td><div style="text-align: center;"><button class="btn btn-success btn_reproducir" data-video="{{$video->video}}" data-nombre="{{$video->titulo}}" data-tipo="{{$video->tipo}}" data-toggle="tooltip" data-placement="top" title="Reproducir el video"><i class="fa fa-play" aria-hidden="true"></i></button></div></td>
		         </tr>
		       @endforeach
		   </tbody>
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

@endsection