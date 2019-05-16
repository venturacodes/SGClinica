@extends('base_form')
@section('back_button')
    <a href="{{ route('receipt.index') }}" class="btn btn-primary a"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
@endsection
@section('form_title', isset($receipt) ? 'Editar Receita' : 'Cadastrar Receita')
@section('form_content')
    <form method="POST" action="{{isset($receipt) ? route('receipt.update', $receipt->id) : route('receipt.store')}}">
        {{ csrf_field() }}
        <label for="client_id">Paciente</label>
        <select class="form-control" id="client" name="client_id" style="width: 100%" required>
            <option value="">Selecione um paciente</option>
            @foreach($clients as $client) 
                <option @if(isset($receipt)) @if($receipt->client_id == $client->id) selected @endif @endif value="{{$client->id}}">{{$client->name}}</option>
            @endforeach
        </select>
        <label for="medicine_id">Medicamento</label>
        <select class="form-control" id="medicine" name="medicine_id" style="width: 100%" required>
            <option value="">Selecione um medicamento</option>
            @foreach($medicines as $medicine) 
                <option @if(isset($receipt)) @if($receipt->medicine_id == $medicine->id) selected @endif @endif value="{{$medicine->id}}">{{$medicine->generic_name}}</option>
            @endforeach
        </select>
        <label for="collaborator_id">Médico</label>
        <select class="form-control" id="client" name="collaborator_id" style="width: 100%" required>
            <option value="">Selecione um médico</option>
            @foreach($collaborators as $collaborator) 
                <option @if(isset($receipt)) @if($receipt->collaborator_id == $collaborator->id) selected @endif @endif value="{{$collaborator->id}}">{{$collaborator->name}}</option>
            @endforeach
        </select>
        <label for="period">Periodo de tempo</label>
        <input type="text" placeholder="Ex: 2x ao dia de 8 em 8 horas" name="period"  class="form-control" value="{{isset($receipt) ? $receipt->period : ''}}">
        <label for="quantity">Quantidade</label>
        <input type="text" placeholder="Ex: 2mg" name="quantity"  class="form-control" value="{{isset($receipt) ? $receipt->quantity : ''}}">
        <label for="form_of_use">Forma de uso</label>
        <textarea name="form_of_use" class="form-control">{{isset($receipt) ? $receipt->form_of_use : ''}}</textarea>
        <br />
        <input type="submit" value="salvar" class=" btn btn-block btn-primary">
    </form>
@endsection
