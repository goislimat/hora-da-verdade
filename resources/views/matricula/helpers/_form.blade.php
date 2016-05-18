<div class="col-md-offset-1 col-md-10">
    {{ Form::open(array('route' => array('vincular.usuario', $disciplina->id), 'method' => 'post')) }}

    <div class="form-group{{ ($errors->has('nome')) ? ' has-error' : '' }}">
        {{ Form::label('user_id', 'Aluno:', array('class' => 'control-label')) }}
        {{ Form::select('user_id', $usuarios, old('user_id'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('disciplina', 'Disciplina:', array('class' => 'control-label')) }}
        {{ Form::text('disciplina', $disciplina->nome, array('class' => 'form-control', 'readonly' => 'readonly')) }}
        {{ Form::hidden('disciplina_id', $disciplina->id) }}
    </div>

    <div class="form-group{{ ($errors->has('periodo')) ? ' has-error' : '' }}">
        {{ Form::label('periodo', 'Período:', array('class' => 'control-label')) }}
        {{ Form::text('periodo', date('Y') . '/' . ((date('m') > 6) ? '2': '1'), array('class' => 'form-control')) }}

        @if($errors->has('periodo'))
            <span class="help-block">
    			<strong>{{ $errors->first('periodo') }}</strong>
    		</span>
        @endif
    </div>

    <div class="form-group text-right">
        <button class="btn btn-link text-primary">
            <span class="glyphicon glyphicon-ok"></span> Concluir
        </button>
    </div>

    {{ Form::close() }}
</div>