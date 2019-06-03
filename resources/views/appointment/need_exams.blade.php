@extends('base_form')

@section('form_title','2/3 - Consulta em andamento - Exames')
@section('form_content')
        <label for="start">Horário de inicio</label>
        <input type="text" name="start" class="form-control" value="{{date('d/m/Y H:i', strtotime($appointment->start))}}" disabled>
        <label for="end">Horario de fim</label>
        <input type="text" name="end"  class="form-control" value="{{date('d/m/Y H:i', strtotime($appointment->end))}}" disabled>
        <label for="pacient_name">Nome do paciente</label>
        <input type="text" name="pacient_name"  class="form-control" value="{{$appointment->client->name}}" disabled>
        <section class="panel">
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded" style="background-color:#FAFAFA"> 
            <h3>Histórico de exames solicitados</h3>
            @if(auth()->user()->role->level == 1)
                <a href="{{route('appointment.attachExam', $appointment->id)}}" class="btn btn-block btn-primary">Solicitar novo exame</a>
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
                @forelse($appointment->exams as $exam)
                <tr>          
                    <td>{{$exam->examType->title}}</td>
                    <td>{{$exam->collaborator->name}}</td>
                    {{-- Exam a entregar --}}
                    @if($exam->status == 0)
                        <td><p>Pendente de entrega</p></td>
                        <td>
                            <a href="{{route('exam.edit',$exam->id)}}" class="btn  btn-info">Entregar</a>
                            <a href="{{route('appointment.deleteExam',[$appointment->id, $exam->id])}}" class="btn  btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                        
                    @endif
                    {{-- Exame entregue --}}
                    @if($exam->status == 1)
                    {{-- Somente médicos podem avaliar pacientes --}}
                        <td><p>Pendente de avaliação médica</p></td>
                        @if(auth()->user()->role->level == 1)
                            <td>
                            <a href="{{route('exam.evaluate',$exam->id)}}" class="btn btn-primary">Avaliar</a>
                            <a href="{{route('appointment.deleteExam',[$appointment->id, $exam->id])}}" class="btn  btn-danger"><i class="fas fa-trash"></i></a>
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
                            <a href="{{route('appointment.deleteExam',[$appointment->id, $exam->id])}}" class="btn  btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    @else
                        <td>Sem ações para este usuário</td>
                    @endif
                        
                    @endif
                    
                    {{-- <td style="text-align:center"><a href="{{route('receipt.pdf', $receipt->id)}}"><i class="fa fa-download"></i></a></td> --}}
                </tr>
                @empty
                <tr><td><p>Nenhum exame cadastrado para esse agendamento até o momento</p></td></tr>
                @endforelse
            </tbody>
        </table>
        
     
    </section>
    <a href="{{route('appointment.needReceipt',$appointment->id)}}" class="btn btn-block btn-primary">Próximo 3/3</a>
   
@endsection
