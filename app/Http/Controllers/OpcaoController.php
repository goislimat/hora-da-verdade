<?php

namespace Verdade\Http\Controllers;

use Illuminate\Http\Request;

use Verdade\Http\Requests;
use Verdade\Repositories\OpcaoRepository;

class OpcaoController extends Controller
{
    /**
     * @var OpcaoRepository
     */
    private $opcaoRepository;

    /**
     * OpcaoController constructor.
     * @param OpcaoRepository $opcaoRepository
     * @internal param QuestaoRepository $questaoRepository
     */
    public function __construct(OpcaoRepository $opcaoRepository)
    {
        $this->opcaoRepository = $opcaoRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $disciplinaId, $provaId, $questaoId)
    {
        $this->opcaoRepository->create($request->all());

        return redirect()->route('mostrar.questao', array($disciplinaId, $provaId, $questaoId));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($disciplinaId, $provaId, $questaoId, $id)
    {
        $opcao = $this->opcaoRepository->find($id);

        return view('opcao.editar', compact('opcao', 'disciplinaId', 'provaId', 'questaoId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $disciplinaId, $provaId, $questaoId, $id)
    {
        $this->opcaoRepository->update($request->all(), $id);

        return redirect()->route('mostrar.questao', array($disciplinaId, $provaId, $questaoId));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($disciplinaId, $provaId, $questaoId, $id)
    {
        $this->opcaoRepository->delete($id);

        return redirect()->route('mostrar.questao', array($disciplinaId, $provaId, $questaoId));
    }
}
