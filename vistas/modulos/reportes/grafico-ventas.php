<?php

if(isset($_GET["fechaInicial"]) && isset($_GET["fechaFinal"])){

  error_reporting(0);
  $ventas = ControladorVentas::ctrRangoFechasVentas($_GET["fechaInicial"], $_GET["fechaFinal"]);

  $arrayFechas = array();
  $arrayFechaPago = array();

  foreach ($ventas as $key => $value) {

    /*=============================================
      GRÁFICA EN LÍNEA
      =============================================*/

      #Capturamos sólo el año y el mes
      $fecha = substr($value["fecha"],0,10);

      #Capturamos las fechas en un array
      array_push($arrayFechas, $fecha);

      #Capturamos las fechas y los pagos en un mismo array
      $arrayFechaPago = array($fecha => $value["total"]);

      #Sumamos los pagos que ocurrieron el mismo mes
      foreach ($arrayFechaPago as $key => $value) {
        
        $sumaPagosMes[$key] += $value;
      
      }
  }

  #Evitamos repetir fecha
  $noRepetirFechas = array_unique($arrayFechas);


  
}

?>


<!--=====================================
GRÁFICO DE VENTAS
======================================-->

<div class="box box-solid bg-teal-gradient">

  <div class="box-header">

    <i class="fa fa-th"></i>

      <h3 class="box-title">Gráfico de Ventas</h3>

  </div>

  <div class="box-body border-radius-none nuevoGraficoVentas">

    <div class="chart" id="line-chart-ventas" style="height: 250px;"></div>

  </div>

</div>

<script>
  
/*=============================================
GRAFICO DE VENTAS
=============================================*/

new Morris.Line({
  element          : 'line-chart-ventas',
  resize           : true,
  data             : [
  
    <?php

      foreach ($noRepetirFechas as $value) {
      
      echo "{ y: '".$value."', ventas: ".$sumaPagosMes[$value]." },";
        
      }

      echo "{ y: '".$value."', ventas: ".$sumaPagosMes[$value]." }";

    ?>
   

    ],
  xkey             : 'y',
  ykeys            : ['ventas'],
  labels           : ['ventas'],
  lineColors       : ['#efefef'],
  lineWidth        : 3,
  hideHover        : 'auto',
  gridTextColor    : '#fff',
  gridStrokeWidth  : 0.3,
  pointSize        : 5,
  pointStrokeColors: ['#efefef'],
  gridLineColor    : '#efefef',
  gridTextFamily   : 'Open Sans',
  preUnits         : '$',
  gridTextSize     : 10
});

</script>
