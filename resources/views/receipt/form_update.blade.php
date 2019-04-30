@extends('base_form')
@section('back_button')
    <a href="{{ route('receipt.index') }}" class="btn btn-primary a"><span class="glyphicon glyphicon-arrow-left"></span></a>
@endsection
@section('form_title','Cadastrar Receita')
@section('form_content')
    <form method="POST" action="{{route('receipt.store')}}">
        {{ csrf_field() }}
        <label for="client_id">Paciente</label>
        <select class="form-control" id="client" name="client_id" style="width: 100%" required>
            <option value="">Selecione um paciente</option>
            @foreach($data['clients'] as $clients)
                @foreach($clients as $client)
                    @if($data['receipt']['receipt']->client_id == $client->id)
                        <option selected value="{{$client->id}}">{{$client->name}}</option>
                    @else
                        <option value="{{$client->id}}">{{$client->name}}</option>
                    @endif
                @endforeach
            @endforeach
        </select>
        <label for="medicine_id">Medicamento</label>
        <select class="form-control" id="medicine" name="medicine_id" style="width: 100%" required>
            <option value="">Selecione um medicamento</option>
            @foreach($data['medicines'] as $medicines)
                @foreach($medicines as $medicine)
                @if($data['receipt']['receipt']->medicine_id == $medicine->id)
                    <option selected value="{{$medicine->id}}">{{$medicine->generic_name}}</option>
                @else
                    <option value="{{$medicine->id}}">{{$medicine->generic_name}}</option>
                @endif
                @endforeach
            @endforeach
        </select>
        <label for="collaborator_id">Médico</label>
        <select class="form-control" id="client" name="collaborator_id" style="width: 100%" required>
            <option value="">Selecione um médico</option>
            @foreach($data['collaborators'] as $collaborators)
                @foreach($collaborators as $collaborator)
                @if($data['receipt']['receipt']->collaborator_id == $collaborator->id)
                    <option selected value="{{$collaborator->id}}">{{$collaborator->name}}</option>
                @else
                    <option value="{{$collaborator->id}}">{{$collaborator->name}}</option>
                @endif
                @endforeach
            @endforeach
        </select>
        <label for="forma_de_uso">Forma de uso</label>
        <textarea name="forma_de_uso"  class="form-control">{{$data['receipt']['receipt']->form_of_use}}</textarea>
        <br />
        <input type="submit" value="salvar" class="btn btn-block btn-primary">
    </form>
@endsection
