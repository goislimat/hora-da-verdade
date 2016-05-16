@extends('layouts.app')

@section('content')

    @include('disciplina.helpers._acao')

    @if(isset($erro))

        <hr>
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $erro['mensagem'] }}</h3>
            </div>
            <div class="panel-body">
                <ul>
                    @foreach($erro['solucao'] as $solucao)
                        <li>{{ $solucao }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <hr>

    @endif

    <h2 class="fonte-vinho">#{{ $disciplina->id }} - {{ $disciplina->nome }}</h2>
    <h4>Disciplina do {{ $disciplina->semestre }}º semestre de {{ $disciplina->curso->nome }}</h4>

    <hr>

    <p>quaisquer tabelas adicionais</p>

    <hr>

    @include('disciplina.helpers._manutencao')

@endsection