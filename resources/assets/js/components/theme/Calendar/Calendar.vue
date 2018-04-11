<template>
    <div>
        <full-calendar id="calendar"/>
    </div>

</template>

<script>
export default {
  name: "Calendar",
  methods: {
    created() {
      $("#calendar").fullCalendar({
        defaultView: "agendaWeek",
        businessHours: {
          dow: [1, 2, 3, 4, 5],
          start: "08:00",
          end: "18:00"
        },
        hiddenDays: [6, 0],
        buttonText: {
          today: "hoje",
          month: "mês",
          week: "semana",
          day: "dia",
          list: "lista"
        },
        navLinks: true,
        allDaySlot: true,
        minTime: "07:00:00",
        maxTime: "19:00:00",
        locale: "pt-br",
        timeFormat: "h:mm",
        editable: true,
        selectable: true,
        selectHelper: true
      });
    }
  }
};
</script>
