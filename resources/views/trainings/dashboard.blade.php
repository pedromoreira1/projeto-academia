@extends('layouts.main')

@section('title', 'Dasboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus treinos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-trainings-container">
    @if(count($trainings) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Participantes</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trainings as $training)
                <tr>
                    <td scropt="row">{{ $loop->index + 1 }}</td>
                    <td><a href="/trainings/{{ $training->id }}">{{ $training->title }}</a></td>
                    <td>{{ count($training->users) }}</td>
                    <td>
                        <a href="/trainings/edit/{{ $training->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a> 
                        <form action="/trainings/{{ $training->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach    
        </tbody>
    </table>
    @else
    <p>Você ainda não tem treinos, <a href="/trainings/create">criar treino</a></p>
    @endif
</div>
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Treinos que estou participando</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-trainings-container">
@if(count($trainingsasparticipant) > 0)
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Participantes</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($trainingsasparticipant as $training)
            <tr>
                <td scropt="row">{{ $loop->index + 1 }}</td>
                <td><a href="/trainings/{{ $training->id }}">{{ $training->title }}</a></td>
                <td>{{ count($training->users) }}</td>
                <td>
                    <form action="/trainings/leave/{{ $training->id }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger delete-btn">
                            <ion-icon name="trash-outline"></ion-icon> 
                            Sair do treino
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach    
    </tbody>
</table>
@else
<p>Você ainda não está participando de nenhum treino, <a href="/">veja todos os treinos</a></p>
@endif
</div>
@endsection