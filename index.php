<?php

/*=============================
    CONTROLADORES
===============================*/
require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/proveedores.controlador.php";
require_once "controladores/incidencia.controlador.php";
require_once "controladores/class.fileuploader.php";
require_once "controladores/ordenes.controlador.php";
require_once "controladores/grupo.controlador.php";
require_once "controladores/ruta.controlador.php";
require_once "controladores/signature-to-image.php";

/*=============================
    MODELOS
===============================*/
require_once "modelos/usuarios.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/proveedores.modelo.php";
require_once "modelos/incidencia.modelo.php";
require_once "modelos/ordenes.modelo.php";
require_once "modelos/ruta.php";
require_once "modelos/grupo.modelo.php";
require_once "modelos/ruta.modelo.php";

/*=============================
    EXTENSIONES
===============================*/
require_once "extensiones/PHPMailer/PHPMailerAutoload.php";
require_once "extensiones/vendor/autoload.php";

$plantilla = new ControladorPlantilla();

if(isset($_GET["ruta"])){

    $rutas = explode("/", $_GET["ruta"]);
    if($rutas[0]=="apiRet"){
        $plantilla -> ctrPlantillaAPI();
    }else{
        $plantilla -> ctrPlantilla();
    }

}else{

    $plantilla -> ctrPlantilla();
}
