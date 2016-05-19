<?php
/**
 * Created by PhpStorm.
 * User: goisl
 * Date: 19/05/2016
 * Time: 12:28
 */

namespace Verdade\Services;


use Verdade\Repositories\QuestaoRepository;

class QuestaoService
{
    /**
     * @var QuestaoRepository
     */
    private $questaoRepository;

    /**
     * QuestaoService constructor.
     * @param QuestaoRepository $questaoRepository
     */
    public function __construct(QuestaoRepository $questaoRepository)
    {
        $this->questaoRepository = $questaoRepository;
    }

    public function show($id)
    {
        $questao = $this->questaoRepository->find($id);

        $questao->tipo = $this->getTipoComoTexto($questao->tipo);

        return $questao;
    }

    private function getTipoComoTexto($tipo)
    {
        if($tipo == 1)
            return "Discursiva";
        elseif($tipo == 2)
            return "Múltipla Escolha";
        else
            return "V ou F";
    }
}