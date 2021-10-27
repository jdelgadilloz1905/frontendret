/**
 * Created by JORGE DELGADILLO on 16/04/2019.
 */
var rutaOcultaFrontend = $("#rutaOculta").val();

$('#ingclienteInc').click(function(){

    var idCliente = $(this).val();


    var datos = new FormData();
    datos.append("idCliente", idCliente);

    $.ajax({

        url:rutaOcultaFrontend+"ajax/incidencia.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta){

            console.log("respuesta", respuesta);

            $('#ingDireccion').val(respuesta);
        }

    });
})

$('#editclienteInc' ).click(function(){

    var idCliente = $(this).val();

    var datos = new FormData();
    datos.append("idCliente", idCliente);

    $.ajax({

        url:rutaOcultaFrontend+"ajax/incidencia.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta){

            console.log("respuesta", respuesta);

            $('#editDireccion').val(respuesta);
        }

    });
})

$('#generarPlanilla').click(function(){

    var id_incidencia = $(this).attr("id_incidencia");

    var TipoServicio = $("#editTipoServicio").val();

    if(TipoServicio == "plomeria"){

        window.location = rutaOcultaFrontend+"servicio-de-plomeria/"+id_incidencia;

    }else{

        window.location = rutaOcultaFrontend+"servicio-general/"+id_incidencia;
    }
})

$('#verGenerarPlanilla').click(function(e){

    e.preventDefault();
    var id_incidencia = $(this).attr("id_incidencia");

    var TipoServicio = $("#editTipoServicio").val();

    if(TipoServicio == "plomeria"){

        window.location = rutaOcultaFrontend+"ver-servicio-de-plomeria/"+id_incidencia;

    }else{

        window.location = rutaOcultaFrontend+"ver-servicio-general/"+id_incidencia;
    }
})


$('.validarFotos').click(function(){

    $(".alerta").remove();

    var condicion = $('.micheckbox').is(':checked');

    if(!condicion){

        $(".message").after('<div class="alert alert-danger alert-rounded alerta">Seleccione una opción<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>');

        return false;


    }
})

/*=============================================
    CAMBIAR DE ESTADO LA INCIDENCIA
 =============================================*/

$(".tablaListaIncidencia tbody").on("click", ".btnCambiarEstatus", function(){


    var estadoincidencia = $(this).attr("estadoincidencia");
    var id_incidencia = $(this).attr("id_incidencia");
    var tipo_servicio = $(this).attr("tipo_servicio");


    if(estadoincidencia != 3){

        if(estadoincidencia==1){

            swal({
                title: '¿Preparado para comenzar?',
                text: "¡Si no lo está puede cancelar la acción!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'No',
                confirmButtonText: 'Si'
            }).then((result) => {
                if (result.value) {

                    var datos = new FormData();
                    datos.append("estadoincidencia", estadoincidencia);
                    datos.append("id_incidencia", id_incidencia);

                    $.ajax({

                        url:rutaOculta+"ajax/incidencia.ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(respuesta){

                            // console.log("respuesta", respuesta);

                        }

                    });

                    if(estadoincidencia == 1){

                        $(this).removeClass('btn-dark');
                        $(this).addClass('btn-success');
                        $(this).html('Proceso');
                        $(this).attr('estadoincidencia',2);

                    }else{
                        $(this).removeClass('btn-success');
                        $(this).addClass('btn-primary');
                        $(this).html('Terminado');
                        $(this).attr('estadoincidencia',3);

                    }
                }

            })
        }else{

            swal({
                title: '¿Estas seguro de cerrar el servicio?',
                text: "¡Si no lo está puede cancelar la acción!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'No',
                confirmButtonText: 'Si'
            }).then((result) => {
                if (result.value) {

                    var datos = new FormData();
                    datos.append("estadoincidencia", estadoincidencia);
                    datos.append("id_incidencia", id_incidencia);

                    $.ajax({

                        url:rutaOculta+"ajax/incidencia.ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(respuesta){


                            //redireccionar para que genere la planilla de impresion y el cliente pueda firmarlo
                            // console.log("respuesta", respuesta);
                            if(tipo_servicio =="plomeria"){

                                window.location = rutaOcultaFrontend+"servicio-de-plomeria/"+id_incidencia;

                            }else{

                                window.location = rutaOcultaFrontend+"servicio-general/"+id_incidencia;
                            }


                        }

                    });

                    if(estadoincidencia == 1){

                        $(this).removeClass('btn-dark');
                        $(this).addClass('btn-success');
                        $(this).html('Proceso');
                        $(this).attr('estadoincidencia',2);

                    }else{

                        $(this).addClass('btn-success');
                        $(this).removeClass('btn-primary');
                        $(this).html('Terminado');
                        $(this).attr('estadoincidencia',3);

                        //redirecciono para generar la planilla de impresion

                    }

                }

            })
        }

    }


})

