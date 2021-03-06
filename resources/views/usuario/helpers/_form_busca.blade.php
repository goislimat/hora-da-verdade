<div class="col-md-offset-1 col-md-10 row">
    {{ Form::open(array('route' => array('buscar.usuario'), 'method' => 'get', 'class' => 'form-horizontal')) }}
    <div class="form-group col-md-7">
        {{ Form::text('valor', null, array('class' => 'form-control col-md-9', 'placeholder' => 'A busca diferencia acentuação e letras maiúsculas')) }}
    </div>

    <div class="form-group col-md-3">
        {{ Form::select('campo', array('nome' => 'nome', 'email' => 'email', 'tipo' => 'tipo'), 'nome', array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-md-2">
        <button class="btn btn-default">
            <span class="glyphicon glyphicon-search"></span> Pesquisar
        </button>
    </div>
    {{ Form::close() }}
</div>