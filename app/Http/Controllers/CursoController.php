<?php

namespace Verdade\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use Verdade\Http\Requests;
use Verdade\Http\Requests\CursoRequest;
use Verdade\Repositories\CursoRepository;
use Verdade\Services\CursoService;

class CursoController extends Controller
{
    /**
     * @var CursoRepository
     */
    private $cursoRepository;
    /**
     * @var CursoService
     */
    private $cursoService;

    /**
     * CursoController constructor.
     * @param CursoRepository $cursoRepository
     * @param CursoService $cursoService
     */
    public function __construct(CursoRepository $cursoRepository, CursoService $cursoService)
    {
        $this->cursoRepository = $cursoRepository;
        $this->cursoService = $cursoService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = $this->cursoService->index();

        return view('curso.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('curso.novo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request|CursoRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CursoRequest $request)
    {
        $this->cursoRepository->create($request->all());

        return redirect()->route('index.curso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curso = $this->cursoService->show($id);

        return view('curso.mostrar', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = $this->cursoRepository->find($id);

        return view('curso.editar', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request|CursoRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CursoRequest $request, $id)
    {
        $this->cursoRepository->update($request->all(), $id);

        return redirect()->route('index.curso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $this->cursoRepository->delete($id);

            return redirect()->route('index.curso');
        }
        catch(QueryException $e)
        {
            $curso = $this->cursoService->show($id);

            $erro = [
                'mensagem' => 'Esse curso bloqueou a exclusão pela existência de dependências',
                'solucao' => [
                    'A exclusão desse item, somente será possível após a exclusão de suas dependências',
                    'Para excluir suas dependências, exclua todos as disciplinas e alunos exibidas nas listas abaixo',
                    'Para exclusão em massa, contacte o administrador do sistema'
                ]
            ];

            return view('curso.mostrar', compact('curso', 'erro'));
        }
    }

    public function buscar(Request $request)
    {
        $cursos = $this->cursoService->buscar($request->campo, $request->valor);

        return view('curso.index', compact('cursos'));
    }
}
