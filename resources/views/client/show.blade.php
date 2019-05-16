@extends('base_form')

@section('form_title','Verificar paciente')
@section('form_content')
    <form method="POST" action="{{route('client.store')}}">
        {{ csrf_field() }}
        <label for="name">Nome</label>
        <input type="text" name="name" class="form-control" value="{{$client->name}}" disabled>
        <label for="phone">Telefone</label>
        <input type="text" name="phone"  class="form-control" value="{{$client->phone}}" disabled>
        <label for="email">E-mail</label>
        <input type="text" name="email"  class="form-control" value="{{$client->email}}" disabled>
        <section class="panel">
            <nav class="navbar navbar-toggleable-md navbar-light bg-faded" style="background-color:#FAFAFA">
            <h3>Histórico de consultas</h3>
            <a href="{{route('appointment.agenda')}}" class="btn btn-primary">Agendar nova consulta</a>  
            </nav>
            <div class="panel-body table-responsive">
            @forelse($client->appointments as $appointment)
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Data e hora da consulta</th>
                        <th>Detalhes</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{date('d/m/Y', strtotime($appointment->start))}} {{date('H:i', strtotime($appointment->start))}} - {{date('H:i', strtotime($appointment->end))}}</td>
                        <td><a href="{{route('appointment.show', $appointment->id)}}">Ver</a></td>
                        </tr>
                    </tbody>
                </table>
            @empty
                <strong>Nenhum agendamento encontrado</strong>
            @endforelse
            </div>
        </section>
        <section class="panel">
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded" style="background-color:#FAFAFA">
            <h3>Receitas solicitadas</h3><a href="{{route('receipt.create')}}" class="btn btn-primary">Receitar novo medicamento</a>
        </nav>
            @forelse($client->receipts as $receipt)
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Medicamento</th>
                        <th>Responsável</th>
                        <th>Detalhes</th>
                        <th>Download</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>          
                            <td>{{$receipt->medicine->generic_name}}</td>
                            <td>{{$receipt->collaborator->name}}</td>
                            <td style="text-align:center"><a href="{{route('receipt.show', $receipt->id)}}"><p>Ver</p></a></td>
                            <td style="text-align:center"><a href="{{route('receipt.pdf', $receipt->id)}}"><i class="fa fa-download"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            @empty
                <strong>Nenhuma receita cadastrada para esse paciente</strong>
            @endforelse
        
    </section>
    </form>
@endsection
