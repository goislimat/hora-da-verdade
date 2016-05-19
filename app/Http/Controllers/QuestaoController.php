<?php

namespace Verdade\Http\Controllers;

use Illuminate\Http\Request;

use Verdade\Http\Requests;
use Verdade\Http\Requests\QuestaoRequest;
use Verdade\Repositories\ProvaRepository;
use Verdade\Repositories\QuestaoRepository;
use Verdade\Services\QuestaoService;

class QuestaoController extends Controller
{
    /**
     * @var ProvaRepository
     */
    private $provaRepository;
    /**
     * @var QuestaoRepository
     */
    private $questaoRepository;
    /**
     * @var QuestaoService
     */
    private $questaoService;

    /**
     * QuestaoController constructor.
     * @param ProvaRepository $provaRepository
     * @param QuestaoRepository $questaoRepository
     * @param QuestaoService $questaoService
     */
    public function __construct(ProvaRepository $provaRepository, QuestaoRepository $questaoRepository, QuestaoService $questaoService)
    {
        $this->provaRepository = $provaRepository;
        $this->questaoRepository = $questaoRepository;
        $this->questaoService = $questaoService;
    }

    /**
     * @param $disciplinaId
     * @param $provaId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($disciplinaId, $provaId)
    {
        $prova = $this->provaRepository->find($provaId);

        return view('questao.novo', compact('disciplinaId', 'prova'));
    }

    /**
     * @param QuestaoRequest $request
     * @param $disciplinaId
     * @param $provaId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(QuestaoRequest $request, $disciplinaId, $provaId)
    {
        $this->questaoRepository->create($request->all());

        return redirect()->route('mostrar.prova', array($disciplinaId, $provaId));
    }

    /**
     * @param $disciplinaId
     * @param $provaId
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($disciplinaId, $provaId, $id)
    {
        $questao = $this->questaoService->show($id);

        return view('questao.mostrar', compact('questao'));
    }

    /**
     * @param $disciplinaId
     * @param $provaId
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($disciplinaId, $provaId, $id)
    {
        $questao = $this->questaoRepository->find($id);
        $prova = $this->provaRepository->find($provaId);

        return view('questao.editar', compact('questao', 'prova', 'disciplinaId'));
    }

    /**
     * @param QuestaoRequest $request
     * @param $disciplinaId
     * @param $provaId
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(QuestaoRequest $request, $disciplinaId, $provaId, $id)
    {
        $this->questaoRepository->update($request->all(), $id);

        return redirect()->route('mostrar.prova', array($disciplinaId, $provaId));
    }

    /**
     * @param $disciplinaId
     * @param $provaId
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($disciplinaId, $provaId, $id)
    {
        $this->questaoRepository->delete($id);

        return redirect()->route('mostrar.prova', array($disciplinaId, $provaId));
    }
}
