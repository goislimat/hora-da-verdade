@extends('layouts.app')

@section('content')

    <h1>Lista de Usuários</h1>

    <table class="table table-condensed table-hover">
        <theade>
            <tr>
                <td>Nome</td>
                <td>E-mail</td>
                <td>Tipo</td>
            </tr>
        </theade>
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

@endsection