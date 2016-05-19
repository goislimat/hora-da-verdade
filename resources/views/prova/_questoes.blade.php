<h3 class="opcional-header">Lista de <span class="fonte-verde-claro">questões</span> para a prova {{ $prova->titulo }} <span class="glyphicon glyphicon-chevron-down"></span></h3>

@if(count($prova->questoes) > 0)
    <div class="opcional">
        <table class="table table-condensed table-hover">
            <thead>
            <tr>
                <td>Número</td>
                <td>Pergunta</td>
                <td>Tipo</td>
            </tr>
            </thead>
            <tbody>
            @foreach($prova->questoes as $questao)
                <tr>
                    <td>{{ $questao->ordem }}</td>
                    <td><span class="glyphicon glyphicon-link"></span> {{ link_to_route('mostrar.questao', substr($questao->pergunta, 0, 40), array($questao->prova->disciplina_id, $questao->prova_id, $questao->id)) }}</td>
                    <td>{{ $questao->tipo }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="opcional">
        <div class="bg-danger">
            <p>Essa prova ainda não possui questões cadastradas no sistema.</p>
        </div>
    </div>
@endif