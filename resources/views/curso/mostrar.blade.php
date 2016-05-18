@extends('layouts.app')

@section('content')

    @include('curso.helpers._acao')

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

    <h2 class="fonte-vinho">#{{ $curso->id }} - {{ $curso->nome }}</h2>
    <h4>{{ $curso->tipo }}</h4>

    <hr>
    @include('curso._alunos')
    <hr>
    @include('curso._disciplinas')
    <hr>

    @include('curso.helpers._manutencao')

@endsection