<?php

$listaCliente = ControladorClientes::ctrMostrarClientes(null,null);

$listaVendedor = ControladorUsuarios::ctrListaUsuariosFiltro("perfil","Tecnico");

$listaGrupoCliente = ControladorGrupo::ctrMostrarGrupoCliente(null,null,"estatus",0);

$listaRuta = ControladorRuta::ctrMostrarRutas(null,null,"estatus",0);

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
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Crear servicio</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Inicio</li>
                    <li class="breadcrumb-item active">Crear servicio</li>
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
                            <h3 class="card-title">Nuevo servicio</h3>

                            <div class="row form-group">
                                <div class="col-md-9 pad-b-inc">
                                    <div class="input-group">
                                        <input class="form-control " type="text" name="ingSupervisor" id=ingSupervisor" value="<?php echo $_SESSION["nombre"] ?>" readonly>
                                        <input type="hidden" name="ingId" value="<?php echo $_SESSION["id"] ?>">
                                    </div>
                                </div>
                                <div class="col-md-3 pad-b-inc">
                                    <div class="input-group">
                                        <select class="form-control custom-select" name="ingTipoServicio" required>

                                            <option value="">Tipo de Servicio</option>

                                            <option value="plomeria">Plomeria</option>

                                            <option value="recogido-de-liquido">Recogido de liquido</option>

                                            <option value="limpieza-de-campana">Limpieza de campana</option>

                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row form-group">
                                <div class="col-md-4 pad-b-inc">

                                    <select class="form-control custom-select" id="ingGrupoInc" name="ingGrupoInc" required>

                                        <option value="">Seleccione un Grupo</option>

                                        <?php

                                        foreach ($listaGrupoCliente as $key => $value) {

                                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                                        }

                                        ?>

                                    </select>


                                </div>

                                <div class="col-md-6 pad-b-inc">

                                    <select class="form-control custom-select" id="ingclienteInc" name="ingclienteInc" required>

<!--                                        <option value="">Seleccione una dirección</option>-->
<!---->
<!--                                        --><?php
//
//                                        foreach ($listaCliente as $key => $value) {
//
//                                            echo '<option value="'.$value["id"].'">'.$value["direccion"].'</option>';
//
//                                        }
//
//                                        ?>

                                    </select>


                                </div>
                                <div class="col-md-2 pad-b-inc">
                                    <button type="button" class="btn waves-effect waves-light btn-block btn-info" data-toggle="modal" data-target="#modalAgregarCliente">Agregar cliente</button>
                                </div>

                            </div>

                            <div class="row form-group">
                                <div class="col-md-10 pad-b-inc">
                                    <div class="input-group">
                                        <input class="form-control" name="ingDireccion" id="ingDireccion" placeholder="Direccion:" readonly>

                                    </div>
                                </div>
                                <div class="col-md-2 pad-b-inc">
                                    <div class="input-group">
                                        <input type="text" class="form-control mydatepicker" placeholder="Fecha visita" id="mdate" name="ingFechaVisita" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-9 pad-b-inc">
                                    <div class="input-group">
                                        <input class="form-control" name="ingAsunto" id="ingAsunto" placeholder="Asunto:" required>
                                    </div>
                                </div>

                                <div class="col-md-3 pad-b-inc">

                                    <select class="form-control custom-select" id="ingAsigRuta1" name="ingRuta" >

                                        <option value="0">Seleccione Ruta</option>

                                        <?php

                                        foreach ($listaRuta as $key => $value) {

                                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                                        }

                                        ?>

                                    </select>

                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-9 pad-b-inc">

                                    <select class="form-control custom-select" id="ingTecnico" name="ingTecnico">

                                        <option value="">Asignar a:</option>

                                        <?php

                                        foreach ($listaVendedor as $key => $value) {

                                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                                        }

                                        ?>

                                    </select>

                                </div>
                                <div class="col-md-3 pad-b-inc">
                                    <div class="input-group">
                                        <select class="form-control custom-select" name="ingPrioridad" required>

                                            <option value="normal">Normal</option>

                                            <option value="baja">Baja</option>


                                            <option value="alta">Alta</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group w-100">
                                <textarea class="textarea_editor form-control" rows="15" placeholder="Ingresar texto ..." name="ingDescripcion" id="ingDescripcion"></textarea>
                            </div>

                            <?php

                                $crearincidencia = new ControladorIncidencia();
                                $crearincidencia ->ctrCrearIncidencia();

                            ?>
                            <button type="submit" style="background-color: #f14e01; border: 1px solid #f14e01;" class="btn btn-primary m-t-20">Crear servicio</button>

                            <?php

                            echo '<a href="'.$url.'admin-incidencia" class="btn btn-secondary m-t-20" style="margin-left: 6px"><i class="fas fa-undo-alt"></i> Regresar</a>';

                            ?>
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
MODAL AGREGAR CLIENTE
======================================-->

<div class="modal fade" id="modalAgregarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#f14e01;">
                <h4 class="modal-title" id="exampleModalLabel1" style="color:white !important;">Agregar cliente</h4>
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

                            <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar nombre contacto" required>
                        </div>
                    </div>

                    <!-- ENTRADA PARA EL DOCUMENTO -->
                    <div class="form-group">

                        <div class="input-group">
                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="ti-key"></i>
                                                    </span>
                            </div>

                            <input type="text" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar Rest." required>
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="input-group">
                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="ti-location-arrow"></i>
                                                    </span>
                            </div>

                            <input type="text" class="form-control input-lg" name="nuevoLocalizador" placeholder="Ingresar Localización" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="fa fa-users"></i>
                                                    </span>
                            </div>

                            <select class="form-control custom-select" id="nuevoGrupoCliente" name="nuevoGrupoCliente" required>

                                <option value="">Seleccione el Grupo</option>

                                <?php

                                foreach ($listaGrupoCliente as $key => $value) {

                                    echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                                }

                                ?>

                            </select>


                        </div>


                    </div>

                    <!-- ENTRADA PARA EL EMAIL -->
                    <div class="form-group">

                        <div class="input-group">
                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="ti-email"></i>
                                                    </span>
                            </div>

                            <input type="email" class="form-control input-lg email-inputmask" name="nuevoEmail" placeholder="Ingresar email" required>
                        </div>
                    </div>

                    <!-- ENTRADA PARA EL TELEFONO -->
                    <div class="form-group">

                        <div class="input-group">
                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class=" ti-mobile "></i>
                                                    </span>
                            </div>


                            <input type="text" class="form-control phone-inputmask" id="phone-mask" name="nuevoTelefono" placeholder="Ingresar teléfono" required>
                        </div>
                    </div>

                    <!-- ENTRADA PARA LA DIRECCION -->
                    <div class="form-group">

                        <div class="input-group">
                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="ti-location-pin "></i>
                                                    </span>
                            </div>


                            <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" required>
                        </div>
                    </div>

                    <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->
                    <div class="form-group" style="display: none">

                        <div class="input-group">
                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class=" ti-calendar"></i>
                                                    </span>
                            </div>

                            <input type="text" class="form-control date-inputmask input-lg" id="date-mask" name="nuevaFechaNacimiento" placeholder="Ingresar fecha nacimiento">

                        </div>
                    </div>

                </div>
                <?php

                $crearCliente = new ControladorClientes();
                $crearCliente -> ctrCrearCliente();

                ?>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar cliente</button>
                </div>

            </form>

        </div>
    </div>
</div>


