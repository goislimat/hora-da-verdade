@extends('layouts.app')

@section('content')

    <h2 class="text-center">Editar Opção</h2>

    {{ Form::model($opcao, array('route' => array('atualizar.opcao', $disciplinaId, $provaId, $questaoId, $opcao->id), 'method' => 'put')) }}

    {{ Form::hidden('questao_id', $questaoId) }}

    <div class="form-group{{ ($errors->has('texto')) ? ' has-error' : '' }}">
        {{ Form::label('texto', 'Texto:', array('class' => 'control-label')) }}
        {{ Form::textarea('texto', old('texto'), array('class' => 'form-control')) }}

        @if($errors->has('texto'))
            <span class="help-block">
    			<strong>{{ $errors->first('texto') }}</strong>
    		</span>
        @endif
    </div>

    <div class="form-group{{ ($errors->has('ordem')) ? ' has-error' : '' }}">
        {{ Form::label('ordem', 'Ordenação da questão:', array('class' => 'control-label')) }}
        {{ Form::number('ordem', old('ordem'), array('class' => 'form-control')) }}

        @if($errors->has('ordem'))
            <span class="help-block">
    			<strong>{{ $errors->first('ordem') }}</strong>
    		</span>
        @endif
    </div>

    <div class="form-group text-right">
        <button class="btn btn-link">
            <span class="glyphicon glyphicon-ok"></span> Concluir
        </button>
    </div>

    {{ Form::close() }}

@endsection