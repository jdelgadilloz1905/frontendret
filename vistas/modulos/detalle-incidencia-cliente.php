<?php
//AQUI SE DEBE COLOCAR UNA VALIDACION POR SI EL USUARIO DECIDE COLCOAR LA URL MANUAL POR SI DESEA MODIFICAR ALGO

$url = Ruta::ctrRuta();

$rutas = explode("/", $_GET["ruta"]);

$id_incidencia = isset($rutas[1]) ? $rutas[1] : "";

$incidencia = ControladorIncidencia::ctrMostrarIncidencias("id",$id_incidencia);

$listaCliente = ControladorClientes::ctrMostrarClientes(null,null);

$listaVendedor = ControladorUsuarios::ctrListaUsuariosFiltro("perfil","Tecnico");

//Busco el usuario quien creo la incidencia
$datosUsuario = ControladorUsuarios::ctrMostrarUsuarios("id",$incidencia["id_usuario"]);

//Busco los datos del cliente

$datosCliente = ControladorClientes::ctrMostrarClientes("id",$incidencia["id_cliente"]);

//Busco los datos del tecnico

$datosTecnico = ControladorUsuarios::ctrMostrarUsuarios("id",$incidencia["id_tecnico"]);

if($_SESSION["perfil"]=="Administrador"){

    $read = "";
}else{

    $read = "disabled";
}



?>

<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-12 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Detalle incidencia</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Inicio</li>
                    <li class="breadcrumb-item active">Detalle incidencia</li>
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
                        <form role="form" method="post" enctype="multipart/form-data">
                            <?php

                            if($incidencia["hora_inicio"]!= "00:00:00" and $incidencia["hora_fin"] == "00:00:00") {

                                echo '<div class="alert alert-info">
                                        <h3 class="text-info"><i class="fa fa-exclamation-circle"></i> Información</h3> Esta incidencia esta siendo atendida en este momento por el Técnico <b>'.$datosTecnico["nombre"].'</b>
                                    </div>';
                            }
                            ?>


                            <h3 class="card-title">Detalle incidencia</h3>

                            <div class="row form-group">
                                <div class="col-md-9 mt-3">
                                    <label class="pl-2" for=""> Supervisor</label>
                                    <div class="input-group">
                                        <input class="form-control " type="text" name="editSupervisor" id=editSupervisor" value="<?php echo $datosUsuario["nombre"] ?>" readonly>
                                        <input type="hidden" value="<?php echo $incidencia["id"] ?>" id="editIdincidencia" name="editIdincidencia">

                                    </div>
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label class="pl-2" for=""> Tipo de Servicio</label>
                                    <div class="input-group">
                                        <select class="form-control custom-select" name="editTipoServicio" id="editTipoServicio" required <?php echo $read ?>>

                                            <?php
                                                switch($incidencia["tipo_servicio"]){
                                                    case "plomeria":
                                                        echo '<option value="'.$incidencia["tipo_servicio"].'">Plomeria</option>
                                                            <option value="recogido-de-liquido">Recogido de liquido</option>
                                                            <option value="limpieza-de-campana">Limpieza de campana</option>';
                                                        break;
                                                    case "recogido-de-liquido":
                                                        echo '<option value="'.$incidencia["tipo_servicio"].'">Recogido de liquido</option>
                                                            <option value="plomeria">Plomeria</option>
                                                            <option value="limpieza-de-campana">Limpieza de campana</option>';
                                                        break;
                                                    case "limpieza-de-campana":
                                                        echo '<option value="'.$incidencia["tipo_servicio"].'">Limpieza de campana</option>
                                                                <option value="plomeria">Plomeria</option>
                                                                <option value="recogido-de-liquido">Recogido de liquido</option>';
                                                        break;
                                                }
                                            ?>

                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row form-group">
                                <div class="col-md-10 mt-3">
                                    <label class="pl-2" for=""> Nombre Cliente</label>
                                    <select class="form-control custom-select" id="editclienteInc" name="editclienteInc" <?php echo $read ?> required>

                                        <?php

                                            echo '<option value="'.$incidencia["id_cliente"].'">'.$datosCliente["nombre"].'</option>';

                                            foreach ($listaCliente as $key => $value) {

                                                echo '<option value="'.$value["id"].'">'.$value["nombre"].' - '.$value["direccion"].'</option>';

                                            }

                                        ?>

                                    </select>


                                </div>
