<?php

$totalIncidencias = ControladorIncidencia::ctrContarIncidencias(null,null);

$totalIncidenciasCerrada = ControladorIncidencia::ctrContarIncidencias("estatus","cerrado");

$totalIncidenciasAsignado = ControladorIncidencia::ctrContarIncidencias("estatus","asignado");

$totalIncidenciasPendiente = ControladorIncidencia::ctrContarIncidencias("estatus","pendiente");

$listaVendedor = ControladorUsuarios::ctrListaUsuariosFiltro("perfil","Tecnico");

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
                <h3 class="text-themecolor m-b-0 m-t-0">Servicios</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Inicio</li>
                    <li class="breadcrumb-item active">Servicios</li>
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
                <div class="card">
                    <div class="card-body">

                        <div class="row m-t-40">
                            <!-- Column -->
                            <div class="col-md-6 col-lg-3 col-xlg-3">
                                <div class="card card-inverse card-info">
                                    <div class="box bg-info text-center">
                                        <h1 class="font-light text-white"><?php echo $totalIncidencias["cant"]; ?></h1>
                                        <h6 class="text-white">Total Servicios</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <div class="col-md-6 col-lg-3 col-xlg-3">
                                <div class="card card-primary card-inverse">
                                    <div class="box text-center">
                                        <h1 class="font-light text-white"><?php echo $totalIncidenciasCerrada["cant"]; ?></h1>
                                        <h6 class="text-white">Cerrado</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <div class="col-md-6 col-lg-3 col-xlg-3">
                                <div class="card card-inverse card-success">
                                    <div class="box text-center">
                                        <h1 class="font-light text-white"><?php echo $totalIncidenciasAsignado["cant"]; ?></h1>
                                        <h6 class="text-white">Asignado</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <div class="col-md-6 col-lg-3 col-xlg-3">
                                <div class="card card-inverse card-dark">
                                    <div class="box text-center">
                                        <h1 class="font-light text-white"><?php echo $totalIncidenciasPendiente["cant"]; ?></h1>
                                        <h6 class="text-white">Pendiente</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                        </div>

                        <ul class="nav nav-tabs customtab2" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#iniciar" role="tab" onclick="resizeDatatable()"><span class="hidden-sm-up">Iniciar</span> <span class="hidden-xs-down">Por iniciar</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#proceso" role="tab" onclick="resizeDatatable()"><span class="hidden-sm-up">Proceso</span> <span class="hidden-xs-down">En proceso</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#terminado" role="tab" onclick="resizeDatatable()"><span class="hidden-sm-up">Terminado</span> <span class="hidden-xs-down">Terminado</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#aprobado" role="tab" onclick="resizeDatatable()"><span class="hidden-sm-up">Aprobado</span> <span class="hidden-xs-down">Aprobado</span></a> </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="iniciar" role="tabpanel">
                                <div class="table-responsive m-t-40">
                                    <div class="col-lg-2 col-md-2">
                                        <button type="button" class="btn waves-effect waves-light btn-block btn-info" data-toggle="modal" id="CambiarOpcion2" data-target="#modalCambiarOpcion">* Cambiar Opción</button>
                                    </div>
                                    <table id="incidenciaAdminIniciar" class="table table-bordered table-striped dt-responsive tablas" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th style="width:10px">#</th>
                                                <th>* Acción por Lote</th>
                                                <!--                                    <th>Abierto por</th>-->
                                                <th>Cliente</th>
                                                <th>Direccion</th>
                                                <th>Tecnico</th>
                                                <th>Tipo Servicio</th>
                                                <th>Prioridad</th>
                                                <th>Fecha creacion</th>
                                                <th>Fecha visita</th>
