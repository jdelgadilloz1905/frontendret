<?php

//include ("../funciones/conexion.php");

//include("../funciones/funciones.php");cargarImagenIncidencia



if($_POST["funcion"] =="cargarImagenIncidencia"){
    $id_incidencia = $_POST["id_incidencia"];
    $momento = $_POST["momento"];
    $id_usuario = $_POST["id_usuario"];
    $estado = $_POST["estado"];

    //cambio el estado de la indencia siempre que sea por INICIAR
    //se hace de esta manera para que solo cambie de estatus cuando el
    //usuario termine de llenar el formulario, entonces se procede a cerrar
    //la incidencia, esto se hace en otra funcion
    if($estado==1){
        $datos= array(
            "id_incidencia" =>$id_incidencia,
            "estado"=>$estado
        );

        $result = ControladorIncidencia::ctrCambiarEstadoIncidencia($datos);
    }


    //procedo a cargar fotos
    if(count($_FILES)>0){
        for($i = 0; $i < count($_FILES); ++$i) {

            $aleatorio = substr(str_shuffle("_0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);

            $variable = "foto".$i;
            $tipo = $_FILES[$variable]["type"];
            $archivo = $_FILES[$variable]["tmp_name"];
            $nombre = $id_usuario."_".$id_incidencia."_".$aleatorio;
            $size = $_FILES[$variable]["size"];
            $rutaImagen= 'vistas/img/incidencias/';

            if (strstr($tipo, "jpeg"))
                $extension ="jpg";

            else if (strstr($tipo, "jpg"))
                $extension ="jpg";

            else if (strstr($tipo, "gif"))
                $extension ="gif";


            else if (strstr($tipo, "png"))
                $extension ="png";


            else if (strstr($tipo, "pdf"))
                $extension ="pdf";

            $imagen = subir_imagen($tipo,$archivo,$nombre,$rutaImagen);

            $datos = array(
                "name"=>$nombre.".".$extension,
                "type"=>$tipo,
                "title"=>$nombre,
                "size"=>$size,
                "extension"=>$extension,
                "img_url"=>$rutaImagen.$nombre.".".$extension,
                "id_incidencia"=>$id_incidencia,
                "momento" =>$momento
            );

            $respuesta= ControladorIncidencia::ctrInsertarImagenAnuncio($datos);
        };

//        foreach($_FILES as $rutaImagen){
//
//            //funcion para generar el nombre del archivo
//
//            $datos = array(
//                "name"=>$rutaImagen["name"],
//                "type"=>$rutaImagen["type"],
//                "title"=>$rutaImagen["title"],
//                "size"=>$rutaImagen["size"],
//                "extension"=>$rutaImagen["extension"],
//                "img_url"=>$rutaImagenAnuncio,
//                "id_incidencia"=>$id_incidencia,
//                "momento" =>$momento
//            );
//            ControladorIncidencia::ctrInsertarImagenAnuncio($datos);
//
//        }

        echo json_encode(array(
            "resultado"=>"ok"
        ));

    }else{

        echo json_encode(array(
            "resultado"=>"ok"
        ));
    }
}

if($_POST["funcion"] =="cargarImagenPerfil"){

    $id_usuario = $_POST["id_usuario"];
    $usuario = $_POST["usuario"];
    $dispo = $_POST["dispositivo"];
    $foto = $_POST["foto"];

    $aleatorio = mt_rand(100,999);

    $variable = "fotoPerfil";
    $tipo = $_FILES[$variable]["type"];
    $archivo = $_FILES[$variable]["tmp_name"];
    $nombre = $aleatorio;
    $size = $_FILES[$variable]["size"];
    $rutaImagen= 'vistas/img/usuarios/'.$usuario."/";

    //CREO EL DIRECTORIO
    //$directorio= 'vistas/img/usuarios/'.$usuario;

//    if (file_exists($foto)){
//        unlink($foto);
//    }else{
//        mkdir($directorio, 0755);
//    }

    $imagen = subir_imagen($tipo,$archivo,$nombre,$rutaImagen);

    if (strstr($tipo, "jpeg"))
        $extension ="jpg";

    else if (strstr($tipo, "jpg"))
        $extension ="jpg";

    else if (strstr($tipo, "gif"))
        $extension ="gif";

    else if (strstr($tipo, "png"))
        $extension ="png";

    else if (strstr($tipo, "pdf"))
        $extension ="pdf";

    $datos = array(
        "id" => $id_usuario,
        "dispositivo" => $dispo,
        "usuario" =>$usuario,
        "foto" => $foto,
        "fotoNew" => $rutaImagen.$nombre.".".$extension,
        "tipo"=>$tipo,
        "nombre_archivo"=>$archivo,
        "nombre_foto_aleatorio"=>$nombre,
        "rutaImagen"=>$rutaImagen,
        "imagenNew"=>$imagen
    );

    $respuesta = ModeloUsuarios::mdlEditarFotoAPI("usuarios", $datos);


    if($respuesta=="ok"){

        echo json_encode(array(
            "datos" => $datos,
            "resultado"=>"ok"
        ));

    }else{
        echo json_encode(array(
            "datos" => $datos,
            "resultado"=>"error"
        ));

    }


}
// -------------------------- función para subir imagen -------------------------- //

function subir_imagen($tipo,$imagen,$email,$ruta){

    if ((strstr($tipo,"image") || (strstr($tipo,"application")))){

        // para saber que tipo de extencsion es la imagen

        if (strstr($tipo, "jpeg"))
            $extension =".jpg";

        else if (strstr($tipo, "jpg"))
            $extension =".jpg";

        else if (strstr($tipo, "gif"))
            $extension =".gif";


        else if (strstr($tipo, "png"))
            $extension =".png";


        else if (strstr($tipo, "pdf"))
            $extension =".pdf";

        // para saber si la imagen tiene el ancho correcto 420px

        $tam_img = getimagesize($imagen); // Devuelve arreglo de tamaño de imagen
        $ancho_img =$tam_img[0];
        $alto_img = $tam_img[1];

        $ancho_img_deseado = 1400;


        // si la imagen es mayor en su ancho  que 420 px, reajusto su tamaño

        if ($ancho_img > $ancho_img_deseado){

            // Por una regla de 3 obtengo la altura de la imagen proporcional al nuevo ancho

            $nuevo_ancho_img = $ancho_img_deseado;
            $nuevo_alto_img = ($alto_img/$ancho_img)*$nuevo_ancho_img;

            //Creo una imagen en color real con las nuevas dimensiones, este es el lienzo

            $img_reajustada = imagecreatetruecolor($nuevo_ancho_img, $nuevo_alto_img);

            //Creo una imagen basada en la original, dependiendo de su extension es el tipo que crearé

            switch ($extension) {

                case '.jpg':

                    $img_original =imagecreatefromjpeg($imagen);

                    // Rejusto la imagen nueva en funcion a la original

                    imagecopyresampled($img_reajustada, $img_original, 0, 0, 0, 0, $nuevo_ancho_img, $nuevo_alto_img, $ancho_img, $alto_img);

                    //Guardo la imagen reescalada en el servidor, imagejpeg hace lo mismo que la funcion moveupload de mas abajo, es la otra manera de subir la imagen

                    $nombre_img_ext = $ruta.$email.$extension;

                    $nombre_img = $ruta.$email;

                    imagejpeg($img_reajustada,$nombre_img_ext,100);

                    //Ejecuto la funcion para borrar posibles imagenes dobles en el perfil

                    borrar_imagenes ($nombre_img,".jpg");

                    break;

                case '.gif':

                    $img_original =imagecreatefromgif($imagen);

                    // Rejusto la imagen nueva en funcion a la original

                    imagecopyresampled($img_reajustada, $img_original, 0, 0, 0, 0, $nuevo_ancho_img, $nuevo_alto_img, $ancho_img, $alto_img);

                    //Guardo la imagen reescalada en el servidor, imagejpeg hace lo mismo que la funcion moveupload de mas abajo, es la otra manera de subir la imagen

                    $nombre_img_ext = $ruta.$email.$extension;

                    $nombre_img = $ruta.$email;



                    imagegif($img_reajustada,$nombre_img_ext,100);

                    //Ejecuto la funcion para borrar posibles imagenes dobles en el perfil

                    borrar_imagenes ($nombre_img,".gif");

                    break;

                case '.png':

                    $img_original =imagecreatefrompng($imagen);

                    // Rejusto la imagen nueva en funcion a la original

                    imagecopyresampled($img_reajustada, $img_original, 0, 0, 0, 0, $nuevo_ancho_img, $nuevo_alto_img, $ancho_img, $alto_img);

                    //Guardo la imagen reescalada en el servidor, imagejpeg hace lo mismo que la funcion moveupload de mas abajo, es la otra manera de subir la imagen

                    $nombre_img_ext = $ruta.$email.$extension;

                    $nombre_img = $ruta.$email;

                    imagepng($img_reajustada,$nombre_img_ext);

                    //Ejecuto la funcion para borrar posibles imagenes dobles en el perfil

                    borrar_imagenes ($nombre_img,".png");

                    break;

            }



        }else{

            // No se reajusta y guardo la ruta que tendra en el servidor la imagen

            $destino = $ruta.$email.$extension;

            // se sube la foto

            move_uploaded_file($imagen, $destino) or die("No se pudo subir la imagen al servidor");

            //Ejecuto la funcion para borrar posibles imagenes doble para el perfil

            $nombre_img = $ruta.$email;

            borrar_imagenes ($nombre_img,$extension);

        }

        // Asigno el nombre de la foto que se guardara en la cadena de texto

        $imagen=$email.$extension;

        return $imagen;

    }else{

        return false;
    }

}

// -------------------------- función para borrar imagen-------------------------- //

function borrar_imagenes ($ruta, $extension){

    switch ($extension){

        case '.jpg':
            if (file_exists($ruta."png"))
                unlink($ruta.".png");

            if (file_exists($ruta.".gif"))
                unlink($ruta.".gif") ;

            break;


        case '.gif':
            if (file_exists($ruta."png"))
                unlink($ruta.".png");

            if (file_exists($ruta.".jpg"))
                unlink($ruta.".jpg") ;

            break;


        case '.png':
            if (file_exists($ruta."jpg"))
                unlink($ruta.".jpg");

            if (file_exists($ruta.".gif"))
                unlink($ruta.".gif") ;

            break;
    }
}

function borrar_imagenes_borradas($ruta)

{

    if (file_exists($ruta.".png"))
        unlink($ruta.".png");

    if (file_exists($ruta.".gif"))
        unlink($ruta.".gif") ;

    if (file_exists($ruta.".jpg"))
        unlink($ruta.".jpg") ;

}


