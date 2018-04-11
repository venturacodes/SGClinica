<template>
<div class="modal" id="modal-template" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Novo agendamento</h4>
            </div>
            <div class="modal-body">
                <form v-on:submit.prevent role="form" id="form-modal">
                    <div class="form-group">
                        <label>Título</label>
                        <input type="text" class="form-control" v-model="form.title" placeholder="Titulo">
                        <label>Clinica</label>
                        <v-select v-model="form.clinic" :options="clinics" ></v-select>
                        <label>Funcionário</label>
                        <v-select v-model="form.collaborator" :options="collaborators" ></v-select>
                        <label>Cliente</label>
                        <v-select v-model="form.client" :options="clients" ></v-select>
                        <label>Situação do agendamento</label>
                        <v-select v-model="form.status" :options="statuses" ></v-select>
                        <label>Observação</label>
                        <textarea v-model="form.note" class="form-control"></textarea>
                    </div>
                    <button @click="submitAdd" class="btn btn-success btn-block">Agendar</button>
                    <!-- <button v-if="modalType === 'edit'" @click="submitUpdate" class="btn btn-success btn-block">Modificar</button> -->
                </form>
            </div>
        </div>
    </div>
</div>
</template>
<script>
export default {
  props: ["event", "modal-type"],
  data() {
    return {
      form: {
        id: 1,
        title: "",
        clinic: "",
        collaborator: "",
        client: "",
        status: "",
        note: "",
        start: "",
        end: ""
      },
      rawEvent: {},
      rawClinics: [],
      clinics: [],
      rawCollaborators: [],
      collaborators: [],
      rawClients: [],
      clients: [],
      statuses: [
        { value: 1, label: "Marcado" },
        { value: 2, label: "Confirmado" },
        { value: 3, label: "Desmarcado" }
      ]
    };
  },
  computed: {
    setEventData: function() {
      this.rawEvent = this.event;
      this.rawEvent.title = this.form.title;
      this.rawEvent.clinic = this.form.clinic;
      this.rawEvent.collaborator = this.form.collaborator;
      this.rawEvent.client = this.form.client;
      this.rawEvent.status = this.form.status;
      this.rawEvent.note = this.form.note;
      return this.rawEvent;
    }
  },
  watch: {
    rawClinics: function() {
      let clinics = [];
      this.rawClinics.forEach(function(clinic, index) {
        clinics.push({
          value: clinic.id,
          label: clinic.clinica
        });
      });
      this.clinics = clinics;
    },
    rawCollaborators: function() {
      let collaborators = [];
      this.rawCollaborators.forEach(function(collaborator, index) {
        collaborators.push({
          value: collaborator.id,
          label: collaborator.name
        });
      });
      this.collaborators = collaborators;
    },
    rawClients: function() {
      let clients = [];
      this.rawClients.forEach(function(client, index) {
        clients.push({
          value: client.id,
          label: client.name
        });
      });
      this.clients = clients;
    }
  },
  methods: {
    getClinicsData(url) {
      fetch(url)
        .then(response => response.json())
        .then(json => {
          this.rawClinics = json;
        });
    },
    getCollaboratorsData(url) {
      fetch(url)
        .then(response => response.json())
        .then(json => {
          this.rawCollaborators = json;
        });
    },
    getClientsData(url) {
      fetch(url)
        .then(response => response.json())
        .then(json => {
          this.rawClients = json;
        });
    },
    submitAdd() {
      //   var tempEvent = this.setEventData;
      this.$parent.$refs.calendar.$emit("renderEvent", this.event);
      //   this.$parent.$refs.calendar.events.push(tempEvent);
      //   tempEvent = {};
      //   this.form = {};
      $(".modal").modal("hide");
    },
    submitUpdate() {
      var tempEvent = this.setEventData;

      this.$parent.$refs.calendar.$emit("render-event", tempEvent);
      this.$parent.$refs.calendar.events.push(tempEvent);
      this.event = {};
      this.form = {};
      $(".modal").modal("hide");
    }
  },
  mounted() {
    this.getClinicsData(this.$root.$data.server + "/api/clinics");
    this.getCollaboratorsData(this.$root.$data.server + "/api/collaborators");
    this.getClientsData(this.$root.$data.server + "/api/clients");
  }
};
</script>
<style scoped>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: table;
  transition: opacity 0.3s ease;
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
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
  transition: all 0.3s ease;
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
