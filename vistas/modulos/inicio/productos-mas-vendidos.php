<?php


$item = null;
$valor = null;
$orden = "ventas";

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

$colores = array("red","green","yellow","aqua","purple","blue","cyan","magenta","orange","gold");

$totalVentas = ControladorProductos::ctrMostrarSumaVentas();

?>

<!--=====================================
PRODUCTOS MÁS VENDIDOS
======================================-->

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Productos más vendidos</h4>
            <div class="flot-chart">
                <div class="flot-chart-content" id="flot-pie-chart"></div>
            </div>
            <ul class="feeds">
                <?php

                for($i = 0; $i <4; $i++){

                    echo '<li>
                    <a>
                        <img src="'.$productos[$i]["imagen"].'" class="img-thumbnail" width="40px" style="margin-right:10px">
                        '.$productos[$i]["descripcion"].'
                        <span class="pull-right text-'.$colores[$i].'"> '.ceil($productos[$i]["ventas"]*100/$totalVentas["total"]).'%</span>
                    </a>
                </li>';
                }

                ?>
            </ul>
        </div>
    </div>
</div>



<script>
  
/*=============================================
PRODUCTOS MÁS VENDIDOS
=============================================*/

$(function () {
    var data = [
        <?php

        for($i = 0; $i < 4; $i++){

            echo "{
                      data  : ".$productos[$i]["ventas"].",
                      color : '".$colores[$i]."',
                      label : '".$productos[$i]["ventas"]." ".$productos[$i]["descripcion"]."'
                  },";

        }

        ?>
        ];
    var plotObj = $.plot($("#flot-pie-chart"), data, {
        series: {
            pie: {
                innerRadius: 0.5
                , show: true
            }
        }
        , grid: {
            hoverable: true
        }
        , color: null
        , tooltip: true
        , tooltipOpts: {
            content: " %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20
               ,y: 0
            }
            , defaultTheme: false
        }
    });
});

  
</script>