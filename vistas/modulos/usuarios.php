<!--=====================================
PÁGINA DE USUARIOS
======================================-->
<?php
$listaGrupoCliente = ControladorGrupo::ctrMostrarGrupoCliente(null,null,"estatus",0);

$listaCliente = ControladorClientes::ctrMostrarClientesSinUsuarios();
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
            <div class="col-md-5 col-12 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Administrar usuarios</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Inicio</li>
                    <li class="breadcrumb-item active">Administrar usuarios</li>
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
                            <button type="button" class="btn waves-effect waves-light btn-block btn-info" data-toggle="modal" data-target="#modalAgregarUsuario">Agregar usuario</button>
                        </div>
                        <div class="table-responsive m-t-40">
                            <table class="table table-bordered table-striped dt-responsive tablas" style="width: 100%;">

                                <thead>

                                <tr>

                                    <th style="width:10px">#</th>
                                    <th>Nombre</th>
                                    <th>Usuario</th>
                                    <th>Foto</th>
                                    <th>Perfil</th>
                                    <th>Estado</th>
                                    <th>Último login</th>
                                    <th>Acciones</th>

                                </tr>

                                </thead>

                                <tbody>

                                <?php

                                $item = null;
                                $valor = null;

                                $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                                foreach ($usuarios as $key => $value){

                                    echo ' <tr>
                                              <td>'.($key+1).'</td>
                                              <td>'.$value["nombre"].'</td>
                                              <td>'.$value["usuario"].'</td>';

                                    if($value["foto"] != ""){

                                        echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                                    }else{

                                        echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';

                                    }

                                    echo '<td>'.$value["perfil"].'</td>';

                                    if($value["estado"] != 0){

                                        echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';

                                    }else{

                                        echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';

                                    }

                                    echo '<td>'.$value["ultimo_login"].'</td>
                                      <td>

                                        <div class="btn-group">

                                          <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fas fa-pencil-alt"></i></button>

                                          <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fa fa-times"></i></button>

                                        </div>

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
MODAL AGREGAR USUARIO
======================================-->
<div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#f14e01;">
                <h4 class="modal-title" id="exampleModalLabel1" style="color:white !important;">Agregar usuario</h4>
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
                                <input type="text" class="form-control input-lg" name="nuevoNombre" id="exampleInputuname" placeholder="Ingresar nombre" required>
                            </div>
                        </div>

                        <!-- ENTRADA PARA EL USUARIO -->
                        <div class="form-group">

                            <div class="input-group">
                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="fa fa-key"></i>
                                                    </span>
                                </div>
                                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required>
                            </div>
                        </div>

                        <!-- ENTRADA PARA LA CLAVE -->
                        <div class="form-group">

                            <div class="input-group">
                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="ti-lock"></i>
                                                    </span>
                                </div>

                                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->
                        <div class="form-group">

                            <div class="input-group">
                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="fa fa-users"></i>
                                                    </span>
                                </div>
                                <select class="form-control custom-select" id="nuevoPerfil" name="nuevoPerfil">

                                    <option value="">Selecionar perfil</option>

                                    <option value="Administrador">Administrador</option>

                                    <option value="Tecnico">Técnico</option>

                                    <option value="Especial">Especial Grupo Familia</option>

                                    <option value="Cliente">Cliente</option>
                                </select>
                            </div>
                        </div>

                        <!-- ENTRADA PARA SELECCIONAR EL GRUPO FAMILIAR -->
                        <div class="form-group" style="display: none" id="selectorGrupoCliente">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fa fa-users"></i>
                                        </span>
                                </div>
                                <select class="form-control custom-select" id="nuevoGrupoCliente" name="nuevoGrupoCliente">

                                    <option value="">Seleccione el Grupo</option>

                                    <?php

                                    foreach ($listaGrupoCliente as $key => $value) {

                                        echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                                    }

                                    ?>

                                </select>
                            </div>
                        </div>

                        <!-- ENTRADA PARA SELECCIONAR EL CLIENTE ASOCIADO -->
                        <div class="form-group" style="display: none" id="selectorCliente">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fa fa-users"></i>
                                            </span>
                                </div>
                                <select class="form-control custom-select" id="nuevoCliente" name="nuevoCliente">

                                    <option value="">Seleccione el Cliente</option>

                                    <?php

                                    foreach ($listaCliente as $key => $value) {

                                        echo '<option value="'.$value["id"].'">'.$value["direccion"].'</option>';

                                    }

                                    ?>

                                </select>
                            </div>
                        </div>
                        <!-- ENTRADA PARA SUBIR FOTO -->
                        <div class="form-group">

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">SUBIR FOTO</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input nuevaFoto" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="nuevaFoto">
                                    <label class="custom-file-label form-control" for="inputGroupFile01">Seleccionar foto</label>
                                </div>

                            </div>
                        </div>
                        <p class="help-block">Peso máximo de la foto 2MB</p>

                        <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                    <?php

                    $crearUsuario = new ControladorUsuarios();
                    $crearUsuario -> ctrCrearUsuario();

                    ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar usuario</button>
                </div>

            </form>

        </div>
    </div>
</div>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->


<div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#f14e01;">
                <h4 class="modal-title" id="exampleModalLabel1" style="color:white !important;">Editar usuario</h4>
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
                            <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>
                        </div>
                    </div>

                    <!-- ENTRADA PARA EL USUARIO -->
                    <div class="form-group">

                        <div class="input-group">
                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="fa fa-key"></i>
                                                    </span>
                            </div>

                            <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>
                        </div>
                    </div>

                    <!-- ENTRADA PARA LA CLAVE -->
                    <div class="form-group">

                        <div class="input-group">
                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="ti-lock"></i>
                                                    </span>
                            </div>

                            <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">

                            <input type="hidden" id="passwordActual" name="passwordActual">
                        </div>
                    </div>
                    <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->
                    <div class="form-group">

                        <div class="input-group">
                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="fa fa-users"></i>
                                                    </span>
                            </div>
                            <select class="form-control input-lg" name="editarPerfil">

                                <option value="" id="editarPerfil"></option>

                                <option value="Administrador">Administrador</option>

                                <option value="Especial">Especial</option>

                                <option value="Tecnico">Tecnico</option>

                                <option value="Especial">Especial Grupo Familia</option>

                                <option value="Cliente">Cliente</option>

                            </select>
                        </div>
                    </div>
                    <!-- ENTRADA PARA SUBIR FOTO -->
                    <div class="form-group">

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">SUBIR FOTO</span>
                            </div>
                            <div class="custom-file">

                                <input type="file" class="custom-file-input nuevaFoto" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="editarFoto">
                                <label class="custom-file-label form-control" for="inputGroupFile01">Seleccionar foto</label>

                                <input type="hidden" name="fotoActual" id="fotoActual">
                            </div>

                        </div>
                    </div>
                    <p class="help-block">Peso máximo de la foto 2MB</p>

                    <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

                    <input type="hidden" name="ubicacion" id="ubicacion" value="usuarios">
                    <?php

                    $crearUsuario = new ControladorUsuarios();
                    $crearUsuario -> ctrEditarUsuario();

                    ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Modificar usuario</button>
                </div>

            </form>

        </div>
    </div>
</div>


<?php

  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();

?> 


