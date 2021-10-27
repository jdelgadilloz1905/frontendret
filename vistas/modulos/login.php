<div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">
  <div class="login-box card">
    <div class="card-body">
      <form class="floating-labels m-t-30" id="loginform" method="post">
        <div class="row">
          <img Style="width: 100%; height: 100%;  padding: 0 50px 30px 50px;" src="./././vistas/img/RET-logo.png">
        </div>
        <h2 class="box-title m-b-30 text-center" style="color:#f14e01; font-style: italic;">Ingresar al sistema</h2>

        <div class="form-group m-b-40 focused">
          <input type="text" class="form-control" id="input1" name="ingUsuario" required>
          <span class="bar"></span>
          <label for="input1">Usuario</label>
        </div>
        <div class="form-group m-b-40">
          <input type="password" class="form-control" id="input2" name="ingPassword" required>
          <span class="bar"></span>
          <label for="input2">Contraseña</label>
        </div>


        <div class="form-group text-center m-t-30 m-b-30">
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Ingresar</button>
          </div>
        </div>
        <div class="form-group">
          <div class="no-block align-items-center">
            <div class="ml-auto">
<!--              <a href="javascript:void(0)" id="to-recover" class="text-muted"><i class="fa fa-lock m-r-5"></i> ¿Olvidó contraseña?</a>-->
            </div>
          </div>
        </div>

        <?php

        $login = new ControladorUsuarios();
        $login -> ctrIngresoUsuario();

        ?>
      </form>
      <form class="floating-labels m-t-40" id="recoverform" method="post">
        <div class="form-group ">
          <div class="col-xs-12">
<!--            <h3 class="box-title m-b-20 text-center">¿Olvidó contraseña?</h3>-->
            <p class="text-muted">Ingrese su correo electrónico</p>
          </div>
        </div>
        <div class="form-group m-b-40">
          <input type="input" class="form-control" id="resetEmail" name="resetEmail" required>
          <span class="bar"></span>
          <label for="resetEmail">Email</label>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Enviar</button>
          </div>
        </div>
        <?php

//        $login = new ControladorUsuarios();
//        $login -> ctrIngresoUsuario();

        ?>
      </form>
    </div>
  </div>
</div>

