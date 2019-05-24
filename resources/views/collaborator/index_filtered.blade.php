@extends('base_index')
@section('index_title','Funcionários')
@section('index_search_button')
<form class="form-inline" method="GET" action="{{route('collaborator.index')}}">
    {{ csrf_field() }}
<button class="btn btn-outline-success my-2 my-sm-0 btn-primary" type="submit">Remover filtro nome parecido com {{$filtered_content}}</button>
</form>
@endsection
@section('index_table_data')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @isset($collaborators)

            @foreach($collaborators as $collaborator)
                <tr>
                    <td>
                    @if(isset($collaborator->user->image))
                        <picture>
                            <img name="avatar" class="img-thumbnail rounded float-left" src="{{asset('storage/'.$collaborator->user->image)}}" style="width:40px;height:40px; border-radius:50px;"/>
                        </picture>
                    @else
                        <picture>
                            <img name="avatar" class="img-thumbnail" src="{{URL::asset('img/user.png')}}" style="width:40px;height:40px; border-radius:50px;"/>
                        </picture>
                    @endif
                    </td>
                    <td>{{$collaborator->name}}</td>
                    <td>{{$collaborator->phone}}</td>
                    <td><div class="tools">
                            <a href="{{route('collaborator.edit', $collaborator->id)}}"><i class="fas fa-edit"></i></a>
                            <a href="{{route('collaborator.delete', $collaborator->id)}}"><i class="fas fa-trash"></i></a>
                        </div></td>
                </tr>
            @endforeach
        @endisset
        </tbody>
    </table>
    {{$collaborators->links()}}
@endsection
