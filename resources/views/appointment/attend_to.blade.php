@extends('base_form')

@section('form_title','1/3 - Consulta em andamento - Inicial ')
@section('form_content')
    <form method="POST" action="{{route('appointment.add_description', $appointment->id)}}">
        {{ csrf_field() }}
        <label for="start">Horário de inicio</label>
        <input type="text" name="start" class="form-control" value="{{date('d/m/Y H:i', strtotime($appointment->start))}}" disabled>
        <label for="end">Horario de fim</label>
        <input type="text" name="end"  class="form-control" value="{{date('d/m/Y H:i', strtotime($appointment->end))}}" disabled>
        <label for="pacient_name">Nome do paciente</label>
        <input type="text" name="pacient_name"  class="form-control" value="{{$appointment->client->name}}" disabled>
        <label for="description">Descrição do caso</label>
        <textarea name="description" class="form-control"></textarea>
        <br />
        <input type="submit" value="Próximo 2/3" class="btn btn-block btn-primary">
    </form>
@endsection
