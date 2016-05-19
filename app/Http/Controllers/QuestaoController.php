<?php

namespace Verdade\Http\Controllers;

use Illuminate\Http\Request;

use Verdade\Http\Requests;
use Verdade\Repositories\ProvaRepository;
use Verdade\Repositories\QuestaoRepository;

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
     * QuestaoController constructor.
     * @param ProvaRepository $provaRepository
     * @param QuestaoRepository $questaoRepository
     */
    public function __construct(ProvaRepository $provaRepository, QuestaoRepository $questaoRepository)
    {
        $this->provaRepository = $provaRepository;
        $this->questaoRepository = $questaoRepository;
    }

    public function create($disciplinaId, $provaId)
    {
        $prova = $this->provaRepository->find($provaId);

        return view('questao.novo', compact('disciplinaId', 'prova'));
    }

    public function store(Request $request, $disciplinaId, $provaId)
    {
        $this->questaoRepository->create($request->all());

        return redirect()->route('mostrar.prova', array($disciplinaId, $provaId));
    }
}