/*=============================================
 IMPRIMIR INCIDENCIA
 =============================================*/

$(".tablas").on("click", ".btnImprimirIncidenciaTabla", function(e){

    e.preventDefault();

    var idIncidencia = $(this).attr("idIncidencia");

    window.open("extensiones/tcpdf/pdf/incidencia.php?codigo="+idIncidencia,'_blank');

});

$(".btnImprimirIncidencia").click(function(e){

    e.preventDefault();

    var idIncidencia = $(this).attr("idIncidencia");

    window.open("extensiones/tcpdf/pdf/incidencia.php?codigo="+idIncidencia,'_blank');

});


$(".tablas").on("click", ".marcar", function(){

    var idIncidencia = $(this).attr("id_incidencia");  //guardamos el value, que contiene el marcaPublicador, del checkbox que activamos

    var aria_pressed = $(this).attr("aria-pressed");

    var nuevovalor = new Array(); // creamos un array vacío

    var getlocal = localStorage.getItem("localMarcaIncidencia"); //asignamos el elemento "localMarcaPublicador" a una varible

    var cont;

    var parslocal;

    if(aria_pressed === "false"){

//Si el item está activado guarda el valor en localStorage

        if(getlocal != null && getlocal != "" && getlocal != false && getlocal != undefined){ //comprobamos que nuestra variable exista

            parslocal = JSON.parse(getlocal); //Transforma la variable con el contenido de nuestro elemento en localStorage a un objeto Javascript

            $.each(parslocal, function(index, value){

                cont = index;

                nuevovalor[index] = value; //llenamos nuestro array vacío con los valores que ya existen en nuestro elemento

            });

            cont++;

            nuevovalor[cont] = idIncidencia;

            localStorage.setItem("localMarcaIncidencia", JSON.stringify(nuevovalor));

        } else {//en el caso que no exista el elemento en localStorage

            var saveLocal = new Array();//Creamos un nuevo array vacío

            saveLocal[0] = idIncidencia; //asignamos al comienzo de nuestro array, el valor de nuestro elemento

            localStorage.setItem("localMarcaIncidencia", JSON.stringify(saveLocal));//guardamos nuestro valor en localStorage

        }

    }else {

//Si el item no está activado

        if(getlocal != null && getlocal != "" && getlocal != false && getlocal != undefined){//Comprobamos que el elemento existe en localStorage

            parslocal = JSON.parse(getlocal);

            var contador = 0;

            $.each(parslocal, function(index, value){

                cont = index;

                if(value != idIncidencia && value != null && value != undefined && value != false){//si el el valor que estamos haciendo el loop, no coincide al valor ingresado, entonces lo ingresa en el array

                    nuevovalor[contador] = value;

                    contador++;

                }

            });

            if(cont == 0){//si cont es igual a 0, significa que sólo se encuentra en nuestro localStorage el marcaPublicador que ingresamos, por lo tanto solo eliminamos el elemento completo

                localStorage.removeItem("localMarcaIncidencia");

            }else{//de lo contrario, existen más valores, pro lo que rehacemos el elemento con los valores que no coincidieron con el encontrado

                localStorage.setItem("localMarcaIncidencia", JSON.stringify(nuevovalor));

            }

        }

    }



});


$(".tablas").on("click", ".marcarAprobar", function(){

    var idIncidencia = $(this).attr("id_incidencia");  //guardamos el value, que contiene el marcaPublicador, del checkbox que activamos

    var aria_pressed = $(this).attr("aria-pressed");

    var nuevovalor = new Array(); // creamos un array vacío

    var getlocal = localStorage.getItem("localMarcaAprobarServicio"); //asignamos el elemento "localMarcaPublicador" a una varible

    var cont;

    var parslocal;

    if(aria_pressed === "false"){

//Si el item está activado guarda el valor en localStorage

        if(getlocal != null && getlocal != "" && getlocal != false && getlocal != undefined){ //comprobamos que nuestra variable exista

            parslocal = JSON.parse(getlocal); //Transforma la variable con el contenido de nuestro elemento en localStorage a un objeto Javascript

            $.each(parslocal, function(index, value){

                cont = index;

                nuevovalor[index] = value; //llenamos nuestro array vacío con los valores que ya existen en nuestro elemento

            });

            cont++;

            nuevovalor[cont] = idIncidencia;

            localStorage.setItem("localMarcaAprobarServicio", JSON.stringify(nuevovalor));

        } else {//en el caso que no exista el elemento en localStorage

            var saveLocal = new Array();//Creamos un nuevo array vacío

            saveLocal[0] = idIncidencia; //asignamos al comienzo de nuestro array, el valor de nuestro elemento

            localStorage.setItem("localMarcaAprobarServicio", JSON.stringify(saveLocal));//guardamos nuestro valor en localStorage

        }

    }else {

//Si el item no está activado

        if(getlocal != null && getlocal != "" && getlocal != false && getlocal != undefined){//Comprobamos que el elemento existe en localStorage

            parslocal = JSON.parse(getlocal);

            var contador = 0;

            $.each(parslocal, function(index, value){

                cont = index;

                if(value != idIncidencia && value != null && value != undefined && value != false){//si el el valor que estamos haciendo el loop, no coincide al valor ingresado, entonces lo ingresa en el array

                    nuevovalor[contador] = value;

                    contador++;

                }

            });

            if(cont == 0){//si cont es igual a 0, significa que sólo se encuentra en nuestro localStorage el marcaPublicador que ingresamos, por lo tanto solo eliminamos el elemento completo

                localStorage.removeItem("localMarcaAprobarServicio");

            }else{//de lo contrario, existen más valores, pro lo que rehacemos el elemento con los valores que no coincidieron con el encontrado

                localStorage.setItem("localMarcaAprobarServicio", JSON.stringify(nuevovalor));

            }

        }

    }



});

