@extends('base_form')

@section('form_title','3/3 - Consulta em andamento - Receitas')
@section('form_content')
    <form method="POST" action="{{route('appointment.endAppointment', $appointment->id)}}">
        {{ csrf_field() }}
        <label for="start">Horário de inicio</label>
        <input type="text" name="start" class="form-control" value="{{date('d/m/Y H:i', strtotime($appointment->start))}}" disabled>
        <label for="end">Horario de fim</label>
        <input type="text" name="end"  class="form-control" value="{{date('d/m/Y H:i', strtotime($appointment->end))}}" disabled>
        <label for="pacient_name">Nome do paciente</label>
        <input type="text" name="pacient_name"  class="form-control" value="{{$appointment->client->name}}" disabled>
        
        
        <section class="panel">
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded" style="background-color:#FAFAFA">
            <h3>Receitas solicitadas</h3>
            @if(auth()->user()->role->level == 1)
            <a href="{{route('appointment.attachReceipt', $appointment->id)}}" class="btn btn-block btn-primary">Receitar novo medicamento</a>
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
                @foreach($appointment->receipts as $receipt)
                    @if(auth()->user()->role->level == 1)
                        @if($receipt->collaborator_id == auth()->user()->collaborator->id)
                            <tr> 
                                <td style="text-align:center">{{date('d/m/Y',strtotime($receipt->created_at))}}</td>   
                                <td style="text-align:center">{{$receipt->collaborator->name}}</td>         
                                <td style="text-align:center">
                                    <a href="{{route('appointment.showReceipt', [$appointment->id, $receipt->id])}}" class="btn  btn-primary"><i class="fa fa-plus"></i><i class="fas fa-capsules"></i></a>
                                    <a href="{{route('appointment.deleteReceipt', [$appointment->id,$receipt->id])}}" class="btn  btn-danger"><i class="fas fa-trash"></i></a>
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
</section>
            <input type="submit" value="Finalizar consulta" class="btn btn-block btn-primary">
    </form>
@endsection
