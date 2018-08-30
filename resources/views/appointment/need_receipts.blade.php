@extends('base_form')

@section('form_title','3/3 - Consulta em andamento - Receitas')
@section('form_content')
    <form method="POST" action="{{route('consulta.store')}}">
        {{ csrf_field() }}
        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
        <label class="form-check-label" for="defaultCheck1">
            Precisa de receita de medicamentos?
        </label>
        </div>
        <label for="start">Horário de inicio</label>
        <input type="text" name="start" class="form-control" value="{{date('d/m/Y H:i', strtotime($appointment->start))}}" disabled>
        <label for="end">Horario de fim</label>
        <input type="text" name="end"  class="form-control" value="{{date('d/m/Y H:i', strtotime($appointment->end))}}" disabled>
        <label for="pacient_name">Nome do paciente</label>
        <input type="text" name="pacient_name"  class="form-control" value="{{$appointment->client->name}}" disabled>
        <label for="description">Descrição do caso</label>
        <textarea name="description" class="form-control"></textarea>
        <br />
        <input type="submit" value="Finalizar consulta" class="btn btn-block btn-primary">
    </form>
@endsection
