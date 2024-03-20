@extends('layouts.main')

@section('title', $training->title)

@section('content')

  <div class="col-md-10 offset-md-1">
    <div class="row">
      <div id="image-container" class="col-md-6">
        <img src="/img/trainings/{{ $training->image }}" class="img-fluid" alt="{{ $training->title }}">
      </div>
      <div id="info-container" class="col-md-6">
        <h1>{{ $training->title }}</h1>
        <p class="trainings-participants"><ion-icon name="people-outline"></ion-icon> {{ count($training->users) }} Participantes</p>
        <p class="training-owner"><ion-icon name="star-outline"></ion-icon> {{ $trainingOwner['name'] }}</p>
        @if(!$hasUserJoined)
          <form action="/trainings/join/{{ $training->id }}" method="POST">
            @csrf
            <a href="/trainings/join/{{ $training->id }}" 
              class="btn btn-primary" 
              id="training-submit"
              onclick="event.preventDefault();
              this.closest('form').submit();">
              Confirmar Presença
            </a>
          </form>
        @else
          <p class="already-joined-msg">Você já está participando deste treino!</p>
        @endif
          <h3>O nível do treino é:</h3>
          <ul id="items-list">
        @foreach($training->items as $item)
            <li><ion-icon name="arrow-forward-outline"></ion-icon> <span>{{ $item }}</span></li>
        @endforeach
        </ul>
      </div>
      <div class="col-md-12" id="info-container">
        <h3>Treino:</h3>
        <p class="training-treino">{{ $training->treino }}</p>
      </div>
      <div class="col-md-12" id="info-container">
        <h3>Segunda-Feira:</h3>
        <div class="training-segunda">{!! nl2br(e($training->segunda)) !!}</div>
      </div>
      <div class="col-md-12" id="info-container">
        <h3>Terça-Feira:</h3>
        <div class="training-terca">{!! nl2br(e($training->terca)) !!}</div>
      </div>
      <div class="col-md-12" id="info-container">
        <h3>Quarta-Feira:</h3>
        <div class="training-quarta">{!! nl2br(e($training->quarta)) !!}</div>
      </div>
      <div class="col-md-12" id="info-container">
        <h3>Quinta-Feira:</h3>
        <div class="training-quinta">{!! nl2br(e($training->quinta)) !!}</div>
      </div>
      <div class="col-md-12" id="info-container">
        <h3>Sexta-Feira:</h3>
        <div class="training-sexta">{!! nl2br(e($training->sexta)) !!}</div>
      </div>
      <div class="col-md-12" id="info-container">
        <h3>Sabado(Opcional):</h3>
        <div class="training-sabado">{!! nl2br(e($training->sabado)) !!}</div>
      </div>
    </div>
  </div>

@endsection