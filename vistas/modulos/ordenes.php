<?php

$ordenes = ControladorOrdenes::ctrMostrarOrdenes(null,null);


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
                <h3 class="text-themecolor m-b-0 m-t-0">Ordenes de compra</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Inicio</li>
                    <li class="breadcrumb-item active">Ordenes de compra</li>
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
                        <div class="table-responsive m-t-40">
                            <table class="table table-bordered table-striped dt-responsive tablaOrdenesCompra">

                                <thead>

                                    <tr>

                                        <th style="width:10px">#</th>
                                        <th>Compra</th>
                                        <th>Proveedor</th>
                                        <th>Usuario</th>
                                        <th>Descripción</th>
                                        <th>Fecha</th>
                                        <th>Estatus</th>
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


<!--=====================================
MODAL VER ARTICULOS DE LA ORDEN DE COMPRA
======================================-->

<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->
<div class="modal fade" id="modalVerArticulos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#3c8dbc;">
                <h4 class="modal-title" id="exampleModalLabel1" style="color:white !important;">Detalle de la compra #<stron><label id="detalleCompra"></label></stron></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <!--=====================================
                            ENTRADA PARA AGREGAR PRODUCTO
                            ======================================-->

                    <div class="form-group row verDetalleCompras">


                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                </div>

            </form>

        </div>
    </div>
</div>
