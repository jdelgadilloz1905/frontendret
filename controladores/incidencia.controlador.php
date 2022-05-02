<?php

class ControladorIncidencia{

	/*=============================================
	MOSTRAR Incidencia
	=============================================*/

	static public function ctrMostrarIncidencias($item, $valor){

		$tabla = "incidencias";

		$respuesta = ModeloIncidencia::mdlMostrarIncidencias($tabla, $item, $valor);

		return $respuesta;

	}

    /*=============================================
    MOSTRAR Incidencia FILTRO
    =============================================*/

    static public function ctrMostrarIncidenciasFiltro($item, $valor, $aprobado){

        $tabla = "incidencias";

        $respuesta = ModeloIncidencia::mdlMostrarIncidenciasFiltro($tabla, $item, $valor, $aprobado);

        return $respuesta;

    }

	/*=============================================
	MOSTRAR Incidencia por tecnico
	=============================================*/

	static public function ctrMostrarIncidenciasTecnico($item, $valor){

		$tabla = "incidencias";

		$respuesta = ModeloIncidencia::mdlMostrarIncidenciasTecnico($tabla, $item, $valor);

		return $respuesta;

	}

    /*=============================================
    MOSTRAR Incidencia por tecnico Y ESTATUS
    =============================================*/

    static public function ctrMostrarIncidenciasTecnicoEstatus($item, $valor,$item2, $valor2){

        $tabla = "incidencias";

        $respuesta = ModeloIncidencia::mdlMostrarIncidenciasTecnicoEstatus($tabla, $item, $valor,$item2, $valor2);

        return $respuesta;

    }

    /*=============================================
    MOSTRAR Incidencia por tecnico API
    =============================================*/

    static public function ctrMostrarIncidenciasTecnicoAPI($item, $valor,$limite,$posicion){

        $tabla = "incidencias";

        $respuesta = ModeloIncidencia::mdlMostrarIncidenciasTecnicoAPI($tabla, $item, $valor,$limite,$posicion);

        return $respuesta;

    }

    /*=============================================
    MOSTRAR incidencia con el buscador SEARCH API
    ===============================================*/

    static public function ctrMostrarIncidenciaTecnicoLikeAPI($item,$valor,$limite,$search){

        $tabla = "incidencias";

        $respuesta = ModeloIncidencia::mdlMostrarIncidenciasTecnicoLikeAPI($tabla,$item,$valor,$limite,$search);

        return $respuesta;
    }

	/*=============================================
	cantidad Incidencia
	=============================================*/

	static public function ctrContarIncidencias($item, $valor){

		$tabla = "incidencias";

		$respuesta = ModeloIncidencia::mdlContarIncidencias($tabla, $item, $valor);

		return $respuesta;

	}
	/*=============================================
	cantidad Incidencia POR TECNICO
	=============================================*/

	static public function ctrContarIncidenciasTecnico($item, $valor,$item1, $valor1){

		$tabla = "incidencias";

		$respuesta = ModeloIncidencia::mdlContarIncidenciasTecnico($tabla, $item, $valor, $item1, $valor1);

		return $respuesta;

	}


	/*=============================================
	CREAR INCIDENCIA
	=============================================*/


