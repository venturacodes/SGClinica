@extends('layouts.app')
@section('content')
    <div class="panel panel-info">
        <div class="panel-heading"><h4>Selecione uma Clínica</h4></div>
        <div class="panel-body">
            <ul class="list-group">
                @foreach($clinics as $clinic)
                    <a href="{{route('clinic.choose_clinic', ['clinic_id'=>$clinic->id])}}" ><li class="list-group-item"><strong>{{$clinic->name}}</strong></li></a>
                @endforeach
            </ul>

        </div>
    </div>
@endsection
