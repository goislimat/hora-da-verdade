@extends('layouts.app')

@section('content')

    @include('questao.helpers._acao')

    @if(isset($erro))

        <hr>
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $erro['mensagem'] }}</h3>
            </div>
            <div class="panel-body">
                <ul>
                    @foreach($erro['solucao'] as $solucao)
                        <li>{{ $solucao }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <hr>

    @endif

    <h2 class="fonte-vinho">Pergunta: #{{ $questao->ordem }} da prova {{ link_to_route('mostrar.prova', $questao->prova->titulo, array($questao->prova->disciplina_id, $questao->prova_id), array('class' => 'fonte-verde-claro')) }}</h2>
    <h3>{{ $questao->pergunta }}</h3>
    <h4>{{ $questao->tipo_texto }}</h4>

    <hr>
    @if($questao->tipo != 1)

        <div class="opcoes">

            <button class="btn btn-link opcional-header"><span class="glyphicon glyphicon-plus"></span> Adicionar Opção</button>

            <div class="registrar-opcao opcional oculto col-md-offset-2 col-md-8">
                {{ Form::open(array('route' => array('armazenar.opcao', $questao->prova->disciplina_id, $questao->prova_id, $questao->id), 'method' => 'post')) }}

                {{ Form::hidden('questao_id', $questao->id) }}

                <div class="form-group{{ ($errors->has('texto')) ? ' has-error' : '' }}">
                    {{ Form::label('texto', 'Texto:', array('class' => 'control-label')) }}
                    {{ Form::textarea('texto', old('texto'), array('class' => 'form-control')) }}

                    @if($errors->has('texto'))
                        <span class="help-block">
                			<strong>{{ $errors->first('texto') }}</strong>
                		</span>
                    @endif
                </div>

                <div class="form-group{{ ($errors->has('ordem')) ? ' has-error' : '' }}">
                    {{ Form::label('ordem', 'Ordenação da Opção:', array('class' => 'control-label')) }}
                    {{ Form::number('ordem', old('ordem'), array('class' => 'form-control')) }}

                    @if($errors->has('ordem'))
                        <span class="help-block">
                			<strong>{{ $errors->first('ordem') }}</strong>
                		</span>
                    @endif
                </div>

                <div class="form-group text-right">
                    <button class="btn btn-link">
                        <span class="glyphicon glyphicon-ok"></span> Concluir
                    </button>
                </div>

                {{ Form::close() }}
            </div>

            <div class="clearfix"></div>

            @if(count($questao->opcoes) > 0)

                <h3 class="opcional-header">Opções registradas para essa questão <span class="glyphicon glyphicon-chevron-down"></span></h3>

                <div class="opcional">
                    <table class="table table-condensed table-hover">
                        <thead>
                        <tr>
                            <td>Ordem</td>
                            <td>Texto</td>
                            <td>Editar</td>
                            <td>Excluir</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($questao->opcoes as $opcao)
                            <tr>
                                <td>{{ $opcao->ordem }}</td>
                                <td>{{ $opcao->texto }}</td>
                                <td>
                                    <button class="btn btn-link btn-sm">
                                        <a href="{{ route('editar.opcao', array($questao->prova->disciplina_id, $questao->prova_id, $questao->id, $opcao->id)) }}" class="text-warning"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                    </button>
                                <td>
                                    {{ Form::open(array('route' => array('excluir.opcao', $questao->prova->disciplina_id, $questao->prova_id, $questao->id, $opcao->id), 'method' => 'delete', 'class' => 'form-delete')) }}
                                    <button class="btn btn-link btn-sm">
                                        <span class="glyphicon glyphicon-remove text-danger"></span>
                                    </button>
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <hr>
                <div class="bg-danger">
                    <p>Essa é uma questão de <strong>{{ $questao->tipo_texto }}</strong>, mas ainda não foi registrada nenhuma opção para essa questão.</p>
                </div>
            @endif
        </div>
        <hr>

    @endif

    @include('questao.helpers._manutencao')

@endsection