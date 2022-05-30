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

        $servicio = ControladorIncidencia::ctrMostrarServicio("servicio_general","id_incidencia",$id_incidencia);

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



        $vaciado=$servicio["vaciado"] == "on" ? "checked" : "";
        $vaciado_parcial=$servicio["vaciado_parcial"] == "on" ? "checked" : "";
        $otros=$servicio["otros"] == "on" ? "checked" : "";
        $limpeza_regular=$servicio["limpeza_regular"] == "on" ? "checked" : "";
        $inspeccion=$servicio["inspeccion"] == "on" ? "checked" : "";
        $interceptor_aceite=$servicio["interceptor_aceite"] == "on" ? "checked" : "";
        $tanque_almacenamiento=$servicio["tanque_almacenamiento"] == "on" ? "checked" : "";
        $pozo_septico=$servicio["pozo_septico"] == "on" ? "checked" : "";
        $estacion_bombas=$servicio["estacion_bombas"] == "on" ? "checked" : "";
        $tanque_recibidor=$servicio["tanque_recibidor"] == "on" ? "checked" : "";
        $tanque_aceites=$servicio["tanque_aceites"] == "on" ? "checked" : "";
        $otros1=$servicio["otros1"] == "on" ? "checked" : "";
        $otros2=$servicio["otros2"] == "on" ? "checked" : "";
        $interior=$servicio["interior"] == "on" ? "checked" : "";
        $exterior=$servicio["exterior"] == "on" ? "checked" : "";
        $interior_exterior=$servicio["interior_exterior"] == "on" ? "checked" : "";
        $limpieza_derrame_liquido=$servicio["limpieza_derrame_liquido"] == "on" ? "checked" : "";
        $limpieza_manhole=$servicio["limpieza_manhole"] == "on" ? "checked" : "";
        $limpieza_lift_station=$servicio["limpieza_lift_station"] == "on" ? "checked" : "";
        $limpieza_tuberias=$servicio["limpieza_tuberias"] == "on" ? "checked" : "";
        $limpieza_registros_desagues=$servicio["limpieza_registros_desagues"] == "on" ? "checked" : "";
        $remocion_acarreo=$servicio["remocion_acarreo"] == "on" ? "checked" : "";
        $remocion_grasas=$servicio["remocion_grasas"] == "on" ? "checked" : "";
        $vacuum=$servicio["vacuum"] == "on" ? "checked" : "";
        $vacuum_portable=$servicio["vacuum_portable"] == "on" ? "checked" : "";
        $water_jetter=$servicio["water_jetter"] == "on" ? "checked" : "";
        $tanktruck=$servicio["tanktruck"] == "on" ? "checked" : "";
        $otros3=$servicio["otros3"] == "on" ? "checked" : "";
        $coverAll=$servicio["coverAll"] == "on" ? "checked" : "";

        $guantes=$servicio["guantes"] == "on" ? "checked" : "";
        $capacete=$servicio["capacete"] == "on" ? "checked" : "";
        $equipo_espacio_confinado=$servicio["equipo_espacio_confinado"] == "on" ? "checked" : "";
        $desechos_liquidos=$servicio["desechos_liquidos"] == "on" ? "checked" : "";
        $aguas_residuales=$servicio["aguas_residuales"] == "on" ? "checked" : "";
        $aceites_vegetales=$servicio["aceites_vegetales"] == "on" ? "checked" : "";
        $otros4=$servicio["otros4"] == "on" ? "checked" : "";
        $otros5=$servicio["otros5"] == "on" ? "checked" : "";

        $planta_tratamiento=$servicio["planta_tratamiento"] == "on" ? "checked" : "";
        $otra_facilidad=$servicio["otra_facilidad"] == "on" ? "checked" : "";


        $nombreTecnico = ucwords($datosTecnico["nombre"]);
        $fecha_aprobacion = ($incidencia["aprobado"]==1 ? date_format(date_create($incidencia["fecha_modif"]),"m-d-Y ") : "");
        $nombre_usuario_aprobado = ($incidencia["aprobado"]==1 ? $incidencia["nombre_usuario_aprobado"] : "");
        $image_firma = ($incidencia["aprobado"]==1 ? "$url/vistas/img/firmas/tercero.png" : "");

        $fecha_visita = date_format(date_create($incidencia["fecha_visita"]),"m-d-Y ");


    //REQUERIMOS LA CLASE TCPDF

    require_once('tcpdf_include.php');

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    $pdf->startPageGroup();

    $pdf->AddPage();


    // ---------------------------------------------------------

    $bloque1 = <<<EOF
    
    <table>
        <tr>
            <td style="width:45%">
                <div style="font-size:8px; text-align:left;">
                    PO BOX 801322
                    <br/>
                    COTO LAUREL PR 00780-1322
                    <br/>
                    TEL.(787) 952-9331 / (787) 636-8276
                </div>
            </td>

            <td style="background-color:white; width:10%;"> 
                <br/><br/>
                <img width:20px; src="images/logo-negro-bloque.png">                    
            </td>

            <td style="background-color:white; width:45%; text-align:right; color:red"><br><br>SERVICIO Nº<br>$id_incidencia</td>
        </tr>
    </table>
    <br/><br/>


