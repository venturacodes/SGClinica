<template>
    <div>
        <full-calendar ref="calendar" :config="config" :events="events" @event-created="eventCreated" @event-selected="eventSelected"/>
        <modal  :event="event" :modal-type="modalType"></modal>
    </div>

</template>

<script>
	export default {
        name: 'Calendar',
        data () {
            return {
                    isComponentModalActive: false,
                    modalType: '',
                    events: Array,
                    event: {},
                    RawApiData: [],
                    config: {
                        defaultView: 'agendaWeek',
                        businessHours: {
                            dow: [ 1, 2, 3, 4, 5 ],
                            start: '08:00',
                            end: '18:00'
                        },
                        hiddenDays: [ 6, 0 ],
                        buttonText:{
                            today:    'hoje',
                            month:    'mês',
                            week:     'semana',
                            day:      'dia',
                            list:     'lista'
                        },
                        navLinks: true,
                        allDaySlot: true,
                        minTime: "07:00:00",
                        maxTime: "19:00:00",
                        locale: 'pt-br',
                        timeFormat: 'h:mm',
                        editable: true,
                        selectable: true,
                        selectHelper: true,
                    },

            }
        },
        watch: {
            RawApiData: function(){
                let events = [];
                this.RawApiData.forEach(function(event, index){
                    events.push({
                        'id': event.id,
                        'title': event.note,
                        'start_time': moment(event.start_time).format(),
                        'end_time': moment(event.end_time).format(),
                        'allDay': true
                    });
                });
                this.events = events;
            }
        },
        methods : {
            getApiData(url){
                fetch(url)
                .then(response => response.json())
                .then(json =>{this.RawApiData = json})
            },
            updateStartTime(start){
                this.startTime = start
            },
            eventCreated(event){
                this.event =event;
                this.modalType = 'add'
                $(".modal").modal();

            },
            eventSelected(event){
                this.modalType = 'edit'
                this.event =event;
                 $(".modal").modal();
            }
        },
        created (){
                this.getApiData('http://localhost:8000/api/appointments/clinic/1');
        },
    }

</script>
