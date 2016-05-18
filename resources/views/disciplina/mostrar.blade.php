@extends('layouts.app')

@section('content')

    @if(session()->get('user.tipo') != 3)
        @include('disciplina.helpers._acao')
    @endif

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
    <h5>Disciplina lecionada por: {!! ($disciplina->professor != null) ? $disciplina->professor->nome : '<span class="fonte-vinho">Disciplina não possui professor para '. $disciplina->periodo_atual .'</span>' !!}</h5>

    @if(session()->get('user.tipo') != 3)
        <hr>
        <h3 class="opcional-header">Lista de <span class="fonte-verde-claro">alunos</span> matriculados em {{ $disciplina->nome }} no período {{ $disciplina->periodo_atual }} <span class="glyphicon glyphicon-chevron-down"></span></h3>
        @include('disciplina._usuarios')
    @endif

    <hr>
    @include('disciplina._provas')
    <hr>

    @if(session()->get('user.tipo') == 1)
        @include('disciplina.helpers._manutencao')
    @endif

@endsection