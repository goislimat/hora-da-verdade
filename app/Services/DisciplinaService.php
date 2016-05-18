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

    public function show($id)
    {
        $disciplina = $this->disciplinaRepository->find($id);

        $disciplina['professor'] = null;
        $alunos = array();
        $semestre = date('Y') . '/' . ((date('m') > 6) ? '2': '1');
        $disciplina['periodo_atual'] = $semestre;

        foreach($disciplina->usuarios as $usuario)
        {
            if($usuario->pivot->periodo == $semestre)
            {
                if($usuario->tipo == 3)
                {
                    array_push($alunos, $usuario);
                }
                else if($usuario->tipo == 2)
                {
                    $disciplina['professor'] = $usuario;
                }
            }
        }

        $disciplina->usuarios = $alunos;
        $disciplina['quantidade'] = count($disciplina->usuarios);

        return $disciplina;
    }

    public function buscar($campo, $valor)
    {
        if($valor == null)
        {
            session()->flash('erro', 'A consulta realizada não retornou nenhum resultado.');
            return null;
        }


        if($campo == 'nome')
            $disciplinas = $this->disciplinaRepository->findWhere([[$campo, 'like', '%'.$valor.'%']]);
        else
            $disciplinas = $this->disciplinaRepository->findWhere([$campo => $valor]);

        if(count($disciplinas) > 0)
            return $disciplinas;
        else
        {
            session()->flash('erro', 'A consulta realizada não retornou nenhum resultado.');
            return null;
        }
    }

    public function professores($id)
    {
        $disciplina = $this->disciplinaRepository->find($id);

        $professores = array();

        foreach($disciplina->usuarios as $usuario)
        {
            if($usuario->tipo == 2)
            {
                array_push($professores, $usuario);
            }
        }

        $disciplina->usuarios = $professores;
        $disciplina['quantidade'] = count($disciplina->usuarios);

        return $disciplina;
    }

    public function alunos($id)
    {
        $disciplina = $this->disciplinaRepository->find($id);

        $alunos = array();

        foreach($disciplina->usuarios as $usuario)
        {
            if($usuario->tipo == 3)
            {
                array_push($alunos, $usuario);
            }
        }

        $disciplina->usuarios = $alunos;
        $disciplina['quantidade'] = count($disciplina->usuarios);

        return $disciplina;
    }
}