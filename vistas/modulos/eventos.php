<?php

$respuesta = ModeloIncidencia::mdlMostrarIncidenciasEventos("incidencias",$_SESSION["id"],$_SESSION["perfil"]);

?>

<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <input type="hidden" id="id_usuario_Calendar"  perfil = "<?php echo $_SESSION["perfil"] ?>" value="<?php echo $_SESSION["id"] ?>">

    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Eventos</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Inicio</li>
                    <li class="breadcrumb-item active">Eventos</li>
                </ol>
            </div>

        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">

            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">

<!--                        <div class="row">-->
<!--                            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">-->
<!--                                <h4 class="card-title">Extra Large modal <small>Click on image</small></h4>-->
<!--                                <button type="button" class="btn waves-effect waves-light btn-block btn-info" data-toggle="modal" data-target="#add-new-event"><i class="ti-plus"></i> Agregar evento</button>-->
<!--                            </div>-->
<!--                        </div>-->
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BEGIN MODAL -->
        <div class="modal none-border bs-example-modal-lg" id="my-event">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Servicio</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-success save-event waves-effect waves-light">Crear evento</button>
<!--                        <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Eliminar</button>-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Add Category -->
        <div class="modal fade none-border bs-example-modal-lg" id="add-new-event">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Extra Large modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form role="form">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">Category Name</label>
                                    <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Choose Category Color</label>
                                    <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                        <option value="success">Success</option>
                                        <option value="danger">Danger</option>
                                        <option value="info">Info</option>
                                        <option value="primary">Primary</option>
                                        <option value="warning">Warning</option>
                                        <option value="inverse">Inverse</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Crear evento</button>
                        <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <div class="right-sidebar">
            <div class="slimscrollright">
                <div class="rpanel-title"> Service Panel
                            <span>
                                <i class="ti-close right-side-toggle"></i>
                            </span>
                </div>
                <div class="r-panel-body">
                    <ul id="themecolors" class="m-t-20">
                        <li>
                            <b>With Light sidebar</b>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-theme="default" class="default-theme">1</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-theme="green" class="green-theme">2</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-theme="red" class="red-theme">3</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a>
                        </li>
                        <li class="d-block m-t-30">
                            <b>With Dark sidebar</b>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a>
                        </li>
                    </ul>
<!--                    <ul class="m-t-20 chatonline">-->
<!--                        <li>-->
<!--                            <b>Chat option</b>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="javascript:void(0)">-->
<!--                                <img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle">-->
<!--                                        <span>Varun Dhavan-->
<!--                                            <small class="text-success">online</small>-->
<!--                                        </span>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="javascript:void(0)">-->
<!--                                <img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle">-->
<!--                                        <span>Genelia Deshmukh-->
<!--                                            <small class="text-warning">Away</small>-->
<!--                                        </span>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="javascript:void(0)">-->
<!--                                <img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle">-->
<!--                                        <span>Ritesh Deshmukh-->
<!--                                            <small class="text-danger">Busy</small>-->
<!--                                        </span>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="javascript:void(0)">-->
<!--                                <img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle">-->
<!--                                        <span>Arijit Sinh-->
<!--                                            <small class="text-muted">Offline</small>-->
<!--                                        </span>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="javascript:void(0)">-->
<!--                                <img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle">-->
<!--                                        <span>Govinda Star-->
<!--                                            <small class="text-success">online</small>-->
<!--                                        </span>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="javascript:void(0)">-->
<!--                                <img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle">-->
<!--                                        <span>John Abraham-->
<!--                                            <small class="text-success">online</small>-->
<!--                                        </span>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="javascript:void(0)">-->
<!--                                <img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle">-->
<!--                                        <span>Hritik Roshan-->
<!--                                            <small class="text-success">online</small>-->
<!--                                        </span>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="javascript:void(0)">-->
<!--                                <img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle">-->
<!--                                        <span>Pwandeep rajan-->
<!--                                            <small class="text-success">online</small>-->
<!--                                        </span>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                    </ul>-->
                </div>
            </div>
        </div>
        
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->

