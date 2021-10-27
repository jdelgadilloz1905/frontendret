<?php

$url = Ruta::ctrRuta();

$id_usuario = $_SESSION["id"];

//Buscar los datos del usuario
$misDatos = ControladorUsuarios::ctrMostrarUsuarios("id",$id_usuario);

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
        <h3 class="text-themecolor m-b-0 m-t-0">Perfil</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Inicio</li>
          <li class="breadcrumb-item active">Perfil</li>
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

      <!-- Column -->
      <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
          <div class="card-body">
            <center class="m-t-30"> <img src="<?php echo $url.$misDatos["foto"] ?>" class="img-circle previsualizarPerfil" width="170" />
              <h4 class="card-title m-t-10"><?php echo $misDatos["nombre"] ?></h4>
              <h6 class="card-subtitle">Usuario: <?php echo $misDatos["usuario"] ?></h6>

              <h6 class="card-subtitle">Ultima conexión: <?php echo $misDatos["ultimo_login"] ?></h6>
<!--              <div class="row text-center justify-content-md-center">-->
<!--                <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>-->
<!--                <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>-->
<!--              </div>-->
            </center>
          </div>
        </div>
      </div>
      <!-- Column -->
      <!-- Column -->
      <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs profile-tab" role="tablist">
            <li class="nav-item"> <a class="nav-link align-bottom" data-toggle="tab" href="" role="tab">Mi Perfil</a></li>

          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane active" id="settings" role="tabpanel">
              <div class="card-body">
                <form class="form-horizontal form-material" method="post" enctype="multipart/form-data">

                  <input type="hidden" class="antiguaFotoPerfil" name="fotoActual" id="fotoActual" value="<?php echo $misDatos["foto"]; ?>">

                  <div class="form-group">
                    <label class="col-md-12">Usuario</label>
                    <div class="col-md-12">
                      <input type="text" placeholder="Usuario" class="form-control form-control-line" value="<?php echo $misDatos["usuario"] ?>" name="editarUsuario" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-12">Nombre Completo</label>
                    <div class="col-md-12">
                      <input type="text" placeholder="Nombre completo" class="form-control form-control-line" name="editarNombre" value="<?php echo $misDatos["nombre"] ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-12">Contraseña</label>
                    <div class="col-md-12">
                      <input type="password" class="form-control form-control-line" name="editarPassword">
                      <input type="hidden" value="<?php echo $misDatos["perfil"] ?>" name="editarPerfil">
                      <input type="hidden" value="<?php echo $misDatos["password"] ?>" name="passwordActual">
                    </div>
                  </div>

                  <div class="form-group col-md-12">
                    <label class="">Cargar Foto</label>
                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                      <div class="form-control" data-trigger="fileinput">
                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                        <span class="fileinput-filename"></span>
                      </div>
                      <span class="input-group-addon btn btn-default btn-file">
                        <span class="fileinput-new">Elegir Foto</span>
                        <span class="fileinput-exists">Cambiar</span>
                        <input type="file" class="fotoPerfil" id="editarFoto" name="editarFoto" >
                      </span>
                      <a href="#" class="input-group-addon btn btn-default fileinput-exists removerFotoPerfil" fotoAntigua="<?php echo $url.$misDatos["foto"] ?>" data-dismiss="fileinput">Remover</a>
                    </div>
                  </div>

                  <input type="hidden" name="ubicacion" id="ubicacion" value="perfil">

                  <?php

                  $crearUsuario = new ControladorUsuarios();
                  $crearUsuario -> ctrEditarUsuario();

                  ?>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <button type="submit" name="btnActualizarDatos" class="btn btn-success">Actualizar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Column -->
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

  </div>
  <!-- ================================================================== -->
  <!-- End Container fluid  -->

</div>



