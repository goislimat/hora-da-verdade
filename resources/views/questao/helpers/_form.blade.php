{{ (!isset($questao))
    ? Form::open(array('route' => array('armazenar.questao', $disciplinaId, $prova->id), 'method' => 'post'))
    : Form::model($questao, array('route' => array('atualizar.questao', $disciplinaId, $prova->id, $questao->id), 'method' => 'put'))
}}

<div class="form-group">
    {{ Form::label('prova', 'Prova:', array('class' => 'control-label')) }}
    {{ Form::text('prova', $prova->titulo, array('class' => 'form-control', 'readonly' => 'readonly')) }}
    {{ Form::hidden('prova_id', $prova->id) }}
</div>

<div class="form-group{{ ($errors->has('pergunta')) ? ' has-error' : '' }}">
    {{ Form::label('pergunta', 'Pergunta:', array('class' => 'control-label')) }}
    {{ Form::textarea('pergunta', old('pergunta'), array('class' => 'form-control')) }}

    @if($errors->has('pergunta'))
        <span class="help-block">
			<strong>{{ $errors->first('pergunta') }}</strong>
		</span>
    @endif
</div>

<div class="form-group{{ ($errors->has('ordem')) ? ' has-error' : '' }}">
    {{ Form::label('ordem', 'Número da questão:', array('class' => 'control-label')) }}
    {{ Form::number('ordem', old('ordem'), array('class' => 'form-control')) }}

    @if($errors->has('ordem'))
        <span class="help-block">
			<strong>{{ $errors->first('ordem') }}</strong>
		</span>
    @endif
</div>

<div class="form-group">
    {{ Form::label('tipo', 'Tipo:', array('class' => 'control-label')) }}
    {{ Form::select('tipo', array('1' => 'Discursiva', '2' => 'Múltipla Escolha', '3' => 'V ou F'), old('tipo'), array('class' => 'form-control')) }}
</div>

<div class="form-group{{ ($errors->has('peso')) ? ' has-error' : '' }}">
    {{ Form::label('peso', 'Peso:', array('class' => 'control-label')) }}
    {{ Form::number('peso', old('peso'), array('class' => 'form-control')) }}

    @if($errors->has('peso'))
        <span class="help-block">
			<strong>{{ $errors->first('peso') }}</strong>
		</span>
    @endif
</div>

<div class="form-group text-right">
    <button class="btn btn-link">
        <span class="glyphicon glyphicon-ok"></span> Concluir
    </button>
</div>

{{ Form::close() }}