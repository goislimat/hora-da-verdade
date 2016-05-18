<div class="col-md-offset-1 col-md-10">
    @if(!isset($usuario))
        @if(!isset($recurso))
            {{ Form::open(array('route' => array('armazenar.usuario'), 'method' => 'post')) }}
        @else
            {{ Form::open(array('route' => array('armazenar.usuario', $recurso, $curso->id), 'method' => 'post')) }}
        @endif
    @else
        {{ Form::model($usuario, array('route' => array('atualizar.usuario', $usuario->id), 'method' => 'put')) }}
    @endif

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
        @if(isset($curso))
            {{ Form::text('tipo_text', 'Aluno', array('class' => 'form-control', 'readonly' => 'readonly')) }}
            {{ Form::hidden('tipo', 3) }}
        @else
            {{ Form::select('tipo', array('1' => 'Administrador', '2' => 'Professor', '3' => 'Aluno'), null, array('class' => 'form-control select-tipo-usuario')) }}
        @endif
    </div>

    @if(isset($curso))
        <div class="form-group curso">
            {{ Form::label('curso_id', 'Curso:', array('class' => 'control-label')) }}
            {{ Form::text('curso', $curso->nome, array('class' => 'form-control', 'readonly' => 'readonly')) }}
            {{ Form::hidden('curso_id', $curso->id) }}
        </div>
    @else
        <div class="form-group curso hide">
            {{ Form::label('curso_id', 'Curso:', array('class' => 'control-label')) }}
            {{ Form::select('curso_id', $cursos, old('curso_id'), array('class' => 'form-control', 'disabled' => 'true')) }}
        </div>
    @endif

    <div class="form-group text-right">
        <button class="btn btn-link text-primary">
            <span class="glyphicon glyphicon-ok"></span> Concluir
        </button>
    </div>

    {{ Form::close() }}
</div>