<!--                                <div class="col-md-2">-->
<!--                                    <button type="button" class="btn waves-effect waves-light btn-block btn-info" data-toggle="modal" data-target="#modalAgregarCliente">Agregar cliente</button>-->
<!--                                </div>-->

                            </div>

                            <div class="row form-group">
                                <div class="col-md-10 mt-3">
                                    <label class="pl-2" for=""> Dirección</label>
                                    <div class="input-group">
                                        <input class="form-control" name="editDireccion" id="editDireccion" value="<?php echo $incidencia["direccion"] ?>" readonly>

                                    </div>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <label class="pl-2" for=""> Fecha Visita</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control mydatepicker" value="<?php echo date("m-d-Y", strtotime($incidencia["fecha_visita"])) ?>" id="mdate" name="editFechaVisita" <?php echo $read ?> required>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mt-3">
                                    <label class="pl-2" for=""> Asunto</label>
                                    <div class="input-group">
                                        <input class="form-control" name="editAsunto" id="editAsunto" value="<?php echo $incidencia["asunto"] ?>" <?php echo $read ?> required>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-9 mt-3 margin-bot">

                                    <label class="pl-2" for=""> Nombre del Técnico</label>
                                    <select class="form-control custom-select" id="editTecnico" name="editTecnico" <?php echo $read ?>>

                                        <?php
                                        if(empty($incidencia["id_tecnico"])){

                                            echo '<option value="">Seleccione un Técnico</option>';

                                        }else{

                                            echo '<option value="'.$incidencia["id_tecnico"].'">'.$datosTecnico["nombre"].'</option>';
                                            echo '<option value="">Seleccione un Técnico</option>';
                                        }


                                        foreach ($listaVendedor as $key => $value) {

                                            if($incidencia["id_tecnico"]==$value["id"]){

                                            }else{

                                                echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                                            }

                                        }

                                        ?>

                                    </select>

                                </div>
                                <div class="col-md-3 mt-3 margin-bot margin-b-2">
                                    <label class="pl-2" for=""> Prioridad</label>
                                    <div class="input-group">
                                        <select class="form-control custom-select" name="editPrioridad" <?php echo $read ?> required>

                                            <?php
                                            switch($incidencia["prioridad"]){
                                                case "baja":
                                                    echo '  <option value="baja">Baja</option>
                                                            <option value="normal">Normal</option>
                                                            <option value="alta">Alta</option>';
                                                    break;
                                                case "normal":
                                                    echo '<option value="normal">Normal</option>
                                                            <option value="baja">Baja</option>
                                                          <option value="alta">Alta</option>';
                                                    break;
                                                case "alta":
                                                    echo '<option value="alta">Alta</option>
                                                          <option value="baja">Baja</option>
                                                          <option value="normal">Normal</option>';
                                                    break;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group">
                                <textarea class="textarea_editor form-control" rows="15"  <?php echo $read ?> name="editDescripcion" id="editDescripcion"><?php echo $incidencia["descripcion"] ?></textarea>
                            </div>
                            <br>
                                <!-- ARCHIVOS CARGADOS -->
                                <div class="form-group">

                                    <label class="mt-2" for=""> Archivos</label>

                                    <?php
                                    if($_SESSION["perfil"] == "Administrador") {

                                        echo '<button type="submit" class="btn btn-success " name="actualizarArchivos"><i class="fa fa-upload"></i> Cargar</button>';
                                    }
                                    //BUSCO LAS FOTOS DE LA INCIDENCIA ANTES
                                    $imagenesArchivo = ControladorIncidencia::ctrMostrarImagenesIncidencia($id_incidencia,"archivo");

                                    $uploadDir = 'vistas/img/archivos/';

                                    if(count($imagenesArchivo)>0){

                                        foreach($imagenesArchivo as $file) {

                                            $preloadedFiles[]= array(
                                                "name" => $file["nombre"],
                                                "type" => FileUploader::mime_content_type($uploadDir . $file["nombre"]),
                                                "size" => filesize($uploadDir . $file["nombre"]),
                                                "file" => '../' . $uploadDir . $file["nombre"], // should the same as on the front-end
                                                "data" => array(
                                                    "url" => $url . $uploadDir . $file["nombre"],
                                                    "id_incidencia"=> $file["id_incidencia"],
                                                    "id"=> $file["id"],
                                                    "ruta_imagen"=>$file["img_url"],
                                                    "origen"=>'detalle-incidencia',
                                                    "titulo"=>$file["titulo"],
                                                    "perfil"=>$_SESSION["perfil"]
                                                )
                                            );
                                        }

                                        // convert our array into json string
                                        $preloadedFiles = json_encode($preloadedFiles);

                                        $read = ($_SESSION["perfil"] == "Administrador") ? "" : "disabled";

                                        ?>
                                        <div class="form-row">

                                            <input type="file" id="fotoArchivos" name="files" data-fileuploader-files='<?php echo $preloadedFiles;?>' data-fileuploader-limit="<?php echo ($_SESSION["perfil"] == "Administrador")? "3" :count($imagenesArchivo) ?>" <?php echo $read ?>>

                                        </div>
                                    <?php  }else{ ?>

                                        <div class="form-row">
                                            <input type="file" name="files" id="fotoArchivos" <?php echo $read ?>>
                                        </div>

                                    <?php } ?>

                                </div>

                            <div class="center-mov">
                                <?php

                                    $crearincidencia = new ControladorIncidencia();
                                    $crearincidencia ->ctrActualizarIncidencia();

                                if($incidencia["hora_inicio"]== "00:00:00" and $_SESSION["perfil"] == "Administrador") {

                                    echo '<button type="submit" class="btn btn-primary m-t-20" name="actualizarCompleto"><i class="fas fa-sync-alt"></i> Actualizar servicio</button>';
                                }

                                if($incidencia["estatus_incidencia"]==2){

                                    if($_SESSION["perfil"] == "Administrador"){

                                        echo '<a href="#" class="btn btn-info m-t-20 " id="verGenerarPlanilla" tipo_servicio = "'.$incidencia["tipo_servicio"].'" id_incidencia="'.$incidencia["id"].'"> <i class="fas fa-eye"></i> Ver Planilla de Servicio</a>';

                                    }else{
                                        if($incidencia["estatus_incidencia"] == 2){

                                            echo '<a href="#" class="btn btn-info m-t-20 " id="verGenerarPlanilla" tipo_servicio = "'.$incidencia["tipo_servicio"].'" id_incidencia="'.$incidencia["id"].'"> <i class="fas fa-eye"></i> Ver Planilla de Servicio</a>';
                                        }else{

                                            echo '<a href="#" class="btn btn-info m-t-20 " id="generarPlanilla" tipo_servicio = "'.$incidencia["tipo_servicio"].'" id_incidencia="'.$incidencia["id"].'"> <i class="far fa-file-alt"></i> Generar Planilla de Servicio </a>';
                                        }

                                    }


                                }
                                ?>


                                <a href="#" class="btn btn-success m-t-20 btnImprimirIncidencia" id="imprimirIncidencia" idIncidencia="<?php echo $incidencia["id"]; ?>"><i class="fa fa-print"></i> Imprimir</a>


                                <?php
                                if($_SESSION["perfil"] == "Cliente"){

                                    echo '<a href="#" class="btn btn-warning m-t-20" title="Ver fotos" data-toggle="modal" data-target="#modalVerFotos" ><i class="fa fa-eye" aria-hidden="true"></i> Ver Fotos</a>';

                                    echo '<a href="'.$url.'admin-incidencia" class="btn btn-secondary m-t-20" style="margin-left: 6px"><i class="fas fa-undo-alt"></i> Regresar</a>';
                                }
                                ?>
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
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
<!--=====================================
MODAL VER FOTOS
======================================-->

<div class="modal fade" id="modalVerFotos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#f14e01;">
                <h4 class="modal-title" id="exampleModalLabel1" style="color:white !important;">FOTOS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form role="form" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id_incidencia" value="<?php echo $incidencia["id"]; ?>">
                <input type="hidden" name="minimal-radio" value="antes">
                <div class="modal-body">

                    <!-- FOTOS ANTES -->
                    <div class="form-group">

                        <span>ANTES</span>
                        <br>
                        <?php
                        //BUSCO LAS FOTOS DE LA INCIDENCIA ANTES
                        $imagenesAntes = ControladorIncidencia::ctrMostrarImagenesIncidencia($id_incidencia,"antes");

                        $uploadDir = 'vistas/img/incidencias/';

                        if(count($imagenesAntes)>0){

                            foreach($imagenesAntes as $file) {

                                $preloadedFiles[]= array(
                                    "name" => $file["nombre"],
                                    "type" => FileUploader::mime_content_type($uploadDir . $file["nombre"]),
                                    "size" => filesize($uploadDir . $file["nombre"]),
                                    "file" => '../' . $uploadDir . $file["nombre"], // should the same as on the front-end
                                    "data" => array(
                                        "url" => $url . $uploadDir . $file["nombre"],
                                        "id_incidencia"=> $file["id_incidencia"],
                                        "id"=> $file["id"],
                                        "ruta_imagen"=>$file["img_url"],
                                        "origen"=>'detalle-incidencia-cliente',
                                    )
                                );
                            }

                            // convert our array into json string
                            $preloadedFiles = json_encode($preloadedFiles);


                        ?>
                            <div class="form-row">

                                <input type="file" id="fotoAntes" name="files" data-fileuploader-files='<?php echo $preloadedFiles;?>' data-fileuploader-limit="<?php echo count($imagenesAntes) ?>">

                            </div>
                 <?php  }else{ ?>

                        <div class="form-row">
                            <input type="file" name="files" id="fotoAntes" required>
                        </div>

                 <?php } ?>

                    </div>

                </div>
                <div class="modal-footer" style="display: none">

                    <button type="submit" class="btn btn-info " name="guardarFotos">Actualizar </button>
                </div>

                <?php

                $insertarFotos = new ControladorIncidencia();
                $insertarFotos->ctrInsertarFotosIncidencia();
                ?>
           </form>


            <!-- FOTOS DESPUES -->
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <input type="hidden" name="id_incidencia" value="<?php echo $incidencia["id"]; ?>">
                    <input type="hidden" name="minimal-radio" value="despues">


                    <div class="form-group">

                        <span>DESPUES</span>
                        <br>

                        <?php
                        //BUSCO LAS FOTOS DE LA INCIDENCIA ANTES
                        $imagenesDespues = ControladorIncidencia::ctrMostrarImagenesIncidencia($id_incidencia,"despues");

                        $uploadDir = 'vistas/img/incidencias/';
                        if(count($imagenesDespues)>0){
                            foreach($imagenesDespues as $file) {

                                $preloadedFiles1[]= array(
                                    "name" => $file["nombre"],
                                    "type" => FileUploader::mime_content_type($uploadDir . $file["nombre"]),
                                    "size" => filesize($uploadDir . $file["nombre"]),
                                    "file" => '../' . $uploadDir . $file["nombre"], // should the same as on the front-end
                                    "data" => array(
                                        "url" => $url . $uploadDir . $file["nombre"],
                                        "id_incidencia"=> $file["id_incidencia"],
                                        "id"=> $file["id"],
                                        "ruta_imagen"=>$file["img_url"],
                                        "origen"=>'detalle-incidencia-cliente',
                                    )
                                );
                            }
                            // convert our array into json string
                            $preloadedFiles1 = json_encode($preloadedFiles1);


                        ?>
                        <div class="form-row">

                            <input type="file" id="fotoDespues" name="files" data-fileuploader-files='<?php echo $preloadedFiles1;?>' data-fileuploader-limit="<?php echo count($imagenesDespues) ?>">

                        </div>

                        <?php  }else{ ?>

                            <div class="form-row">
                                <input type="file" name="files" id="fotoDespues" required>
                            </div>

                        <?php } ?>
                    </div>



                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-default"  data-dismiss="modal">Cerrar</button>
                    <button style="display: none" type="submit" class="btn btn-info " name="guardarFotos">Actualizar </button>

                </div>

                <?php

                $insertarFotos = new ControladorIncidencia();
                $insertarFotos->ctrInsertarFotosIncidencia();
                ?>
            </form>

        </div>
    </div>
</div>


<!--=====================================
MODAL SUBIR FOTOS
======================================-->
<div class="modal fade" id="modalSubirFotos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#f14e01;">
                <h4 class="modal-title" id="exampleModalLabel1" style="color:white !important;">Fotos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form role="form" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id_incidencia" value="<?php echo $incidencia["id"]; ?>">
                <div class="modal-body">
                    <div class="alert alert-info">
                        <h3 class="text-info"><i class="fa fa-exclamation-circle"></i> Información</h3> Seleccione una opción para realizar la carga de fotos
                    </div>
                    <div class="form-group message">
                        <div class="input-group">
                            <ul class="icheck-list" style="display: inline-flex">
                                <li>
                                    <input tabindex="7" type="radio" class="check micheckbox" id="minimal-radio-1" name="minimal-radio" value="antes">
                                    <label for="minimal-radio-1">Antes </label>
                                </li>
                                <li>
                                    <input tabindex="8" type="radio" class="check micheckbox" id="minimal-radio-2" name="minimal-radio" value="despues">
                                    <label for="minimal-radio-2">Despues </label>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <!-- FOTOS ANTES -->
                    <div class="form-group">

                        <span>SUBIR FOTOS</span>
                        <br>

                        <div class="form-row">
                            <!-- file input -->
                            <input type="file" name="files" id="fotoCarga">
                        </div>
                    </div>


                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-info validarFotos" name="guardarFotos">Guardar </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>

                <?php

                $insertarFotos = new ControladorIncidencia();
                $insertarFotos->ctrInsertarFotosIncidencia();

                ?>

            </form>

        </div>
    </div>
</div>



