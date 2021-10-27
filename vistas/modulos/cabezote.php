<!-- ============================================================== -->
<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<?php
$url = Ruta::ctrRuta();
if($_SESSION["perfil"] == "Tecnico"){
    $ruta = "incidencias";
}elseif ($_SESSION["perfil"] == "Administrador"){
    $ruta = "inicio";
}else{
    $ruta = "panel-incidencias";
}

?>
<header class="topbar">
	<nav class="navbar top-navbar navbar-expand-md navbar-light">
		<!-- ============================================================== -->
		<!-- Logo -->
		<!-- ============================================================== -->
		<div class="navbar-header ashbel6">
			<a class="navbar-brand" href="<?php echo $url.$ruta ?>">
				<!-- Logo icon -->
				<b>
					<!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
					<!-- Dark Logo icon -->
					<img src="<?php echo $url ?>vistas/img/logo.png" alt="RET1" class="dark-logo" />
					<!-- Light Logo icon -->
					<img src="<?php echo $url ?>vistas/img/logo.png" alt="RET2" class="light-logo"/>
				</b>
				<!--End Logo icon -->
				<!-- Logo text -->
                        <span>
                         <!-- dark Logo text -->
<!--                         <img src="../assets/images/logo-text.png" alt="RET3" class="dark-logo" width="60px" height="40px" />-->
							<!-- Light Logo text -->
<!--                         <img src="../assets/images/logo-light-text.png" class="light-logo" alt="RET4" />-->
						</span>
			</a>
		</div>
		<!-- ============================================================== -->
		<!-- End Logo -->
		<!-- ============================================================== -->
		<div class="navbar-collapse">
			<!-- ============================================================== -->
			<!-- toggle and nav items -->
			<!-- ============================================================== -->
			<ul class="navbar-nav mr-auto mt-md-0">
				<!-- This is  -->
				<li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
				<li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>

			</ul>
			<!-- ============================================================== -->
			<!-- User profile and search -->
			<!-- ============================================================== -->
			<ul class="navbar-nav my-lg-0">

				<!-- ============================================================== -->
				<!-- Profile -->
				<!-- ============================================================== -->
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php
						if($_SESSION["foto"] != ""){

							echo '<img src="'.$url.$_SESSION["foto"].'" class="profile-pic">';

						}else{


							echo '<img src="vistas/img/usuarios/default/anonymous.png" class="profile-pic">';

						}


						?>
					</a>
					<div class="dropdown-menu dropdown-menu-right scale-up">
						<ul class="dropdown-user">
							<li>
								<div class="dw-user-box">
									<div class="u-img">
										<?php
										if($_SESSION["foto"] != ""){

											echo '<img src="'.$url.$_SESSION["foto"].'" alt="user">';

										}else{


											echo '<img src="vistas/img/usuarios/default/anonymous.png" alt="user">';

										}


										?>

									</div>
									<div class="u-text">
										<h4><?php  echo $_SESSION["nombre"]; ?></h4>
										<p class="text-muted"><?php  echo $_SESSION["perfil"]; ?></p>
										<a href="<?php echo $url?>perfil" class="btn btn-rounded btn-danger btn-sm">Mi perfil</a></div>
								</div>
							</li>
							<li role="separator" class="divider"></li>
							<li><a href="<?php echo $url?>perfil"><i class="ti-user"></i> Mi perfil</a></li>
<!--							<li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>-->
<!--							<li><a href="#"><i class="ti-email"></i> Buzón de mensajes</a></li>-->
<!--							<li role="separator" class="divider"></li>-->
<!--							<li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>-->
							<li role="separator" class="divider"></li>
							<li><a href="<?php echo $url?>salir"><i class="fa fa-power-off"></i> Salir</a></li>
						</ul>
					</div>
				</li>

			</ul>
		</div>
	</nav>
</header>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->