	static public function ctrCrearIncidencia(){

		if(isset($_POST["ingTipoServicio"])){

			//BUSCO el grupo familiar que esta asociado el cliente

			$result = ModeloGrupo::mdlMostrarGrupoCliente("clientes", "id", $_POST["ingclienteInc"], null, null);

			$cadena = str_replace("-", "/", $_POST["ingFechaVisita"]);
            $dateVisita = new DateTime($cadena);
            $fechaVisita = date_format($dateVisita, 'Y-m-d'); // 2011-07-01 00:00:00


			$estatus = ($_POST["ingTecnico"]>0 ? "asignado" : "pendiente");
			$datos = array(
				"ingId" =>$_POST["ingId"],
				"ingclienteInc" =>$_POST["ingclienteInc"],
				"ingDireccion" =>$_POST["ingDireccion"],
				"ingFechaVisita" =>$fechaVisita,
				"ingAsunto" =>$_POST["ingAsunto"],
				"ingTecnico" =>$_POST["ingTecnico"],
				"ingPrioridad" =>$_POST["ingPrioridad"],
				"ingDescripcion" =>$_POST["ingDescripcion"],
				"ingEstatus" =>$estatus,
				"tipo_servicio" =>$_POST["ingTipoServicio"],
				"id_grupo"=>$result["id_grupo"],
                "id_ruta"=>$_POST["ingRuta"]

			);


			$tabla = "incidencias";

			$respuesta = ModeloIncidencia::mdlCrearIncidencia($tabla,$datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "Se ha creado el servicio correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Continuar"
					  }).then((result) => {
								if (result.value) {

								window.location = "admin-incidencia";

								}
							})

				</script>';

			}else{

				echo "nada";
			}

		}
	}

	/*==============================================
	ACTUALIZAR OPCIONES DE INCIDENCIAS
	================================================*/

	static public function ctrActualizarOpcionesIncidencias(){

		if(isset($_POST["actBotonOpcionesIncidencias"])){

			if(!empty($_POST["actidIncidencias"])){

				//obtengo en un array todas las incidencias
				$id_incidencia = explode(",",$_POST["actidIncidencias"]);

				$momento = "archivo";

				$FileUploader = new FileUploader('files',array(

					'limit' => 3,
					'maxSize' => null,
					'fileMaxSize' => 3,
					'extensions' => null,
					'required' => false,
					'uploadDir' => 'vistas/img/archivos/',
					'title' => 'auto',
					'replace' => false,
					'listInput' => true,
					'files' => null
				));


				for($i = 0; $i < count($id_incidencia); ++$i ){

					//INSERTAMOS LOS ARCHIVOS DE LA INCIDENCIA
					// desvincular los archivos
					// !importante solo para archivos precargados
					// you will need to give the array with appendend files in 'files' option of the fileUploader
					foreach($FileUploader->getRemovedFiles('file') as $key=>$value) {
						unlink('vistas/img/archivos/' . $value['name']);
					}

					// llama para subir los archivos
					$fecha_subida = date("YmdHis");
					$data = $FileUploader->upload($fecha_subida);

					// SI CARGO LOS ARCHIVOS, MENSAJE DE EXITO
					if($data['isSuccess'] && count($data['files']) > 0) {
						// obtener archivos cargados
						$uploadedFiles = $data['files'];
					}


					// obtener la lista de archivos
					$fileList = $FileUploader->getFileList();

					//INSERTO LAS RUTAS DE LAS FOTOS INSERTADAS
					foreach($fileList as $rutaImagen){

						$rutaImagenAnuncio= 'vistas/img/archivos/'.$rutaImagen["name"];
						$datos = array(
							"name"=>$rutaImagen["name"],
							"type"=>$rutaImagen["type"],
							"title"=>$rutaImagen["title"],
							"size"=>$rutaImagen["size"],
							"extension"=>$rutaImagen["extension"],
							"img_url"=>$rutaImagenAnuncio,
							"id_incidencia"=>$id_incidencia[$i],
							"momento" =>$momento
						);



						self::ctrInsertarImagenAnuncio($datos);


					}


				}

				if(isset($_POST["actFechaVisita"]) && !empty($_POST["actFechaVisita"])){

					$item = "fecha_visita";

                    $cadena = str_replace("-", "/", $_POST["actFechaVisita"]);
                    $dateVisita = new DateTime($cadena);
                    $fechaVisita = date_format($dateVisita, 'Y-m-d'); // 2011-07-01 00:00:00


					$valor = $fechaVisita;
					$tabla = "incidencias";
					ModeloIncidencia::mdlActualizarOpciones($tabla,$item,$valor,$_POST["actidIncidencias"]);

				}
				if(isset($_POST["actTecnico"]) && !empty($_POST["actTecnico"])){

					$item = "id_tecnico";
					$valor = $_POST["actTecnico"];
					$tabla = "incidencias";
					ModeloIncidencia::mdlActualizarOpcionesTecnico($tabla,$item,$valor,$_POST["actidIncidencias"],"asignado");

				}

				echo'<script>

				localStorage.removeItem("localMarcaIncidencia");

				swal({
					  type: "success",
					  title: "Buen trabajo",
					  text: "Se han actualizado los servicios seleccionado",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then((result) => {
								if (result.value) {

								//window.location = "admin-incidencia";

								}
							})

				</script>';

			}else{

				echo'<script>

				swal({
					  type: "error",
					  title: "Error Actualizando",
					  text: "Debe seleccionar al menos una casilla.",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then((result) => {
								if (result.value) {

								//window.location = "admin-incidencia";

								}
							})

				</script>';
			}

		}elseif (isset($_POST["btnEliminarLoteIncidencia"])){

            $respuesta = ModeloIncidencia::mdlEliminarIncidenciaxLote("incidencias",$_POST["actidIncidencias"]);

            if ($respuesta=="ok"){

                echo'<script>

				localStorage.removeItem("localMarcaIncidencia");

				swal({
					  type: "success",
					  title: "Buen trabajo",
					  text: "Los servicios han sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then((result) => {
								if (result.value) {

								window.location = "admin-incidencia";

								}
							})

				</script>';
            }else{

                echo'<script>

				localStorage.removeItem("localMarcaIncidencia");

				swal({
					  type: "error",
					  title: "Error",
					  text: "No se elimino el servicio, consulte con soporte",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then((result) => {
								if (result.value) {

								//window.location = "admin-incidencia";

								}
							})

				</script>';
            }
        }

	}

	static public function ctrAprobarIncidencias(){

	    if(isset($_POST["actBotonAprobarIncidencias"])){
            if(!empty($_POST["aprobarIncidencias"])){

                $respuesta = ModeloIncidencia::mdlAprobarIncidencias("incidencias",$_POST["aprobarIncidencias"],$_SESSION["nombre"]);

                if ($respuesta=="ok"){

                    //envio email de aprobado con el link del archivo a descargar
                    $resultado = ModeloIncidencia::mdlShowDatosUsuarioXincidencia($_POST["aprobarIncidencias"]);
                    if($resultado){

                        foreach ($resultado as $key => $value){
                            $tipo = $value["tipo_servicio"] == "plomeria" ? "servicio-plomeria.php?codigo=" : "servicio-general.php?codigo=";

                            if(!empty($value["email"])){
                                self::ctrEnviarEmailAprobacion($value,$tipo);
                            }

                        }
                    }

                    echo'<script>

				localStorage.removeItem("localMarcaAprobarServicio");

				swal({
					  type: "success",
					  title: "Buen trabajo",
					  text: "Los servicios han sido actualizado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then((result) => {
								if (result.value) {

								window.location = "admin-incidencia";

								}
							})

				</script>';
                }else{

                    echo'<script>

				localStorage.removeItem("localMarcaIncidencia");

				swal({
					  type: "error",
					  title: "Error",
					  text: "No se actualizo las servicios, consulte con soporte",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then((result) => {
								if (result.value) {

								//window.location = "admin-incidencia";

								}
							})

				</script>';
                }
            }

        }
    }

    /*=============================================
	ENVIAR EMAIL DE APROBACION
	===============================================*/

    static public function ctrEnviarEmailAprobacion($data,$tipo){

        /*=============================================
                        VERIFICACIÓN CORREO ELECTRÓNICO
                      =============================================*/

        date_default_timezone_set("America/Bogota");

        $url = Ruta::ctrRutaPlanillaServicio();

        $mail = new PHPMailer;

        $mail->CharSet = 'UTF-8';

        $mail->isMail();

        $mail->setFrom('no-reply@ret.com', 'RET');

        $mail->addReplyTo('jdelgadilloz1905@@gmail.com', 'RET');

        $mail->Subject = "APROBACION DE SERVICIO";

        $mail->addAddress($data["email"]);

        $mail->msgHTML('
                                <div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">

                                    <div style="position:relative; margin:auto; width:600px; background:white; padding:20px">

                                        <center>

                                            <img style="padding:20px; width:15%" src="http://tutorialesatualcance.com/tienda/icon-email.png">

                                            <h3 style="font-weight:100; color:#999">INCIDENCIA '.$data["id_incidencia"].' HA SIDO APROBADA</h3>

                                            <hr style="border:1px solid #ccc; width:80%">

                                            <h4 style="font-weight:100; color:#999; padding:0 20px">En el siguiente link puede descargar la hoja de servicio</h4>

                                            <a href="' . $url . $tipo .$data["id_incidencia"] . '" target="_blank" style="text-decoration:none">

                                                Imprimir
                                            </a>

                                            <br>

                                            <hr style="border:1px solid #ccc; width:80%">

                                            <h5 style="font-weight:100; color:#999">Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminará.</h5>

                                        </center>

                                    </div>
                                </div>'
        );

        $envio = $mail->Send();

        if (!$envio) {

            echo json_encode(array(
                "statusCode" => 400,
                "error" => false,
                "mensaje" =>"¡Ha ocurrido un problema enviando verificación de correo electrónico a " . $data["email"] . $mail->ErrorInfo . "!"
            ));

        } else {

            echo json_encode(array(
                "statusCode" => 200,
                "error" => false,
                "mensaje" =>"¡Excelente trabajo, el email " . $data["nombre"] . ", se ha enviado correctamente",
            ));


        }

    }

	/*=============================================
	CREAR VENTA
	=============================================*/

	static public function ctrCrearVenta(){

		if(isset($_POST["nuevaVenta"])){

			/*=============================================
			ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCIR EL
			STOCK Y AUMENTAR LAS Incidencia DE LOS PRODUCTOS
			=============================================*/

			$listaProductos = json_decode($_POST["listaProductos"], true);

			$totalProductosComprados = array();

			foreach ($listaProductos as $key => $value) {

			   array_push($totalProductosComprados, $value["cantidad"]);
				
			   $tablaProductos = "productos";

			    $item = "id";
			    $valor = $value["id"];
			    $orden = null;

			    $traerProducto = ModeloProductos::mdlMostrarProductos($tablaProductos, $item, $valor, $orden);

				$item1a = "Incidencia";
				$valor1a = $value["cantidad"] + $traerProducto["Incidencia"];

			    $nuevasIncidencia = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1a, $valor1a, $valor);

				$item1b = "stock";
				$valor1b = $value["stock"];

				$nuevoStock = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1b, $valor1b, $valor);

			}

			$tablaClientes = "clientes";

			$item = "id";
			$valor = $_POST["seleccionarCliente"];

			$traerCliente = ModeloClientes::mdlMostrarClientes($tablaClientes, $item, $valor);

			$item1a = "compras";
			$valor1a = array_sum($totalProductosComprados) + $traerCliente["compras"];

			$comprasCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item1a, $valor1a, $valor);

			$item1b = "ultima_compra";

			date_default_timezone_set('America/Bogota');

			$fecha = date('Y-m-d');
			$hora = date('H:i:s');
			$valor1b = $fecha.' '.$hora;

			$fechaCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item1b, $valor1b, $valor);

			/*=============================================
			GUARDAR LA COMPRA
			=============================================*/	

			$tabla = "incidencia";

			$datos = array("id_vendedor"=>$_POST["idVendedor"],
						   "id_cliente"=>$_POST["seleccionarCliente"],
						   "codigo"=>$_POST["nuevaVenta"],
						   "productos"=>$_POST["listaProductos"],
						   "impuesto"=>$_POST["nuevoPrecioImpuesto"],
						   "neto"=>$_POST["nuevoPrecioNeto"],
						   "total"=>$_POST["totalVenta"],
						   "metodo_pago"=>$_POST["listaMetodoPago"]);

			$respuesta = ModeloIncidencia::mdlIngresarVenta($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				localStorage.removeItem("rango");

				swal({
					  type: "success",
					  title: "La venta ha sido guardada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then((result) => {
								if (result.value) {

								window.location = "Incidencia";

								}
							})

				</script>';

			}

		}

	}

	/*=============================================
	EDITAR VENTA
	=============================================*/

	static public function ctrEditarVenta(){

		if(isset($_POST["editarVenta"])){

			/*=============================================
			FORMATEAR TABLA DE PRODUCTOS Y LA DE CLIENTES
			=============================================*/
			$tabla = "Incidencia";

			$item = "codigo";
			$valor = $_POST["editarVenta"];

			$traerVenta = ModeloIncidencia::mdlMostrarIncidencia($tabla, $item, $valor);

			$productos =  json_decode($traerVenta["productos"], true);

			$totalProductosComprados = array();

			foreach ($productos as $key => $value) {

				array_push($totalProductosComprados, $value["cantidad"]);
				
				$tablaProductos = "productos";

				$item = "id";
				$valor = $value["id"];
				$orden = null;

				$traerProducto = ModeloProductos::mdlMostrarProductos($tablaProductos, $item, $valor, $orden);

				$item1a = "Incidencia";
				$valor1a = $traerProducto["Incidencia"] - $value["cantidad"];

				$nuevasIncidencia = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1a, $valor1a, $valor);

				$item1b = "stock";
				$valor1b = $value["cantidad"] + $traerProducto["stock"];

				$nuevoStock = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1b, $valor1b, $valor);

			}

			$tablaClientes = "clientes";

			$itemCliente = "id";
			$valorCliente = $_POST["seleccionarCliente"];

			$traerCliente = ModeloClientes::mdlMostrarClientes($tablaClientes, $itemCliente, $valorCliente);

			$item1a = "compras";
			$valor1a = $traerCliente["compras"] - array_sum($totalProductosComprados);

			$comprasCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item1a, $valor1a, $valor);

			/*=============================================
			ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCIR EL STOCK Y AUMENTAR LAS Incidencia DE LOS PRODUCTOS
			=============================================*/

			$listaProductos_2 = json_decode($_POST["listaProductos"], true);

			$totalProductosComprados_2 = array();

			foreach ($listaProductos_2 as $key => $value) {

				array_push($totalProductosComprados_2, $value["cantidad"]);
				
				$tablaProductos_2 = "productos";

				$item_2 = "id";
				$valor_2 = $value["id"];
				$orden = null;

				$traerProducto_2 = ModeloProductos::mdlMostrarProductos($tablaProductos_2, $item_2, $valor_2, $orden);

				$item1a_2 = "Incidencias";
				$valor1a_2 = $value["cantidad"] + $traerProducto_2["Incidencia"];

				$nuevasIncidencia_2 = ModeloProductos::mdlActualizarProducto($tablaProductos_2, $item1a_2, $valor1a_2, $valor_2);

				$item1b_2 = "stock";
				$valor1b_2 = $value["stock"];

				$nuevoStock_2 = ModeloProductos::mdlActualizarProducto($tablaProductos_2, $item1b_2, $valor1b_2, $valor_2);

			}

			$tablaClientes_2 = "clientes";

			$item_2 = "id";
			$valor_2 = $_POST["seleccionarCliente"];

			$traerCliente_2 = ModeloClientes::mdlMostrarClientes($tablaClientes_2, $item_2, $valor_2);

			$item1a_2 = "compras";
			$valor1a_2 = array_sum($totalProductosComprados_2) + $traerCliente_2["compras"];

			$comprasCliente_2 = ModeloClientes::mdlActualizarCliente($tablaClientes_2, $item1a_2, $valor1a_2, $valor_2);

			$item1b_2 = "ultima_compra";

			date_default_timezone_set('America/Bogota');

			$fecha = date('Y-m-d');
			$hora = date('H:i:s');
			$valor1b_2 = $fecha.' '.$hora;

			$fechaCliente_2 = ModeloClientes::mdlActualizarCliente($tablaClientes_2, $item1b_2, $valor1b_2, $valor_2);

			/*=============================================
			GUARDAR CAMBIOS DE LA COMPRA
			=============================================*/	

			$datos = array("id_vendedor"=>$_POST["idVendedor"],
						   "id_cliente"=>$_POST["seleccionarCliente"],
						   "codigo"=>$_POST["editarVenta"],
						   "productos"=>$_POST["listaProductos"],
						   "impuesto"=>$_POST["nuevoPrecioImpuesto"],
						   "neto"=>$_POST["nuevoPrecioNeto"],
						   "total"=>$_POST["totalVenta"],
						   "metodo_pago"=>$_POST["listaMetodoPago"]);


			$respuesta = ModeloIncidencia::mdlEditarIncidencia($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				localStorage.removeItem("rango");

				swal({
					  type: "success",
					  title: "El servicio ha sido editada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then((result) => {
								if (result.value) {

								window.location = "admin-incidencia";

								}
							})

				</script>';

			}

		}

	}

	/*=============================================
	ELIMINAR INCIDENCIA
	=============================================*/

	static public function ctrEliminarIncidencia($id_incidencia){
		
		$tabla = "incidencias";

		$item = "id";
		$valor = $id_incidencia;

		$respuesta = ModeloIncidencia::mdlEliminarIncidencia($tabla, $item,$valor);

		$tabla2="incidencias_fotos";

		$item2 = "id_incidencia";

		ModeloIncidencia::mdlEliminarIncidencia($tabla2, $item2,$valor);

		return $respuesta;
		

	}

	/*=============================================
	RANGO FECHAS
	=============================================*/	

	static public function ctrRangoFechasIncidencia($fechaInicial, $fechaFinal){

		$tabla = "incidencias";

		$respuesta = ModeloIncidencia::mdlRangoFechasIncidencia($tabla, $fechaInicial, $fechaFinal);

		return $respuesta;

	}

	/*============================================
	INCIDENCIAS POR TECNICO
	==============================================*/

	static public function ctrRangoTecnico($fechaInicial, $fechaFinal){

		$respuesta = ModeloIncidencia::mdlRangoTecnico($fechaInicial, $fechaFinal);

		return $respuesta;
	}

	/*=============================================
	SUMA TOTAL Incidencia
	=============================================*/

	static public function ctrSumaTotalIncidencia(){

		$tabla = "incidencias";

		$respuesta = ModeloIncidencia::mdlSumaTotalIncidencia($tabla);

		return $respuesta;

	}


	/*=============================================
	ACTUALIZAR INCIDENCIA
	===============================================*/
	static public function ctrActualizarIncidencia(){

		if(isset($_POST["actualizarCompleto"])){

			//SE CONSULTA SI LA INCIDENCIA ESTA INICIADA POR PARTE DEL TECNICO

			$respuesta = ModeloIncidencia::mdlValidarIncidenciaStart("incidencias",$_POST["editIdincidencia"]);

			if($respuesta["hora_inicio"] == "00:00:00"){

				$momento = "archivo";

				$FileUploader = new FileUploader('files',array(

					'limit' => 3,
					'maxSize' => null,
					'fileMaxSize' => 3,
					'extensions' => null,
					'required' => false,
					'uploadDir' => 'vistas/img/archivos/',
					'title' => 'auto',
					'replace' => false,
					'listInput' => true,
					'files' => null
				));


				//INSERTAMOS LOS ARCHIVOS DE LA INCIDENCIA
				// desvincular los archivos
				// !importante solo para archivos precargados
				// you will need to give the array with appendend files in 'files' option of the fileUploader
				foreach($FileUploader->getRemovedFiles('file') as $key=>$value) {
					unlink('vistas/img/archivos/' . $value['name']);
				}

				// llama para subir los archivos
				$fecha_subida = date("YmdHis");
				$data = $FileUploader->upload($fecha_subida);

				// SI CARGO LOS ARCHIVOS, MENSAJE DE EXITO
				if($data['isSuccess'] && count($data['files']) > 0) {
					// obtener archivos cargados
					$uploadedFiles = $data['files'];
				}


				// obtener la lista de archivos
				$fileList = $FileUploader->getFileList();

				//INSERTO LAS RUTAS DE LAS FOTOS INSERTADAS
				foreach($fileList as $rutaImagen){

					$rutaImagenAnuncio= 'vistas/img/archivos/'.$rutaImagen["name"];
					$datos = array(
						"name"=>$rutaImagen["name"],
						"type"=>$rutaImagen["type"],
						"title"=>$rutaImagen["title"],
						"size"=>$rutaImagen["size"],
						"extension"=>$rutaImagen["extension"],
						"img_url"=>$rutaImagenAnuncio,
						"id_incidencia"=>$_POST["editIdincidencia"],
						"momento" =>$momento
					);



					self::ctrInsertarImagenAnuncio($datos);


				}

				//Se arma el array de los datos que se van actualizar

                $cadena = str_replace("-", "/", $_POST["editFechaVisita"]);

                $dateVisita = new DateTime($cadena);
                $fechaVisita = date_format($dateVisita, 'Y-m-d'); // 2011-07-01 00:00:00

				$datos = array(
					"id_incidencia"=>$_POST["editIdincidencia"],
					"tipo_servicio"=>$_POST["editTipoServicio"],
					"id_cliente"=>$_POST["editclienteInc"],
					"direccion"=>$_POST["editDireccion"],
					"fecha_visita"=>$fechaVisita,
					"asunto"=>$_POST["editAsunto"],
					"id_tecnico"=>$_POST["editTecnico"],
					"prioridad"=>$_POST["editPrioridad"],
					"descripcion"=>$_POST["editDescripcion"],
                    "id_ruta"=>$_POST["editRuta"],
				);

				$resultado = ModeloIncidencia::mdlActualizarIncidencia("incidencias",$datos);

				if($resultado =="ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "El servicio ha sido actualizado",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then((result) => {
										if (result.value) {

										window.location = rutaOcultaFrontend+"admin-incidencia";

										}
									})

						</script>';
				}else{

					echo'<script>

						alert("Error actualizando incidencia")

					</script>';
				}

			}else{

				echo'<script>

				swal({
					  type: "error",
					  title: "El servicio ha sido iniciada",
					  showConfirmButton: true,
					  confirmButtonText: "Continuar"
					  }).then((result) => {
							if (result.value) {

								window.location = "admin-incidencia";

							}
						})

				</script>';
			}

		}
		/*======================================
		SOLO PARA SUBIR ARCHIVOS DE INCIDENCIAS
		========================================*/
		if(isset($_POST["actualizarArchivos"])){

			$momento = "archivo";

			$FileUploader = new FileUploader('files',array(

				'limit' => 3,
				'maxSize' => null,
				'fileMaxSize' => 3,
				'extensions' => null,
				'required' => false,
				'uploadDir' => 'vistas/img/archivos/',
				'title' => 'auto',
				'replace' => false,
				'listInput' => true,
				'files' => null
			));


			//INSERTAMOS LOS ARCHIVOS DE LA INCIDENCIA
			// desvincular los archivos
			// !importante solo para archivos precargados
			// you will need to give the array with appendend files in 'files' option of the fileUploader
			foreach($FileUploader->getRemovedFiles('file') as $key=>$value) {
				unlink('vistas/img/archivos/' . $value['name']);
			}

			// llama para subir los archivos
			$fecha_subida = date("YmdHis");
			$data = $FileUploader->upload($fecha_subida);

			// SI CARGO LOS ARCHIVOS, MENSAJE DE EXITO
			if($data['isSuccess'] && count($data['files']) > 0) {
				// obtener archivos cargados
				$uploadedFiles = $data['files'];
			}


			// obtener la lista de archivos
			$fileList = $FileUploader->getFileList();

			//INSERTO LAS RUTAS DE LAS FOTOS INSERTADAS
			foreach($fileList as $rutaImagen){

				$rutaImagenAnuncio= 'vistas/img/archivos/'.$rutaImagen["name"];
				$datos = array(
					"name"=>$rutaImagen["name"],
					"type"=>$rutaImagen["type"],
					"title"=>$rutaImagen["title"],
					"size"=>$rutaImagen["size"],
					"extension"=>$rutaImagen["extension"],
					"img_url"=>$rutaImagenAnuncio,
					"id_incidencia"=>$_POST["editIdincidencia"],
					"momento" =>$momento
				);

				self::ctrInsertarImagenAnuncio($datos);

			}

			echo '<script>
					var rutaOcultaFrontend = $("#rutaOculta").val();
					window.location= rutaOcultaFrontend+"detalle-incidencia/"+'.$_POST["editIdincidencia"].';
				  </script>';
		}
	}

	/*=============================================
	CARGA DE FOTOS ANTES Y DESPUES
	===============================================*/

	static public function ctrInsertarFotosIncidencia(){

		if(isset($_POST["guardarFotos"])){

			$momento = $_POST["minimal-radio"];

			$id_incidencia = $_POST["id_incidencia"];

			//INSERTAMOS LAS IMAGENES DEL ANUNCIO

			$FileUploader = new FileUploader('files',array(

				'limit' => 3,
				'maxSize' => null,
				'fileMaxSize' => 3,
				'extensions' => null,
				'required' => false,
				'uploadDir' => 'vistas/img/incidencias/',
				'title' => 'auto',
				'replace' => false,
				'listInput' => true,
				'files' => null
			));

			// desvincular los archivos
			// !importante solo para archivos precargados
			// you will need to give the array with appendend files in 'files' option of the fileUploader
			foreach($FileUploader->getRemovedFiles('file') as $key=>$value) {
				unlink('vistas/img/incidencias/' . $value['name']);
			}

			// llama para subir los archivos
			$data = $FileUploader->upload($_POST["id_incidencia"]);

			// SI CARGO LOS ARCHIVOS, MENSAJE DE EXITO
			if($data['isSuccess'] && count($data['files']) > 0) {
				// obtener archivos cargados
				$uploadedFiles = $data['files'];
			}

			// obtener la lista de archivos
			$fileList = $FileUploader->getFileList();

			//INSERTO LAS RUTAS DE LAS FOTOS INSERTADAS
			foreach($fileList as $rutaImagen){

				$rutaImagenAnuncio= 'vistas/img/incidencias/'.$rutaImagen["name"];
				$datos = array(
					"name"=>$rutaImagen["name"],
					"type"=>$rutaImagen["type"],
					"title"=>$rutaImagen["title"],
					"size"=>$rutaImagen["size"],
					"extension"=>$rutaImagen["extension"],
					"img_url"=>$rutaImagenAnuncio,
					"id_incidencia"=>$id_incidencia,
					"momento" =>$momento
				);



				self::ctrInsertarImagenAnuncio($datos);


			}

			echo '<script>
                        swal({
                          title: "¡Buen Trabajo!",
                          text: "Servicio actualizado correctamente.",
                          type: "success",
                          showCancelButton: false,
                          confirmButtonColor: "#3085d6",
                          cancelButtonColor: "#d33",
                          confirmButtonText: "Continuar"
                        }).then((result) => {
                          if (result.value) {

                            window.location= rutaOcultaFrontend+"detalle-incidencia/"+'.$id_incidencia.';
                          }
                        })

                    </script>';

		}
	}

	static public function ctrInsertarImagenAnuncio($datos){

		$tabla = "incidencias_fotos";

		$respuesta = ModeloIncidencia::mdlInsertarImagenincidencia($tabla,$datos);

		return $respuesta;
	}

	static public function ctrMostrarImagenesIncidencia($id_incidencia,$tipo){

		$tabla = "incidencias_fotos";

		$respuesta = ModeloIncidencia::mdlMostrarImagenesIncidencia($tabla,$id_incidencia,$tipo);

		return $respuesta;

	}

	static public function ctrEliminarFoto($datos,$cantidad){

		$tabla ="incidencias_fotos";

		$respuesta = ModeloIncidencia::mdlEliminarFoto($tabla,$datos);

		if($cantidad == 1){ //solo hay un solo registro ELIMINO EL ARCHIVO O FOTO

			if($respuesta=="ok"){

				//unlink("vistas/img/anuncios".$img["img_url"]);
				unlink("../".$datos["ruta_imagen"]);
			}

		}

		return $respuesta;
	}

	static public function ctrCambiarEstadoIncidencia($datos){

		$tabla = "incidencias";

		$respuesta = ModeloIncidencia::mdlCambiarEstadoIncidencia($tabla,$datos);

		return $respuesta;
	}

    /*=============================================
	CREAR SOPORTE PLOMERIA
	=============================================*/
    static public function ctrCrearSoportePlomeria(){


        if(isset($_POST["servicioGeneralPlomeria"])){

			if(isset($_POST["output"])){

					/*=============================================
				ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCIR EL STOCK Y AUMENTAR LAS VENTAS DE LOS PRODUCTOS
				=============================================*/
				if(isset($_POST["listaProductos"])){

					$listaProductos = json_decode($_POST["listaProductos"], true);

					$totalProductosComprados = array();

					foreach ($listaProductos as $key => $value) {

						array_push($totalProductosComprados, $value["cantidad"]);

						$tablaProductos = "productos";

						$item = "id";
						$valor = $value["id"];
						$orden = null;

						$traerProducto = ModeloProductos::mdlMostrarProductos($tablaProductos, $item, $valor, $orden);

						$item1a = "ventas";
						$valor1a = $value["cantidad"] + $traerProducto["ventas"];

						$nuevasVentas = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1a, $valor1a, $valor);

						$item1b = "stock";
						$valor1b = $value["stock"];

						$nuevoStock = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1b, $valor1b, $valor);

					}
				}

				//consulto si existe para pdoer actualizar o insertar
				$id_incidencia = $_POST["id_incidencia"];
				$respuesta = ModeloIncidencia::mdlConsultarServicioIncidencia("servicio_plomeria",$id_incidencia);

				$datos = array(
					"id_incidencia" => $_POST["id_incidencia"],
					"destape" => (isset($_POST["destape"])) ? $_POST["destape"] : "",
					"reparacion" => (isset($_POST["reparacion"])) ? $_POST["reparacion"] : "",
					"otros" => (isset($_POST["otros"])) ? $_POST["otros"] : "",
					"instalacion" => (isset($_POST["instalacion"])) ? $_POST["instalacion"] : "",
					"inspeccion" => (isset($_POST["inspeccion"])) ? $_POST["inspeccion"] : "",
					"detalle_servicio_regulares" => (isset($_POST["detalleServiciosRegulares"])) ? $_POST["detalleServiciosRegulares"] : "",
					"banos" => (isset($_POST["banos"])) ? $_POST["banos"] : "",
					"cocina" => (isset($_POST["cocina"])) ? $_POST["cocina"] : "",
					"otros1" => (isset($_POST["otros1"])) ? $_POST["otros1"] : "",
					"trampas" => (isset($_POST["trampas"])) ? $_POST["trampas"] : "",
					"drenaje" => (isset($_POST["drenaje"])) ? $_POST["drenaje"] : "",
					"detalle_servicio_realizado" => (isset($_POST["detalleServiciosRealizado"])) ? $_POST["detalleServiciosRealizado"] : "",
					"inspeccion_cctv" => (isset($_POST["inspeccionCctv"])) ? $_POST["inspeccionCctv"] : "",
					"inspeccion_cctv_num" => (isset($_POST["inspeccionCctvNum"])) ? $_POST["inspeccionCctvNum"] : "",
					"limpieza_tuberia" => (isset($_POST["limpiezaTuberia"])) ? $_POST["limpiezaTuberia"] : "",
					"limpieza_tuberia_num" => (isset($_POST["limpiezaTuberiaNum"])) ? $_POST["limpiezaTuberiaNum"] : "",
					"inpeccion_controles" => (isset($_POST["inpeccionControles"])) ? $_POST["inpeccionControles"] : "",
					"reparacion_controles" => (isset($_POST["reparacionControles"])) ? $_POST["reparacionControles"] : "",
					"limpieza_desagues" => (isset($_POST["limpiezaDesagues"])) ? $_POST["limpiezaDesagues"] : "",
					"limpieza_desagues_num" => (isset($_POST["limpiezaDesaguesNum"])) ? $_POST["limpiezaDesaguesNum"] : "",
					"limpieza_desagues_registro" => (isset($_POST["limpiezaDesaguesRegistro"])) ? $_POST["limpiezaDesaguesRegistro"] : "",
					"limpieza_derrame" => (isset($_POST["limpiezaDerrame"])) ? $_POST["limpiezaDerrame"] : "",
					"detalle_servicios_especiales" => (isset($_POST["detalleServiciosEspeciales"])) ? $_POST["detalleServiciosEspeciales"] : "",
					"k1" => (isset($_POST["k1"])) ? $_POST["k1"] : "",
					"k2" => (isset($_POST["k2"])) ? $_POST["k2"] : "",
					"water" => (isset($_POST["water"])) ? $_POST["water"] : "",
					"soplete" => (isset($_POST["soplete"])) ? $_POST["soplete"] : "",
					"fuete" => (isset($_POST["fuete"])) ? $_POST["fuete"] : "",
					"otros2" => (isset($_POST["otros2"])) ? $_POST["otros2"] : "",
					"equipo_seguridad" => (isset($_POST["equipoSeguridad"])) ? $_POST["equipoSeguridad"] : "",
					"cover" => (isset($_POST["cover"])) ? $_POST["cover"] : "",
					"guantes" => (isset($_POST["guantes"])) ? $_POST["guantes"] : "",
					"botas" => (isset($_POST["botas"])) ? $_POST["botas"] : "",
					"capacete" => (isset($_POST["capacete"])) ? $_POST["capacete"] : "",
					"camara" => (isset($_POST["camara"])) ? $_POST["camara"] : "",
					"detalle_equipos_utilizados" => (isset($_POST["detalleEquiposUtilizados"])) ? $_POST["detalleEquiposUtilizados"] : "",
					"comentario" => (isset($_POST["comentario"])) ? $_POST["comentario"] : "",
					"tecnico_adicional" => (isset($_POST["tecnicoAdicional"])) ? json_encode($_POST["tecnicoAdicional"]) : "",
					"titulo" => (isset($_POST["titulo"])) ? $_POST["titulo"] : "",
					"nombre_letra_molde" => (isset($_POST["nombreLetraMolde"])) ? $_POST["nombreLetraMolde"] : "",
					"hora_entrada" =>$_POST["horaEntrada"],
					"hora_salida" =>$_POST["horaSalida"],
					"productos"=>(isset($_POST["listaProductos"])) ? $_POST["listaProductos"] : "",
				);


				if(isset($respuesta["id_incidencia"])){
					//ACTUALIZAMOS

					$respuesta2 = ModeloIncidencia::mdlActualizarServicioIncidenciaPlomeria("servicio_plomeria",$datos);

					//return $respuesta;

				}else{
					//INSERTAMOS

					$respuesta2 = ModeloIncidencia::mdlRegistrarServicioIncidenciaPlomeria("servicio_plomeria",$datos);

					//cambiamos el estatus de la incidencia
					//return $respuesta;

				}
				if($respuesta2 == "ok"){

					//ALMACENO LA FIRMA DIGITALIZADA
					$json  =  $_POST['output'];

					$img =  sigJsonToImage($json);

					$rutaImage = "vistas/img/firmas/".$id_incidencia.".png";

					imagepng($img, $rutaImage);

					echo '<script>
                        swal({
                          title: "¡Buen Trabajo!",
                          text: "Servicio se actualizo correctamente",
                          type: "success",
                          showCancelButton: false,
                          confirmButtonColor: "#3085d6",
                          cancelButtonColor: "#d33",
                          confirmButtonText: "Continuar"
                        }).then((result) => {
                          if (result.value) {

                            	window.location= rutaOcultaFrontend+"incidencias";
                          }
                        })

                    </script>';
				}

			}else{

				echo '<script>
                        swal({
                          title: "Error al cargar la firma digital",
                          text: "Valide que la firma este digitalizada",
                          type: "success",
                          showCancelButton: false,
                          confirmButtonColor: "#3085d6",
                          cancelButtonColor: "#d33",
                          confirmButtonText: "Continuar"
                        }).then((result) => {
                          if (result.value) {


                          }
                        })

                    </script>';

			}


        }

    }

	static public function ctrRegistroServicioGeneral(){

		if(isset($_POST["servicioGeneral"])){

			if(isset($_POST["output"])){

				//consulto si existe para pdoer actualizar o insertar
				$id_incidencia = $_POST["id_incidencia"];
				$respuesta = ModeloIncidencia::mdlConsultarServicioIncidencia("servicio_general",$id_incidencia);

				$datos =array(
					"id_incidencia" => $_POST["id_incidencia"],
					"vaciado" => (isset($_POST["vaciado"])) ? $_POST["vaciado"] : "",
					"vaciado_parcial" => (isset($_POST["vaciadoParcial"])) ? $_POST["vaciadoParcial"] : "",
					"otros" => (isset($_POST["otros"])) ? $_POST["otros"] : "",
					"limpeza_regular" => (isset($_POST["otros"])) ? $_POST["otros"] : "",
					"inspeccion" => (isset($_POST["inspeccion"])) ? $_POST["inspeccion"] : "",
					"interceptor_aceite" => (isset($_POST["interceptorAceite"])) ? $_POST["interceptorAceite"] : "",
					"tanque_almacenamiento" => (isset($_POST["tanqueAlmacenamiento"])) ? $_POST["tanqueAlmacenamiento"] : "",
					"pozo_septico" => (isset($_POST["pozoSeptico"])) ? $_POST["pozoSeptico"] : "",
					"estacion_bombas" => (isset($_POST["estacionBombas"])) ? $_POST["estacionBombas"] : "",
					"tanque_recibidor" => (isset($_POST["tanqueRecibidor"])) ? $_POST["tanqueRecibidor"] : "",
					"tanque_aceites" => (isset($_POST["tanqueAceites"])) ? $_POST["tanqueAceites"] : "",
					"otros1" => (isset($_POST["otros1"])) ? $_POST["otros1"] : "",
					"interior" => (isset($_POST["interior"])) ? $_POST["interior"] : "",
					"exterior" => (isset($_POST["exterior"])) ? $_POST["exterior"] : "",
					"interior_exterior" => (isset($_POST["interiorExterior"])) ? $_POST["interiorExterior"] : "",
					"limpieza_derrame_liquido" => (isset($_POST["limpiezaDerrameLiquido"])) ? $_POST["limpiezaDerrameLiquido"] : "",
					"limpieza_manhole" => (isset($_POST["limpiezaManhole"])) ? $_POST["limpiezaManhole"] : "",
					"limpieza_lift_station" => (isset($_POST["limpiezaLiftStation"])) ? $_POST["limpiezaLiftStation"] : "",
					"limpieza_tuberias" => (isset($_POST["limpiezaTuberias"])) ? $_POST["limpiezaTuberias"] : "",
					"limpieza_tuberias_num" => (isset($_POST["limpiezaTuberiasNum"])) ? $_POST["limpiezaTuberiasNum"] : "",
					"limpieza_registros_desagues" => (isset($_POST["limpiezaregistrosDesagues"])) ? $_POST["limpiezaregistrosDesagues"] : "",
					"limpieza_registros_num" => $_POST["limpiezaregistrosNum"],
					"limpieza_desagues_num" => $_POST["limpiezaDesaguesNum"],
					"remocion_acarreo" => (isset($_POST["remocionAcarreo"])) ? $_POST["remocionAcarreo"] : "",
					"remocion_grasas" => (isset($_POST["remocionGrasas"])) ? $_POST["remocionGrasas"] : "",
					"otros2" => (isset($_POST["otros2"])) ? $_POST["otros2"] : "",
					"vacuum" => (isset($_POST["vacuum"])) ? $_POST["vacuum"] : "",
					"vacuumNum" => $_POST["vacuumNum"],
					"vacuum_portable" => (isset($_POST["vacuumPortable"])) ? $_POST["vacuumPortable"] : "",
					"water_jetter" => (isset($_POST["waterJetter"])) ? $_POST["waterJetter"] : "",
					"tanktruck" => (isset($_POST["tankTruck"])) ? $_POST["tankTruck"] : "",
					"otros3" => (isset($_POST["otros3"])) ? $_POST["otros3"] : "",
					"coverAll" => (isset($_POST["coverAll"])) ? $_POST["coverAll"] : "",
					"guantes" => (isset($_POST["guantes"])) ? $_POST["guantes"] : "",
					"capacete" => (isset($_POST["capacete"])) ? $_POST["capacete"] : "",
					"equipo_espacio_confinado" => (isset($_POST["equipoEspacioConfinado"])) ? $_POST["equipoEspacioConfinado"] : "",
					"comentario" => $_POST["comentario"],
					"desechos_liquidos" => (isset($_POST["desechosLiquidos"])) ? $_POST["desechosLiquidos"] : "",
					"aguas_residuales" => (isset($_POST["aguasResiduales"])) ? $_POST["aguasResiduales"] : "",
					"aceites_vegetales" => (isset($_POST["aceitesVegetales"])) ? $_POST["aceitesVegetales"] : "",
					"otros4" => (isset($_POST["otros4"])) ? $_POST["otros4"] : "",
					"total_desperciado" => $_POST["totalDesperciado"],
					"tecnico_adicional" => json_encode($_POST["tecnicoAdicional"]),
					"hora_entrada" =>$_POST["horaEntrada"],
					"hora_salida" =>$_POST["horaSalida"],
					"planta_tratamiento"=>(isset($_POST["planta_tratamiento"])) ? $_POST["planta_tratamiento"] : "",
					"otra_facilidad" =>(isset($_POST["otra_facilidad"])) ? $_POST["otra_facilidad"] : "",
					"otros5" => (isset($_POST["otros5"])) ? $_POST["otros5"] : "",
                    "titulo" => (isset($_POST["titulo"])) ? $_POST["titulo"] : "",
                    "nombre_letra_molde" => (isset($_POST["nombreLetraMolde"])) ? $_POST["nombreLetraMolde"] : ""
				);

				if(isset($respuesta["id_incidencia"])){
					//ACTUALIZAMOS

					$respuesta2 = ModeloIncidencia::mdlActualizarServicioIncidencia("servicio_general",$datos);

					//return $respuesta;

				}else{
					//INSERTAMOS

					$respuesta2 = ModeloIncidencia::mdlRegistrarServicioIncidencia("servicio_general",$datos);

					//cambiamos el estatus de la incidencia
					//return $respuesta;

				}

				if($respuesta2 == "ok"){

					//ALMACENO LA FIRMA DIGITALIZADA
					$json  =  $_POST['output'];

					$img =  sigJsonToImage($json);

					$rutaImage = "vistas/img/firmas/".$id_incidencia.".png";

					imagepng($img, $rutaImage);


					echo '<script>
                        swal({
                          title: "¡Buen Trabajo!",
                          text: "Servicio se actualizó correctamente",
                          type: "success",
                          showCancelButton: false,
                          confirmButtonColor: "#3085d6",
                          cancelButtonColor: "#d33",
                          confirmButtonText: "Continuar"
                        }).then((result) => {
                          if (result.value) {

                            	window.location= rutaOcultaFrontend+"incidencias";
                          }
                        })

                    </script>';


				}

			}else{

				echo '<script>
                        swal({
                          title: "Error al cargar la firma digital",
                          text: "Valide que la firma este digitalizada",
                          type: "success",
                          showCancelButton: false,
                          confirmButtonColor: "#3085d6",
                          cancelButtonColor: "#d33",
                          confirmButtonText: "Continuar"
                        }).then((result) => {
                          if (result.value) {


                          }
                        })

                    </script>';

			}

		}

	}

    static public function ctrRegistroServicioGeneralAPI($datos){

        //consulto si existe para pdoer actualizar o insertar
        $id_incidencia = $datos["id_incidencia"];
        $respuesta = ModeloIncidencia::mdlConsultarServicioIncidencia("servicio_general",$id_incidencia);

        $datos =array(
            "id_incidencia" => $datos["id_incidencia"],
            "vaciado" => (isset($datos["vaciado"])) ? $datos["vaciado"] : "",
            "vaciado_parcial" => (isset($datos["vaciadoParcial"])) ? $datos["vaciadoParcial"] : "",
            "otros" => (isset($datos["otros"])) ? $datos["otros"] : "",
            "limpeza_regular" => (isset($datos["otros"])) ? $datos["otros"] : "",
            "inspeccion" => (isset($datos["inspeccion"])) ? $datos["inspeccion"] : "",
            "interceptor_aceite" => (isset($datos["interceptorAceite"])) ? $datos["interceptorAceite"] : "",
            "tanque_almacenamiento" => (isset($datos["tanqueAlmacenamiento"])) ? $datos["tanqueAlmacenamiento"] : "",
            "pozo_septico" => (isset($datos["pozoSeptico"])) ? $datos["pozoSeptico"] : "",
            "estacion_bombas" => (isset($datos["estacionBombas"])) ? $datos["estacionBombas"] : "",
            "tanque_recibidor" => (isset($datos["tanqueRecibidor"])) ? $datos["tanqueRecibidor"] : "",
            "tanque_aceites" => (isset($datos["tanqueAceites"])) ? $datos["tanqueAceites"] : "",
            "otros1" => (isset($datos["otros1"])) ? $datos["otros1"] : "",
            "interior" => (isset($datos["interior"])) ? $datos["interior"] : "",
            "exterior" => (isset($datos["exterior"])) ? $datos["exterior"] : "",
            "interior_exterior" => (isset($datos["interiorExterior"])) ? $datos["interiorExterior"] : "",
            "limpieza_derrame_liquido" => (isset($datos["limpiezaDerrameLiquido"])) ? $datos["limpiezaDerrameLiquido"] : "",
            "limpieza_manhole" => (isset($datos["limpiezaManhole"])) ? $datos["limpiezaManhole"] : "",
            "limpieza_lift_station" => (isset($datos["limpiezaLiftStation"])) ? $datos["limpiezaLiftStation"] : "",
            "limpieza_tuberias" => (isset($datos["limpiezaTuberias"])) ? $datos["limpiezaTuberias"] : "",
            "limpieza_tuberias_num" => (isset($datos["limpiezaTuberiasNum"])) ? $datos["limpiezaTuberiasNum"] : "",
            "limpieza_registros_desagues" => (isset($datos["limpiezaregistrosDesagues"])) ? $datos["limpiezaregistrosDesagues"] : "",
            "limpieza_registros_num" => $datos["limpiezaregistrosNum"],
            "limpieza_desagues_num" => $datos["limpiezaDesaguesNum"],
            "remocion_acarreo" => (isset($datos["remocionAcarreo"])) ? $datos["remocionAcarreo"] : "",
            "remocion_grasas" => (isset($datos["remocionGrasas"])) ? $datos["remocionGrasas"] : "",
            "otros2" => (isset($datos["otros2"])) ? $datos["otros2"] : "",
            "vacuum" => (isset($datos["vacuum"])) ? $datos["vacuum"] : "",
            "vacuumNum" => $datos["vacuumNum"],
            "vacuum_portable" => (isset($datos["vacuumPortable"])) ? $datos["vacuumPortable"] : "",
            "water_jetter" => (isset($datos["waterJetter"])) ? $datos["waterJetter"] : "",
            "tanktruck" => (isset($datos["tankTruck"])) ? $datos["tankTruck"] : "",
            "otros3" => (isset($datos["otros3"])) ? $datos["otros3"] : "",
            "coverAll" => (isset($datos["coverAll"])) ? $datos["coverAll"] : "",
            "guantes" => (isset($datos["guantes"])) ? $datos["guantes"] : "",
            "capacete" => (isset($datos["capacete"])) ? $datos["capacete"] : "",
            "equipo_espacio_confinado" => (isset($datos["equipoEspacioConfinado"])) ? $datos["equipoEspacioConfinado"] : "",
            "comentario" => $datos["comentario"],
            "desechos_liquidos" => (isset($datos["desechosLiquidos"])) ? $datos["desechosLiquidos"] : "",
            "aguas_residuales" => (isset($datos["aguasResiduales"])) ? $datos["aguasResiduales"] : "",
            "aceites_vegetales" => (isset($datos["aceitesVegetales"])) ? $datos["aceitesVegetales"] : "",
            "otros4" => (isset($datos["otros4"])) ? $datos["otros4"] : "",
            "total_desperciado" => $datos["totalDesperciado"],
            "tecnico_adicional" => $datos["tecnicoAdicional"],
            "hora_entrada" =>$datos["horaEntrada"],
            "hora_salida" =>$datos["horaSalida"],
            "planta_tratamiento"=>(isset($datos["planta_tratamiento"])) ? $datos["planta_tratamiento"] : "",
            "otra_facilidad" =>(isset($datos["otra_facilidad"])) ? $datos["otra_facilidad"] : "",
            "otros5" => (isset($datos["otros5"])) ? $datos["otros5"] : ""
        );
        if(isset($respuesta["id_incidencia"])){
            //ACTUALIZAMOS

            $respuesta2 = ModeloIncidencia::mdlActualizarServicioIncidencia("servicio_general",$datos);

            //return $respuesta;

        }else{
            //INSERTAMOS

            $respuesta2 = ModeloIncidencia::mdlRegistrarServicioIncidencia("servicio_general",$datos);

            //cambiamos el estatus de la incidencia
            //return $respuesta;

        }

        if($respuesta2 == "ok"){
            $datos2= array(
                "id_incidencia" =>$id_incidencia,
                "estado"=>2
            );
            ControladorIncidencia::ctrCambiarEstadoIncidencia($datos2);
        }

        return $respuesta2;

    }

	static public function ctrMostrarServicio($tabla,$item,$valor){

		$respuesta = ModeloIncidencia::mdlMostrarServicio($tabla,$item,$valor);

		return $respuesta;
	}

	static public function ctrBuscarArchivosDuplicados($tabla,$datos){

		$respuesta = ModeloIncidencia::mdlBuscarArchivosDuplicados($tabla,$datos);

		return $respuesta;
	}

	/*=============================================
	IMPRIMIR REPORTE EXCEL
	=============================================*/
	static public function ctrImprimirReporte(){

		if(isset($_GET["reporte"])){

			if(isset($_GET["fechaInicial"]) && isset($_GET["fechaFinal"])){

				$tabla = "incidencias";
				$categorias = ModeloIncidencia::mdlRangoFechasIncidenciaDetalle($tabla, $_GET["fechaInicial"], $_GET["fechaFinal"]);

				$Name = $_GET["reporte"].'.xls';

				header('Expires: 0');
				header('Cache-control: private');
				header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
				header("Cache-Control: cache, must-revalidate");
				header('Content-Description: File Transfer');
				header('Last-Modified: '.date('D, d M Y H:i:s'));
				header("Pragma: public");
				header('Content-Disposition:; filename="'.$Name.'"');
				header("Content-Transfer-Encoding: binary");

				echo utf8_decode("<table border='0'>

					<tr>
					<td style='font-weight:bold; border:1px solid #eee;'>CÓDIGO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>CLIENTE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>TECNICO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>ASUNTO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>PRIORIDAD</td>
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA VISITA</td>
					<td style='font-weight:bold; border:1px solid #eee;'>ESTATUS</td>
					<td style='font-weight:bold; border:1px solid #eee;'>ESTADO</td>

					</tr>");

				foreach ($categorias as $key => $value) {

					//BUSCO EL USUARIO QUIEN CREO LA INCIDENCIA
					$nombreUsuario = ControladorUsuarios::ctrMostrarUsuarios("id",$value["id_usuario"]);
					//BUSCO EL CLIENTE
					$nombreCliente = ControladorClientes::ctrMostrarClientes("id",$value["id_cliente"]);
					//BUSCO EL TENICO
					$nombreTecnico= ControladorUsuarios::ctrMostrarUsuarios("id",$value["id_tecnico"]);

					switch ($value["estatus"]) {
						case "pendiente":
							$texto = "Pendiente";
							break;
						case "asignado":
							$texto = "Asignado";
							break;
						case "cerrado":
							$texto = "Cerrado";
							break;
					}

					/*BOTON DE TEMPORIZADOR O ESTATUS DE LA INCIDENCIA SI ESTA EN PROCESO */

					switch ($value["estatus_incidencia"]){
						case "0":
							$textoEstado = "Por iniciar";
							break;
						case "1":
							$textoEstado = "En Proceso";
							break;
						case "2":
							$textoEstado = "Terminado";
							break;
					}

					$estatus_incidencia =$textoEstado;

					echo utf8_decode("<tr>
						<td style='border:1px solid #eee;'>".$value["id"]."</td>
						<td style='border:1px solid #eee;'>".$nombreCliente["nombre"]."</td>
						<td style='border:1px solid #eee;'>".$nombreTecnico["nombre"]."</td>");

					echo utf8_decode("</td>
						<td style='border:1px solid #eee;'> ".$value["asunto"]."</td>
						<td style='border:1px solid #eee;'> ".$value["prioridad"]."</td>
						<td style='border:1px solid #eee;'>".substr($value["fecha_visita"],0,10)."</td>
						<td style='border:1px solid #eee;'> ".$texto."</td>
						<td style='border:1px solid #eee;'> ".$estatus_incidencia."</td>
					 </tr>");

				}


				echo "</table>";

			}


		}

	}
}