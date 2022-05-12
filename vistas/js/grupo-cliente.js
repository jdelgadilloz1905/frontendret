/*=============================================
EDITAR CATEGORIA
=============================================*/

$(".tablas").on("click", ".btnEditarGrupoCliente", function(){

	var idGrupoCliente = $(this).attr("idGrupoCliente");

	var datos = new FormData();
	datos.append("idGrupoClienteMostrar", idGrupoCliente);

	$.ajax({
		url: "ajax/grupo.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarGrupoCliente").val(respuesta["nombre"]);
     		$("#idGrupoCliente").val(respuesta["id"]);
     		$("#editarAlias").val(respuesta["alias"]);
			$("#editarEmail").val(respuesta["email"]);
		}
	})
	
})

/*=============================================
ELIMINAR GRUPO DE CLIENTE
=============================================*/

$(".tablas").on("click", ".btnEliminarGrupoCliente", function(){
	 var idGrupoCliente = $(this).attr("idGrupoCliente");
	 swal({
	 	title: '¿Está seguro de borrar el grupo?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, Continuar!'
	 }).then((result)=>{
	 	if(result.value){
	 		window.location = "index.php?ruta=grupo-cliente&idGrupoCliente="+idGrupoCliente;
	 	}
	 })
})
/*=============================================
 CAMBIAR ESTATUS DEL GRUPO DE CLIENTE
 =============================================*/
$(".tablas").on("click",".btnActivarGrupoCliente", function() {

	var idGrupoCLiente = $(this).attr("idGrupoCliente");
	var idEstatus = $(this).attr("idEstatus");

	var datos = new FormData();
	datos.append("idGrupoCLiente",idGrupoCLiente);
	datos.append("idEstatus",idEstatus);
	

	swal({
		title: "CAMBIAR ESTATUS",
		text: "¿Desea cambiar el estatus?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Si, continuar",
		cancelButtonText: "Cancelar"
	}).then((result) => {
		if (result.value){
	
			$.ajax({
	
				url: "ajax/grupo.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				success: function (respuesta) {
					console.log("respuesta", respuesta);
				}
			});
			if(idEstatus == 1) {
				$(this).removeClass('btn-primary');
				$(this).addClass('btn-danger');
				$(this).html('INACTIVO');
				$(this).attr('idEstatus', 0);
			}else{
				$(this).removeClass('btn-danger');
				$(this).addClass('btn-primary');
				$(this).html('ACTIVO');
				$(this).attr('idEstatus', 1);
			}

		}

	})
})
