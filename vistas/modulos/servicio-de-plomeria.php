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


//if($incidencia["estatus_incidencia"] == 2){
//
//    echo '<script>
//
//            window.location = rutaOcultaFrontend+"incidencias33";
//
//        </script>';
//
//    return;
//
//}
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
        <div class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="m-b-0 text-white">HOJA DE SERVICIO</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <h5 class="m-b-0 text-white">Número: <?php echo str_pad($id_incidencia, 7, "0", STR_PAD_LEFT) ?></h5>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <form class="form-horizontal formularioVenta sigPad" role="form" method="post">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Grupo:</label>
                                            <div class="col-md-9">
                                                <p class="form-control-static"> <?php echo $datosCliente["alias"] ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Fecha:</label>
                                            <div class="col-md-9">
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
                                            <label class="control-label text-right col-md-3">Dirección:</label>
                                            <div class="col-md-9">
                                                <p class="form-control-static"> <?php echo $incidencia["direccion"] ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Teléfono:</label>
                                            <div class="col-md-9">
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
                                                            <input type="checkbox" id="destape" name="destape"  />
                                                            <label for="destape">DESTAPE</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="reparacion" name="reparacion"  />
                                                            <label for="reparacion">REPARACION</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="otros" name="otros"  />
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
                                                            <input type="checkbox" id="instalacion" name="instalacion"  />
                                                            <label for="instalacion">INSTALACION</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="inspeccion" name="inspeccion"  />
                                                            <label for="inspeccion">INSPECCION</label>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <textarea class="form-control" rows="3" name="detalleServiciosRegulares" placeholder="Detalle Servicio Regular"></textarea>
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
                                                            <input type="checkbox" id="banos" name="banos"  />
                                                            <label for="banos">BAÑOS</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="cocina" name="cocina"  />
                                                            <label for="cocina">COCINA</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="otros1" name="otros1"  />
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
                                                            <input type="checkbox" id="trampas" name="trampas"  />
                                                            <label for="trampas">TRAMPAS DE GRASA</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="drenaje" name="drenaje"  />
                                                            <label for="drenaje">DRENAJE</label>

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                        <div class="form-group">

                                            <textarea class="form-control" rows="3" name="detalleServiciosRealizado" placeholder="Detalle Servicio Realizado"></textarea>
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
                                                            <input type="checkbox" id="inspeccionCctv" name="inspeccionCctv"  />
                                                            <label for="inspeccionCctv">INSPECCION CON CCTV  <input type="text" name="inspeccionCctvNum" class="form-control" style="float: right !important; width: 50px !important; margin-top: -10px !important; margin-left: 5px"></label><label style="margin-left: 5px"
                                                                for=""> PIES DE TUBERIA</label>
                                                        </div>

                                                    </div>
                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-10">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="limpiezaTuberia" name="limpiezaTuberia"  />
                                                            <label for="limpiezaTuberia">LIMPIEZA DE TUBERIA  <input type="text" name="limpiezaTuberiaNum" class="form-control" style="float: right !important; width: 50px !important; margin-top: -10px !important; margin-left: 5px"></label><label style="margin-left: 5px"
                                                                                                                                                                                                                                                                     for=""> PIES DE TUBERIA</label>
                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-10">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="inpeccionControles" name="inpeccionControles"  />
                                                            <label for="inpeccionControles">INSPECCION DE CONTROLES ESTACION DE BOMBAS</label>

                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-10">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="reparacionControles" name="reparacionControles"  />
                                                            <label for="reparacionControles">REPARACION ESTACION DE BOMBAS</label>
                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-10">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="limpiezaDesagues" name="limpiezaDesagues"  />
                                                            <label for="limpiezaDesagues" style="min-width: 0px !important;">LIMPIEZA
                                                                <input type="text" name="limpiezaDesaguesNum" class="form-control" style="width: 50px !important; margin-top: -10px !important; margin-left: 0px"></label>
                                                            <label style="min-width: 0px !important; margin-left: 5px" for=""> DESAGUES <input type="text" name="limpiezaDesaguesRegistro" class="form-control" style="width: 50px !important; margin-top: -10px !important; margin-left: 5px"></label>
                                                            <label style="margin-left: 0px" for=""> REGISTROS</label>
                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="limpiezaDerrame" name="limpiezaDerrame"  />
                                                            <label for="limpiezaDerrame">LIMPIEZA DERRAME (FAVOR DETALLAR)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group">

                                            <textarea class="form-control" rows="3" name="detalleServiciosEspeciales" placeholder="Detalle Servicio Especial"></textarea>
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
                                                            <input type="checkbox" id="k1" name="k1"  />
                                                            <label for="k1">K 1500</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="k2" name="k2"  />
                                                            <label for="k2">K 50</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="water" name="water"  />
                                                            <label for="water">WATER JETTER</label>

                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="soplete" name="soplete"  />
                                                            <label for="soplete">SOPLETE</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="fuete" name="fuete"  />
                                                            <label for="fuete">FUETE</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="otros2" name="otros2"  />
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
                                                            <input type="checkbox" id="equipoSeguridad" name="equipoSeguridad"  />
                                                            <label for="equipoSeguridad">EQUIPO DE SEGURIDAD</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="cover" name="cover"  />
                                                            <label for="cover">COVER ALL</label>

                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="guantes" name="guantes"  />
                                                            <label for="guantes">GUANTES</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="botas" name="botas"  />
                                                            <label for="botas">BOTAS</label>

                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="capacete" name="capacete"  />
                                                            <label for="capacete">CAPACETE</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="camara" name="camara"  />
                                                            <label for="camara">CCTV CAMARA</label>

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <textarea class="form-control" rows="3" name="detalleEquiposUtilizados" placeholder="Detalle Equipos Utilizados"></textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="box-title text-center">COMENTARIO</h3>

                                        <div class="form-group">

                                            <textarea class="form-control" rows="4" name="comentario" placeholder=""></textarea>
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

                                        </div>

                                        <input type="hidden" id="listaProductos" name="listaProductos">

                                        <!--=====================================
                                        BOTÓN PARA AGREGAR PRODUCTO
                                        ======================================-->


                                        <button type="button" class="btn btn-success btnAgregarProducto"> <i class="fa fa-pencil"></i> Agregar producto</button>
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
                                            <label class="control-label text-right col-md-5">Supervisor de Turno:</label>
                                            <div class="col-md-7">
                                                <p class="form-control-static"> <?php echo "Miguel Velazquez"; //$datosUsuario["nombre"] ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-5">Técnico de Servicio:</label>
                                            <div class="col-md-7">
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
                                            <label class="control-label text-right col-md-5">Hora Entrada:</label>
                                            <div class="col-md-6">
                                                <input class="form-control" type="time"  name="horaEntrada" value="<?php echo $incidencia["hora_inicio"] ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-5">Hora Salida:</label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="time" name="horaSalida" value="<?php echo date('H:i:s'); ?>" required readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-6">Técnicos Adicionales:</label>
                                            <div class="col-md-6">
                                                <input type="text" name="tecnicoAdicional" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-5">Firma Cliente:</label>
                                            <div class="col-md-7">
                                                <div class="sig sigWrapper">
                                                    <canvas class="pad" width="275" height="90"></canvas>
                                                    <input type="hidden" name="output" class="output">
                                                    <div id="clear" class="text-left">
                                                        <button name="clear" type="clear" class="clearButton btn btn-warning" title="Limpiar"><i class="far fa-trash-alt"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-5">Titulo:</label>
                                            <div class="col-md-7">
                                                <input type="text" name="titulo" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-5">Nombre Letra a Molde:</label>
                                            <div class="col-md-7">
                                                <input type="text" name="nombreLetraMolde" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-5">Fecha:</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <input type="text" class="form-control mydatepicker" placeholder="" id="mdate" name="ingFechaVisita" value="<?php echo date_format(date_create($incidencia["fecha_visita"]),"m-d-Y")?>" required readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" name="servicioGeneralPlomeria" class="btn btn-info"> <i class="fa fa-pencil"></i> Terminar</button>
                                                <button type="button" class="btn btn-inverse">Cancelar</button>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                    </div>
                                    <input type="hidden" name="id_incidencia" value="<?php echo $id_incidencia ?>">

                                    <?php

                                        $crearServicioplomeria = new ControladorIncidencia();
                                        $crearServicioplomeria -> ctrCrearSoportePlomeria();
                                    ?>
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







