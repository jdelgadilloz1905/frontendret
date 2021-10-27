/*=============================================
CARGAR LA TABLA DINÁMICA CLIENTES O TIENDAS
=============================================*/

// var table1 = $('.tablaRutas').DataTable({
//
// 	"language": {
//
// 		"sProcessing":     "Procesando...",
// 		"sLengthMenu":     "Mostrar _MENU_ registros",
// 		"sZeroRecords":    "No se encontraron resultados",
// 		"sEmptyTable":     "Ningún dato disponible en esta tabla",
// 		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
// 		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
// 		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
// 		"sInfoPostFix":    "",
// 		"sSearch":         "Buscar:",
// 		"sUrl":            "",
// 		"sInfoThousands":  ",",
// 		"sLoadingRecords": "Cargando...",
// 		"oPaginate": {
// 			"sFirst":    "Primero",
// 			"sLast":     "Último",
// 			"sNext":     "Siguiente",
// 			"sPrevious": "Anterior"
// 		},
// 		"oAria": {
// 			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
// 			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
// 		}
//
// 	}
//
// })


// $.ajax({
// 	url:"ajax/datatable-rutas.ajax.php",
// 	success:function(respuesta){
//
//
// 		console.log("respuesta", respuesta);
//
// 	}
//
// })
/*=============================================
EDITAR RUTA
=============================================*/

$(".tablas").on("click", ".btnEditarRuta", function(){

	var idRuta = $(this).attr("idRuta");

	var datos = new FormData();
	datos.append("idRutaMostrar", idRuta);


	$.ajax({
		url: "ajax/ruta.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarRutaNombre").val(respuesta["nombre"]);
     		$("#idRuta").val(respuesta["id"]);
		}
	})
	
})

/*=============================================
ELIMINAR RUTA
=============================================*/

$(".tablas").on("click", ".btnEliminarRuta", function(){
	 var idRuta = $(this).attr("idRuta");
	 swal({
	 	title: '¿Está seguro de borrar el registro?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, Continuar!'
	 }).then((result)=>{
	 	if(result.value){

            var datos = new FormData();
            datos.append("idRutaEliminar", idRuta);
            datos.append("eliminarRuta","ok");

            $.ajax({

                url:"ajax/ruta.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success:function(respuesta){

                    window.location.reload()

                }
            })
	 	}
	 })
})
/*=============================================
 CAMBIAR ESTATUS RUTA
 =============================================*/
