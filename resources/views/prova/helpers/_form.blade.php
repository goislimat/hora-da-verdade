<div class="col-md-offset-1 col-md-10">
    {{ (!isset($curso))
        ? Form::open(array('route' => array('armazenar.curso'), 'method' => 'post'))
        : Form::model($curso, array('route' => array('atualizar.curso', $curso->id), 'method' => 'put'))
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

    <div class="form-group">
        {{ Form::label('tipo', 'Tipo:', array('class' => 'control-label')) }}
        {{ Form::select('tipo', array('1' => 'Bacharelado', '2' => 'Licenciatura', '3' => 'Tecnólogo', '4' => 'Técnico'), old('tipo'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group text-right">
        <button class="btn btn-link text-primary">
            <span class="glyphicon glyphicon-ok"></span> Concluir
        </button>
    </div>

    {{ Form::close() }}
</div>