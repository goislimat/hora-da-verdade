<?php

namespace Verdade\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use Verdade\Http\Requests;
use Verdade\Repositories\DisciplinaRepository;
use Verdade\Repositories\ProvaRepository;
use Verdade\Services\ProvaService;

class ProvaController extends Controller
{
    /**
     * @var ProvaRepository
     */
    private $provaRepository;
    /**
     * @var DisciplinaRepository
     */
    private $disciplinaRepository;
    /**
     * @var ProvaService
     */
    private $provaService;

    /**
     * ProvaController constructor.
     * @param ProvaRepository $provaRepository
     * @param DisciplinaRepository $disciplinaRepository
     * @param ProvaService $provaService
     */
    public function __construct(ProvaRepository $provaRepository, DisciplinaRepository $disciplinaRepository, ProvaService $provaService)
    {
        $this->provaRepository = $provaRepository;
        $this->disciplinaRepository = $disciplinaRepository;
        $this->provaService = $provaService;

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
    public function index($disciplinaId)
    {
        $provas = $this->provaRepository->findWhere(['disciplina_id' => $disciplinaId]);
        $disciplina = $this->disciplinaRepository->find($disciplinaId);

        return view('prova.index', compact('provas', 'disciplina'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($disciplinaId)
    {
        $disciplina = $this->disciplinaRepository->find($disciplinaId);

        return view('prova.novo', compact('disciplina'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $disciplinaId)
    {
        $this->provaService->store($request->all());

        return redirect()->route('index.prova', $disciplinaId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($disciplinaId, $id)
    {
        $prova = $this->provaService->show($id);
        $disciplina = $this->disciplinaRepository->find($disciplinaId);

        return view('prova.mostrar', compact('prova', 'disciplina'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($disciplinaId, $id)
    {
        $prova = $this->provaService->edit($id);
        $disciplina = $this->disciplinaRepository->find($disciplinaId);

        return view('prova.editar', compact('prova', 'disciplina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $disciplinaId, $id)
    {
        $this->provaService->update($request->all(), $id);

        return redirect()->route('mostrar.prova', array($disciplinaId, $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($disciplinaId, $id)
    {
        try
        {
            $this->provaRepository->delete($id);

            return redirect()->route('index.prova', $disciplinaId);
        }
        catch(QueryException $e)
        {
            $prova = $this->provaRepository->find($id);

            $erro = [
                'mensagem' => 'Essa prova bloqueou a exclusão pela existência de dependências',
                'solucao' => [
                    'A exclusão desse item, somente será possível após a exclusão de suas dependências',
                    'Para excluir suas dependências, exclua todos os vínculos de alunos com essa prova',
                    'Para exclusão em massa, contacte o administrador do sistema'
                ]
            ];

            return view('prova.mostrar', compact('prova', 'erro'));
        }
    }
}
