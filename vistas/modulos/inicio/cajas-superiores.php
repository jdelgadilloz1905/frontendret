<?php

$item = null;
$valor = null;
$orden = "id";

$incidencia = ControladorIncidencia::ctrSumaTotalIncidencia();

$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
$totalCategorias = count($categorias);

$clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
$totalClientes = count($clientes);

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
$totalProductos = count($productos);

?>


<!--=====================================
CAJAS SUPERIORES
======================================-->

<!-- col -->
<div class="col-lg-3 col-md-6">
  <div class="card">
    <div class="card-body">
      <div class="d-flex flex-row">
        <div class="round round-lg align-self-center round-info"><i class="fas fa-clipboard-list"></i></div>
        <div class="m-l-10 align-self-center">
          <h3 class="m-b-0 font-light"><?php echo $incidencia["total"]; ?></h3>
          <h5 class="text-muted m-b-0">Servicios</h5></div>
      </div>
      <!-- inner -->
    </div>
    <div class="box b-t text-center">
      <h4 class="font-medium m-b-0"><a href="admin-incidencia" class="small-box-footer">Más Info <i class="fa fa-arrow-circle-right"></i></a></h4>
    </div>
  </div>
</div>
<!-- col -->

<!--===========================================================================-->
<!-- col -->
<div class="col-lg-3 col-md-6">
  <div class="card">
    <div class="card-body">
      <div class="d-flex flex-row">
        <div class="round round-lg align-self-center round-warning"><i class="mdi mdi-cellphone-link"></i></div>
        <div class="m-l-10 align-self-center">
          <h3 class="m-b-0 font-light"><?php echo number_format($totalCategorias); ?></h3>
          <h5 class="text-muted m-b-0">Categorías</h5></div>
      </div>
      <!-- inner -->
    </div>
    <div class="box b-t text-center">
      <h4 class="font-medium m-b-0"><a href="categorias" class="small-box-footer">Más Info <i class="fa fa-arrow-circle-right"></i></a></h4>
    </div>
  </div>
</div>
<!-- col -->

<!--===========================================================================-->

<!-- col -->
<div class="col-lg-3 col-md-6">
  <div class="card">
    <div class="card-body">
      <div class="d-flex flex-row">
        <div class="round round-lg align-self-center round-info"><i class="fas fa-user-plus"></i></div>
        <div class="m-l-10 align-self-center">
          <h3 class="m-b-0 font-light"><?php echo number_format($totalClientes); ?></h3>
          <h5 class="text-muted m-b-0">Clientes</h5></div>
      </div>
      <!-- inner -->
    </div>
    <div class="box b-t text-center">
      <h4 class="font-medium m-b-0"><a href="clientes" class="small-box-footer">Más Info <i class="fa fa-arrow-circle-right"></i></a></h4>
    </div>
  </div>
</div>

<!-- col -->

<!--===========================================================================-->

<!-- col -->
<div class="col-lg-3 col-md-6">
  <div class="card">
    <div class="card-body">
      <div class="d-flex flex-row">
        <div class="round round-lg align-self-center round-primary"><i class="mdi mdi-cart-outline"></i></div>
        <div class="m-l-10 align-self-center">
          <h3 class="m-b-0 font-light"><?php echo number_format($totalProductos); ?></h3>
          <h5 class="text-muted m-b-0">Productos</h5></div>
      </div>
      <!-- inner -->
    </div>
    <div class="box b-t text-center">
      <h4 class="font-medium m-b-0"><a href="productos" class="small-box-footer">Más Info <i class="fa fa-arrow-circle-right"></i></a></h4>
    </div>
  </div>
</div>

<!-- col -->