<!--                                                <th>Estatus</th>-->
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $item = "estatus_incidencia";
                                        $valor = 0;
                                        $categorias = ControladorIncidencia::ctrMostrarIncidenciasFiltro($item,$valor, 0);
                                        foreach ($categorias as $key => $value) {
                                            //BUSCO EL USUARIO QUIEN CREO LA INCIDENCIA
                                            //$nombreUsuario = ControladorUsuarios::ctrMostrarUsuarios("id",$value["id_usuario"]);
                                            //BUSCO EL CLIENTE
                                            //$nombreCliente = ControladorClientes::ctrMostrarClientes("id",$value["id_cliente"]);
                                            //BUSCO EL TENICO
                                            //$nombreTecnico= ControladorUsuarios::ctrMostrarUsuarios("id",$value["id_tecnico"]);
                                            switch ($value["estatus"]) {
                                                case "pendiente":
                                                    $texto = "Pendiente";
                                                    $clase = "label label-warning";
                                                    $claseBoton="";
                                                    break;
                                                case "asignado":
                                                    $texto = "Asignado";
                                                    $clase = "label label-success";
                                                    $claseBoton="";
                                                    break;
                                                case "cerrado":
                                                    $texto = "Cerrado";
                                                    $clase = "label label-inverse";
                                                    $claseBoton="display: none"; //no se podra tomar acciones sobre incidencias que ya estan culminadas
                                                    break;
                                            }
                                            /*BOTON DE TEMPORIZADOR O ESTATUS DE LA INCIDENCIA SI ESTA EN PROCESO */
                                            switch ($value["estatus_incidencia"]){
                                                case "0":
                                                    $colorEstado = "btn-dark";
                                                    $textoEstado = "Por iniciar";
                                                    $estadoincidencia = "1";
                                                    $claseBoton="";
                                                    break;
                                                case "1":
                                                    $colorEstado = "btn-success";
                                                    $textoEstado = "En Proceso";
                                                    $estadoincidencia = "2";
                                                    $claseBoton="display: none";
                                                    break;
                                                case "2":
                                                    $colorEstado = "btn-primary";
                                                    $textoEstado = "Terminado";
                                                    $estadoincidencia = "3";
                                                    $claseBoton="display: none";
                                                    break;
                                            }

                                            $estatus_incidencia ="<span class='table-remove'><button type='button' class='btn ".$colorEstado." btn-sm my-0' >".$textoEstado."</button></span>";

                                            $selector = '<button type="button"  id_incidencia = "'.$value["id"].'" class="btn btn-success btn-sm marcar" data-toggle="button" aria-pressed="false" style="height: 26px !important;width:26px!important;padding:0!important;'.$claseBoton.'" >
                                                    <i class="ti-check text" aria-hidden="true"></i>
                                                    <span class="text"></span>
                                                    <i class="ti-check text-active" aria-hidden="true"></i>
                                                    <span class="text-active"></span>
                                                </button>';

                                            echo ' <tr>

                                            <td>'.($value["id"]).'</td>

                                            <td>'.($selector).'</td>
                                            
                                            <td>'.($value["alias"] .'-'.$value["documento"].'-'.$value["localizador"]).'</td> 

                                            <td>'.($value["direccionCliente"]).'</td>

                                            <td>'.(!empty($value["nombreTecnico"]) ? $value["nombreTecnico"] : "").'</td>

                                            <td>'.(str_replace("-"," ",$value["tipo_servicio"])).'</td>

                                            <td>'.($value["prioridad"]).'</td>
                                            
                                            <td>'.(date("m-d-Y", strtotime($value["fecha_creacion"]))).'</td>

                                            <td>'.(date("m-d-Y", strtotime($value["fecha_visita"]))).'</td>


                                            
                                            



                    <td>

                      <div class="btn-group">

                        <a href="detalle-incidencia/'.$value["id"].'" class="btn btn-warning" title="Ver detalle"><i class="fas fa-eye"></i></a>

                        <a href="#" class="btn btn-success btnImprimirIncidenciaTabla" idIncidencia="'.$value["id"].'" title="Imprimir"><i class="fas fa-print"></i></a>';


                                            if($_SESSION["perfil"] == "Administrador" && $texto != "Cerrado" && $estadoincidencia =="1"){

                                                echo '<button class="btn btn-danger btnEliminarincidencia" idIncidencia="'.$value["id"].'" title="Eliminar"><i class="fa fa-times"></i></button>';

                                            }

                                            echo '</div>

                    </td>

                  </tr>';
                                        }

                                        ?>

                                        </tbody>

                                    </table>
                                    <div class="col-lg-2 col-md-2">
                                        <button type="button" class="btn waves-effect waves-light btn-block btn-info" data-toggle="modal" id="CambiarOpcion" data-target="#modalCambiarOpcion">* Cambiar Opción</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane p-20" id="proceso" role="tabpanel">
                                <div class="table-responsive m-t-40">
                                    <table id="incidenciaAdminProceso" class="table table-bordered table-striped dt-responsive tablas" style="width: 100%;">

                                        <thead>

                                        <tr>

                                            <th style="width:10px">#</th>
                                            <th>* Acción por Lote</th>
                                            <!--                                    <th>Abierto por</th>-->
                                            <th>Cliente</th>
