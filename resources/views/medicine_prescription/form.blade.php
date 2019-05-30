@extends('base_form')
@section('form_title', isset($receipt) ? 'Editar Medicamento' : 'Cadastrar Medicamento')
@section('form_content')
    <section class="panel">
        <div class="panel-body table-responsive">
            <div class="form-group">
                @include('form_status')
                @include('form_errors')
                <form method="POST" action="{{ isset($prescript_medicine)? route('medicinePrescription.update', [$receipt->id,$prescript_medicine->id]) : route('medicinePrescription.store', $receipt->id) }}">
                    @if(isset($prescript_medicine))
                        @method('PUT')
                    @endif
                    {{ csrf_field() }}
                    <label for="medicine_id">Medicamento</label>
                    <select class="form-control" id="medicine" name="medicine_id" style="width: 100%" required>
                        <option value="">Selecione um medicamento</option>
                        @foreach($medicines as $medicine) 
                            <option @if(isset($prescript_medicine)) @if($prescript_medicine->medicine_id == $medicine->id) selected @endif @endif value="{{$medicine->id}}">{{$medicine->generic_name}}</option>
                        @endforeach
                    </select>
                   
                    <label for="period">Periodo de tempo</label>
                    <input type="text" placeholder="Ex: 2x ao dia de 8 em 8 horas" name="period"  class="form-control" value="{{isset($prescript_medicine) ? $prescript_medicine->period : ''}}">
                    <label for="quantity">Quantidade</label>
                    <input type="text" placeholder="Ex: 2mg" name="quantity"  class="form-control" value="{{isset($prescript_medicine) ? $prescript_medicine->quantity : ''}}">
                    <label for="form_of_use">Forma de uso</label>
                    <textarea name="form_of_use" class="form-control">{{isset($prescript_medicine) ? $prescript_medicine->form_of_use : ''}}</textarea>
                    <br />
                    <input type="submit" value="salvar" class="btn btn-block btn-primary">
                </form>
            </div>
        </div>
        </div>
    </section>
@endsection

