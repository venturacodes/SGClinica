@extends('base_form')
@section('form_title', 'Detalhes agendamento')
@section('form_content')

    <form method="POST">
        {{ csrf_field() }}
        <label for="data_hora_consulta" class="for">Data e hora da consulta</label>
        <input type="text" class="form-control" name="data_hora_consulta" id="data_hora_consulta"
        value="{{date('d/m/Y', strtotime($appointment->start))}} {{date('H:i', strtotime($appointment->start))}} - {{date('H:i', strtotime($appointment->end))}}" 
        disabled>
        <label for="client" class="for">Paciente</label>
        <input type="text" class="form-control" name="client" id="client"
        value="{{$appointment->client->name}}" 
        disabled>
        <label for="collaborator" class="for">Médico</label>
        <input type="text" class="form-control" name="collaborator" id="collaborator"
        value="{{$appointment->collaborator->name}}" 
        disabled>
        <label for="finalidade" class="for">Finalidade</label>
        <input type="text" class="form-control" name="finalidade" id="finalidade"
        value="{{$appointment->title}}" 
        disabled>
        <label for="note" class="for">Observação</label>
        <textarea class="form-control" name="note" id="note" disabled>{{$appointment->note}} </textarea>
    </form>
@endsection
@section('additional-js')
    <script src="{{URL::asset('js/adminlte/bower_components/inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script>
    <script>
        $(function(){
            $('[data-mask]').inputmask()
        })
    </script>
@endsection