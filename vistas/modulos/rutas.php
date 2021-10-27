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
        <h3 class="text-themecolor m-b-0 m-t-0">Administrar Rutas</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Inicio</li>
          <li class="breadcrumb-item active">Administrar Rutas</li>
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
<!--            <div class="col-lg-3 col-md-4">-->
<!--              <button type="button" class="btn waves-effect waves-light btn-block btn-info" data-toggle="modal" data-target="#modalAgregarRuta">Agregar ruta</button>-->
<!--            </div>-->
            <div class="table-responsive m-t-40">
              <table class="table table-bordered table-striped dt-responsive tablas tablaDetalleRuta">

                <thead>

                <tr>

                  <th style="width:10px">#</th>
                  <th>Nombre</th>
                  <th>Estatus</th>
                  <th>Detalle</th>
                  <th>Acciones</th>


                </tr>

                </thead>

                <tbody>

                <?php

                $item = null;
                $valor = null;

                $rutas = ControladorRuta::ctrMostrarRutas($item, $valor,null,null);

                foreach ($rutas as $key => $value) {

                  if($value["estatus"]==0){

                    $estatus ="<span class='table-remove'><button type='button' idRuta='".$value["id"]."' idEstatus ='1' class='btn btn-primary btn-sm  btnActivarRuta'>ACTIVO</button></span>";
                    
                  }else{

                    $estatus ="<span class='table-remove'><button type='button' idRuta='".$value["id"]."' idEstatus ='0' class='btn btn-danger btn-sm  btnActivarRuta'>INACTIVO</button></span>";
                    
                  }

                  //Busco si la ruta tiene detalles

                    $detalle = ControladorRuta::ctrMostrarDetalleRuta("id_ruta",$value["id"]);

                  if(count($detalle)>0){

                      $verDetalle = "<span class='table-remove ' ><button type='button' idRuta='".$value["id"]."'  class='btn btn-primary btn-sm  btnVerDetalleRuta' data-toggle='modal' data-target='#modalVerRutas'><i class='fas fa-eye'></i></button></span>";
                  }else{

                      $verDetalle ="";
                  }

                  echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["nombre"].'</td>
                    
                    <td class="text-uppercase">'.$estatus.'</td>
                    
                    <td class="text-uppercase">'.$verDetalle.'</td>

                    <td>

                      <div class="btn-group">

                        <button class="btn btn-warning btnEditarRuta" idRuta="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarRuta"><i class="fas fa-pencil-alt"></i></button>';

                  if($_SESSION["perfil"] == "Administrador"){

                    echo '<button class="btn btn-danger btnEliminarRuta" idRuta="'.$value["id"].'"><i class="fa fa-times"></i></button>';

                  }

                  echo '</div>

                    </td>

                  </tr>';
                }

                ?>

                </tbody>

              </table>
            </div >

          </div>
        </div>

      </div>

    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

  </div>
  <!-- ================================================================== -->
  <!-- End Container fluid  -->

</div>


<!--=====================================
MODAL AGREGAR RUTA
======================================-->
<div class="modal fade" id="modalAgregarRuta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
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

<!--=====================================
MODAL EDITAR GRUPO DE CLIENTE
======================================-->
<div class="modal fade" id="modalEditarRuta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#f14e01;">
        <h4 class="modal-title" id="exampleModalLabel1" style="color:white !important;">Editar Ruta</h4>
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

              <input type="text" class="form-control input-lg" name="editarRutaNombre" id="editarRutaNombre" required>

              <input type="hidden"  name="idRuta" id="idRuta" required>
            </div>
          </div>


          <?php

          $editarRuta = new ControladorRuta();
          $editarRuta -> ctrEditarRutaEncabezado();

          ?>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary" name="rutaEncabezado">Actualizar</button>
        </div>

      </form>

    </div>
  </div>
</div>


<!--=====================================
MODAL VER DETALLE DE LA RUTA
======================================-->
<div class="modal fade" id="modalVerRutas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#3c8dbc;">
                <h4 class="modal-title" id="exampleModalLabel1" style="color:white !important;">Detalle de la ruta</stron></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <label>TIPO DE SERVICIO:</label>
                    <label id="tipoServicio"></label>


                    <div class="table-responsive m-t-20">
                        <table class="table table-bordered table-striped dt-responsive tablaListaIncidencia">

                            <thead>

                            <tr>
                                <th>Grupo</th>
                                <th>Localizador</th>
                                <th>Rest</th>
                                <th>Dirección</th>
                            </tr>

                            </thead>

                            <tbody class="verDetalleRuta">



                            </tbody>

                        </table>
                    </div>

                </div>
                <div class="modal-footer">
<!--                    <button type="button" class="btn btn-primary editarDetalleRuta">Editar ruta</button>-->
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>

            </form>

        </div>
    </div>
</div>





