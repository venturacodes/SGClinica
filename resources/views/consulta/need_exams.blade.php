@extends('base_form')

@section('form_title','2/3 - Consulta em andamento - Exames')
@section('form_content')
    <form method="POST" action="{{route('consulta.store')}}">
        {{ csrf_field() }}
        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
        <label class="form-check-label" for="defaultCheck1">
            Precisa de exames?
        </label>
        </div>
        <label for="start">Horário de inicio</label>
        <input type="text" name="start" class="form-control" value="{{date('d/m/Y H:i', strtotime($appointment->start))}}" disabled>
        <label for="end">Horario de fim</label>
        <input type="text" name="end"  class="form-control" value="{{date('d/m/Y H:i', strtotime($appointment->end))}}" disabled>
        <label for="pacient_name">Nome do paciente</label>
        <input type="text" name="pacient_name"  class="form-control" value="{{$appointment->client->name}}" disabled>
        <label for="exam-type">Tipo de exame</label>
        <select class="form-control" id="exam-type" name="exam-type" required>
            <option value="0">Selecione um tipo de exame</option>
        </select>
        <br />
        <input type="submit" value="Próximo 2/3" class="btn btn-block btn-primary">
    </form>
@endsection
