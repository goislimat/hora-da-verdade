@extends('layouts.app')

@section('content')

    @include('prova.helpers._acao')

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

    <h2 class="fonte-vinho">#{{ $prova->id }} - {{ $prova->titulo }}</h2>
    <h4>Prova de {{ $disciplina->nome }} em {{ date_format(date_create($prova->data), 'd/m/Y') }}</h4>
    <h5>Início às {{ $prova->hora_inicio }} e com término {{ ($prova->hora_final != null) ? 'às '. $prova->hora_final : 'em aberto' }}</h5>
    <h5>Valor: {{ $prova->pontuacao }} pontos</h5>
    <h5>Notificar alunos com o gabarito da prova:
        @if($prova->notificar)
            Sim</h5>
            <h5>Momento da notificação: {{ date_format(date_create($prova->momento_notificacao), 'd/m/Y H:i:s') }}</h5>
        @else
            Não</h5>
        @endif
    <hr>

    <p>quaisquer tabelas adicionais</p>

    <hr>

    @include('prova.helpers._manutencao')

@endsection