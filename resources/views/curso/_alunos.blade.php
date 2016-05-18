<h3 class="opcional-header">Lista de <span class="fonte-verde-claro">alunos</span> para o curso de {{ $curso->nome }} <span class="glyphicon glyphicon-chevron-down"></span></h3>

@if(count($curso->alunos) > 0)
    <div class="opcional">
        <table class="table table-condensed table-hover">
            <thead>
            <tr>
                <td>Nome</td>
                <td>E-mail</td>
            </tr>
            </thead>
            <tbody>
            @foreach($curso->alunos as $aluno)
                <tr>
                    <td><span class="glyphicon glyphicon-link"></span> {{ link_to_route('mostrar.usuario', $aluno->nome, $aluno->id) }}</td>
                    <td>{{ $aluno->email }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="opcional">
        <div class="bg-danger">
            <p>Esse curso não possui nenhum aluno cadastrado no sistema.</p>
        </div>
    </div>
@endif