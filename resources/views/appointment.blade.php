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
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded" style="background-color:#FAFAFA">
            <span class="navbar-brand" href="#">
                Minha agenda
            </span>
        </nav>
        
        <input type="hidden" id="is_admin" 
        {{-- Level 3 is ADMIN --}}
        
        @if(Auth::user()->role->level > 1)
        value="1"
        @else
        value="0"
        @endif
        >
       @include('event_partial_search')
       <div id='calendar'></div>
        @include('event_modal_create')
        @include('event_modal_update')
        @include('event_modal_loading')
@endsection

@section('calendar-js')
<script>
    window.mobilecheck = function() {
        var check = false;
        (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
        return check;
    };
    function get_calendar_height() {
        return $(window).height() - 350;
    }
    $(document).ready(function(){
        if($("#is_admin").val() == 0){
            $("#search-collaborator").prop('disabled', 'disabled');
        }else{
            $("#search-collaborator").prop('disabled', false);
        }
        $(window).resize(function() {
            $('#calendar').fullCalendar('option', 'height', get_calendar_height());
        });

        
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
            defaultView: window.mobilecheck() ? "agendaDay" : "agendaWeek",
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
                if(confirm("Confirma troca de horário de agendamento para início "+$.fullCalendar.formatDate(eventResized.start, 'HH:mm')+" até "+ $.fullCalendar.formatDate(eventResized.end, 'HH:mm')))
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
                console.dir($("#event-modal-create"));
                $("#event-modal-create").modal();
            },
            eventClick: function(calEvent, jsEvent, view) { // PARA EDIÇÃO DE UM
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
                        if(json.errors){
                            jQuery.each(json.errors, function(key, value){
                  			    jQuery('.alert-danger').show();
                  			    jQuery('.alert-danger').append('<p>'+value+'</p>');
                  		    });
                        }
                        eventData.id = json.id;
                        $('#calendar').fullCalendar('renderEvent', eventData, true);
                        $('#event-modal-create').modal("hide");
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        jQuery.each(xhr.errors, function(key, value){
                  			jQuery('.alert-danger').show();
                  			jQuery('.alert-danger').append('<p>'+value+'</p>');
                  		});
                        
                    }
                });

            
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
        if($(this).val() != 0){
            var events = {
                url: '/api/appointments/collaborator/'+$(this).val()   
            }
            $('#calendar').fullCalendar('removeEventSources');
            $('#calendar').fullCalendar('addEventSource', events);
            $('#calendar').fullCalendar('refetchEvents');
        }
        
    });
    

</script>
@endsection
