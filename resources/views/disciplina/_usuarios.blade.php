@if($disciplina->quantidade > 0)
    <div class="opcional">
        <table class="table table-condensed table-hover">
            <thead>
            <tr>
                <td>Nome</td>
                <td>E-mail</td>
                <td>Período</td>
            </tr>
            </thead>
            <tbody>
            @foreach($disciplina->usuarios as $usuario)
                <tr>
                    <td><span class="glyphicon glyphicon-link"></span> {{ link_to_route('mostrar.usuario', $usuario->nome, $usuario->id) }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->pivot->periodo }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="opcional">
        <div class="bg-danger">
            <p>Essa disciplina não possui nenhum aluno cadastrado no sistema para o período {{ $disciplina->periodo_atual }}.</p>
        </div>
    </div>
@endif