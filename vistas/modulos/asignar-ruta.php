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
                <h3 class="text-themecolor m-b-0 m-t-0">Asignar ruta</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Inicio</li>
                    <li class="breadcrumb-item active">Asignar ruta</li>
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
                            <h3 class="card-title">Asignar ruta</h3>

                            <div class="row form-group">
                                <div class="col-md-6 col-sm-12">
                                    <div class="input-group">
                                        <input class="form-control " type="text" name="ingSupervisor" id=ingSupervisor" value="<?php echo $_SESSION["nombre"] ?>" readonly>
                                        <input type="hidden" name="ingId" value="<?php echo $_SESSION["id"] ?>">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">

                                    <select class="form-control custom-select" id="ingAsigRuta" name="ingRuta" required>

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

                                    <select class="form-control custom-select" id="ingTecnico" name="ingTecnico">

                                        <option value="">Asignar a:</option>

                                            <?php


                                            foreach ($listaVendedor as $key => $value) {

                                                echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                                            }

                                            ?>

                                    </select>


                                </div>

                                <div class="col-md-6 col-sm-12">

                                    <div class="input-group">
                                        <input type="text" class="form-control mydatepicker" placeholder="Fecha visita" id="mdate" name="ingFechaVisita" required>
                                    </div>


                                </div>


                            </div>

                            <div class="row form-group">



                                <div class="col-md-6 col-sm-12 input-group">
                                    <select class="form-control custom-select" id="ingTipoServicio" name="ingTipoServicio" required>

                                        <option value="">Tipo de Servicio</option>

                                        <option value="plomeria">Plomeria</option>

                                        <option value="recogido-de-liquido">Recogido de liquido</option>

                                        <option value="limpieza-de-campana">Limpieza de campana</option>

                                    </select>
                                </div>

                                <div class="col-md-6 col-sm-12 input-group">

                                    <select class="form-control custom-select" name="ingPrioridad" required>

                                        <option value="normal">Normal</option>

                                        <option value="baja">Baja</option>

                                        <option value="alta">Alta</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group" style="display: none">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input class="form-control" name="ingAsunto" id="ingAsunto" placeholder="Asunto:" >
                                    </div>
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
<!--                                    <input type="hidden" id="listaClientes" name="listaClientes">-->

                                    <input type="hidden" class="form-control input-lg" name="listaTienda" id="listaTienda" value="" readonly>
                                </div>
                            </div>


                            <!--=====================================
                            BOTÓN PARA AGREGAR TIENDAS
                            ======================================-->

<!--                            <button type="button" class="btn btn-default hidden-lg btnagregarClienteRuta">Agregar tienda</button>-->

                            <hr>
                            <?php

                                $crearOrden = new ControladorRuta();
                                $crearOrden -> ctrAsignarRuta();

                            ?>
                            <button type="submit" style="background-color: #f14e01; border: 1px solid #f14e01;" class="btn btn-primary m-t-20 asignarLocalDetalle" name="asignarRutaTecnico">Asignar ruta</button>


                            <?php


                            ?>
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

                            <table class="table table-bordered table-striped dt-responsive tablaAsignarRutas">

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



