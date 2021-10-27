<?php

$item = null;
$valor = null;
$orden = "id";

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

 ?>

<!--=====================================
PRODUCTOS RECIENTES
======================================-->
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Productos agregados recientemente</h4>
			<ul class="feeds">
				<?php

				for($i = 0; $i <4; $i++){

					echo '<li>
                    <a>
                        <img src="'.$productos[$i]["imagen"].'" class="img-thumbnail" width="40px" style="margin-right:10px" alt="Product Image">
                        '.$productos[$i]["descripcion"].'

                    </a>
                </li>';
				}

				?>
			</ul>
			<div class="box-footer text-center">

				<a href="productos" class="uppercase">Ver todos los productos</a>

			</div>
		</div>
	</div>
</div>


<!-- PRODUCT LIST -->