<?php


require_once "../controladores/ruta.controlador.php";
require_once "../modelos/ruta.modelo.php";
require_once "../modelos/incidencia.modelo.php";

class TablaRutas{

  /*=============================================
  MOSTRAR LA TABLA DE PRODUCTO
  =============================================*/
  public $idRuta;

  public function mostrarTablaRuta(){


      $item = null;
      $valor = null;

      $idRuta = $this->idRuta;

      $detalleRuta = ModeloRuta::mdlMostrarDetalleRuta("detalle_ruta","id_ruta",$idRuta);

      if($detalleRuta){
          $detalle = json_decode($detalleRuta[0]["detalle"],true);

          //consultar si ya tiene una visita la tienda
          $tabla = "incidencias";


          $datosJson = '{

        "data": [';

          for($i = 0; $i < count($detalle); $i++){

              $resultado = ModeloIncidencia::mdlBuscarServicioAnterior($tabla,$detalle[$i]['idCliente'],$detalleRuta[0]["tipo_servicio"]);

                if(isset($resultado["cant"]) && $resultado["cant"] !=0){

                    $cantServicio = "<div style='text-align: center; color: #c0050d;'><label>" .$resultado["cant"]."</label></div>";
                }else{

                    $cantServicio="<div style='text-align: center;'><label>0</label></div>";
                }


              $selector = "<button type='button' idRuta = '".$detalle[$i]['idCliente']."' class='btn btn-success btn-sm marcarDetalle' data-toggle='button' aria-pressed='false' style='height: 26px !important;'><i class='ti-check text' aria-hidden='true'></i><span class='text'></span><i class='ti-check text-active' aria-hidden='true'></i><span class='text-active'></span></button>";

              $datosJson .= '[
              "'.$selector.'",
              "'.$detalle[$i]["alias"].'",
              "'.$detalle[$i]["localizador"].'",
              "'.$detalle[$i]["documento"].'",
              "'.$detalle[$i]["direccion"].'",
              "'.$cantServicio.'"
            ],';

          }
          $datosJson = substr($datosJson, 0, -1);

          $datosJson.=  ']

    }';

          echo $datosJson;

      }else{

          echo "error";
      }





  }

    public function mostrarTablaRutaEdit(){


        $item = null;
        $valor = null;

        $idRuta = $this->idRuta;

        $detalleRuta = ModeloRuta::mdlMostrarDetalleRuta("detalle_ruta","id_ruta",$idRuta);

        if($detalleRuta){
            $detalle = json_decode($detalleRuta[0]["detalle"],true);

            if(!empty($detalle)){

                //consultar si ya tiene una visita la tienda
                $tabla = "incidencias";


                $datosJson = '{

            "data": [';

                for($i = 0; $i < count($detalle); $i++){

                    $resultado = ModeloIncidencia::mdlBuscarServicioAnterior($tabla,$detalle[$i]['idCliente'],$detalleRuta[0]["tipo_servicio"]);

                    if(isset($resultado["cant"]) && $resultado["cant"] !=0){

                        $cantServicio = "<div style='text-align: center; color: #c0050d;'><label>" .$resultado["cant"]."</label></div>";
                    }else{

                        $cantServicio="<div style='text-align: center;'><label>0</label></div>";
                    }


                    $selector = "<button type='button' idRuta = '".$detalle[$i]['idCliente']."' class='btn btn-success btn-sm eliminarTienda nuevaDescripcionTienda' alias='".$detalle[$i]['alias']."' grupo='".$detalle[$i]['grupo']."' localizador='".$detalle[$i]['localizador']."' documento='".$detalle[$i]['documento']."' idDetalle='".$idRuta."' data-toggle='button' aria-pressed='false' style='height: 26px !important;'><i class='fa fa-trash ' aria-hidden='true'></i><span class='text-active' ></span></button>";


                    $datosJson .= '[
                  "'.$selector.'",
                  "'.$detalle[$i]["alias"].'",
                  "'.$detalle[$i]["localizador"].'",
                  "'.$detalle[$i]["documento"].'",
                  "'.$detalle[$i]["direccion"].'",
                  "'.$cantServicio.'"
                ],';

                }
                $datosJson = substr($datosJson, 0, -1);

                $datosJson.=  ']
    
            }';

                echo $datosJson;


            }else{
                echo "";
            }

        }else{

            echo "";
        }





    }

}

/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/ 
if(isset($_POST["idRuta"])){

    $mostrar = new TablaRutas();
    $mostrar -> idRuta = $_POST["idRuta"];
    $mostrar -> mostrarTablaRuta();

}


/*=============================================
EDITAR DETALLE DE TIENDAS
=============================================*/
if(isset($_POST["idRutaEdit"])){

    $mostrar = new TablaRutas();
    $mostrar -> idRuta = $_POST["idRutaEdit"];
    $mostrar -> mostrarTablaRutaEdit();

}