$("#CambiarOpcion,#CambiarOpcion2").on("click", function(){

    var cadena = JSON.parse(localStorage.getItem("localMarcaIncidencia"));

    $('#actidIncidencias').val(cadena);

    $('#aprobarIncidencias').val(cadena);
    
});

$("#CambiarOpcion3").on("click", function(){

    var cadena = JSON.parse(localStorage.getItem("localMarcaAprobarServicio"));

    $('#aprobarIncidencias').val(cadena);

});

/*=============================================
 ELIMINAR INCIDENCIAS
 =============================================*/

$(".tablas").on("click", ".btnEliminarincidencia", function(){

    var idIncidencia = $(this).attr("idIncidencia");

    swal({
        title: '¿Está seguro de borrar la Incidencia?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar incidencia!'
    }).then((result)=>{

        if(result.value){
            
            var datos = new FormData();
            datos.append("idIncidencia",idIncidencia);

            $.ajax({

                url:rutaOculta+"ajax/incidencia.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success:function(respuesta){

                    if(respuesta == "ok"){

                        swal({
                            title: "Buen trabajo",
                            text: "El servicio ha sido borrado correctamente",
                            type: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Cerrar"
                        }).then((result) => {
                            if (result.value) {

                                location.reload();
                            }
                    })

                    }

                }

            })

        }

    })

})

/*======================================
  CARGAR TIENDAS SELECCIONANDO UN GRUPO
* ======================================*/
$("#ingGrupoInc").change(function(){

    var idGrupo = $("#ingGrupoInc").val();

    $.ajax({

        type: "POST",

        url: rutaOculta+"ajax/incidencia.ajax.php",

        data:{idGrupo:idGrupo},

        cache: true

    })

        .done(function(listas_tiendas){

            $('#ingclienteInc').html(listas_tiendas)

        })

        .fail(function(){

            console.log('Error al cargar las tiendas')

        })

})

$("#editGrupoInc").change(function(){

    var idGrupo = $("#editGrupoInc").val();

    $.ajax({

        type: "POST",

        url: rutaOculta+"ajax/incidencia.ajax.php",

        data:{idGrupo:idGrupo},

        cache: true

    })

        .done(function(listas_tiendas){

            $('#editclienteInc').html(listas_tiendas)

        })

        .fail(function(){

            console.log('Error al cargar las tiendas')

        })

})

// $('.btnEliminarLoteIncidencia').click(function () {
//
//     var idIncidencias = $('#actidIncidencias').val();
//
//     var datos = new FormData();
//     datos.append("idIncidencias",idIncidencias);
//     datos.append("eliminarLote","si");
//
//     $.ajax({
//
//         url:rutaOculta+"ajax/incidencia.ajax.php",
//         method: "POST",
//         data: datos,
//         cache: false,
//         contentType: false,
//         processData: false,
//         success:function(respuesta){
//
//             console.log(respuesta);
//             if(respuesta == "ok"){
//
//                 swal({
//                     title: "Buen trabajo",
//                     text: "Las incidencias han sido borrada correctamente",
//                     type: "success",
//                     showCancelButton: false,
//                     confirmButtonColor: "#3085d6",
//                     cancelButtonColor: "#d33",
//                     confirmButtonText: "Cerrar"
//                 }).then((result) => {
//                     if (result.value) {
//
//                     //location.reload();
//                     }
//                 })
//
//             }else{
//
//                 alert("error al eliminar");
//             }
//
//         }
//
//     })
// })

//$('.micheckbox').on('click', function() {
//    if( $(this).is(':checked') ){
//        // Hacer algo si el checkbox ha sido seleccionado
//        alert("El checkbox con valor " + $(this).val() + " ha sido seleccionado");
//    } else {
//        // Hacer algo si el checkbox ha sido deseleccionado
//        alert("El checkbox con valor " + $(this).val() + " ha sido deseleccionado");
//    }
//});