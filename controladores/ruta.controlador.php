<?php

class ControladorRuta{

    /*=============================================
    CREAR RUTA
    =============================================*/

    static public function ctrCrearRuta(){

        if(isset($_POST["nuevaRuta"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaRuta"])){

                $tabla = "rutas";

                $datos = $_POST["nuevaRuta"];

                $respuesta = ModeloRuta::mdlIngresarNuevaRuta($tabla, $datos);

                if($respuesta == "ok"){

                    echo'<script>

					        window.location = "crear-ruta";

					</script>';

                }


            }else{

                echo'<script>

					swal({
						  type: "error",
						  title: "¡El campo nombre no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "crear-ruta";

							}
						})

			  	</script>';

            }

        }

    }

    /*=============================================
    MOSTRAR RUTAS
    =============================================*/

    static public function ctrMostrarRutas($item, $valor,$item2, $valor2){

        $tabla = "rutas";

        $respuesta = ModeloRuta::mdlMostrarRutas($tabla, $item, $valor,$item2, $valor2);

        return $respuesta;

    }

    /*=============================================
    MOSTRAR RUTAS SIN DETALLE
    =============================================*/

    static public function ctrMostrarRutasSinDetalle(){

        $respuesta = ModeloRuta::mdlMostrarRutasSinDetalle();

        return $respuesta;

    }

    /*=============================================
    BORRAR RUTAS
    =============================================*/

    static public function ctrBorrarRuta(){

        if(isset($_GET["idRuta"])){

            $tabla ="rutas";
            $datos = $_GET["idRuta"];

            //encabezado
            $respuesta = ModeloRuta::mdlBorrarRuta($tabla, $datos);

            //detalle
            ModeloRuta::mdlBorrarDetalleRuta("detalle_ruta",$datos);

            if($respuesta == "ok"){

                echo'<script>

                swal({
                      type: "success",
                      title: "La ruta ha sido borrado correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false
                      }).then((result) => {
                                if (result.value) {

                                    window.location = "rutas";

                                }
                            })

                </script>';
            }

        }

    }

    /*=============================================
        CREAR DETALLE DE LAS RUTAS
    =============================================*/
    static public function ctrCrearRutaDetalle(){

        if(isset($_POST["crearRuta"])){


            if(isset($_POST["listaClientes"]) && !empty($_POST["listaClientes"])){

                $datos = array(
                    "id_ruta"       => $_POST["ingRuta"],
                    "tipo_servicio" => $_POST["ingTipoServicio"],
                    "detalle"       => $_POST["listaClientes"],
                    "comentario"    => $_POST["ingDescripcion"],
                    "id_tecnico"    => $_POST["ingTecnico"]
                );
                $respuesta = ModeloRuta::mdlCrearRutadetalle("detalle_ruta",$datos);

                if($respuesta == "ok"){

                    echo '<script>
                                swal({
                                  title: "¡Buen Trabajo!",
                                  text: "Ruta creada con exito",
                                  type: "success",
                                  showCancelButton: false,
                                  confirmButtonColor: "#3085d6",
                                  cancelButtonColor: "#d33",
                                  confirmButtonText: "Continuar"
                                }).then((result) => {
                                  if (result.value) {

                                        window.location= rutaOcultaFrontend+"rutas";
                                  }
                                })

                            </script>';
                }
            }else{

                echo '<script>
                        swal({
                          title: "Error",
                          text: "Debe ingresar las tiendas",
                          type: "error",
                          showCancelButton: false,
                          confirmButtonColor: "#3085d6",
                          cancelButtonColor: "#d33",
                          confirmButtonText: "Cerrar"
                        }).then((result) => {
                          if (result.value) {

                            	window.location= rutaOcultaFrontend+"crear-ruta";
                          }
                        })

                    </script>';
            }


        }
    }

    /*=============================================
        MOSTRAR DETALLE DE LA RUTA
    =============================================*/

    static public function ctrMostrarDetalleRuta($item,$valor){

        $tabla = "detalle_ruta";

        $respuesta = ModeloRuta::mdlMostrarDetalleRuta($tabla,$item,$valor);

        return $respuesta;
    }

    /*=============================================
    ASIGNAR Y CREAR SERVICIOS AL TECNICO DESDE RUTA
    ===============================================*/

