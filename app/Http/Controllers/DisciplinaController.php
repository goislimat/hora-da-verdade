<?php

namespace Verdade\Http\Controllers;

use Illuminate\Http\Request;

use Verdade\Http\Requests;
use Verdade\Http\Requests\DisciplinaRequest;
use Verdade\Repositories\CursoRepository;
use Verdade\Repositories\DisciplinaRepository;
use Verdade\Services\DisciplinaService;

class DisciplinaController extends Controller
{
    /**
     * @var DisciplinaRepository
     */
    private $disciplinaRepository;
    /**
     * @var DisciplinaService
     */
    private $disciplinaService;
    /**
     * @var CursoRepository
     */
    private $cursoRepository;

    /**
     * DisciplinaController constructor.
     * @param DisciplinaRepository $disciplinaRepository
     * @param DisciplinaService $disciplinaService
     * @param CursoRepository $cursoRepository
     */
    public function __construct(DisciplinaRepository $disciplinaRepository, DisciplinaService $disciplinaService, CursoRepository $cursoRepository)
    {
        $this->disciplinaRepository = $disciplinaRepository;
        $this->disciplinaService = $disciplinaService;
        $this->cursoRepository = $cursoRepository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disciplinas = $this->disciplinaRepository->all();
        
        return view('disciplina.index', compact('disciplinas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cursoId = null)
    {
        if($cursoId == null)
        {
            $cursos = $this->cursoRepository->lists('nome', 'id');
            return view('disciplina.novo', compact('cursos'));
        }

        $curso = $this->cursoRepository->find($cursoId);
        return view('disciplina.novo', compact('curso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request|DisciplinaRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DisciplinaRequest $request)
    {
        $this->disciplinaRepository->create($request->all());

        return redirect()->route('index.disciplina');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $disciplina = $this->disciplinaService->show($id);

        return view('disciplina.mostrar', compact('disciplina'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $disciplina = $this->disciplinaRepository->find($id);
        $cursos = $this->cursoRepository->lists('nome', 'id');

        return view('disciplina.editar', compact('disciplina', 'cursos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request|DisciplinaRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(DisciplinaRequest $request, $id)
    {
        $this->disciplinaRepository->update($request->all(), $id);

        return redirect()->route('index.disciplina');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->disciplinaRepository->delete($id);

        return redirect()->route('index.disciplina');
    }
    
    public function buscar(Request $request)
    {
        $disciplinas = $this->disciplinaService->buscar($request->campo, $request->valor);

        return view('disciplina.index', compact('disciplinas'));
    }

    public function professores($id)
    {
        $disciplina = $this->disciplinaService->professores($id);

        return view('disciplina.todos_professores', compact('disciplina'));
    }

    public function alunos($id)
    {
        $disciplina = $this->disciplinaService->alunos($id);

        return view('disciplina.todos_alunos', compact('disciplina'));
    }
}
