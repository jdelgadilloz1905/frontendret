<?php

$listaRuta = ControladorRuta::ctrMostrarRutas(null,null,"estatus",0);

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
                <h3 class="text-themecolor m-b-0 m-t-0">Editar ruta</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Inicio</li>
                    <li class="breadcrumb-item active">Editar ruta</li>
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
                            <h3 class="card-title">Editar ruta</h3>

                            <div class="row form-group">

                                <div class="col-md-6 col-sm-12">
                                    <div class="input-group">
                                        <input class="form-control " type="text" name="ingSupervisor" id=ingSupervisor" value="<?php echo $_SESSION["nombre"] ?>" readonly>
                                        <input type="hidden" name="ingId" value="<?php echo $_SESSION["id"] ?>">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">

                                    <select class="form-control custom-select" id="editRuta" name="editRuta" required>

                                        <option value="">Seleccione Ruta</option>

                                        <?php

                                        foreach ($listaRuta as $key => $value) {

                                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                                        }

                                        ?>

                                    </select>
                                </div>

                            </div>



                            <div class="row form-group">

                                <div class="col-md-6 col-sm-12">

                                    <select class="form-control custom-select" id="editTecnico" name="editTecnico">

                                        <option value="">Asignar a:</option>

                                        <?php


                                        foreach ($listaVendedor as $key => $value) {

                                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                                        }

                                        ?>

                                    </select>


                                </div>

                                <div class="col-md-6 col-sm-12 input-group">
                                    <select class="form-control custom-select" id="editTipoServicio" name="editTipoServicio" required>

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
                                        <input class="form-control" name="editDescripcion" id="editDescripcion" placeholder="Descripción:" required>
                                    </div>
                                </div>
                            </div>

                            <!--=====================================
                            ENTRADA PARA AGREGAR TIENDA
                            ======================================-->

                            <input type="hidden" id="listaClientes" name="listaClientes">

                            <input type="hidden" name="editListaClientes" id="editListaClientes">


                            <!--=====================================
                            BOTÓN PARA AGREGAR TIENDAS
                            ======================================-->

                            <?php

                            $crearOrden = new ControladorRuta();
                            $crearOrden -> ctrEditarRuta();

                            ?>
                            <button type="submit" style="background-color: #f14e01; border: 1px solid #f14e01;" class="btn btn-primary m-t-20 " name="editarRutaEncabezado">Guardar</button>


                            <?php


                            ?>
                        </form>

                    </div>
                </div>
            </div>

            <!--=====================================
              MOSTRAR DETALLE DE LA RUTA
              ======================================-->
            <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-warning">

                            <h3 class="text-warning"><i class="fa fa-exclamation-triangle"></i> Advertencia</h3> Las tiendas se actualizaran automaticamente en la base de datos.
                        </div>
                        <div class="col-lg-4 col-md-4" id="botonAgregar" style="display: none">
                            <button type="button" class="btn waves-effect waves-light btn-block btn-info" data-toggle="modal" id="AgregarTienda" data-target="#modalAgregarTienda">Agregar tienda</button>

                        </div>

                        <div class="table-responsive m-t-40">

                            <table class="table table-bordered table-striped dt-responsive tablaEditarRutas">

                                <thead>

                                    <tr>

                                        <th style="width: 10px">#</th>
                                        <th>Grupo</th>
                                        <th>Localización</th>
                                        <th>Rest</th>
                                        <th>Dirección</th>
                                        <th>Servicios</th>

                                    </tr>

                                </thead>


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
MODAL AGREGAR TIENDA
======================================-->
<div class="modal fade" id="modalAgregarTienda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#3c8dbc;">
                <h4 class="modal-title" id="exampleModalLabel1" style="color:white !important;">Agregar tienda</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="row">
                        <!--=====================================
                          LA TABLA DE TIENDAS O CLIENTES
                          ======================================-->
                        <div class="col-lg-12 hidden-md hidden-sm hidden-xs">
                            <div class="card">
                                <div class="card-body">

                                    <div class="table-responsive ">
                                        <table class="table table-bordered table-striped dt-responsive tablas tablaRutasAsignar">

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


                                                //agregarClienteRuta
                                                $acciones = "<div class='btn-group'><button class='btn btn-primary  agregarTiendaRuta recuperarBotonRuta' grupo='".$value['nombreGrupo']."' idCliente='".$value['id']."'  alias='".$value['alias']."'  localizador='".$value['localizador']."'  documento='".$value['documento']."'  direccion='".$value['direccion']."'>Agregar</button></div>";

                                                echo ' <tr>

                                                            <td>'.($value["id"]).'</td>
                    
                                                            <td>'.($value["alias"]).'</td>
                    
                                                            <td>'.($value["localizador"]).'</td>
                    
                                                            <td>'.($value["documento"]).'</td>
                    
                                                            <td>'.($value["direccion"]).'</td>
                                                            
                                                            <td>'.$acciones.'</td>
                                                         
                                                      </tr>  ';
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                </div>

            </form>

        </div>
    </div>
</div>



