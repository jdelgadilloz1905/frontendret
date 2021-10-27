/*=============================================
CARGAR LA TABLA DINÁMICA ORDENES
=============================================*/

var table3 = $('.tablaOrdenes').DataTable({

	"ajax":"ajax/datatable-ordenes.ajax.php",

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

/*=============================================
 CARGAR LA TABLA DINÁMICA ORDENES
 =============================================*/

//$.ajax({
//	url:"ajax/datatable-ordenes-compra.ajax.php",
//	success:function(respuesta){
//
//
//		console.log("respuesta", respuesta);
//
//	}
//
//})

var table4 = $('.tablaOrdenesCompra').DataTable({

	"ajax":"ajax/datatable-ordenes-compra.ajax.php",
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


/*=============================================
FUNCIÓN PARA CARGAR LAS IMÁGENES CON EL PAGINADOR Y EL FILTRO
=============================================*/

//function cargarImagenesProductos(){
//
//	 var imgTabla = $(".imgTablaOrdenes");
//
//	 var limiteStock = $(".limiteStock");
//
//	 for(var i = 0; i < imgTabla.length; i ++){
//
//	    var data = table3.row($(imgTabla[i]).parents('tr') ).data();
//
//	    $(imgTabla[i]).attr("src",data[1]);
//
//	    if(data[4] <= 10){
//
//	    	$(limiteStock[i]).addClass("btn-danger");
//	    	$(limiteStock[i]).html(data[4]);
//
//	    }else if(data[4] > 11 && data[4] <= 15){
//
//	    	$(limiteStock[i]).addClass("btn-warning");
//	    	$(limiteStock[i]).html(data[4]);
//
//	    }else{
//
//	    	$(limiteStock[i]).addClass("btn-success");
//	    	$(limiteStock[i]).html(data[4]);
//	    }
//
//  	}
//
//
//}

setTimeout(function(){

  //cargarImagenesProductos()

},500);

/*=============================================
CARGAMOS LAS IMÁGENES CUANDO INTERACTUAMOS CON EL PAGINADOR
=============================================*/

//$(".dataTables_paginate").click(function(){
//
//	cargarImagenesProductos()
//})

/*=============================================
CARGAMOS LAS IMÁGENES CUANDO INTERACTUAMOS CON EL BUSCADOR
=============================================*/
//$("input[aria-controls='DataTables_Table_0']").focus(function(){
//
//	$(document).keyup(function(event){
//
//		event.preventDefault();
//
//		cargarImagenesProductos()
//
//	})
//
//
//})

/*=============================================
CARGAMOS LAS IMÁGENES CUANDO INTERACTUAMOS CON EL FILTRO DE CANTIDAD
=============================================*/

$("select[name='DataTables_Table_0_length']").change(function(){

	cargarImagenesProductos()

})

/*=============================================
CARGAMOS LAS IMÁGENES CUANDO INTERACTUAMOS CON EL FILTRO DE ORDENAR
=============================================*/

$(".sorting").click(function(){

	cargarImagenesProductos()

})

/*=============================================
AGREGANDO PRODUCTOS A LA VENTA DESDE LA TABLA
=============================================*/

$(".tablaOrdenes tbody").on("click", "button.agregarProductoOrden", function(){

	var idProducto = $(this).attr("idProducto");

	$(this).removeClass("btn-primary agregarProductoOrden");

	$(this).addClass("btn-default");

	var datos = new FormData();
    datos.append("idProducto", idProducto);

     $.ajax({

     	url:"ajax/productos.ajax.php",
      	method: "POST",
      	data: datos,
      	cache: false,
      	contentType: false,
      	processData: false,
      	dataType:"json",
      	success:function(respuesta){

      	    var descripcion = respuesta["descripcion"];
          	var stock = respuesta["stock"];

			var nuevoStock = Number(respuesta["stock"]) + Number(1);

			var id_producto = respuesta["id"];

          	var precio = respuesta["precio_venta"];

          	$(".nuevoProducto").append(

          	'<div class="row" style="padding:5px 15px">'+

			  '<!-- Descripción del producto -->'+
	          
	          '<div class="col-md-9 col-sm-9" style="padding-right:0px">'+
	          
	            '<div class="input-group">'+
	              
	              '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProductoOrden" idProducto="'+idProducto+'"><i class="fa fa-times"></i></button></span>'+

	              '<input type="text" class="form-control nuevaDescripcionProducto" idProducto="'+id_producto+'" name="agregarProducto" value="'+descripcion+'" readonly required>'+

	            '</div>'+

	          '</div>'+

	          '<!-- Cantidad del producto -->'+

	          '<div class="col-md-3 col-sm-9">'+
	            
	             '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" idProducto="'+id_producto+'" min="1" value="1" stock="'+stock+'" nuevoStock="'+Number(nuevoStock)+'" required>'+

	          '</div>' +

	        '</div>') ;

	        // SUMAR TOTAL DE PRECIOS

	        //sumarTotalPrecios()

	        // AGREGAR IMPUESTO

	        //agregarImpuesto()

	        // AGRUPAR PRODUCTOS EN FORMATO JSON

	        listarProductos();

	        // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

	        //$(".nuevoPrecioProducto").number(true, 2);

      	}

     })

});

/*=============================================
QUITAR PRODUCTOS DE LA VENTA Y RECUPERAR BOTÓN
=============================================*/

$(".formularioOrdenes").on("click", "button.quitarProductoOrden", function(){

	$(this).parent().parent().parent().parent().remove();

	var idProducto = $(this).attr("idProducto");

	$("button.recuperarBoton[idProducto='"+idProducto+"']").removeClass('btn-default');

	$("button.recuperarBoton[idProducto='"+idProducto+"']").addClass('btn-primary agregarProductoOrden');

	listarProductos();

	//if($(".nuevoProducto").children().length == 0){
	//
	//	//$("#nuevoImpuestoVenta").val(0);
	//	//$("#nuevoTotalVenta").val(0);
	//	//$("#totalVenta").val(0);
	//	//$("#nuevoTotalVenta").attr("total",0);
	//
	//}else{
	//
	//	// SUMAR TOTAL DE PRECIOS
	//
	////sumarTotalPrecios()
	//
	//// AGREGAR IMPUESTO
	//
	//   //agregarImpuesto()
	//
	//   // AGRUPAR PRODUCTOS EN FORMATO JSON
	//
	//
	//
	//}

})

/*=============================================
AGREGANDO PRODUCTOS DESDE EL BOTÓN PARA DISPOSITIVOS
=============================================*/

$(".btnAgregarProductoOrden").click(function(){

	var datos = new FormData();
	datos.append("traerProductos", "ok");

	$.ajax({

		url:"ajax/productos.ajax.php",
      	method: "POST",
      	data: datos,
      	cache: false,
      	contentType: false,
      	processData: false,
      	dataType:"json",
      	success:function(respuesta){
      	    
      	    	$(".nuevoProducto").append(

          	'<div class="row" style="padding:5px 15px">'+

			  '<!-- Descripción del producto -->'+
	          
	          '<div class="col-md-9 col-sm-9" style="padding-right:0px">'+
	          
	            '<div class="input-group">'+
	              
	              '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProductoOrden" idProducto><i class="fa fa-times"></i></button></span>'+

	              '<select class="form-control nuevaDescripcionProducto" idProducto name="nuevaDescripcionProducto" required>'+

	              '<option>Seleccione el producto</option>'+

	              '</select>'+  

	            '</div>'+

	          '</div>'+

	          '<!-- Cantidad del producto -->'+

	          '<div class="col-md-3 col-sm-9 ingresoCantidad">'+
	            
	             '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock nuevoStock required>'+

	          '</div>' +

	        '</div>');


	        // AGREGAR LOS PRODUCTOS AL SELECT 

	         respuesta.forEach(funcionForEach);

			function funcionForEach(item, index){

				$(".nuevaDescripcionProducto").append(

					'<option idProducto="'+item.id+'" value="'+item.descripcion+'">'+item.descripcion+'</option>'
				)

			}

	         // SUMAR TOTAL DE PRECIOS

    		//sumarTotalPrecios()

    		// AGREGAR IMPUESTO
	        
	        //agregarImpuesto()

	        // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

	        //$(".nuevoPrecioProducto").number(true, 2);
			listarProductos()

      	}


	})

})

/*=============================================
SELECCIONAR PRODUCTO
=============================================*/

$(".formularioOrdenes").on("change", "select.nuevaDescripcionProducto", function(){

	var nombreProducto = $(this).val();

	//var nuevoPrecioProducto = $(this).parent().parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");

	var nuevaCantidadProducto = $(this).parent().parent().parent().children(".ingresoCantidad").children(".nuevaCantidadProducto");

	var datos = new FormData();
    datos.append("nombreProducto", nombreProducto);


	  $.ajax({

     	url:"ajax/productos.ajax.php",
      	method: "POST",
      	data: datos,
      	cache: false,
      	contentType: false,
      	processData: false,
      	dataType:"json",
      	success:function(respuesta){
      	    
      	    $(nuevaCantidadProducto).attr("stock", respuesta["stock"]);
      	    $(nuevaCantidadProducto).attr("nuevoStock", Number(respuesta["stock"])+1);
			$(nuevaCantidadProducto).attr("idProducto", respuesta["id"]);
      	    //$(nuevoPrecioProducto).val(respuesta["precio_venta"]);
      	    //$(nuevoPrecioProducto).attr("precioReal", respuesta["precio_venta"]);

  	      // AGRUPAR PRODUCTOS EN FORMATO JSON

	        listarProductos()

      	}

      })
})

/*=============================================
MODIFICAR LA CANTIDAD
=============================================*/

$(".formularioOrdenes").on("change", "input.nuevaCantidadProducto", function(){

	//var precio = $(this).parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");

	//var precioFinal = $(this).val() * precio.attr("precioReal");
	
	//precio.val(precioFinal);

	var nuevoStock = Number($(this).attr("stock")) + Number($(this).val());

	$(this).attr("nuevoStock", nuevoStock);

	//if(Number($(this).val()) > Number($(this).attr("stock"))){
    //
	//	$(this).val(1);
    //
	//	swal({
	//      title: "La cantidad supera el Stock",
	//      text: "¡Sólo hay "+$(this).attr("stock")+" unidades!",
	//      type: "error",
	//      confirmButtonText: "¡Cerrar!"
	//    });
    //
	//}

	// SUMAR TOTAL DE PRECIOS

	//sumarTotalPrecios()

	// AGREGAR IMPUESTO
	        
    //agregarImpuesto()

    // AGRUPAR PRODUCTOS EN FORMATO JSON

    listarProductos()

})

/*=============================================
SUMAR TODOS LOS PRECIOS
=============================================*/

//function sumarTotalPrecios(){
//
//	var precioItem = $(".nuevoPrecioProducto");
//	var arraySumaPrecio = [];
//
//	for(var i = 0; i < precioItem.length; i++){
//
//		 arraySumaPrecio.push(Number($(precioItem[i]).val()));
//
//	}
//
//	function sumaArrayPrecios(total, numero){
//
//		return total + numero;
//
//	}
//
//	var sumaTotalPrecio = arraySumaPrecio.reduce(sumaArrayPrecios);
//
//	$("#nuevoTotalVenta").val(sumaTotalPrecio);
//	$("#totalVenta").val(sumaTotalPrecio);
//	$("#nuevoTotalVenta").attr("total",sumaTotalPrecio);
//
//
//}

/*=============================================
FUNCIÓN AGREGAR IMPUESTO
=============================================*/

//function agregarImpuesto(){
//
//	var impuesto = $("#nuevoImpuestoVenta").val();
//	var precioTotal = $("#nuevoTotalVenta").attr("total");
//
//	var precioImpuesto = Number(precioTotal * impuesto/100);
//
//	var totalConImpuesto = Number(precioImpuesto) + Number(precioTotal);
//
//	$("#nuevoTotalVenta").val(totalConImpuesto);
//
//	$("#totalVenta").val(totalConImpuesto);
//
//	$("#nuevoPrecioImpuesto").val(precioImpuesto);
//
//	$("#nuevoPrecioNeto").val(precioTotal);
//
//}

/*=============================================
CUANDO CAMBIA EL IMPUESTO
=============================================*/

//$("#nuevoImpuestoVenta").change(function(){
//
//	agregarImpuesto();
//
//});

/*=============================================
FORMATO AL PRECIO FINAL
=============================================*/

//$("#nuevoTotalVenta").number(true, 2);


/*=============================================
LISTAR TODOS LOS PRODUCTOS
=============================================*/

function listarProductos(){

	var listaProductos = [];

	var descripcion = $(".nuevaDescripcionProducto");

	var cantidad = $(".nuevaCantidadProducto");

	//var precio = $(".nuevoPrecioProducto");

	for(var i = 0; i < descripcion.length; i++){

		listaProductos.push({ "id" : $(cantidad[i]).attr("idProducto"),
							  "descripcion" : $(descripcion[i]).val(),
							  "cantidad" : $(cantidad[i]).val(),
							  "stock" : $(cantidad[i]).attr("nuevoStock")})

	}

	$("#listaProductos").val(JSON.stringify(listaProductos)); 

}


/*=============================================
BORRAR ORDEN
=============================================*/
$(".tablaOrdenesCompra").on("click", ".btnEliminarOrden", function(){

  var idOrden = $(this).attr("idOrden");

  swal({
        title: '¿Está seguro de anular la orden?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Continuar'
      }).then((result) => {
        if (result.value) {
          
            window.location = "index.php?ruta=ordenes&idOrden="+idOrden;
        }

  })

})

/*=============================================
 EDITAR CATEGORIA
 =============================================*/

$(".tablaOrdenesCompra").on("click", ".btnVerItemOrden", function(){

	var idCompra = $(this).attr("idCompra");
	var id_compra = $(this).attr("id_compra");

	$("#detalleCompra").html(id_compra);

	var datos = new FormData();
	datos.append("idCompra", idCompra);

	$(".verDetalleCompras").empty();

	$.ajax({

		url:"ajax/compras.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"json",
		success:function(respuesta){


			respuesta.forEach(funcionForEach);


			function funcionForEach(item, index){

				$(".verDetalleCompras").append(

					'<div class="row" style="padding:5px 15px">'+

					'<!-- Descripción del producto -->'+

					'<div class="col-md-9 col-sm-9" style="padding-right:0px">'+

					'<div class="input-group">'+

					'<span class="input-group-addon"><button type="button" class="btn btn-default btn-xs" ><i class="fa fa-check"></i></button></span>'+

					'<input type="text" class="form-control" name="nombre" value="'+item.descripcion+'" readonly >'+

					'</div>'+

					'</div>'+

					'<!-- Cantidad del producto -->'+

					'<div class="col-md-3 col-sm-3">'+

					'<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto"  value="'+item.cantidad+'" readonly>'+

					'</div>' +

					'</div>') ;

			}


		}

	})


})

/*=============================================
IMPRIMIR FACTURA
=============================================*/

//$(".tablas").on("click", ".btnImprimirFactura", function(){
//
//  var codigoVenta = $(this).attr("codigoVenta");
//
//  window.open("extensiones/tcpdf/pdf/factura.php?codigo="+codigoVenta,'_blank');
//
//});


/*=============================================
DATE RANGE
=============================================*/

//$('#daterange-btn').daterangepicker(
//  {
//    ranges   : {
//      'Hoy'       : [moment(), moment()],
//      'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
//      'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
//      'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
//      'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
//      'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
//    },
//    startDate: moment().subtract(29, 'days'),
//    endDate  : moment()
//  },
//  function (start, end) {
//    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
//
//    var fechaInicial = start.format('YYYY-M-D');
//
//    var fechaFinal = end.format('YYYY-M-D');
//
//    var datos = new FormData();
//    datos.append("fechaInicial", fechaInicial);
//    datos.append("fechaFinal", fechaFinal);
//
//     $.ajax({
//
//     	url:"ajax/ventas.ajax.php",
//      	method: "POST",
//      	data: datos,
//      	cache: false,
//      	contentType: false,
//      	processData: false,
//      	dataType:"json",
//      	success:function(respuesta){
//
//      		$(".rangoFechas tbody").html("");
//
//	  	    respuesta.forEach(funcionForEach);
//
//	        function funcionForEach(item, index){
//
//		        var idCliente = item.id_cliente;
//
//		        var datosCliente = new FormData();
//	    		datosCliente.append("idCliente", idCliente);
//
//	    		$.ajax({
//
//			     	url:"ajax/clientes.ajax.php",
//			      	method: "POST",
//			      	data: datosCliente,
//			      	cache: false,
//			      	contentType: false,
//			      	processData: false,
//			      	dataType:"json",
//			      	success:function(respuestaClientes){
//
//			      		var idUsuario = item.id_vendedor;
//
//				        var datosUsuario = new FormData();
//			    		datosUsuario.append("idUsuario", idUsuario);
//
//			    		$.ajax({
//
//					     	url:"ajax/usuarios.ajax.php",
//					      	method: "POST",
//					      	data: datosUsuario,
//					      	cache: false,
//					      	contentType: false,
//					      	processData: false,
//					      	dataType:"json",
//					      	success:function(respuestaUsuarios){
//
//					      		if($(".perfilUsuario").val() == "Administrador"){
//
//						      		$(".rangoFechas tbody").append(
//
//							  		 	'<tr>'+
//
//								            '<td>'+(index+1)+'</td>'+
//
//								            '<td>'+item.codigo+'</td>'+
//
//								            '<td>'+respuestaClientes["nombre"]+'</td>'+
//
//								            '<td>'+respuestaUsuarios["nombre"]+'</td>'+
//
//								            '<td>'+item.metodo_pago+'</td>'+
//
//								            '<td>$ '+item.neto+'</td>'+
//
//								            '<td>$ '+item.total+'</td>'+
//
//								            '<td>'+item.fecha+'</td>'+
//
//								            '<td>'+
//
//								              '<div class="btn-group">'+
//
//								                '<button class="btn btn-info"><i class="fa fa-print btnImprimirFactura" codigoVenta="'+item.codigo+'"></i></button>'+
//
//						                  		'<button class="btn btn-warning btnEditarVenta" idVenta="'+item.id+'"><i class="fa fa-pencil"></i></button>'+
//
//						                  		'<button class="btn btn-danger btnEliminarVenta" idVenta="'+item.id+'"><i class="fa fa-times"></i></button>'+
//
//								              '</div>'+
//
//								            '</td>'+
//
//								          '</tr>'
//				          			);
//
//					      		}else{
//
//					      			$(".rangoFechas tbody").append(
//
//							  		 	'<tr>'+
//
//								            '<td>'+(index+1)+'</td>'+
//
//								            '<td>'+item.codigo+'</td>'+
//
//								            '<td>'+respuestaClientes["nombre"]+'</td>'+
//
//								            '<td>'+respuestaUsuarios["nombre"]+'</td>'+
//
//								            '<td>'+item.metodo_pago+'</td>'+
//
//								            '<td>$ '+item.neto+'</td>'+
//
//								            '<td>$ '+item.total+'</td>'+
//
//								            '<td>'+item.fecha+'</td>'+
//
//								            '<td>'+
//
//								              '<div class="btn-group">'+
//
//								                '<button class="btn btn-info"><i class="fa fa-print btnImprimirFactura" codigoVenta="'+item.codigo+'"></i></button>'+
//
//								              '</div>'+
//
//								            '</td>'+
//
//								          '</tr>');
//
//
//					      		}
//
//			          		}
//
//			          	})
//
//			      	}
//
//			    })
//
//
//
//
//
//	        }
//
//      	}
//
//     })
//
//
//
//  }
//)