<!--                                            <th>Direccion</th>-->
                                            <th>Tecnico</th>
                                            <th>Tipo servicio</th>
<!--                                            <th>Prioridad</th>-->
<!--                                            <th>Fecha creacion</th>-->
                                            <th>Fecha visita</th>
<!--                                            <th>Estatus</th>-->

                                            <th>Acciones</th>



                                        </tr>

                                        </thead>

                                        <tbody>

                                        <?php

                                        $item = "estatus_incidencia";
                                        $valor = 1;

                                        $categorias = ControladorIncidencia::ctrMostrarIncidenciasFiltro($item,$valor, 0);

                                        foreach ($categorias as $key => $value) {

                                            //BUSCO EL USUARIO QUIEN CREO LA INCIDENCIA
                                            //$nombreUsuario = ControladorUsuarios::ctrMostrarUsuarios("id",$value["id_usuario"]);
                                            //BUSCO EL CLIENTE
                                            //$nombreCliente = ControladorClientes::ctrMostrarClientes("id",$value["id_cliente"]);
                                            //BUSCO EL TENICO
                                            //$nombreTecnico= ControladorUsuarios::ctrMostrarUsuarios("id",$value["id_tecnico"]);

                                            switch ($value["estatus"]) {
                                                case "pendiente":
                                                    $texto = "Pendiente";
                                                    $clase = "label label-warning";
                                                    $claseBoton="";
                                                    break;
                                                case "asignado":
                                                    $texto = "Asignado";
                                                    $clase = "label label-success";
                                                    $claseBoton="";
                                                    break;
                                                case "cerrado":
                                                    $texto = "Cerrado";
                                                    $clase = "label label-inverse";
                                                    $claseBoton="display: none"; //no se podra tomar acciones sobre incidencias que ya estan culminadas
                                                    break;
                                            }

                                            /*BOTON DE TEMPORIZADOR O ESTATUS DE LA INCIDENCIA SI ESTA EN PROCESO */

                                            switch ($value["estatus_incidencia"]){
                                                case "0":
                                                    $colorEstado = "btn-dark";
                                                    $textoEstado = "Por iniciar";
                                                    $estadoincidencia = "1";
                                                    $claseBoton="";
                                                    break;
                                                case "1":
                                                    $colorEstado = "btn-success";
                                                    $textoEstado = "En Proceso";
                                                    $estadoincidencia = "2";
                                                    $claseBoton="display: none";
                                                    break;
                                                case "2":
                                                    $colorEstado = "btn-primary";
                                                    $textoEstado = "Terminado";
                                                    $estadoincidencia = "3";
                                                    $claseBoton="display: none";
                                                    break;
                                            }

                                            $estatus_incidencia ="<span class='table-remove'><button type='button' class='btn ".$colorEstado." btn-sm my-0' >".$textoEstado."</button></span>";

                                            $selector = '<button type="button"  id_incidencia = "'.$value["id"].'" class="btn btn-success btn-sm marcar" data-toggle="button" aria-pressed="false" style="height: 26px !important;width:26px!important;padding:0!important;'.$claseBoton.'" >
                                                    <i class="ti-check text" aria-hidden="true"></i>
                                                    <span class="text"></span>
                                                    <i class="ti-check text-active" aria-hidden="true"></i>
                                                    <span class="text-active"></span>
                                                </button>';

                                            echo ' <tr>

                                            <td>'.($value["id"]).'</td>

                                            <td>'.($selector).'</td>
                                            
                                            <td>'.($value["alias"] .'-'.$value["documento"].'-'.$value["localizador"]).'</td>

                                            

                                            <td>'.($value["nombreTecnico"]).'</td>

                                            <td>'.(str_replace("-"," ",$value["tipo_servicio"])).'</td>

                                            

                                            

                                            <td>'.(date("m-d-Y", strtotime($value["fecha_visita"]))).'</td>

                                            
                                            
                                            



                    <td>

                      <div class="btn-group">

                        <a href="detalle-incidencia/'.$value["id"].'" class="btn btn-warning" title="Ver detalle"><i class="fas fa-eye"></i></a>

                        <a href="#" class="btn btn-success btnImprimirIncidenciaTabla" idIncidencia="'.$value["id"].'" title="Imprimir"><i class="fas fa-print"></i></a>';


                                            if($_SESSION["perfil"] == "Administrador" && $texto != "Cerrado" && $estadoincidencia =="1"){

                                                echo '<button class="btn btn-danger btnEliminarincidencia" idIncidencia="'.$value["id"].'" title="Eliminar"><i class="fa fa-times"></i></button>';

                                            }

                                            echo '</div>

                    </td>

                  </tr>';
                                        }

                                        ?>

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane p-20" id="terminado" role="tabpanel">
                                <div class="table-responsive m-t-40">
                                    <div class="col-lg-2 col-md-2">
                                        <button type="button" class="btn waves-effect waves-light btn-block btn-info" data-toggle="modal" id="CambiarOpcion3" data-target="#modalAprobar">* Aprobación</button>
                                    </div>
                                    <table id="incidenciaAdminTerminado" class="table table-bordered table-striped dt-responsive tablas" style="width: 100%;">

                                        <thead>

                                        <tr>

                                            <th style="width:10px">#</th>
                                            <th>* Acción por Lote</th>
                                            <!--                                    <th>Abierto por</th>-->
                                            <th>Cliente</th>
