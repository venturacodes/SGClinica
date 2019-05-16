@extends('base_form')
@section('form_title', isset($receipt) ? 'Editar Receita' : 'Cadastrar Receita')
@section('form_content')
    <form method="POST" action="{{isset($receipt) ? route('receipt.update', $receipt->id) : route('receipt.store')}}">
        {{ csrf_field() }}
        <label for="client_id">Paciente</label>
        <input class="form-control" type="text" disabled value="{{$receipt->client->name}}" />
        <label for="medicine">Medicamento</label>
        <input class="form-control" type="text" value="{{ $receipt->medicine->generic_name }}" disabled />
        <label for="collaborator">Médico</label>
        <input class="form-control" type="text" value="{{$receipt->collaborator->name}}" disabled />
        <label for="forma_de_uso">Forma de uso</label>
        <textarea disabled name="forma_de_uso"  class="form-control">{{isset($receipt) ? $receipt->form_of_use : ''}}</textarea>
        <br />
    </form>
@endsection
