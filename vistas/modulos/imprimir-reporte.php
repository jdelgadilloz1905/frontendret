<?php

require_once "../../controladores/incidencia.controlador.php";
require_once "../../modelos/incidencia.modelo.php";
require_once "../../controladores/clientes.controlador.php";
require_once "../../modelos/clientes.modelo.php";
require_once "../../controladores/usuarios.controlador.php";
require_once "../../modelos/usuarios.modelo.php";

$reporte = new ControladorIncidencia();
$reporte -> ctrImprimirReporte();

