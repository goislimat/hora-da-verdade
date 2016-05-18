<div class="col-md-offset-1 col-md-10">
    {{ (!isset($disciplina))
        ? Form::open(array('route' => array('armazenar.disciplina'), 'method' => 'post'))
        : Form::model($disciplina, array('route' => array('atualizar.disciplina', $disciplina->id), 'method' => 'put'))
        }}

    <div class="form-group{{ ($errors->has('nome')) ? ' has-error' : '' }}">
        {{ Form::label('nome', 'Nome:', array('class' => 'control-label')) }}
        {{ Form::text('nome', old('nome'), array('class' => 'form-control')) }}

        @if($errors->has('nome'))
            <span class="help-block">
                <strong>{{ $errors->first('nome') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ ($errors->has('semestre')) ? ' has-error' : '' }}">
        {{ Form::label('semestre', 'Semestre/Ano:', array('class' => 'control-label')) }}
        {{ Form::number('semestre', old('semestre'), array('class' => 'form-control')) }}

        @if($errors->has('semestre'))
            <span class="help-block">
    			<strong>{{ $errors->first('semestre') }}</strong>
    		</span>
        @endif
    </div>

    <div class="form-group">
        {{ Form::label('curso_id', 'Curso:', array('class' => 'control-label')) }}
        @if(isset($curso))
            {{ Form::text('curso', $curso->nome, array('class' => 'form-control', 'readonly' => 'readonly')) }}
            {{ Form::hidden('curso_id', $curso->id) }}
        @else
            {{ Form::select('curso_id', $cursos, old('curso_id'), array('class' => 'form-control')) }}
        @endif
    </div>

    <div class="form-group text-right">
        <button class="btn btn-link text-primary">
            <span class="glyphicon glyphicon-ok"></span> Concluir
        </button>
    </div>

    {{ Form::close() }}
</div>