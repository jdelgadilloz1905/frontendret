<?php
/**
 * Created by PhpStorm.
 * User: jorge delgadillo
 * Date: 13/04/2019
 * Time: 08:31
 */

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxListaTecnico{

    public function ajaxMostrarListaTecnico(){

        $item = "perfil";
        $valor = "Tecnico";

        $respuesta = ControladorUsuarios::ctrListaUsuariosFiltro($item,$valor);

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


$lista = new AjaxListaTecnico();
$lista->ajaxMostrarListaTecnico();
?>