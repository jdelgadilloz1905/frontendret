<?php

$listaProveedor = ControladorProveedores::ctrMostrarProveedor(null,null);

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
                <h3 class="text-themecolor m-b-0 m-t-0">Crear orden</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Inicio</li>
                    <li class="breadcrumb-item active">Crear orden</li>
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
                        <form role="form" method="post" enctype="multipart/form-data" class="formularioOrdenes">
                            <h3 class="card-title">Nueva orden de compra</h3>

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

                                    <select class="form-control custom-select" id="ingProveedorInc" name="ingProveedorInc" required>

                                        <option value="">Seleccione Proveedor</option>

                                        <?php

                                        foreach ($listaProveedor as $key => $value) {

                                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                                        }

                                        ?>

                                    </select>


                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn waves-effect waves-light btn-info" title="Agregar Proveedor" data-toggle="modal" data-target="#modalAgregarProveedor"><i class="fas fa-user-plus"></i></button>
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
                            ENTRADA PARA AGREGAR PRODUCTO
                            ======================================-->

                            <div class="form-group row nuevoProducto">


                            </div>

                            <input type="hidden" id="listaProductos" name="listaProductos">

                            <!--=====================================
                            BOTÓN PARA AGREGAR PRODUCTO
                            ======================================-->

                            <button type="button" class="btn btn-default hidden-lg btnAgregarProductoOrden">Agregar producto</button>

                            <hr>
                            <?php

                                $crearOrden = new ControladorOrdenes();
                                $crearOrden ->ctrCrearOrden();

                            ?>
                            <button type="submit" style="background-color: #f14e01; border: 1px solid #f14e01;" class="btn btn-primary m-t-20" name="crearOrdenCompra">Crear Orden</button>
                            <button class="btn btn-danger m-t-20"><i class="fa fa-times"></i> Cancelar</button>

                            <?php


                            ?>
                        </form>

                    </div>
                </div>
            </div>

            <!--=====================================
              LA TABLA DE PRODUCTOS
              ======================================-->
            <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive m-t-40">
                            <table class="table table-bordered table-striped dt-responsive tablaOrdenes">

                                <thead>

                                <tr>

                                    <th style="width: 10px">#</th>
                                    <th>Imagen</th>
                                    <th>Código</th>
                                    <th>Descripcion</th>
                                    <th>Stock</th>
                                    <th>Acciones</th>


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
MODAL AGREGAR PROVEEDOR
======================================-->

<div class="modal fade" id="modalAgregarProveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#3c8dbc;">
                <h4 class="modal-title" id="exampleModalLabel1" style="color:white !important;">Agregar proveedor</h4>
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

                            <input type="text" class="form-control input-lg" name="nuevoProveedor" placeholder="Ingresar nombre" required>
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

                            <input type="text" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar documento" required>
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

                </div>
                <?php

                $crearProveedor = new ControladorProveedores();
                $crearProveedor -> ctrCrearProveedor();

                ?>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar proveedor</button>
                </div>

            </form>

        </div>
    </div>
</div>


