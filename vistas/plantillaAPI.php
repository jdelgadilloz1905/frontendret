<?php

$rutas = explode("/", $_GET["ruta"]);
$api = $rutas[1];

if(!empty($api)){
    include "modulos/api/".$api.".php";
}else{
    echo json_encode("archivo no existe");
}



?>