<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">

        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?php
                        /**
                         * Created by PhpStorm.
                         * User: jorge delgadillo
                         * Date: 13/04/2019
                         * Time: 08:31
                         */


                        $respuesta = ControladorClientes::ctrMostrarClientes(null,null);

                        $datosJson = '[';

                            for($i = 0; $i < count($respuesta)-1; $i++){


                                $datosJson .= '{
                                  "team":"'.$respuesta[$i]["nombre"].'"
                                },';

                            }
                            $datosJson = substr($datosJson, 0, -1);

                            $datosJson.=  '

		                ]';

                        echo $datosJson;
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>

