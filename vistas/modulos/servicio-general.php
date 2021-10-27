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

$servicio = ControladorIncidencia::ctrMostrarServicio("servicio_general","id_incidencia",$id_incidencia);

//if($incidencia["estatus_incidencia"] == 2){
//
//    echo '<script>
//
//            window.location = "incidencias";
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
                <h3 class="text-themecolor m-b-0 m-t-0">Servicio General</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Inicio</li>
                    <li class="breadcrumb-item active">Servicio General</li>
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
                                <h4 class="m-b-0 text-white">HOJA DE SERVICIO Y MANIFIESTO</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <h5 class="m-b-0 text-white">Número: <?php echo str_pad($id_incidencia, 7, "0", STR_PAD_LEFT) ?></h5>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <form class="form-horizontal sigPad" role="form" method="post">

                            <input type="hidden" name="id_incidencia" value="<?php echo $id_incidencia ?>">
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
                                                <p class="form-control-static">  <?php echo date_format(date_create($incidencia["fecha_visita"]),"m-d-Y") ?> </p>
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
                                        <h3 class="box-title text-center">SERVICIOS REGULARES DE REMOCION A TRAMPAS DE GRASA</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-1"></label>
                                                    <div class="col-md-11">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="vaciado" name="vaciado" />
                                                            <label for="vaciado">Vaciado Total</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-1"></label>
                                                    <div class="col-md-11">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="vaciadoParcial" name="vaciadoParcial"  />
                                                            <label for="vaciadoParcial">Vaciado Parcial "Skimming"</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-1"></label>
                                                    <div class="col-md-11">
                                                        <div class="demo-checkbox">
                                                                <input type="checkbox" id="otros" name="otros"  />
                                                            <label for="otros">Otros sercicios (Favor de detallar en espacio de comentarios)</label>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-5">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-1"></label>
                                                    <div class="col-md-11">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="limpezaRegular" name="limpezaRegular"  />
                                                            <label for="limpezaRegular">Limpieza regular</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-1"></label>
                                                    <div class="col-md-11">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="inspeccion" name="inspeccion"  />
                                                            <label for="inspeccion">Limpieza con máquina de presión</label>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="box-title text-center">SERVICIOS REALIZADOS EN TRAMPA</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="interceptorAceite" name="interceptorAceite"  />
                                                            <label for="interceptorAceite">Interceptor aceites y grasas</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="tanqueAlmacenamiento" name="tanqueAlmacenamiento"  />
                                                            <label for="tanqueAlmacenamiento">Tanque almacenamiento desperdicio</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="pozoSeptico" name="pozoSeptico"  />
                                                            <label for="pozoSeptico">Pozo Séptico</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="estacionBombas" name="estacionBombas"  />
                                                            <label for="estacionBombas">Estación de Bombas</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="tanqueRecibidor" name="tanqueRecibidor"  />
                                                            <label for="tanqueRecibidor">Tanque Recibidor y/o Igualación</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="tanqueAceites" name="tanqueAceites"  />
                                                            <label for="tanqueAceites">Tanque Aceites Freidoras</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="otros1" name="otros1"  />
                                                            <label for="otros1">Otro</label>

                                                        </div>
                                                    </div>


                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="interior" name="interior"  />
                                                            <label for="interior">Interior</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="exterior" name="exterior"  />
                                                            <label for="exterior">Exterior</label>

                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="interiorExterior" name="interiorExterior"  />
                                                            <label for="interiorExterior">Interior y Exterior</label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
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
                                                            <input type="checkbox" id="limpiezaDerrameLiquido" name="limpiezaDerrameLiquido"  />
                                                            <label for="limpiezaDerrameLiquido">Limpieza y respuesta a derrame de líquidos no peligrosos
                                                        </div>

                                                    </div>
                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-10">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="limpiezaManhole" name="limpiezaManhole"  />
                                                            <label for="limpiezaManhole">Limpieza de "manhole" alcantarilla</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-10">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="limpiezaLiftStation" name="limpiezaLiftStation"  />
                                                            <label for="limpiezaLiftStation">Limpieza de "Lift Station" estación de bombeo</label>

                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-10">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="limpiezaTuberias" name="limpiezaTuberias"  />
                                                            <label for="limpiezaTuberias" style="min-width: 0px !important;">Limpieza de
                                                                <input type="text" name="limpiezaTuberiasNum" class="form-control" style="width: 50px !important; margin-top: -10px !important; margin-left: 0px"></label>
                                                            <label style="min-width: 0px !important; margin-left: 5px" for=""> pies lineales de tuberías</label>
                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-10">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="limpiezaregistrosDesagues" name="limpiezaregistrosDesagues"  />
                                                            <label for="limpiezaregistrosDesagues" style="min-width: 0px !important;">Limpieza de
                                                                <input type="text" name="limpiezaregistrosNum" class="form-control" style="width: 50px !important; margin-top: -10px !important; margin-left: 0px"></label>
                                                            <label style="min-width: 0px !important; margin-left: 5px" for=""> registros y <input type="text" name="limpiezaDesaguesNum" class="form-control" style="width: 50px !important; margin-top: -10px !important; margin-left: 5px"></label>
                                                            <label style="margin-left: 0px" for=""> desagues</label>
                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="remocionAcarreo" name="remocionAcarreo"  />
                                                            <label for="remocionAcarreo">Remoción y acarreo de desechos líquidos No peligrosos</label>
                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="remocionGrasas" name="remocionGrasas"  />
                                                            <label for="remocionGrasas">Remoción de grasas sólidas</label>
                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="otros2" name="otros2"  />
                                                            <label for="otros2">Otros servicios (Favor detallar en espacio de comentarios)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="box-title text-center">EQUIPOS UTILIZADOS  EQUIPO DE SEGURIDAD</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="vacuum" name="vacuum"  />
                                                            <label for="vacuum" style="min-width: 0px !important;">Vacuum No.
                                                                <input type="text" name="vacuumNum" class="form-control" style="width: 60px !important; margin-top: -10px !important; margin-left: 0px"></label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="vacuumPortable" name="vacuumPortable"  />
                                                            <label for="vacuumPortable">Vacuum Portable</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="waterJetter" name="waterJetter"  />
                                                            <label for="waterJetter">Water Jetter System</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="tankTruck" name="tankTruck"  />
                                                            <label for="tankTruck">Tank Truck</label>

                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="otros3" name="otros3"  />
                                                            <label for="otros3">Otros</label>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="coverAll" name="coverAll"  />
                                                            <label for="coverAll">Cover all</label>

                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="guantes" name="guantes"  />
                                                            <label for="guantes">Guantes</label>

                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="capacete" name="capacete"  />
                                                            <label for="capacete">Capacete</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="equipoEspacioConfinado" name="equipoEspacioConfinado"  />
                                                            <label for="equipoEspacioConfinado">Equipo espacio confinado</label>

                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="otros5" name="otros5"  />
                                                            <label for="otros5">Otros Equipos</label>

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>


                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="box-title text-center">COMENTARIO</h3>

                                        <div class="form-group">

                                            <textarea class="form-control" rows="5" name="comentario" placeholder=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3 class="box-title text-center">INFORMACION GENERAL DEL PRODUCTO RECOLECTADO</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-10">

                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="desechosLiquidos" name="desechosLiquidos"  />
                                                            <label for="desechosLiquidos">Desechos líquidos NO peligrosos de trampa de grasa</label>
                                                        </div>

                                                    </div>

                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-10">

                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="aguasResiduales" name="aguasResiduales"  />
                                                            <label for="aguasResiduales">Aguas residuales de estación de bombeo "LiftStation"</label>
                                                        </div>

                                                    </div>

                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-10">

                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="aceitesVegetales" name="aceitesVegetales"  />
                                                            <label for="aceitesVegetales">Aceites vegetales de freir</label>
                                                        </div>

                                                    </div>

                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-10">

                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="otros4" name="otros4"  />
                                                            <label for="otros4">Otros</label>
                                                        </div>

                                                    </div>

                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-10">
                                                        <label for="vacuum" style="min-width: 0px !important;">Total desperdiciado
                                                            <input type="text" name="totalDesperciado" class="form-control" style="width: 60px !important; margin-top: -10px !important; margin-left: 0px">
                                                        </label>
                                                        <label style="margin-left: 0px" for=""> gals.</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <h3 class="box-title text-center">SERVICIO REALIZADO POR</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-5">Supervisor de Turno</label>
                                                    <div class="col-md-7">
                                                        <p class="form-control-static"> <?php echo $datosUsuario["nombre"] ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-5">Técnico de Servicio:</label>
                                                    <div class="col-md-7">
                                                        <p class="form-control-static"> <?php echo $datosTecnico["nombre"] ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-5">Hora Entrada</label>
                                                    <div class="col-md-7">
                                                        <input class="form-control" type="time"  name="horaEntrada" value="<?php echo $incidencia["hora_inicio"] ?>"  readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-5">Hora Salida</label>
                                                    <div class="col-md-7">
                                                        <input class="form-control" type="time" name="horaSalida" required value="<?php echo date('H:i:s'); ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-6">Técnicos Adicionales</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="tecnicoAdicional" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-6">Firma</label>
                                                    <div class="col-md-6">
                                                        <div class="sig sigWrapper">
                                                            <canvas class="pad" width="275" height="90"></canvas>
                                                            <input type="hidden" name="output" class="output">
                                                            <div id="clear" class="text-center">
                                                                <button name="clear" type="clear" class="clearButton btn btn-warning" title="Limpiar"><i class="far fa-trash-alt"></i></button>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="box-title text-center">DESTINO FINAL DEL PRODUCTO</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-6">

                                        <div class="demo-checkbox">
                                            <input type="checkbox" id="planta_tratamiento" name="planta_tratamiento"  />
                                            <label for="planta_tratamiento">Planta de Tratamiento EPPR,<br>INC. Environmental Power <br>Carr. #1 Km. 116.2 Bo.Aruz<br>Juana Díaz, P.R. 00795<br>Núm. Facilidad JCA-DS-2ET-RP-39-0001
                                            <br>Núm. Identificación EPA PRR0000006866</label>
                                        </div>

                                    </div>

                                    <div class="col-md-5 ">

                                        <div class="demo-checkbox">
                                            <input type="checkbox" id="otra_facilidad" name="otra_facilidad"  />
                                            <label for="otra_facilidad">Otra facilidad de disposición</label>
                                        </div>

                                    </div>
                                </div>
                                <br>
                            </div>

                            <?php
                            $registrarServicio = new ControladorIncidencia();
                            $registrarServicio->ctrRegistroServicioGeneral();
                            ?>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" name="servicioGeneral"  class="btn btn-info"> <i class="fa fa-pencil"></i> Terminar</button>
<!--                                                <button type="button" class="btn btn-inverse">Cancelar</button>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
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




