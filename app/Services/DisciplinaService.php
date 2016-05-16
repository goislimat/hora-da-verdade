<?php
/**
 * Created by PhpStorm.
 * User: goisl
 * Date: 16/05/2016
 * Time: 18:28
 */

namespace Verdade\Services;


use Verdade\Repositories\DisciplinaRepository;

class DisciplinaService
{
    /**
     * @var DisciplinaRepository
     */
    private $disciplinaRepository;

    /**
     * DisciplinaService constructor.
     * @param DisciplinaRepository $disciplinaRepository
     */
    public function __construct(DisciplinaRepository $disciplinaRepository)
    {
        $this->disciplinaRepository = $disciplinaRepository;
    }

    public function buscar($campo, $valor)
    {
        if($valor == null)
            return ['erro' => 'A consulta realizada não retornou nenhum resultado.'];

        if($campo == 'nome')
            $disciplinas = $this->disciplinaRepository->findWhere([[$campo, 'like', '%'.$valor.'%']]);
        else
            $disciplinas = $this->disciplinaRepository->findWhere([$campo => $valor]);

        if(count($disciplinas) > 0)
            return $disciplinas;
        else
            return ['erro' => 'A consulta realizada não retornou nenhum resultado.'];
    }
}