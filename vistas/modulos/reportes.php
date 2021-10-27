

<!-- =============================================== -->
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
        <h3 class="text-themecolor m-b-0 m-t-0">Reporte de incidencia</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Inicio</li>
          <li class="breadcrumb-item active">Reporte de incidencia</li>
        </ol>
      </div>

    </div>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">

            <div class="row">

              <div class="col-md-5 col-8 align-self-center">
                <div class="input-group">

                  <button type="button" class="btn btn-default pull-right" id="daterange-btn2">
                  <span>
                    <i class="fa fa-calendar"></i> Rango de fecha
                  </span>
                    <i class="fa fa-caret-down"></i>
                  </button>

                </div>
              </div>
              <div class="col-md-7 col-4 align-self-center">
                <div class="d-flex m-t-10 justify-content-end">

                  <div class="d-flex m-r-20 m-l-10">
                    <?php

                    echo '<a href="vistas/modulos/imprimir-reporte.php?reporte=reporte&fechaInicial='.$_GET["fechaInicial"].'&fechaFinal='.$_GET["fechaFinal"].'">

                              <button class="btn btn-success" style="margin-top:5px">Descargar reporte en Excel</button>

                          </a>';

                    ?>
                  </div>

                </div>
              </div>


            </div>

            <?php

             include "reportes/grafico-incidencia.php";

            ?>

          </div>
        </div>
      </div>
    </div>



</div>



