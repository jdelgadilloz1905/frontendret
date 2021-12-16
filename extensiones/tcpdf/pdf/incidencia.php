<?php

require_once "../../../controladores/incidencia.controlador.php";
require_once "../../../modelos/incidencia.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controladores/productos.controlador.php";
require_once "../../../modelos/productos.modelo.php";

class imprimirIncidencia{

    public $codigo;

    public function traerImpresionIncidencia(){

        //TRAEMOS LA INFORMACIÓN DE LA VENTA

        $itemIncidencia = "id";
        $valorIncidencia = $this->codigo;

        $incidencia = ControladorIncidencia::ctrMostrarIncidencias($itemIncidencia, $valorIncidencia);

        $listaCliente = ControladorClientes::ctrMostrarClientes(null,null);

        $listaVendedor = ControladorUsuarios::ctrListaUsuariosFiltro("perfil","Tecnico");

        //Busco el usuario quien creo la incidencia
        $datosUsuario = ControladorUsuarios::ctrMostrarUsuarios("id",$incidencia["id_usuario"]);

        //Busco los datos del cliente

        $datosCliente = ControladorClientes::ctrMostrarClientes("id",$incidencia["id_cliente"]);

        //Busco los datos del tecnico

        $datosTecnico = ControladorUsuarios::ctrMostrarUsuarios("id",$incidencia["id_tecnico"]);


        $id_incidencia = str_pad($valorIncidencia, 6, "0", STR_PAD_LEFT);

        switch($incidencia["tipo_servicio"]){
            case "plomeria":
                $tipoServicio = "Plomeria";
                break;
            case "recogido-de-liquido":
                $tipoServicio = "Recogido de liquido";
                break;
            case "limpieza-de-campana":
                $tipoServicio = "Limpieza de campana";
                break;
        }

        $nombreTecnico = ucwords($datosTecnico["nombre"]);

        //REQUERIMOS LA CLASE TCPDF

        require_once('tcpdf_include.php');

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->startPageGroup();

        $pdf->AddPage();

        // ---------------------------------------------------------

        $bloque1 = <<<EOF

        <table>
            <tr>
                <td style="width:150px"><img src="images/logo-negro-bloque.png"></td>

                <td style="background-color:white; width:140px">

                    <div style="font-size:8.5px; text-align:right; line-height:15px;">
                        <br>

                        <br>

                    </div>

                </td>

                <td style="background-color:white; width:140px">

                    <div style="font-size:8.5px; text-align:right; line-height:15px;">
                        <br>

                        <br>

                    </div>

                </td>

                <td style="background-color:white; width:110px; text-align:center; color:red"><br><br>SERVICIO Nº<br>$id_incidencia</td>
            </tr>
        </table>

EOF;


        $pdf->writeHTML($bloque1, false, false, false, false, '');

        // ---------------------------------------------------------

        // ---------------------------------------------------------

        $bloque2 = <<<EOF

        <table>
            <tr>
                <td style="width:540px"><img src="images/back.jpg"></td>

            </tr>
        </table>

        <table style="font-size:10px; padding:5px 10px;">

            <tr>

            <td style="border: 1px solid #666; background-color:white; width:390px">Supervisor: $datosUsuario[nombre]</td>
            <td style="border: 1px solid #666; background-color:white; width:150px; text-align:right">Fecha Visita:
            $incidencia[fecha_visita]</td>

            </tr>

            <tr>

            <td style="border: 1px solid #666; background-color:white; width:340px">Grupo: $datosCliente[alias]</td>

            <td style="border: 1px solid #666; background-color:white; width:200px; text-align:right">Tipo de Servicio:
            $tipoServicio</td>

            </tr>

            <tr>

            <td style="border: 1px solid #666; background-color:white; width:540px">Dirección: $incidencia[direccion]</td>

            </tr>

            <tr>

            <td style="border: 1px solid #666; background-color:white; width:390px">Asunto: $incidencia[asunto]</td>
            <td style="border: 1px solid #666; background-color:white; width:150px; text-align:right">Prioridad:
            $incidencia[prioridad]</td>

            </tr>

            <tr>

            <td style="border: 1px solid #666; background-color:white; width:540px">Técnico: $nombreTecnico</td>

            </tr>

            <tr>

            <td style="border: 1px solid #666; background-color:white; width:540px">Descripción: <br>$incidencia[descripcion]</td>


            </tr>



        </table>

EOF;

        $pdf->writeHTML($bloque2, false, false, false, false, '');

        // ---------------------------------------------------------
        //SALIDA DEL ARCHIVO

        $pdf->Output('incidencia'.$_GET["codigo"].'.pdf');

    }

}

$a = new imprimirIncidencia();
$a -> codigo = $_GET["codigo"];
$a -> traerImpresionIncidencia();

?>
 