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
        <h3 class="text-themecolor m-b-0 m-t-0">Administrar proveedores</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Inicio</li>
          <li class="breadcrumb-item active">Administrar proveedores</li>
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
            <div class="col-lg-2 col-md-4">
              <button type="button" class="btn waves-effect waves-light btn-block btn-info" data-toggle="modal" data-target="#modalAgregarProveedor">Agregar proveedor</button>
            </div>
            <div class="table-responsive m-t-40">
              <table class="table table-bordered table-striped dt-responsive tablas">

                <thead>

                <tr>

                  <th style="width:10px">#</th>
                  <th>Nombre</th>
                  <th>Documento</th>
                  <th>Email</th>
                  <th>Teléfono</th>
                  <th>Dirección</th>
                  <th>Total orden</th>
                  <th>Última orden</th>
                  <th>Fecha </th>
                  <th>Acciones</th>

                </tr>

                </thead>

                <tbody>

                <?php

                $item = null;
                $valor = null;

                $proveedores = ControladorProveedores::ctrMostrarProveedor($item, $valor);

                foreach ($proveedores as $key => $value) {


                  echo '<tr>

                    <td>'.($key+1).'</td>

                    <td>'.$value["nombre"].'</td>

                    <td>'.$value["documento"].'</td>

                    <td>'.$value["email"].'</td>

                    <td>'.$value["telefono"].'</td>

                    <td>'.$value["direccion"].'</td>

                    <td>'.$value["ordenes"].'</td>

                    <td>'.$value["ultima_orden"].'</td>

                    <td>'.$value["fecha"].'</td>

                    <td>

                      <div class="btn-group">

                        <button class="btn btn-warning btnEditarProveedor" data-toggle="modal" data-target="#modalEditarProveedor" idProveedor="'.$value["id"].'"><i class="fas fa-pencil-alt"></i></button>';

                  if($_SESSION["perfil"] == "Administrador"){

                    echo '<button class="btn btn-danger btnEliminarProveedor" idProveedor="'.$value["id"].'"><i class="fa fa-times"></i></button>';

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
  <!-- ================================================================== -->
  <!-- End Container fluid  -->

</div>



<!--=====================================
MODAL AGREGAR PROVEEDOR
======================================-->

<div class="modal fade" id="modalAgregarProveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#f14e01;">
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

<!--=====================================
MODAL EDITAR PROVEEDOR
======================================-->

<div class="modal fade" id="modalEditarProveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#f14e01;">
        <h4 class="modal-title" id="exampleModalLabel1" style="color:white !important;">Editar proveedor</h4>
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

              <input type="text" class="form-control input-lg" name="editarProveedor" id="editarProveedor" required>
              <input type="hidden" id="idProveedor" name="idProveedor">
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

              <input type="text" class="form-control input-lg" name="editarDocumentoId" id="editarDocumentoId" required>

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


              <input type="email" class="form-control input-lg email-inputmask" name="editarEmail" id="editarEmail" required>
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


              <input type="text" class="form-control phone-inputmask" id="editarTelefono" name="editarTelefono" placeholder="Ingresar teléfono" required>

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


              <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion"  required>
            </div>
          </div>

        </div>
        <?php

        $editarProveedor = new ControladorProveedores();
        $editarProveedor -> ctrEditarProveedor();

        ?>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar proveedor</button>
        </div>

      </form>

    </div>
  </div>
</div>

<?php

  $eliminarProveedor = new ControladorProveedores();
  $eliminarProveedor -> ctrEliminarProveedor();

?>


