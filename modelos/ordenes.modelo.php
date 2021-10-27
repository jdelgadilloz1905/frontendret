<?php
/**
 * Created by PhpStorm.
 * User: jorge delgadillo
 * Date: 13/06/2019
 * Time: 22:52
 */

require_once "conexion.php";

class ModeloOrdenes{

    static public function mdlCrearOrden($tabla,$datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_proveedor,id_supervisor,productos,descripcion)
                                                VALUES (:id_proveedor,:id_supervisor,:productos,:descripcion)");

        $stmt->bindParam(":id_proveedor", $datos["id_proveedor"], PDO::PARAM_STR);
        $stmt->bindParam(":id_supervisor", $datos["id_supervisor"], PDO::PARAM_STR);
        $stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);

        if($stmt->execute()){

            //busco el ultimo id registrado
             $resultado = self::mdlMostrarUltimoId($tabla);

            return $resultado;
        }else{

            return "error";

        }

        $stmt->close();
        $stmt = null;
    }

    static public function mdlMostrarUltimoId($tabla){

        //busco el ultimo registro para aplicarlo en cada producto de entrada en la tabla movimiento
        $stmt = Conexion::conectar()->prepare("SELECT MAX(id) AS id FROM $tabla");

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
    MOSTRAR ORDENES
    =============================================*/
    static public function mdlMostrarOrdenes($tabla, $item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

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

    /*===================================
    MOSTRAR DETALLE DE LA COMPRA
    ====================================*/

    static public function mdlDetalleCompras($tabla,$idCompra){

        $stmt = Conexion::conectar()->prepare("SELECT m.*, p.descripcion
                                                FROM $tabla m
                                                LEFT JOIN productos p
                                                ON m.id_producto = p.id
                                                WHERE m.id_compra = :id_compra");

        $stmt -> bindParam(":id_compra", $idCompra, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;
    }
}