/*=============================================
DATE RANGE
=============================================*/

$('#daterange-btn2').daterangepicker({

    ranges   : {
      'Hoy'       : [moment(), moment()],
      'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
      'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
      'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
      'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment().subtract(29, 'days'),
    endDate  : moment()

},
  
  function (start, end) {

    $('#daterange-btn2 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))

    var fechaInicial = start.format('YYYY-M-D');   
    var fechaFinal = end.format('YYYY-M-D');

    window.location = "index.php?ruta=reportes&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;
       
});

$("li[data-range-key='Últimos 30 días']").click(function(){

    function sumarDias(fecha, dias){
      fecha.setDate(fecha.getDate() + dias);
      return fecha;
    }

    var fHasta = new Date();
    var fDesde = sumarDias(fHasta, -30);

    var mesHasta = fHasta.getMonth()+2;
    //console.log("mesHasta", mesHasta);
    var diaHasta = fHasta.getDate();
    var añoHasta = fHasta.getFullYear();

    var fechaHasta = (añoHasta + '-' + mesHasta + '-' + diaHasta);  

    var mesDesde = fDesde.getMonth()+1;
    var diaDesde = fDesde.getDate();
    var añoDesde = fDesde.getFullYear(); 

    var fechaDesde = (añoDesde + '-' + mesDesde + '-' + diaDesde);  

    window.location = "index.php?ruta=reportes&fechaInicial="+fechaDesde+"&fechaFinal="+fechaHasta;

})


