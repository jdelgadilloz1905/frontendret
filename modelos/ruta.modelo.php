<?php

require_once "conexion.php";

class ModeloRuta{

	/*=============================================
	CREAR RUTA
	=============================================*/

	static public function mdlIngresarNuevaRuta($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre) VALUES (:nombre)");

		$stmt->bindParam(":nombre", $datos, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR rutas
	=============================================*/

	static public function mdlMostrarRutas($tabla, $item, $valor, $item2, $valor2){

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
    MOSTRAR RUTAS SIN DETALLE
    =============================================*/

    static public function mdlMostrarRutasSinDetalle(){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM rutas WHERE id NOT IN(SELECT id_ruta FROM detalle_ruta)");

        $stmt -> execute();

        return $stmt -> fetchAll();


        $stmt -> close();

        $stmt = null;

    }

	/*=============================================
	EDITAR RUTAS
	=============================================*/

	static public function mdlEditarRuta($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE id = :id");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR RUTAS
	=============================================*/

	static public function mdlBorrarRuta($tabla, $datos){

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
    BORRAR RUTAS
    =============================================*/

    static public function mdlBorrarDetalleRuta($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_ruta = :id");

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
	ACTIVAR/INACTIVAR RUTAS
	=============================================*/

	static public function mdlActivarInactivarRuta($tabla, $datos){

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


	/*================================================
	CONSULTAR SI LA RUTA ESTA ASOCIADA A TIENDAS
	==================================================*/

	static public function mdlMostrarDetalleRuta($tabla,$item,$valor){

        $stmt = Conexion::conectar()->prepare("SELECT d.*, u.nombre nombreTecnico FROM $tabla d
                                                          LEFT JOIN usuarios u 
                                                          ON d.id_tecnico = u.id 
                                                          WHERE $item = :$item");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;
    }



    static public function mdlCrearRutadetalle($tabla,$datos){

	        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_ruta,id_tecnico,tipo_servicio,detalle, comentario)
                                                VALUES (:id_ruta,:id_tecnico,:tipo_servicio,:detalle, :comentario)");

            $stmt->bindParam(":id_ruta", $datos["id_ruta"], PDO::PARAM_INT);
            $stmt->bindParam(":tipo_servicio", $datos["tipo_servicio"], PDO::PARAM_STR);
            $stmt->bindParam(":detalle", $datos["detalle"], PDO::PARAM_STR);
            $stmt->bindParam(":comentario", $datos["comentario"], PDO::PARAM_STR);
            $stmt->bindParam(":id_tecnico", $datos["id_tecnico"], PDO::PARAM_STR);

            if($stmt->execute()){

                return "ok";
            }else{

                return "error";

            }

            $stmt->close();
            $stmt = null;

    }


    /*====================================================
    ACTUALIZAR LAS TIENDAS DE LA RUTA PADRE
    ======================================================*/

    static public function mdlActualizarDetalleRuta($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET detalle = :detalle WHERE id_ruta = :id_ruta");

        $stmt -> bindParam(":detalle", $datos["detalle"], PDO::PARAM_STR);
        $stmt -> bindParam(":id_ruta", $datos["id_ruta"], PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt->close();
        $stmt = null;
    }

    /*======================================================
     EDITAR DETALLE DE LA RUTA
    ========================================================*/

    static public function mdlEditarRutaDetalle($tabla,$datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_tecnico = :id_tecnico, tipo_servicio = :tipo_servicio, comentario = :comentario WHERE id_ruta = :id_ruta");

        $stmt -> bindParam(":id_ruta", $datos["id_ruta"], PDO::PARAM_INT);
        $stmt -> bindParam(":id_tecnico", $datos["id_tecnico"], PDO::PARAM_INT);
        $stmt -> bindParam(":tipo_servicio", $datos["tipo_servicio"], PDO::PARAM_STR);
        $stmt -> bindParam(":comentario", $datos["comentario"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt->close();
        $stmt = null;
    }

    /*===========================================
    ELIMINAR RUTA ENCABEZADO Y DETALLE
    =============================================*/

    static public function mdlEliminarRuta($tabla,$item,$valor){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $item = :$item");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt->close();
        $stmt = null;
    }

}

