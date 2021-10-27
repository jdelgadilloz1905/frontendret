<?php
/**
 * Created by PhpStorm.
 * User: jorge delgadillo
 * Date: 13/06/2019
 * Time: 22:48
 */

class ControladorOrdenes{


    static public function ctrCrearOrden(){

        /*=============================================
        ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCIR EL
        STOCK Y AUMENTAR LAS VENTAS DE LOS PRODUCTOS
        =============================================*/
        if(isset($_POST["crearOrdenCompra"])){


            if(isset($_POST["listaProductos"])){

                $datos = array(
                    "id_supervisor" => $_POST["ingId"],
                    "id_proveedor" => $_POST["ingProveedorInc"],
                    "productos" => $_POST["listaProductos"],
                    "descripcion" => $_POST["ingDescripcion"]
                );

                $respuesta = ModeloOrdenes::mdlCrearOrden("compras",$datos);

                if(isset($respuesta["id"])){


                    //ALMACENO LOS PRODUCTOS

                    $listaProductos = json_decode($_POST["listaProductos"], true);

                    $totalProductosComprados = array();

                    foreach ($listaProductos as $key => $value) {

                        array_push($totalProductosComprados, $value["cantidad"]);

                        $tablaProductos = "productos";

                        $item = "id";
                        $valor = $value["id"];
                        $orden = null;

                        $traerProducto = ModeloProductos::mdlMostrarProductos($tablaProductos, $item, $valor, $orden);

                        //INCREMENTO EL STOCK DE ENTRADA
                        $item1b = "stock";
                        $valor1b = $value["cantidad"];

                        $nuevoStock = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1b, $valor1b, $valor);

                        //GENERO EL MOVIMIENTO DE ENTRADA DEL PRODUCTO
                        $datos2 = array(
                            "id_compra" => $respuesta["id"],
                            "id_producto" => $value["id"],
                            "tipo" =>"entrada",
                            "cantidad"=>$value["cantidad"],
                            "id_almacen" => "ppal"

                        );
                        $movimiento = ModeloProductos::mdlRegistrarMovimiento("movimiento_inventario",$datos2);

                        if($movimiento == "ok"){

                            echo '<script>
                                swal({
                                  title: "¡Buen Trabajo!",
                                  text: "Orden creada con exito",
                                  type: "success",
                                  showCancelButton: false,
                                  confirmButtonColor: "#3085d6",
                                  cancelButtonColor: "#d33",
                                  confirmButtonText: "Continuar"
                                }).then((result) => {
                                  if (result.value) {

                                        window.location= rutaOcultaFrontend+"ordenes";
                                  }
                                })

                            </script>';
                        }

                    }
                }


            }else{

                echo '<script>
                        swal({
                          title: "Error",
                          text: "Debe ingresar los renglones del pedido",
                          type: "error",
                          showCancelButton: false,
                          confirmButtonColor: "#3085d6",
                          cancelButtonColor: "#d33",
                          confirmButtonText: "Cerrar"
                        }).then((result) => {
                          if (result.value) {

                            	window.location= rutaOcultaFrontend+"crear-orden";
                          }
                        })

                    </script>';
            }


        }
    }

    static public function ctrMostrarOrdenes($item,$valor){

        $tabla = "compras";

        $respuesta = ModeloOrdenes::mdlMostrarOrdenes($tabla,$item,$valor);

        return $respuesta;

    }
}