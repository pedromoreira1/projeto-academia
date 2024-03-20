@extends('layouts.main')
@section('title', 'ZY Training')
@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um Treino</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
<div id="trainings-container" class="col-md-12 text-center">
    @if($search)
    <h2>Buscando por: {{ $search }}</h2>
    @else
    <h2>Todos os treinos disponíveis</h2>
    @endif
    <div id="cards-container" class="row">
        @foreach($trainings as $training)
        <div class="card col-md-3">
            <img src="/img/trainings/{{ $training->image }}" alt="{{ $training->title }}">
            <div class="card-body">
                <p class="card-date">{{ date('d/m/Y', strtotime($training->date)) }}</p>
                <h5 class="title">{{ $training->title }}</h5>
                <h7 class="treino">{{ $training->treino }}</h7>
                <p class="card-participants">{{ count($training->users) }} Participantes</p>
                <a href="/trainings/{{ $training->id }}" class="btn btn-primary">Saber mais</a>
            </div>
        </div>
        @endforeach
        @if(count($trainings) == 0 && $search)
                <p>Não foi possível encontrar nenhum treino com {{ $search }}! <a href="/">Ver todos!</a></p>
            @elseif(count($trainings) == 0)
                <p>Não há treinos disponíveis</p>
            @endif
    </div>
</div>

@endsection

