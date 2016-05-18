@extends('layouts.app')

@section('content')

    @include('usuario.helpers._acao')

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

    <h2 class="fonte-vinho">#{{ $usuario->id }} - {{ $usuario->nome }}</h2>
    <h4>{{ $usuario->email }}</h4>
    <h5>{{ $usuario->tipo }} {{ (isset($usuario->curso_id)) ? ' do curso de '.$usuario->curso->nome : '' }}</h5>

    <hr>
    @include('usuario._disciplinas')
    <hr>

    @include('usuario.helpers._manutencao')

@endsection