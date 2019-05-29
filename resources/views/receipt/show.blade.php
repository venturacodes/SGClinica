@extends('base_form')
@section('form_title','Visualizar Receita')
@section('form_content')
        <label for="client_id">Paciente</label>
        <input class="form-control" type="text" disabled value="{{$receipt->client->name}}" />
        <table class="table table-hover">
            <thead>
                <th>Medicamento</th>
                <th>Quantidade</th>
                <th>Período</th>
                <th>Forma de uso</th>
                <th>Ações</th>
            </thead>
            <tbody>
                @forelse($receipt->PrescriptMedicines as $PresciptMedicine)
                    <tr>
                        <td>{{$PresciptMedicine->medicine->generic_name}}</td>          
                        <td>{{$PresciptMedicine->quantity}}</td>
                        <td>{{$PresciptMedicine->period}}</td>
                        <td>{{$PresciptMedicine->form_of_use}}</td>
                        <td><div class="tools">
                            <a href="{{route('medicinePrescription.edit', [$receipt->id, $PresciptMedicine->id])}}"><i class="fas fa-edit"></i></a>
                            <a href="{{route('medicinePrescription.delete', [$receipt->id, $PresciptMedicine->id])}}"><i class="fas fa-trash"></i></a>
                        </div></td>
                    </tr>
                @empty
                    
                <h3>Não há medicamentos preescritos nesta receita</h3>
                @endforelse
                
            </tbody>
        </table>
        <a href="{{route('medicinePrescription.create', $receipt->id)}}" class="btn btn-primary">Adicionar medicamento</a>
@endsection
