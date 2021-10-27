<?php

require_once "../controladores/incidencia.controlador.php";
require_once "../modelos/incidencia.modelo.php";

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxIncidencias{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $fechaInicial;
	public $fechaFinal;
	public $id_incidencia;
	public $ruta_imagen;
	public $estadoincidencia;
	public $titulo;

	public function ajaxRangoFechas(){

		if($this->fechaInicial == "" && $this->fechaFinal == ""){

			$fechaInicial = null;
			$fechaFinal = null;

		}else{

			$fechaInicial = $this->fechaInicial;
			$fechaFinal = $this->fechaFinal;

		}		

		$respuesta = ControladorIncidencia::ctrRangoFechasIncidencia($fechaInicial, $fechaFinal);

		echo json_encode($respuesta);

	}

	/*==================================================
	VAlIDAR SI EL NOMBRE EXISTE
	====================================================*/

	public $idCliente;
	public $idGrupo;

	public function ajaxValidarIdCliente(){

		$item ="id";
		$valor = $this->idCliente;

		$respuesta = Controladorclientes::ctrMostrarClientes($item,$valor);

		if(isset($respuesta["id"])){
            if($respuesta["id"] == $valor){

                echo (isset($respuesta["direccion"]) ? $respuesta["direccion"] : "");
            }else{
                echo "error";

            }
        }else{
		    echo "";
        }

	}

	public function ajaxEliminarFoto(){

		$datos = array(
			"id" =>$this->id_incidencia,
			"ruta_imagen" => $this->ruta_imagen,
			"titulo" => $this->titulo
		);
		//valido que el ARCHIVO O FOTO no este asociado con varias incidencia
		$result = ControladorIncidencia::ctrBuscarArchivosDuplicados("incidencias_fotos",$datos);

		$cantidad = count($result);
		$respuesta = ControladorIncidencia::ctrEliminarFoto($datos,$cantidad);

		echo $respuesta;
	}

	public function ajaxCambiarEstadoIncidencia(){

		$datos = array(
			"id_incidencia" =>$this->id_incidencia,
			"estado"=>$this->estadoincidencia
		);

		$respuesta = ControladorIncidencia::ctrCambiarEstadoIncidencia($datos);

		echo $respuesta;
	}
	
	public function ajaxEliminarIncidencia(){
		
		$respuesta = ControladorIncidencia::ctrEliminarIncidencia($this->id_incidencia);
		
		echo $respuesta;
	}

	public function ajaxObtenerTiendas(){

        $datos =$this->idGrupo;

        $table="clientes";

        $respuesta = ModeloClientes::mdlMostrarClientesxGrupo($table,"id_grupo",$datos);


        $listas = '<option value="" idCliente="">Selecciona una tienda</option>';

        foreach ($respuesta as $key => $value) {

            $listas .= "<option value='$value[id]'>$value[alias] - $value[localizador] - $value[documento]</option>";

        }

        echo $listas;
    }

    public function ajaxEliminarIncidenciasXLote(){

        $datos =$this->id_incidencia;

	    $tabla = "incidencias";

	    $respuesta = ModeloIncidencia::mdlEliminarIncidenciaxLote($tabla,$datos);

	    echo $respuesta;
    }
}

/*=============================================
TRAER RANGO DE FECHAS
=============================================*/	
if(isset($_POST["fechaInicial"])){

	$rango = new AjaxIncidencias();
	$rango -> fechaInicial = $_POST["fechaInicial"];
	$rango -> fechaFinal = $_POST["fechaFinal"];
	$rango -> ajaxRangoFechas();
}

if(isset($_POST["idCliente"])){

	$validarNombre = new AjaxIncidencias();

	$validarNombre -> idCliente = $_POST["idCliente"];

	$validarNombre->ajaxValidarIdCliente();
}


/*==================================================
ELIMINAR FOTO ANUNCIO O ARCHIVO
====================================================*/

if(isset($_POST["id"])){

	$borrarFoto = new AjaxIncidencias();
	$borrarFoto->id_incidencia = $_POST["id"];
	$borrarFoto->ruta_imagen = $_POST["ruta_imagen"];
	$borrarFoto->titulo = $_POST["titulo"];
	$borrarFoto->ajaxEliminarFoto();
}

/*=============================================
CAMBIAR DE ESTADO LA INCIDENCIA
=============================================*/

if(isset($_POST["estadoincidencia"])){

	$estado = new AjaxIncidencias();
	$estado->id_incidencia = $_POST["id_incidencia"];
	$estado->estadoincidencia = $_POST["estadoincidencia"];
	$estado->ajaxCambiarEstadoIncidencia();

}

/*==================================================
ELIMINAR INCIDENCIA
====================================================*/

if(isset($_POST["idIncidencia"])){
	
	$eliminar = new AjaxIncidencias();
	$eliminar->id_incidencia = $_POST["idIncidencia"];
	$eliminar->ajaxEliminarIncidencia();
}

/*==================================================
OBTENER LAS TIENDAS POR GRUPO SELECCIONADO
====================================================*/

if(isset($_POST["idGrupo"])) {

    $obtener = new AjaxIncidencias();
    $obtener->idGrupo = $_POST["idGrupo"];
    $obtener->ajaxObtenerTiendas();

}

/*===================================================
ELIMINAR POR LOTE INCIDENCIAS
=====================================================*/

if(isset($_POST["eliminarLote"])){

    echo "hola";
//    $eliminarxLote = new AjaxIncidencias();
//    $eliminarxLote->id_incidencia = $_POST["idIncidencias"];
//    $eliminarxLote->ajaxEliminarIncidenciasXLote();
}