<?php

class ControladorGrupo{

	/*=============================================
	CREAR Grupo CLIENTE 
	=============================================*/

	static public function ctrCrearGrupoCliente(){

		if(isset($_POST["nuevoGrupo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoGrupo"])){

				$tabla = "grupo_cliente";

				$datos = array(
				    "nombreGrupo" =>$_POST["nuevoGrupo"],
                    "nombreAlias" =>$_POST["nuevoAlias"]
                 );

				$respuesta = ModeloGrupo::mdlIngresarNuevoGrupo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El grupo de cliente ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "grupo-cliente";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El grupo de cliente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "grupo-cliente";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR GRUPOS DE CLIENTES
	=============================================*/

	static public function ctrMostrarGrupoCliente($item, $valor,$item2, $valor2){

		$tabla = "grupo_cliente";

		$respuesta = ModeloGrupo::mdlMostrarGrupoCliente($tabla, $item, $valor,$item2, $valor2);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR GRUPO DE CLIENTE
	=============================================*/

	static public function ctrEditarGrupoCliente(){

		if(isset($_POST["editarGrupoCliente"])){

//			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ.,_/- ]+$/', $_POST["editarGrupoCliente"])){

				$tabla = "grupo_cliente";

				$datos = array("nombre"=>$_POST["editarGrupoCliente"],
							   "id"=>$_POST["idGrupoCliente"],
                               "alias"=>$_POST["editarAlias"]
                );

				$respuesta = ModeloGrupo::mdlEditarGrupoCliente($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El grupo de cliente ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "grupo-cliente";

									}
								})

					</script>';

				}


//			}else{
//
//				echo'<script>
//
//					swal({
//						  type: "error",
//						  title: "¡El grupo no puede ir vacío o llevar caracteres especiales!",
//						  showConfirmButton: true,
//						  confirmButtonText: "Cerrar",
//						  closeOnConfirm: false
//						  }).then((result) => {
//							if (result.value) {
//
//							window.location = "grupo-cliente";
//
//							}
//						})
//
//			  	</script>';
//
//			}

		}

	}

	/*=============================================
	BORRAR GRUPO DE CLIENTE
	=============================================*/

	static public function ctrBorrarGrupoCliente(){

		if(isset($_GET["idGrupoCliente"])){

			//SE CONSULTA SI NO ESTA ASOCIADO EL GRUPO A LOS CLIENTE
			
			$resultado = ModeloClientes::mdlMostrarClientes("cliente","id_grupo",$_GET["idGrupoCliente"]);
			
			if(isset($resultado["id"]) && !empty($resultado["id"])){

				echo'<script>

					swal({
						  type: "error",
						  title: "No puede eliminar un grupo que se encuentra asociado a un cliente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "grupo-cliente";

									}
								})

					</script>';
			}else{

				$tabla ="grupo_cliente";
				$datos = $_GET["idGrupoCliente"];

				$respuesta = ModeloGrupo::mdlBorrarGrupoCLiente($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El grupo ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "grupo-cliente";

									}
								})

					</script>';
				}
			}
			
		}
		
	}

}
