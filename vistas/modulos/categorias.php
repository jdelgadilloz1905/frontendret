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
        <h3 class="text-themecolor m-b-0 m-t-0">Administrar categorías</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Inicio</li>
          <li class="breadcrumb-item active">Administrar categorías</li>
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
            <div class="col-lg-3 col-md-4">
              <button type="button" class="btn waves-effect waves-light btn-block btn-info" data-toggle="modal" data-target="#modalAgregarCategoria">Agregar categoría</button>
            </div>
            <div class="table-responsive m-t-40">
              <table class="table table-bordered table-striped dt-responsive tablas">

                <thead>

                <tr>

                  <th style="width:10px">#</th>
                  <th>Categoria</th>
                  <th>Acciones</th>

                </tr>

                </thead>

                <tbody>

                <?php

                $item = null;
                $valor = null;

                $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                foreach ($categorias as $key => $value) {

                  echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["categoria"].'</td>

                    <td>

                      <div class="btn-group">

                        <button class="btn btn-warning btnEditarCategoria" idCategoria="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fas fa-pencil-alt"></i></button>';

                  if($_SESSION["perfil"] == "Administrador"){

                    echo '<button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value["id"].'"><i class="fa fa-times"></i></button>';

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
MODAL AGREGAR CATEGORÍA
======================================-->
<div class="modal fade" id="modalAgregarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#f14e01;">
        <h4 class="modal-title" id="exampleModalLabel1" style="color:white !important;">Agregar categoría</h4>
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

              <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Ingresar categoría" required>
            </div>
          </div>


          <?php

          $crearCategoria = new ControladorCategorias();
          $crearCategoria -> ctrCrearCategoria();

          ?>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar categoría</button>
        </div>

      </form>

    </div>
  </div>
</div>

<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->
<div class="modal fade" id="modalEditarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#f14e01;">
        <h4 class="modal-title" id="exampleModalLabel1" style="color:white !important;">Agregar categoría</h4>
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

              <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" required>

              <input type="hidden"  name="idCategoria" id="idCategoria" required>
            </div>
          </div>


          <?php

          $editarCategoria = new ControladorCategorias();
          $editarCategoria -> ctrEditarCategoria();

          ?>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar categoría</button>
        </div>

      </form>

    </div>
  </div>
</div>


<?php

  $borrarCategoria = new ControladorCategorias();
  $borrarCategoria -> ctrBorrarCategoria();

?>


