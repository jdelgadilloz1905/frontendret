<?php

require_once "conexion.php";

class ModeloIncidencia{

	/*=============================================
	MOSTRAR Incidencia
	=============================================*/

    static public function mdlMostrarIncidencias($tabla, $item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }

        $stmt -> close();

        $stmt = null;

    }

    /*=============================================
	MOSTRAR Incidencia
	=============================================*/

    static public function mdlMostrarIncidenciasFiltro($tabla, $item, $valor, $aprobado){



        $stmt = Conexion::conectar()->prepare("SELECT c.nombre nombreCliente, c.direccion direccionCliente,c.documento, c.localizador, t.nombre nombreTecnico,  u.nombre nombreUsuario, i.*,
                                                          (SELECT g.alias FROM grupo_cliente g WHERE g.id = i.id_grupo) AS alias
                                                        FROM $tabla i
                                                        LEFT JOIN usuarios u
                                                          ON i.id_usuario = u.id
                                                        LEFT JOIN usuarios t
                                                          ON i.id_tecnico = t.id
                                                        LEFT JOIN clientes c
                                                          ON i.id_cliente = c.id 
                                                        WHERE $item = :$item and i.aprobado = $aprobado order by i.fecha_visita DESC ");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);


        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;

    }

	/*=============================================
	MOSTRAR Incidencias por tecnico
	=============================================*/

	static public function mdlMostrarIncidenciasTecnico($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}
    /*=============================================
        MOSTRAR Incidencias por tecnico y estatus
        =============================================*/
	static public function mdlMostrarIncidenciasTecnicoEstatus($tabla, $item, $valor,$item2, $valor2){

        $stmt = Conexion::conectar()->prepare("SELECT c.nombre nombreCliente, c.direccion direccionCliente,c.documento, c.localizador,i.*,
                                                                (SELECT g.alias FROM grupo_cliente g WHERE g.id = i.id_grupo) AS alias  
                                                            FROM $tabla i 
                                                            LEFT JOIN clientes c
                                                              ON i.id_cliente = c.id 
                                                            WHERE $item = :$item AND $item2 = :$item2 order by i.fecha_creacion asc");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_INT);

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;
    }

    /*=============================================
    MOSTRAR Incidencias por tecnico API
    =============================================*/

    static public function mdlMostrarIncidenciasTecnicoAPI($tabla, $item, $valor,$limite,$posicion){

        $tipo="plomeria";
        $stmt = Conexion::conectar()->prepare("SELECT i.id,i.tipo_servicio,i.asunto,i.prioridad,i.direccion,i.descripcion,i.estatus_incidencia,c.nombre, i.fecha_visita,i.hora_inicio,i.hora_fin,
                                                               i.estatus_incidencia
                                                          FROM $tabla i 
                                                           LEFT JOIN clientes c
                                                              ON c.id = i.id_cliente
                                                              WHERE $item = :$item and i.estatus_incidencia != 2 and tipo_servicio != :tipo_servicio 
                                                              limit $posicion,$limite");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> bindParam(":tipo_servicio", $tipo, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;

    }

    /*=============================================
    MOSTRAR incidencia con el buscador SEARCH API
    ===============================================*/
    static public function mdlMostrarIncidenciasTecnicoLikeAPI($tabla,$item,$valor,$limite,$search){

        $tipo="plomeria";
        $stmt = Conexion::conectar()->prepare("SELECT i.id,i.tipo_servicio,i.asunto,i.prioridad,i.direccion,i.descripcion,i.estatus_incidencia,c.nombre, i.fecha_visita,
                                                               i.estatus_incidencia
                                                          FROM $tabla i 
                                                           LEFT JOIN clientes c
                                                              ON c.id = i.id_cliente
                                                              WHERE $item = :$item and i.estatus_incidencia !=2 and tipo_servicio != :tipo_servicio 
                                                                and(
                                                                       i.tipo_servicio LIKE '%$search%' 
                                                                    or i.asunto LIKE '%$search%'
                                                                    or i.prioridad LIKE '%$search%' 
                                                                    or i.direccion LIKE '%$search%'
                                                                    or i.descripcion LIKE '%$search%'
                                                                    or c.nombre LIKE '%$search%'
                                                                )
                                                              ");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> bindParam(":tipo_servicio", $tipo, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;
    }

	/*=============================================
	MOSTRAR Incidencia
	=============================================*/

	static public function mdlContarIncidencias($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT count(*) cant FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT count(*) cant FROM $tabla ORDER BY id ASC");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR Incidencia por tecnico
	=============================================*/

	static public function mdlContarIncidenciasTecnico($tabla, $item, $valor,$item1, $valor1){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT count(*) cant FROM $tabla WHERE $item = :$item and $item1 = :$item1");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT count(*) cant FROM $tabla ORDER BY id ASC");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	REGISTRO DE INCIDENCIA
	=============================================*/

	static public function mdlCrearIncidencia($tabla, $datos){


		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_usuario,id_cliente, id_tecnico, tipo_servicio, fecha_visita, direccion,asunto,descripcion,estatus,prioridad,id_grupo,id_ruta)
												VALUES (:id_usuario, :id_cliente, :id_tecnico, :tipo_servicio, :fecha_visita, :direccion,:asunto,:descripcion, :estatus, :prioridad, :id_grupo, :id_ruta)");

		$stmt->bindParam(":id_usuario", $datos["ingId"], PDO::PARAM_INT);
		$stmt->bindParam(":id_cliente", $datos["ingclienteInc"], PDO::PARAM_INT);
		$stmt->bindParam(":id_tecnico", $datos["ingTecnico"], PDO::PARAM_INT);
		$stmt->bindParam(":tipo_servicio", $datos["tipo_servicio"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_visita", $datos["ingFechaVisita"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["ingDireccion"], PDO::PARAM_STR);
		$stmt->bindParam(":asunto", $datos["ingAsunto"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["ingDescripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":estatus", $datos["ingEstatus"], PDO::PARAM_STR);
		$stmt->bindParam(":prioridad", $datos["ingPrioridad"], PDO::PARAM_STR);
		$stmt->bindParam(":id_grupo", $datos["id_grupo"], PDO::PARAM_STR);
        $stmt->bindParam(":id_ruta", $datos["id_ruta"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	EDITAR Incidencia
	=============================================*/

	static public function mdlEditarIncidencia($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  id_cliente = :id_cliente, id_vendedor = :id_vendedor, productos = :productos, impuesto = :impuesto, neto = :neto, total= :total, metodo_pago = :metodo_pago WHERE codigo = :codigo");

		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
		$stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
		$stmt->bindParam(":id_vendedor", $datos["id_vendedor"], PDO::PARAM_INT);
		$stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
		$stmt->bindParam(":impuesto", $datos["impuesto"], PDO::PARAM_STR);
		$stmt->bindParam(":neto", $datos["neto"], PDO::PARAM_STR);
		$stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
		$stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR INCIDENCIA
	=============================================*/

	static public function mdlEliminarIncidencia($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	RANGO FECHAS
	=============================================*/	

	static public function mdlRangoFechasIncidencia($tabla, $fechaInicial, $fechaFinal){

		if($fechaInicial == $fechaFinal){

			$fechaFinal = date("Y-m-d",strtotime($fechaFinal."+ 1 days"));
			$stmt = Conexion::conectar()->prepare("SELECT date_format(fecha_creacion,'%d-%m-%Y') as fecha,MONTHNAME(i.fecha_creacion) AS mes, i.fecha_creacion, COUNT(i.id) AS cantIncidencia
													FROM
														$tabla i
													WHERE fecha_creacion like '%$fechaFinal%'
													GROUP BY
														YEAR(i.fecha_creacion),
														MONTH(i.fecha_creacion) ");

			$stmt -> bindParam(":fecha_creacion", $fechaFinal, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();


		}else{
			$fechaFinal = date("Y-m-d",strtotime($fechaFinal."+ 1 days"));
			$stmt = Conexion::conectar()->prepare("SELECT date_format(fecha_creacion,'%d-%m-%Y') as fecha,MONTHNAME(i.fecha_creacion) AS mes,i.fecha_creacion,COUNT(i.id) AS cantIncidencia
													FROM
														$tabla i
													WHERE fecha_creacion BETWEEN '$fechaInicial' AND '$fechaFinal'
													GROUP BY
														YEAR(i.fecha_creacion),
														MONTH(i.fecha_creacion)
												   ");

			$stmt -> execute();

			return $stmt -> fetchAll();




		}
		
		$stmt -> close();

		$stmt = null;	

	}
	/*=============================================
	RANGO FECHAS CON DETALLE
	=============================================*/
	static public function mdlRangoFechasIncidenciaDetalle($tabla, $fechaInicial, $fechaFinal){

		if($fechaInicial == $fechaFinal){

			$fechaFinal = date("Y-m-d",strtotime($fechaFinal."+ 1 days"));
			$stmt = Conexion::conectar()->prepare("SELECT MONTHNAME(i.fecha_creacion) AS mes, i.*
													FROM
														$tabla i
													WHERE fecha_creacion like '%$fechaFinal%'");

			$stmt -> bindParam(":fecha_creacion", $fechaFinal, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();


		}else{
			$fechaFinal = date("Y-m-d",strtotime($fechaFinal."+ 1 days"));
			$stmt = Conexion::conectar()->prepare("SELECT MONTHNAME(i.fecha_creacion) AS mes,i.*
													FROM
														$tabla i
													WHERE fecha_creacion BETWEEN '$fechaInicial' AND '$fechaFinal'");
			$stmt -> execute();

			return $stmt -> fetchAll();




		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	TECNICOS POR INCIDENCIAS
	===============================================*/

	static public function mdlRangoTecnico($fechaInicial, $fechaFinal){

		$stmt = Conexion::conectar()->prepare("SELECT case when u.nombre IS null then 'Sin Asignar' ELSE u.nombre END AS nombre ,COUNT(i.id) AS cantIncidencia
												FROM incidencias i
												LEFT JOIN usuarios u
												ON u.id = i.id_tecnico
												GROUP BY i.id_tecnico");

		$stmt -> execute();

		return $stmt -> fetchAll();
	}

	/*=============================================
	SUMAR EL TOTAL DE Incidencia
	=============================================*/	

	static public function mdlSumaTotalIncidencia($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT count(*) as total FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}


	static public function mdlValidarIncidenciaStart($tabla,$id_incidencia){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $id_incidencia, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
	}

	static public function mdlActualizarIncidencia($tabla,$datos){


		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  id_cliente = :id_cliente, id_tecnico = :id_tecnico, tipo_servicio = :tipo_servicio, fecha_visita = :fecha_visita,
													direccion = :direccion, asunto= :asunto, descripcion = :descripcion, prioridad = :prioridad, id_ruta = :id_ruta WHERE id = :id");

		$stmt->bindParam(":id", $datos["id_incidencia"], PDO::PARAM_INT);
		$stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
		$stmt->bindParam(":id_tecnico", $datos["id_tecnico"], PDO::PARAM_INT);
		$stmt->bindParam(":tipo_servicio", $datos["tipo_servicio"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_visita", $datos["fecha_visita"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":asunto", $datos["asunto"], PDO::PARAM_STR);
		$stmt->bindParam(":prioridad", $datos["prioridad"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":id_ruta", $datos["id_ruta"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	INSERTAMOS LAS FOTOS
	=============================================*/

	static public function mdlInsertarImagenincidencia($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_incidencia,img_url,nombre,tipo,tamano,extension,titulo, momento)
                                                VALUES (:id_incidencia,:img_url,:nombre,:tipo,:tamano,:extension,:titulo, :momento)");

		$stmt->bindParam(":id_incidencia", $datos["id_incidencia"], PDO::PARAM_STR);
		$stmt->bindParam(":img_url", $datos["img_url"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["name"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos["type"], PDO::PARAM_STR);
		$stmt->bindParam(":tamano", $datos["size"], PDO::PARAM_STR);
		$stmt->bindParam(":extension", $datos["extension"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo", $datos["title"], PDO::PARAM_STR);
		$stmt->bindParam(":momento", $datos["momento"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;
	}

	/*==========================================
	MOSTRAR FOTOS DE INCIDENCIAS ANTES Y DESPUES
	============================================*/

	static public function mdlMostrarImagenesIncidencia($tabla,$id_incidencia,$tipo){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_incidencia = :id_incidencia and momento = :momento");

		$stmt->bindParam(":id_incidencia",$id_incidencia, PDO::PARAM_INT);
		$stmt->bindParam(":momento",$tipo, PDO::PARAM_STR);

		$stmt-> execute();

		return $stmt->fetchAll();

		$stmt->close();

		$stmt = null;

	}

	static public function mdlEliminarFoto($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();

		$stmt = null;
	}

	static public function mdlCambiarEstadoIncidencia($tabla,$datos){

		if($datos["estado"] == 1){
			//actualizo la fecha inicio para comenzar hacer la chamba

			$hora_inicio = date("H:i:s");

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  hora_inicio = :hora_inicio, estatus_incidencia = :estatus_incidencia WHERE id = :id");

			$stmt->bindParam(":id", $datos["id_incidencia"], PDO::PARAM_INT);
			$stmt->bindParam(":estatus_incidencia", $datos["estado"], PDO::PARAM_STR);
			$stmt->bindParam(":hora_inicio", $hora_inicio, PDO::PARAM_STR);


			if($stmt->execute()){

				return "ok";

			}else{

				return "error";

			}

			$stmt->close();
			$stmt = null;
		}else{

			//actualizo la fecha salida indicando que ya termino la chamba
			$hora_fin = date("H:i:s");
			$fecha_resuelto = date("Y-m-d H:i:s");

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  hora_fin = :hora_fin, estatus_incidencia = :estatus_incidencia, estatus = 'cerrado', fecha_resuelto = :fecha_resuelto WHERE id = :id");

			$stmt->bindParam(":id", $datos["id_incidencia"], PDO::PARAM_INT);
			$stmt->bindParam(":estatus_incidencia", $datos["estado"], PDO::PARAM_STR);
			$stmt->bindParam(":hora_fin", $hora_fin, PDO::PARAM_STR);
			$stmt->bindParam(":fecha_resuelto", $fecha_resuelto, PDO::PARAM_STR);


			if($stmt->execute()){

				return "ok";

			}else{

				return "error";

			}

			$stmt->close();
			$stmt = null;
		}
	}

	static public function mdlConsultarServicioIncidencia($tabla,$id_incidencia){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_incidencia = :id_incidencia");

		$stmt->bindParam(":id_incidencia",$id_incidencia, PDO::PARAM_INT);

		$stmt-> execute();

		return $stmt->fetch();

		$stmt->close();

		$stmt = null;
	}

	static public function mdlActualizarServicioIncidencia($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET
													vaciado = :vaciado, vaciado_parcial = :vaciado_parcial, otros = :otros, limpeza_regular = :limpeza_regular, inspeccion = :inspeccion,
													interceptor_aceite = :interceptor_aceite, tanque_almacenamiento = :tanque_almacenamiento, pozo_septico = :pozo_septico,
													estacion_bombas = :estacion_bombas, tanque_recibidor = :tanque_recibidor, tanque_aceites = :tanque_aceites, otros1 = :otros1,
													interior = :interior, exterior = :exterior, interior_exterior = :interior_exterior, limpieza_derrame_liquido = :limpieza_derrame_liquido,
													limpieza_manhole = :limpieza_manhole, limpieza_lift_station = :limpieza_lift_station, limpieza_tuberias = :limpieza_tuberias,
													limpieza_registros_desagues = :limpieza_registros_desagues, limpieza_registros_num = :limpieza_registros_num, limpieza_desagues_num = :limpieza_desagues_num,
													remocion_acarreo = :remocion_acarreo, remocion_grasas = :remocion_grasas, otros2 = :otros2, vacuum = :vacuum, vacuumNum = :vacuumNum, vacuum_portable = :vacuum_portable,
													water_jetter = :water_jetter, tanktruck = :tanktruck, otros3 = :otros3, coverAll = :coverAll, guantes = :guantes, capacete = :capacete, equipo_espacio_confinado = :equipo_espacio_confinado,
													comentario = :comentario, desechos_liquidos = :desechos_liquidos, aguas_residuales = :aguas_residuales, aceites_vegetales = :aceites_vegetales, otros4 = :otros4,
													total_desperciado = :total_desperciado, tecnico_adicional = :tecnico_adicional, limpieza_tuberias_num = :limpieza_tuberias_num,planta_tratamiento=:planta_tratamiento , otra_facilidad= :otra_facilidad,
													otros5 = :otros5
											  WHERE servicio_general.id_incidencia = :id_incidencia");

		$stmt->bindParam(":id_incidencia", $datos["id_incidencia"], PDO::PARAM_INT);

		$stmt->bindParam(":vaciado", $datos["vaciado"], PDO::PARAM_STR);
		$stmt->bindParam(":vaciado_parcial", $datos["vaciado_parcial"], PDO::PARAM_STR);
		$stmt->bindParam(":otros", $datos["otros"], PDO::PARAM_STR);
		$stmt->bindParam(":limpeza_regular", $datos["limpeza_regular"], PDO::PARAM_STR);
		$stmt->bindParam(":inspeccion", $datos["inspeccion"], PDO::PARAM_STR);
		$stmt->bindParam(":interceptor_aceite", $datos["interceptor_aceite"], PDO::PARAM_STR);
		$stmt->bindParam(":tanque_almacenamiento", $datos["tanque_almacenamiento"], PDO::PARAM_STR);
		$stmt->bindParam(":pozo_septico", $datos["pozo_septico"], PDO::PARAM_STR);
		$stmt->bindParam(":estacion_bombas", $datos["estacion_bombas"], PDO::PARAM_STR);
		$stmt->bindParam(":tanque_recibidor", $datos["tanque_recibidor"], PDO::PARAM_STR);
		$stmt->bindParam(":tanque_aceites", $datos["tanque_aceites"], PDO::PARAM_STR);
		$stmt->bindParam(":otros1", $datos["otros1"], PDO::PARAM_STR);
		$stmt->bindParam(":interior", $datos["interior"], PDO::PARAM_STR);
		$stmt->bindParam(":exterior", $datos["exterior"], PDO::PARAM_STR);
		$stmt->bindParam(":interior_exterior", $datos["interior_exterior"], PDO::PARAM_STR);
		$stmt->bindParam(":limpieza_derrame_liquido", $datos["limpieza_derrame_liquido"], PDO::PARAM_STR);
		$stmt->bindParam(":limpieza_manhole", $datos["limpieza_manhole"], PDO::PARAM_STR);
		$stmt->bindParam(":limpieza_lift_station", $datos["limpieza_lift_station"], PDO::PARAM_STR);
		$stmt->bindParam(":limpieza_tuberias", $datos["limpieza_tuberias"], PDO::PARAM_STR);
		$stmt->bindParam(":limpieza_tuberias_num", $datos["limpieza_tuberias_num"], PDO::PARAM_STR);
		$stmt->bindParam(":limpieza_registros_desagues", $datos["limpieza_registros_desagues"], PDO::PARAM_STR);
		$stmt->bindParam(":limpieza_registros_num", $datos["limpieza_registros_num"], PDO::PARAM_STR);
		$stmt->bindParam(":limpieza_desagues_num", $datos["limpieza_desagues_num"], PDO::PARAM_STR);
		$stmt->bindParam(":remocion_acarreo", $datos["remocion_acarreo"], PDO::PARAM_STR);
		$stmt->bindParam(":remocion_grasas", $datos["remocion_grasas"], PDO::PARAM_STR);
		$stmt->bindParam(":otros2", $datos["otros2"], PDO::PARAM_STR);
		$stmt->bindParam(":vacuum", $datos["vacuum"], PDO::PARAM_STR);
		$stmt->bindParam(":vacuumNum", $datos["vacuumNum"], PDO::PARAM_STR);
		$stmt->bindParam(":vacuum_portable", $datos["vacuum_portable"], PDO::PARAM_STR);
		$stmt->bindParam(":water_jetter", $datos["water_jetter"], PDO::PARAM_STR);
		$stmt->bindParam(":tanktruck", $datos["tanktruck"], PDO::PARAM_STR);
		$stmt->bindParam(":otros3", $datos["otros3"], PDO::PARAM_STR);
		$stmt->bindParam(":coverAll", $datos["coverAll"], PDO::PARAM_STR);
		$stmt->bindParam(":guantes", $datos["guantes"], PDO::PARAM_STR);
		$stmt->bindParam(":capacete", $datos["capacete"], PDO::PARAM_STR);
		$stmt->bindParam(":equipo_espacio_confinado", $datos["equipo_espacio_confinado"], PDO::PARAM_STR);
		$stmt->bindParam(":comentario", $datos["comentario"], PDO::PARAM_STR);
		$stmt->bindParam(":desechos_liquidos", $datos["desechos_liquidos"], PDO::PARAM_STR);
		$stmt->bindParam(":aguas_residuales", $datos["aguas_residuales"], PDO::PARAM_STR);
		$stmt->bindParam(":aceites_vegetales", $datos["aceites_vegetales"], PDO::PARAM_STR);
		$stmt->bindParam(":otros4", $datos["otros4"], PDO::PARAM_STR);
		$stmt->bindParam(":total_desperciado", $datos["total_desperciado"], PDO::PARAM_STR);
		$stmt->bindParam(":tecnico_adicional", $datos["tecnico_adicional"], PDO::PARAM_STR);
		$stmt->bindParam(":planta_tratamiento", $datos["planta_tratamiento"], PDO::PARAM_STR);
		$stmt->bindParam(":otra_facilidad", $datos["otra_facilidad"], PDO::PARAM_STR);
		$stmt->bindParam(":otros5", $datos["otros5"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;
	}

    static public function mdlActualizarServicioIncidenciaPlomeria($tabla,$datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET
																destape = :destape, reparacion = :reparacion, otros = :otros, instalacion = :instalacion, inspeccion = :inspeccion, detalle_servicio_regulares = :detalle_servicio_regulares,
																banos = :banos, cocina = :cocina, otros1 = :otros1, trampas = :trampas, drenaje = :drenaje, detalle_servicio_realizado = :detalle_servicio_realizado, inspeccion_cctv = :inspeccion_cctv,
																inspeccion_cctv_num = :inspeccion_cctv_num, limpieza_tuberia = :limpieza_tuberia, limpieza_tuberia_num = :limpieza_tuberia_num, inpeccion_controles = :inpeccion_controles,
																reparacion_controles = :reparacion_controles, limpieza_desagues = :limpieza_desagues, limpieza_desagues_num = :limpieza_desagues_num, limpieza_desagues_registro = :limpieza_desagues_registro,
																limpieza_derrame = :limpieza_derrame, detalle_servicios_especiales = :detalle_servicios_especiales, k1 = :k1, k2 = :k2, water = :water, soplete = :soplete, fuete = :fuete, otros2 = :otros2,
																equipo_seguridad = :equipo_seguridad, cover = :cover, guantes = :guantes, botas = :botas, capacete = :capacete, camara = :camara, detalle_equipos_utilizados = :detalle_equipos_utilizados,
																comentario = :comentario, tecnico_adicional = :tecnico_adicional, titulo = :titulo, nombre_letra_molde = :nombre_letra_molde, productos = :productos
											  WHERE servicio_plomeria.id_incidencia = :id_incidencia");

        $stmt->bindParam(":id_incidencia", $datos["id_incidencia"], PDO::PARAM_INT);

        $stmt->bindParam(":destape", $datos["destape"], PDO::PARAM_STR);
        $stmt->bindParam(":reparacion", $datos["reparacion"], PDO::PARAM_STR);
        $stmt->bindParam(":otros", $datos["otros"], PDO::PARAM_STR);
        $stmt->bindParam(":instalacion", $datos["instalacion"], PDO::PARAM_STR);
        $stmt->bindParam(":inspeccion", $datos["inspeccion"], PDO::PARAM_STR);
        $stmt->bindParam(":detalle_servicio_regulares", $datos["detalle_servicio_regulares"], PDO::PARAM_STR);
        $stmt->bindParam(":banos", $datos["banos"], PDO::PARAM_STR);
        $stmt->bindParam(":cocina", $datos["cocina"], PDO::PARAM_STR);
        $stmt->bindParam(":otros1", $datos["otros1"], PDO::PARAM_STR);
        $stmt->bindParam(":trampas", $datos["trampas"], PDO::PARAM_STR);
        $stmt->bindParam(":drenaje", $datos["drenaje"], PDO::PARAM_STR);
        $stmt->bindParam(":detalle_servicio_realizado", $datos["detalle_servicio_realizado"], PDO::PARAM_STR);
        $stmt->bindParam(":inspeccion_cctv", $datos["inspeccion_cctv"], PDO::PARAM_STR);
        $stmt->bindParam(":inspeccion_cctv_num", $datos["inspeccion_cctv_num"], PDO::PARAM_STR);
        $stmt->bindParam(":limpieza_tuberia", $datos["limpieza_tuberia"], PDO::PARAM_STR);
        $stmt->bindParam(":limpieza_tuberia_num", $datos["limpieza_tuberia_num"], PDO::PARAM_STR);
        $stmt->bindParam(":inpeccion_controles", $datos["inpeccion_controles"], PDO::PARAM_STR);
        $stmt->bindParam(":reparacion_controles", $datos["reparacion_controles"], PDO::PARAM_STR);
        $stmt->bindParam(":limpieza_desagues", $datos["limpieza_desagues"], PDO::PARAM_STR);
        $stmt->bindParam(":limpieza_desagues_num", $datos["limpieza_desagues_num"], PDO::PARAM_STR);
        $stmt->bindParam(":limpieza_desagues_registro", $datos["limpieza_desagues_registro"], PDO::PARAM_STR);
        $stmt->bindParam(":limpieza_derrame", $datos["limpieza_derrame"], PDO::PARAM_STR);
        $stmt->bindParam(":detalle_servicios_especiales", $datos["detalle_servicios_especiales"], PDO::PARAM_STR);
        $stmt->bindParam(":k1", $datos["k1"], PDO::PARAM_STR);
        $stmt->bindParam(":k2", $datos["k2"], PDO::PARAM_STR);
        $stmt->bindParam(":water", $datos["water"], PDO::PARAM_STR);
        $stmt->bindParam(":soplete", $datos["soplete"], PDO::PARAM_STR);
        $stmt->bindParam(":fuete", $datos["fuete"], PDO::PARAM_STR);
        $stmt->bindParam(":otros2", $datos["otros2"], PDO::PARAM_STR);
        $stmt->bindParam(":equipo_seguridad", $datos["equipo_seguridad"], PDO::PARAM_STR);
        $stmt->bindParam(":cover", $datos["cover"], PDO::PARAM_STR);
        $stmt->bindParam(":guantes", $datos["guantes"], PDO::PARAM_STR);
        $stmt->bindParam(":botas", $datos["botas"], PDO::PARAM_STR);
        $stmt->bindParam(":capacete", $datos["capacete"], PDO::PARAM_STR);
        $stmt->bindParam(":camara", $datos["camara"], PDO::PARAM_STR);
        $stmt->bindParam(":detalle_equipos_utilizados", $datos["detalle_equipos_utilizados"], PDO::PARAM_STR);
        $stmt->bindParam(":comentario", $datos["comentario"], PDO::PARAM_STR);
        $stmt->bindParam(":tecnico_adicional", $datos["tecnico_adicional"], PDO::PARAM_STR);
        $stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre_letra_molde", $datos["nombre_letra_molde"], PDO::PARAM_STR);
		$stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);



        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt->close();
        $stmt = null;
    }

    static public function mdlRegistrarServicioIncidenciaPlomeria($tabla,$datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla
														(id_incidencia,destape,reparacion,otros,instalacion,inspeccion,detalle_servicio_regulares,banos,cocina,otros1,trampas,drenaje,detalle_servicio_realizado,inspeccion_cctv,inspeccion_cctv_num,limpieza_tuberia,
														 limpieza_tuberia_num,inpeccion_controles,reparacion_controles,limpieza_desagues,limpieza_desagues_num,limpieza_desagues_registro,limpieza_derrame,detalle_servicios_especiales,k1,k2,water,soplete,fuete,otros2,
													     equipo_seguridad,cover,guantes,botas,capacete,camara,detalle_equipos_utilizados,comentario,tecnico_adicional,titulo,nombre_letra_molde,hora_entrada,hora_salida,productos)
													  VALUES
													  	(:id_incidencia,:destape,:reparacion,:otros,:instalacion,:inspeccion,:detalle_servicio_regulares,:banos,:cocina,:otros1,:trampas,:drenaje,:detalle_servicio_realizado,:inspeccion_cctv,:inspeccion_cctv_num,:limpieza_tuberia,
														 :limpieza_tuberia_num,:inpeccion_controles,:reparacion_controles,:limpieza_desagues,:limpieza_desagues_num,:limpieza_desagues_registro,:limpieza_derrame,:detalle_servicios_especiales,:k1,:k2,:water,:soplete,:fuete,:otros2,
													     :equipo_seguridad,:cover,:guantes,:botas,:capacete,:camara,:detalle_equipos_utilizados,:comentario,:tecnico_adicional,:titulo,:nombre_letra_molde,:hora_entrada,:hora_salida,:productos)");

		$stmt->bindParam(":id_incidencia", $datos["id_incidencia"], PDO::PARAM_INT);

		$stmt->bindParam(":destape", $datos["destape"], PDO::PARAM_STR);
		$stmt->bindParam(":reparacion", $datos["reparacion"], PDO::PARAM_STR);
		$stmt->bindParam(":otros", $datos["otros"], PDO::PARAM_STR);
		$stmt->bindParam(":instalacion", $datos["instalacion"], PDO::PARAM_STR);
		$stmt->bindParam(":inspeccion", $datos["inspeccion"], PDO::PARAM_STR);
		$stmt->bindParam(":detalle_servicio_regulares", $datos["detalle_servicio_regulares"], PDO::PARAM_STR);
		$stmt->bindParam(":banos", $datos["banos"], PDO::PARAM_STR);
		$stmt->bindParam(":cocina", $datos["cocina"], PDO::PARAM_STR);
		$stmt->bindParam(":otros1", $datos["otros1"], PDO::PARAM_STR);
		$stmt->bindParam(":trampas", $datos["trampas"], PDO::PARAM_STR);
		$stmt->bindParam(":drenaje", $datos["drenaje"], PDO::PARAM_STR);
		$stmt->bindParam(":detalle_servicio_realizado", $datos["detalle_servicio_realizado"], PDO::PARAM_STR);
		$stmt->bindParam(":inspeccion_cctv", $datos["inspeccion_cctv"], PDO::PARAM_STR);
		$stmt->bindParam(":inspeccion_cctv_num", $datos["inspeccion_cctv_num"], PDO::PARAM_STR);
		$stmt->bindParam(":limpieza_tuberia", $datos["limpieza_tuberia"], PDO::PARAM_STR);
		$stmt->bindParam(":limpieza_tuberia_num", $datos["limpieza_tuberia_num"], PDO::PARAM_STR);
		$stmt->bindParam(":inpeccion_controles", $datos["inpeccion_controles"], PDO::PARAM_STR);
		$stmt->bindParam(":reparacion_controles", $datos["reparacion_controles"], PDO::PARAM_STR);
		$stmt->bindParam(":limpieza_desagues", $datos["limpieza_desagues"], PDO::PARAM_STR);
		$stmt->bindParam(":limpieza_desagues_num", $datos["limpieza_desagues_num"], PDO::PARAM_STR);
		$stmt->bindParam(":limpieza_desagues_registro", $datos["limpieza_desagues_registro"], PDO::PARAM_STR);
		$stmt->bindParam(":limpieza_derrame", $datos["limpieza_derrame"], PDO::PARAM_STR);
		$stmt->bindParam(":detalle_servicios_especiales", $datos["detalle_servicios_especiales"], PDO::PARAM_STR);
		$stmt->bindParam(":k1", $datos["k1"], PDO::PARAM_STR);
		$stmt->bindParam(":k2", $datos["k2"], PDO::PARAM_STR);
		$stmt->bindParam(":water", $datos["water"], PDO::PARAM_STR);
		$stmt->bindParam(":soplete", $datos["soplete"], PDO::PARAM_STR);
		$stmt->bindParam(":fuete", $datos["fuete"], PDO::PARAM_STR);
		$stmt->bindParam(":otros2", $datos["otros2"], PDO::PARAM_STR);
		$stmt->bindParam(":equipo_seguridad", $datos["equipo_seguridad"], PDO::PARAM_STR);
		$stmt->bindParam(":cover", $datos["cover"], PDO::PARAM_STR);
		$stmt->bindParam(":guantes", $datos["guantes"], PDO::PARAM_STR);
		$stmt->bindParam(":botas", $datos["botas"], PDO::PARAM_STR);
		$stmt->bindParam(":capacete", $datos["capacete"], PDO::PARAM_STR);
		$stmt->bindParam(":camara", $datos["camara"], PDO::PARAM_STR);
		$stmt->bindParam(":detalle_equipos_utilizados", $datos["detalle_equipos_utilizados"], PDO::PARAM_STR);
		$stmt->bindParam(":comentario", $datos["comentario"], PDO::PARAM_STR);
		$stmt->bindParam(":tecnico_adicional", $datos["tecnico_adicional"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_letra_molde", $datos["nombre_letra_molde"], PDO::PARAM_STR);
		$stmt->bindParam(":hora_entrada", $datos["hora_entrada"], PDO::PARAM_STR);
		$stmt->bindParam(":hora_salida", $datos["hora_salida"], PDO::PARAM_STR);
		$stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);


        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt->close();
        $stmt = null;
    }

	static public function mdlRegistrarServicioIncidencia($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla
														(id_incidencia,vaciado,vaciado_parcial,otros,limpeza_regular,inspeccion,interceptor_aceite,tanque_almacenamiento,pozo_septico,
														 estacion_bombas,tanque_recibidor,tanque_aceites,otros1,interior,exterior,interior_exterior,limpieza_derrame_liquido,limpieza_manhole,
														 limpieza_lift_station,limpieza_tuberias,limpieza_registros_desagues,limpieza_registros_num,limpieza_desagues_num,remocion_acarreo,remocion_grasas,
														 otros2,vacuum,vacuumNum,vacuum_portable,water_jetter,tanktruck,otros3,coverAll,guantes,capacete,equipo_espacio_confinado,comentario,desechos_liquidos,
														 aguas_residuales,aceites_vegetales,otros4,total_desperciado,tecnico_adicional,hora_entrada,hora_salida,limpieza_tuberias_num,planta_tratamiento,otra_facilidad, otros5)
													  VALUES
													  	(:id_incidencia,:vaciado,:vaciado_parcial,:otros,:limpeza_regular,:inspeccion,:interceptor_aceite,:tanque_almacenamiento,:pozo_septico,
													  	:estacion_bombas,:tanque_recibidor,:tanque_aceites,:otros1,:interior,:exterior,:interior_exterior,:limpieza_derrame_liquido,:limpieza_manhole,
													  	:limpieza_lift_station,:limpieza_tuberias,:limpieza_registros_desagues,:limpieza_registros_num,:limpieza_desagues_num,:remocion_acarreo,:remocion_grasas,
													  	:otros2,:vacuum,:vacuumNum,:vacuum_portable,:water_jetter,:tanktruck,:otros3,:coverAll,:guantes,:capacete,:equipo_espacio_confinado,:comentario,:desechos_liquidos,
													  	:aguas_residuales,:aceites_vegetales,:otros4,:total_desperciado,:tecnico_adicional,:hora_entrada,:hora_salida,:limpieza_tuberias_num,:planta_tratamiento,:otra_facilidad, :otros5)");

		$stmt->bindParam(":id_incidencia", $datos["id_incidencia"], PDO::PARAM_INT);
		$stmt->bindParam(":vaciado", $datos["vaciado"], PDO::PARAM_STR);
		$stmt->bindParam(":vaciado_parcial", $datos["vaciado_parcial"], PDO::PARAM_STR);
		$stmt->bindParam(":otros", $datos["otros"], PDO::PARAM_STR);
		$stmt->bindParam(":limpeza_regular", $datos["limpeza_regular"], PDO::PARAM_STR);
		$stmt->bindParam(":inspeccion", $datos["inspeccion"], PDO::PARAM_STR);
		$stmt->bindParam(":interceptor_aceite", $datos["interceptor_aceite"], PDO::PARAM_STR);
		$stmt->bindParam(":tanque_almacenamiento", $datos["tanque_almacenamiento"], PDO::PARAM_STR);
		$stmt->bindParam(":pozo_septico", $datos["pozo_septico"], PDO::PARAM_STR);
		$stmt->bindParam(":estacion_bombas", $datos["estacion_bombas"], PDO::PARAM_STR);
		$stmt->bindParam(":tanque_recibidor", $datos["tanque_recibidor"], PDO::PARAM_STR);
		$stmt->bindParam(":tanque_aceites", $datos["tanque_aceites"], PDO::PARAM_STR);
		$stmt->bindParam(":otros1", $datos["otros1"], PDO::PARAM_STR);
		$stmt->bindParam(":interior", $datos["interior"], PDO::PARAM_STR);
		$stmt->bindParam(":exterior", $datos["exterior"], PDO::PARAM_STR);
		$stmt->bindParam(":interior_exterior", $datos["interior_exterior"], PDO::PARAM_STR);
		$stmt->bindParam(":limpieza_derrame_liquido", $datos["limpieza_derrame_liquido"], PDO::PARAM_STR);
		$stmt->bindParam(":limpieza_manhole", $datos["limpieza_manhole"], PDO::PARAM_STR);
		$stmt->bindParam(":limpieza_lift_station", $datos["limpieza_lift_station"], PDO::PARAM_STR);
		$stmt->bindParam(":limpieza_tuberias", $datos["limpieza_tuberias"], PDO::PARAM_STR);
		$stmt->bindParam(":limpieza_tuberias_num", $datos["limpieza_tuberias_num"], PDO::PARAM_STR);
		$stmt->bindParam(":limpieza_registros_desagues", $datos["limpieza_registros_desagues"], PDO::PARAM_STR);
		$stmt->bindParam(":limpieza_registros_num", $datos["limpieza_registros_num"], PDO::PARAM_STR);
		$stmt->bindParam(":limpieza_desagues_num", $datos["limpieza_desagues_num"], PDO::PARAM_STR);
		$stmt->bindParam(":remocion_acarreo", $datos["remocion_acarreo"], PDO::PARAM_STR);
		$stmt->bindParam(":remocion_grasas", $datos["remocion_grasas"], PDO::PARAM_STR);
		$stmt->bindParam(":otros2", $datos["otros2"], PDO::PARAM_STR);
		$stmt->bindParam(":vacuum", $datos["vacuum"], PDO::PARAM_STR);
		$stmt->bindParam(":vacuumNum", $datos["vacuumNum"], PDO::PARAM_STR);
		$stmt->bindParam(":vacuum_portable", $datos["vacuum_portable"], PDO::PARAM_STR);
		$stmt->bindParam(":water_jetter", $datos["water_jetter"], PDO::PARAM_STR);
		$stmt->bindParam(":tanktruck", $datos["tanktruck"], PDO::PARAM_STR);
		$stmt->bindParam(":otros3", $datos["otros3"], PDO::PARAM_STR);
		$stmt->bindParam(":coverAll", $datos["coverAll"], PDO::PARAM_STR);
		$stmt->bindParam(":guantes", $datos["guantes"], PDO::PARAM_STR);
		$stmt->bindParam(":capacete", $datos["capacete"], PDO::PARAM_STR);
		$stmt->bindParam(":equipo_espacio_confinado", $datos["equipo_espacio_confinado"], PDO::PARAM_STR);
		$stmt->bindParam(":comentario", $datos["comentario"], PDO::PARAM_STR);
		$stmt->bindParam(":desechos_liquidos", $datos["desechos_liquidos"], PDO::PARAM_STR);
		$stmt->bindParam(":aguas_residuales", $datos["aguas_residuales"], PDO::PARAM_STR);
		$stmt->bindParam(":aceites_vegetales", $datos["aceites_vegetales"], PDO::PARAM_STR);
		$stmt->bindParam(":otros4", $datos["otros4"], PDO::PARAM_STR);
		$stmt->bindParam(":total_desperciado", $datos["total_desperciado"], PDO::PARAM_STR);
		$stmt->bindParam(":tecnico_adicional", $datos["tecnico_adicional"], PDO::PARAM_STR);
		$stmt->bindParam(":hora_entrada", $datos["hora_entrada"], PDO::PARAM_STR);
		$stmt->bindParam(":hora_salida", $datos["hora_salida"], PDO::PARAM_STR);
		$stmt->bindParam(":planta_tratamiento", $datos["planta_tratamiento"], PDO::PARAM_STR);
		$stmt->bindParam(":otra_facilidad", $datos["otra_facilidad"], PDO::PARAM_STR);
		$stmt->bindParam(":otros5", $datos["otros5"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;
	}

	static public function mdlMostrarServicio($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
	}

	static public function mdlMostrarIncidenciasEventos($tabla,$id_usuario,$perfil){

		if($perfil == "Administrador"){

			$stmt = Conexion::conectar()->prepare("SELECT id,fecha_visita as start, asunto as title, tipo_servicio,
                                                                case when estatus_incidencia = 0 then '#00CED1' ELSE
                                                                case when estatus_incidencia = 1 then ' #FFFF00' ELSE '#C0C0C0'  end END  AS color 
                                                              FROM $tabla");

		}elseif($perfil == "Tecnico"){

			$stmt = Conexion::conectar()->prepare("SELECT id,fecha_visita as start, asunto as title, tipo_servicio,
                                                                case when estatus_incidencia = 0 then '#00CED1' ELSE
                                                                case when estatus_incidencia = 1 then ' #FFFF00' ELSE '#C0C0C0'  end END  AS color 
                                                              FROM $tabla WHERE id_tecnico = :id ");

			$stmt -> bindParam(":id", $id_usuario, PDO::PARAM_STR);
		}else{
            $stmt = Conexion::conectar()->prepare("SELECT id,fecha_visita as start, asunto as title, tipo_servicio, 
                                                                case when estatus_incidencia = 0 then '#00CED1' ELSE
                                                                case when estatus_incidencia = 1 then ' #FFFF00' ELSE '#C0C0C0'  end END  AS color 
                                                              FROM $tabla WHERE id_cliente = :id ");

            $stmt -> bindParam(":id", $id_usuario, PDO::PARAM_STR);
        }


		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;
	}

	static public function mdlActualizarOpciones($tabla,$item,$valor,$id_incidencias){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  $item= :$item WHERE id in($id_incidencias)");

		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;
	}

	static public function mdlActualizarOpcionesTecnico($tabla,$item,$valor,$id_incidencias,$estatus){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  $item= :$item, estatus = :estatus WHERE id in($id_incidencias)");

		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt->bindParam(":estatus", $estatus, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;
	}

	static public function mdlBuscarArchivosDuplicados($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE titulo = :titulo ");

		$stmt -> bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;
	}

	static public function mdlBuscarServicioAnterior($tabla,$id_cliente,$tipo_servicio){

        $stmt = Conexion::conectar()->prepare("SELECT count(*) cant
                                                                FROM $tabla
                                                                WHERE id_cliente= :id_cliente and tipo_servicio = :tipo_servicio and fecha_visita BETWEEN CURDATE() - INTERVAL 30 DAY AND SYSDATE()");

        $stmt -> bindParam(":id_cliente", $id_cliente, PDO::PARAM_STR);

        $stmt -> bindParam(":tipo_servicio", $tipo_servicio, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;
    }

    /*=============================================
	ELIMINAR INCIDENCIA X LOTE
	======================= ======================*/

    static public function mdlEliminarIncidenciaxLote($tabla, $valor){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id in($valor)");

        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;

    }

    static public function mdlAprobarIncidencias($tabla,$incidencias,$id_usuario_aprob){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  aprobado= 1, nombre_usuario_aprobado = :nombre_usuario_aprobado WHERE id in($incidencias)");

        $stmt->bindParam(":nombre_usuario_aprobado", $id_usuario_aprob, PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt->close();
        $stmt = null;
    }

    static public function mdlShowDatosUsuarioXincidencia($incidencias){

        $stmt = Conexion::conectar()->prepare("SELECT i.id AS id_incidencia, i.tipo_servicio,c.* FROM incidencias i INNER JOIN clientes c ON c.id = i.id_cliente WHERE i.id in($incidencias)");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;

    }

}