/**
 * Created by COOR.SISTEMAS on 19/06/2019.
 */
/**
 * Capture, save and regenerate a user's signature using
 * the SignaturePad jQuery plugin.
 *
 * Note: Only this script (functions.js) was written by Aaron Tennyson.
 * SignaturePad and it's dependencies are the work of their respective
 * authors.
 *
 * @author Aaron Tennyson <aaron@aarontennyson.com>
 * @link http://www.codecompendium.com/tutorials/demo/signature-pad/
 * @copyright Copyright 2011, Aaron Tennyson
 *
 * Dependencies:
 * SignaturePad 2.0.2 http://thomasjbradley.ca/lab/signature-pad
 *
 */

$(document).ready(function() {

    /********************** Capture and save a signature **********************/

    /*** Configure options for SignaturePad ***/
    var options = {
        defaultAction: 'drawIt',
        drawOnly: true,
        lineTop: 70,
        lineMargin: 20,
        penColour: '#FFF'

    }

    /*** Inicialice el complemento con las opciones configuradas para aceptar una firma. ***/
    $('.sigPad').signaturePad(options);

    /********************** Regenera la firma almacenada **********************/

    //var signature = $('.signed').signaturePad({displayOnly:true}); // almacena una referencia al elemento DOM donde
                                                                   // Queremos regenerar la firma guardada.

    /*** Obtener datos de firma almacenados y regenerarlos al hacer clic en el botón ***/
    //$('#get').click(function() {
    //    $.ajax({
    //        url: 'return_signature.php',
    //        type: 'POST',
    //        success: function(data) {
    //
    //            signature.regenerate(data); // Regenera la firma en el elemento DOM almacenado.
    //        }
    //    });
    //});
});