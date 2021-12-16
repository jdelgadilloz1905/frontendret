<?php

require_once "conexion.php";

class ModeloUsuarios{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarUsuarios($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR LISTA DE TECNICOS
	=============================================*/

	static public function mdlListaUsuariosFiltro($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;
	}

	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function mdlIngresarUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, usuario, password, perfil, foto, id_grupo, id_cliente) VALUES (:nombre, :usuario, :password, :perfil, :foto, :id_grupo, :id_cliente)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		$stmt->bindParam(":id_grupo", $datos["id_grupo"], PDO::PARAM_STR);
		$stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	/*=============================================
	EDITAR USUARIO
	=============================================*/

    static public function mdlEditarUsuario($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, password = :password, perfil = :perfil, foto = :foto WHERE usuario = :usuario");

        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt -> bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        $stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;

    }

    /*=============================================
	EDITAR FOTO USUARIO DESDE EL MOVIL
	=============================================*/

    static public function mdlEditarFotoAPI($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET foto = :foto, dispositivo = :dispositivo WHERE id = :id");

        $stmt -> bindParam(":foto", $datos["fotoNew"], PDO::PARAM_STR);
        $stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);
        $stmt -> bindParam(":dispositivo", $datos["dispositivo"], PDO::PARAM_STR);

        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;

    }

	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/

	static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2, $dispositivo){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1, dispositivo = :dispositivo WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
        $stmt -> bindParam(":dispositivo", $dispositivo, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

    /*=============================================
    ACTUALIZAR USUARIO
    =============================================*/

    static public function mdlActualizarUsuarioReact($tabla, $item, $valor,$item1, $valor1 ){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item = :$item WHERE $item1 = :$item1");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);


        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;

    }

	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function mdlBorrarUsuario($tabla, $datos){

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
    VALIADR USUARIOS DESDE REACT
    =============================================*/
	static public function MdlMostrarUsuariosReact($tabla, $item, $item1, $valor){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item or $item1 = :$item1");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> bindParam(":".$item1, $valor, PDO::PARAM_STR);


        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;
    }

}