@extends('layouts.app')

@section('content')

    @include('questao.helpers._acao')

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

    <h2 class="fonte-vinho">Pergunta: #{{ $questao->ordem }} da prova {{ link_to_route('mostrar.prova', $questao->prova->titulo, array($questao->prova->disciplina_id, $questao->prova_id), array('class' => 'fonte-verde-claro')) }}</h2>
    <h3>{{ $questao->pergunta }}</h3>
    <h4>{{ $questao->tipo }}</h4>

    <hr>

    @include('questao.helpers._manutencao')

@endsection