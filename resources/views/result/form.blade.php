@extends('base_form')
@section('form_title', isset($exam) ? 'Adicionar Resultado ao exame' : 'Cadastrar Exame')    
@section('form_content')
    <form method="POST" action="{{ route('exam.result', $exam->id)}}">
        {{ csrf_field() }}
        <label for="exam_type_id">Tipo de exame</label>
        <input type="text" name="exam_type" class="form-control" value="{{ isset($exam) ? $exam->examType->title: ''}}" disabled>
        <input type="hidden" name="exam_type_id" class="form-control" value="{{ isset($exam) ? $exam->examType->id: ''}}" disabled>
        <label for="note">Observações e cuidados</label>
        <input type="text" name="note" class="form-control" value="{{ isset($exam) ? $exam->note : ''}}" disabled>
        <input type="hidden" name="client_id" value="{{isset($exam) ? $exam->client->id : $client->id}}" />
        <input type="hidden" name="collaborator_id" value="{{auth()->user()->id}}" />
        <br />
        {{-- Médico solicitante(collaborator_id) será o usuário logado --}}
        {{-- Paciente selecionado(client_id) será o usuário selecionado no index anterior --}}
        @isset($exam)
        <div class="form-group">
            <label for="result">Fazer download do exame digitalizado</label>
            <a href="{{route('exam.download', $exam->id)}}"><i class="fa fa-download"></i></a>
        </div>
        @endisset
        <label for="result">Descrição do resultado</label>
        <textarea name="result" class="form-control"></textarea>
        <br />
        <input type="submit" value="salvar" class="btn btn-block btn-primary">
    </form>
@endsection
