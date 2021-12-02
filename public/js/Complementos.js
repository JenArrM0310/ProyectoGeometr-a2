$(document).ready(function(){
	$('#passlogin').click(function(){
		if($('#passlogin').is(':checked')){
            $('#passlog').attr('type', 'text');
		}else{
			$('#passlog').attr('type', 'password');
		}
	})
	$('.checkpass').click(function(){
		if($('.checkpass').is(':checked')){
            $('.password').attr('type', 'text');
		}else{
			$('.password').attr('type', 'password');
		}
	})
	$('.checkrepetir').click(function(){
		if($('.checkrepetir').is(':checked')){
            $('.passrepetir').attr('type', 'text');
		}else{
			$('.passrepetir').attr('type', 'password');
		}
	})
	
	$('#btnSerpientes').click(function(){
		$('#infoIntegrales').hide();
		$('#infoSerpientes').show();
		$('#modalInfoIntegrales').modal("show");
	});
	$('#btnIntegrales').click(function(){
		$('#infoSerpientes').hide();
		$('#infoIntegrales').show();
		$('#modalInfoIntegrales').modal("show");
	});
	$('#btnMathshot').click(function(){
		$('#modalInfoDiferencial').modal("show");
		$('#infoRuleta').hide();
		$('#infoMathshot').show();
	});
	$('#btnRuleta').click(function(){
		$('#modalInfoDiferencial').modal("show");
		$('#infoMathshot').attr("style", "hide");
		$('#infoRuleta').removeAttr("style").show();
	});
	$('#btnAhorcado').click(function(){
		$('#modalInfoFunciones').modal("show");
		$('#infoRango').hide();
		$('#infoAhorcado').show();
	});
	$('#btnRango').click(function(){
		$('#modalInfoFunciones').modal("show");
		$('#infoAhorcado').hide();
		$('#infoRango').show();
	});

    $('.tablas').DataTable({
    	language: {
        "decimal": "",
        "emptyTable": "No se encontraron registros",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Registros",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
       }
    });
    $('.tabla_videos').DataTable({
    	language: {
        "decimal": "",
        "emptyTable": "No se han cargado videos de esta materia",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Registros",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
       }
    });
	$('#acceso_usuario').click(function(){
		$('#tacceso').show();
		$('#tjuegos').hide();
		
	});
	$('#descarga_juego').click(function(){
		$('#tjuegos').show();
		$('#tacceso').hide();
	});
	$('.btn_descarga').click(function(){
		var id=$(this).data('id');
		var _token = $('.token').val();
		console.log(id);
		console.log(_token);
		$.ajax({
			    type:"ajax",
                url: 'descargaJuegos',
                type: 'POST',
                data: {id: id,_token:_token},
                dataType: 'json',
         });
	});
	$('#metodo').change(function(){
		var metodo=$(this).val();
		if(metodo == "archivo"){
			$('#link_video').attr('disabled', true);
			$('#archivo_video').attr('disabled', false);
		}
		if(metodo == "link"){
			$('#archivo_video').prop('disabled', true);
			$('#link_video').attr('disabled', false);
		}
		console.log(metodo);
	});
	$('body').on('click', '.btn_reproducir', function(){
		var src=$(this).data('video');
		var nombre=$(this).data('nombre');
		var tipo=$(this).data('tipo');
		if(tipo == "archivo"){
			$('.src_link').hide();
			$('.dir_video').show();
			$('.dir_video').attr("src", "../subido/"+src);
		}
		if(tipo == "link"){
			$('.dir_video').hide();
			$('.src_link').show();
			$('.src_link').attr("src", src);
			
		}
		$('#modalVideo').modal("show");
        document.getElementById("titulo_video").innerHTML=nombre;
	});
	$('body').on('click', '.cerrar_video', function(){
		$('.dir_video').attr("src", "video");
		$('.src_link').attr("src", "video");
	})
	$('body').on('click', '.btn_actualizar_aviso', function(){
        $('#modalActualizarAviso').modal("show");
        var id=$(this).data('id');
        var usuario=$(this).data('usuario')
        var tr=$(this).closest('tr');
        var data =tr.children("td").map(function(){
        return $(this).text();
        }).get();
        $('#titulo').val(data[0]);
        $('#descripcion').val(data[1]);
        $('.id_aviso').val(id);
        $('.id_user').val(usuario);
	});
	$('body').on('click', '.btn_eliminar_aviso', function(){
		$('#modalEliminarAviso').modal("show");
		var id=$(this).data('id');
		var usuario=$(this).data('usuario');
		var nombre=$(this).data('nombre');
		console.log(id);
		$('.id_aviso').val(id);
		$('.id_user').val(usuario);
		document.getElementById("titulo_eliminar").innerHTML=nombre;
	});
	$('body').on('click', '.btn_responder', function(){
		$('#modalResComentario').modal("show");
		
		var id=$(this).data('id');
		console.log(id);
		$('.id_user').val(id);
		var tr=$(this).closest('tr');
        var data =tr.children("td").map(function(){
        return $(this).text();
        }).get();
        if(data[4]== "Respondido"){
        	$('#aviso_res').show();
        	$('#respuesta').attr("disabled", true);
        	$('#btn_responder_comentario').attr("disabled", true);
        	$('#aviso_res').html("El comentario ya fue respondido");
        }
        if(data[4]== "No Respondido"){
        	$('#btn_responder_comentario').attr("disabled", false);
        	$('#respuesta').attr("disabled", false);
        	$('#aviso_res').hide();
        }
	});
	$('body').on('click', '.btn_eliminar_comentario', function(){
		var tr=$(this).closest('tr');
        var data =tr.children("td").map(function(){
        return $(this).text();
        }).get();
        var id=$(this).data('id');
        if(data[4] == "No Respondido"){
        	$('#aviso').show();
        	$('#aviso').html("No puede eliminar el comentario porque no está respondido");
        	$('#btn_eliminar_comentario').attr("disabled", true);
        }
        if(data[4] == "Respondido"){
        	$('#aviso').hide();
        	$('#btn_eliminar_comentario').attr("disabled", false);
        }
		$('#modalEliminarComentario').modal("show");
		$('#id_comentario').val(id);
		document.getElementById("comentario_eliminar").innerHTML=data[2];
		document.getElementById("nombre_usuario").innerHTML=data[0];
	})
	$('body').on('click', '.btn_eliminar_video', function(){
		$('#modalEliminarVideo').modal("show");
		var id=$(this).data('id');
		var usuario=$(this).data('usuario');
		$('.id_video').val(id);
		$('.id_user').val(usuario);
		var tr=$(this).closest('tr');
        var data =tr.children("td").map(function(){
        return $(this).text();
        }).get();
        document.getElementById("titulo_eliminar").innerHTML=data[0];
	});
	$('body').on('click', '.btn_actualizar_video', function(){
		$('#modalActualizarVideo').modal("show");
		var id=$(this).data('id');
		var video=$(this).data('video');
		$('#id_user').val(id);
		$('#id_video').val(video);
		var tr=$(this).closest('tr');
        var data =tr.children("td").map(function(){
        return $(this).text();
        }).get();
        $('#nombre_video').val(data[0]);
        $('#descripcion').val(data[1])
		
	});
	$('body').on('click', '#btn_carga_video', function(){
		if(!$('#titulo').val()=="" && !$('#descripcion').val()=="" && !$('#materia').val()=="" && !$('#metodo').val()=="" 
		   && !$('#archivo_video').val()=="" && $('#link_video').val()==""){
			$('#barra_progreso').removeAttr("style").show();
		}
	});

    
})