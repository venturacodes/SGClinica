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

        /*
         * The following styles are auto-applied to elements with
         * transition="modal" when their visibility is toggled
         * by Vue.js.
         *
         * You can easily play with the modal transition by editing
         * these styles.
         */

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
        <!--MODAL EVENT -->
        @include('event_modal_create')
        @include('event_modal_update')
        <!-- FINAL MODAL EVENT -->
            <div id="calendar"></div>
@endsection

@section('calendar-js')
<script>
    $(document).ready(function(){
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            businessHours: {
                // days of week. an array of zero-based day of week integers (0=Sunday)
                dow: [ 1, 2, 3, 4, 5 ], // Monday - Thursday
                start: '08:00', // a start time (10am in this example)
                end: '19:00', // an end time (6pm in this example)
            },
            firstDay: moment().day(),
            minTime: "08:00:00",
            maxTime: "20:00:00",
            defaultView: 'agendaWeek',
            allDaySlot: false,
            buttonText:{
                today:    'hoje',
                month:    'mês',
                week:     'semana',
                day:      'dia',
                list:     'lista'
            },
            locale: 'pt-br',
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: this.events,
            selectable: true,
            selectHelper: true,
            select: function(start, end) { // PARA CRIAÇÃO DE UM EVENTO.
                $('#start-time').val(start);
                $('#end-time').val(end);
                $("#event-modal-create").modal();
            },
            eventClick: function(calEvent, jsEvent, view) { // PARA EDIÇÃO DE UM
                $('#update-title').val(calEvent.title);
                $('#update-collaborator').val(calEvent.collaboratorId);
                $('#update-clinic').val(calEvent.clinicId);
                $('#update-client').val(calEvent.clientId);
                $('#update-note').val(calEvent.note);
                $('#event-id').val(calEvent.id);
                $("#event-modal-update").modal();
            },
            eventDrop: function(event, delta, revertFunc) {// editar evento somente horário
                // fazer uma chamada ajax para Api passando nova hora de inicio e fim
                // API deverá atualizar informações no banco
                // API deverá retornar sucesso em caso positivo
                // Em caso negativo informar ao usuário que não se pode fazer a troca
                // Para que ele tente mais tarde.
                console.dir(event);

                if (!confirm("Você está certo disso?")) {
                    revertFunc();
                }

            },
            eventAfterRender: function(event, element, view){
            }
        });
        $('#submit-modal').click(function(e){// CRIACAO DE EVENTO
            e.preventDefault();
            $('#event-id').val(Math.floor((Math.random() * 1000) + 1));
            var eventData;
            eventData = {
                id:  $('#event-id').val(),
                title: $('#title').val(),
                collaboratorId: $('#collaborator').val(),
                clinicId: $('#clinic').val(),
                clientId: $('#client').val(),
                statusId: $('#status').val(),
                note: $('#note').val(),
                start: $('#start-time').val(),
                end: $('#end-time').val()
            };

            //Fazer chamadas AJAX PARA salvar o agendamento
            //Buscar o id e juntar ao eventData.

            $('#calendar').fullCalendar('renderEvent', eventData, true);
            $('#event-modal-create').modal("hide");
        });
        $('#update-modal').click(function(e){ // ATUALIZACAO DE EVENTO
            e.preventDefault();
            var event_obj = $('#calendar').fullCalendar('clientEvents', $('#event-id').val());

            event_obj = event_obj[0]; // clientEvents retorna array, logo sou obrigado a pegar a primeira posição dele.
            event_obj.title = $('#update-title').val();
            event_obj.collaboratorId = $('#update-collaborator').val();
            event_obj.clinicId = $('#update-clinic').val();
            event_obj.clientId = $('#update-client').val();
            event_obj.note = $('#update-note').val();

            $('#calendar').fullCalendar('updateEvent',event_obj);

            $('#event-modal-update').modal("hide");
        });
        $('#delete-modal').click(function(e){//DELEÇÃO DE EVENTO
            $('#calendar').fullCalendar('removeEvents',$('#event-id').val());
            $('#event-modal-update').modal("hide");
            e.preventDefault();
        });
    });

</script>
@endsection