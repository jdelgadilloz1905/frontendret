<?php

$listaRuta = ControladorRuta::ctrMostrarRutasSinDetalle();

$listaVendedor = ControladorUsuarios::ctrListaUsuariosFiltro("perfil","Tecnico");

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
                <h3 class="text-themecolor m-b-0 m-t-0">Crear ruta</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Inicio</li>
                    <li class="breadcrumb-item active">Crear ruta</li>
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
            <!--=====================================
              EL FORMULARIO
              ======================================-->
            <div class="col-lg-5 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <form role="form" method="post" enctype="multipart/form-data" class="formularioRutas">
                            <h3 class="card-title">Nueva ruta</h3>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input class="form-control " type="text" name="ingSupervisor" id=ingSupervisor" value="<?php echo $_SESSION["nombre"] ?>" readonly>
                                        <input type="hidden" name="ingId" value="<?php echo $_SESSION["id"] ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-10">

                                    <select class="form-control custom-select" id="ingRuta" name="ingRuta" required>

                                        <option value="">Seleccione Ruta</option>

                                        <?php

                                        foreach ($listaRuta as $key => $value) {

                                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                                        }

                                        ?>

                                    </select>


                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn waves-effect waves-light btn-info" title="Agregar Ruta" data-toggle="modal" data-target="#modalAgregarRuta2"><i class="fas fa-user-plus"></i></button>
                                </div>

                            </div>

                            <div class="row form-group">
                                <div class="col-md-7 input-group">

                                    <select class="form-control custom-select" id="ingTecnico" name="ingTecnico">

                                        <option value="">Asignar a:</option>

                                        <?php

                                        foreach ($listaVendedor as $key => $value) {

                                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                                        }

                                        ?>

                                    </select>


                                </div>
                                <div class="col-md-5 input-group">
                                    <select class="form-control custom-select" name="ingTipoServicio" required>

                                        <option value="">Tipo de Servicio</option>

                                        <option value="plomeria">Plomeria</option>

                                        <option value="recogido-de-liquido">Recogido de liquido</option>

                                        <option value="limpieza-de-campana">Limpieza de campana</option>

                                    </select>
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input class="form-control" name="ingDescripcion" id="ingDescripcion" placeholder="Descripción:" required>
                                    </div>
                                </div>
                            </div>

                            <!--=====================================
                            ENTRADA PARA AGREGAR TIENDA
                            ======================================-->

                            <div class="form-group row nuevaRutaTabla">
                                <div class="col-md-12">
                                    <input type="hidden" id="listaClientes" name="listaClientes">
                                </div>
                            </div>



                            <!--=====================================
                            BOTÓN PARA AGREGAR TIENDAS
                            ======================================-->

<!--                            <button type="button" class="btn btn-default hidden-lg btnagregarClienteRuta">Agregar tienda</button>-->
                            <div style="text-align: center; display: none;">
                                <label>Esta ruta tiene tiendas asignadas</label>
                            </div>

                            <hr>
                            <?php

                                $crearOrden = new ControladorRuta();
                                $crearOrden -> ctrCrearRutaDetalle();

                            ?>
                            <button type="submit" style="background-color: #f14e01; border: 1px solid #f14e01;" class="btn btn-primary m-t-20" name="crearRuta">Crear ruta</button>
<!--                            <button class="btn btn-danger m-t-20"><i class="fa fa-times"></i> Cancelar</button>-->


                        </form>

                    </div>
                </div>
            </div>

            <!--=====================================
              LA TABLA DE TIENDAS O CLIENTES
              ======================================-->
            <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive m-t-40">
                            <table class="table table-bordered table-striped dt-responsive tablas tablaRutas">

                                <thead>

                                <tr>

                                    <th style="width: 10px">#</th>
                                    <th>Grupo</th>
                                    <th>Localización</th>
                                    <th>Rest</th>
                                    <th>Dirección</th>
                                    <th>Acciones</th>


                                </tr>

                                </thead>

                                <tbody>
                                <?php
                                $item = null;
                                $valor = null;

                                $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);


                                foreach ($clientes as $key => $value) {

                                    $acciones = "<div class='btn-group'><button class='btn btn-primary agregarClienteRuta recuperarBotonRuta' idCliente='".$value['id']."'>Agregar</button></div>";

                                    echo ' <tr>

                                        <td>'.($value["id"]).'</td>

                                        <td>'.($value["alias"]).'</td>

                                        <td>'.($value["localizador"]).'</td>

                                        <td>'.($value["documento"]).'</td>

                                        <td>'.($value["direccion"]).'</td>
                                        
                                        <td>'.$acciones.'</td> ';
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
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
<!--=====================================
MODAL AGREGAR PROVEEDOR
======================================-->

<!--=====================================
MODAL AGREGAR RUTA
======================================-->
<div class="modal fade" id="modalAgregarRuta2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#3c8dbc;">
                <h4 class="modal-title" id="exampleModalLabel1" style="color:white !important;">Agregar Ruta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <!-- ENTRADA PARA EL NOMBRE -->
                    <div class="form-group">

                        <div class="input-group">
                            <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fa fa-th"></i>
                    </span>
                            </div>

                            <input type="text" class="form-control input-lg" name="nuevaRuta" placeholder="Nombre ruta" required>
                        </div>


                    </div>

                    <?php

                    $crearRuta = new ControladorRuta();
                    $crearRuta -> ctrCrearRuta();

                    ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

            </form>

        </div>
    </div>
</div>


