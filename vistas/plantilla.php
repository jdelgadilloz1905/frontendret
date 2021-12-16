<?php

session_start();
$url = Ruta::ctrRuta();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $url; ?>vistas/img/plantilla/RET-logo-T-blanco.png">
    <title>RET</title>

    <input type="hidden" value="<?php echo $url; ?>" id="rutaOculta">
    <input type="hidden" value="<?php echo isset($_SESSION["perfil"]) ? $_SESSION["perfil"] : "" ; ?>" id="perfilOculto">
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $url; ?>vistas/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Typehead CSS -->
    <link href="<?php echo $url; ?>vistas/plugins/typeahead.js-master/dist/typehead-min.css" rel="stylesheet">

    <!-- wysihtml5 CSS -->
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/plugins/html5-editor/bootstrap-wysihtml5.css" />
    <!-- Dropzone css -->
    <link href="<?php echo $url; ?>vistas/plugins/dropzone-master/dist/dropzone.css" rel="stylesheet" type="text/css" />

    <!-- Custom CSS -->
    <link href="<?php echo $url; ?>vistas/css/style.css?v=3" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo $url; ?>vistas/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!-- Calendar CSS -->
    <link href="<?php echo $url; ?>vistas/plugins/calendar/dist/fullcalendar.css" rel="stylesheet" />

    <script src="<?php echo $url; ?>vistas/js/html5shiv.js"></script>
    <script src="<?php echo $url; ?>vistas/js/respond.min.js"></script>
    <!--This page css - Morris CSS -->
    <link href="<?php echo $url; ?>vistas/plugins/morrisjs/morris.css" rel="stylesheet">

    <link href="<?php echo $url; ?>vistas/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">

    <!-- DataTables -->

    <link rel="stylesheet" href="<?php echo $url; ?>vistas/plugins/datatables.net-bs/css/responsive.bootstrap.min.css">
    <link href="<?php echo $url; ?>vistas/plugins/datatables/media/css/dataTables.bootstrap4.css" rel="stylesheet">

    <link href="<?php echo $url ?>vistas/fonts/font-fileuploader.css" media="all" rel="stylesheet">
    <!-- css -->
    <link href="<?php echo $url ?>vistas/css/jquery.fileuploader.min.css" media="all" rel="stylesheet">
    <link href="<?php echo $url ?>vistas/css/jquery.fileuploader-theme-thumbnails.css" media="all" rel="stylesheet">

    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/plugins/bootstrap-daterangepicker/daterangepicker.css">



    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo $url; ?>vistas/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo $url; ?>vistas/plugins/popper/popper.min.js"></script>
    <script src="<?php echo $url; ?>vistas/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo $url; ?>vistas/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo $url; ?>vistas/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo $url; ?>vistas/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo $url; ?>vistas/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo $url; ?>vistas/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo $url; ?>vistas/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!--Morris JavaScript -->
    <script src="<?php echo $url; ?>vistas/plugins/raphael/raphael-min.js"></script>
    <script src="<?php echo $url; ?>vistas/plugins/morrisjs/morris.js"></script>


    <!-- Flot Charts JavaScript -->
    <script src="<?php echo $url; ?>vistas/plugins/flot/excanvas.js"></script>
    <script src="<?php echo $url; ?>vistas/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo $url; ?>vistas/plugins/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo $url; ?>vistas/plugins/flot/jquery.flot.time.js"></script>
    <script src="<?php echo $url; ?>vistas/plugins/flot/jquery.flot.stack.js"></script>
    <script src="<?php echo $url; ?>vistas/plugins/flot/jquery.flot.crosshair.js"></script>
    <script src="<?php echo $url; ?>vistas/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>

    <!-- DataTables -->
    <script src="<?php echo $url; ?>vistas/plugins/datatables/datatables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="<?php echo $url; ?>vistas/plugins/datatables.net/buttons/dataTables.buttons.min.js"></script>
    <script src="<?php echo $url; ?>vistas/plugins/datatables.net/buttons/buttons.flash.min.js"></script>
    <script src="<?php echo $url; ?>vistas/plugins/datatables.net-bs/js/dataTables.responsive.min.js"></script>

    <script src="<?php echo $url; ?>vistas/js/jszip.min.js"></script>
    <script src="<?php echo $url; ?>vistas/js/pdfmake.min.js"></script>
    <script src="<?php echo $url; ?>vistas/js/vfs_fonts.js"></script>
    <script src="<?php echo $url; ?>vistas/js/buttons.html5.min.js"></script>
    <script src="<?php echo $url; ?>vistas/js/buttons.print.min.js"></script>


    <!-- SweetAlert 2 -->
    <script src="<?php echo $url; ?>vistas/plugins/sweetalert2/sweetalert2.all.js"></script>

    <!-- Mask input -->
    <script src="<?php echo $url; ?>vistas/plugins/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="<?php echo $url; ?>vistas/js/mask.init.js"></script>
    <!-- plugin crear incidencia -->
    <script src="<?php echo $url; ?>vistas/plugins/html5-editor/wysihtml5-0.3.0.js"></script>
    <script src="<?php echo $url; ?>vistas/plugins/html5-editor/bootstrap-wysihtml5.js"></script>
    <script src="<?php echo $url; ?>vistas/plugins/dropzone-master/dist/dropzone.js"></script>

    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo $url; ?>vistas/plugins/styleswitcher/jQuery.style.switcher.js"></script>

    <script src="<?php echo $url; ?>vistas/plugins/calendar/jquery-ui.min.js"></script>

    <script src="<?php echo $url ?>vistas/js/jquery.fileuploader.min.js" type="text/javascript"></script>

    <!-- Efecto en la carga de archivos -->
    <script src="<?php echo $url ?>vistas/js/jasny-bootstrap.js"></script>

    <!-- Chart JS -->
    <script src="<?php echo $url; ?>vistas/plugins/Chart.js/Chart.min.js"></script>

    <!-- daterangepicker -->
    <script src="<?php echo $url; ?>vistas/plugins/moment/min/moment.min.js"></script>
    <script src="<?php echo $url; ?>vistas/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="<?php echo $url; ?>vistas/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

