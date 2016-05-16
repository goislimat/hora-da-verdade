@extends('layouts.app')

@section('content')

    <div class="text-right">
        <a href="{{ route('novo.disciplina') }}" class="btn btn-link fonte-verde"><span class="glyphicon glyphicon-plus"></span> Adicionar</a>
    </div>

    <div class="grupo clearfix">
        <a href="{{ route('index.disciplina') }}" class="btn btn-link fonte-vinho"><h2>Lista de Disciplinas</h2></a>

        @include('disciplina.helpers._form_busca')

        @if(isset($disciplinas['erro']))
            <div class="bg-danger clearfix">
                <p>{{ $disciplinas['erro'] }}</p>
            </div>
        @else

            <table class="table table-condensed table-hover">
                <thead>
                <tr>
                    <td>Nome</td>
                    <td>Curso</td>
                    <td>Semestre</td>
                </tr>
                </thead>
                <tbody>
                @foreach($disciplinas as $disciplina)
                    <tr>
                        <td><span class="glyphicon glyphicon-link"></span> {{ link_to_route('mostrar.disciplina', $disciplina->nome, $disciplina->id) }}</td>
                        <td>{{ $disciplina->curso->nome }}</td>
                        <td>{{ $disciplina->semestre }}º</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @endif
    </div>

@endsection