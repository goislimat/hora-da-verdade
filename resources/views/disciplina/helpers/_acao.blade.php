<div class="dropdown">
    <button class="btn btn-default dropdown-toggle text-right" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <span class="glyphicon glyphicon-cog"></span> Ações
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
        <li>{{ link_to_route('novo.prova', 'Nova Prova', array($disciplina->id)) }}</li>
        <li role="separator" class="divider"></li>

        <li>{{ link_to_route('matricular.aluno', 'Matricular Aluno', array($disciplina->id)) }}</li>
        @if(session()->get('user.tipo') == 1)
            <li>{{ link_to_route('vincular.professor', 'Vincular Professor', array($disciplina->id)) }}</li>
            <li role="separator" class="divider"></li>
        @endif

        @if(session()->get('user.tipo') == 1)
            <li>{{ link_to_route('alunos.disciplina', 'Lista de Alunos', array($disciplina->id)) }}</li>
            <li>{{ link_to_route('professores.disciplina', 'Lista de Professores', array($disciplina->id)) }}</li>
            <li role="separator" class="divider"></li>

            <li>{{ link_to_route('editar.disciplina', 'Editar', $disciplina->id) }}</li>
            <li role="separator" class="divider"></li>

            <li>
                {{ Form::open(array('route' => array('excluir.disciplina', $disciplina->id), 'method' => 'delete', 'class' => 'form-delete')) }}
                {{ Form::submit('Excluir', array('class' => 'btn btn-danger btn-sm col-md-offset-1 col-md-10')) }}
                {{ Form::close() }}
            </li>
        @endif
    </ul>
</div>