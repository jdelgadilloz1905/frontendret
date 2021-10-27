<?php

if(isset($_GET["fechaInicial"]) && isset($_GET["fechaFinal"])){

  error_reporting(0);

  $incidencias = ControladorIncidencia::ctrRangoFechasIncidencia($_GET["fechaInicial"], $_GET["fechaFinal"]);

  $tecnicos =  ControladorIncidencia::ctrRangoTecnico($_GET["fechaInicial"], $_GET["fechaFinal"]);


}

?>


<!--=====================================
GRÁFICO DE INCIDENCIA
======================================-->

<div class="col-lg-12 mt-2">
    <h4 class="card-title">Grafico de servicios</h4>
    <div>
        <canvas id="grafico_incidencia" height="100"></canvas>
    </div>

</div>

<div class="col-lg-12 mt-2">
    <h4 class="card-title">Grafico de Técnicos</h4>
    <div>
        <canvas id="grafico_tecnico" height="100"></canvas>
    </div>

</div>

<script>
  
/*=============================================
GRAFICO DE INCIDENCIA
=============================================*/

//new Chart(document.getElementById("grafico_incidencia"),
//    {
//      "type":"line",
//      "data":{"labels":[
//        <?php
//
//              foreach ($incidencias as $value) {
//
//              echo "'".$value["mes"]."',";
//
//              }
//
//
//            ?>
//      ],
//        "datasets":[{
//          "label":"incidencias",
//          "data":[
//            <?php
//            foreach ($incidencias as $value) {
//
//              echo "".$value["cantIncidencia"].",";
//
//            }
//
//
//            ?>//],
//          "fill":true,
//          "borderColor":"rgb(38, 198, 218)",
//          "lineTension":0.2
//        }]
//      },"options":{}});

new Chart(document.getElementById("grafico_incidencia"),
    {
        "type":"bar",
        "data":{"labels":[<?php

                          foreach ($incidencias as $value) {

                          echo "'".$value["fecha"]."',";

                          }

                        ?>],
            "datasets":[{
                "label":"Servicios",
                "data":[<?php
                                foreach ($incidencias as $value) {

                                  echo "".$value["cantIncidencia"].",";

                                }


                                ?>],
                "fill":false,
                "backgroundColor":["rgba(255, 99, 132, 0.2)","rgba(255, 159, 64, 0.2)","rgba(255, 205, 86, 0.2)","rgba(75, 192, 192, 0.2)","rgba(54, 162, 235, 0.2)","rgba(153, 102, 255, 0.2)","rgba(201, 203, 207, 0.2)"],
                "borderColor":["rgb(252, 75, 108)","rgb(255, 159, 64)","rgb(255, 178, 43)","rgb(38, 198, 218)","rgb(54, 162, 235)","rgb(153, 102, 255)","rgb(201, 203, 207)"],
                "borderWidth":1}
            ]},
        "options":{
            "scales":{"yAxes":[{"ticks":{"beginAtZero":true}}]}
        }
    });

new Chart(document.getElementById("grafico_tecnico"),
    {
        "type":"bar",
        "data":{"labels":[<?php

            foreach ($tecnicos as $value) {

                echo "'".$value["nombre"]."',";

            }

            ?>],
            "datasets":[{
                "label":"Servicios x Ténico",
                "data":[<?php
                    foreach ($tecnicos as $value) {

                        echo "".$value["cantIncidencia"].",";

                    }


                    ?>],
                "fill":false,
                "backgroundColor":["rgba(255, 99, 132, 0.2)","rgba(255, 159, 64, 0.2)","rgba(255, 205, 86, 0.2)","rgba(75, 192, 192, 0.2)","rgba(54, 162, 235, 0.2)","rgba(153, 102, 255, 0.2)","rgba(201, 203, 207, 0.2)"],
                "borderColor":["rgb(252, 75, 108)","rgb(255, 159, 64)","rgb(255, 178, 43)","rgb(38, 198, 218)","rgb(54, 162, 235)","rgb(153, 102, 255)","rgb(201, 203, 207)"],
                "borderWidth":1}
            ]},
        "options":{
            "scales":{"yAxes":[{"ticks":{"beginAtZero":true}}]}
        }
    });

</script>
