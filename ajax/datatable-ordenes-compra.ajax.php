<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/ordenes.controlador.php";
require_once "../modelos/ordenes.modelo.php";

require_once "../controladores/proveedores.controlador.php";
require_once "../modelos/proveedores.modelo.php";

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

require_once "../modelos/ruta.php";

class TablaCompras{

  /*=============================================
  MOSTRAR LA TABLA DE PRODUCTO
  =============================================*/ 

  public function mostrarTabla(){

  	$item = null;
    $valor = null;

    $url = Ruta::ctrRuta();

    $ordenes = ControladorOrdenes::ctrMostrarOrdenes($item,$valor);


      $datosJson = '{

			"data": [';

      for($i = 0; $i < count($ordenes); $i++){


          $acciones = "<div class='btn-group'><button class='btn btn-primary btnVerItemOrden ' id_compra='".str_pad($ordenes[$i]['id'], 6, "0", STR_PAD_LEFT)."' idCompra='".$ordenes[$i]['id']."' data-toggle='modal' data-target='#modalVerArticulos'>Ver Articulos</button></div>";

          $datosProveedor = ControladorProveedores::ctrMostrarProveedor("id",$ordenes[$i]['id_proveedor']);

          $datosUsuario = ControladorUsuarios::ctrMostrarUsuarios("id",$ordenes[$i]['id_supervisor']);

          if($ordenes[$i]['estatus'] == 0){

              $estatus = "<div class='btn-group'><button class='btn btn-success'>Procesada</button></div>";


          }else{

              $estatus = "<div class='btn-group'><button class='btn btn-danger '>Anulada</button></div>";
          }



          $datosJson .= '[
			      "'.($i+1).'",
			      "'.str_pad($ordenes[$i]['id'], 6, "0", STR_PAD_LEFT).'",
			      "'.$datosProveedor["nombre"].'",
			      "'.$datosUsuario["nombre"].'",
			      "'.$ordenes[$i]['descripcion'].'",
			      "'.$ordenes[$i]['fecha'].'",
			      "'.$estatus.'",
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

$activar = new TablaCompras();
$activar -> mostrarTabla();