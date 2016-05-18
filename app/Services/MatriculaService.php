<?php
/**
 * Created by PhpStorm.
 * User: goisl
 * Date: 17/05/2016
 * Time: 21:11
 */

namespace Verdade\Services;


use DB;
use Verdade\Repositories\DisciplinaRepository;
use Verdade\Repositories\UserRepository;

class MatriculaService
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var DisciplinaRepository
     */
    private $disciplinaRepository;

    /**
     * MatriculaService constructor.
     * @param UserRepository $userRepository
     * @param DisciplinaRepository $disciplinaRepository
     */
    public function __construct(UserRepository $userRepository, DisciplinaRepository $disciplinaRepository)
    {
        $this->userRepository = $userRepository;
        $this->disciplinaRepository = $disciplinaRepository;
    }

    public function vincular($data)
    {
        $tipo = $this->userRepository->find($data['user_id'])->tipo;

        if($tipo == 2)
        {
            $contagemProfessor = DB::table('aluno_disciplinas')
                ->join('users', 'aluno_disciplinas.user_id', '=', 'users.id')
                ->where('aluno_disciplinas.periodo', $data['periodo'])
                ->where('users.tipo', 2)
                ->where('aluno_disciplinas.disciplina_id', $data['disciplina_id'])
                ->count();

            if($contagemProfessor == 0)
            {
                $this->disciplinaRepository->find($data['disciplina_id'])->usuarios()->attach($data['user_id'], ['periodo' => $data['periodo']]);
                return ['erro' => false];
            }
            else
                return ['erro' => true, 'mensagem' => 'O cadastramento falhou', 'solucao' => ['Já existe um professor cadastrado para ministrar essa disciplina no período selecionado.']];
        }
        else
        {
            $busca = DB::table('aluno_disciplinas')
                ->where('disciplina_id', $data['disciplina_id'])
                ->where('user_id', $data['user_id'])
                ->where('periodo', $data['periodo'])
                ->count();

            if($busca == 0)
            {
                $this->disciplinaRepository->find($data['disciplina_id'])->usuarios()->attach($data['user_id'], ['periodo' => $data['periodo']]);
                return ['erro' => false];
            }
            else
                return ['erro' => true, 'mensagem' => 'O cadastramento falhou', 'solucao' => ['Esse aluno já se encontra matriculado na disciplina no período selecionado.']];
        }
    }
}