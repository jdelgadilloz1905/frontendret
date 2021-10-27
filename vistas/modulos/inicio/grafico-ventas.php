<?php

error_reporting(0);

$item = null;
$valor = null; 

$ventas = ControladorIncidencia::ctrMostrarIncidencias($item, $valor);

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


?>


<!--=====================================
GRÁFICO DE VENTAS
======================================-->

<div class="col-md-12">
  <div class="card">
    <div class="card-body">
      <div class="d-flex flex-wrap">
        <div>
          <h3 class="card-title">Gráfico de Servicios</h3>

        </div>

      </div>
      <div id="line-chart-ventas"></div>

    </div>
  </div>
</div>

<script>
  
/*=============================================
GRAFICO DE VENTAS
=============================================*/

// LINE CHART
var line = new Morris.Line({
  element: 'line-chart-ventas',
  resize: true,
  data: [
    <?php

    foreach ($noRepetirFechas as $value) {

      echo "{ y: '".$value."', ventas: ".$sumaPagosMes[$value]." },";

    }

    echo "{ y: '".$value."', ventas: ".$sumaPagosMes[$value]." }";

    ?>
  ],
  xkey: 'y',
  ykeys : ['ventas'],
  labels : ['ventas'],
  gridLineColor: '#eef0f2',
  lineColors: ['#009efb'],
  lineWidth: 1,
  preUnits         : '$',
  hideHover: 'auto'
});
// Morris donut chart
</script>
