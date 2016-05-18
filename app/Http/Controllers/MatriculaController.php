<?php

namespace Verdade\Http\Controllers;

use Illuminate\Http\Request;

use Verdade\Http\Requests;
use Verdade\Http\Requests\MatriculaRequest;
use Verdade\Repositories\DisciplinaRepository;
use Verdade\Repositories\UserRepository;
use Verdade\Services\MatriculaService;

class MatriculaController extends Controller
{
    /**
     * @var DisciplinaRepository
     */
    private $disciplinaRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var MatriculaService
     */
    private $matriculaService;

    /**
     * MatriculaController constructor.
     * @param DisciplinaRepository $disciplinaRepository
     * @param UserRepository $userRepository
     * @param MatriculaService $matriculaService
     */
    public function __construct(DisciplinaRepository $disciplinaRepository, UserRepository $userRepository, MatriculaService $matriculaService)
    {
        $this->disciplinaRepository = $disciplinaRepository;
        $this->userRepository = $userRepository;
        $this->matriculaService = $matriculaService;

        if(session()->get('user') == null)
        {
            session()->put('user', \Illuminate\Support\Facades\Auth::user());
        }
    }

    public function matricularAluno($id)
    {
        if(session()->get('user.tipo') == 3)
            return redirect()->route('index.disciplina');

        $disciplina = $this->disciplinaRepository->find($id);
        $usuarios = $this->userRepository->findWhere(['curso_id' => $disciplina->curso->id])->lists('nome', 'id');

        return view('matricula.matricula', compact('disciplina', 'usuarios'));
    }

    public function vincularProfessor($id)
    {
        if(session()->get('user.tipo') != 1)
            return redirect()->route('index.disciplina');

        $disciplina = $this->disciplinaRepository->find($id);
        $usuarios = $this->userRepository->findWhere(['tipo' => 2])->lists('nome', 'id');

        return view('matricula.vinculo', compact('disciplina', 'usuarios'));
    }

    /**
     * @param MatriculaRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function vincular(MatriculaRequest $request, $id)
    {
        if(session()->get('user.tipo') == 3)
            return redirect()->route('index.disciplina');

        $erro = $this->matriculaService->vincular($request->all());

        if(!$erro['erro'])
            return redirect()->route('mostrar.disciplina', array($id));
        else
        {
            //$disciplina = $this->disciplinaRepository->find($id);

            //coloca variaveis na seção para que seja mostrado no flash message e só faz o redirecionamento
            return redirect()->route('mostrar.disciplina', array($id));
        }
    }

    public function desvincular(Request $request, $disciplinaId, $usuarioId, $recurso = null)
    {
        if(session()->get('user.tipo') == 3)
            return redirect()->route('index.disciplina');

        $this->matriculaService->desvincular($disciplinaId, $usuarioId, $request->periodo);

        if($recurso == null)
            return redirect()->route('mostrar.disciplina', array($disciplinaId));
        else if($recurso == 'professores')
            return redirect()->route('professores.disciplina', array($disciplinaId));
        else
            return redirect()->route('alunos.disciplina', array($disciplinaId));
    }
}
