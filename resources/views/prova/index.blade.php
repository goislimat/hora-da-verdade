@extends('layouts.app')

@section('content')

    <div class="text-right">
        <a href="{{ route('novo.prova', $disciplina->id) }}" class="btn btn-link fonte-verde"><span class="glyphicon glyphicon-plus"></span> Adicionar</a>
    </div>

    <div class="grupo clearfix">
        <a href="{{ route('index.prova', $disciplina->id) }}" class="btn btn-link fonte-vinho"><h2>Lista de Provas de {{ $disciplina->nome }}</h2></a>

        @include('prova.helpers._form_busca')

        @if(isset($provas['erro']))
            <div class="bg-danger clearfix">
                <p>{{ $provas['erro'] }}</p>
            </div>
        @else

            <table class="table table-condensed table-hover">
                <thead>
                <tr>
                    <td>Título</td>
                    <td>Data</td>
                    <td>Hora de Início</td>
                    <td>Pontuação</td>
                </tr>
                </thead>
                <tbody>
                @foreach($provas as $prova)
                    <tr>
                        <td><span class="glyphicon glyphicon-link"></span> {{ link_to_route('mostrar.prova', $prova->titulo, array($disciplina->id, $prova->id)) }}</td>
                        <td>{{ date_format(date_create($prova->data), 'd/m/Y') }}</td>
                        <td>{{ $prova->hora_inicio }}</td>
                        <td>{{ $prova->pontuacao }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @endif
    </div>

@endsection