    static public function ctrAsignarRuta(){

        if(isset($_POST["asignarRutaTecnico"])){

            if(!empty($_POST["listaTienda"])){

                //convierto la lista en un array para comenzar a crear los servicios

                $id_clientes = explode(",",$_POST["listaTienda"]);

                for($i = 0; $i < count($id_clientes); ++$i ){

                    $datosCliente = ModeloClientes::mdlMostrarClientes("clientes","id",$id_clientes[$i]);

                    $ultimoId = ModeloOrdenes::mdlMostrarUltimoId("incidencias");

                    $ultimoCorrelativo = isset($ultimoId["id"]) ? $ultimoId["id"] : 0;

                    $ultimoCorrelativo++;

                    $estatus = ($_POST["ingTecnico"]>0 ? "asignado" : "pendiente");

                    $cadena = str_replace("-", "/", $_POST["ingFechaVisita"]);
                    $dateVisita = new DateTime($cadena);
                    $fechaVisita = date_format($dateVisita, 'Y-m-d'); // 2011-07-01 00:00:00


                    $datos = array(
                        "ingId" =>$_POST["ingId"],
                        "ingclienteInc" =>$id_clientes[$i],
                        "ingDireccion" =>$datosCliente["direccion"],
                        "ingFechaVisita" =>$fechaVisita,
                        "ingAsunto" =>$datosCliente["alias"]."-".$datosCliente["documento"]."-".settype($ultimoCorrelativo,'string'),
                        "ingTecnico" =>$_POST["ingTecnico"],
                        "ingPrioridad" =>$_POST["ingPrioridad"],
                        "ingDescripcion" =>$_POST["ingDescripcion"],
                        "ingEstatus" =>$estatus,
                        "tipo_servicio" =>$_POST["ingTipoServicio"],
                        "id_grupo"=>$datosCliente["id_grupo"],
                        "id_ruta"=>$_POST["ingRuta"]

                    );


                    $tabla = "incidencias";

                    ModeloIncidencia::mdlCrearIncidencia($tabla,$datos);
                }

                echo'<script>

                localStorage.removeItem("localMarcaDetalle");

                swal({
					  type: "success",
					  title: "Buen trabajo",
					  text: "La ruta ha sido asignada exitosamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then((result) => {
                    if (result.value) {

                        window.location = "asignar-ruta";

                    }
                })

				</script>';
            }
        }
    }


    /*===============================================
                        EDITAR RUTA
    =================================================*/

    static public function ctrEditarRuta(){

        if(isset($_POST["editarRutaEncabezado"])){

            if(!empty($_POST["editRuta"])){

                $datos = array(
                    "id_ruta"       => $_POST["editRuta"],
                    "id_tecnico"    => $_POST["editTecnico"],
                    "tipo_servicio" => $_POST["editTipoServicio"],
                    "comentario"    => $_POST["editDescripcion"]

                );

                $respuesta = ModeloRuta::mdlEditarRutaDetalle("detalle_ruta",$datos);

                if($respuesta == "ok"){

                    echo '<script>
                                swal({
                                  title: "¡Buen Trabajo!",
                                  text: "Ruta actualizada con exito",
                                  type: "success",
                                  showCancelButton: false,
                                  confirmButtonColor: "#3085d6",
                                  cancelButtonColor: "#d33",
                                  confirmButtonText: "Continuar"
                                }).then((result) => {
                                  if (result.value) {

                                        window.location= rutaOcultaFrontend+"editar-ruta";
                                  }
                                })

                            </script>';
                }else{
                    echo '<script>

                                console.log("error actualizando la ruta ")
                          </script>';
                }


            }else{
                echo '<script>
                        swal({
                          title: "Error",
                          text: "Debe seleccionar una ruta",
                          type: "error",
                          showCancelButton: false,
                          confirmButtonColor: "#3085d6",
                          cancelButtonColor: "#d33",
                          confirmButtonText: "Cerrar"
                        }).then((result) => {
                          if (result.value) {

                            	
                          }
                        })

                    </script>';
            }
        }

    }

    /*=======================================
    ACTUALIZAR LA RUTA DEL ENCABEZADO
    =========================================*/
    static public function ctrEditarRutaEncabezado(){



        if(isset($_POST["rutaEncabezado"])){

            if(!empty($_POST["editarRutaNombre"])){

                $datos = array(
                    "id"    => $_POST["idRuta"],
                    "nombre"=> $_POST["editarRutaNombre"]
                );

                $respuesta = ModeloRuta::mdlEditarRuta("rutas",$datos);

                if($respuesta == "ok"){

                    echo '<script>
                                swal({
                                  title: "¡Buen Trabajo!",
                                  text: "Ruta actualizada con exito",
                                  type: "success",
                                  showCancelButton: false,
                                  confirmButtonColor: "#3085d6",
                                  cancelButtonColor: "#d33",
                                  confirmButtonText: "Continuar"
                                }).then((result) => {
                                  if (result.value) {

                                        window.location= rutaOcultaFrontend+"rutas";
                                  }
                                })

                            </script>';
                }else{
                    echo '<script>

                                console.log("error actualizando la ruta ")
                          </script>';
                }


            }else{
                echo '<script>
                        swal({
                          title: "Error",
                          text: "Debe ingresar la descripción de la ruta",
                          type: "error",
                          showCancelButton: false,
                          confirmButtonColor: "#3085d6",
                          cancelButtonColor: "#d33",
                          confirmButtonText: "Cerrar"
                        }).then((result) => {
                          if (result.value) {

                            	
                          }
                        })

                    </script>';
            }
        }
    }
}
