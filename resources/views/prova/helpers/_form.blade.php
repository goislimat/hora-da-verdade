<div class="col-md-offset-1 col-md-10">
    {{ (!isset($prova))
        ? Form::open(array('route' => array('armazenar.prova', $disciplina->id), 'method' => 'post'))
        : Form::model($prova, array('route' => array('atualizar.prova', $disciplina->id, $prova->id), 'method' => 'put'))
    }}

    <div class="form-group text-info">
        Os campos com (*) devem ser preenchidos somente com números
    </div>

    <div class="form-group{{ ($errors->has('titulo')) ? ' has-error' : '' }}">
        {{ Form::label('titulo', 'Título:', array('class' => 'control-label')) }}
        {{ Form::text('titulo', old('titulo'), array('class' => 'form-control')) }}

        @if($errors->has('titulo'))
            <span class="help-block">
    			<strong>{{ $errors->first('titulo') }}</strong>
    		</span>
        @endif
    </div>

    <div class="form-group">
        {{ Form::label('disiciplina', 'Disciplina:', array('class' => 'control-label')) }}
        {{ Form::text('disciplina', $disciplina->nome, array('class' => 'form-control', 'readonly' => 'readonly')) }}
        {{ Form::hidden('disciplina_id', $disciplina->id) }}
    </div>

    <div class="form-group{{ ($errors->has('data')) ? ' has-error' : '' }}">
        {{ Form::label('data', 'Data:*', array('class' => 'control-label')) }}
        {{ Form::text('data', old('data'), array('class' => 'form-control date-input', 'placeholder' => '01/01/2001')) }}

        @if($errors->has('data'))
            <span class="help-block">
    			<strong>{{ $errors->first('data') }}</strong>
    		</span>
        @endif
    </div>

    <div class="form-group{{ ($errors->has('pontuacao')) ? ' has-error' : '' }}">
        {{ Form::label('pontuacao', 'Pontuação:*', array('class' => 'control-label')) }}
        {{ Form::number('pontuacao', old('pontuacao'), array('class' => 'form-control', 'step' => 'any')) }}

        @if($errors->has('pontuacao'))
            <span class="help-block">
    			<strong>{{ $errors->first('pontuacao') }}</strong>
    		</span>
        @endif
    </div>

    <div class="form-group{{ ($errors->has('hora_inicio')) ? ' has-error' : '' }}">
        {{ Form::label('hora_inicio', 'Horário de Início:*', array('class' => 'control-label')) }}
        {{ Form::text('hora_inicio', old('hora_inicio'), array('class' => 'form-control time', 'placeholder' => '00:00:00')) }}

        @if($errors->has('hora_inicio'))
            <span class="help-block">
    			<strong>{{ $errors->first('hora_inicio') }}</strong>
    		</span>
        @endif
    </div>

    <div class="form-group">
        {{ Form::label('hora_final', 'Horário de Término:*', array('class' => 'control-label')) }}
        {{ Form::text('hora_final', old('hora_final'), array('class' => 'form-control time', 'placeholder' => '00:00:00')) }}
    </div>

    <div class="form-group">
        {{ Form::label('notificar', 'Notificar o aluno com as respostas da prova por e-mail?', array('class' => 'control-label')) }}
        <br>
        {{ Form::radio('notificar', 'true') }} Sim
        <br>
        {{ Form::radio('notificar', 'false', true) }} Não
    </div>

    <div class="form-group notificacao-info hide">
        {{ Form::label('data_notificacao', 'Data da Notificação:*', array('class' => 'control-label')) }}
        {{ Form::text('data_notificacao', old('data_notificacao'), array('class' => 'form-control date-input', 'placeholder' => '01/01/2001')) }}
    </div>

    <div class="form-group notificacao-info hide">
        {{ Form::label('horario_notificacao', 'Horário da Notificação:*', array('class' => 'control-label')) }}
        {{ Form::text('horario_notificacao', old('horario_notificacao'), array('class' => 'form-control time', 'placeholder' => '00:00:00')) }}
    </div>

    <div class="form-group text-right">
        <button class="btn btn-link text-primary">
            <span class="glyphicon glyphicon-ok"></span> Concluir
        </button>
    </div>

    {{ Form::close() }}
</div>