<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class TablaProductos{

  /*=============================================
  MOSTRAR LA TABLA DE PRODUCTO
  =============================================*/ 

  public function mostrarTabla(){

  	$item = null;
    $valor = null;
    $orden = "id";

  	$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

	  $datosJson = '{

			"data": [';

			for($i = 0; $i < count($productos)-1; $i++){

				$item = "id";
    			$valor = $productos[$i]["id_categoria"];

				$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

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

				$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$productos[$i]['id']."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fas fa-pencil-alt'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto='".$productos[$i]['id']."' codigo='".$productos[$i]['codigo']."' imagen='".$productos[$i]['imagen']."'><i class='fa fa-times'></i></button></div>";


				$datosJson .= '[
			      "'.($i+1).'",
			      "'.$imagen.'",
			      "'.$productos[$i]["codigo"].'",
			      "'.$productos[$i]["descripcion"].'",
			      "'.$categorias["categoria"].'",
			      "'.$stock.'",
			      "'.$productos[$i]["tipo"].'",
			      "'.$productos[$i]["fecha"].'",
			      "'.$acciones.'"
			    ],';

			}
	  $datosJson = substr($datosJson, 0, -1);

	  $datosJson.=  ']

		}';

	  echo $datosJson;





  }


}

/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/ 
$activar = new TablaProductos();
$activar -> mostrarTabla();





