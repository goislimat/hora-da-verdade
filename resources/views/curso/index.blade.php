@extends('layouts.app')

@section('content')

    <div class="col-md-offset-1 col-md-10 row">
        {{ Form::open(array('route' => array('buscar.curso'), 'method' => 'post', 'class' => 'form-horizontal')) }}
        <div class="form-group col-md-4">
            {{ Form::select('campo', array('nome' => 'nome', 'tipo' => 'tipo'), 'nome', array('class' => 'form-control')) }}
        </div>

        <div class="form-group col-md-6 ">
            {{ Form::text('valor', null, array('class' => 'form-control col-md-9', 'placeholder' => 'A busca diferencia acentuação e letras maiúsculas')) }}
        </div>

        <div class="form-group col-md-2">
            <button class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span> Pesquisar
            </button>
        </div>
        {{ Form::close() }}
    </div>

    <div class="grupo clearfix">
        <a href="{{ route('index.curso') }}" class="btn btn-link fonte-vinho"><h2>Lista de Cursos</h2></a>
        @if(isset($cursos['erro']))
            <div class="bg-danger clearfix">
                <p>A consulta realizada não retornou nenhum resultado</p>
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