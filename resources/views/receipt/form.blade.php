@extends('base_form')
@section('form_title', isset($receipt) ? 'Editar Receita' : 'Cadastrar Receita')
@section('form_content')
    @if(isset($flag_redirect))
        <form method="POST" action="{{ isset($receipt)? route('appointment.updateReceipt', $appointment->id) : route('appointment.storeReceipt', $appointment->id) }}" enctype="multipart/form-data">
    @else
        <form method="POST" action="{{isset($receipt) ? route('receipt.update', $receipt->id) : route('receipt.store')}}">
    @endif
        {{ csrf_field() }}
        <label for="client">Paciente</label>
        <input type="text" name="client"  class="form-control" value="{{isset($client->name) ? $client->name : ''}}" disabled>
        <input type="hidden" name="client_id" value="{{isset($client->id) ? $client->id : ''}}">  
        <label for="collaborator">Médico solicitante</label>
        <input type="text" name="collaborator"  class="form-control" value="{{isset(auth()->user()->collaborator->name) ? auth()->user()->collaborator->name : ''}}" disabled>
        <input type="hidden" name="collaborator_id" value="{{isset(auth()->user()->id) ? auth()->user()->id : ''}}">   
        <label for="medicine_id">Medicamento</label>
        <select class="form-control" id="medicine" name="medicine_id" style="width: 100%" required>
            <option value="">Selecione um medicamento</option>
            @foreach($medicines as $medicine) 
                <option @if(isset($receipt)) @if($receipt->medicine_id == $medicine->id) selected @endif @endif value="{{$medicine->id}}">{{$medicine->generic_name}}</option>
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
