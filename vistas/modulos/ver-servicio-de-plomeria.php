<?php

$url = Ruta::ctrRuta();

$rutas = explode("/", $_GET["ruta"]);

$id_incidencia = isset($rutas[1]) ? $rutas[1] : "";

$incidencia = ControladorIncidencia::ctrMostrarIncidencias("id",$id_incidencia);
//Busco el usuario quien creo la incidencia
$datosUsuario = ControladorUsuarios::ctrMostrarUsuarios("id",$incidencia["id_usuario"]);
//Busco los datos del cliente
$datosCliente = ControladorClientes::ctrMostrarClientes("id",$incidencia["id_cliente"]);
//Busco los datos del tecnico
$datosTecnico = ControladorUsuarios::ctrMostrarUsuarios("id",$incidencia["id_tecnico"]);

//BUSCO EL SERVICIO DE LA INCIDENCIA

$servicio = ControladorIncidencia::ctrMostrarServicio("servicio_plomeria","id_incidencia",$id_incidencia);

?>

<!--=====================================
PÁGINA DE USUARIOS
======================================-->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Servicio de Plomeria</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Inicio</li>
                    <li class="breadcrumb-item active">Servicio de Plomeria</li>
                </ol>
            </div>

        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div id="plomeria-serv" class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="m-b-0 text-white tx-center-pl">HOJA DE SERVICIO</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <h5 class="m-b-0 text-white tx-center-pl">Número: <?php echo str_pad($id_incidencia, 7, "0", STR_PAD_LEFT) ?></h5>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <form class="form-horizontal formularioVenta" role="form" method="post">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-4 col-6">Grupo:</label>
                                            <div class="col-md-8 col-6">
                                                <p class="form-control-static"> <?php echo $datosCliente["alias"] ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-4 col-6">Fecha:</label>
                                            <div class="col-md-8 col-6">
                                                <p class="form-control-static"> <?php echo date_format(date_create($incidencia["fecha_visita"]),"m-d-Y") ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-4 col-6">Dirección:</label>
                                            <div class="col-md-8 col-6">
                                                <p class="form-control-static"> <?php echo $incidencia["direccion"] ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-4 col-6">Teléfono:</label>
                                            <div class="col-md-8 col-6">
                                                <p class="form-control-static"> <?php echo $datosCliente["telefono"] ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>

                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3 class="box-title text-center">SERVICIOS REGULARES</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="destape" name="destape" <?php echo ($servicio["destape"] == "on") ? "checked" : "" ?> disabled />
                                                            <label for="destape">DESTAPE</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="reparacion" name="reparacion" <?php echo ($servicio["reparacion"] == "on") ? "checked" : "" ?> disabled />
                                                            <label for="reparacion">REPARACION</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="otros" name="otros" <?php echo ($servicio["otros"] == "on") ? "checked" : "" ?> disabled />
                                                            <label for="otros">OTROS (FAVOR DETALLAR)</label>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="instalacion" name="instalacion" <?php echo ($servicio["instalacion"] == "on") ? "checked" : "" ?> disabled />
                                                            <label for="instalacion">INSTALACION</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="inspeccion" name="inspeccion" <?php echo ($servicio["inspeccion"] == "on") ? "checked" : "" ?> disabled />
                                                            <label for="inspeccion">INSPECCION</label>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <textarea class="form-control" rows="3" name="detalleServiciosRegulares" placeholder="Detalle Servicio Regular" disabled><?php echo $servicio["detalle_servicio_regulares"] ?> </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="box-title text-center">SERVICIOS REALIZADOS</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="banos" name="banos" <?php echo ($servicio["banos"] == "on") ? "checked" : "" ?> disabled />
                                                            <label for="banos">BAÑOS</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="cocina" name="cocina" <?php echo ($servicio["cocina"] == "on") ? "checked" : "" ?> disabled />
                                                            <label for="cocina">COCINA</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="otros1" name="otros1" <?php echo ($servicio["otros1"] == "on") ? "checked" : "" ?> disabled />
                                                            <label for="otros1">OTROS</label>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="trampas" name="trampas" <?php echo ($servicio["trampas"] == "on") ? "checked" : "" ?> disabled />
                                                            <label for="trampas">TRAMPAS DE GRASA</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="drenaje" name="drenaje" <?php echo ($servicio["drenaje"] == "on") ? "checked" : "" ?> disabled />
                                                            <label for="drenaje">DRENAJE</label>

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                        <div class="form-group">

                                            <textarea class="form-control" rows="3" name="detalleServiciosRealizado" placeholder="Detalle Servicio Realizado" disabled><?php echo $servicio["detalle_servicio_realizado"] ?> </textarea>
                                        </div>
                                    </div>
                                </div>
