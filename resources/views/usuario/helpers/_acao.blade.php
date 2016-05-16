<div class="dropdown">
    <button class="btn btn-default dropdown-toggle text-right" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <span class="glyphicon glyphicon-cog"></span> Ações
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
        <li>{{ link_to_route('editar.usuario', 'Editar', $usuario->id) }}</li>
        <li role="separator" class="divider"></li>
        <li>
            {{ Form::open(array('route' => array('excluir.usuario', $usuario->id), 'method' => 'delete', 'class' => 'form-delete')) }}
            {{ Form::submit('Excluir', array('class' => 'btn btn-danger btn-sm col-md-offset-1 col-md-10')) }}
            {{ Form::close() }}
        </li>
    </ul>
</div>