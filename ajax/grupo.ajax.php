<?php

require_once "../controladores/grupo.controlador.php";
require_once "../modelos/grupo.modelo.php";

class AjaxGrupos{

	/*=============================================
	EDITAR GRUPO DE CLIENTE
	=============================================*/	

	public $idGrupoCliente;
	public $estatus;

	public function ajaxMostrarGrupoCliente(){

		$item = "id";
		$valor = $this->idGrupoCliente;

		$respuesta = ControladorGrupo::ctrMostrarGrupoCliente($item, $valor,null,null);

		echo json_encode($respuesta);

	}
	
	public function ajaxEditarEstatusGrupoCliente(){
		
		$datos = array(
			"id" => $this->idGrupoCliente,
			"estatus" => $this->estatus
		);
		$respuesta = ModeloGrupo::mdlActivarInactivarGrupoCLiente("grupo_cliente",$datos);
		
		echo $respuesta;
	}
}

/*=============================================
EDITAR GRUPO DE CLIENTE
=============================================*/	
if(isset($_POST["idGrupoCLiente"])){

	$grupoCliente = new AjaxGrupos();
	$grupoCliente -> idGrupoCliente = $_POST["idGrupoCLiente"];
	$grupoCliente ->estatus = $_POST["idEstatus"];
	$grupoCliente -> ajaxEditarEstatusGrupoCliente();
}

if(isset($_POST["idGrupoClienteMostrar"])){

	$grupoCliente = new AjaxGrupos();
	$grupoCliente->idGrupoCliente = $_POST["idGrupoClienteMostrar"];
	$grupoCliente->ajaxMostrarGrupoCliente();
}