EOF;


    $pdf->writeHTML($bloque1, false, false, false, false, '');

    // ---------------------------------------------------------



    // ---------------------------------------------------------

        $bloque2 = <<<EOF



        <table style="font-size:8px; padding:3px">
            <tr>
                <td style="border: 1px solid #666; background-color:white; text-align:center width:100%"><h3>HOJA DE SERVICIO Y MANIFIESTO</h3></td>
            </tr>
            <tr>
                <td style="border: 1px solid #666; background-color:white; width:270px">Cliente: $datosCliente[alias] - $datosCliente[documento] - $datosCliente[localizador]</td>
                <td style="border: 1px solid #666; background-color:white; width:140px; text-align:left">Fecha: $fecha_visita</td>        
                <td style="border: 1px solid #666; background-color:white; width:130px; text-align:left">Grupo: $datosCliente[alias] </td>
            </tr>

            <tr>

            <td style="border: 1px solid #666; background-color:white; width:540px;">Dirección: $datosCliente[direccion]</td>


            </tr>


            <tr>

                <td style="border: 1px solid #666; background-color:white; text-align:center; width:300px"><h4>SERVICIOS REGULARES DE REMOCION A TRAMPAS DE GRASA</h4></td>

                <td style="border: 1px solid #666; background-color:white; text-align:center; width:150px"><h4>SERVICIO REALIZADO EN</h4></td>

                <td style="border: 1px solid #666; background-color:white; text-align:center; width:90px"><h4>TRAMPA</h4></td>


            </tr>

            <tr>

                <td style="border: 1px solid #666; background-color:white;  width:150px">
                    <input type="checkbox" name="vaciado" value="1" checked="$vaciado" disabled/> <label for="vaciado">Vaciado Total </label>
                    <br>
                    <input type="checkbox" name="vaciado_parcial" value="1" checked="$vaciado_parcial" disabled/> <label for="vaciado_parcial">Vaciado Parcial "Skimming" </label>
                    <br>
                    <input type="checkbox" name="otros2" value="1" checked="$otros2" disabled/> <label for="otros2">Otros servicios (Favor de detallar en espacio de comentarios </label>
                </td>

                <td style="border: 1px solid #666; background-color:white;  width:150px">

                    <input type="checkbox" name="limpieza_regular" value="1" checked="$limpeza_regular" disabled/> <label for="limpieza_regular">Limpieza regular </label>
                    <br>
                    <input type="checkbox" name="inspeccion" value="1" checked="$inspeccion" disabled/> <label for="inspeccion">Limpieza con máquina de presión </label>

                </td>

                 <td style="border: 1px solid #666; background-color:white;  width:150px">

                    <input type="checkbox" name="interceptor_aceite" value="1" checked="$interceptor_aceite" disabled/> <label for="interceptor_aceite">Interceptor aceites y grasas </label>
                    <br>
                    <input type="checkbox" name="tanque_almacenamiento" value="1" checked="$tanque_almacenamiento" disabled/> <label for="tanque_almacenamiento">Tanque almacenamiento desperdicio </label>
                    <br>
                    <input type="checkbox" name="pozo_septico" value="1" checked="$pozo_septico" disabled/> <label for="pozo_septico">Pozo Séptico</label>
                    <br>
                    <input type="checkbox" name="estacion_bombas" value="1" checked="$estacion_bombas" disabled/> <label for="estacion_bombas">Estación de Bombas</label>
                    <br>
                    <input type="checkbox" name="tanque_recibidor" value="1" checked="$tanque_recibidor" disabled/> <label for="tanque_recibidor">Tanque Recibidor y/o Igualación</label>
                    <br>
                    <input type="checkbox" name="tanque_aceites" value="1" checked="$tanque_aceites" disabled/> <label for="tanque_aceites">Tanque Aceites Freidoras</label>
                    <br>
                    <input type="checkbox" name="otros1" value="1" checked="$otros1" disabled/> <label for="otros1">Otro</label>

                 </td>

                <td style="border: 1px solid #666; background-color:white;  width:90px">

                    <input type="checkbox" name="interior" value="1" checked="$interior" disabled/> <label for="interior">Interior </label>
                    <br>
                    <input type="checkbox" name="exterior" value="1" checked="$exterior" disabled/> <label for="exterior">Exterior </label>
                    <br>
                    <input type="checkbox" name="interior_exterior" value="1" checked="$interior_exterior" disabled/> <label for="interior_exterior">Interior y Exterior</label>
                </td>


            </tr>
            <tr>

                <td style="border: 1px solid #666; background-color:white; width:280px"><h4>SERVICIOS ESPECIALES</h4></td>

                <td style="border: 1px solid #666; background-color:white; width:120px"><h4>EQUIPOS UTILIZADOS</h4></td>

                <td style="border: 1px solid #666; background-color:white; width:140px"><h4>EQUIPO DE SEGURIRDAD</h4></td>


            </tr>


            <tr>
                <td style="border: 1px solid #666; background-color:white; width:280px">
                        <input type="checkbox" name="limpieza_derrame_liquido" value="1" checked="$limpieza_derrame_liquido" disabled/> <label for="limpieza_derrame_liquido">Limpieza y respuesta a derrame de líquidos no peligrosos</label>
                    <br>
                        <input type="checkbox" name="limpieza_manhole" value="1" checked="$limpieza_manhole" disabled/> <label for="limpieza_manhole">Limpieza de "manhole" alcantarilla</label>
                    <br>
                        <input type="checkbox" name="limpieza_lift_station" value="1" checked="$limpieza_lift_station" disabled/> <label for="limpieza_lift_station">Limpieza de "Lift Station" estación de bombeo</label>
                    <br>
                        <input type="checkbox" name="limpieza_tuberias" value="1" checked="$limpieza_tuberias" disabled/> <label for="limpieza_tuberias">Limpieza de <strong>$servicio[limpieza_tuberias_num]</strong> pies lineales de tuberías</label>
                    <br>
                        <input type="checkbox" name="limpieza_registros_desagues" value="1" checked="$limpieza_registros_desagues" disabled/> <label for="limpieza_registros_desagues">Limpieza de <strong>$servicio[limpieza_registros_num]</strong> registros y <strong>$servicio[limpieza_desagues_num]</strong> desagues</label>
                    <br>
                        <input type="checkbox" name="remocion_acarreo" value="1" checked="$remocion_acarreo" disabled/> <label for="remocion_acarreo">Remoción y acarreo de desechos líquidos No peligrosos</label>
                    <br>
                        <input type="checkbox" name="remocion_grasas" value="1" checked="$remocion_grasas" disabled/> <label for="remocion_grasas">Remoción de grasas sólidas</label>
                    <br>
                        <input type="checkbox" name="otros2" value="1" checked="$otros2" disabled/> <label for="otros2">Otros servicios (Favor detallar en espacio de comentarios</label>
                </td>
                <td style="border: 1px solid #666; background-color:white;  width:120px">
                        <input type="checkbox" name="vacumm" value="1" checked="$vacuum" disabled/> <label for="vacum">Vacuum No. <strong>$servicio[vacuumNum]</strong></label>
                    <br>
                        <input type="checkbox" name="vacuum_portable" value="1" checked="$vacuum_portable" disabled/> <label for="vacuum_portable">Vacuum Portable</label>
                    <br>
                        <input type="checkbox" name="water_jetter" value="1" checked="$water_jetter" disabled/> <label for="water_jetter">Water Jetter System</label>
                    <br>
                        <input type="checkbox" name="tanktruck" value="1" checked="$tanktruck" disabled/> <label for="tanktruck">Tank truck</label>
                    <br>
                        <input type="checkbox" name="otros3" value="1" checked="$otros3" disabled/> <label for="otros3">Otros</label>

                </td>

                <td style="border: 1px solid #666; background-color:white;  width:140px">
                        <input type="checkbox" name="coverAll" value="1" checked="$coverAll" disabled/> <label for="coverAll">Cover all</label>
                    <br>
                        <input type="checkbox" name="guantes" value="1" checked="$guantes" disabled/> <label for="guantes">Guantes</label>
                    <br>
                        <input type="checkbox" name="capacete" value="1" checked="$capacete" disabled/> <label for="capacete">Capacete</label>
                    <br>
                        <input type="checkbox" name="equipo_espacio_confinado" value="1" checked="$equipo_espacio_confinado" disabled/> <label for="guantes">Equipo espacio confinado</label>
                    <br>
                        <input type="checkbox" name="otros5" value="1" checked="$otros5" disabled/> <label for="otros5">Otros equipos</label>

                </td>

            </tr>



        </table>

EOF;

        $pdf->writeHTML($bloque2, false, false, false, false, '');


        // ---------------------------------------------------------

        $bloque3 = <<<EOF


        <table style="font-size:8px; padding:2px;">

            <tr>
                <td style="border: 1px solid #666; background-color:white; text-align:center; width:540px; padding: 0"><h4>COMENTARIO</h4></td>
            </tr>

            <tr>

                <td style="border: 1px solid #666; background-color:white; width:540px">$servicio[comentario]</td>

            </tr>

            <tr>
                <td style="border: 1px solid #666; background-color:white; text-align:center; width:270px"><h4>INFORMACION GENERAL DEL PRODUCTO RECOLECTADO</h4></td>

                <td style="border: 1px solid #666; background-color:white; text-align:center; width:270px"><h4>SERVICIO REALIZADO POR</h4></td>
            </tr>

            <tr>
                <td style="border: 1px solid #666; background-color:white;  width:270px">

                        <input type="checkbox" name="desechos_liquidos" value="1" checked="$desechos_liquidos" disabled/> <label for="desechos_liquidos">Desechos líquidos NO peligrosos de trampas de grasa</label>
                    <br>
                        <input type="checkbox" name="aguas_residuales" value="1" checked="$aguas_residuales" disabled/> <label for="aguas_residuales">Aguas residuales de estación de bombeo "Lift Station"</label>
                    <br>
                        <input type="checkbox" name="aceites_vegetales" value="1" checked="$aceites_vegetales" disabled/> <label for="aceites_vegetales">Aceites vegetales de freir</label>
                    <br>
                        <input type="checkbox" name="otros4" value="1" checked="$otros4" disabled/> <label for="otros4">Otros</label>
                    <br>
                        <label for="otros5">Total desperdicio recolectado <strong>$servicio[total_desperciado]</strong> gals.</label>

                </td>

                <td style="border: 1px solid #666; background-color:white;  width:270px">

                        <label>Supervisor de turno: <strong>Miguel Velazquez Ramirez</strong> </label>
                    <br>
                        <label>Técnico de Servicio: <strong>$datosTecnico[nombre]</strong> </label>
                    <br>
                        <label>Hora Entrada: <strong>$incidencia[hora_inicio]</strong> </label>
                    <br>
                        <label>Hora Salida: <strong>$incidencia[hora_fin]</strong> </label>
                    <br>
                        <label>Técnicos adicionales: <strong>$nombre_tecnicos</strong> </label>

                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #666; background-color:white; align=justify; width:540px">
                <label>
                    <strong>CERTIFICACION DEL GENERADOR: </strong> Certifico que el material mencionado arriba no es un desperdicio peligroso como está definido en el 40 CFR Parte 261 o cualquier ley estatal
                    aplicable, ha sido descrito, clasificacdo y empacado y está en condiciones apropiadas para su transportación de acuerdo a regulaciones aplciables: <strong>ADEMAS</strong>, si el
                    desperdicio es un residuo de tratamiento de un desperdicio peligroso previamente restringido sujeto a las restricciones de disposición a vertederos. Yo certifico y garantizo que el
                    desperdicio ha sido tratado de acuerdo al 40 CFR Parte 288 y ya no es un desperdicio peligroso como esta definido por el 40 CRF Parte 261.
                </label>
                </td>
            </tr>
        </table>

EOF;

        $pdf->writeHTML($bloque3, false, false, false, false, '');

        $bloque4 = <<<EOF

        <table style="font-size:8px; padding:3px;">


            <tr>
                <td style="width:180px">Firma Cliente: <strong><img src="$url/vistas/img/firmas/$idIncidencia.png" style="height: 100px; width: 100px;"></strong></td>

                <td style="width:180px">Titulo: <strong>$servicio[titulo]</strong></td>

                <td style="width:180px">Fecha: <strong>$incidencia[fecha_visita]</strong></td>


            </tr>
            <br>
            <tr>
                <td style="width:270px">Nombre: <strong>$servicio[nombre_letra_molde]</strong></td>

            </tr>

            <tr>
                <td style="border: 1px solid #666; background-color:white; text-align:center; width:540px"><h4>DESTINO FINAL DEL PRODUCTO</h4></td>
            </tr>
            <tr>
                <td style="border: 1px solid #666; background-color:white;  width:270px">

                    <input type="checkbox" name="planta_tratamiento" value="1" checked="$planta_tratamiento" disabled/> <label for="planta_tratamiento">Planta de Tratamiento EPPR,<br>INC. Environmental Power <br>Carr. #1 Km. 116.2 Bo.Aruz<br>Juana Díaz, P.R. 00795<br>Núm. Facilidad JCA-DS-2ET-RP-39-0001
                                                <br>Núm. Identificación EPA PRR0000006866</label>
                </td>

                <td style="border: 1px solid #666; background-color:white;  width:270px">

                    <input type="checkbox" name="otra_facilidad" value="1" checked="$otra_facilidad" disabled/> <label for="otra_facilidad">Otra facilidad de disposición</label>
                </td>
            </tr>
            <tr>
            <td style="border: 1px solid #666; background-color:white;  width:540px">

                    <label for="Certifico">Certifico que el material antes mencionado fue recibido según lo especificado en este documento.</label>

                </td>
            </tr>
            <tr>
                <td style="width:270px">Firma Aprobación: <strong><img src="$image_firma" style="height: 100px; width: 100px;"></strong>
                    <strong>$nombre_usuario_aprobado</strong>   
                </td>

                <td style="width:270px">Fecha Aprobación: <strong>$fecha_aprobacion</strong></td>
            </tr>
        </table>

EOF;


        $pdf->writeHTML($bloque4, false, false, false, false, '');

    // ---------------------------------------------------------
    //SALIDA DEL ARCHIVO

    $pdf->Output('servicio-general'.$_GET["codigo"].'.pdf');

    }

}

$a = new imprimirServicioPlomeria();
$a -> codigo = $_GET["codigo"];
$a -> traerImpresionServicioPlomeria();

 ?>
 