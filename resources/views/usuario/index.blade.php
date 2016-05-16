@extends('layouts.app')

@section('content')

    <div class="text-right">
        <a href="{{ route('novo.usuario') }}" class="btn btn-link fonte-verde"><span class="glyphicon glyphicon-plus"></span> Adicionar</a>
    </div>

    <div class="grupo clearfix">
        <a href="{{ route('index.usuario') }}" class="btn btn-link fonte-vinho"><h2>Lista de Usuários</h2></a>

        @include('usuario.helpers._form_busca')

        @if(isset($usuarios['erro']))
            <div class="bg-danger clearfix">
                <p>{{ $usuarios['erro'] }}</p>
            </div>
        @else

            <table class="table table-condensed table-hover">
                <thead>
                <tr>
                    <td>Nome</td>
                    <td>E-mail</td>
                    <td>Tipo</td>
                </tr>
                </thead>
                <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td><span class="glyphicon glyphicon-link"></span> {{ link_to_route('mostrar.usuario', $usuario->nome, $usuario->id) }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->tipo }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @endif
    </div>

@endsection