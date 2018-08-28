@extends('base_form')
@section('back_button')
    <a href="{{ route('receipt.index') }}" class="btn btn-primary a"><span class="glyphicon glyphicon-arrow-left"></span></a>
@endsection
@section('form_title','Cadastrar Receita')
@section('form_content')
    <form method="POST" action="{{route('receipt.store')}}">
        {{ csrf_field() }}
        <label for="pacient_id">Paciente</label>
        <select class="form-control" id="pacient" name="pacient_id" style="width: 100%" required>
            <option value="0">Selecione um paciente</option>
            @foreach($data['pacients'] as $pacients)
                @foreach($pacients as $pacient)
                    <option value="{{$pacient->id}}">{{$pacient->name}}</option>
                @endforeach
            @endforeach
        </select>
        <label for="medicine_id">Medicamento</label>
        <select class="form-control" id="medicine" name="medicine_id" style="width: 100%" required>
            <option value="0">Selecione um medicamento</option>
            @foreach($data['medicines'] as $medicines)
                @foreach($medicines as $medicine)
                    <option value="{{$medicine->id}}">{{$medicine->generic_name}}</option>
                @endforeach
            @endforeach
        </select>
        <label for="collaborator_id">Médico</label>
        <select class="form-control" id="client" name="collaborator_id" style="width: 100%" required>
            <option value="0">Selecione um médico</option>
            @foreach($data['collaborators'] as $collaborators)
                @foreach($collaborators as $collaborator)
                    <option value="{{$collaborator->id}}">{{$collaborator->name}}</option>
                @endforeach
            @endforeach
        </select>
        <label for="form_of_use">Forma de uso</label>
        <textarea name="form_of_use"  class="form-control"></textarea>
        <br />
        <input type="submit" value="salvar" class="btn btn-block btn-primary">
    </form>
@endsection