$(".tablas").on("click",".btnActivarRuta", function() {

	var idRuta = $(this).attr("idRuta");
	var idEstatus = $(this).attr("idEstatus");

	var datos = new FormData();
	datos.append("idRuta",idRuta);
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
	
				url: "ajax/ruta.ajax.php",
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




/*=============================================
AGREGANDO TIENDA DESDE EL BOTÓN PARA DISPOSITIVOS
=============================================*/

$(".btnagregarClienteRuta").click(function(){



	var datos = new FormData();
	datos.append("traerClientes", "ok");

	$.ajax({

		url:"ajax/clientes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"json",
		success:function(respuesta){

			$(".nuevaRutaTabla").append(

				'<div class="row" style="padding:5px 15px">'+

					'<!-- Descripción del CLIENTE -->'+

					'<div class="col-md-12 col-sm-12" style="padding-right:0px">'+

						'<div class="input-group">'+

							'<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarCliente" idCliente><i class="fa fa-times"></i></button></span>'+

							'<select class="form-control nuevaDescripcionCliente" idCliente name="nuevaDescripcionCliente" required>'+

								'<option>Seleccione tienda</option>'+

							'</select>'+

						'</div>'+

					'</div>'+

				'</div>');


			// AGREGAR LOS CLIENTES AL SELECT
			respuesta.forEach(funcionForEach);

			function funcionForEach(item, index){

				$(".nuevaDescripcionCliente").append(

					'<option idCliente="'+item.id+'" value="'+item.direccion+'">'+item.direccion+'</option>'
				)

			}

			listaClientes()

		}


	})

})

/*=============================================
AGREGANDO TIENDA A LA VENTA DESDE LA TABLA
=============================================*/

$(".tablaRutas tbody").on("click", "button.agregarClienteRuta", function(){



    var idCliente = $(this).attr("idCliente");

	$(this).removeClass("btn-primary agregarClienteRuta");

	$(this).addClass("btn-default");

	var datos = new FormData();
	datos.append("idCliente", idCliente);

	$.ajax({

		url:"ajax/clientes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"json",
		success:function(respuesta){

			var grupo = respuesta["nombreGrupo"];

			var localizador = respuesta["localizador"];

			var documento = respuesta["documento"];

			var direccion = respuesta["direccion"];

			var idCliente = respuesta["id"];

			var alias = respuesta["alias"];


			$(".nuevaRutaTabla").append(

				'<div class="row " style="padding:5px 15px">'+

				'<!-- Descripción del producto -->'+

					'<div class="col-md-12 col-sm-12" style="padding-right:0px">'+

						'<div class="input-group">'+

							'<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarCliente" idCliente="'+idCliente+'"><i class="fa fa-times"></i></button></span>'+

							'<input type="text" class="form-control nuevaDescripcionCliente"  alias="'+alias+'" grupo="'+grupo+'" localizador="'+localizador+'" documento="'+documento+'" idCliente="'+idCliente+'" name="agregarCliente" value="'+direccion+'" readonly required>'+

						'</div>'+

					'</div>'+

				'</div>') ;


			listaClientes();

		}

	})

});


/*=============================================
QUITAR TIENDA RECUPERAR BOTÓN
=============================================*/

$(".formularioRutas").on("click", "button.quitarCliente", function(){

	$(this).parent().parent().parent().parent().remove();

	var idCliente = $(this).attr("idCliente");

	$("button.recuperarBotonRuta[idCliente='"+idCliente+"']").removeClass('btn-default');

	$("button.recuperarBotonRuta[idCliente='"+idCliente+"']").addClass('btn-primary agregarClienteRuta');

	listaClientes();

})


/*=============================================
LISTAR TODOS LOS CLIENTES
=============================================*/

function listaClientes(){

	var listaClientes = [];

	var valores = $(".nuevaDescripcionCliente");

	for(var i = 0; i < valores.length; i++){

		listaClientes.push({
			"direccion" : $(valores[i]).val(),
			"grupo" : $(valores[i]).attr("grupo"),
			"localizador" : $(valores[i]).attr("localizador"),
			"documento" : $(valores[i]).attr("documento"),
			"idCliente" : $(valores[i]).attr("idCliente"),
			"alias" : $(valores[i]).attr("alias")

		})

	}

	$("#listaClientes").val(JSON.stringify(listaClientes));

}


/*=============================================
 VER DETALLE DE LA RUTA
 =============================================*/

$(".tablaDetalleRuta").on("click", ".btnVerDetalleRuta", function(){

	var idRuta = $(this).attr("idRuta");

	$(".editarDetalleRuta").attr("idRuta",idRuta);

	$("#detalleRuta").html(idRuta);

	var datos = new FormData();
	datos.append("idRutaDetalle", idRuta);
	datos.append("mostrarDetalleRutas","ok");

	$(".verDetalleRuta").empty();

	$.ajax({

		url:"ajax/ruta.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"json",
		success:function(respuesta){

			var tiendas = JSON.parse(respuesta[0]["detalle"]);

			var tipoServicio = respuesta[0]["tipo_servicio"].split("-").join(" ");

			$("#tipoServicio").html(tipoServicio.toUpperCase());

			tiendas.forEach(funcionForEach);


			function funcionForEach(item, index){

				$(".verDetalleRuta").append(

					'<tr>'+
						'<td>'+item.alias+'</td>'+
						'<td>'+item.localizador+'</td>'+
						'<td>'+item.documento+'</td>'+
						'<td>'+item.direccion+'</td>'+
					'</tr>'

				) ;
			}
		}
	})
})


/*======================================
			ASIGNACION DE RUTAS
* ======================================*/


$("#ingAsigRuta").change(function () {

	var idRuta = $(this).val();

	var datos = new FormData();
	datos.append("idRutaDetalle", idRuta);
	datos.append("mostrarDetalleRutas","ok");

	$.ajax({
		url:"ajax/ruta.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"json",
		success:function(respuesta){


			if(respuesta.length > 0){


				$("#ingDescripcion").val(respuesta[0]["comentario"]);


				var valor = respuesta[0]["id_tecnico"];
				var valor2 = respuesta[0]["tipo_servicio"];

				$("#ingTecnico option[value="+ valor +"]").attr("selected",true);

				$("#ingTipoServicio option[value="+ valor2 +"]").attr("selected",true);


				var nuevovalor = new Array(); // creamos un array vacío
				var parslocal;

				//console.log("respuesta", JSON.parse(respuesta));


				parslocal = JSON.parse(respuesta[0]["detalle"]); //Transforma la variable con el contenido de nuestro elemento en localStorage a un objeto Javascript

				parslocal.forEach(funcionForEach);


				function funcionForEach(item, index){

					nuevovalor[index]=item.idCliente;

				}

				localStorage.setItem("localMarcaDetalle", JSON.stringify(nuevovalor));

				//console.log(JSON.stringify(nuevovalor));

				//valido si hay registros en la ruta
				//si lo hay entonces cargo la tabla
				var tableDetalleRutas = $('.tablaAsignarRutas').DataTable({

					"ajax": {
						"url":"ajax/datatable-rutas.ajax.php",
						"type": "POST",
						"data": {"idRuta":idRuta}
					},
					"serverSide": true,
					"paging": false,
					"language": {

						"sProcessing":     "Procesando...",
						"sLengthMenu":     "Mostrar _MENU_ registros",
						"sZeroRecords":    "No se encontraron resultados",
						"sEmptyTable":     "Ningún dato disponible en esta tabla",
						"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
						"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
						"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
						"sInfoPostFix":    "",
						"sSearch":         "Buscar:",
						"sUrl":            "",
						"sInfoThousands":  ",",
						"sLoadingRecords": "Cargando...",
						"oPaginate": {
							"sFirst":    "Primero",
							"sLast":     "Último",
							"sNext":     "Siguiente",
							"sPrevious": "Anterior"
						},
						"oAria": {
							"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
							"sSortDescending": ": Activar para ordenar la columna de manera descendente"
						}

					}

				})

				tableDetalleRutas.destroy();

			}else{

				swal({
					title: 'ERROR',
					text: "No se encontro tiendas asociadas a la ruta",
					type: 'error',
					showCancelButton: false,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					cancelButtonText: 'Cancelar',
					confirmButtonText: 'Continuar!'
				}).then((result)=>{
					if(result.value){
					//window.location = "asignar-ruta";
				}
			})
			}

		}

	})
})


$(".tablaAsignarRutas").on("click", ".marcarDetalle", function(){

	var idRuta = $(this).attr("idRuta");  //guardamos el value, que contiene el marcaPublicador, del checkbox que activamos

	var aria_pressed = $(this).attr("aria-pressed");

	var nuevovalor = new Array(); // creamos un array vacío

	var getlocal = localStorage.getItem("localMarcaDetalle"); //asignamos el elemento "localMarcaPublicador" a una varible

	var cont;

	var parslocal;



	if(aria_pressed === "false"){

		//Si el item no está activado


		if(getlocal != null && getlocal != "" && getlocal != false && getlocal != undefined){//Comprobamos que el elemento existe en localStorage

			parslocal = JSON.parse(getlocal);

			var contador = 0;

			$.each(parslocal, function(index, value){

				cont = index;

				if(value != idRuta && value != null && value != undefined && value != false){//si el el valor que estamos haciendo el loop, no coincide al valor ingresado, entonces lo ingresa en el array

					nuevovalor[contador] = value;

					contador++;

				}

			});

			if(cont == 0){//si cont es igual a 0, significa que sólo se encuentra en nuestro localStorage el marcaPublicador que ingresamos, por lo tanto solo eliminamos el elemento completo

				localStorage.removeItem("localMarcaDetalle");

			}else{//de lo contrario, existen más valores, pro lo que rehacemos el elemento con los valores que no coincidieron con el encontrado

				localStorage.setItem("localMarcaDetalle", JSON.stringify(nuevovalor));

			}

		}


	}else {

		//Si el item está activado guarda el valor en localStorage

		if(getlocal != null && getlocal != "" && getlocal != false && getlocal != undefined){ //comprobamos que nuestra variable exista

			parslocal = JSON.parse(getlocal); //Transforma la variable con el contenido de nuestro elemento en localStorage a un objeto Javascript

			$.each(parslocal, function(index, value){

				cont = index;

				nuevovalor[index] = value; //llenamos nuestro array vacío con los valores que ya existen en nuestro elemento

			});

			cont++;

			nuevovalor[cont] = idRuta;

			localStorage.setItem("localMarcaDetalle", JSON.stringify(nuevovalor));



		} else {//en el caso que no exista el elemento en localStorage

			var saveLocal = new Array();//Creamos un nuevo array vacío

			saveLocal[0] = idRuta; //asignamos al comienzo de nuestro array, el valor de nuestro elemento

			localStorage.setItem("localMarcaDetalle", JSON.stringify(saveLocal));//guardamos nuestro valor en localStorage

		}

	}



});

$(".asignarLocalDetalle").on("click", function(){


	var cadena = JSON.parse(localStorage.getItem("localMarcaDetalle"));


	$('#listaTienda').val(cadena);

});


/*==============================================
					EDITAR RUTAS
* ==============================================*/

$("#editRuta").change(function () {

	var idRuta = $(this).val();

	$("#botonAgregar").css("display","");

	actualizarTablaRutas(idRuta);

})


$(".tablaEditarRutas").on("click", ".eliminarTienda", function(){


	var idRuta = $(this).attr("idRuta");  //guardamos el value, que contiene el marcaPublicador, del checkbox que activamos

	var idDetalle = $(this).attr("idDetalle");


	var aria_pressed = $(this).attr("aria-pressed");

	var nuevovalor = new Array(); // creamos un array vacío

	var getlocal = localStorage.getItem("localMarcaDetalleEdit"); //asignamos el elemento "localMarcaPublicador" a una varible

	var cont;

	var parslocal;



	if(aria_pressed === "false"){

		//Si el item no está activado


		if(getlocal != null && getlocal != "" && getlocal != false && getlocal != undefined){//Comprobamos que el elemento existe en localStorage

			parslocal = JSON.parse(getlocal);

			var contador = 0;

			$.each(parslocal, function(index, value){

				cont = index;

				if(value != idRuta && value != null && value != undefined && value != false){//si el el valor que estamos haciendo el loop, no coincide al valor ingresado, entonces lo ingresa en el array

					nuevovalor[contador] = value;

					contador++;

				}

			});

			if(cont == 0){//si cont es igual a 0, significa que sólo se encuentra en nuestro localStorage el marcaPublicador que ingresamos, por lo tanto solo eliminamos el elemento completo

				localStorage.removeItem("localMarcaDetalleEdit");

			}else{//de lo contrario, existen más valores, pro lo que rehacemos el elemento con los valores que no coincidieron con el encontrado

				localStorage.setItem("localMarcaDetalleEdit", JSON.stringify(nuevovalor));

			}

		}


	}else {

		//Si el item está activado guarda el valor en localStorage

		if(getlocal != null && getlocal != "" && getlocal != false && getlocal != undefined){ //comprobamos que nuestra variable exista

			parslocal = JSON.parse(getlocal); //Transforma la variable con el contenido de nuestro elemento en localStorage a un objeto Javascript

			$.each(parslocal, function(index, value){

				cont = index;

				nuevovalor[index] = value; //llenamos nuestro array vacío con los valores que ya existen en nuestro elemento

			});

			cont++;

			nuevovalor[cont] = idRuta;

			localStorage.setItem("localMarcaDetalleEdit", JSON.stringify(nuevovalor));



		} else {//en el caso que no exista el elemento en localStorage

			var saveLocal = new Array();//Creamos un nuevo array vacío

			saveLocal[0] = idRuta; //asignamos al comienzo de nuestro array, el valor de nuestro elemento

			localStorage.setItem("localMarcaDetalleEdit", JSON.stringify(saveLocal));//guardamos nuestro valor en localStorage

		}
	}

	/*==========================================
			ELMINO LA TIENDA DE LA RUTA
	* ==========================================*/

	var lista = JSON.parse($("#editListaClientes").val());


	for(var i = lista.length - 1; i >= 0; i--) {

		if(lista[i]["idCliente"] === idRuta) {
			lista.splice(i, 1);
		}
	}
	$("#editListaClientes").val(JSON.stringify(lista));

    var detalleRuta = JSON.stringify(lista);

	if(detalleRuta.length === 2){

        detalleRuta = "";

    }

	var datos = new FormData();
	datos.append("idRutaEliminar", idDetalle);
	datos.append("detalleRuta", detalleRuta);
	datos.append("eliminarTienda","ok");


	$.ajax({

		url:"ajax/ruta.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"json",
		success:function(respuesta){

           actualizarTablaRutas(idDetalle);

		}
	})


});

$(".editLocalDetalle").on("click", function(){


	var cadena = JSON.parse(localStorage.getItem("localMarcaDetalleEdit"));


	$('#listaTienda').val(cadena);

});

function actualizarTablaRutas(idRuta) {

	var datos = new FormData();
	datos.append("idRutaDetalle", idRuta);
	datos.append("mostrarDetalleRutas","ok");

	$.ajax({
		url:"ajax/ruta.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"json",
		success:function(respuesta){


			if(respuesta.length > 0){


				$("#editDescripcion").val(respuesta[0]["comentario"]);

				$("#listaClientes").val(respuesta[0]["detalle"]);

				$("#editListaClientes").val(respuesta[0]["detalle"]);


				var valor = respuesta[0]["id_tecnico"];
				var valor2 = respuesta[0]["tipo_servicio"];

				$("#editTecnico option[value="+ valor +"]").attr("selected",true);

				$("#editTipoServicio option[value="+ valor2 +"]").attr("selected",true);

				var nuevovalor = new Array(); // creamos un array vacío
				var parslocal;

				//console.log("respuesta", JSON.parse(respuesta));


                if(respuesta[0]["detalle"].length > 0){

                    parslocal = JSON.parse(respuesta[0]["detalle"]); //Transforma la variable con el contenido de nuestro elemento en localStorage a un objeto Javascript

                    parslocal.forEach(funcionForEach);
                }


				function funcionForEach(item, index){

					nuevovalor[index]=item.idCliente;

				}

				localStorage.setItem("localMarcaDetalleEdit", JSON.stringify(nuevovalor));


                if(respuesta[0]["detalle"].length > 0){

                    var tableDetalleRutas = $('.tablaEditarRutas').DataTable({

                        "ajax": {
                            "url":"ajax/datatable-rutas.ajax.php",
                            "type": "POST",
                            "data": {"idRutaEdit":idRuta}
                        },
                        "serverSide": true,
                        "paging": false,
                        "language": {

                            "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ registros",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún dato disponible en esta tabla",
                            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
                            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
                            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                            "sInfoPostFix":    "",
                            "sSearch":         "Buscar:",
                            "sUrl":            "",
                            "sInfoThousands":  ",",
                            "sLoadingRecords": "Cargando...",
                            "oPaginate": {
                                "sFirst":    "Primero",
                                "sLast":     "Último",
                                "sNext":     "Siguiente",
                                "sPrevious": "Anterior"
                            },
                            "oAria": {
                                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                            }

                        }

                    })
                }else{

                    var tableDetalleRutas = $('.tablaEditarRutas').DataTable({
                        "language": {

                            "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ registros",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún dato disponible en esta tabla",
                            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
                            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
                            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                            "sInfoPostFix":    "",
                            "sSearch":         "Buscar:",
                            "sUrl":            "",
                            "sInfoThousands":  ",",
                            "sLoadingRecords": "Cargando...",
                            "oPaginate": {
                                "sFirst":    "Primero",
                                "sLast":     "Último",
                                "sNext":     "Siguiente",
                                "sPrevious": "Anterior"
                            },
                            "oAria": {
                                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                            }

                        }
                    });

                    tableDetalleRutas.clear().draw();
                }


				tableDetalleRutas.destroy();

			}else{

				swal({
					title: 'ERROR',
					text: "No se encontro tiendas asociadas a la ruta",
					type: 'error',
					showCancelButton: false,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					cancelButtonText: 'Cancelar',
					confirmButtonText: 'Continuar!'
				}).then((result)=>{
					if(result.value){
					//window.location = "asignar-ruta";
				}
			})
			}

		}

	})
}


$(".tablaRutasAsignar tbody").on("click", "button.agregarTiendaRuta", function(e){

    e.preventDefault();

    var idRuta = $("#editRuta").val();

    var idCliente = $(this).attr("idCliente");

    var grupo = $(this).attr("grupo");

    var localizador = $(this).attr("localizador");

    var documento = $(this).attr("documento");

    var direccion = $(this).attr("direccion");

    var alias = $(this).attr("alias");

    $(this).removeClass("btn-primary agregarTiendaRuta");

    $(this).addClass("btn-default");

    var listaTiendaActual = $("#editListaClientes").val();

    var listaClientes = [];

    listaClientes = JSON.parse(listaTiendaActual);


    listaClientes.push({
        "direccion" : direccion,
        "grupo" : grupo,
        "localizador" : localizador,
        "documento" : documento,
        "idCliente" : idCliente,
        "alias" : alias

    })

    $("#editListaClientes").val(JSON.stringify(listaClientes));

    /*=======================================
    ACTUALIZAR LA NUEVA TIENDA
    =========================================*/

    var datos = new FormData();
    datos.append("idRutaEliminar", idRuta);
    datos.append("detalleRuta", JSON.stringify(listaClientes));
    datos.append("actualizarTienda","ok");

    $.ajax({

        url:"ajax/ruta.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(respuesta){
            if(respuesta == "ok"){

                swal({
                    type: "success",
                    title: "Tienda agregada correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                }).then((result) => {
                    if (result.value) {

                    }
                })

            }else{

                console.log("error actualizando tienda "+ respuesta);
            }

        }
    })



    actualizarTablaRutas(idRuta);



});