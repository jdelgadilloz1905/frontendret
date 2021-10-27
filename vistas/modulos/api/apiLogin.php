<?php
/**
 * Created by PhpStorm.
 * User: JORGE DELGADILLO
 * Date: 26/11/2019
 * Time: 01:43 PM
 */


$json = file_get_contents('php://input');

// decodifica el JSON recibido y lo almacena en la variable $obj

//echo json_encode(var_dump($obj));
if($obj['funcion']=="validarLogin"){
    $password = $obj['password'];
    $usuario = strtolower($obj['usuario']);
    $dispo = $obj['dispositivo'];

    if(preg_match('/^[a-zA-Z0-9]+$/', $usuario) &&
        preg_match('/^[a-zA-Z0-9.,]+$/', $password)){

        $encriptar = crypt($password, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

        $tabla = "usuarios";

        $item = "usuario";
        $valor = $usuario;

        $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

        if($respuesta["usuario"] == $usuario && $respuesta["password"] == $encriptar){

            if($respuesta["estado"] == 1){

                $resultado = array(
                    "isLogged" => true,
                    "id" =>$respuesta["id"],
                    "nombre" =>$respuesta["nombre"],
                    "usuario" =>$respuesta["usuario"],
                    "foto" =>$respuesta["foto"],
                    "perfil" =>$respuesta["perfil"],
                    "id_grupo" =>$respuesta["id_grupo"],
                    "id_cliente" =>$respuesta["id_cliente"]
                );

                /*=============================================
                REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
                =============================================*/

                date_default_timezone_set('America/Bogota');

                $fecha = date('Y-m-d');
                $hora = date('H:i:s');

                $fechaActual = $fecha.' '.$hora;

                $item1 = "ultimo_login";
                $valor1 = $fechaActual;

                $item2 = "id";
                $valor2 = $respuesta["id"];

                $ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2,$dispo);

                echo json_encode($resultado);

            }else{

                echo json_encode(array(
                    "isLogged" => false,
                    "mensaje" =>"El usuario aún no está activado"
                ));


            }

        }else{

            echo json_encode(array(
                "isLogged" => false,
                "mensaje" =>"Error al ingresar, vuelve a intentarlo"
            ));

        }

    }
}

if($obj['funcion']=="cambiarNombre"){

    $id = $obj['id'];
    $nombre = $obj['nombre'];
    $dispo =  $obj['dispositivo'];
    if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $nombre)){

        $item1 = "nombre";
        $valor1 = $nombre;

        $item2 = "id";
        $valor2 = $id;

        $respuesta = ModeloUsuarios::mdlActualizarUsuario("usuarios", $item1, $valor1, $item2, $valor2,$dispo);

        if($respuesta =="ok"){
            echo json_encode(array(
                "mensaje" =>"¡El nombre no puede ir vacío o llevar caracteres especiales!",
                "resultado" =>"ok"
            ));
        }else{
            echo json_encode(array(
                "mensaje" =>"¡Error actualizando los datos, intente mas tarde!",
                "resultado" =>"error"
            ));
        }
    }else{
        echo json_encode(array(
            "mensaje" =>"¡El nombre no puede ir vacío o llevar caracteres especiales!",
            "resultado" =>"error"
        ));

    }


}
if($obj['funcion']=="cambiarUsuario"){

    $id = $obj['id'];
    $usuario = $obj['usuario'];

    $id = $obj['id'];
    $usuario = $obj['usuario'];
    $dispo =  $obj['dispositivo'];
    if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $usuario)){

        $item1 = "usuario";
        $valor1 = $usuario;

        $item2 = "id";
        $valor2 = $id;

        $respuesta = ModeloUsuarios::mdlActualizarUsuario("usuarios", $item1, $valor1, $item2, $valor2,$dispo);

        if($respuesta =="ok"){
            echo json_encode(array(
                "mensaje" =>"¡El usuario no puede ir vacío o llevar caracteres especiales!",
                "resultado" =>"ok"
            ));
        }else{
            echo json_encode(array(
                "mensaje" =>"¡Error actualizando los datos, intente mas tarde!",
                "resultado" =>"error"
            ));
        }
    }else{
        echo json_encode(array(
            "mensaje" =>"¡El usuario no puede ir vacío o llevar caracteres especiales!",
            "resultado" =>"error"
        ));

    }
}

if($obj['funcion']=="cambiarClave"){

    $id = $obj['id'];
    $password = $obj['password'];
    $dispo =  $obj['dispositivo'];

    if(preg_match('/^[a-zA-Z0-9.,]+$/', $password)){

        $encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

        $item1 = "password";
        $valor1 = $encriptar;

        $item2 = "id";
        $valor2 = $id;

        $respuesta = ModeloUsuarios::mdlActualizarUsuario("usuarios", $item1, $valor1, $item2, $valor2,$dispo);

        if($respuesta =="ok"){
            echo json_encode(array(
                "mensaje" =>"¡La contraseña no puede ir vacío o llevar caracteres especiales!",
                "resultado" =>"ok"
            ));
        }else{
            echo json_encode(array(
                "mensaje" =>"¡Error actualizando los datos, intente mas tarde!",
                "resultado" =>"error"
            ));
        }
    }else{
        echo json_encode(array(
            "mensaje" =>"¡La contraseña no puede ir vacío o llevar caracteres especiales!",
            "resultado" =>"error"
        ));
    }

    //actualizar el nombre del usuario

}


