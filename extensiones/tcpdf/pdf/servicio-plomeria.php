<?php

require_once "../../../controladores/incidencia.controlador.php";
require_once "../../../modelos/incidencia.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controladores/productos.controlador.php";
require_once "../../../modelos/productos.modelo.php";

require_once "../../../modelos/ruta.php";

class imprimirServicioPlomeria{

    public $codigo;

    public function traerImpresionServicioPlomeria(){

    //TRAEMOS LA INFORMACIÓN DEL SERVICIO PLOMERIA

    $itemIncidencia = "id";
        $id_incidencia = $this->codigo;

        $incidencia = ControladorIncidencia::ctrMostrarIncidencias("id",$id_incidencia);
//Busco el usuario quien creo la incidencia
        $datosUsuario = ControladorUsuarios::ctrMostrarUsuarios("id",$incidencia["id_usuario"]);
//Busco los datos del cliente
        $datosCliente = ControladorClientes::ctrMostrarClientes("id",$incidencia["id_cliente"]);
//Busco los datos del tecnico
        $datosTecnico = ControladorUsuarios::ctrMostrarUsuarios("id",$incidencia["id_tecnico"]);

        $listaVendedor = ControladorUsuarios::ctrListaUsuariosFiltro("perfil","Tecnico");

//BUSCO EL SERVICIO DE LA INCIDENCIA

        $servicio = ControladorIncidencia::ctrMostrarServicio("servicio_plomeria","id_incidencia",$id_incidencia);

        $url = Ruta::ctrRuta();
        $idIncidencia = $id_incidencia;
    $id_incidencia = str_pad($id_incidencia, 6, "0", STR_PAD_LEFT);

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

        $nombre_tecnicos='';
        foreach ($listaVendedor as $key => $value) {

            $pos = strpos($servicio["tecnico_adicional"],$value["id"]);

            if($pos == true ){
                $nombre_tecnicos .= $value["nombre"].", ";
            }
        }

        $destape=$servicio["destape"] == "on" ? "checked" : "";
        $reparacion=$servicio["reparacion"] == "on" ? "checked" : "";
        $otros=$servicio["otros"] == "on" ? "checked" : "";
        $instalacion=$servicio["instalacion"] == "on" ? "checked" : "";
        $inspeccion=$servicio["inspeccion"] == "on" ? "checked" : "";
        $banos=$servicio["banos"] == "on" ? "checked" : "";
        $cocina=$servicio["cocina"] == "on" ? "checked" : "";
        $otros1=$servicio["otros1"] == "on" ? "checked" : "";
        $trampas=$servicio["trampas"] == "on" ? "checked" : "";
        $drenaje=$servicio["drenaje"] == "on" ? "checked" : "";
        $inspeccion_cctv=$servicio["inspeccion_cctv"] == "on" ? "checked" : "";
        $limpieza_tuberia=$servicio["limpieza_tuberia"] == "on" ? "checked" : "";
        $inpeccion_controles=$servicio["inpeccion_controles"] == "on" ? "checked" : "";
        $reparacion_controles=$servicio["reparacion_controles"] == "on" ? "checked" : "";
        $limpieza_desagues=$servicio["limpieza_desagues"] == "on" ? "checked" : "";
        $limpieza_derrame=$servicio["limpieza_derrame"] == "on" ? "checked" : "";
        $k1=$servicio["k1"] == "on" ? "checked" : "";
        $k2=$servicio["k2"] == "on" ? "checked" : "";
        $water=$servicio["water"] == "on" ? "checked" : "";
        $soplete=$servicio["soplete"] == "on" ? "checked" : "";
        $fuete=$servicio["fuete"] == "on" ? "checked" : "";
        $otros2=$servicio["otros2"] == "on" ? "checked" : "";
        $equipo_seguridad=$servicio["equipo_seguridad"] == "on" ? "checked" : "";
        $cover=$servicio["cover"] == "on" ? "checked" : "";
        $guantes=$servicio["guantes"] == "on" ? "checked" : "";
        $botas=$servicio["botas"] == "on" ? "checked" : "";
        $capacete=$servicio["capacete"] == "on" ? "checked" : "";
        $camara=$servicio["camara"] == "on" ? "checked" : "";
        $fecha_aprobacion = ($incidencia["aprobado"]==1 ? date_format(date_create($incidencia["fecha_modif"]),"d-m-Y ") : "");
        $nombre_usuario_aprobado = ($incidencia["aprobado"]==1 ? $incidencia["nombre_usuario_aprobado"] : "");
        $image_firma = ($incidencia["aprobado"]==1 ? "$url/vistas/img/firmas/tercero.png" : "");

        $nombreTecnico = ucwords($datosTecnico["nombre"]);

        $fecha_visita = date_format(date_create($incidencia["fecha_visita"]),"d-m-Y ");

    //REQUERIMOS LA CLASE TCPDF

    require_once('tcpdf_include.php');

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    $pdf->startPageGroup();

    $pdf->AddPage();


    // ---------------------------------------------------------

    $bloque1 = <<<EOF

        <table border="0" style="border-color:#f0f0f0 !important;">
            <tr style="border-color:#f0f0f0 !important;">
                <td style="width:200px">
                <div style="font-size:8.5px; text-align:left; line-height:15px;">
                PO BOX 801322
                <br>
                COTO LAUREL PR 00780-1322
                <br>
                TEL.(787) 952-9331 / (787) 636-8276
                </div>
                </td>

                <td style="background-color:white; width:140px; border: none">

                    
                    <img src="images/logo-negro-bloque.png">                    

                </td>

                <td style="background-color:white; width:70px">

                    <div style="font-size:8.5px; text-align:right; line-height:15px;">
                        

                        

                    </div>

                </td>

                <td style="background-color:white; width:200px; text-align:center; color:red"><br><br>SERVICIO Nº<br>$id_incidencia</td>
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

        <table style="font-size:8.5px; padding:5px 10px;">

            <tr>

            <td style="border: 1px solid #666; background-color:white; text-align:center width:540px"><h1>HOJA DE SERVICIOS</h1></td>


            </tr>

            <tr>

            <td style="border: 1px solid #666; background-color:white; width:270px">Cliente: $datosCliente[nombre]</td>


            <td style="border: 1px solid #666; background-color:white; width:270px; text-align:left">Fecha: $fecha_visita</td>

            </tr>

            <tr>

            <td rowspan="2" style="border: 1px solid #666; background-color:white; width:270px;">Dirección: $datosCliente[direccion]</td>


            <td rowspan="2" style="border: 1px solid #666; background-color:white; width:270px">Lugar: </td>


            </tr>

            <tr>

                <td style="border: 0px solid #fff; background-color:white; width:540px"></td>

            </tr>
            <tr>

                <td style="border: 1px solid #666; background-color:white; width:270px">Telefono: <br>$datosCliente[telefono]</td>

                <td style="border: 1px solid #666; background-color:white; width:270px"> </td>


            </tr>

            <tr>

                <td style="border: 1px solid #666; background-color:white; text-align:center; width:270px"><h3>SERVICIOS REGULARES</h3>

                </td>

                <td style="border: 1px solid #666; background-color:white; text-align:center; width:270px"><h3>EQUPOS REALIZADOS</h3></td>


            </tr>

            <tr>

                <td style="border: 1px solid #666; background-color:white;  width:135px"><input type="checkbox" name="destape" value="1" checked="$destape" disabled/> <label for="agree">DESTAPE </label></td>

                <td style="border: 1px solid #666; background-color:white;  width:135px"><input type="checkbox" name="instalacion" value="1" checked="$instalacion" disabled/> <label for="agree">INSTALACION </label></td>

                 <td style="border: 1px solid #666; background-color:white;  width:135px"><input type="checkbox" name="banos" value="1" checked="$banos" disabled/> <label for="agree">BAÑOS </label></td>

                <td style="border: 1px solid #666; background-color:white;  width:135px"><input type="checkbox" name="trampas" value="1" checked="$trampas" disabled/> <label for="agree">TRAMPAS DE GRASA </label></td>


            </tr>

            <tr>

                <td style="border: 1px solid #666; background-color:white;  width:135px"><input type="checkbox" name="reparacion" value="1" checked="$reparacion" disabled/> <label for="agree">REPARACION </label></td>

                <td style="border: 1px solid #666; background-color:white;  width:135px"><input type="checkbox" name="inspeccion" value="1" checked="$inspeccion" disabled/> <label for="agree">INSPECCION </label></td>

                <td style="border: 1px solid #666; background-color:white;  width:135px"><input type="checkbox" name="cocina" value="1" checked="$cocina" disabled/> <label for="agree">COCINA </label></td>

                <td style="border: 1px solid #666; background-color:white;  width:135px"><input type="checkbox" name="drenaje" value="1" checked="$drenaje" disabled/> <label for="agree">DRENAJE </label></td>


            </tr>

            <tr>

                <td style="border: 1px solid #666; background-color:white;  width:270px"><input type="checkbox" name="otros" value="1" checked="$otros" disabled/> <label for="agree">OTROS(FAVOR DETALLAR) </label></td>

                <td style="border: 1px solid #666; background-color:white;  width:270px"><input type="checkbox" name="otros1" value="1" checked="$otros1" disabled/> <label for="agree">OTROS</label></td>


            </tr>
            <tr>

                <td style="border: 1px solid #666; background-color:white; width:270px">$servicio[detalle_servicio_regulares]</td>

                <td style="border: 1px solid #666; background-color:white; width:270px">$servicio[detalle_servicio_realizado] </td>


            </tr>

            <tr>

                <td style="border: 1px solid #666; background-color:white; text-align:center; width:270px"><h3>SERVICIOS ESPECIALES</h3>

                </td>

                <td style="border: 1px solid #666; background-color:white; text-align:center; width:270px"><h3>EQUPOS UTILIZADOS</h3></td>

            </tr>

            <tr>

                <td style="border: 1px solid #666; background-color:white;  width:270px"><input type="checkbox" name="inspeccion_cctv" value="1" checked="$inspeccion_cctv" disabled/> <label for="agree">INSPECCION CON CCTV</label>  <strong>$servicio[inspeccion_cctv_num]</strong> PIES DE TUBERIA</td>

                <td style="border: 1px solid #666; background-color:white;  width:120px"><input type="checkbox" name="k1" value="1" checked="$k1" disabled/> <label for="agree">K 1500</label></td>

                <td style="border: 1px solid #666; background-color:white;  width:150px"><input type="checkbox" name="equipo_seguridad" value="1" checked="$equipo_seguridad" disabled/> <label for="agree">EQUIPO DE SEGURIDAD</label></td>


            </tr>

            <tr>

                <td style="border: 1px solid #666; background-color:white;  width:270px"><input type="checkbox" name="limpieza_tuberia" value="1" checked="$limpieza_tuberia" disabled/> <label for="agree">LIMPIEZA DE TUBERIA</label> <strong>$servicio[limpieza_tuberia_num]</strong> PIES DE TUBERIA</td>

                <td style="border: 1px solid #666; background-color:white;  width:120px"><input type="checkbox" name="k2" value="1" checked="$k2" disabled/> <label for="agree">K 50</label></td>

                <td style="border: 1px solid #666; background-color:white;  width:150px"><input type="checkbox" name="cover" value="1" checked="$cover" disabled/> <label for="agree">COVER ALL</label></td>
            </tr>

            <tr>

                <td style="border: 1px solid #666; background-color:white;  width:270px"><input type="checkbox" name="inpeccion_controles" value="1" checked="$inpeccion_controles" disabled/> <label for="agree">INSPECCION DE CONTROLES ESTACION DE BOMBAS</label></td>

                <td style="border: 1px solid #666; background-color:white;  width:120px"><input type="checkbox" name="water" value="1" checked="$water" disabled/> <label for="agree">WATER JETTER</label></td>

                <td style="border: 1px solid #666; background-color:white;  width:150px"><input type="checkbox" name="guantes" value="1" checked="$guantes" disabled/> <label for="agree">GUANTES</label></td>
            </tr>

            <tr>

                <td style="border: 1px solid #666; background-color:white;  width:270px"><input type="checkbox" name="reparacion_controles" value="1" checked="$reparacion_controles" disabled/> <label for="agree">REPARACIÓN ESTACION DE BOMBAS</label></td>

                <td style="border: 1px solid #666; background-color:white;  width:120px"><input type="checkbox" name="soplete" value="1" checked="$soplete" disabled/> <label for="agree">SOPLETE</label></td>

                <td style="border: 1px solid #666; background-color:white;  width:150px"><input type="checkbox" name="botas" value="1" checked="$botas" disabled/> <label for="agree">BOTAS</label></td>
            </tr>

            <tr>

                <td style="border: 1px solid #666; background-color:white;  width:270px"><input type="checkbox" name="limpieza_desagues" value="1" checked="$limpieza_desagues" disabled/> <label for="agree">LIMPIEZA DE</label> <strong>$servicio[limpieza_desagues_num]</strong> DESAGUES <strong>$servicio[limpieza_desagues_registro]</strong> REGISTROS</td>

                <td style="border: 1px solid #666; background-color:white;  width:120px"><input type="checkbox" name="fuete" value="1" checked="$fuete" disabled/> <label for="agree">FUETE</label></td>

                <td style="border: 1px solid #666; background-color:white;  width:150px"><input type="checkbox" name="capacete" value="1" checked="$capacete" disabled/> <label for="agree">CAPACETE</label></td>
            </tr>
            <tr>

                <td style="border: 1px solid #666; background-color:white;  width:270px"><input type="checkbox" name="limpieza_derrame" value="1" checked="$limpieza_derrame" disabled/> <label for="agree">LIMPIEZA DERRAMES (FAVOR DETALLAR)</label></td>

                <td style="border: 1px solid #666; background-color:white;  width:120px"><input type="checkbox" name="otros2" value="1" checked="$otros2" disabled/> <label for="agree">OTROS</label></td>

                <td style="border: 1px solid #666; background-color:white;  width:150px"><input type="checkbox" name="camara" value="1" checked="$camara" /> <label for="agree">CCTV CAMARA </label></td>
            </tr>

            <tr>

                <td style="border: 1px solid #666; background-color:white; width:270px">$servicio[detalle_servicios_especiales]</td>

                <td style="border: 1px solid #666; background-color:white; width:270px">$servicio[detalle_equipos_utilizados] </td>


            </tr>

        </table>

EOF;

        $pdf->writeHTML($bloque2, false, false, false, false, '');

        /*BLOQUE DE ITEM DE PRODUCTO*/
        $listaProducto = json_decode($servicio["productos"], true);
        if(isset($listaProducto)){

            $textcolors = '<table>
                            <tr>
                                <td style="width:540px"><img src="images/backFact2.jpg"></td>

                            </tr>
                        </table>
                        <table style="font-size:8.5px; padding:5px 10px;">

                        <tr>
                            <td style="border: 1px solid #666; background-color:white; text-align:center; width:540px"><h3>PRODUCTOS UTILIZADOS</h3></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #666; background-color:white; text-align:center; width:270px"><h4>PRODUCTO</h4></td>
                            <td style="border: 1px solid #666; background-color:white; text-align:center; width:270px"><h4>CANTIDAD</h4></td>
                        </tr>';

            foreach($listaProducto as $key => $value) {

                $cantidad = $value["cantidad"];
                $descripcionProducto = $value["descripcion"];
                $textcolors .= '<tr>
                                <td style="border: 1px solid #666; background-color:white; text-align:center; width:270px">'.$descripcionProducto.'</td>
                                <td style="border: 1px solid #666; background-color:white; text-align:center; width:270px">'.$cantidad.' </td>
                            </tr>';

            }

            $textcolors .= '</table>';

// output the HTML content
            $pdf->writeHTML($textcolors, true, false, true, false, '');
        }
        // ---------------------------------------------------------

        $pdf->AddPage();

        $bloque3 = <<<EOF


        <table style="font-size:8.5px; padding:5px 10px;">

            <tr>
                <td style="border: 1px solid #666; background-color:white; text-align:center; width:540px"><h3>COMENTARIO</h3></td>
            </tr>

            <tr>

                <td style="border: 1px solid #666; background-color:white; width:540px">$servicio[comentario]</td>

            </tr>
        </table>

EOF;

        $pdf->writeHTML($bloque3, false, false, false, false, '');

        $bloque1 = <<<EOF

        <table style="font-size:8.5px; padding:5px 10px;">
            <tr>
                <td style="text-align:center"><h3>SERVICIO REALIZADO POR</h3></td>
            </tr>
            <tr>
                <td style="width:270px">Supervisor de Turno: <strong>Miguel Velazquez</strong></td>

                <td style="width:270px">Técnico de Servicio: <strong>$datosTecnico[nombre]</strong></td>
            </tr>

            <tr>
                <td style="width:180px">Hora Entrada: <strong>$incidencia[hora_inicio]</strong></td>

                <td style="width:180px">Hora Salida: <strong>$incidencia[hora_fin]</strong></td>

                <td style="width:180px">Técnicos Adicionales: <strong>$nombre_tecnicos</strong></td>
            </tr>

            <tr>
                <td style="width:270px">Firma Cliente: <strong><img src="$url/vistas/img/firmas/$idIncidencia.png" style="height: 100px; width: 100px;"></strong></td>
                
                <td style="width:270px">Titulo: <strong>$servicio[titulo]</strong></td>


            </tr>

            <tr>
                <td style="width:270px">Nombre Letra de Molde: <strong>$servicio[nombre_letra_molde]</strong></td>

                <td style="width:270px">Fecha: <strong>$incidencia[fecha_visita]</strong></td>


            </tr>
            <tr>
                <td style="width:270px">Firma Aprobación: <strong><img src="$image_firma" style="height: 100px; width: 100px;"></strong>
                    <strong>$nombre_usuario_aprobado</strong>  
                </td>

                <td style="width:270px">Fecha Aprobación: <strong>$fecha_aprobacion</strong></td>
            </tr>
        </table>

EOF;


        $pdf->writeHTML($bloque1, false, false, false, false, '');

    // ---------------------------------------------------------
    //SALIDA DEL ARCHIVO

    $pdf->Output('servicio-plomeria'.$_GET["codigo"].'.pdf');

    }

}

$a = new imprimirServicioPlomeria();
$a -> codigo = $_GET["codigo"];
$a -> traerImpresionServicioPlomeria();

 ?>
 