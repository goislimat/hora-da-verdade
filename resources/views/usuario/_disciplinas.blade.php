<h3 class="opcional-header">Lista de <span class="fonte-verde-claro">disciplinas</span> para o usuário {{ $usuario->nome }} <span class="glyphicon glyphicon-chevron-down"></span></h3>

@if(count($usuario->disciplinas) > 0)
    <div class="opcional">
        <table class="table table-condensed table-hover">
            <thead>
            <tr>
                <td>Nome</td>
                <td>Semestre</td>
            </tr>
            </thead>
            <tbody>
            @foreach($usuario->disciplinas as $disciplina)
                <tr>
                    <td><span class="glyphicon glyphicon-link"></span> {{ link_to_route('mostrar.disciplina', $disciplina->nome, $disciplina->id) }}</td>
                    <td>{{ $disciplina->semestre }}º</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="opcional">
        <div class="bg-danger">
            <p>Esse usuário não possui nenhuma disciplina cadastrada no sistema.</p>
        </div>
    </div>
@endif