<script>



    $(document).ready(function() {
        "use strict";

        var CalendarApp = function() {
            this.$body = $("body")
            this.$calendar = $('#calendar'),
                this.$event = ('#calendar-events div.calendar-events'),
                this.$categoryForm = $('#add-new-event form'),
                this.$extEvents = $('#calendar-events'),
                this.$modal = $('#my-event'),
                this.$saveCategoryBtn = $('.save-category'),
                this.$calendarObj = null
        };


        /* on drop */
        CalendarApp.prototype.onDrop = function (eventObj, date) {
            var $this = this;
            // retrieve the dropped element's stored Event Object
            var originalEventObject = eventObj.data('eventObject');
            var $categoryClass = eventObj.attr('data-class');
            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);
            // assign it the date that was reported
            copiedEventObject.start = date;
            if ($categoryClass)
                copiedEventObject['className'] = [$categoryClass];
            // render the event on the calendar
            $this.$calendar.fullCalendar('renderEvent', copiedEventObject, true);
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                eventObj.remove();
            }
        },
            /* on click on event */
            CalendarApp.prototype.onEventClick =  function (calEvent, jsEvent, view) {
                var $this = this;
                var form = $("<form></form>");
                form.append("<label>Cambiar nombre del evento</label>");
                form.append("<div class='input-group'><input class='form-control' type=text value='" + calEvent.title + "' /><span class='input-group-btn'></span></div>");
                $this.$modal.modal({
                    backdrop: 'static'
                });
                $this.$modal.find('.delete-event').show().end().find('.save-event').hide().end().find('.modal-body').empty().prepend(form).end().find('.delete-event').unbind('click').click(function () {
                    $this.$calendarObj.fullCalendar('removeEvents', function (ev) {
                        return (ev._id == calEvent._id);
                    });
                    $this.$modal.modal('hide');
                });
                $this.$modal.find('form').on('submit', function () {
                    calEvent.title = form.find("input[type=text]").val();
                    $this.$calendarObj.fullCalendar('updateEvent', calEvent);
                    $this.$modal.modal('hide');
                    return false;
                });
            },
            /* on select */
            CalendarApp.prototype.onSelect = function (start, end, allDay) {
                var $this = this;
                $this.$modal.modal({
                    backdrop: 'static'
                });
                var form = $("<form></form>");
                form.append("<div class='row'></div>");
                form.find(".row")
                    .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Event Name</label><input class='form-control' placeholder='Insert Event Name' type='text' name='title'/></div></div>")
                    .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Category</label><select class='form-control' name='category'></select></div></div>")
                    .find("select[name='category']")
                    .append("<option value='bg-danger'>Danger</option>")
                    .append("<option value='bg-success'>Success</option>")
                    .append("<option value='bg-purple'>Purple</option>")
                    .append("<option value='bg-primary'>Primary</option>")
                    .append("<option value='bg-pink'>Pink</option>")
                    .append("<option value='bg-info'>Info</option>")
                    .append("<option value='bg-warning'>Warning</option></div></div>");
                $this.$modal.find('.delete-event').hide().end().find('.save-event').show().end().find('.modal-body').empty().prepend(form).end().find('.save-event').unbind('click').click(function () {
                    form.submit();
                });
                $this.$modal.find('form').on('submit', function () {
                    var title = form.find("input[name='title']").val();
                    var beginning = form.find("input[name='beginning']").val();
                    var ending = form.find("input[name='ending']").val();
                    var categoryClass = form.find("select[name='category'] option:checked").val();
                    if (title !== null && title.length != 0) {
                        $this.$calendarObj.fullCalendar('renderEvent', {
                            title: title,
                            start:start,
                            end: end,
                            allDay: false,
                            className: categoryClass
                        }, true);
                        $this.$modal.modal('hide');
                    }
                    else{
                        alert('You have to give a title to your event');
                    }
                    return false;

                });
                $this.$calendarObj.fullCalendar('unselect');
            },
            CalendarApp.prototype.enableDrag = function() {
                //init events
                $(this.$event).each(function () {
                    // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                    // it doesn't need to have a start or end
                    var eventObject = {
                        title: $.trim($(this).text()) // use the element's text as the event title
                    };
                    // store the Event Object in the DOM element so we can get to it later
                    $(this).data('eventObject', eventObject);
                    // make the event draggable using jQuery UI
                    $(this).draggable({
                        zIndex: 999,
                        revert: true,      // will cause the event to go back to its
                        revertDuration: 0  //  original position after the drag
                    });
                });
            }
        /* Initializing */
        CalendarApp.prototype.init = function() {

            var $this = this;
            $this.$calendarObj = $this.$calendar.fullCalendar({
                slotDuration: '00:15:00', /* If we want to split day time each 15minutes */
                minTime: '08:00:00',
                maxTime: '19:00:00',
                defaultView: 'month',
                handleWindowResize: true,

                header: {
                    language: 'es',
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: [
                <?php  foreach($respuesta as $event):

                $start = explode(" ", $event['start']);



                ?>
                {
                    id: '<?php echo $event['id']; ?>',
                    title: '<?php echo $event['title'] .' / '.str_replace("-"," ",$event['tipo_servicio']); ?>',
                    start: '<?php echo $event['start']; ?>',
                    color: '<?php echo $event['color']; ?>'

                },
                <?php endforeach; ?>
            ],
                //events:defaultEvents,
                editable: false,
                droppable: false, // this allows things to be dropped onto the calendar !!!
                eventLimit: false, // allow "more" link when too many events
                selectable: false,
                drop: function(date) { $this.onDrop($(this), date); },
                select: function (start, end, allDay) { $this.onSelect(start, end, allDay); },
                eventClick: function(calEvent, jsEvent, view) {
                    $this.onEventClick(calEvent, jsEvent, view);
                }

            });

            //on new event
            this.$saveCategoryBtn.on('click', function(){
                var categoryName = $this.$categoryForm.find("input[name='category-name']").val();
                var categoryColor = $this.$categoryForm.find("select[name='category-color']").val();
                if (categoryName !== null && categoryName.length != 0) {
                    $this.$extEvents.append('<div class="calendar-events" data-class="bg-' + categoryColor + '" style="position: relative;"><i class="fa fa-circle text-' + categoryColor + '"></i>' + categoryName + '</div>')
                    $this.enableDrag();
                }
                alert(categoryName);
                alert(categoryColor);

            });



        },

            //init CalendarApp
            $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp

    })

//initializing CalendarApp
    $(document).ready(function() {
            "use strict";
            $.CalendarApp.init()
    })

    </script>
