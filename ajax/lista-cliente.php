<?php
/**
 * Created by PhpStorm.
 * User: jorge delgadillo
 * Date: 13/04/2019
 * Time: 08:31
 */

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxListaCliente{

    public function ajaxMostrarListaCliente(){

        $respuesta = ControladorClientes::ctrMostrarClientes(null,null);

        $datosJson = '[';

        for($i = 0; $i < count($respuesta); $i++){


            $datosJson .= '{
                                  "team":"'.$respuesta[$i]["nombre"].'"
                                },';

        }
        $datosJson = substr($datosJson, 0, -1);

        $datosJson.=  '

		                ]';

        echo $datosJson;

    }
}


$lista = new AjaxListaCliente();
$lista->ajaxMostrarListaCliente();
?>