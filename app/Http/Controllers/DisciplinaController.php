<?php

namespace Verdade\Http\Controllers;

use Illuminate\Http\Request;

use Verdade\Http\Requests;
use Verdade\Http\Requests\DisciplinaRequest;
use Verdade\Repositories\CursoRepository;
use Verdade\Repositories\DisciplinaRepository;
use Verdade\Services\DisciplinaService;
use DB;

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

        if(session()->get('user') == null)
        {
            session()->put('user', \Illuminate\Support\Facades\Auth::user());
        }
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->get('user.tipo') == 1)
            $disciplinas = $this->disciplinaRepository->all();
        else
        {
            $user = session()->get('user');
            $disciplinas = $user->disciplinasUsuarioNoSemestre;
        }

        return view('disciplina.index', compact('disciplinas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cursoId = null)
    {
        if(session()->get('user.tipo') != 1)
            return redirect()->route('index.disciplina');

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
        if(session()->get('user.tipo') != 1)
            return redirect()->route('index.disciplina');

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
        if(session()->get('user.tipo') != 1)
        {
            $buscaUsuarioDisciplina = DB::table('disciplinas')
                ->join('aluno_disciplinas', 'disciplinas.id', '=', 'aluno_disciplinas.disciplina_id')
                ->join('users', 'aluno_disciplinas.user_id', '=', 'users.id')
                ->join('cursos', 'disciplinas.curso_id', '=', 'cursos.id')
                ->where('periodo', date('Y') . '/' . ((date('m') > 6) ? '2': '1'))
                ->where('users.id', session()->get('user.id'))
                ->where('disciplinas.id', $id)
                ->count();

            if($buscaUsuarioDisciplina == 0)
                return redirect()->route('index.disciplina');
        }

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
        if(session()->get('user.tipo') != 1)
            return redirect()->route('index.disciplina');

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
        if(session()->get('user.tipo') != 1)
            return redirect()->route('index.disciplina');

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
        if(session()->get('user.tipo') != 1)
            return redirect()->route('index.disciplina');

        $this->disciplinaRepository->delete($id);
        return redirect()->route('index.disciplina');
    }
    
    public function buscar(Request $request)
    {
        if(session()->get('user.tipo') != 1)
            return redirect()->route('index.disciplina');

        $disciplinas = $this->disciplinaService->buscar($request->campo, $request->valor);
        return view('disciplina.index', compact('disciplinas'));
    }

    public function professores($id)
    {
        if(session()->get('user.tipo') != 1)
            return redirect()->route('index.disciplina');

        $disciplina = $this->disciplinaService->professores($id);
        $recurso = 'professores';

        return view('disciplina.todos_professores', compact('disciplina', 'recurso'));
    }

    public function alunos($id)
    {
        if(session()->get('user.tipo') != 1)
            return redirect()->route('index.disciplina');

        $disciplina = $this->disciplinaService->alunos($id);
        $recurso = 'alunos';

        return view('disciplina.todos_alunos', compact('disciplina', 'recurso'));
    }
}
