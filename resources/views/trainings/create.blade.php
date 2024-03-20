@extends('layouts.main')
@section('title', 'Criar Treino')
@section('content')

<div id="training-create" class="containeir col-md-6 offset-md-3">
    <h1>Crie o seu treino</h1>
    <form action="/trainings" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Logo:</label>
            <input type="file" id= "image" name="image" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="title">Foco do treino:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Foco do Treino">
        </div>
        <div class="form-group">
            <label for="date">Data da criação treino:</label>
            <input type="date" id= "date" name="date" class="form-control">
        </div>
        <div class="form-group">
            <label for="title">Você é Personal Training?:</label>
            <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Treino:</label>
            <textarea name="treino" id="treino" class="form-control" placeholder="Treino"></textarea>
        </div>
        <div class="form-group">
            <label for="title">Segunda-Feira:</label>
            <textarea name="segunda" id="segunda" class="form-control" placeholder="Treino"></textarea>
        </div>
        <div class="form-group">
            <label for="title">Terça-Feira:</label>
            <textarea name="terca" id="terca" class="form-control" placeholder="Treino"></textarea>
        </div>
        <div class="form-group">
            <label for="title">Quarta-Feira:</label>
            <textarea name="quarta" id="quarta" class="form-control" placeholder="Treino"></textarea>
        </div>
        <div class="form-group">
            <label for="title">Quinta-Feira:</label>
            <textarea name="quinta" id="quinta" class="form-control" placeholder="Treino"></textarea>
        </div>
        <div class="form-group">
            <label for="title">Sexta-Feira:</label>
            <textarea name="sexta" id="sexta" class="form-control" placeholder="Treino"></textarea>
        </div>
        <div class="form-group">
            <label for="title">Sabado(Opcional):</label>
            <textarea name="sabado" id="sabado" class="form-control" placeholder="Treino"></textarea>
        </div>
        <div class="form-group">
            <label for="title">Nível do treino:</label>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Iniciante">Iniciante
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Intermediário">Intermediário
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Avançado">Avançado
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Criar treino">
    </form>
</div>

@endsection