<!--                                            <th>Direccion</th>-->
                                            <th>Tecnico</th>
                                            <th>Tipo servicio</th>
<!--                                            <th>Prioridad</th>-->
<!--                                            <th>Fecha creacion</th>-->
<!--                                            <th>Fecha visita</th>-->
                                            <th>Fecha Terminado</th>
<!--                                            <th>Aprobado</th>-->
<!--                                            <th>Estatus</th>-->

                                            <th>Acciones</th>



                                        </tr>

                                        </thead>

                                        <tbody>

                                        <?php

                                        $item = "estatus_incidencia";
                                        $valor = 2;

                                        $categorias = ControladorIncidencia::ctrMostrarIncidenciasFiltro($item,$valor, 0);

                                        foreach ($categorias as $key => $value) {

                                            //BUSCO EL USUARIO QUIEN CREO LA INCIDENCIA
                                            //$nombreUsuario = ControladorUsuarios::ctrMostrarUsuarios("id",$value["id_usuario"]);
                                            //BUSCO EL CLIENTE
                                            //$nombreCliente = ControladorClientes::ctrMostrarClientes("id",$value["id_cliente"]);
                                            //BUSCO EL TENICO
                                            //$nombreTecnico= ControladorUsuarios::ctrMostrarUsuarios("id",$value["id_tecnico"]);

                                            switch ($value["estatus"]) {
                                                case "pendiente":
                                                    $texto = "Pendiente";
                                                    $clase = "label label-warning";
                                                    $claseBoton="";
                                                    break;
                                                case "asignado":
                                                    $texto = "Asignado";
                                                    $clase = "label label-success";
                                                    $claseBoton="";
                                                    break;
                                                case "cerrado":
                                                    $texto = "Cerrado";
                                                    $clase = "label label-inverse";
                                                    $claseBoton="display: none"; //no se podra tomar acciones sobre incidencias que ya estan culminadas
                                                    break;
                                            }

                                            /*BOTON DE TEMPORIZADOR O ESTATUS DE LA INCIDENCIA SI ESTA EN PROCESO */

                                            switch ($value["estatus_incidencia"]){
                                                case "0":
                                                    $colorEstado = "btn-dark";
                                                    $textoEstado = "Por iniciar";
                                                    $estadoincidencia = "1";
                                                    $claseBoton="";
                                                    break;
                                                case "1":
                                                    $colorEstado = "btn-success";
                                                    $textoEstado = "En Proceso";
                                                    $estadoincidencia = "2";
                                                    $claseBoton="display: none";
                                                    break;
                                                case "2":
                                                    $colorEstado = "btn-primary";
                                                    $textoEstado = "Terminado";
                                                    $estadoincidencia = "3";
                                                    $claseBoton="display: none";
                                                    break;
                                            }

                                            $estatus_incidencia ="<span class='table-remove'><button type='button' class='btn ".$colorEstado." btn-sm my-0' >".$textoEstado."</button></span>";

                                            $selector = '<button type="button"  id_incidencia = "'.$value["id"].'" class="btn btn-success btn-sm marcarAprobar" data-toggle="button" aria-pressed="false" style="height: 26px!important;width:26px!important;padding:0!important;" >
                                                    <i class="ti-check text" aria-hidden="true"></i>
                                                    <span class="text"></span>
                                                    <i class="ti-check text-active" aria-hidden="true"></i>
                                                    <span class="text-active"></span>
                                                </button>';

                                            echo ' <tr>

                                            <td>'.($value["id"]).'</td>

                                            <td>'.($value["aprobado"] == 0 ? ($selector) : "").'</td>
                                            
                                            <td>'.($value["alias"] .'-'.$value["documento"].'-'.$value["localizador"]).'</td>

                                            

                                            <td>'.($value["nombreTecnico"]).'</td>

                                            <td>'.(str_replace("-"," ",$value["tipo_servicio"])).'</td>

                                            

                                            
                                            
                                            <td>'.(date("m-d-Y", strtotime($value["fecha_resuelto"]))).'</td>
                                            
                                            

                                            
                                            
                                            



                    <td>

                      <div class="btn-group">

                        <a href="detalle-incidencia/'.$value["id"].'" class="btn btn-warning" title="Ver detalle"><i class="fas fa-eye"></i></a>

                        <a href="#" class="btn btn-success btnImprimirIncidenciaTabla" idIncidencia="'.$value["id"].'" title="Imprimir"><i class="fas fa-print"></i></a>';


                                            if($_SESSION["perfil"] == "Administrador" && $texto != "Cerrado" && $estadoincidencia =="1"){

                                                echo '<button class="btn btn-danger btnEliminarincidencia" idIncidencia="'.$value["id"].'" title="Eliminar"><i class="fa fa-times"></i></button>';

                                            }

                                            echo '</div>

                                            </td>
                        
                                          </tr>';
                                        }

                                        ?>

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane p-20" id="aprobado" role="tabpanel">
                                <div class="table-responsive m-t-40">
                                    <table id="incidenciaAdminAprobado" class="table table-bordered table-striped dt-responsive tablas collapsed" width="100%;">

                                        <thead>

                                        <tr>

                                            <th>#</th>
                                            <th>* Acción por Lote</th>
                                            <!--                                    <th>Abierto por</th>-->
                                            <th>Cliente</th>