<!--                                SEGUNDO BLOQUE-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3 class="box-title text-center">SERVICIOS ESPECIALES</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-10">

                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="inspeccionCctv" name="inspeccionCctv" <?php echo ($servicio["inspeccion_cctv"] == "on") ? "checked" : "" ?> disabled />
                                                            <label for="inspeccionCctv">INSPECCION CON CCTV  <input type="text" name="inspeccionCctvNum" value="<?php echo $servicio["inspeccion_cctv_num"]?> " disabled class="form-control" style="float: right !important; width: 50px !important; margin-top: -10px !important; margin-left: 5px"></label><label style="margin-left: 5px"
                                                                for=""> PIES DE TUBERIA</label>
                                                        </div>

                                                    </div>
                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-10">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="limpiezaTuberia" name="limpiezaTuberia" <?php echo ($servicio["limpieza_tuberia"] == "on") ? "checked" : "" ?> disabled />
                                                            <label for="limpiezaTuberia">LIMPIEZA DE TUBERIA  <input type="text" name="limpiezaTuberiaNum" value="<?php echo $servicio["limpieza_tuberia_num"] ?> " disabled class="form-control" style="float: right !important; width: 50px !important; margin-top: -10px !important; margin-left: 5px"></label><label style="margin-left: 5px" for=""> PIES DE TUBERIA</label>
                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-10">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="inpeccionControles" name="inpeccionControles" <?php echo ($servicio["inpeccion_controles"] == "on") ? "checked" : "" ?> disabled />
                                                            <label for="inpeccionControles">INSPECCION DE CONTROLES ESTACION DE BOMBAS</label>

                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-10">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="reparacionControles" name="reparacionControles" <?php echo ($servicio["reparacion_controles"] == "on") ? "checked" : "" ?> disabled  />
                                                            <label for="reparacionControles">REPARACION ESTACION DE BOMBAS</label>
                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-10">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="limpiezaDesagues" name="limpiezaDesagues" <?php echo ($servicio["limpieza_desagues"] == "on") ? "checked" : "" ?> disabled />
                                                            <label for="limpiezaDesagues" style="min-width: 0px !important;">LIMPIEZA
                                                                <input type="text" name="limpiezaDesaguesNum" class="form-control" value="<?php echo $servicio["limpieza_desagues_num"] ?> " disabled style="width: 50px !important; margin-top: -10px !important; margin-left: 0px"></label>
                                                            <label style="min-width: 0px !important; margin-left: 5px" for=""> DESAGUES <input type="text" name="limpiezaDesaguesRegistro" value="<?php echo $servicio["limpieza_desagues_registro"] ?> " disabled class="form-control" style="width: 50px !important; margin-top: -10px !important; margin-left: 5px"></label>
                                                            <label style="margin-left: 0px" for=""> REGISTROS</label>
                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="limpiezaDerrame" name="limpiezaDerrame" <?php echo ($servicio["limpieza_derrame"] == "on") ? "checked" : "" ?> disabled  />
                                                            <label for="limpiezaDerrame">LIMPIEZA DERRAME (FAVOR DETALLAR)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group">

                                            <textarea class="form-control" rows="3" name="detalleServiciosEspeciales" placeholder="Detalle Servicio Especial" disabled> <?php echo $servicio["detalle_servicios_especiales"] ?>  </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="box-title text-center">EQUIPOS UTILIZADOS</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="k1" name="k1" <?php echo ($servicio["k1"] == "on") ? "checked" : "" ?> disabled  />
                                                            <label for="k1">K 1500</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="k2" name="k2" <?php echo ($servicio["k2"] == "on") ? "checked" : "" ?> disabled  />
                                                            <label for="k2">K 50</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="water" name="water" <?php echo ($servicio["water"] == "on") ? "checked" : "" ?> disabled  />
                                                            <label for="water">WATER JETTER</label>

                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="soplete" name="soplete" <?php echo ($servicio["soplete"] == "on") ? "checked" : "" ?> disabled  />
                                                            <label for="soplete">SOPLETE</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="fuete" name="fuete" <?php echo ($servicio["fuete"] == "on") ? "checked" : "" ?> disabled  />
                                                            <label for="fuete">FUETE</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="otros2" name="otros2" <?php echo ($servicio["otros2"] == "on") ? "checked" : "" ?> disabled  />
                                                            <label for="otros2">OTROS:</label>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="equipoSeguridad" name="equipoSeguridad" <?php echo ($servicio["equipo_seguridad"] == "on") ? "checked" : "" ?> disabled  />
                                                            <label for="equipoSeguridad">EQUIPO DE SEGURIDAD</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="cover" name="cover" <?php echo ($servicio["cover"] == "on") ? "checked" : "" ?> disabled />
                                                            <label for="cover">COVER ALL</label>

                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="guantes" name="guantes" <?php echo ($servicio["guantes"] == "on") ? "checked" : "" ?> disabled />
                                                            <label for="guantes">GUANTES</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="botas" name="botas" <?php echo ($servicio["botas"] == "on") ? "checked" : "" ?> disabled />
                                                            <label for="botas">BOTAS</label>

                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="capacete" name="capacete" <?php echo ($servicio["capacete"] == "on") ? "checked" : "" ?> disabled />
                                                            <label for="capacete">CAPACETE</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="camara" name="camara" <?php echo ($servicio["camara"] == "on") ? "checked" : "" ?> disabled />
                                                            <label for="camara">CCTV CAMARA</label>

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <textarea class="form-control" rows="3" name="detalleEquiposUtilizados" placeholder="Detalle Equipos Utilizados" disabled><?php echo $servicio["detalle_equipos_utilizados"] ?> </textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="box-title text-center">COMENTARIO</h3>

                                        <div class="form-group">

                                            <textarea class="form-control" rows="4" name="comentario" placeholder="" disabled><?php echo $servicio["comentario"] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="box-title text-center">AGREGAR PRODUCTOS</h3>

                                        <!--=====================================
                                        ENTRADA PARA AGREGAR PRODUCTO
                                        ======================================-->

                                        <div class="form-group row nuevoProducto">

                                            <?php

                                            $listaProducto = json_decode($servicio["productos"], true);
                                            if(isset($listaProducto)){

                                                foreach ($listaProducto as $key => $value) {

                                                    $item = "id";
                                                    $valor = $value["id"];
                                                    $orden = null;

                                                    $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

                                                    $stockAntiguo = $respuesta["stock"] + $value["cantidad"];

                                                    echo '<div class="row" style="padding:10px 40px">

                                                        <div class="col-md-3 col-xs-3" style="padding-right:0px">
                                                        </div>

                                                        <div class="col-md-6 col-xs-6" style="padding-right:0px">

                                                          <div class="input-group">


                                                            <input type="text" class="form-control nuevaDescripcionProducto" idProducto="'.$value["id"].'" name="agregarProducto" value="'.$value["descripcion"].'" readonly >

                                                          </div>

                                                        </div>

                                                        <div class="col-md-3 col-xs-3">

                                                          <input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="'.$value["cantidad"].'" stock="'.$stockAntiguo.'" nuevoStock="'.$value["stock"].'" disabled>

                                                        </div>

                                                      </div>';
                                                }
                                            }



                                            ?>

                                        </div>

                                        <input type="hidden" id="listaProductos" name="listaProductos">




                                        <br>
                                        <hr>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="box-title text-center">SERVICIO REALIZADO POR</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-5 col-5">Supervisor de Turno:</label>
                                            <div class="col-md-7 col-7">
                                                <p class="form-control-static"> <?php echo "Miguel Velazquez"  //$datosUsuario["nombre"] ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-5 col-5">Técnico de Servicio:</label>
                                            <div class="col-md-7 col-7">
                                                <p class="form-control-static"> <?php echo $datosTecnico["nombre"] ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-5 m-t-15">Hora Entrada:</label>
                                            <div class="col-md-6">
                                                <input class="form-control" type="time"  name="horaEntrada" value="<?php echo $incidencia["hora_inicio"] ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-5 m-t-15">Hora Salida:</label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="time" name="horaSalida" value="<?php echo $incidencia["hora_fin"] ?>" required readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-6 m-t-15">Técnicos Adicionales:</label>
                                            <div class="col-md-6">
                                                <input type="text" name="tecnicoAdicional" class="form-control" value="<?php echo $servicio["tecnico_adicional"]; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-5 m-t-15">Firma Cliente:</label>
                                            <div class="col-md-7">
                                                <img src="<?php echo $url.'vistas/img/firmas/'.$id_incidencia.'.png' ?>" style="height: 100px; width: 100px;">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-5 m-t-15">Titulo:</label>
                                            <div class="col-md-7">
                                                <input type="text" name="titulo" class="form-control" value="<?php echo $servicio["titulo"]; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-5 m-t-15">Nombre Letra a Molde:</label>
                                            <div class="col-md-7">
                                                <input type="text" name="nombreLetraMolde" class="form-control" value="<?php echo $servicio["nombre_letra_molde"]; ?>" disabled >
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-5 m-t-15">Fecha:</label>
                                            <div class="col-md-7">
                                                <div class="input-group">
                                                    <input type="text" class="form-control mydatepicker" placeholder="" id="mdate" name="ingFechaVisita" value="<?php echo date_format(date_create($incidencia["fecha_visita"]),"m-d-Y") ?>" required readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row" >
                                        <label class="control-label text-right col-md-5 m-t-15">Firma Aprobación:</label>
                                        <div class="col-md-7">
                                            <?php
                                            if($incidencia["aprobado"] == 1){

                                                echo '<img src="'.$url.'vistas/img/firmas/tercero.png" style="height: 100px; width: 100px;">';

                                            }
                                            ?>
                                            <br>
                                            <label class="control-label text-right col-md-5"><?= $incidencia["nombre_usuario_aprobado"] ?> </label>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-5 m-t-15">Fecha Aprobación:</label>
                                        <div class="col-md-7">
                                            <div class="input-group">
                                                <input type="text" class="form-control mydatepicker" placeholder="" id="mdate" name="ingFechaAprobacion" value="<?= ($incidencia["aprobado"]==1 ? date_format(date_create($incidencia["fecha_modif"]),"m-d-Y") : "") ?>" required readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <a href="#" class="btn btn-success m-t-20 btnImprimirIncidenciaServicioPlomeria" id="imprimirIncidenciaServicioPlomeria" tipoServicio ="<?php echo $incidencia["tipo_servicio"]; ?>"  idIncidencia="<?php echo $incidencia["id"]; ?>"><i class="fa fa-print"></i> Imprimir</a>
                                                <?php
                                                if($_SESSION["perfil"] == "Administrador"){

                                                    echo '<a href="'.$url.'admin-incidencia" class="btn btn-secondary m-t-20" style="margin-left: 6px"><i class="fas fa-undo-alt"></i> Regresar</a>';

                                                }else{

                                                    echo '<a href="'.$url.'incidencias" class="btn btn-secondary m-t-20" style="margin-left: 6px"><i class="fas fa-undo-alt"></i> Regresar</a>';
                                                }
                                                ?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                    </div>
                                    <input type="hidden" name="id_incidencia" value="<?php echo $incidencia["id"] ?>">

                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->


    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->

</div>







