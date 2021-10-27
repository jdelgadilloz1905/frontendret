<?php

require_once "../controladores/ruta.controlador.php";
require_once "../modelos/ruta.modelo.php";

class AjaxRutas{

	/*=============================================
	EDITAR RUTAS
	=============================================*/	

	public $idRuta;
	public $estatus;
	public $detalle;

	public function ajaxMostrarRuta(){

		$item = "id";
		$valor = $this->idRuta;

		$respuesta = ControladorRuta::ctrMostrarRutas($item, $valor,null,null);

		echo json_encode($respuesta);

	}
	
	public function ajaxEditarEstatusRutas(){
		
		$datos = array(
			"id" => $this->idRuta,
			"estatus" => $this->estatus
		);
		$respuesta = ModeloRuta::mdlActivarInactivarRuta("rutas",$datos);
		
		echo $respuesta;
	}

	public function ajaxMostrarDetalleRuta(){

	    $idRuta = $this->idRuta;

	    $respuesta = ModeloRuta::mdlMostrarDetalleRuta("detalle_ruta","id_ruta",$idRuta);

        echo json_encode($respuesta);



    }

    public function ajaxEliminarTienda(){

	    $datos = array(
	        "id_ruta" => $this->idRuta,
            "detalle" => $this->detalle
        );

        $respuesta = ModeloRuta::mdlActualizarDetalleRuta("detalle_ruta", $datos);

        echo json_encode($respuesta);

    }

    public function ajaxEliminarRuta(){

	    ModeloRuta::mdlEliminarRuta("rutas","id",$this->idRuta);
	    ModeloRuta::mdlEliminarRuta("detalle_ruta","id_ruta",$this->idRuta);

	    echo "ok";

    }
}

/*=============================================
EDITAR RUTAS
=============================================*/	
if(isset($_POST["idRuta"])){

	$rutas = new AjaxRutas();
	$rutas -> idRuta = $_POST["idRuta"];
	$rutas ->estatus = $_POST["idEstatus"];
	$rutas -> ajaxEditarEstatusRutas();
}

/*=============================================
MOSTRAR RUTAS
=============================================*/
if(isset($_POST["idRutaMostrar"])){

	$rutas = new AjaxRutas();
	$rutas->idRuta = $_POST["idRutaMostrar"];
	$rutas->ajaxMostrarRuta();
}

/*=============================================
MOSTRAR TIENDAS DE LAS RUTAS
=============================================*/
if(isset($_POST["mostrarDetalleRutas"])){

    $rutas = new AjaxRutas();
    $rutas -> idRuta = $_POST["idRutaDetalle"];
    $rutas-> ajaxMostrarDetalleRuta();
}

/*============================================
ACTUALIZAR UNA TIENDA DE LA RUTA
==============================================*/

if(isset($_POST["eliminarTienda"]) or isset($_POST["actualizarTienda"])){

    $eliminar = new AjaxRutas();
    $eliminar -> idRuta = $_POST["idRutaEliminar"];
    $eliminar -> detalle = $_POST["detalleRuta"];
    $eliminar -> ajaxEliminarTienda();

}

/*============================================
ELIMINAR RUTA ENCABEZADO MAS DETALLE
==============================================*/
if(isset($_POST["eliminarRuta"])){

    $eliminarRuta = new AjaxRutas();
    $eliminarRuta ->idRuta = $_POST["idRutaEliminar"];
    $eliminarRuta -> ajaxEliminarRuta();

}


