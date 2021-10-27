/*=============================================
CARGAR LA TABLA DINÁMICA
=============================================*/

//$.ajax({
//	url:rutaOcultaFrontend+"ajax/datatable-ventas.ajax.php",
//	success:function(respuesta){
//
//
//		console.log("respuesta", respuesta);
//
//	}
//
//})

var table2 = $('.tablaVentas').DataTable({

	"ajax":rutaOcultaFrontend+"ajax/datatable-ventas.ajax.php",
	"columnDefs": [

		{
			"targets": -5,
			 "data": null,
			 "defaultContent": '<img class="img-thumbnail imgTablaVenta" width="60px">'

		},

		{
			"targets": -2,
			 "data": null,
			 "defaultContent": '<div class="btn-group"><button class="btn btn-success limiteStock"></button></div>'

		},

		{
			"targets": -1,
			 "data": null,
			 "defaultContent": '<div class="btn-group"><button class="btn btn-primary agregarProducto recuperarBoton" idProducto>Agregar</button></div>'

		}

	],

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
QUITAR PRODUCTOS DE LA VENTA Y RECUPERAR BOTÓN
=============================================*/

$(".formularioVenta").on("click", "button.quitarProducto", function(){

	$(this).parent().parent().parent().parent().remove();

	var idProducto = $(this).attr("idProducto");

	$("button.recuperarBoton[idProducto='"+idProducto+"']").removeClass('btn-default');

	$("button.recuperarBoton[idProducto='"+idProducto+"']").addClass('btn-primary agregarProducto');

	listarProductos()



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
     //   listarProductos()
    //
	//}

})

///*=============================================
//AGREGANDO PRODUCTOS DESDE EL BOTÓN PARA DISPOSITIVOS
//=============================================*/
//
$(".btnAgregarProducto").click(function(){


	var datos = new FormData();
	datos.append("traerProductos", "ok");

	$.ajax({

		url:rutaOcultaFrontend+"ajax/productos.ajax.php",
      	method: "POST",
      	data: datos,
      	cache: false,
      	contentType: false,
      	processData: false,
      	dataType:"json",
      	success:function(respuesta){

      	    	$(".nuevoProducto").append(

          	'<div class="row" style="padding:10px 40px;">'+


				'<div class="col-md-3 col-xs-3" style="padding-right:0px">'+

				'</div>'+

			  '<!-- Descripción del producto -->'+

	          '<div class="col-md-6 col-xs-6" style="padding-right:0px">'+

	            '<div class="input-group">'+

	              '<span class="input-group-addon" style="padding-top:5px; padding-right: 5px"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto><i class="fa fa-times"></i></button></span>'+

	              '<select class="form-control nuevaDescripcionProducto" idProducto name="nuevaDescripcionProducto" required>'+

	              '<option>Seleccione el producto</option>'+

	              '</select>'+

	            '</div>'+

	          '</div>'+

	          '<!-- Cantidad del producto -->'+

	          '<div class="col-md-3 col-xs-3 ingresoCantidad" >'+

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

			listarProductos()

	         // SUMAR TOTAL DE PRECIOS

    		//sumarTotalPrecios()

    		// AGREGAR IMPUESTO

	        //agregarImpuesto()

	        // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

	        //$(".nuevoPrecioProducto").number(true, 2);

      	}


	})

})

/*=============================================
SELECCIONAR PRODUCTO
=============================================*/

$(".formularioVenta").on("change", "select.nuevaDescripcionProducto", function(){


	var nombreProducto = $(this).val();


	//var nuevoPrecioProducto = $(this).parent().parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");

	var nuevaCantidadProducto = $(this).parent().parent().parent().children(".ingresoCantidad").children(".nuevaCantidadProducto");

	var datos = new FormData();
    datos.append("nombreProducto", nombreProducto);


	  $.ajax({

     	url:rutaOcultaFrontend+"ajax/productos.ajax.php",
      	method: "POST",
      	data: datos,
      	cache: false,
      	contentType: false,
      	processData: false,
      	dataType:"json",
      	success:function(respuesta){

      	    $(nuevaCantidadProducto).attr("stock", respuesta["stock"]);
      	    $(nuevaCantidadProducto).attr("nuevoStock", Number(respuesta["stock"])-1);
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

$(".formularioVenta").on("change", "input.nuevaCantidadProducto", function(){

	//var precio = $(this).parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");

	//var precioFinal = $(this).val() * precio.attr("precioReal");

	//precio.val(precioFinal);

	var nuevoStock = Number($(this).attr("stock")) - $(this).val();

	$(this).attr("nuevoStock", nuevoStock);

	//esto valida si la cantidad
	if(Number($(this).val()) > Number($(this).attr("stock"))){

		$(this).val(1);

		swal({
	      title: "La cantidad supera el Stock",
	      text: "¡Sólo hay "+$(this).attr("stock")+" unidades!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

	}

	// SUMAR TOTAL DE PRECIOS

	//sumarTotalPrecios()

	// AGREGAR IMPUESTO

    //agregarImpuesto()

    // AGRUPAR PRODUCTOS EN FORMATO JSON

    listarProductos()

})


/*=============================================
LISTAR TODOS LOS PRODUCTOS
=============================================*/

function listarProductos(){

	var listaProductos = [];

	var descripcion = $(".nuevaDescripcionProducto");

	var cantidad = $(".nuevaCantidadProducto");



	for(var i = 0; i < descripcion.length; i++){

		listaProductos.push({ "id" : $(cantidad[i]).attr("idProducto"),
							  "descripcion" : $(descripcion[i]).val(),
							  "cantidad" : $(cantidad[i]).val(),
							  "stock" : $(cantidad[i]).attr("nuevoStock")})
	}

	$("#listaProductos").val(JSON.stringify(listaProductos));

}


/*=============================================
IMPRIMIR SERVICIO PLOMERIA
=============================================*/
$(".btnImprimirIncidenciaServicioPlomeria").click(function(e){

	e.preventDefault();

	var idIncidencia = $(this).attr("idIncidencia");


	window.open("../extensiones/tcpdf/pdf/servicio-plomeria.php?codigo="+idIncidencia,'_blank');

});

/*=============================================
 IMPRIMIR SERVICIO PLOMERIA
 =============================================*/
$(".btnImprimirIncidenciaServicio").click(function(e){

	e.preventDefault();

	var idIncidencia = $(this).attr("idIncidencia");


	window.open("../extensiones/tcpdf/pdf/servicio-general.php?codigo="+idIncidencia,'_blank');

});

//$(".tablas").on("click", ".btnImprimirFactura", function(){
//
//  var codigoVenta = $(this).attr("codigoVenta");
//
//  window.open("extensiones/tcpdf/pdf/factura.php?codigo="+codigoVenta,'_blank');
//
//});
//
//
//
//
