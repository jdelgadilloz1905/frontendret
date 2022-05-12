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
        <h3 class="text-themecolor m-b-0 m-t-0">Administrar Grupo Cliente</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Inicio</li>
          <li class="breadcrumb-item active">Administrar Grupo Cliente</li>
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
              <button type="button" class="btn waves-effect waves-light btn-block btn-info" data-toggle="modal" data-target="#modalAgregarGrupoCliente">Agregar grupo</button>
            </div>
            <div class="table-responsive m-t-40">
              <table class="table table-bordered table-striped dt-responsive tablas">

                <thead>

                <tr>

                  <th style="width:10px">#</th>
                  <th>Nombre</th>
                  <th>Alias</th>
                  <th>Email</th>
                  <th>Estatus</th>
                  <th>Acciones</th>

                </tr>

                </thead>

                <tbody>

                <?php

                $item = null;
                $valor = null;

                $grupoCliente = ControladorGrupo::ctrMostrarGrupoCliente($item, $valor,null,null);

                foreach ($grupoCliente as $key => $value) {

                  if($value["estatus"]==0){

                    $estatus ="<span class='table-remove'><button type='button' idGrupoCliente='".$value["id"]."' idEstatus ='1' class='btn btn-primary btn-sm  btnActivarGrupoCliente'>ACTIVO</button></span>";
                    
                  }else{

                    $estatus ="<span class='table-remove'><button type='button' idGrupoCliente='".$value["id"]."' idEstatus ='0' class='btn btn-danger btn-sm  btnActivarGrupoCliente'>INACTIVO</button></span>";
                    
                  }

                  echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["nombre"].'</td>
                    
                    <td class="text-uppercase">'.$value["alias"].'</td>
                    
                    <td class="text-uppercase">'.$value["email"].'</td>
                    
                    <td class="text-uppercase">'.$estatus.'</td>

                    <td>

                      <div class="btn-group">

                        <button class="btn btn-warning btnEditarGrupoCliente" idGrupoCliente="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarGrupoCliente"><i class="fas fa-pencil-alt"></i></button>';

                  if($_SESSION["perfil"] == "Administrador"){

                    echo '<button class="btn btn-danger btnEliminarGrupoCliente" idGrupoCliente="'.$value["id"].'"><i class="fa fa-times"></i></button>';

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
MODAL AGREGAR GRUPO CLIENTE
======================================-->
<div class="modal fade" id="modalAgregarGrupoCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#3c8dbc;">
        <h4 class="modal-title" id="exampleModalLabel1" style="color:white !important;">Agregar Grupo Cliente</h4>
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

              <input type="text" class="form-control input-lg" name="nuevoGrupo" placeholder="Ingresar grupo" required>
            </div>


          </div>

            <div class="form-group">

                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fa fa-meh"></i>
                    </span>
                    </div>

                    <input type="text" class="form-control input-lg" name="nuevoAlias" placeholder="Ingresar alias" required>
                </div>


            </div>

            <div class="form-group">

                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="ti-email"></i>
                    </span>
                    </div>

                    <input type="text" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required>
                </div>


            </div>

          <?php

          $crearGrupoCliente = new ControladorGrupo();
          $crearGrupoCliente -> ctrCrearGrupoCliente();

          ?>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar grupo</button>
        </div>

      </form>

    </div>
  </div>
</div>

<!--=====================================
MODAL EDITAR GRUPO DE CLIENTE
======================================-->
<div class="modal fade" id="modalEditarGrupoCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#f14e01;">
        <h4 class="modal-title" id="exampleModalLabel1" style="color:white !important;">Actualizar Grupo Cliente</h4>
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

              <input type="text" class="form-control input-lg" name="editarGrupoCliente" id="editarGrupoCliente" required>

              <input type="hidden"  name="idGrupoCliente" id="idGrupoCliente" required>
            </div>
          </div>

            <div class="form-group">

                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fa fa-meh"></i>
                    </span>
                    </div>

                    <input type="text" class="form-control input-lg" name="editarAlias"id="editarAlias"required>
                </div>


            </div>

            <div class="form-group">

                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="ti-email"></i>
                    </span>
                    </div>

                    <input type="text" class="form-control input-lg" name="editarEmail"id="editarEmail"required>
                </div>


            </div>


          <?php

          $editarGrupoCLiente = new ControladorGrupo();
          $editarGrupoCLiente -> ctrEditarGrupoCliente();

          ?>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>

      </form>

    </div>
  </div>
</div>


<?php

  $borrarGrupoCliente = new ControladorGrupo();
  $borrarGrupoCliente -> ctrBorrarGrupoCliente();

?>