<!--                                            <th>Direccion</th>-->
                                            <th>Tecnico</th>
                                            <th>Tipo servicio</th>
<!--                                            <th>Prioridad</th>-->
                                            <th>Fecha creacion</th>
                                            <th>Fecha visita</th>
                                            <th>Fecha Terminado</th>
<!--                                            <th>Aprobado</th>-->
<!--                                            <th>Estatus</th>-->

                                            <th>Acciones</th>



                                        </tr>

                                        </thead>

                                        <tbody>

                                        <?php

                                        $item = "estatus_incidencia";
                                        $valor = 2;

                                        $categorias = ControladorIncidencia::ctrMostrarIncidenciasFiltro($item,$valor, 1);

                                        foreach ($categorias as $key => $value) {

                                            //BUSCO EL USUARIO QUIEN CREO LA INCIDENCIA
                                            //$nombreUsuario = ControladorUsuarios::ctrMostrarUsuarios("id",$value["id_usuario"]);
                                            //BUSCO EL CLIENTE
                                            //$nombreCliente = ControladorClientes::ctrMostrarClientes("id",$value["id_cliente"]);
                                            //BUSCO EL TENICO
                                            //$nombreTecnico= ControladorUsuarios::ctrMostrarUsuarios("id",$value["id_tecnico"]);

                                            switch ($value["estatus"]) {
                                                case "pendiente":
                                                    $texto = "Pendiente";
                                                    $clase = "label label-warning";
                                                    $claseBoton="";
                                                    break;
                                                case "asignado":
                                                    $texto = "Asignado";
                                                    $clase = "label label-success";
                                                    $claseBoton="";
                                                    break;
                                                case "cerrado":
                                                    $texto = "Cerrado";
                                                    $clase = "label label-inverse";
                                                    $claseBoton="display: none"; //no se podra tomar acciones sobre incidencias que ya estan culminadas
                                                    break;
                                            }

                                            /*BOTON DE TEMPORIZADOR O ESTATUS DE LA INCIDENCIA SI ESTA EN PROCESO */

                                            switch ($value["estatus_incidencia"]){
                                                case "0":
                                                    $colorEstado = "btn-dark";
                                                    $textoEstado = "Por iniciar";
                                                    $estadoincidencia = "1";
                                                    $claseBoton="";
                                                    break;
                                                case "1":
                                                    $colorEstado = "btn-success";
                                                    $textoEstado = "En Proceso";
                                                    $estadoincidencia = "2";
                                                    $claseBoton="display: none";
                                                    break;
                                                case "2":
                                                    $colorEstado = "btn-primary";
                                                    $textoEstado = "Terminado";
                                                    $estadoincidencia = "3";
                                                    $claseBoton="display: none";
                                                    break;
                                            }

                                            $estatus_incidencia ="<span class='table-remove'><button type='button' class='btn ".$colorEstado." btn-sm my-0' >".$textoEstado."</button></span>";

                                            $selector = '<button type="button"  id_incidencia = "'.$value["id"].'" class="btn btn-success btn-sm marcarAprobar" data-toggle="button" aria-pressed="false" style="height: 26px!important;width:26px!important;padding:0!important;" >
                                                    <i class="ti-check text" aria-hidden="true"></i>
                                                    <span class="text"></span>
                                                    <i class="ti-check text-active" aria-hidden="true"></i>
                                                    <span class="text-active"></span>
                                                </button>';

                                            echo ' <tr>

                                            <td>'.($value["id"]).'</td>

                                            <td>'.($value["aprobado"] == 0 ? ($selector) : "").'</td>
                                            
                                            <td>'.($value["alias"] .'-'.$value["documento"].'-'.$value["localizador"]).'</td>

                                          

                                            <td>'.($value["nombreTecnico"]).'</td>

                                            <td>'.(str_replace("-"," ",$value["tipo_servicio"])).'</td>

                                          

                                            <td>'.(date("m-d-Y", strtotime($value["fecha_creacion"]))).'</td>

                                            <td>'.(date("m-d-Y", strtotime($value["fecha_visita"]))).'</td>
                                            
                                             <td>'.(date("m-d-Y", strtotime($value["fecha_resuelto"]))).'</td>

                                          
                                            
                    <td>

                      <div class="btn-group">

                        <a href="detalle-incidencia/'.$value["id"].'" class="btn btn-warning" title="Ver detalle"><i class="fas fa-eye"></i></a>

                        <a href="#" class="btn btn-success btnImprimirIncidenciaTabla" idIncidencia="'.$value["id"].'" title="Imprimir"><i class="fas fa-print"></i></a>';


                                            if($_SESSION["perfil"] == "Administrador" && $texto != "Cerrado" && $estadoincidencia =="1"){

                                                echo '<button class="btn btn-danger btnEliminarincidencia" idIncidencia="'.$value["id"].'" title="Eliminar"><i class="fa fa-times"></i></button>';

                                            }

                                            echo '</div>

                                            </td>
                        
                                          </tr>';
                                        }

                                        ?>

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

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

