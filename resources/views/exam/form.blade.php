@extends('base_form')
@section('form_title', isset($exam) ? 'Editar Exame' : 'Cadastrar Exame')    
@section('form_content')
    @if(isset($flag_redirect))
        <form method="POST" action="{{ isset($exam)? route('appointment.updateExam', $appointment->id) : route('appointment.storeExam', $appointment->id) }}" enctype="multipart/form-data">
    @else
        <form method="POST" action="{{ isset($exam)? route('exam.update', $exam->id) : route('exam.store') }}" enctype="multipart/form-data">
    @endif
    <form method="POST" action="{{ isset($exam)? route('exam.update', $exam->id) : route('exam.store') }}" enctype="multipart/form-data">
        @if(isset($exam))
            @method('PUT')
        @endif
        {{ csrf_field() }}
        <label for="exam_type_id">Tipo de exame</label>
        @isset($exam)
            <input class="form-control"name="title" type="text" value="{{ $exam->examType->title }}" disabled/>
            <input id="exam_type_id" name="exam_type_id" type="hidden" value="{{ $exam->examType->id}}" />
        @else
        <select class="form-control" id="exam_type_id" name="exam_type_id" required >
            <option value="">Selecione um tipo de exame</option>
                @foreach($examTypes as $examType)
                    <option @if(isset($exam)) @if($examType->title == $exam->examType->title) selected @endif @endif value="{{$examType->id}}">{{$examType->title}}</option>
                @endforeach
        </select>
        @endisset
        <label for="note">Cuidados e Observação</label>
        <input type="text" name="note" class="form-control" value="{{ isset($exam) ? $exam->note : ''}}" @isset($exam) disabled @endisset>
        <input type="hidden" name="client_id" value="{{ isset($exam) ? $exam->client->id : $client->id }}" />
        <input type="hidden" name="collaborator_id" value="{{auth()->user()->id}}" />
        <br />
        {{-- Médico solicitante(collaborator_id) será o usuário logado --}}
        {{-- Paciente selecionado(client_id) será o usuário selecionado no index anterior --}}
        @isset($exam)
            <label for="file">Exame digitalizado</label>
            <input type="file" name="file" class="form-control" value="{{ isset($exam) ? $exam->file : ''}}">
        @endisset
        <br />
        <input type="submit" value="salvar" class="btn btn-block btn-primary">
    </form>
@endsection
