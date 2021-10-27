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

class Compras{

  /*=============================================
  MOSTRAR DETALLE DE LAS COMPRAS
  =============================================*/
    public $idCompra;

  public function mostrarItemCompras(){

      $respuesta = ModeloOrdenes::mdlDetalleCompras("movimiento_inventario",$this->idCompra);

      echo json_encode($respuesta);

  }

}

/*=============================================
DETALLE DE PRODUCTOS
=============================================*/ 
if(isset($_POST["idCompra"])){

    $compras = new Compras();
    $compras->idCompra = $_POST["idCompra"];
    $compras -> mostrarItemCompras();
}
