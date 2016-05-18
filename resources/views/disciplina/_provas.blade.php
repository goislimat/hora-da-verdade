<h3 class="opcional-header">Lista de <span class="fonte-verde-claro">provas</span> registradas para {{ $disciplina->nome }} no período {{ $disciplina->periodo_atual }} <span class="glyphicon glyphicon-chevron-down"></span></h3>

@if(count($disciplina->provas) > 0)
    <div class="opcional">
        <table class="table table-condensed table-hover">
            <thead>
            <tr>
                <td>Título</td>
                <td>Data</td>
                <td>Hora de Início</td>
                <td>Pontuação</td>
            </tr>
            </thead>
            <tbody>
            @foreach($disciplina->provas as $prova)
                <tr>
                    <td><span class="glyphicon glyphicon-link"></span> {{ link_to_route('mostrar.prova', $prova->titulo, array($disciplina->id, $prova->id)) }}</td>
                    <td>{{ date_format(date_create($prova->data), 'd/m/Y') }}</td>
                    <td>{{ $prova->hora_inicio }}</td>
                    <td>{{ $prova->pontuacao }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="opcional">
        <div class="bg-danger">
            <p>Essa disciplina não possui nenhuma prova registrada no sistema para o período {{ $disciplina->periodo_atual }}.</p>
        </div>
    </div>
@endif