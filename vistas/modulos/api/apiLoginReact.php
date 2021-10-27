<?php
/**
 * Created by PhpStorm.
 * User: JORGE DELGADILLO
 * Date: 26/11/2019
 * Time: 01:43 PM
 */

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods:  POST, GET');


$json = file_get_contents('php://input',true);


// decodifica el JSON recibido y lo almacena en la variable $obj
$obj = json_decode($json,true);

if($obj['funcion']=="validarLoginPrueba"){
    $password = $obj['password'];
    $usuario = strtolower($obj['usuario']);


    if(preg_match('/^[a-zA-Z0-9.,]+$/', $password)){

        $encriptar = crypt($password, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

        $tabla = "usuarios_react";

        $item = "usuario";
        $item1 = "email";
        $valor = $usuario;

        $respuesta = ModeloUsuarios::MdlMostrarUsuariosReact($tabla, $item,$item1, $valor);

        if(($respuesta["usuario"] == $usuario || $respuesta["email"] == $usuario) && $respuesta["password"] == $encriptar){

                $resultado = array(
                    "id" =>$respuesta["id"],
                    "nombres" =>$respuesta["nombres"],
                    "usuario" =>$respuesta["usuario"],
                    "email" =>$respuesta["email"],
                    "tipo" =>$respuesta["tipo"],
                    "is_logged" =>1
                );

                /*=============================================
                ACTUALIZO EL LOGUE A ACTIVO
                =============================================*/
                $item = "is_logged";
                $valor = 1;

                $item1 = "id";
                $valor1 = $respuesta["id"];

                $ultimoLogin = ModeloUsuarios::mdlActualizarUsuarioReact($tabla, $item, $valor,$item1, $valor1);

                echo json_encode($respuesta);


        }else{

            echo json_encode(array(
                "isLogged" => false,
                "mensaje" =>"Error al ingresar, vuelve a intentarlo"
            ));

        }

    }
}