</head>

<body class="fix-header fix-sidebar card-no-border">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<?php
if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){

    echo '<div class="main-wrapper">';

    /*=============================================
    CABEZOTE
    =============================================*/

    include "modulos/cabezote.php";

    /*=============================================
    MENU
    =============================================*/

    include "modulos/menu.php";

    /*=============================================
    CONTENIDO
    =============================================*/

    if(isset($_GET["ruta"])){

        $rutas = explode("/", $_GET["ruta"]);

        if($rutas[0] == "inicio" ||
            $rutas[0] == "usuarios" ||
            $rutas[0] == "categorias" ||
            $rutas[0] == "productos" ||
            $rutas[0] == "clientes" ||
            $rutas[0] == "proveedores" ||
            $rutas[0] == "admin-incidencia" ||
            $rutas[0] == "crear-incidencia" ||
            $rutas[0] == "ventas" ||
            $rutas[0] == "crear-venta" ||
            $rutas[0] == "editar-venta" ||
            $rutas[0] == "ordenes" ||
            $rutas[0] == "crear-orden" ||
            $rutas[0] == "reportes" ||
            $rutas[0] == "lista-cliente" ||
            $rutas[0] == "eventos" ||
            $rutas[0] == "prueba" ||
            $rutas[0] == "perfil" ||
            $rutas[0] == "servicio-de-plomeria" ||
            $rutas[0] == "ver-servicio-de-plomeria" ||
            $rutas[0] == "servicio-general" ||
            $rutas[0] == "ver-servicio-general" ||
            $rutas[0] == "detalle-incidencia" ||
            $rutas[0] == "detalle-incidencia-cliente" ||
            $rutas[0] == "detalle-incidencia-grupo" ||
            $rutas[0] == "incidencias" ||
            $rutas[0] == "panel-incidencias" ||
            $rutas[0] == "grupo-incidencias" ||
            $rutas[0] == "grupo-cliente" ||
            $rutas[0] == "imprimir-reporte" ||
            $rutas[0] == "rutas" ||
            $rutas[0] == "crear-ruta" ||
            $rutas[0] == "asignar-ruta" ||
            $rutas[0] == "editar-ruta" ||
            $rutas[0] == "salir" ||
            $rutas[0] == "apiLogin" ){

            include "modulos/".$rutas[0].".php";

        }else{

            include "modulos/404.php";

        }

    }else{

        include "modulos/inicio.php";

    }

    /*=============================================
    FOOTER
    =============================================*/

    include "modulos/footer.php";

    echo '</div>';

}else{

    include "modulos/login.php";

}

?>



<script src="<?php echo $url; ?>vistas/js/plantilla.js"></script>
<script src="<?php echo $url; ?>vistas/js/usuarios.js"></script>
<script src="<?php echo $url; ?>vistas/js/categorias.js"></script>
<script src="<?php echo $url; ?>vistas/js/productos.js"></script>
<script src="<?php echo $url; ?>vistas/js/clientes.js"></script>
<script src="<?php echo $url; ?>vistas/js/proveedores.js"></script>
<script src="<?php echo $url; ?>vistas/js/incidencias.js"></script>
<script src="<?php echo $url ?>vistas/js/custom2.js" type="text/javascript"></script>
<script src="<?php echo $url; ?>vistas/js/ventas.js"></script>
<script src="<?php echo $url; ?>vistas/js/ordenes.js"></script>
<script src="<?php echo $url; ?>vistas/js/grupo-cliente.js"></script>
<script src="<?php echo $url; ?>vistas/js/ruta-cliente.js"></script>
<script src="<?php echo $url; ?>vistas/js/reportes.js"></script>


<script src="<?php echo $url; ?>vistas/js/jquery.signaturepad.min.js"></script>
<script src="<?php echo $url; ?>vistas/js/json2.min.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>vistas/js/functions.js"></script>

<script>

    $('#mdate').bootstrapMaterialDatePicker({format: 'MM-DD-YYYY', dateFormat : "YYY-MM-DD", weekStart: 0, time: false, minDate : new Date() });

    $(document).ready(function() {

        $('.textarea_editor').wysihtml5();

    });
</script>

<script src="<?php echo $url; ?>vistas/plugins/typeahead.js-master/dist/typeahead.bundle.min.js"></script>
<script src="<?php echo $url; ?>vistas/plugins/typeahead.js-master/typeahead.init.js"></script>


<script src='<?php echo $url; ?>vistas/plugins/calendar/dist/fullcalendar.min.js'></script>
<script src="<?php echo $url; ?>vistas/plugins/calendar/dist/cal-init.js"></script>



<!--=====================================
    VENTANA MODAL PROCESANDO PAGO
    ======================================-->
<!-- Modal -->
<div class="modal fade" id="procesarImagen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="myModalLabel">Espere por favor...</h2>
                </div>
                <div class="modal-body text-center">
                    <div class="overlay">
                        <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
                            <span class="sr-only">Procesando...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    //$('#mdate').bootstrapMaterialDatePicker({ weekStart: 0, time: false });
</script>
</body>

</html>