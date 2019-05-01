@extends('theme.app')

@section('calendar-css')
    <style>
        .modal-mask {
            position: fixed;
            z-index: 9998;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, .5);
            display: table;
            transition: opacity .3s ease;
        }

        .modal-wrapper {
            display: table-cell;
            vertical-align: middle;
        }

        .modal-container {
            width: 300px;
            margin: 0px auto;
            padding: 20px 30px;
            background-color: #fff;
            border-radius: 2px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
            transition: all .3s ease;
            font-family: Helvetica, Arial, sans-serif;
        }

        .modal-header h3 {
            margin-top: 0;
            color: #42b983;
        }

        .modal-body {
            margin: 20px 0;
        }

        .modal-default-button {
            float: right;
        }

        .modal-enter {
            opacity: 0;
        }

        .modal-leave-active {
            opacity: 0;
        }

        .modal-enter .modal-container,
        .modal-leave-active .modal-container {
            -webkit-transform: scale(1.1);
            transform: scale(1.1);
        }
    </style>
@endsection

@section('content')
        @include('event_partial_search')
        <div id='calendar'></div>
        @include('event_modal_create')
        @include('event_modal_update')
        @include('event_modal_loading')
@endsection

@section('calendar-js')
<script>
    function get_calendar_height() {
        return $(window).height() - 30;
    }
    $(document).ready(function(){
        $(window).resize(function() {
            $('#calendar').fullCalendar('option', 'height', get_calendar_height());
        });

        $('#search-collaborator').val(1);
        var selectedCollaborator = $("#search-collaborator").val();
        $('#calendar').fullCalendar({
            height: get_calendar_height,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            businessHours: {
                // days of week. an array of zero-based day of week integers (0=Sunday)
                dow: [1, 2, 3, 4, 5 ], // Monday - Thursday
                start: '08:00', // a start time (10am in this example)
                end: '19:00', // an end time (6pm in this example)
            },
            // firstDay: moment().day(),
            minTime: "08:00:00",
            maxTime: "20:00:00",
            defaultView: 'agendaWeek',
            allDaySlot: false,
            weekends: false,
            buttonText:{
                today:    'hoje',
                month:    'mês',
                week:     'semana',
                day:      'dia',
                list:     'lista'
            },
            slotLabelFormat: 'HH:mm',
            locale: 'pt-br',
            navLinks: true, // can click day/week names to navigate views

            eventLimit: true, // allow "more" link when too many events
            events: {
                url: '/api/appointments/collaborator/'+selectedCollaborator
            },
            selectable: true,
            editable: true,
            selectHelper: false,
            selectOverlap: false,
            loading: function( isLoading, view ) {
                if(isLoading) {// isLoading gives boolean value
                    $("#event-modal-loading").modal();
                } else {
                   $('#event-modal-loading').modal("hide");
                }
            },
            eventResize: function(eventResized){
                console.log(eventResized);
                if(confirm("Alterando horário do evento de: "+$.fullCalendar.formatDate(eventResized.start, 'HH:mm')+" até "+ $.fullCalendar.formatDate(eventResized.end, 'HH:mm')))
                {
                    $.ajax({
                        url: '/api/appointments/update/'+eventResized.id,
                        data: 'title='+ eventResized.title
                        +'&start='+ $.fullCalendar.formatDate(eventResized.start, 'YYYY-MM-DD HH:mm')
                        +'&end='+ $.fullCalendar.formatDate(eventResized.end, 'YYYY-MM-DD HH:mm')
                        +'&clinic_id='+ eventResized.clinic_id
                        +'&client_id='+eventResized.client_id
                        +'&collaborator_id='+eventResized.collaborator_id
                        +'&appointment_status_id='+eventResized.appointment_status_id
                        +'&note='+eventResized.note,
                        type: "POST",
                        success: function(json) {
                            
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            var err = eval("(" + xhr.responseText + ")");
                            alert(err.message);
                            revertFunc();
                        }
                    });
                }
                
            },
            select: function(start, end) { // PARA CRIAÇÃO DE UM EVENTO.
                $('#start').val($.fullCalendar.formatDate(start, 'YYYY-MM-DD HH:mm'));
                $('#end').val($.fullCalendar.formatDate(end, 'YYYY-MM-DD HH:mm'));
                $('#title').val("");
                $('#collaborator').val($('#search-collaborator').val());
                $('#client-id').val(""); 
                $('#note-text').val("");
                $("#event-modal-create").modal();
            },
            eventClick: function(calEvent, jsEvent, view) { // PARA EDIÇÃO DE UM
                console.dir(calEvent);
                $('#update-title').val(calEvent.title);
                $('#update-collaborator').val(calEvent.collaborator_id);
                $('#update-clinic').val(calEvent.clinic_id);
                $('#update-client-id').val(calEvent.client_id);
                $('#update-note').val(calEvent.note);
                $('#event-id').val(calEvent.id);
                $('#update-start').val(calEvent.start.format('YYYY-MM-DD HH:mm'));
                $('#update-end').val(calEvent.end.format('YYYY-MM-DD HH:mm'));
                $("#event-modal-update").modal();
            },
            eventDrop: function(event, delta, revertFunc) {// editar evento somente horário
                // fazer uma chamada ajax para Api passando nova hora de inicio e fim
                // API deverá atualizar informações no banco
                // API deverá retornar sucesso em caso positivo
                // Em caso negativo informar ao usuário que não se pode fazer a troca
                // Para que ele tente mais tarde.
                $.ajax({
                    url: '/api/appointments/update/'+event.id,
                    data: 'title='+ event.title
                    +'&start='+ event.start.format('YYYY-MM-DD HH:mm')
                    +'&end='+ event.end.format('YYYY-MM-DD HH:mm')
                    +'&clinic_id='+ event.clinic_id
                    +'&client_id='+event.client_id
                    +'&collaborator_id='+event.collaborator_id
                    +'&note='+event.note,
                    type: "POST",
                    success: function(json) {
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        var err = eval("(" + xhr.responseText + ")");
                        alert(err.message);
                        revertFunc();
                    }
                });
            },
            eventAfterRender: function(event, element, view){
            }
        });
        $('#submit-modal').click(function(e){// CRIACAO DE EVENTO
            e.preventDefault();
            var eventData;
            console.dir($('#start').val());
            eventData = {
                // id:  $('#event-id').val(),
                title: $('#title').val(),
                collaborator_id: $('#collaborator').val(),
                client_id: $('#client-id').val(),
                note: $('#note-text').val(),
                start: $('#start').val(),
                end: $('#end').val()
            };
            $.ajax({
                    url: '/api/appointments',
                    data: 'title='+ eventData.title
                    +'&start='+ eventData.start
                    +'&end='+ eventData.end
                    +'&clinic_id='+ eventData.clinic_id
                    +'&client_id='+eventData.client_id
                    +'&collaborator_id='+eventData.collaborator_id
                    +'&appointment_status_id='+eventData.appointment_status_id
                    +'&note='+eventData.note,
                    type: "POST",
                    success: function(json) {
                        eventData.id = json.id;
                        $('#calendar').fullCalendar('renderEvent', eventData, true);
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        var err = eval("(" + xhr.responseText + ")");
                        alert(err.message);
                    }
                });

            $('#event-modal-create').modal("hide");
        });
        $('#update-modal').click(function(e){ // ATUALIZACAO DE EVENTO
            e.preventDefault();
            var event_obj = $('#calendar').fullCalendar('clientEvents', $('#event-id').val());
            event_obj = event_obj[0]; // clientEvents retorna array, logo sou obrigado a pegar a primeira posição dele.
            event_obj.title = $('#update-title').val();
            event_obj.start = $('#update-start').val();
            event_obj.end = $('#update-end').val();
            event_obj.clinic_id = $('#update-clinic').val();
            event_obj.client_id = $('#update-client-id').val();
            event_obj.collaborator_id = $('#update-collaborator').val();
            event_obj.appointment_status_id = $('#update-status').val();
            event_obj.note = $('#update-note').val();
            console.dir(event_obj);
            $.ajax({
                    url: '/api/appointments/update/'+$('#event-id').val(),
                    data: 'title='+ event_obj.title
                    +'&start='+ event_obj.start
                    +'&end='+ event_obj.end
                    +'&clinic_id='+ event_obj.clinic_id
                    +'&client_id='+event_obj.client_id
                    +'&collaborator_id='+event_obj.collaborator_id
                    +'&appointment_status_id='+event_obj.appointment_status_id
                    +'&note='+event_obj.note,
                    type: "POST",
                    success: function(json) {
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        var err = eval("(" + xhr.responseText + ")");
                        alert(err.message);
                        revertFunc();
                    }
                });
            $('#calendar').fullCalendar('updateEvent',event_obj);
            $('#event-modal-update').modal("hide");
        });
        $('#delete-modal').click(function(e){//DELEÇÃO DE EVENTO
            $.ajax({
                    url: '/api/appointments/delete/'+$('#event-id').val(),
                    type: "POST",
                    success: function(json) {
                        $('#calendar').fullCalendar('removeEvents',$('#event-id').val());
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        var err = eval("(" + xhr.responseText + ")");
                        alert(err.message);
                        revertFunc();
                    }
                });

            $('#event-modal-update').modal("hide");
            e.preventDefault();
        });
    });
    $('#search-collaborator').on('change', function(){
        var events = {
            url: '/api/appointments/collaborator/'+$(this).val()   
        }
        $('#calendar').fullCalendar('removeEventSources');
        $('#calendar').fullCalendar('addEventSource', events);
        $('#calendar').fullCalendar('refetchEvents');
    });
    

</script>
@endsection
