{{ Form::open(array('route' => array('armazenar.questao', $disciplinaId, $prova->id), 'method' => 'post')) }}

<div class="form-group">
    {{ Form::label('prova', 'Prova:', array('class' => 'control-label')) }}
    {{ Form::text('prova', $prova->titulo, array('class' => 'form-control', 'readonly' => 'readonly')) }}
    {{ Form::hidden('prova_id', $prova->id) }}
</div>

<div class="form-group">
    {{ Form::label('pergunta', 'Pergunta:', array('class' => 'control-label')) }}
    {{ Form::textarea('pergunta', old('pergunta'), array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('ordem', 'Número da questão:', array('class' => 'control-label')) }}
    {{ Form::number('ordem', old('ordem'), array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('tipo', 'Tipo:', array('class' => 'control-label')) }}
    {{ Form::select('tipo', array('1' => 'Discursiva', '2' => 'Múltipla Escolha', '3' => 'V ou F'), old('tipo'), array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('peso', 'Peso:', array('class' => 'control-label')) }}
    {{ Form::number('peso', old('peso'), array('class' => 'form-control')) }}
</div>

<div class="form-group text-right">
    <button class="btn btn-link">
        <span class="glyphicon glyphicon-ok"></span> Concluir
    </button>
</div>

{{ Form::close() }}