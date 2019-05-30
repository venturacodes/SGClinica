@extends('base_form')

@section('form_title','Visualizar paciente')
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
            <a href="{{route('appointment.agenda')}}" class="btn btn-block btn-primary">Agendar nova consulta</a>  
            </nav>
            <div class="panel-body table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Data e hora da consulta</th>
                    <th>Ações</th>
                </tr>
            </thead>
           
                    <tbody>
                    @foreach($client->appointments as $appointment)
                        @if(auth()->user()->role->level == 1)
                            @if($appointment->collaborator_id == auth()->user()->collaborator->id)
                            <tr>
                                <td>{{date('d/m/Y', strtotime($appointment->start))}} {{date('H:i', strtotime($appointment->start))}} - {{date('H:i', strtotime($appointment->end))}}</td>
                                <td>
                                    <a href="{{route('appointment.show', $appointment->id)}}" class="btn btn-block btn-primary">Detalhes</a>
                                </td>
                            </tr>
                            @endif
                        @else
                            <tr>
                                <td>{{date('d/m/Y', strtotime($appointment->start))}} {{date('H:i', strtotime($appointment->start))}} - {{date('H:i', strtotime($appointment->end))}}</td>
                                <td><a href="{{route('appointment.show', $appointment->id)}}" class="btn btn-block btn-primary">Detalhes</a></td>
                            </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
           
            </div>
        </section>
        <section class="panel">
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded" style="background-color:#FAFAFA">
            <h3>Receitas solicitadas</h3>
            @if(auth()->user()->role->level == 1)
            <a href="{{route('receipt.create', $client->id)}}" class="btn btn-block btn-primary">Receitar novo medicamento</a>
            @endif
        </nav> 
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Criado em</th>
                    <th>Medico solicitante</th>
                    <th>Ações</th>
                    <th>Download</th>
                </tr>
                </thead>
                <tbody>
                @foreach($client->receipts as $receipt)
                    @if(auth()->user()->role->level == 1)
                        @if($receipt->collaborator_id == auth()->user()->collaborator->id)
                            <tr> 
                                <td style="text-align:center">{{date('d/m/Y',strtotime($receipt->created_at))}}</td>   
                                <td style="text-align:center">{{$receipt->collaborator->name}}</td>         
                                <td style="text-align:center">
                                    <a href="{{route('receipt.show', $receipt->id)}}" class="btn  btn-primary"><i class="fa fa-plus"></i><i class="fas fa-capsules"></i></a>
                                    <a href="{{route('receipt.delete', $receipt->id)}}" class="btn  btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                                <td style="text-align:center"><a href="{{route('receipt.pdf', $receipt->id)}}"  class="btn btn-block btn-primary"><i class="fa fa-download"></i></a></td>
                            </tr>
                        @endif
                    @else
                        <tr> 
                            <td style="text-align:center">{{date('d/m/Y',strtotime($receipt->created_at))}}</td>   
                            <td style="text-align:center">{{$receipt->collaborator->name}}</td>
                                    
                            <td style="text-align:center">
                                Sem ações
                            </td>
                            
                            <td style="text-align:center"><a href="{{route('receipt.pdf', $receipt->id)}}"  class="btn btn-block btn-primary"><i class="fa fa-download"></i></a></td>
                        </tr>
                    @endif
                @endforeach                    
            </tbody>
            </table>
            
            <section class="panel">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded" style="background-color:#FAFAFA">
                    
                    <h3>Exames solicitados</h3>
                    @if(auth()->user()->role->level == 1)
                    <a href="{{route('exam.create', $client->id)}}" class="btn btn-block btn-primary">Solicitar novo exame</a>
                    @endif
                </nav>
                    
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Tipo de exame</th>
                                <th>Solicitado por</th>
                                <th>Estado atual</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($client->exams as $exam)
                                    <tr>          
                                        <td>{{$exam->examType->title}}</td>
                                        <td>{{$exam->collaborator->name}}</td>
                                        {{-- Exam a entregar --}}
                                        @if($exam->status == 0)
                                            <td><p>Pendente de entrega</p></td>
                                            <td>
                                                <a href="{{route('exam.edit',$exam->id)}}" class="btn  btn-info">Entregar</a>
                                                <a href="{{route('exam.delete', $exam->id)}}" class="btn  btn-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                            
                                        @endif
                                        {{-- Exame entregue --}}
                                        @if($exam->status == 1)
                                        {{-- Somente médicos podem avaliar pacientes --}}
                                            <td><p>Pendente de avaliação médica</p></td>
                                            @if(auth()->user()->role->level == 1)
                                                <td>
                                                <a href="{{route('exam.evaluate',$exam->id)}}" class="btn btn-primary">Avaliar</a>
                                                <a href="{{route('exam.delete', $exam->id)}}" class="btn  btn-danger"><i class="fas fa-trash"></i></a>
                                            </td>
                                                
                                            @else
                                                <td>Sem ações para este usuário</td>
                                            @endif
                                        @endif
                                        {{-- Exame avaliado pronto para ser encaminhado para o paciente --}}
                                        @if($exam->status == 2)
                                        <td><p>Resultado obtido</p></td>
                                        @if(auth()->user()->role->level == 1)
                                            <td>
                                                <a href="{{route('exam.pdf',$exam->id)}}" class="btn btn-success">Entregar exame ao paciente</a>
                                                <a href="{{route('exam.delete', $exam->id)}}" class="btn  btn-danger"><i class="fas fa-trash"></i></a>
                                            </td>
                                        @else
                                            <td>Sem ações para este usuário</td>
                                        @endif
                                           
                                        @endif
                                        
                                        {{-- <td style="text-align:center"><a href="{{route('receipt.pdf', $receipt->id)}}"><i class="fa fa-download"></i></a></td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                   
        
    </section>
    </form>
@endsection
