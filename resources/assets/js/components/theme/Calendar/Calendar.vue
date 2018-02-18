<template>
    <div>
        <full-calendar ref="calendar" :config="config" :events="events" @event-created="eventCreated" @event-selected="test"/>
        <modal :event="event"></modal>
    </div>

</template>

<script>
	export default {
        name: 'Calendar',
        data () {
            return {
                    events: [],
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
                        allDaySlot: false,
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
                let events = [{}];
                this.RawApiData.forEach(function(event, index){
                    events.push({
                        'id': event.id,
                        'title': event.note,
                        'start_time': moment(event.start_time),
                        'end_time': moment(event.end_time),
                        'allDay': false
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
                 $('.modal').modal();
            },
            test(event){
                this.event =event;
                 $('.modal').modal();
            }
        },
        created (){
                this.getApiData('http://localhost:8000/api/appointments/clinic/1');
        },
    }

</script>
