<?php
//AQUI ES PARA MOSTRAR LA INCIDENCIA GENERADA Y SOLO CON EL BOTON IMPRIMIR

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
            <div class="col-md-5 col-12 align-self-center ">
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
                            <div class="col-md-6 col-sm-7 col-12 serv-center">
                                <h4 class="m-b-0 text-white">HOJA DE SERVICIO Y MANIFIESTO</h4>
                            </div>
                            <div class="col-md-6 col-sm-5 col-12 text-right serv-center">
                                <h5 class="m-b-0 text-white">Número: <?php echo str_pad($id_incidencia, 7, "0", STR_PAD_LEFT) ?></h5>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" role="form" method="post">

                            <input type="hidden" name="id_incidencia" value="<?php echo $id_incidencia ?>">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6 mb-1">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-4 col-5">Grupo:</label>
                                            <div class="col-md-8 col-7">
                                                <p class="form-control-static"> <?php echo $datosCliente["alias"] ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 mb-1">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-4 col-5">Fecha:</label>
                                            <div class="col-md-8 col-7">
                                                <p class="form-control-static">  <?php echo date_format(date_create($incidencia["fecha_visita"]),"m-d-Y") ?> </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6 mb-1">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-4 col-5">Dirección:</label>
                                            <div class="col-md-8 col-7">
                                                <p class="form-control-static"> <?php echo $incidencia["direccion"] ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 mb-1">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-4 col-5">Teléfono:</label>
                                            <div class="col-md-8 col-7">
                                                <p class="form-control-static"> <?php echo $datosCliente["telefono"] ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>

                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6 mb-4 mt-4">
                                        <h3 class="box-title text-center">SERVICIOS REGULARES DE REMOCION A TRAMPAS DE GRASA</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-1"></label>
                                                    <div class="col-md-11">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="vaciado" name="vaciado" <?php echo ($servicio["vaciado"] == "on") ? "checked" : "" ?> disabled />
                                                            <label for="vaciado">Vaciado Total</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-1"></label>
                                                    <div class="col-md-11">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="vaciadoParcial" name="vaciadoParcial"  <?php echo ($servicio["vaciado_parcial"] == "on") ? "checked" : "" ?> disabled />
                                                            <label for="vaciadoParcial">Vaciado Parcial "Skimming"</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-1"></label>
                                                    <div class="col-md-11">
                                                        <div class="demo-checkbox">
                                                                <input type="checkbox" id="otros" name="otros"  <?php echo ($servicio["otros"] == "on") ? "checked" : "" ?> disabled />
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
                                                            <input type="checkbox" id="limpezaRegular" name="limpezaRegular"  <?php echo ($servicio["limpeza_regular"] == "on") ? "checked" : "" ?> disabled />
                                                            <label for="limpezaRegular">Limpieza regular</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-1"></label>
                                                    <div class="col-md-11">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="inspeccion" name="inspeccion"  <?php echo ($servicio["inspeccion"] == "on") ? "checked" : "" ?> disabled />
                                                            <label for="inspeccion">Limpieza con máquina de presión</label>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4 mt-4">
                                        <h3 class="box-title text-center">SERVICIOS REALIZADOS EN TRAMPA</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="interceptorAceite" name="interceptorAceite"  <?php echo ($servicio["interceptor_aceite"] == "on") ? "checked" : "" ?> disabled />
                                                            <label for="interceptorAceite">Interceptor aceites y grasas</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="tanqueAlmacenamiento" name="tanqueAlmacenamiento"  <?php echo ($servicio["tanque_almacenamiento"] == "on") ? "checked" : "" ?> disabled />
                                                            <label for="tanqueAlmacenamiento">Tanque almacenamiento desperdicio</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="pozoSeptico" name="pozoSeptico" <?php echo ($servicio["pozo_septico"] == "on") ? "checked" : "" ?> disabled  />
                                                            <label for="pozoSeptico">Pozo Séptico</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="estacionBombas" name="estacionBombas" <?php echo ($servicio["estacion_bombas"] == "on") ? "checked" : "" ?> disabled  />
                                                            <label for="estacionBombas">Estación de Bombas</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="tanqueRecibidor" name="tanqueRecibidor" <?php echo ($servicio["tanque_recibidor"] == "on") ? "checked" : "" ?> disabled  />
                                                            <label for="tanqueRecibidor">Tanque Recibidor y/o Igualación</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="tanqueAceites" name="tanqueAceites" <?php echo ($servicio["tanque_aceites"] == "on") ? "checked" : "" ?> disabled  />
                                                            <label for="tanqueAceites">Tanque Aceites Freidoras</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="otros1" name="otros1" <?php echo ($servicio["otros1"] == "on") ? "checked" : "" ?> disabled  />
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
                                                            <input type="checkbox" id="interior" name="interior" <?php echo ($servicio["interior"] == "on") ? "checked" : "" ?> disabled   />
                                                            <label for="interior">Interior</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="exterior" name="exterior" <?php echo ($servicio["exterior"] == "on") ? "checked" : "" ?> disabled  />
                                                            <label for="exterior">Exterior</label>

                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="interiorExterior" name="interiorExterior" <?php echo ($servicio["interior_exterior"] == "on") ? "checked" : "" ?> disabled  />
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
                                                            <input type="checkbox" id="limpiezaDerrameLiquido" name="limpiezaDerrameLiquido" <?php echo ($servicio["limpieza_derrame_liquido"] == "on") ? "checked" : "" ?> disabled  />
                                                            <label for="limpiezaDerrameLiquido">Limpieza y respuesta a derrame de líquidos no peligrosos
                                                        </div>

                                                    </div>
                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-10">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="limpiezaManhole" name="limpiezaManhole" <?php echo ($servicio["limpieza_manhole"] == "on") ? "checked" : "" ?> disabled   />
                                                            <label for="limpiezaManhole">Limpieza de "manhole" alcantarilla</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-10">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="limpiezaLiftStation" name="limpiezaLiftStation" <?php echo ($servicio["limpieza_lift_station"] == "on") ? "checked" : "" ?> disabled   />
                                                            <label for="limpiezaLiftStation">Limpieza de "Lift Station" estación de bombeo</label>

                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-10">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="limpiezaTuberias" name="limpiezaTuberias" <?php echo ($servicio["limpieza_tuberias"] == "on") ? "checked" : "" ?> disabled  />
                                                            <label for="limpiezaTuberias" style="min-width: 0px !important;">Limpieza de
                                                                <input type="text" name="limpiezaTuberiasNum" class="form-control" value="<?php echo $servicio["limpieza_tuberias_num"]?>" disabled  style="width: 50px !important; margin-top: -10px !important; margin-left: 0px"></label>
                                                            <label style="min-width: 0px !important; margin-left: 5px" for=""> pies lineales de tuberías</label>
                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-10">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="limpiezaregistrosDesagues" name="limpiezaregistrosDesagues" <?php echo ($servicio["limpieza_registros_desagues"] == "on") ? "checked" : "" ?> disabled  />
                                                            <label for="limpiezaregistrosDesagues" style="min-width: 0px !important;">Limpieza de
                                                                <input type="text" name="limpiezaregistrosNum" class="form-control" value="<?php echo $servicio["limpieza_registros_num"]?>" disabled  style="width: 50px !important; margin-top: -10px !important; margin-left: 0px"></label>
                                                            <label style="min-width: 0px !important; margin-left: 5px" for=""> registros y <input type="text" name="limpiezaDesaguesNum" value="<?php echo $servicio["limpieza_desagues_num"]?>" disabled  class="form-control" style="width: 50px !important; margin-top: -10px !important; margin-left: 5px"></label>
                                                            <label style="margin-left: 0px" for=""> desagues</label>
                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="remocionAcarreo" name="remocionAcarreo" <?php echo ($servicio["remocion_acarreo"] == "on") ? "checked" : "" ?> disabled   />
                                                            <label for="remocionAcarreo">Remoción y acarreo de desechos líquidos No peligrosos</label>
                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="remocionGrasas" name="remocionGrasas" <?php echo ($servicio["remocion_grasas"] == "on") ? "checked" : "" ?> disabled  />
                                                            <label for="remocionGrasas">Remoción de grasas sólidas</label>
                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="otros2" name="otros2" <?php echo ($servicio["otros2"] == "on") ? "checked" : "" ?> disabled  />
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
                                                            <input type="checkbox" id="vacuum" name="vacuum" <?php echo ($servicio["vacuum"] == "on") ? "checked" : "" ?> disabled  />
                                                            <label for="vacuum" style="min-width: 0px !important;">Vacuum No.
                                                                <input type="text" name="vacuumNum" class="form-control" value="<?php echo $servicio["vacuumNum"]?>" disabled  style="width: 60px !important; margin-top: -10px !important; margin-left: 0px"></label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="vacuumPortable" name="vacuumPortable" <?php echo ($servicio["vacuum_portable"] == "on") ? "checked" : "" ?> disabled  />
                                                            <label for="vacuumPortable">Vacuum Portable</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="waterJetter" name="waterJetter" <?php echo ($servicio["water_jetter"] == "on") ? "checked" : "" ?> disabled   />
                                                            <label for="waterJetter">Water Jetter System</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="tankTruck" name="tankTruck" <?php echo ($servicio["tanktruck"] == "on") ? "checked" : "" ?> disabled   />
                                                            <label for="tankTruck">Tank Truck</label>

                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="otros3" name="otros3" <?php echo ($servicio["otros3"] == "on") ? "checked" : "" ?> disabled   />
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
                                                            <input type="checkbox" id="coverAll" name="coverAll" <?php echo ($servicio["coverAll"] == "on") ? "checked" : "" ?> disabled   />
                                                            <label for="coverAll">Cover all</label>

                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="guantes" name="guantes" <?php echo ($servicio["guantes"] == "on") ? "checked" : "" ?> disabled   />
                                                            <label for="guantes">Guantes</label>

                                                        </div>
                                                    </div>

                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="capacete" name="capacete" <?php echo ($servicio["capacete"] == "on") ? "checked" : "" ?> disabled  />
                                                            <label for="capacete">Capacete</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="equipoEspacioConfinado" name="equipoEspacioConfinado" <?php echo ($servicio["equipo_espacio_confinado"] == "on") ? "checked" : "" ?> disabled  />
                                                            <label for="equipoEspacioConfinado">Equipo espacio confinado</label>

                                                        </div>
                                                    </div>
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="otros5" name="otros5" <?php echo ($servicio["otros5"] == "on") ? "checked" : "" ?> disabled  />
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

                                            <textarea class="form-control" rows="5" name="comentario" placeholder="" disabled ><?php echo $servicio["comentario"] ?> </textarea>
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
                                                            <input type="checkbox" id="desechosLiquidos" name="desechosLiquidos" <?php echo ($servicio["desechos_liquidos"] == "on") ? "checked" : "" ?> disabled  />
                                                            <label for="desechosLiquidos">Desechos líquidos NO peligrosos de trampa de grasa</label>
                                                        </div>

                                                    </div>

                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-10">

                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="aguasResiduales" name="aguasResiduales" <?php echo ($servicio["aguas_residuales"] == "on") ? "checked" : "" ?> disabled  />
                                                            <label for="aguasResiduales">Aguas residuales de estación de bombeo "LiftStation"</label>
                                                        </div>

                                                    </div>

                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-10">

                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="aceitesVegetales" name="aceitesVegetales" <?php echo ($servicio["aceites_vegetales"] == "on") ? "checked" : "" ?> disabled   />
                                                            <label for="aceitesVegetales">Aceites vegetales de freir</label>
                                                        </div>

                                                    </div>

                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-10">

                                                        <div class="demo-checkbox">
                                                            <input type="checkbox" id="otros4" name="otros4" <?php echo ($servicio["otros4"] == "on") ? "checked" : "" ?> disabled  />
                                                            <label for="otros4">Otros</label>
                                                        </div>

                                                    </div>

                                                    <label class="control-label text-right col-md-2"></label>
                                                    <div class="col-md-10">
                                                        <label for="vacuum" style="min-width: 0px !important;">Total desperdiciado
                                                            <input type="text" name="totalDesperciado" class="form-control" value="<?php echo $servicio["total_desperciado"] ?>"  disabled  style="width: 60px !important; margin-top: -10px !important; margin-left: 0px">
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
                                                        <p class="form-control-static"> <?php echo "Miguel Velazquez" //$datosUsuario["nombre"] ?> </p>
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
                                                        <input class="form-control" type="time"  name="horaEntrada" value="<?php echo $incidencia["hora_inicio"] ?>"  disabled >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-5">Hora Salida</label>
                                                    <div class="col-md-7">
                                                        <input class="form-control" type="time" name="horaSalida" required value="<?php echo $incidencia["hora_fin"] ?>" disabled >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-6">Técnicos Adicionales</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="tecnicoAdicional" class="form-control" value="<?php echo $servicio["tecnico_adicional"] ?>"  disabled >
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-5">Firma del cliente</label>
                                            <div class="col-md-7">
                                                <img src="<?php echo $url.'vistas/img/firmas/'.$id_incidencia.'.png' ?>" style="height: 100px; width: 100px;">
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
                                            <input type="checkbox" id="planta_tratamiento" name="planta_tratamiento" <?php echo ($servicio["planta_tratamiento"] == "on") ? "checked" : "" ?> disabled />
                                            <label for="planta_tratamiento">Planta de Tratamiento EPPR,<br>INC. Environmental Power <br>Carr. #1 Km. 116.2 Bo.Aruz<br>Juana Díaz, P.R. 00795<br>Núm. Facilidad JCA-DS-2ET-RP-39-0001
                                                <br>Núm. Identificación EPA PRR0000006866</label>
                                        </div>

                                    </div>

                                    <div class="col-md-5 ">

                                        <div class="demo-checkbox">
                                            <input type="checkbox" id="otra_facilidad" name="otra_facilidad" <?php echo ($servicio["otra_facilidad"] == "on") ? "checked" : "" ?> disabled  />
                                            <label for="otra_facilidad">Otra facilidad de disposición</label>
                                        </div>

                                    </div>
                                </div>
                                <br>
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

                                        </div>
                                        <br>
                                        <label class="control-label text-right col-md-5"><?= $incidencia["nombre_usuario_aprobado"] ?> </label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-1">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4 col-5">Fecha Aprobacion:</label>
                                        <div class="col-md-8 col-7">
                                            <p class="form-control-static">  <?= ($incidencia["aprobado"]==1 ? date_format(date_create($incidencia["fecha_modif"]),"m-d-Y") : "") ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <a href="#" class="btn btn-success m-t-20 btnImprimirIncidenciaServicio" id="imprimirIncidenciaServicio" tipoServicio ="<?php echo $incidencia["tipo_servicio"]; ?>"  idIncidencia="<?php echo $incidencia["id"]; ?>"><i class="fa fa-print"></i> Imprimir</a>
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




