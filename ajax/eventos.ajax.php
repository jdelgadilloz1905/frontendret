<?php

require_once "../controladores/incidencia.controlador.php";
require_once "../modelos/incidencia.modelo.php";

class AjaxEventos{

    public $id_usuario;
    public $perfil;

    public function ajaxMostrarIncidencias(){

        $tabla= "incidencias";

        $respuesta = ModeloIncidencia::mdlMostrarIncidenciasEventos($tabla,$this->id_usuario,$this->perfil);

        //$datosJson = '[';
        $datosJson="";
        for($i = 0; $i < count($respuesta); $i++){

            $datosJson .= '{
			      "'.$respuesta[$i]["id"].'",
			      "'.$respuesta[$i]["fecha_creacion"].'",
			      "'.$respuesta[$i]["asunto"].'"
			    },';
            echo $respuesta[1]["asunto"];

            //echo $datosJson;
        }

        //$datosJson = substr($datosJson, 0, -1);

        //$datosJson.=  ']';

        //echo $datosJson;

        //echo json_encode($respuesta);
    }

}

if(isset($_POST["id_usuario_Calendar"])){

    $eventos = new AjaxEventos();
    $eventos->id_usuario = $_POST["id_usuario_Calendar"];
    $eventos->perfil = $_POST["perfil"];
    $eventos->ajaxMostrarIncidencias();

}

/*
 $datosJson = '{

			"data": [';

      for($i = 0; $i < count($productos); $i++){

          if($productos[$i]['tipo'] == "venta"){

              if($productos[$i]['stock'] <= 10) {

                  $stock = "<div class='btn-group'><button class='btn btn-danger limiteStock'>".$productos[$i]['stock']."</button></div>";

              }elseif($productos[$i]['stock'] >11 && $productos[$i]['stock'] <= 15){

                  $stock = "<div class='btn-group'><button class='btn btn-warning limiteStock'>".$productos[$i]['stock']."</button></div>";

              }else{

                  $stock = "<div class='btn-group'><button class='btn btn-success limiteStock'>".$productos[$i]['stock']."</button></div>";
              }

          }else{

              $stock = "<div class='btn-group'><button class='btn btn-secondary '>".$productos[$i]['stock']."</button></div>";
          }

          $imagen = "<img src=".$productos[$i]['imagen']." class='img-thumbnail imgTabla' width='60px'>";

          $acciones = "<div class='btn-group'><button class='btn btn-primary agregarProductoOrden recuperarBoton' idProducto='".$productos[$i]['id']."'>Agregar</button></div>";


          $datosJson .= '[
			      "'.($i+1).'",
			      "'.$imagen.'",
			      "'.$productos[$i]["codigo"].'",
			      "'.$productos[$i]["descripcion"].'",
			      "'.$stock.'",
			      "'.$acciones.'"
			    ],';

      }
      $datosJson = substr($datosJson, 0, -1);

      $datosJson.=  ']

		}';

      echo $datosJson;
 * */