<!--=========================================
MODAL CAMBIAR FECHA, TECNICO O SUBIR ARCHIVOS
==========================================-->

<div class="modal fade" id="modalCambiarOpcion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#f14e01;">
                <h4 class="modal-title" id="exampleModalLabel1" style="color:white !important;">Opciones</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <!-- ENTRADA PARA EL NOMBRE -->
                    <div class="form-group">
                        <label class="pl-2" for=""> Servicios</label>
                        <div class="input-group">
                            <input type="text" class="form-control input-lg" name="actidIncidencias" id="actidIncidencias" value="" readonly>
                            <button type="submit" class="btn btn-danger" name="btnEliminarLoteIncidencia" id="btnEliminarLoteIncidencia" title="Eliminar lote"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="vtabs">
                        <ul class="nav nav-tabs tabs-vertical" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#fecha" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Fecha Visita</span> </a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#user" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Técnico</span></a> </li>
                        </ul>

                        <!-- Tab panes -->

                        <div class="tab-content">
                            <div class="tab-pane p-20 active" id="fecha" role="tabpanel">
                                <div class="form-group">

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="ti-calendar"></i>
                                            </span>
                                        </div>

                                        <input type="text" class="form-control mydatepicker" placeholder="Fecha visita" id="mdate" name="actFechaVisita" >
                                    </div>
                                </div>


                            </div>

                            <div class="tab-pane p-20" id="user" role="tabpanel">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-user"></i>
                                        </span>
                                    </div>

                                    <select class="form-control custom-select" id="actTecnico" name="actTecnico">

                                        <option value="">Asignar a:</option>

                                        <?php

                                        foreach ($listaVendedor as $key => $value) {

                                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                                        }

                                        ?>

                                    </select>
                                </div>

                            </div>
                        </div>


                    </div>
                    <span>SUBIR ARCHIVOS</span>
                    <div class="form-group">

                        <div class="form-row">
                            <input type="file" name="files" id="fotoArchivo" >
                        </div>

                    </div>

                    <div class="form-group">


                    </div>



                    <?php

                    $actualizarIncidencias = new ControladorIncidencia();
                    $actualizarIncidencias -> ctrActualizarOpcionesIncidencias();

                    ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary" name="actBotonOpcionesIncidencias">Actualizar servicios</button>
                </div>

            </form>

        </div>
    </div>
