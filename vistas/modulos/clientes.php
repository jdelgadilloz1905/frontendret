<?php
$listaGrupoCliente = ControladorGrupo::ctrMostrarGrupoCliente(null,null,"estatus",0);
?>
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
        <h3 class="text-themecolor m-b-0 m-t-0">Administrar clientes</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Inicio</li>
          <li class="breadcrumb-item active">Administrar clientes</li>
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
              <button type="button" class="btn waves-effect waves-light btn-block btn-info" data-toggle="modal" data-target="#modalAgregarCliente">Agregar cliente</button>
            </div>
            <div class="table-responsive m-t-40">
              <table class="table table-bordered table-striped dt-responsive tablas">

                <thead>

                <tr>

                  <th style="width:10px">#</th>
                    <th>Grupo</th>

                    <th>Localización</th>

                    <th>Rest.</th>

                    <th>Dirección</th>

                  <th>Contacto</th>
                  <th>Email</th>
                  <th>Teléfono</th>


                  <th>Total incidencia</th>

                  <th>Acciones</th>

                </tr>

                </thead>

                <tbody>

                <?php

                $item = null;
                $valor = null;

                $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

                foreach ($clientes as $key => $value) {


                  echo '<tr>

                    <td>'.($key+1).'</td>
                    
                     <td>'.$value["nombreGrupo"].'</td>
                      <td>'.$value["localizador"].'</td>
                     
                      <td>'.$value["documento"].'</td>
                     <td>'.$value["direccion"].'</td>
                     
                    

                    <td>'.$value["nombre"].'</td>


                    <td>'.$value["email"].'</td>

                    <td>'.$value["telefono"].'</td>

                    
                    
                   

                    <td>'.$value["incidencia"].'</td>

                   


                    <td>

                      <div class="btn-group">

                        <button class="btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" idCliente="'.$value["id"].'"><i class="fas fa-pencil-alt"></i></button>';

                  if($_SESSION["perfil"] == "Administrador"){

                    echo '<button class="btn btn-danger btnEliminarCliente" idCliente="'.$value["id"].'"><i class="fa fa-times"></i></button>';

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

              <input type="text" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar Rest" required>
            </div>
          </div>

          <!-- ENTRADA PARA EL LOCACION-->
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

              <input type="text" class="form-control date-inputmask input-lg" id="date-mask" name="nuevaFechaNacimiento" placeholder="Ingresar fecha nacimiento" >

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

<!--=====================================
MODAL EDITAR CLIENTE
======================================-->

<div class="modal fade" id="modalEditarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#f14e01;">
        <h4 class="modal-title" id="exampleModalLabel1" style="color:white !important;">Editar cliente</h4>
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

              <input type="text" class="form-control input-lg" name="editarCliente" id="editarCliente" required>
              <input type="hidden" id="idCliente" name="idCliente">
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

          <div class="form-group">

            <div class="input-group">
              <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="ti-location-arrow"></i>
                                                    </span>
              </div>

              <input type="text" class="form-control input-lg" name="editarLocalizador" id="editarLocalizador" required>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="fa fa-users"></i>
                                                    </span>
              </div>
              <select class="form-control custom-select" id="editarGrupoClienteAnterior" name="editarGrupoClienteAnterior" disabled>
                

              </select>


            </div>


          </div>

          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="fa fa-users"></i>
                                                    </span>
              </div>
              <input type="hidden" id="idGrupoAnterior" name="idGrupoAnterior">
              <select class="form-control custom-select" id="editarGrupoCliente" name="editarGrupoCliente" required>

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

          <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->
          <div class="form-group" style="display: none">

            <div class="input-group">
              <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class=" ti-calendar"></i>
                                                    </span>
              </div>

              <input type="text" class="form-control date-inputmask input-lg" id="editarFechaNacimiento" name="editarFechaNacimiento" >


            </div>
          </div>

        </div>
        <?php

        $editarCliente = new ControladorClientes();
        $editarCliente -> ctrEditarCliente();

        ?>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cliente</button>
        </div>

      </form>

    </div>
  </div>
</div>


<?php

  $eliminarCliente = new ControladorClientes();
  $eliminarCliente -> ctrEliminarCliente();

?>


