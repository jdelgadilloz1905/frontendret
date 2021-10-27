<?php

require_once "conexion.php";

class ModeloGrupo{

	/*=============================================
	CREAR GRUPO DE CLIENTE
	=============================================*/

	static public function mdlIngresarNuevoGrupo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,alias) VALUES (:nombre,:alias)");

		$stmt->bindParam(":nombre", $datos["nombreGrupo"], PDO::PARAM_STR);
        $stmt->bindParam(":alias", $datos["nombreAlias"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR GRUPO DE CLIENTE
	=============================================*/

	static public function mdlMostrarGrupoCliente($tabla, $item, $valor, $item2, $valor2){

		if($item != null && $item2 == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}elseif($item == null && $item2 == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item2 = :$item2");

			$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();
		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR GRUPO CLIENTE
	=============================================*/

	static public function mdlEditarGrupoCliente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, alias = :alias WHERE id = :id");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":alias", $datos["alias"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR GRUPO CLIENTE
	=============================================*/

	static public function mdlBorrarGrupoCLiente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTIVAR/INACTIVAR GRUPO CLIENTE
	=============================================*/

	static public function mdlActivarInactivarGrupoCLiente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estatus = :estatus WHERE id = :id");

		$stmt -> bindParam(":estatus", $datos["estatus"], PDO::PARAM_INT);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;

	}

}

