@extends('layouts.app')

@section('content')

    <div class="text-right">
        <a href="{{ route('novo.curso') }}" class="btn btn-link fonte-verde"><span class="glyphicon glyphicon-plus"></span> Adicionar</a>
    </div>

    <div class="grupo clearfix">
        <a href="{{ route('index.curso') }}" class="btn btn-link fonte-vinho"><h2>Lista de Cursos</h2></a>

        @include('curso.helpers._form_busca')

        @if(isset($cursos['erro']))
            <div class="bg-danger clearfix">
                <p>{{ $cursos['erro'] }}</p>
            </div>
        @else

            <table class="table table-condensed table-hover">
                <thead>
                <tr>
                    <td>Nome</td>
                    <td>Tipo</td>
                </tr>
                </thead>
                <tbody>
                @foreach($cursos as $curso)
                    <tr>
                        <td><span class="glyphicon glyphicon-link"></span> {{ link_to_route('mostrar.curso', $curso->nome, $curso->id) }}</td>
                        <td>{{ $curso->tipo }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @endif
    </div>

@endsection