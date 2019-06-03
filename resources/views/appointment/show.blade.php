@extends('base_form')
@section('form_title', 'Detalhes agendamento')
@section('form_content')
    <label for="data_hora_consulta" class="for">Data e hora da consulta</label>
    <input type="text" class="form-control" name="data_hora_consulta" id="data_hora_consulta"
    value="{{date('d/m/Y', strtotime($appointment->start))}} {{date('H:i', strtotime($appointment->start))}} - {{date('H:i', strtotime($appointment->end))}}" 
    disabled>
    <label for="client" class="for">Paciente</label>
    <input type="text" class="form-control" name="client" id="client"
    value="{{$appointment->client->name}}" 
    disabled>
    <label for="collaborator" class="for">Médico</label>
    <input type="text" class="form-control" name="collaborator" id="collaborator"
    value="{{$appointment->collaborator->name}}" 
    disabled>
    <label for="finalidade" class="for">Finalidade</label>
    <input type="text" class="form-control" name="finalidade" id="finalidade"
    value="{{$appointment->title}}" 
    disabled>
    <label for="note" class="for">Observação</label>
    <textarea class="form-control" name="note" id="note" disabled>{{$appointment->note}} </textarea>

    <section class="panel">
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded" style="background-color:#FAFAFA">
            <h3>Histórico de medicamentos preescritos</h3>
        </nav> 
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Criado em</th>
                    <th>Medico solicitante</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($appointment->receipts as $receipt)
                    @if(auth()->user()->role->level == 1)
                        @if($receipt->collaborator_id == auth()->user()->collaborator->id)
                            <tr> 
                                <td >{{date('d/m/Y',strtotime($receipt->created_at))}}</td>   
                                <td >{{$receipt->collaborator->name}}</td>         
                                <td >
                                    <a href="{{route('receipt.pdf', $receipt->id)}}"  class="btn btn-primary"><i class="fa fa-download"></i></a>
                                </td>
                            </tr>
                        @endif
                    @else
                        <tr> 
                            <td>{{date('d/m/Y',strtotime($receipt->created_at))}}</td>   
                            <td>{{$receipt->collaborator->name}}</td>
                            <td >
                                <a href="{{route('receipt.pdf', $receipt->id)}}"  class="btn btn-primary"><i class="fa fa-download"></i></a>
                            </td>
                        </tr>
                    @endif
                @endforeach               
            </tbody>
            </table>
            
            <section class="panel">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded" style="background-color:#FAFAFA">
                    
                    <h3>Histórico de exames solicitados</h3>
                </nav>
                    
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Tipo de exame</th>
                                <th>Solicitado por</th>
                                <th>Download</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($appointment->exams as $exam)
                                    <tr>  
                                    <td>{{$exam->examType->title}}</td>    
                                    <td>{{$exam->collaborator->name}}</td>     
                                    <td>
                                        <a href="{{route('exam.pdf', $exam->id)}}" class="btn btn-primary"><i class="fa fa-download"></i></a>
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                   
        
    </section>
@endsection