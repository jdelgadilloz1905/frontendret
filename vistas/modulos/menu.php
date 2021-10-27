<?php
$url = Ruta::ctrRuta();
?>
<aside class="left-sidebar">
	<!-- Sidebar scroll-->
	<div class="scroll-sidebar">

		<!-- Sidebar navigation-->
		<nav class="sidebar-nav">
			<ul id="sidebarnav">
				<?php
				if($_SESSION["perfil"] == "Administrador"){

					echo '

					<li>
						<a class="waves-effect waves-dark" href="'.$url.'inicio">
							<i class="mdi mdi-gauge"></i>
							<span class="hide-menu">Inicio </span>
						</a>
					</li> ';
                    echo '
						<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-list-ul"></i><span class="hide-menu">Servicios </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="'.$url.'admin-incidencia"><i class="fa fa-circle-o"></i>Administrar servicios</a></li>
                                <li><a href="'.$url.'crear-incidencia"><i class="fa fa-circle-o"></i>Crear servicio</a></li>
								<li><a href="'.$url.'eventos"><i class="fa fa-circle-o"></i>Eventos</a></li>';
                    if($_SESSION["perfil"] == "Administrador"){

                        //date_default_timezone_set('America/Bogota');

                        $fechaHasta = date('Y-m-d');

                        $fechaDesde = date('Y-m-d', strtotime('-1 month'));

                        echo '<li>

											<a href="index.php?ruta=reportes&fechaInicial='.$fechaDesde.'&fechaFinal='.$fechaHasta.'">
												<i class="fa fa-circle-o"></i><span>Reportes</span>
											</a>

										</li>';
                    }

                    echo'   </ul>
                        </li>';

                    echo '
						<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-map-marker"></i><span class="hide-menu">Rutas </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="'.$url.'rutas"><i class="fa fa-circle-o"></i>Administrar rutas</a></li>
                                <li><a href="'.$url.'crear-ruta"><i class="fa fa-circle-o"></i>Crear ruta</a></li>
                                <li><a href="'.$url.'editar-ruta"><i class="fa fa-circle-o"></i>Editar ruta</a></li>
                                <li><a href="'.$url.'asignar-ruta"><i class="fa fa-circle-o"></i>Asignar ruta</a></li>';
                    if($_SESSION["perfil"] == "Administradorrrr"){

                        //date_default_timezone_set('America/Bogota');

                        $fechaHasta = date('Y-m-d');

                        $fechaDesde = date('Y-m-d', strtotime('-1 month'));

                        echo '<li>

											<a href="index.php?ruta=reportes&fechaInicial='.$fechaDesde.'&fechaFinal='.$fechaHasta.'">
												<i class="fa fa-circle-o"></i><span>Reportes</span>
											</a>

										</li>';
                    }

                    echo'   </ul>
                        </li>';


					echo '<li>

						<a class="waves-effect waves-dark" href="'.$url.'usuarios" aria-expanded="false">
							<i class="mdi mdi-account"></i>
							<span class="hide-menu">Usuarios </span>
						</a>

					</li>';


					echo '
						<li>
							<a class="waves-effect waves-dark" href="'.$url.'categorias" aria-expanded="false">
								<i class="fa fa-th"></i>
								<span class="hide-menu">Categorías </span>
							</a>
						</li>

						<li>

							<a class="waves-effect waves-dark" href="'.$url.'productos" aria-expanded="false">
								<i class="fab fa-product-hunt"></i>
								<span class="hide-menu">Productos </span>
							</a>

						</li>';

					echo'<li>

							<a class="waves-effect waves-dark" href="'.$url.'clientes" aria-expanded="false">
								<i class="fas fa-clipboard-list"></i>
								<span class="hide-menu">Clientes </span>
							</a>
						</li>

						<li>

							<a class="waves-effect waves-dark" href="'.$url.'grupo-cliente" aria-expanded="false">
								<i class="fa fa-users"></i>
								<span class="hide-menu">Grupo Cliente </span>
							</a>
						</li>
						<li>

							<a class="waves-effect waves-dark" href="'.$url.'proveedores" aria-expanded="false">
								<i class="mdi mdi-book-open-variant"></i>
								<span class="hide-menu">Proveedores </span>
							</a>
						</li>';

					echo '
						<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fas fa-dolly-flatbed"></i><span class="hide-menu">Ordenes de Compra </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="'.$url.'ordenes"><i class="fa fa-circle-o"></i>Administrar ordenes</a></li>
                                <li><a href="'.$url.'crear-orden"><i class="fa fa-circle-o"></i>Crear orden</a></li>';
					if($_SESSION["perfil"] == "Administradorrrr"){

						//date_default_timezone_set('America/Bogota');

						$fechaHasta = date('Y-m-d');

						$fechaDesde = date('Y-m-d', strtotime('-1 month'));

						echo '<li>

											<a href="index.php?ruta=reportes&fechaInicial='.$fechaDesde.'&fechaFinal='.$fechaHasta.'">
												<i class="fa fa-circle-o"></i><span>Reporte de ordenes</span>
											</a>

										</li>';
					}

					echo'   </ul>
                        </li>';




				}



				if($_SESSION["perfil"] == "Tecnico"){

					echo '
						<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-list-ul"></i><span class="hide-menu">Servicios </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="'.$url.'incidencias"><i class="fa fa-circle-o"></i>Administrar servicio</a></li>
								<li><a href="'.$url.'eventos"><i class="fa fa-circle-o"></i>Eventos</a></li>';
					if($_SESSION["perfil"] == "Administrador"){

						date_default_timezone_set('America/Bogota');

						$fechaHasta = date('Y-m-d');

						$fechaDesde = date('Y-m-d', strtotime('-1 month'));

						echo '<li>

											<a href="index.php?ruta=reportes&fechaInicial='.$fechaDesde.'&fechaFinal='.$fechaHasta.'">
												<i class="fa fa-circle-o"></i><span>Reporte de servicio</span>
											</a>

										</li>';
					}

					echo'   </ul>
                        </li>';


				}
				//es el grupo familiar
				if($_SESSION["perfil"] == "Especial"){

					echo '
						<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-list-ul"></i><span class="hide-menu">Servicios </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="'.$url.'panel-incidencias"><i class="fa fa-circle-o"></i>Administrar servicio</a></li>

							</ul>
                        </li>';


				}

				if($_SESSION["perfil"] == "Cliente"){

					echo '
						<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-list-ul"></i><span class="hide-menu">Servicios </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="'.$url.'panel-incidencias"><i class="fa fa-circle-o"></i>Administrar servicios</a></li>


							</ul>
                        </li>';


				}



				?>


			</ul>
		</nav>
		<!-- End Sidebar navigation -->
	</div>
	<!-- End Sidebar scroll-->
</aside>