<?php

$id_usuario = $_SESSION["id"];

$totalIncidencias = ControladorIncidencia::ctrContarIncidencias("id_cliente",$id_usuario);

$totalIncidenciasCerrada = ControladorIncidencia::ctrContarIncidenciasTecnico("estatus","cerrado","id_cliente",$id_usuario);

$totalIncidenciasAsignado = ControladorIncidencia::ctrContarIncidenciasTecnico("estatus","asignado","id_cliente",$id_usuario);

$totalIncidenciasPendiente = ControladorIncidencia::ctrContarIncidenciasTecnico("estatus","pendiente","id_cliente",$id_usuario);


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
                <h3 class="text-themecolor m-b-0 m-t-0">Ticket Soporte</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Inicio</li>
                    <li class="breadcrumb-item active">Mis incidencias </li>
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
                                        <h6 class="text-white">Total Tickets</h6>
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

                        <div class="table-responsive m-t-40">
                            <table class="table table-bordered table-striped dt-responsive tablas tablaListaIncidencia">

                                <thead>

                                <tr>

                                    <th style="width:10px">#</th>
                                    <th>Abierto por</th>
                                    <th>Dirección</th>
                                    <th>Asunto</th>
                                    <th>Prioridad</th>
                                    <th>fecha visita</th>
                                    <th>Estatus</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>



                                </tr>

                                </thead>

                                <tbody>

                                <?php

                                $item = "id_cliente";
                                $valor = $id_usuario;

                                $categorias = ControladorIncidencia::ctrMostrarIncidenciasTecnico($item,$valor);

                                foreach ($categorias as $key => $value) {

                                    //BUSCO EL USUARIO QUIEN CREO LA INCIDENCIA
                                    $nombreUsuario = ControladorUsuarios::ctrMostrarUsuarios("id",$value["id_usuario"]);
                                    //BUSCO EL CLIENTE
                                    $nombreCliente = ControladorClientes::ctrMostrarClientes("id",$value["id_cliente"]);
                                    //BUSCO EL TENICO
                                    $nombreTecnico= ControladorUsuarios::ctrMostrarUsuarios("id",$value["id_tecnico"]);

                                    switch ($value["estatus"]) {
                                        case "pendiente":
                                            $texto = "Pendiente";
                                            $clase = "label label-warning";
                                            break;
                                        case "asignado":
                                            $texto = "Asignado";
                                            $clase = "label label-success";
                                            break;
                                        case "cerrado":
                                            $texto = "Cerrado";
                                            $clase = "label label-inverse";
                                            break;
                                    }

                                    /*BOTON DE TEMPORIZADOR O ESTATUS DE LA INCIDENCIA SI ESTA EN PROCESO */

                                     switch ($value["estatus_incidencia"]){
                                         case "0":
                                            $colorEstado = "btn-dark";
                                            $textoEstado = "Por iniciar";
                                            $estadoincidencia = "1";
                                             break;
                                         case "1":
                                             $colorEstado = "btn-success";
                                             $textoEstado = "En proceso";
                                             $estadoincidencia = "2";
                                             break;
                                         case "2":
                                             $colorEstado = "btn-primary";
                                             $textoEstado = "Terminado";
                                             $estadoincidencia = "3";
                                             break;
                                     }


                                    $estatus_incidencia ="<span class='table-remove'><button type='button' tipo_servicio ='".$value["tipo_servicio"]."'  id_incidencia='".$value["id"]."' class='btn ".$colorEstado." btn-sm my-0' estadoincidencia='".$estadoincidencia."'>".$textoEstado."</button></span>";


                                    echo ' <tr>

                                            <td>'.($value["id"]).'</td>

                                            <td>'.($nombreUsuario["nombre"]).'</td>

                                            <td>'.($nombreCliente["direccion"]).'</td>

                                            <td>'.($value["asunto"]).'</td>

                                            <td>'.($value["prioridad"]).'</td>

                                            <td>'.($value["fecha_visita"]).'</td>

                                            <td> <span class="'.$clase.'">'.($texto).'</span></td>
                                            
                                            <td>'.$estatus_incidencia.'</td>





                    <td>

                      <div class="btn-group">

                        <a href="detalle-incidencia-cliente/'.$value["id"].'" class="btn btn-warning" title="Ver detalle"><i class="fas fa-eye"></i></a>

                        <a href="#" class="btn btn-success btnImprimirIncidencia" idIncidencia="'.$value["id"].'" title="Imprimir"><i class="fas fa-print"></i></a>';


                                    if($_SESSION["perfil"] == "Administrador"){

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
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->

    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->

</div>


