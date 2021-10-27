<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../modelos/ruta.php";

class TablaProductos{

  /*=============================================
  MOSTRAR LA TABLA DE PRODUCTO
  =============================================*/ 

  public function mostrarTabla(){

  	$item = null;
    $valor = null;
    $orden = "id";

    $url = Ruta::ctrRuta();

    $productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

      $datosJson = '{

			"data": [';

      for($i = 0; $i < count($productos); $i++){

          if($productos[$i]['tipo'] == "venta"){

              if($productos[$i]['stock'] <= 10) {

                  $stock = "<div class='btn-group'><button class='btn btn-danger limiteStock'>".$productos[$i]['stock']."</button></div>";

              }elseif($productos[$i]['stock'] >11 && $productos[$i]['stock'] <= 15){

                  $stock = "<div class='btn-group'><button class='btn btn-warning limiteStock'>".$productos[$i]['stock']."</button></div>";

              }else{

                  $stock = "<div class='btn-group'><button class='btn btn-success limiteStock'>".$productos[$i]['stock']."</button></div>";
              }

          }else{

              $stock = "<div class='btn-group'><button class='btn btn-secondary '>".$productos[$i]['stock']."</button></div>";
          }

          $imagen = "<img src=".$productos[$i]['imagen']." class='img-thumbnail imgTabla' width='60px'>";

          $acciones = "<div class='btn-group'><button class='btn btn-primary agregarProductoOrden recuperarBoton' idProducto='".$productos[$i]['id']."'>Agregar</button></div>";


          $datosJson .= '[
			      "'.($i+1).'",
			      "'.$imagen.'",
			      "'.$productos[$i]["codigo"].'",
			      "'.$productos[$i]["descripcion"].'",
			      "'.$stock.'",
			      "'.$acciones.'"
			    ],';

      }
      $datosJson = substr($datosJson, 0, -1);

      $datosJson.=  ']

		}';

      echo $datosJson;

//    echo '{
//			"data": [';
//
//			for($i = 0; $i < count($productos)-1; $i++){
//
//                $imagen = "<img src=".$url.$productos[$i]['imagen']." class='img-thumbnail imgTabla' width='60px'>";
//
//				 echo '[
//			      "'.($i+1).'",
//			      "'.$imagen.'",
//			      "'.$productos[$i]["codigo"].'",
//			      "'.$productos[$i]["descripcion"].'",
//			      "'.$productos[$i]["stock"].'",
//			      "'.$productos[$i]["id"].'"
//			    ],';
//
//			}
//
//		   echo'[
//			      "'.count($productos).'",
//			      "'.$productos[count($productos)-1]["imagen"].'",
//			      "'.$productos[count($productos)-1]["codigo"].'",
//			      "'.$productos[count($productos)-1]["descripcion"].'",
//			      "'.$productos[count($productos)-1]["stock"].'",
//			      "'.$productos[count($productos)-1]["id"].'"
//			    ]
//			]
//		}';

  }

}

/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/ 

$activar = new TablaProductos();
$activar -> mostrarTabla();