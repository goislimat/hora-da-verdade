<div class="col-md-offset-1 col-md-10">
    {{ (!isset($usuario))
        ? Form::open(array('route' => array('armazenar.usuario'), 'method' => 'post'))
        : Form::model($usuario, array('route' => array('atualizar.usuario', $usuario->id), 'method' => 'put'))
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

    <div class="form-group{{ ($errors->has('email')) ? ' has-error' : '' }}">
        {{ Form::label('email', 'E-mail:', array('class' => 'control-label')) }}
        {{ Form::email('email', old('email'), array('class' => 'form-control')) }}

        @if($errors->has('email'))
            <span class="help-block">
    			<strong>{{ $errors->first('email') }}</strong>
    		</span>
        @endif
    </div>

    <div class="form-group">
        {{ Form::label('tipo', 'Tipo:', array('class' => 'control-label')) }}
        {{ Form::select('tipo', array('1' => 'Administrador', '2' => 'Professor', '3' => 'Aluno'), null, array('class' => 'form-control select-tipo-usuario')) }}
    </div>

    <div class="form-group curso hide">
        {{ Form::label('curso_id', 'Curso:', array('class' => 'control-label')) }}
        {{ Form::select('curso_id', $cursos, old('curso_id'), array('class' => 'form-control', 'disabled' => 'true')) }}
    </div>

    <div class="form-group text-right">
        <button class="btn btn-link text-primary">
            <span class="glyphicon glyphicon-ok"></span> Concluir
        </button>
    </div>

    {{ Form::close() }}
</div>