@extends('base_form')
@section('back_button')
    <a href="{{ route('collaborator.index') }}" class="btn btn-primary a"><span class="glyphicon glyphicon-arrow-left"></span></a>
@endsection
@section('form_title','Cadastrar funcionário')
@section('form_content')
    <form method="POST" action="{{route('collaborator.store')}}">
        {{ csrf_field() }}
        <label for="name">Nome</label>
        <input type="text" name="name" class="form-control">
        <label for="phone">Telefone</label>
        <input type="text" name="phone"  class="form-control">
        @include('user.partial_form_create')
        <label for="color">Cor do cartão</label>
        <input type="color" name="color" class="form-control">

        <label for="clinica">Clínica</label>
        <div class="form form-inline">
            <select name="clinica" class="form-control">
                <option value="0" >Selecione uma clínica</option>
                @foreach($data['clinic'] as $clinics)
                    @foreach($clinics as $clinic)
                        <option value="{{$clinic->id}}">{{$clinic->name}}</option>
                    @endforeach
                @endforeach
            </select>
            <a href="#" id="clinic-create-button" class="btn btn-primary">Minha clinica não está na lista</a>
        </div>

        <label for="trabalho">Profissão</label>
        <div class="form form-inline">
            <select name="trabalho" class="form-control">
                <option value="0">Selecione uma profissão</option>
                @foreach($data['jobs'] as $jobs)
                    @foreach($jobs as $job)
                        <option value="{{$job->id}}">{{$job->name}}</option>
                    @endforeach
                @endforeach
            </select>
            <a href="#" id="job-create-button" class="btn btn-primary">Minha profissão não está na lista.</a>

        </div>

        <br />
        <input type="submit" value="salvar" class="btn btn-block btn-primary">
    </form>
    @include('job.form_create')
    @include('clinic.form_create_modal')
@endsection
@section('additional-js')
    <script>
        $(document).ready(function(){
            $('#job-create-button').click(function(){
                $('#job-modal-create').modal();
            });
            $('#submit-job-modal').click(function(event){
                event.preventDefault();
                // fazer requisição ajax para salvar no trabalho na lista.
                // buscar dados atualizados e popular novamente a lista.
            });
            $('#clinic-create-button').click(function(){
                $('#clinic-modal-create').modal();
            });
            $('#submit-clinic-modal').click(function(event){
                event.preventDefault();
                // fazer requisição ajax para salvar clinica na lista.
                // buscar dados atualizados e popular novamente a lista.
            });

        });
    </script>
@endsection