@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus treinos</h1>
</div>
<div class="col-md-10 offset-md-1 dasboard-trainings-container">
    @if(count($trainings) > 0)
    @else
    <p>Você ainda não tem treinos, <a href="/trainings/create">Criar treino</a></p>
    @endif
</div>

@endsection