@extends('base_form')

@section('back_button')
    <a href="{{ route('collaborator.index') }}" class="btn btn-primary a"><span class="glyphicon glyphicon-arrow-left"></span></a>
@endsection
@section('form_title','Editar funcionário')
@section('form_content')
    <form method="POST" action="{{route('collaborator.update', $collaborator->id)}}">
        {{ csrf_field() }}
        <label for="name">Nome</label>
        <input type="text" name="name" class="form-control" value="{{$collaborator->name}}">
        <label for="email">E-mail</label>
        <input type="text" name="email" class="form-control" value="{{$collaborator->user->email}}">
        <label for="phone">Telefone</label>
        <input type="text" name="phone"  class="form-control" value="{{$collaborator->phone}}">
        <label for="color">Cor do cartão</label>
        <input type="color" name="color" class="form-control" value="{{$collaborator->color}}">
        <label for="clinic_id">Clínica</label>
        <div class="form-inline">
            <select name="clinic_id" class="form-control">
                <option value="0" >Selecione uma clínica</option>
                @foreach($data['clinic'] as $clinics)
                    @foreach($clinics as $clinic)
                        @if($clinic->id == $collaborator->clinic_id)
                            <option value="{{$clinic->id}}" selected>{{$clinic->name}}</option>
                        @else
                            <option value="{{$clinic->id}}">{{$clinic->name}}</option>
                        @endif
                    @endforeach
                @endforeach
            </select>
        </div>
        <label for="job_id">Profissão</label>
        <div class="form-inline">
            <select name="job_id" class="form-control">
                <option value="0">Selecione uma profissão</option>
                @foreach($data['jobs'] as $jobs)
                    @foreach($jobs as $job)
                        @if($job->id == $collaborator->job_id)
                            <option value="{{$job->id}}" selected>{{$job->name}}</option>
                        @else
                            <option value="{{$job->id}}">{{$job->name}}</option>
                        @endif
                    @endforeach
                @endforeach
            </select>
        </div>
        <br />
        <input type="submit" value="salvar" class="btn btn-block btn-primary">
    </form>
@endsection