</div>

<!--=========================================
MODAL APROBAR FIRMA
==========================================-->

<div class="modal fade" id="modalAprobar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#f14e01;">
                <h4 class="modal-title" id="exampleModalLabel1" style="color:white !important;">Aprobación</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <!-- ENTRADA PARA EL NOMBRE -->
                    <div class="form-group">
                        <label class="pl-2" for=""> Los siguiente servicios se aprobaran</label>
                        <div class="input-group">
                            <input type="text" class="form-control input-lg" name="aprobarIncidencias" id="aprobarIncidencias" value="" readonly>

                        </div>
                    </div>

                    <?php

                    $actualizarIncidencias = new ControladorIncidencia();
                    $actualizarIncidencias -> ctrAprobarIncidencias();

                    ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary" name="actBotonAprobarIncidencias">Aprobar</button>
                </div>

            </form>

        </div>
    </div>
</div>

<!--=====================================
MODAL AGREGAR INCIDENCIA
======================================-->
<div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#3c8dbc;">
                <h4 class="modal-title" id="exampleModalLabel1" style="color:white !important;">Agregar usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <!-- ENTRADA PARA EL NOMBRE -->
                    <div class="form-group">

                        <div class="input-group">
                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="ti-user"></i>
                                                    </span>
                            </div>
                            <input type="text" class="form-control input-lg" name="nuevoNombre" id="exampleInputuname" placeholder="Ingresar nombre" required>
                        </div>
                    </div>

                    <!-- ENTRADA PARA EL USUARIO -->
                    <div class="form-group">

                        <div class="input-group">
                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="fa fa-key"></i>
                                                    </span>
                            </div>
                            <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required>
                        </div>
                    </div>

                    <!-- ENTRADA PARA LA CLAVE -->
                    <div class="form-group">

                        <div class="input-group">
                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="ti-lock"></i>
                                                    </span>
                            </div>

                            <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>
                        </div>
                    </div>
                    <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->
                    <div class="form-group">

                        <div class="input-group">
                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="fa fa-users"></i>
                                                    </span>
                            </div>
                            <select class="form-control custom-select" name="nuevoPerfil">

                                <option value="">Selecionar perfil</option>

                                <option value="Administrador">Administrador</option>

                                <option value="Especial">Especial</option>

                                <option value="Vendedor">Vendedor</option>
                            </select>
                        </div>
                    </div>
                    <!-- ENTRADA PARA SUBIR FOTO -->
                    <div class="form-group">

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">SUBIR FOTO</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input nuevaFoto" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="nuevaFoto">
                                <label class="custom-file-label form-control" for="inputGroupFile01">Seleccionar foto</label>
                            </div>

                        </div>
                    </div>
                    <p class="help-block">Peso máximo de la foto 2MB</p>

                    <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                    <?php

                    $crearUsuario = new ControladorUsuarios();
                    $crearUsuario -> ctrCrearUsuario();

                    ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar usuario</button>
                </div>

            </form>

        </div>
    </div>
</div>

<?php

//$borrarincidencia = new ControladorIncidencia();
//$borrarincidencia -> ctrEliminarIncidencia();

?>
<!--<script>-->
<!---->
<!--    $('#incidenciaAdmin').editableTableWidget().numericInputExample().find('td:first').focus();-->
<!---->
<!--</script>-->

