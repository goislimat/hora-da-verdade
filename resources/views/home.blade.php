@extends('layouts.app')

@section('content')

<div>
    <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>

        <div class="panel-body">
            You are logged in! Welcome, {{ $usuario->nome }}
        </div>
    </div>
</div>

@endsection
