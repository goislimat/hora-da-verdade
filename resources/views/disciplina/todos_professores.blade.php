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

    <a href="{{ route('mostrar.disciplina', $disciplina->id) }}"><h2 class="fonte-vinho">#{{ $disciplina->id }} - {{ $disciplina->nome }}</h2></a>
    <h4>Disciplina do {{ $disciplina->semestre }}º semestre de {{ $disciplina->curso->nome }}</h4>

    <hr>
    <h3 class="opcional-header">Lista de todos os <span class="fonte-verde-claro">professores</span> que já lecionaram {{ $disciplina->nome }} <span class="glyphicon glyphicon-chevron-down"></span></h3>
    @include('disciplina._usuarios')
    <hr>

    @include('disciplina.helpers._manutencao')

@endsection